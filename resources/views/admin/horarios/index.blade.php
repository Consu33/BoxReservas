@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de Horarios</h1>
</div>
<hr>


<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Horarios Registrados</h3>
                <div class="card-tools">
                    <a href="{{url('admin/horarios/create')}}" class="btn btn-primary">
                        Reserva Nueva
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm w-100">
                    <thead style="background-color: #c0c0c0;">
                        <tr>
                            <th style="text-align: center;">Nro</th>
                            <th style="text-align: center;">Doctor</th>
                            <th style="text-align: center;">Profesión</th>
                            <th style="text-align: center;">Fecha Inicio</th>
                            <th style="text-align: center;">Hora de Inicio</th>
                            <th style="text-align: center;">Hora de Término</th>
                            <th style="text-align: center;">Box</th>
                            <th style="text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($horarios as $horario)
                        <tr>
                            <td style="text-align: center;">{{$contador++}}</td>
                            <td style="text-align: center;">{{$horario->doctor->nombre." ".$horario->doctor->apellido}}</td>
                            <td style="text-align: center;">{{$horario->doctor->profesion}}</td>
                            <td style="text-align: center;">{{$horario->fecha_inicio}}</td>
                            <td style="text-align: center;">{{$horario->hora_inicio}}</td>
                            <td style="text-align: center;">{{$horario->hora_fin}}</td>
                            <td style="text-align: center;">{{$horario->box->numero." ".$horario->box->recinto}}</td>
                            <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/horarios/'.$horario->id)}}" class="btn btn-info btn-sm"><i class="bi bi-eye" data-toggle="tooltip" data-placement="bottom" title="Ver"></i></a>
                                    <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" class="btn btn-success btn-sm"><i class="bi bi-pencil" data-toggle="tooltip" data-placement="bottom" title="Editar"></i></a>
                                    <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" class="btn btn-danger btn-sm"><i class="bi bi-trash" data-toggle="tooltip" data-placement="bottom" title="Borrar"></i></a>
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
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Horarios",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                                "infoFiltered": "(Filtrado de MAX total Horarios)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Horarios",
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

@section('scripts')
<!-- Bootstrap JS (incluye Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection