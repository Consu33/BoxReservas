<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Doctor;
use App\Models\Enfermera;
use App\Models\RolDoble;
use App\Models\Event;
use App\Models\Horario;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $total_usuarios = User::count();
        $total_enfermeras = Enfermera::count();
        $total_rolDobles = RolDoble::count();
        $total_pacientes = Paciente::count();
        $total_boxes = Box::count();
        $total_doctores = Doctor::count();
        $total_horarios = Horario::count();
        $total_eventos = Event::count();
        

        $boxes = Box::all();
        $doctores = Doctor::all();
        $horarios = Horario::all();
        $eventos = Event::all();


        return view ('admin.index', compact('total_usuarios', 
            'total_enfermeras',
            'total_rolDobles',
            'total_pacientes', 
            'total_boxes', 
            'total_doctores', 
            'total_horarios', 
            'boxes', 
            'doctores',
            'eventos',
            'total_eventos'
        ));
    }

    public function ver_reservas($id){
        $eventos = Event::where('user_id', $id)->get();
        return view('admin.ver_reservas', compact('eventos'));
    }
}
