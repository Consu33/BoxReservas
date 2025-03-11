@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de Nuevos Pacientes</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Completar los Datos</h3>                        
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/pacientes/create')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Rut</label> <b>*</b>
                                        <input type="text" value="{{old('rut')}}" name="rut" class="form-control" required>
                                        @error('rut')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Nombre</label> <b>*</b>
                                        <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                                        @error('nombre')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Apellido</label> <b>*</b>
                                        <input type="text" value="{{old('apellido')}}" name="apellido" class="form-control" required>
                                        @error('apellido')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Fecha de Nacimiento</label> <b>*</b>
                                        <input type="date" value="{{old('fecha_nacimiento')}}" name="fecha_nacimiento" class="form-control" required>
                                        @error('fecha_nacimiento')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Genero</label> 
                                        <select name="genero" id="" class="form-control">
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Celular</label> <b>*</b>
                                        <input type="number"  value="{{old('celular')}}" name="celular" class="form-control" required>
                                        @error('celular')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Correo</label> <b>*</b>
                                        <input type="email"  value="{{old('correo')}}" name="correo" class="form-control" required>
                                        @error('correo')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Dirección</label> <b>*</b>
                                        <input type="address"  value="{{old('direccion')}}" name="direccion" class="form-control" required>
                                        @error('direccion')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Comuna</label> <b>*</b>
                                        <input type="address"  value="{{old('comuna')}}" name="comuna" class="form-control" required>
                                        @error('comuna')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Contacto de Emergencia (Nombre y Número)</label>
                                        <input type="text"  value="{{old('observaciones')}}" name="observaciones" class="form-control">
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
                                        <button type="submit" class="btn btn-primary">Registrar Paciente</button>
                                    </div>    
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection