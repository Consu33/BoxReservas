<?php

namespace App\Http\Controllers;

use App\Models\Enfermera;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class EnfermeraController extends Controller
{
    
    public function index()
    {
        $enfermeras = Enfermera::with('user')->orderBy('nombre', 'asc')->get();
        return view('admin.enfermeras.index', compact('enfermeras'));
    }

    
    public function create()
    {
        return view('admin.enfermeras.create');
    }

    
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'rut' => 'required|unique:users',
            'nombre' => 'required',
            'apellido' => 'required',
            'profesion' => 'required',
            'email'=>'required|max:250|unique:users',
            'password'=>'required|max:250|confirmed',
        ],[
            'rut.unique' => 'El RUT ingresado ya está registrado.',
            'email.unique' => 'El correo ingresado ya está registrado.',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->rut = $request->rut;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        $enfermera = new Enfermera();
        $enfermera->user_id = $usuario->id;
        $enfermera->rut = $request->rut;
        $enfermera->nombre = $request->nombre;
        $enfermera->apellido = $request->apellido;
        $enfermera->profesion = $request->profesion;
        $enfermera->save();

        $usuario->assignRole('enfermera');

        return redirect()->route('admin.enfermeras.index')
        ->with('mensaje', 'Registro Exitoso!')
        ->with('icono', 'success');

    }

   
    public function show($id)
    {
        $enfermera = Enfermera::with('user')->findOrFail($id);
        return view('admin.enfermeras.show', compact('enfermera'));
    }


    public function edit($id)
    {
        $enfermera = Enfermera::with('user')->findOrFail($id);
        return view('admin.enfermeras.edit', compact('enfermera'));
    }

    
    public function update(Request $request, $id)
    {
        $enfermera = Enfermera::find($id);         
        
        //$usuario = User::find($id);
        $request->validate([
            'rut' => 'required|unique:enfermeras,rut,'. $enfermera->id,
            'nombre' => 'required',
            'apellido' => 'required',
            'profesion' => 'required',
            'email'=>'required|max:250|unique:users,email,'. $enfermera->user->id,
            'password'=>'nullable|max:250|confirmed',

        ]);

        $enfermera->rut = $request->rut;
        $enfermera->nombre = $request->nombre;
        $enfermera->apellido = $request->apellido;
        $enfermera->profesion = $request->profesion;
        $enfermera->save();

        $usuario = User::find($enfermera->user->id);
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }  
        $usuario->save();

        return redirect()->route('admin.enfermeras.index')
        ->with('mensaje', 'Registro Actualizado con Exito!')
        ->with('icono', 'success');

    }

    public function confirmDelete($id){
        $enfermera = Enfermera::with('user')->findOrFail($id);
        return view('admin.enfermeras.delete', compact('enfermera'));
        
    }


    public function destroy($id)
    {
        $enfermera = Enfermera::find($id);

        //Eliminar al usuario asociado
        $user = $enfermera->user;
        $user->delete();

        //Eliminar a la enfermera
        $enfermera->delete();

        return redirect()->route('admin.enfermeras.index')
        ->with('mensaje', 'Registro Eliminado con Exito!')
        ->with('icono', 'success');

    }
}
