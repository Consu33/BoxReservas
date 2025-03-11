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

    public function cargar_fullCalendar($id)
    {
        echo $id;
        /*$boxId = $request->input('id'); // Usamos el parámetro 'id' desde la solicitud POST
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

        return response()->json(['mensaje' => 'Box no encontrado']);*/
    }

    public function cargar_reserva_doctores($id)
    {
        try {
            $eventos = Event::where('doctor_id', $id)
                ->select(
                    'id',
                    'title',
                    DB::raw('DATE_FORMAT(start, "%Y-%m-%d") as start'),  
                    DB::raw('DATE_FORMAT(end, "%Y-%m-%d") as end'),      
                    'color'
                )
                ->get();
            return response()->json($eventos);
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }
}
