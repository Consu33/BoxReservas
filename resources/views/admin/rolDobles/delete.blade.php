@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Eliminar Registro de Roles Dobles: {{$rolDoble->nombre}} {{$rolDoble->apellido}}</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Seguro que deseas Eliminar este Registro?</h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/rolDobles', $rolDoble->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Rut</label>
                                <input type="text" value="{{$rolDoble->rut}}" name="rut" class="form-control" disabled>
                                @error('rut')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Nombre</label>
                                <input type="text" value="{{$rolDoble->nombre}}" name="nombre" class="form-control" disabled>
                                @error('nombre')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Apellidos</label>
                                <input type="text" value="{{$rolDoble->apellido}}" name="apellido" class="form-control" disabled>
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
                                <label for="">Profesión</label>
                                <select name="profesion" id="profesion" class="form-control" disabled>
                                    <option value="" @if($rolDoble->profesion == '') selected @endif>-</option>
                                    <option value="medico" @if($rolDoble->profesion == 'medico') selected @endif>Médico</option>
                                    <option value="enfermera" @if($rolDoble->profesion == 'enfermera') selected @endif>Enfermera</option>
                                    <option value="kinesiologo" @if($rolDoble->profesion == 'kinesiologo') selected @endif>Kinesiólogo</option>
                                    <option value="terapeuta_profesional" @if($rolDoble->profesion == 'terapeuta_profesional') selected @endif>Terapeuta Profesional</option>
                                    <option value="tens" @if($rolDoble->profesion == 'tens') selected @endif>Tens</option>
                                    <option value="tecnologo_medico" @if($rolDoble->profesion == 'tecnologo_medico') selected @endif>Tecnólogo médico</option>
                                    <option value="matrona" @if($rolDoble->profesion == 'matrona') selected @endif>Matrona</option>
                                    <option value="nutricionista" @if($rolDoble->profesion == 'nutricionista') selected @endif>Nutricionista</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Correo Electronico</label>
                                <input type="email" value="{{$rolDoble->user->email}}" name="email" class="form-control" disabled>
                                @error('email')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/rolDobles')}}" class="btn btn-secondary">Cancelar</a>
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