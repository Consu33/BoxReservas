@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Listado de Configuraciones</h1>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Configuraciones</h3>

                <div class="card-tools">
                    <a href="{{url('admin/configuraciones/create')}}" class="btn btn-primary">
                        Registrar Nuevo
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0;">
                        <tr>
                            <td style="text-align: center;"><b>Nro</b></td>
                            <td style="text-align: center;"><b>Hospital/Clinica</b></td>
                            <td style="text-align: center;"><b>Dirección</b></td>
                            <td style="text-align: center;"><b>Telefono</b></td>                            
                            <td style="text-align: center;"><b>Correo</b></td>     
                            <td style="text-align: center;"><b>Logo</b></td>                        
                            <td style="text-align: center;"><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($configuraciones as $configuracione)
                        <tr>
                            <td style="text-align: center;">{{$contador++}}</td>
                            <td style="text-align: center;">{{$configuracione->nombre}}</td>
                            <td style="text-align: center;">{{$configuracione->direccion}}</td>
                            <td style="text-align: center;">{{$configuracione->telefono}}</td>
                            <td style="text-align: center;">{{$configuracione->correo}} </td>                            
                            <td>
                                <img src="{{url('storage/'.$configuracione->logo)}}" alt="logo">
                            </td>
                            
                            <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/configuraciones/'.$configuracione->id)}}" button type="button" class="btn btn-info btn-sm"><i class="bi bi-eye" data-toggle="tooltip" data-placement="bottom" title="Ver"></i></a>
                                    <a href="{{url('admin/configuraciones/'.$configuracione->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil" data-toggle="tooltip" data-placement="bottom" title="Editar"></i></a>
                                    <a href="{{url('admin/configuraciones/'.$configuracione->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash" data-toggle="tooltip" data-placement="bottom" title="Borrar"></i></a>
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
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Configuraciones",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Configuraciones",
                                "infoFiltered": "(Filtrado de MAX total Configuraciones)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Configuraciones",
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