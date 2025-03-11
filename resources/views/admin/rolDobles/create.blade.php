@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de Enfermeras/os con Roles Dobles</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Completa los Datos</h3>                        
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/rolDobles/create')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Rut</label> <b>*</b>
                                        <input type="text" value="{{old('rut')}}" name="rut" class="form-control" required>
                                        @error('rut')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Nombre</label> <b>*</b>
                                        <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                                        @error('nombre')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Apellidos</label> <b>*</b>
                                        <input type="text" value="{{old('apellido')}}"  name="apellido" class="form-control" required>
                                        @error('apellido')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>                            
                           <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Profesión</label> <b>*</b>
                                        <select name="profesion" id="" class="form-control">
                                            <option value="">-</option>
                                            <option value="medico">Médico/a</option>
                                            <option value="enfermera">Enfermera/o</option>
                                            <option value="kinesiologo">Kinesiólogo/a</option>
                                            <option value="terapeuta_profesional">Terapeuta Profesional</option>
                                            <option value="tens">Tens</option>
                                            <option value="tecnologo_medico">Tecnólogo médico</option>
                                            <option value="matrona">Matrona</option>
                                            <option value="nutricionista">Nutricionista</option>
                                        </select>
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Correo Electrónico</label> <b>*</b>
                                        <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
                                        @error('email')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Contraseña</label> <b>*</b>
                                        <input type="password" value="{{old('password')}}" name="password" class="form-control" required>
                                        @error('password')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Verificación de Contraseña</label> <b>*</b>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                        @error('password_confirmation')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/rolDobles')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Registrar nuevo</button>
                                    </div>    
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection