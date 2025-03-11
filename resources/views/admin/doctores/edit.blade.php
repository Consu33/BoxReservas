@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Doctor: {{$doctor->nombre." ".$doctor->apellido}}</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Completar los Datos</h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/doctores', $doctor->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Nombre</label> <b>*</b>
                                <input type="text" value="{{$doctor->nombre}}" name="nombre" class="form-control" required>
                                @error('nombre')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Apellido</label> <b>*</b>
                                <input type="text" value="{{$doctor->apellido}}" name="apellido" class="form-control" required>
                                @error('apellido')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Profesión</label> <b>*</b>
                                <select name="profesion" id="profesion" class="form-control">
                                    <option value="" @if($doctor->profesion == '') selected @endif>-</option>
                                    <option value="medico" @if($doctor->profesion == 'medico') selected @endif>Médico</option>
                                    <option value="enfermera" @if($doctor->profesion == 'enfermera') selected @endif>Enfermera</option>
                                    <option value="kinesiologo" @if($doctor->profesion == 'kinesiologo') selected @endif>Kinesiólogo</option>
                                    <option value="terapeuta_profesional" @if($doctor->profesion == 'terapeuta_profesional') selected @endif>Terapeuta Profesional</option>
                                    <option value="tens" @if($doctor->profesion == 'tens') selected @endif>Tens</option>
                                    <option value="tecnologo_medico" @if($doctor->profesion == 'tecnologo_medico') selected @endif>Tecnólogo médico</option>
                                    <option value="matrona" @if($doctor->profesion == 'matrona') selected @endif>Matrona</option>
                                    <option value="nutricionista" @if($doctor->profesion == 'nutricionista') selected @endif>Nutricionista</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Correo Electronico</label> <b>*</b>
                                <input type="email" value="{{$doctor->user->email}}" name="email" class="form-control" required>
                                @error('email')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Contraseña</label> <b>*</b>
                                <input type="password" value="{{old('password')}}" name="password" class="form-control" required>
                                @error('password')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
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
                                <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar Datos</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection