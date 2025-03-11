@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Datos del Horario</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos Registrados</h3>                        
                    </div>
                    <div class="card-body">
                              
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Doctores</label>
                                        <p>{{$horario->doctor->nombre." ".$horario->doctor->apellido}}</p>
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Box</label> 
                                        <p>{{$horario->box->numero." - ".$horario->box->recinto." - ".$horario->box->especialidades}}</p>                                        
                                    </div>    
                                </div>
                            </div>  
                            <br>            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Fecha Registro</label> 
                                        <p>{{$horario->fecha_inicio}}</p>
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Hora Inicio</label> 
                                        <p>{{$horario->hora_inicio}}</p>
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Hora Final</label> 
                                        <p>{{$horario->hora_fin}}</p>
                                    </div>    
                                </div>
                            </div>   
                            <br>            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Volver</a>                                        
                                    </div>    
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
@endsection