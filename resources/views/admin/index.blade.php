@extends('layouts.admin')
@section('content')
<div class="row">
    <h1><b>Bienvenido(a)</b> {{Auth::user()->name}} </h1>

</div>

<hr>
<div class="row">

    @can('admin.usuarios.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_usuarios}}</h3>
                <p>Usuarios</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-file-person"></i>
            </div>
            <a href="{{url('admin/usuarios')}}" class="small-box-footer">Más Información<i class="fas bi bi-file-person"></i></a>
        </div>
    </div>
    @endcan

    @can('admin.enfermeras.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$total_enfermeras}}</h3>
                <p>Enfermeros (as)</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-bandaid"></i>
            </div>
            <a href="{{url('admin/enfermeras')}}" class="small-box-footer">Más Información<i class="fas bi bi-file-person"></i></a>
        </div>
    </div>
    @endcan

    @can('admin.rolDobles.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
            <div class="inner">
                <h3>{{$total_rolDobles}}</h3>
                <p>Rol Dobles</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-incognito"></i>
            </div>
            <a href="{{url('admin/rolDobles')}}" class="small-box-footer">Más Información<i class="fas bi bi-file-person"></i></a>
        </div>
    </div>
    @endcan

    @can('admin.pacientes.index')
    <!--<div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$total_pacientes}}</h3>
                <p>Pacientes</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-person-raised-hand"></i>
            </div>
            <a href="{{url('admin/pacientes')}}" class="small-box-footer">Más Información<i class="fas bi bi-file-person"></i></a>
        </div>
    </div>-->
    @endcan


    @can('admin.boxes.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$total_boxes}}</h3>
                <p>Boxes</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-clipboard-pulse"></i>
            </div>
            <a href="{{url('admin/boxes')}}" class="small-box-footer">Más Información<i class="fas bi bi-file-person"></i></a>
        </div>
    </div>
    @endcan

    @can('admin.doctores.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$total_doctores}}</h3>
                <p>Doctores (as)</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-person-video2"></i>
            </div>
            <a href="{{url('admin/doctores')}}" class="small-box-footer">Más Información<i class="fas bi bi-file-person"></i></a>
        </div>
    </div>
    @endcan

    @can('admin.horarios.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{$total_horarios}}</h3>
                <p>Horarios Box</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-stopwatch"></i>
            </div>
            <a href="{{url('admin/horarios')}}" class="small-box-footer">Más Información<i class="fas bi bi-file-person"></i></a>
        </div>
    </div>
    @endcan

    @can('admin.pacientes.index')
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$total_eventos}}</h3>
                <p>Reservas Actuales</p>
            </div>
            <div class="icon">
                <i class="ion fas bi bi-calendar2-check"></i>
            </div>
            <a href="{{url('admin/pacientes')}}" class="small-box-footer"><i class="fas bi"></i></a>
        </div>
    </div>
    @endcan
</div>

@can('admin.horarios.cargar_datos_boxes')
<!--<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
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
                            <option value="{{$box->id}}">{{$box->numero}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <script>
                    $('#box_select').on('change', function() {
                        var boxes_id = $('#box_select').val();
                        //alert(boxes_id);

                        if (boxes_id) {
                            $.ajax({
                                url: "{{url('/boxes/')}}" + '/' + boxes_id,
                                type: 'GET',
                                success: function(data) {
                                    $('#boxes_info').html(data);
                                },
                                error: function() {
                                    alert('Error al obtener los datos');
                                }
                            });
                        } else {
                            $('#boxes_info').html('');
                        }
                    });
                </script>
                <div id="boxes_info">

                </div>
            </div>
        </div>
    </div>
</div>-->
@endcan

@if (Auth::check() && (Auth::user()->hasRole('doctor') || Auth::user()->hasRole('rolDoble')))
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="card-title">Calendario de Reservas</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
            
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0;">
                        <tr>
                            <td style="text-align: center;"><b>Nro</b></td>
                            <td style="text-align: center;"><b>Recinto</b></td>
                            <td style="text-align: center;"><b>Box</b></td>
                            <td style="text-align: center;"><b>Fecha de Reserva</b></td>
                            <td style="text-align: center;"><b>Hora de Reserva</b></td>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($eventos as $evento)
                        @if (Auth::check() && (Auth::user()->hasRole('doctor') || Auth::user()->hasRole('rolDoble')))
                        <tr>
                            <td style="text-align: center;">{{$contador++}}</td>
                            <td style="text-align: center;">{{$evento->box->recinto}} </td>
                            <td style="text-align: center;">{{$evento->box->numero}}</td>
                            <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->start)->format('d-m-Y')}}</td>
                            <td style="text-align: center;">{{\Carbon\Carbon::parse($evento->start)->format('H:i')}}</td>
                        </tr>
                        @endif
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
                                "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
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
@endif



@endsection