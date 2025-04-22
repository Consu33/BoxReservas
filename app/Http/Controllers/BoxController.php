<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
   
    public function index()
    {
        $boxes = Box::all();
        return view('admin.boxes.index', compact('boxes'));
    }

    
    public function create()
    {
        $boxes = Box::all(); // Obtén todos los registros de boxes
        return view('admin.boxes.create', compact('boxes')); // Pasa la variable $boxes a la vista
    }
    

    
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'numero' => 'required',
            'recinto' => 'required',
            'especialidades' => 'nullable',
            'piso' => 'required',
            'torre'=>'required'
        ],[
            'recinto.unique' => 'El recinto ya está registrado.',
        ]);

        Box::create($request->all());

        return redirect()->route('admin.boxes.index')
            ->with('mensaje', 'Registro Box Exitoso!')
            ->with('icono', 'success');
    }

    
    public function show($id)
    {
        $box = Box::findOrFail($id);
        return view('admin.boxes.show', compact('box'));
    }

    
    public function edit($id)
    {
        $box = Box::findOrFail($id);
        return view('admin.boxes.edit', compact('box'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'numero' => 'required',
            'recinto' => 'required',
            'especialidades' => 'nullable',
            'piso' => 'required',
            'torre' => 'required'
        ]);

        $box = Box::find($id);
        $box->update($request->all());

        return redirect()->route('admin.boxes.index')
            ->with('mensaje', 'Registro Actualizado Exitoso!')
            ->with('icono', 'success');
    }

    public function confirmDelete($id)
    {
        $box = Box::findOrFail($id);
        return view('admin.boxes.delete', compact('box'));
    }

    
    public function destroy($id)
    {
        $box = Box::find($id);
        $box->delete();

        return redirect()->route('admin.boxes.index')
            ->with('mensaje', 'Registro Eliminado!')
            ->with('icono', 'success');
    }
}
