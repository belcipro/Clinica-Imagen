<!DOCTYPE html>
<html dir="ltr" lang="{{ app()->getLocale() }}">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Medinova - Health & Medical HTML Template" />
<meta name="keywords" content="building,business,construction,cleaning,transport,workshop" />
<meta name="author" content="Clinica odontologica imagen" />

<!-- Page Title -->
<title>Clinica odontologica "Imagen"</title>

<!-- Favicon and Touch Icons -->
<link rel="shortcut icon" href="{{ asset('images/muelitaicon.ico') }}">
{{-- <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png"> --}}
<link href="{{ asset('images/apple-touch-icon.png') }}" rel="apple-touch-icon">
<link href="{{ asset('images/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">
<link href="{{ asset('images/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
<link href="{{ asset('images/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/css-plugin-collections.css') }}" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="{{ asset('css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="{{ asset('css/style-main.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="{{ asset('css/preloader.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="{{ asset('js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
<link  href="{{ asset('js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css"/>
<link  href="{{ asset('js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="{{ asset('css/colors/theme-skin-blue.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="{{ asset('js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="has-side-panel side-panel-right fullwidth-page side-push-panel">
<div class="body-overlay"></div>
<div id="side-panel" class="dark">
  <div class="side-panel-wrap">
    <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon_close font-30"></i></a></div>
    <a href="javascript:void(0)"><img alt="logo" src="{{ asset('images/logo-wide.png') }}"></a>
    <div class="side-panel-nav mt-30">
      <div class="widget no-border">
        <nav>
          <ul class="nav nav-list">
            <li><a href="{{ !\Request::is('/') ? url('/') : '#home' }}">Inicio</a></li>
            <li><a href="{{ !\Request::is('/') ? url('/#about') : '#about' }}">Nosotros</a></li>
            <li><a href="{{ !\Request::is('/') ? url('/#services') : '#services' }}">Servicios</a></li>
            <li><a href="{{ !\Request::is('specialities') ? url('specialities') : '#specialities' }}">Especialidades</a></li>
            <li><a href="{{ !\Request::is('specialities') ? url('specialities#doctors') : '#doctors' }}">Doctores</a></li>
            <li><a href="{{ !\Request::is('gallery') ? url('gallery') : '#gallery' }}">Galleria</a></li>
            <li><a href="{{ !\Request::is('gallery') ? url('gallery#news') : '#news' }}">Eventos</a></li>
            <li><a href="{{ !\Request::is('gallery') ? url('gallery#contact') : '#contact' }}">Contactanos</a></li>
          </ul>
        </nav>        
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="side-panel-widget mt-30">
      <div class="widget no-border">
        <ul>
          <li class="font-14 mb-5"> <i class="fa fa-phone text-theme-colored"></i> <a href="#" class="text-gray">964582594</a> </li>
          <li class="font-14 mb-5"> <i class="fa fa-clock-o text-theme-colored"></i> Lunes-Viernes 8:00 to 2:00 </li>
          <li class="font-14 mb-5"> <i class="fa fa-envelope-o text-theme-colored"></i> <a href="#" class="text-gray">muelyncbmf@hotmail.com</a> </li>
        </ul>      
      </div>
      <div class="widget">
        <ul class="social-icons icon-dark icon-theme-colored icon-sm">
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
      </div>
      </div>
  </div>
</div>
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img src="images/preloaders/1.gif" alt="">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Deshabilitar Precargado</div>
  </div>
  
  <!-- Header -->
  <header id="header" class="header">
    <div class="header-top bg-theme-colored sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="widget no-border m-0">
              <ul class="social-icons icon-dark icon-theme-colored icon-sm sm-text-center">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-9">
            <div class="widget no-border m-0">
              <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="#">964582594</a> </li>
                <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-clock-o text-white"></i> Lunes-Viernes 8:00 to 2:00 </li>
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#">muelyncbmf@hotmail.com</a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
        <div class="container">
          <nav id="menuzord-right" class="menuzord blue bg-lightest">
            <a class="menuzord-brand pull-left flip" href="javascript:void(0)">
              <img src="{{ asset('images/logo-wide.png') }}" alt="">
            </a>
            <div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="fa fa-bars font-24 text-gray"></i></a></div>
            <ul class="menuzord-menu onepage-nav">
              <li class="active"><a href="{{ !\Request::is('/') ? url('/') : '#home' }}">Inicio</a></li>
              <li><a href="{{ !\Request::is('/') ? url('/#about') : '#about' }}">Nosotros</a></li>
              <li><a href="{{ !\Request::is('/') ? url('/#services') : '#services' }}">Servicios</a></li>
              <li><a href="{{ !\Request::is('specialities') ? url('specialities') : '#specialities' }}">Especialidades</a></li>
              <li><a href="{{ !\Request::is('specialities') ? url('specialities#doctors') : '#doctors' }}">Doctores</a></li>
              <li><a href="{{ !\Request::is('gallery') ? url('gallery') : '#gallery' }}">Galeria</a></li>
              <li><a href="{{ !\Request::is('gallery') ? url('gallery#news') : '#news' }}">Articulo</a></li>
              <li><a href="{{ !\Request::is('gallery') ? url('gallery#contact') : '#contact' }}">Contactanos</a></li>
              <li><a href="/login">Ingresar</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Start main-content -->
  <div class="main-content">
    @yield('content')
  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
  <footer class="footer p-0 bg-solid-color bg-black-111">
    <div class="container">
      <div class="row">
        <div class="footer-box-wrapper equal-height">
          <div class="col-sm-4 footer-box-one pr-0 pl-sm-0">
            <div class="footer-box icon-box media"> <a href="#" class="media-left pull-left mr-30 mr-sm-15"><i class=" icon-ambulance14 text-white"></i></a>
              <div class="media-body">
                <h4 class="media-heading heading title">24 horas a su servicio</h4>
                <p>Cuidando de su salud Bucal.
                <a href="#"><i class="fa fa-arrow-circle-right font-14"></i></a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 footer-box-two pl-0 pr-0">
            <div class="footer-box icon-box media"> <a href="#" class="media-left pull-left mr-30 mr-sm-15"><i class="fa fa-comments-o text-white"></i></a>
              <div class="media-body">
                <h4 class="media-heading heading title">Citas en Linea</h4>
                <p>Registrate y forma parte de Nuestros Servicios y Promociones.
                <a href="#"><i class="fa fa-arrow-circle-right font-14"></i></a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 footer-box-three pl-0 pr-sm-0">
            <div class="footer-box icon-box media"> <a href="#" class="media-left pull-left mr-30 mr-sm-15"><i class=" fa fa-credit-card text-white"></i></a>
              <div class="media-body">
                <h4 class="media-heading heading title">Page en linea </h4>
                <p>Realiza sus pagos de una manera facil y segura.
                <a href="#"><i class="fa fa-arrow-circle-right font-14"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row equal-height">
        <div class="col-sm-4 col-md-3 border-right-black sm-height-auto">
          <div class="widget dark pt-120 pb-30 maxwidth400 sm-text-center">
            <h5 class="widget-title">Nuestros Servicios</h5>
            <ul>
              <li> Mejora la capacidad masticatoria. </li>
              <li> Confort al hablar sin riesgo de inestabilidad de la prótesis. </li>
              <li>Estética dental favorable</li>
                            <li>Mejora la salud general.</li>
              <li>Aumenta el autoestima</li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4 col-md-6 text-center border-right-black sm-height-auto">
          <div class="footer-widget pt-70 pl-60 pr-60 pt-sm-10 pl-sm-10 pr-sm-10 maxwidth400 sm-text-center">
            <div class="footer-logo border-bottom-dot-1px pb-30">
              
              <p>En Clínica Elbrus ponemos a su disposición el uso    exclusivo de nuestro centro sólo para usted. Además, contamos con servicio de catering y traslados privados.Clínica Elbrus asegura la absoluta confidencialidad y privacidad de sus datos personales, habiendo adoptado medidas para evitar la pérdida, alteración ó acceso no autorizado a toda su información.!
              </p>
            </div>
            <div class="footer-news-letter mt-30">
              <h4 class="text-white mb-30">Suscribete En Nuestra Pagina</h4>
              <form id="footer-mailchimp-subscription-form" class="newsletter-form mt-10">
                <label class="display-block" for="mce-EMAIL"></label>
                <div class="input-group">
                  
                  <span class="input-group-btn">
                      
                  </span>
                </div>
              </form>
              <!-- Mailchimp Subscription Form Validation-->
              <script type="text/javascript">
                $('#footer-mailchimp-subscription-form').ajaxChimp({
                    callback: mailChimpCallBack,
                    url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
                });

                function mailChimpCallBack(resp) {
                    // Hide any previous response text
                    var $mailchimpform = $('#footer-mailchimp-subscription-form'),
                        $response = '';
                    $mailchimpform.children(".alert").remove();
                    console.log(resp);
                    if (resp.result === 'success') {
                        $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                    } else if (resp.result === 'error') {
                        $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                    }
                    $mailchimpform.prepend($response);
                }
              </script>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-3 sm-height-auto">
          <div class="widget dark text-right sm-text-center pt-120 pb-140 pt-xs-40 pb-xs-0 maxwidth400">
            <h5 class="widget-title">Contactanos en urgencias </h5>
            <ul>
              <li><a href="#">+(054) 964582594</a></li>
              <li><a href="#">muelyncbmf@hotmail.com</a></li>
                          </ul>
            <ul class="social-icons icon-gray icon-circled icon-sm pull-right sm-pull-none sm-text-center mt-sm-15">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-nav bg-black-222 p-20">
      <div class="container pt-20 pb-0">
        <div class="row">
          <div class="col-md-12">
           <div class="widget m-0">
              <ul class="font-11 pull-right text-right list-inline sm-text-center sm-pull-none">
                <li><a href="{{ !\Request::is('/') ? url('/') : '#home' }}">Inicio</a></li>
                <li>/</li>
                <li><a href="{{ !\Request::is('/') ? url('/#about') : '#about' }}">Nosotros</a></li>
                <li>/</li>
                <li><a href="{{ !\Request::is('/') ? url('/#services') : '#services' }}">Servicioss</a></li>
                <li>/</li>
                <li><a href="{{ !\Request::is('specialities') ? url('specialities') : '#specialities' }}">Especialidades</a></li>
                <li>/</li>
                <li><a href="{{ !\Request::is('specialities') ? url('specialities#doctors') : '#doctors' }}">Doctores</a></li>
                <li>/</li>
                <li><a href="{{ !\Request::is('gallery') ? url('gallery') : '#gallery' }}">Galleria</a></li>
                <li>/</li>
                <li><a href="{{ !\Request::is('gallery') ? url('gallery#news') : '#news' }}">Fotos</a></li>
                <li>/</li>
                <li><a href="{{ !\Request::is('gallery') ? url('gallery#contact') : '#contact' }}">Contactanos</a></li>
              </ul>              
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.video.min.js') }}"></script>


</body>
</html>