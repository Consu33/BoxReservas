@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Paciente: {{$paciente->nombre}} {{$paciente->apellido}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">¿Estás Seguro de Eliminar este Registro?</h3>                        
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin/pacientes', $paciente->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Rut</label> 
                                            <p>{{$paciente->rut}}</p>
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Nombre</label> 
                                            <p>{{$paciente->nombre}}</p>
                                        </div>    
                                    </div>                           
                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Apellido</label> 
                                            <p>{{$paciente->apellido}}</p>
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Fecha de Nacimiento</label> 
                                            <p>{{$paciente->fecha_nacimiento}}</p>
                                        </div>    
                                    </div>
                                </div>    
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Genero</label>                                         
                                            <p>
                                                @if($paciente->genero=='M') Masculino @else Femenino @endif
                                            </p>
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Celular</label> 
                                            <p>{{$paciente->celular}}</p>
                                        </div>    
                                    </div>                           
                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Correo</label> 
                                            <p>{{$paciente->correo}}</p>
                                        </div>    
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Dirección</label>                                         
                                            <p>{{$paciente->direccion}}</p>
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Comuna</label> 
                                            <p>{{$paciente->comuna}}</p>
                                        </div>    
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Observaciones</label> 
                                            <p>{{$paciente->observaciones}}</p>
                                        </div>    
                                    </div>                            
                                </div>                                                       
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>
                                            <button type="submit" class="btn btn-danger">Eliminar Paciente</button>
                                        </div>    
                                    </div>
                                </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection