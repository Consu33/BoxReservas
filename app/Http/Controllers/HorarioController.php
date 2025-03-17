<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Doctor;
use App\Models\Horario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class HorarioController extends Controller
{

    public function index()
    {
        $horarios = Horario::with('doctor', 'box')->get();
        $boxes = Box::all();
        $doctores = Doctor::all();
        return view('admin.horarios.index', compact('horarios', 'boxes', 'doctores'));
    }

    public function create()
    {
        $doctores = Doctor::all();
        $boxes = Box::all();
        $horarios = Horario::with('doctor', 'box')->get();
        return view('admin.horarios.create', compact('doctores', 'boxes', 'horarios'));
    }

    public function cargar_datos_boxes($id)
    {
        try {
            $horarios = Horario::with('doctor', 'box')->where('box_id', $id)->get();
            //print_r($horarios);
            return view('admin.horarios.cargar_datos_boxes', compact('horarios'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }

    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'fecha_inicio' => 'required|date',
            'hora_inicio' => 'required',
            'hora_termino' => 'required|date_format:H:i|after:hora_inicio',
            'doctor_id' => 'required|exists:doctors,id',
            'box_id' => 'required|exists:boxes,id',
        ]);

        //Verificar si el horario ya existe para ese dia y rango de horas
        $horarioExistente = Horario::where('box_id', $request->box_id)
            ->where('fecha_inicio', $request->fecha_inicio)
            ->where(function ($query) use ($request) {
                $query->whereBetween('hora_inicio', [$request->hora_inicio, $request->hora_termino])
                    ->orWhereBetween('hora_fin', [$request->hora_inicio, $request->hora_termino])
                    ->orWhere(function ($subQuery) use ($request) {
                        $subQuery->where('hora_inicio', '<=', $request->hora_inicio)
                            ->where('hora_fin', '>=', $request->hora_termino);
                    });
            })
            ->exists();

        if ($horarioExistente) {
            return redirect()->back()
                ->with('error', 'El horario ya está ocupado.')
                ->withInput(); // Esto asegura que los valores anteriores, incluido el box_id, persistan
        }
        
        $doctor = Doctor::find($request->doctor_id);

        $horario = new Horario();
        $horario->fecha_inicio = $request->fecha_inicio;
        $horario->hora_inicio = $request->hora_inicio . ':00';
        $horario->hora_fin = $request->hora_termino . ':00';
        $horario->title = $request->hora_inicio . " " . $doctor->nombre . " " . $doctor->apellido . " - " . $doctor->profesion;
        $horario->start = $request->fecha_inicio . ' ' . $request->hora_inicio . ':00';
        $horario->end = $request->fecha_inicio . ' ' . $request->hora_termino . ':00';
        $horario->color = '#4e87de ';
        $horario->user_id = Auth::user()->id;
        $horario->doctor_id = $request->doctor_id;
        $horario->box_id = $request->box_id;
        $horario->save();

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Registro Exitoso!')
            ->with('icono', 'success');
    }

    public function getEventos()
    {
        $eventos = Horario::select('title', 'start', 'end', 'color')->get();
        return response()->json($eventos);
    }


    public function show($id)
    {
        $horario = Horario::findOrFail($id);
        return view('admin.horarios.show', compact('horario'));
    }


    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $doctores = Doctor::all();  // Si vas a editar el doctor
        $boxes = Box::all();        // Si vas a editar el box

        if ($boxes->isEmpty()) {
            dd('No se han encontrado boxes en la base de datos.');
        }

        return view('admin.horarios.edit', compact('horario', 'doctores', 'boxes'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date|date_format:Y-m-d',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'doctor_id' => 'required|exists:doctors,id',
            'box_id' => 'required|exists:boxes,id',
        ]);

        $horario = Horario::findOrFail($id);

        // Verificar si el horario ya existe para ese box y rango de horas
        $horarioExistente = Horario::where('box_id', $request->box_id)
            ->whereDate('fecha_inicio', $request->fecha_inicio)
            ->where(function ($query) use ($request) {
                $query->where('hora_inicio', '<', $request->hora_fin)
                    ->where('hora_fin', '>', $request->hora_inicio);
            })
            ->where('id', '!=', $id) // Aseguramos que no se compare con el mismo horario
            ->exists();

        if ($horarioExistente) {
            return redirect()->back()->with('error', 'El horario ya está ocupado.');
        }

        // Actualizar el horario
        $horario->doctor_id = $request->doctor_id;
        $horario->box_id = $request->box_id;
        $horario->fecha_inicio = $request->fecha_inicio;
        $horario->hora_inicio = $request->hora_inicio . ':00';
        $horario->hora_fin = $request->hora_fin . ':00';
        $horario->save();

        return redirect()->route('admin.horarios.index')->with('success', 'Horario actualizado correctamente');
    }

    public function confirmDelete($id)
    {
        $horario = Horario::findOrFail($id);
        return view('admin.horarios.delete', compact('horario'));
    }


    public function destroy($id)
    {
        Horario::destroy($id);
        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Horario Eliminado de forma Exitosa!')
            ->with('icono', 'success');
    }
}
