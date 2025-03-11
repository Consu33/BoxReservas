@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Doctor: {{$doctor->nombre." ".$doctor->apellido}}</h1>
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
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre</label> 
                                    <p>{{$doctor->nombre}}</p>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellido</label> 
                                    <p>{{$doctor->apellido}}</p>
                                </div>    
                            </div>
                        </div>                            
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Especialidad</label> 
                                    <p>{{$doctor->especialidad}}</p>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo Electronico</label> 
                                    <p>{{$doctor->user->email}}</p>
                                </div>    
                            </div>
                        </div>              
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Volver</a>
                                </div>    
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection