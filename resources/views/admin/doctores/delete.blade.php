@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Doctor: {{$doctor->nombre." ".$doctor->apellido}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Estás Seguro de Eliminar este Registro?</h3>                        
                </div>
                <div class="card-body">
                    <form action="{{url('admin/doctores', $doctor->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
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
                                    <button type="submit" class="btn btn-danger">Eliminar Registro</button>
                                </div>    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection