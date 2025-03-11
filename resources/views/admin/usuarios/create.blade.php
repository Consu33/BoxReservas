@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de Nuevos Usuarios</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Completar los Datos</h3>                        
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/usuarios/create')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Nombre del Usuario</label> <b>*</b>
                                        <input type="text" value="{{old('name')}}" name="name" class="form-control" required>
                                        @error('name')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Rut</label> <b>*</b>
                                        <input type="text" value="{{old('rut')}}" name="rut" class="form-control" required>
                                        @error('rut')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Correo Electronico</label> <b>*</b>
                                        <input type="email" value="{{old('email')}}"  name="email" class="form-control" required>
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
                                        <label for="">Contraseña</label> <b>*</b>
                                        <input type="password"  value="{{old('password')}}" name="password" class="form-control" required>
                                        @error('password')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
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
                                        <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Registrar usuario</button>
                                    </div>    
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection