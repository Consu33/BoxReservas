@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Horarios Programados para Hoy</h1>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <form method="GET" action="{{url('admin/horarios/informacion')}}">
                        <label for="fecha">Seleccionar Fecha:</label>
                        <input type="date" name="fecha" id="fecha" value="{{ request('fecha', Carbon\Carbon::today()->toDateString()) }}">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>           
            
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm w-100">
                    <thead style="background-color: #c0c0c0;">
                        <tr>
                            <th style="text-align: center;">Doctor</th>
                            <th style="text-align: center;">Especialidad</th>
                            <th style="text-align: center;">Box</th>
                            <th style="text-align: center;">Piso/Torre</th>
                            <th style="text-align: center;">Hora de Inicio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($horarios as $horario)
                        <tr>
                            <td style="text-align: center;">{{$horario->doctor->nombre." ".$horario->doctor->apellido}}</td>
                            <td style="text-align: center;">{{$horario->doctor->profesion}}</td>
                            <td style="text-align: center;">{{$horario->box->numero." ".$horario->box->recinto}}</td>
                            <td style="text-align: center;">{{$horario->box->piso." ".$horario->box->torre}}</td>
                            <td style="text-align: center;">{{\Carbon\Carbon::parse($horario->hora_inicio)->format('H:i')}}</td>
                        </tr>
                        @endforeach
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Bootstrap JS (incluye Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection