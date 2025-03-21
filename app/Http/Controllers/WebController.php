<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class WebController extends Controller
{
    public function index()
    {
        $boxes = Box::all();
        return view('index', compact('boxes'));
    }

    public function cargar_fullCalendar($id, Request $request)
    {
        
        $boxId = $request->input('id'); // Usamos el parámetro 'id' desde la solicitud POST
        $box = Box::find($boxId);

        if ($box) {
            try {
                $horarios = Horario::with('doctor', 'box')->where('box_id', $boxId)->get();
                return response()->json([
                    'horarios' => $horarios,
                    'box' => $box
                ]);
            } catch (\Exception $exception) {
                return response()->json(['mensaje' => 'Error al cargar los horarios']);
            }
        }

        return response()->json(['mensaje' => 'Box no encontrado']);
    }

}
