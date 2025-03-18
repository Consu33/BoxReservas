<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    
    public function index()
    {
        $doctores = Doctor::with('user')->orderBy('nombre', 'asc')->get();
        return view ('admin.doctores.index', compact('doctores'));
    }

    
    public function create()
    {
        return view ('admin.doctores.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'rut' => 'required|unique:users',
            'profesion' => 'required',
            'email' => 'required|max:200|unique:users',
            'password' => 'required|max:200|confirmed',
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

        $doctor = new Doctor();
        $doctor->user_id = $usuario->id;
        $doctor->nombre = $request->nombre;
        $doctor->apellido = $request->apellido;
        $doctor->rut = $request->rut;
        $doctor->profesion = $request->profesion;
        $doctor->save();

        $usuario->assignRole('doctor');

        return redirect()->route('admin.doctores.index')
        ->with('mensaje', 'Registro Exitoso!')
        ->with('icono', 'success');
    }

    
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view ('admin.doctores.show', compact('doctor'));
    }

    
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view ('admin.doctores.edit', compact('doctor'));
    }

   
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);         
        
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'rut' => 'required',
            'profesion' => 'required',
            'email' => 'required|max:250|unique:users,email,'.$doctor->user->id,
            'password' => 'nullable|max:250|confirmed',
        ]);

        $doctor->nombre = $request->nombre;
        $doctor->apellido = $request->apellido;
        $doctor->rut = $request->rut;
        $doctor->profesion = $request->profesion;
        $doctor->save();

        $usuario = User::find($doctor->user->id);
        $usuario->name = $request->nombre;
        $usuario->rut = $request->rut;
        $usuario->email = $request->email;
        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }  
        $usuario->save();

        return redirect()->route('admin.doctores.index')
        ->with('mensaje', 'Registro Actualizado con Exito!')
        ->with('icono', 'success');
    }

   
    public function confirmDelete($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view ('admin.doctores.delete', compact('doctor'));
    }


    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        //Eliminar al usuario asociado
        $user = $doctor->user;
        $user->delete();

        //Eliminar al doctor
        $doctor->delete();

        return redirect()->route('admin.doctores.index')
        ->with('mensaje', 'Registro Eliminado con Exito!')
        ->with('icono', 'success');
    }

    public function reportes()
    {
        return view('admin.doctores.reportes');
    }

    
}
