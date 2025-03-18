<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Reservas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <!-- Iconos Bootstrap -->
  <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css')}}">

  <!-- jQuery -->
  <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

  <!-- Sweealert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- FullCalendar -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
  <script src="{{url('fullCalendar/es.global.js')}}"></script>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('/admin')}}" class="nav-link">Panel Principal</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema de Reservas</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }} {{ Auth::user()->apellido }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @can('admin.usuarios.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-people-fill"></i>
                <p>
                  Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/usuarios/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación de Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/usuarios')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            @can('admin.enfermeras.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-person-circle"></i>
                <p>
                  Enfermeros(as)
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/enfermeras/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación Enfermeros(as)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/enfermeras')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado Enfermeros(as)</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            @can('admin.rolDobles.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-incognito"></i>
                <p>
                  Rol Dobles
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/rolDobles/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación Rol Dobles</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/rolDobles')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado Rol Dobles</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan


            @can('admin.pacientes.index')
            <!--<li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-person-fill-check"></i>
                <p>
                  Pacientes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/pacientes/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación de Paciente</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/pacientes')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Pacientes</p>
                  </a>
                </li>
              </ul>
            </li>-->
            @endcan

            @can('admin.boxes.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-calendar2-x"></i>
                <p>
                  Box
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/boxes/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación de Box</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/boxes')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Boxes</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            @can('admin.doctores.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-person-lines-fill"></i>
                <p>
                  Doctores
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/doctores/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación de Doctores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/doctores')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Doctores</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            @can('admin.horarios.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-stopwatch"></i>
                <p>
                  Horarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/horarios/create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creación de Horarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/horarios')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Horarios</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link" style="background-color: #a9200e;" id=""
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                <i class="nav-icon fas bi bi-door-closed-fill"></i>
                <p>
                  Cerrar Sesión
                </p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    @if( (($message = Session::get('mensaje')) && ($icono = Session::get('icono'))) )
    <script>
      Swal.fire({
        position: "top-end",
        icon: "{{$icono}}",
        title: "{{$message}}",
        showConfirmButton: false,
        timer: 2000
      });
    </script>
    @endif

    <div class="content-wrapper">
      <br><br>
      <div class="container">
        @yield('content')
      </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Default to the left -->

    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- Bootstrap 4 -->
  <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- DataTable -->
  <script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

  <!-- AdminLTE App -->
  <script src="{{url('dist/js/adminlte.min.js')}}"></script>
</body>

</html>