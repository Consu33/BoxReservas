<?php

namespace App\Http\Controllers;

use App\Models\RolDoble;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RolDobleController extends Controller
{
    
    public function index()
    {
        $rolDobles = RolDoble::with('user')->get();
        return view ('admin.rolDobles.index', compact('rolDobles'));
    }

    
    public function create()
    {
        return view ('admin.rolDobles.create');
    }

    
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'rut' => 'required|unique:rol_dobles',
            'nombre' => 'required',
            'apellido' => 'required',
            'profesion' => 'required',
            'email'=>'required|max:250|unique:users',
            'password'=>'required|max:250|confirmed',

        ]);

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->rut = $request->rut;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        $rolDoble = new RolDoble();
        $rolDoble->user_id = $usuario->id;
        $rolDoble->rut = $request->rut;
        $rolDoble->nombre = $request->nombre;
        $rolDoble->apellido = $request->apellido;
        $rolDoble->profesion = $request->profesion;
        $rolDoble->save();

        $usuario->assignRole('rolDoble');

        return redirect()->route('admin.rolDobles.index')
        ->with('mensaje', 'Registro Exitoso!')
        ->with('icono', 'success');
    }

    
    public function show($id)
    {
        $rolDoble = RolDoble::with('user')->findOrFail($id);
        return view('admin.rolDobles.show', compact('rolDoble'));
    }

    
    public function edit($id)
    {
        $rolDoble = RolDoble::with('user')->findOrFail($id);
        return view('admin.rolDobles.edit', compact('rolDoble'));
    }

    
    public function update(Request $request, $id)
    {
        $rolDoble = RolDoble::find($id);

        //$usuario = User::find($id);
        $request->validate([
            'rut' => 'required|unique:rol_dobles,rut,'. $rolDoble->id,
            'nombre' => 'required',
            'apellido' => 'required',
            'profesion' => 'required',
            'email'=>'required|max:250|unique:users,email,'. $rolDoble->user->id,
            'password'=>'nullable|max:250|confirmed',
        ]);

        $rolDoble->rut = $request->rut;
        $rolDoble->nombre = $request->nombre;
        $rolDoble->apellido = $request->apellido;
        $rolDoble->profesion = $request->profesion;
        $rolDoble->save();

        $usuario = User::find($rolDoble->user->id);
        $usuario->name = $request->nombre;
        $usuario->rut = $request->rut;
        $usuario->email = $request->email;
        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->save();

        return redirect()->route('admin.rolDobles.index')
        ->with('mensaje', 'Registro Actualizado!')
        ->with('icono', 'success');
    }

    public function confirmDelete($id){

        $rolDoble = RolDoble::with('user')->findOrFail($id);
        return view ('admin.rolDobles.delete', compact('rolDoble'));
    }
    
    public function destroy($id)
    {
        $rolDoble = RolDoble::find($id);

        //Eliminar usuario asociado
        $user = $rolDoble->user;
        $user->delete();

        //Eliminar rolDoble asociado 
        $rolDoble->delete();

        return redirect()->route('admin.rolDobles.index')
        ->with('mensaje', 'Registro Eliminado Exitosamente!')
        ->with('icono', 'success');
    }
}
