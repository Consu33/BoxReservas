<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracione;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;



class EventController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);

        $doctor = Doctor::find($request->doctor_id);

        $evento = new Event();
        $evento->title = $request->hora_inicio." ".$doctor->nombre." ".$doctor->apellido." - ".$doctor->profesion;
        $evento->start = $request->fecha_reserva;
        $evento->end = $request->fecha_reserva;
        $evento->color = '#4e87de ';
        $evento->user_id = Auth::user()->id;
        $evento->doctor_id = $request->doctor_id;
        $evento->box_id = '1';
        $evento->horario_id = '1';
        $evento->save();

        return redirect()->route('admin.index')
            ->with('mensaje', 'Box asignado correctamente')
            ->with('icono', 'success')

    }


    public function show(Event $event)
    {
        //
    }


    public function edit(Event $event)
    {
        //
    }


    public function update(Request $request, Event $event)
    {
        //
    }


    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->back()->with([
            'mensaje' => 'Se elimino la reserva de la manera correcta',
            'icono' => 'success',
        ]);
    }

    public function reportes(){
        return view('admin.reservas.reportes');
    }

    public function pdf(){
        $configuracion = Configuracione::latest()->first();
        $eventos = Event::all();

        $pdf = \PDF::loadView('admin.reservas.pdf', compact('configuracion','eventos'));

        // Incluir la numeración de páginas y el pie de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));


        return $pdf->stream();
    }

    public function pdf_fechas(Request $request){
        //$datos = request()->all();
        //return response()->json($datos);

        $configuracion = Configuracione::latest()->first();

        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $eventos = Event::whereBetween('start',[$fecha_inicio, $fecha_fin])->get();

        $pdf = \PDF::loadView('admin.reservas.pdf_fechas', compact('configuracion','eventos','fecha_inicio','fecha_fin'));

        // Incluir la numeración de páginas y el pie de página
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));


        return $pdf->stream();
    }

}
