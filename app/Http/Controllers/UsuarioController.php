<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Muestra la lista de usuarios
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    // Muestra el formulario de creación
    public function create()
    {
        return view('admin.usuarios.create');
    }

    // Almacena un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'rut' => 'required|unique:users',
            'email' => 'required|max:250|unique:users',
            'password' => 'required|max:8|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->rut = $request->rut; 
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        $usuario->assignRole(['rolDoble', 'doctor']);

        if (!$usuario->doctor) {
            Doctor::create([
                'user_id' => $usuario->id,
                
            ]);
        }

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Registro Exitoso!')
            ->with('icono', 'success');
    }

    // Muestra los detalles del usuario
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    // Muestra el formulario de edición
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    // Actualiza un usuario existente
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        // Validación antes de actualizar
        $request->validate([
            'name' => 'required|max:250',
            'rut' => 'required|unique:users',
            'email' => 'required|max:250|unique:users,email,' . $usuario->id,
            'password' => 'nullable|max:250|confirmed',
        ]);

        $usuario->name = $request->name;
        $usuario->rut = $request->rut;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->save();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Actualización Exitosa!')
            ->with('icono', 'success');
    }

    // Muestra la vista para confirmar eliminación
    public function confirmDelete($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
    }

    // Elimina un usuario
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Usuario Eliminado Exitosamente!')
            ->with('icono', 'success');
    }
}
