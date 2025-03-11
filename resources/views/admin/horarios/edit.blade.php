@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Horario a Editar</h1>
</div>

<hr>
{{ dd($boxes) }}

<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Completar los Datos</h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/horarios', $horario->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Fecha Registro</label> <b>*</b>
                                <input type="date" value="{{$horario->fecha_inicio}}" name="fecha_inicio" class="form-control" required>
                                @error('fecha_inicio')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Hora Ingreso</label> <b>*</b>
                                <input type="text" value="{{$horario->hora_inicio}}" name="hora_inicio" class="form-control" required>
                                @error('hora_inicio')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Hora Término</label> <b>*</b>
                                <input type="text" value="{{$horario->hora_fin}}" name="hora_fin" class="form-control" required>
                                @error('hora_fin')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Box</label> <b>*</b>
                                <select name="box_id" class="form-control" required>
                                    @foreach($boxes as $box)
                                    <option value="{{ $box->id }}"
                                        {{ $horario->box_id == $box->id ? 'selected' : '' }}>
                                        {{ $box->numero . ' - ' . $box->recinto }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('box_id')
                                <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
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