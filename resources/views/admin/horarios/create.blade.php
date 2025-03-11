@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registrar nuevo Horario</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="card-title">Calendario de Atención de Box, consulta la información que necesitas...</h3>
                    </div>
                    <div class="col-md-4">
                        <div style="float: center">
                            <label for=""></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select name="box_id" id="box_select" class="form-control">
                            <option value="">Seleccionar un Box...</option>
                            @foreach($boxes as $box)
                                <option value="{{$box->id}}">{{$box->numero." - ".$box->recinto}}</option>
                            @endforeach
                        </select>
                        <script>
                            $('#box_select').on('change', function () {
                                var box_id = $('#box_select').val();
                                //alert(box_id);

                                if(box_id){
                                    $.ajax({
                                        url: "{{url('/boxes/')}}" + '/' + box_id,
                                        type: 'GET',
                                        success: function (data) {
                                            $('#box_info').html(data);
                                        },
                                        error: function () {
                                            alert('Error al obtener los datos');
                                        }
                                    });
                                }else{
                                    $('#box_info').html('');
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear nuevo horario</button>

                <!-- Modal -->
                <form action="{{url('/admin/horarios/create')}}" method="post">
                    @csrf
                    <input type="hidden" name="box_id" id="box_id_hidden"> <!-- Campo oculto para box_id -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reserva de Box</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="doctor_select">Doctor</label>
                                                <select name="doctor_id" id="" class="form-control">
                                                    @foreach($doctores as $doctor)
                                                    <option value="{{$doctor->id}}">{{ $doctor->nombre." ".$doctor->apellido." - ".$doctor->profesion}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fecha de Reserva</label>
                                                <input type="date" id="fecha_reserva" value="<?php echo date('Y-m-d') ?>" name="fecha_reserva" class="form-control">
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        const fechaReservaInput = document.getElementById('fecha_reserva');

                                                        //Escuchar el evento de cambio en el campo de fecha reserva
                                                        fechaReservaInput.addEventListener('change', function() {
                                                            let selectedDate = this.value; //Obtener la Fecha seleccionada

                                                            //Obtener la fecha actual en formato ISO (yyyy-mm-dd)
                                                            let today = new Date().toISOString().slice(0, 10);

                                                            //Verificar si la fecha seleccionada es anterior a la fecha actual
                                                            if (selectedDate < today) {
                                                                //Si es así, establecer la fecha seleccionada en null
                                                                this.value = null;
                                                                alert('Fecha pasada, imposible reservar');
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Hora Inicio</label>
                                                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control">
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        const horaInicioInput = document.getElementById('hora_inicio');

                                                        //Escuchar el evento de cambio en el campo de fecha reserva
                                                        horaInicioInput.addEventListener('change', function() {
                                                            let selectedTime = this.value; //Obtener la Fecha seleccionada

                                                            //Asegurar que solo se capture la parte de la hora
                                                            if (selectedTime){
                                                                selectedTime = selectedTime.split(':'); // Divide la cadena en horas y mninutos
                                                                selectedTime = selectedTime[0] + ':00'; // Conserva solo la hora, ignorar los minutos
                                                                this.value = selectedTime; // Establacer la hora modificada en el campo entrada
                                                            }
                                                            
                                                            //Verificar si la hora seleccionada está fuera del rango permitido
                                                            if (selectedTime < '08:00' || selectedTime > '20:00') {
                                                                //Si es así, establecer la hora seleccionada en null
                                                                this.value = null;
                                                                alert('Favor de ingresar un horario valido (08:00 - 20:00)');
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Hora Termino</label>
                                                <input type="time" name="hora_termino" id="hora_termino" class="form-control">
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        const horaInicioInput = document.getElementById('hora_termino');

                                                        //Escuchar el evento de cambio en el campo de fecha reserva
                                                        horaInicioInput.addEventListener('change', function() {
                                                            let selectedTime = this.value; //Obtener la Fecha seleccionada

                                                            //Asegurar que solo se capture la parte de la hora
                                                            if (selectedTime){
                                                                selectedTime = selectedTime.split(':'); // Divide la cadena en horas y mninutos
                                                                selectedTime = selectedTime[0] + ':00'; // Conserva solo la hora, ignorar los minutos
                                                                this.value = selectedTime; // Establacer la hora modificada en el campo entrada
                                                            }
                                                            
                                                            //Verificar si la hora seleccionada está fuera del rango permitido
                                                            if (selectedTime < '08:00' || selectedTime > '20:00') {
                                                                //Si es así, establecer la hora seleccionada en null
                                                                this.value = null;
                                                                alert('Favor de ingresar un horario valido (08:00 - 20:00)');
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div id="calendar"></div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',
                            locale: 'es',
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },
                            events: [
                                @foreach($horarios as $horario)
                                {
                                    title: '{{ $horario->title }}',
                                    start: '{{\Carbon\Carbon::parse($horario->start)->format('Y-m-d')}}',
                                    end: '{{\Carbon\Carbon::parse($horario->end)->format('Y-m-d')}}',
                                    color: '{{ trim($horario->color) }}',
                                    textColor: '#fcfcfc '
                                }, 
                                @endforeach
                            ],
                        });
                        calendar.render();
                        // Actualizar el valor del campo oculto box_id_hidden al cambiar el Box
                        document.getElementById('box_select').addEventListener('change', function() {
                            var selectedBoxId = this.value; // Obtiene el ID del Box seleccionado
                            document.getElementById('box_id_hidden').value = selectedBoxId; // Actualiza el campo oculto
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection