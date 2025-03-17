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
<<<<<<< HEAD
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
=======
                                <option value="{{$box->id}}" {{ old('box_id') == $box->id ? 'selected' : '' }}>
                                    {{ $box->numero . " - " . $box->recinto }}
                                </option>
                            @endforeach
                        </select>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const boxSelect = document.getElementById("box_select");
                                const boxHiddenInput = document.getElementById("box_id_hidden");
                        
                                // Actualiza el valor del input oculto con el valor seleccionado en el select
                                boxSelect.addEventListener("change", function () {
                                    boxHiddenInput.value = boxSelect.value;
                                });
                            });
                        </script>                                         
                        <script>
                            
                                //alert(box_id);
                                document.addEventListener("DOMContentLoaded", function () {
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    initialView: 'dayGridMonth',
                                    locale: 'es',
                                    headerToolbar: {
                                        left: 'prev,next today',
                                        center: 'title',
                                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                                    },
                                    events: [] // Se cargarán eventos más adelante
                                });

                                calendar.render();

                                // Cargar eventos automáticamente si hay un Box seleccionado
                                var box_id = $('#box_select').val(); // Obtener el valor seleccionado del dropdown
                                if (box_id) {
                                    cargarEventos(box_id, calendar);
                                }

                                // Manejar cambios en el select de Boxes
                                $('#box_select').on('change', function () {
                                    box_id = $(this).val();
                                    recargarCalendario(box_id, calendar);
                                    });

                                    function cargarEventos(box_id, calendar) {
                                        $.ajax({
                                            url: "{{ url('/cargar_fullCalendar/') }}" + '/' + box_id,
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function (data) {
                                                calendar.addEventSource(data); // Añadir eventos al calendario
                                            },
                                            error: function(xhr) {
                                                console.log('Error recibido:', xhr); // Depuración
                                                if (xhr.status === 409) {
                                                    alert(xhr.responseJSON.error); // Mostrar mensaje de duplicidad
                                                } else {
                                                    alert('Ocurrió un error inesperado.');
                                                }

                                                // Limpia solo la selección actual sin afectar el calendario ni sus eventos
                                                calendar.unselect(); // Permite nuevas selecciones tras un error
                                            }
                                        });
                                    }

                                // Manejar cambios en el select
                                function recargarCalendario(box_id, calendar) {
                                        // Elimina las fuentes de eventos existentes
                                        calendar.getEventSources().forEach(function (source) {
                                            source.remove(); // Borra cada fuente de evento
                                        });

                                        if (box_id) {
                                            cargarEventos(box_id, calendar); // Carga los eventos del nuevo box_id
                                        }
                                    }
                                });
                             
>>>>>>> ramaHija
                        </script>
                    </div>
                </div>
            </div>

            <div id="box_info"></div>

            <div class="card-body">
                <div class="row">
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear nuevo horario</button>

                <!-- Modal -->
                <form action="{{url('/admin/horarios/create')}}" method="post">
                    @csrf
                    <input type="hidden" name="box_id" id="box_id_hidden"> <!-- Campo oculto para box_id -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
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
                                                <input type="date" id="fecha_inicio" value="{{ old('fecha_inicio') }}" name="fecha_inicio" class="form-control">
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        const fechaReservaInput = document.getElementById('fecha_inicio');

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
                                                <input type="time" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio') }}" class="form-control">
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
                                                <input type="time" name="hora_termino" id="hora_termino" value="{{ old('hora_termino') }}" class="form-control">
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
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
<<<<<<< HEAD
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
=======
                        @if(session('error'))
                            $('#exampleModal').modal('show');
                        @endif
>>>>>>> ramaHija
                    });
                </script>                

                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
@endsection