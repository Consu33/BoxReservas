@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificación de Pacientes: {{$paciente->nombre."".$paciente->apellido}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Completa los Datos</h3>                        
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/pacientes', $paciente->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Rut</label> <b>*</b>
                                        <input type="text" value="{{$paciente->rut}}" name="rut" class="form-control" required>
                                        @error('rut')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Nombre</label> <b>*</b>
                                        <input type="text" value="{{$paciente->nombre}}" name="nombre" class="form-control" required>
                                        @error('nombre')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Apellido</label> <b>*</b>
                                        <input type="text" value="{{$paciente->apellido}}" name="apellido" class="form-control" required>
                                        @error('apellido')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Fecha de Nacimiento</label> <b>*</b>
                                        <input type="date" value="{{$paciente->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" required>
                                        @error('fecha_nacimiento')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Genero</label> 
                                        <select name="genero" id="" class="form-control">
                                            @if($paciente->genero=='M') 
                                                <option value="M">Masculino</option>
                                                <option value="F">Femenino</option>
                                            @else Femenino                                   
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            @endif 
                                        </select>
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Celular</label> <b>*</b>
                                        <input type="number"  value="{{$paciente->celular}}" name="celular" class="form-control" required>
                                        @error('celular')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Correo</label> <b>*</b>
                                        <input type="email"  value="{{$paciente->correo}}" name="correo" class="form-control" required>
                                        @error('correo')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Dirección</label> <b>*</b>
                                        <input type="address"  value="{{$paciente->direccion}}" name="direccion" class="form-control" required>
                                        @error('direccion')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Comuna</label> <b>*</b>
                                        <input type="address"  value="{{$paciente->comuna}}" name="comuna" class="form-control" required>
                                        @error('comuna')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Contacto de Emergencia (Nombre y Número)</label>
                                        <input type="text"  value="{{$paciente->observaciones}}" name="observaciones" class="form-control">
                                        @error('observaciones')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar Paciente</button>
                                    </div>    
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection