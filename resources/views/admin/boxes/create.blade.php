@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de Box</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Completar los Datos</h3>                        
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/boxes/create')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Número Box</label> <b>*</b>
                                        <input type="text" value="{{old('numero')}}" name="numero" class="form-control" required>
                                        @error('numero')
                                        <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Recinto</label> <b>*</b>
                                        <select name="recinto" id="" class="form-control">
                                            <option value="">-</option>
                                            <option value="nefrologia">Nefrología</option>
                                            <option value="prequirurgico">Prequirúrgico</option>
                                            <option value="procedimiento">Procedimiento</option>
                                            <option value="oncologia">Oncología</option>
                                            <option value="medicina_fisica_y_rehabilitacion">Medicina Fisica y Rehabilitación</option>
                                            <option value="diferenciado">Diferenciado</option>
                                            <option value="indiferenciado">Indiferenciado</option>
                                            <option value="odontologia">Odontología</option>
                                            <option value="psiquiatria">Psiquiatría</option>
                                        </select>
                                        @error('recinto')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Especialidad</label> <b>*</b>
                                        <select name="especialidades" id="" class="form-control">
                                            <option value="">-</option>
                                            <option value="indiferenciado">Indiferenciado</option>
                                            <option value="diferenciado">Diferenciado</option>
                                        </select>
                                    </div>    
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Piso</label> <b>*</b>
                                        <select name="piso" id="" class="form-control">
                                            <option value="">-</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                        </select>
                                    </div>    
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Torre</label> <b>*</b>
                                        <select name="torre" id="" class="form-control">
                                            <option value="">-</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/boxes')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Registrar Box</button>
                                    </div>    
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection