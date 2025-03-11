@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Modificar Registro de Enfermera/os: {{$enfermera->nombre}} {{$enfermera->apellido}}</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Editar los Datos</h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/enfermeras', $enfermera->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Rut</label><b>*</b>
                                <input type="text" value="{{$enfermera->rut}}" name="rut" class="form-control" required>
                                @error('rut')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Nombre</label><b>*</b>
                                <input type="text" value="{{$enfermera->nombre}}" name="nombre" class="form-control" required>
                                @error('nombre')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Apellidos</label><b>*</b>
                                <input type="text" value="{{$enfermera->apellido}}" name="apellido" class="form-control" required>
                                @error('apellido')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Profesión</label><b>*</b>
                                <select name="profesion" id="profesion" class="form-control">
                                    <option value="" @if($enfermera->profesion == '') selected @endif>-</option>
                                    <option value="medico" @if($enfermera->profesion == 'medico') selected @endif>Médico</option>
                                    <option value="enfermera" @if($enfermera->profesion == 'enfermera') selected @endif>Enfermera</option>
                                    <option value="kinesiologo" @if($enfermera->profesion == 'kinesiologo') selected @endif>Kinesiólogo</option>
                                    <option value="terapeuta_profesional" @if($enfermera->profesion == 'terapeuta_profesional') selected @endif>Terapeuta Profesional</option>
                                    <option value="tens" @if($enfermera->profesion == 'tens') selected @endif>Tens</option>
                                    <option value="tecnologo_medico" @if($enfermera->profesion == 'tecnologo_medico') selected @endif>Tecnólogo médico</option>
                                    <option value="matrona" @if($enfermera->profesion == 'matrona') selected @endif>Matrona</option>
                                    <option value="nutricionista" @if($enfermera->profesion == 'nutricionista') selected @endif>Nutricionista</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Correo Electronico</label><b>*</b>
                                <input type="email" value="{{$enfermera->user->email}}" name="email" class="form-control" required>
                                @error('email')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Contraseña</label>
                                <input type="password" value="{{old('password')}}" name="password" class="form-control">
                                @error('password')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Verificación de Contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/enfermeras')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar Registro</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection