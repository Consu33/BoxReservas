<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Sistema de Reservas Box Felix Bulnes</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (incluye Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:soporteti.hfbc@redsalud.gob.cl">soporteti.hfbc@redsalud.gob.cl</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>Anexo: 226868</span></i>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto text-decoration-none">
          <h1 class="sitename">Box Reservas Medicas</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#"><br></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="cta-btn d-none d-sm-block text-decoration-none" href="{{url('login')}}">Ingresar</a>

      </div>
    </div>

  </header>

  <main class="main">

    <section id="hero" class="hero section light-background">

      <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

      <div class="container position-relative">

        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
          <h1>Bienvenido a Sistema de Reservas</h1>
          <p>Hospital Clínico Félix Bulnes Cerda</p>
        </div>
        
      </div>

    </section>

  </main>

<!--   <br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info">
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
                 
                </select>
              </div>
            </div>
          </div>
          <div class="card-body">
            <script>
              $('#box_select').on('change', function() {
                var boxes_id = $('#box_select').val();
                //alert(boxes_id);
                var url = "{{route('cargar_datos_boxes',':id')}}";
                url = url.replace(':id', boxes_id);

                if (boxes_id) {
                  $.ajax({
                    url: url,
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
    </div>
  </div>-->


  <footer id="footer" class="footer light-background">

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>