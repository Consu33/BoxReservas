@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Actualización de un Box : {{$box->numero}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Completar los Datos</h3>                        
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/boxes', $box->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="numero">Número Box</label> 
                                        <input type="number" id="numero" value="{{$box->numero}}" name="numero" class="form-control" required>
                                        @error('numero')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="servicio">Recinto</label> 
                                        <select name="recinto" id="" class="form-control">
                                            <option value=""@if($box->recinto == '') selected @endif>-</option>
                                            <option value="nefrologia" @if($box->recinto == 'nefrologia') selected @endif>Nefrología</option>
                                            <option value="prequirurgico" @if($box->recinto == 'prequirurgico') selected @endif>Prequirúrgico</option>
                                            <option value="procedimiento" @if($box->recinto == 'procedimiento') selected @endif>Procedimiento</option>
                                            <option value="oncologia" @if($box->recinto == 'oncologia') selected @endif>Oncología</option>
                                            <option value="medicina_fisica_y_rehabilitacion" @if($box->recinto == 'medicina_fisica_y_rehabilitacion') selected @endif>Medicina Fisica y Rehabilitación</option>
                                            <option value="diferenciado" @if($box->recinto == 'diferenciado') selected @endif>Diferenciado</option>
                                            <option value="indiferenciado" @if($box->recinto == 'indiferenciado') selected @endif>Indiferenciado</option>
                                            <option value="odontologia" @if($box->recinto == 'odontologia') selected @endif>Odontología</option>
                                            <option value="psiquiatria" @if($box->recinto == 'psiquiatria') selected @endif>Psiquiatría</option>
                                        </select>
                                    </div>    
                                </div>                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="especialidades">Especialidad</label>
                                        <select name="especialidades" id="especialidades" class="form-control">
                                            @if($box->especialidades=='indiferenciado')
                                                <option value="indiferenciado">Indiferenciado</option>
                                                <option value="diferenciado">Diferenciado</option>
                                            @else                                            
                                                <option value="diferenciado">Diferenciado</option> 
                                                <option value="indiferenciado">Indiferenciado</option>                                             
                                            @endif                                            
                                        </select>
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/boxes')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar Box</button>
                                    </div>    
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection