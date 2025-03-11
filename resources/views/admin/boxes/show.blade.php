@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Box: {{$box->numero}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos registrados</h3>                        
                    </div>
                    <div class="card-body">
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
                                        <a href="{{url('admin/boxes')}}" class="btn btn-secondary">Volver</a>
                                    </div>    
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection