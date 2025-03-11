@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Enfermera/os: {{$enfermera->nombre }} {{$enfermera->apellido }}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos registrados</h3>                        
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Rut</label> 
                                        <p>{{$enfermera->rut}}</p>
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Nombre</label> 
                                        <p>{{$enfermera->nombre}}</p>                                   
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Apellidos</label> 
                                        <p>{{$enfermera->apellido}}</p>                                  
                                    </div>    
                                </div>
                            </div>                            
                           <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Profesión</label> 
                                        <p>{{$enfermera->profesion}}</p>
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Correo Electronico</label> 
                                        <p>{{$enfermera->user->email}}</p>
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/enfermeras')}}" class="btn btn-secondary">Volver</a>
                                    </div>    
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection