@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Box: {{$box->numero}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">¿Estás Seguro de Eliminar este Registro?</h3>                        
                    </div>                    
                    <div class="card-body">
                        <form action="{{url('admin/boxes', $box->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Número Box</label> <b>*</b>
                                        <p>{{$box->numero}}</p>
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Recinto</label> <b>*</b>
                                        <p>{{$box->recinto}}</p>
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Especialidad</label> <b>*</b>
                                        <p>{{$box->especialidades}}</p>
                                    </div>    
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Ubicación</label> <b>*</b>
                                        <p>{{$box->piso}} {{$box->torre}}</p>
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/boxes')}}" class="btn btn-secondary">Cancelar</a>
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