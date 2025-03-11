<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    
    public function create()
    {
        return view ('admin.pacientes.create');
    }

   
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json ($datos);
        $request->validate([
            'rut'=>'required|unique:pacientes',
            'nombre'=>'required|max:250',
            'apellido'=>'required|max:250',
            'fecha_nacimiento'=>'required|max:250',
            'genero'=>'required|max:250',
            'celular'=>'required|max:250',
            'correo'=>'required|max:250|unique:pacientes',
            'direccion'=>'required|max:250',
            'comuna'=>'required|max:250',
        ]);

        $paciente = new Paciente();
        $paciente->rut = $request->rut;
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->correo = $request->correo;
        $paciente->direccion = $request->direccion;
        $paciente->comuna = $request->comuna;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();

        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Registro Paciente Exitoso!')
        ->with('icono', 'success');

    }

    
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.show', compact('paciente'));
    }

    
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }

    
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);

        $request->validate([
            'rut'=> 'required|unique:pacientes,rut,'.$paciente->id,
            'nombre'=>'required',
            'apellido'=>'required',
            'fecha_nacimiento'=>'required',
            'celular'=>'required',
            'correo'=>'required|max:250|unique:pacientes,correo,'.$paciente->id,
            'direccion'=>'required',
            'comuna'=>'required',
            'observaciones'=>'required',
        ]);

        $paciente->rut = $request->rut;
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->correo = $request->correo;
        $paciente->direccion = $request->direccion;
        $paciente->comuna = $request->comuna;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();
  
        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Se Actualizo al Paciente de forma Exitosa!')
        ->with('icono', 'success');  
    }

    public function confirmDelete($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.delete', compact('paciente'));
    }
    
    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Se Elimino al Paciente de forma Exitosa!')
        ->with('icono', 'success');  
    }
}
