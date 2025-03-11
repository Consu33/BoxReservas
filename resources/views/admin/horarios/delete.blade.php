@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Horarios</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">¿Estás Seguro de Eliminar este Registro?</h3>                        
                    </div>
                    <div class="card-body">
                    <form action="{{url('admin/horarios', $horario->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Fecha Registro</label>
                                        <input type="text" value="{{$horario->fecha_inicio}}" name="fecha_inicio" class="form-control" disabled>
                                        @error('fecha_inicio')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Hora Ingreso</label>
                                        <input type="text" value="{{$horario->hora_inicio}}" name="hora_inicio" class="form-control" disabled>
                                        @error('hora_inicio')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Hora Término</label>
                                        <input type="text" value="{{$horario->hora_fin}}"  name="hora_fin" class="form-control" disabled>
                                        @error('hora_fin')
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