@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Eliminar Enfermera/os: {{$enfermera->nombre}} {{$enfermera->apellido}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">¿Estás Seguro de Eliminar este Registro?</h3>                        
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/enfermeras', $enfermera->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Rut</label>
                                        <input type="text" value="{{$enfermera->rut}}" name="rut" class="form-control" disabled>
                                        @error('rut')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Nombre</label>
                                        <input type="text" value="{{$enfermera->nombre}}" name="nombre" class="form-control" disabled>
                                        @error('nombre')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Apellidos</label>
                                        <input type="text" value="{{$enfermera->apellido}}"  name="apellido" class="form-control" disabled>
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
                                        <label for="">Servicio</label>
                                        <input type="text"  value="{{$enfermera->profesion}}" name="profesion" class="form-control" disabled>
                                        @error('profesion')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Correo Electronico</label>
                                        <input type="email" value="{{$enfermera->user->email}}" name="email" class="form-control" disabled>
                                        @error('email')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>                            
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/enfermeras')}}" class="btn btn-secondary">Cancelar</a>
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