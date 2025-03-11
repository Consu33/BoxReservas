@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Bienvenido/a: {{ $rolDoble->nombre }} {{ $rolDoble->apellido }}</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form group">
                            <label for="">Rut</label> <b>*</b>
                            <p>{{$rolDoble->rut}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form group">
                            <label for="">Nombre</label> <b>*</b>
                            <p>{{$rolDoble->nombre}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form group">
                            <label for="">Apellidos</label> <b>*</b>
                            <p>{{$rolDoble->apellido}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Profesión</label> <b>*</b>
                            <p>{{$rolDoble->profesion}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form group">
                            <label for="">Correo Electrónico</label> <b>*</b>
                            <p>{{$rolDoble->user->email}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form group">
                            <a href="{{url('admin/rolDobles')}}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection