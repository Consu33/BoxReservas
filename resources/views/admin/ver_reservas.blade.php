@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de Reservas</h1>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Reservas Registradas</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0;">
                        <tr>
                            <td style="text-align: center;"><b>Nro</b></td>
                            <td style="text-align: center;"><b>Doctor</b></td>
                            <td style="text-align: center;"><b>Especialidad</b></td>
                            <td style="text-align: center;"><b>Fecha de reserva</b></td>
                            <td style="text-align: center;"><b>Hora de reserva</b></td>
                            <td style="text-align: center;"><b>Fecha y Hora de Registro</b></td>
                            <td style="text-align: center;"><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($eventos as $evento)
                        <tr>
                            <td style="text-align: center;">{{$contador++}}</td>
                            <td style="text-align: center;">{{$evento->doctor->nombre." ".$evento->doctor->apellido}}</td>
                            <td style="text-align: center;">{{$evento->doctor->especialidad}}</td>
                            <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->start)->format('d-m-Y')}}</td>
                            <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->end)->format('H:i')}}</td>
                            <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->created_at)->format('d-m-Y H:i')}}</td>
                            <td style="text-align: center;">                                
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="{{url('/admin/eventos/destroy',$evento->id)}}"
                                        id="formulario{{$evento->id}}" onclick="preguntar{{$evento->id}}(event)" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ">
                                            <i class=" bi bi-trash"></i>
                                        </button>
                                    </form>
                                    <script>
                                        function preguntar{{$evento->id}}(event) {
                                            event.preventDefault();
                                            Swal.fire({
                                                title: "¿Está seguro de eliminar la reserva?",
                                                text: "Si elimina esta reserva, la hora quedará disponible para otro usuario",
                                                icon: "question",
                                                showDenyButton: true,
                                                showCancelButton: false, 
                                                confirmButtonText: 'Eliminar',
                                                cancelButtonText: 'Cancelar'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    var form = $('#formulario{{$evento->id}}');
                                                    form.submit();
                                                }
                                            });
                                        }
                                    </script>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(function() {
                        $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Box",
                                "infoFiltered": "(Filtrado de MAX total Reservas)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Reservas",
                                "loadingRecords": "Cargando...",
                                "processing": "Procesando...",
                                "search": "Buscador:",
                                "zeroRecords": "Sin resultados encontrados",
                                "paginate": {
                                    "first": "Primero",
                                    "last": "Ultimo",
                                    "next": "Siguiente",
                                    "previous": "Anterior"
                                }
                            },
                            "responsive": true,
                            "lengthChange": true,
                            "autoWidth": false,
                            buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    }, {
                                        extend: 'csv'
                                    }, {
                                        extend: 'excel'
                                    }, {
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }]
                                },
                                {
                                    extend: 'colvis',
                                    text: 'Visor de columnas',
                                    collectionLayout: 'fixed three-column'
                                }
                            ],
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    });
                </script>
            </div>
        </div>
    </div>
</div>

@endsection