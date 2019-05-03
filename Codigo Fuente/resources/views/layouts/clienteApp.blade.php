<!DOCTYPE html>
<html class="no-js css-menubar" lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    
    <title>{{ config('app.name', 'Percovich') }}</title>
    
    <link rel="apple-touch-icon" href="{{ asset('/cliente/assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('/cliente/assets/images/favicon.ico') }}">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('/cliente/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/cliente/global/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/cliente/assets/css/site.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/component-chosen.min.css') }}">

   
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/jquery-mmenu/jquery-mmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/flag-icon-css/flag-icon.css') }}">
        <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/fullcalendar/fullcalendar.css') }}">
        <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/bootstrap-touchspin/bootstrap-touchspin.css') }}">
        <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/jquery-selective/jquery-selective.css') }}">
        <link rel="stylesheet" href="{{ asset('/cliente/assets/examples/css/apps/calendar.css') }}">
        <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/toastr/toastr.css')}}">
        <link rel="stylesheet" href="{{ asset('/cliente/assets/examples/css/advanced/toastr.css')}}">
        <link rel="stylesheet" href="{{ asset('/cliente/global/vendor/flag-icon-css/flag-icon.css')}}">
        <link rel="stylesheet" href="{{ asset('/cliente/assets/examples/css/widgets/statistics.css')}}">
        
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/cliente/global/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/cliente/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!--[if lt IE 9]>
    <script src="/cliente/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="/cliente/global/vendor/media-match/media.match.min.js"></script>
    <script src="/cliente/global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('/cliente/global/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition site-navbar-small app-calendar page-aside-left">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <input type="hidden" id="userId" value={{Auth::user()->id}}>
    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <img class="navbar-brand-logo" src="{{ asset('/cliente/assets/images/logo.png') }}" title="Percovich">
          <span class="navbar-brand-text hidden-xs-down"> Percovich</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
          data-toggle="collapse">
          <span class="sr-only">Toggle Search</span>
          <i class="icon wb-search" aria-hidden="true"></i>
        </button>
      </div>
    
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
            </li>
            <li class="nav-item hidden-sm-down" id="toggleFullscreen">
              <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                <span class="sr-only">Toggle fullscreen</span>
              </a>
            </li>
            <li class="nav-item hidden-float">
              <a class="nav-link icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                role="button">
                <span class="sr-only">Toggle Search</span>
              </a>
            </li>
          </ul>
          <!-- End Navbar Toolbar -->
    
          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  @if(Auth::user()->avatar=='')
                    <img src="/cliente/global/portraits/5.jpg" alt="...">
                  @endif
                  @if(!Auth::user()->avatar=='')
                    <img src="{{Auth::user()->avatar}}" alt="...">
                  @endif
                  <i></i>
                </span>
              </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="/client/perfil" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Perfil</a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Configuración</a>
                <div class="dropdown-divider" role="presentation"></div>
                <a class="dropdown-item"  href="{{route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Cerrar Sesión</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              </div>
            </li>
          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
    
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
          <form role="search">
            <div class="form-group">
              <div class="input-search">
                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
        <!-- End Site Navbar Seach -->
      </div>
    </nav>    <div class="site-menubar">
      <ul class="site-menu">
        <li class="site-menu-item">
          <a class="animsition-link" href="{{url('/client') }}">
          
             <i style="font-size: 18px;    margin-left: -1px;" class="fas fa-book" aria-hidden="true"></i>
                  <span class="site-menu-title">Citas</span>
          </a>
        </li>
        <li class="site-menu-item has-sub">
          <a href="javascript:void(0)">
             <i style="font-size: 20px;" class="fas fa-clipboard-list" aria-hidden="true"></i>
                  <span class="site-menu-title">Citas</span>
                          <span class="site-menu-arrow"></span>
              </a>
          <ul class="site-menu-sub">
            <li class="site-menu-item">
              <a class="animsition-link" href="{{url('client/miscitas') }}">
                <span class="site-menu-title">Mis Citas</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="{{url('client/cita') }}">
                <span class="site-menu-title">Nueva Cita</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="site-menu-item has-sub">
          <a href="javascript:void(0)">
                  <i class="fas fa-credit-card" aria-hidden="true"></i>
                  <span class="site-menu-title">Pagos</span>
                          <span class="site-menu-arrow"></span>
              </a>
          <ul class="site-menu-sub">
            <li class="site-menu-item">
              <a class="animsition-link" href="{{url('/client/mispagos') }}">
                <span class="site-menu-title">Mis Pagos</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="site-menu-item">
          <a class="animsition-link" href="{{url('/') }}">
             <i style="font-size: 18px;    margin-left: -1px;" class="fas fa-home" aria-hidden="true"></i>
                  <span class="site-menu-title">Regresar</span>
          </a>
        </li>
      </ul></div>
      <div class="site-gridmenu">
      <div>
        <div>
        </div>
      </div>
    </div>

    @yield('content')

    <!-- Footer -->
    {{-- <footer class="site-footer">
      <div class="site-footer-legal">© 2018 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
      <div class="site-footer-right">
        Crafted with <i class="red-600 wb wb-heart"></i> by <a href="https://themeforest.net/user/creation-studio">Creation Studio</a>
      </div>
    </footer> --}}
    <!-- Core  -->
    <script src="{{ asset('/cliente/global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/popper-js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/animsition/animsition.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
    
    <!-- Plugins -->


    <script src="{{ asset('/cliente/global/vendor/jquery-mmenu/jquery.mmenu.min.all.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/switchery/switchery.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/intro-js/intro.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/screenfull/screenfull.js') }}"></script>
    <script src="{{ asset('/cliente/global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
        <script src="{{ asset('/cliente/global/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('/cliente/global/vendor/toastr/toastr.js') }}"></script>
  <!--Calenadar--->
        <script src="{{ asset('/cliente/global/vendor/moment/moment.min.js') }}"></script>   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
        <script type="text/javascript" src="/assets/js/dateTime.min.js"></script>   
        <script src="{{ asset('/cliente/global/vendor/fullcalendar/locale/es.js') }}"></script>
  <!----->
        <script src="{{ asset('/cliente/global/vendor/jquery-selective/jquery-selective.min.js') }}"></script>
        <script src="{{ asset('/cliente/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('/cliente/global/vendor/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('/cliente/global/vendor/bootbox/bootbox.js') }}"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('/cliente/global/js/Component.js') }}"></script>
    <script src="{{ asset('/cliente/global/js/Plugin.js') }}"></script>
    <script src="{{ asset('/cliente/global/js/Base.js') }}"></script>
    <script src="{{ asset('/cliente/global/js/Config.js') }}"></script>
    
    <script src="{{ asset('/cliente/assets/js/Section/Menubar.js') }}"></script>
    <script src="{{ asset('/cliente/assets/js/Section/Sidebar.js') }}"></script>
    <script src="{{ asset('/cliente/assets/js/Section/PageAside.js') }}"></script>
    <script src="{{ asset('/cliente/assets/js/Section/GridMenu.js') }}"></script>
    
    <!-- Config -->
    <script src="{{ asset('/cliente/global/js/config/colors.js') }}"></script>
    <script src="{{ asset('/cliente/assets/js/config/tour.js') }}"></script>
    <script>Config.set('assets', 'assets');</script>
    
    <!-- Page -->
    <script src="{{ asset('/cliente/assets/js/Site.js') }}"></script>
    <script src="{{ asset('/cliente/global/js/Plugin/asscrollable.js') }}"></script>
    <script src="{{ asset('/cliente/global/js/Plugin/slidepanel.js') }}"></script>
    <script src="{{ asset('/cliente/global/js/Plugin/switchery.js') }}"></script>
    <script src="{{ asset('/cliente/global/js/Plugin/toastr.js') }}"></script>
        <script src="{{ asset('/cliente/global/js/Plugin/bootstrap-touchspin.js') }}"></script>
        <script src="{{ asset('/cliente/global/js/Plugin/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('/cliente/global/js/Plugin/material.js') }}"></script>
        <script src="{{ asset('/cliente/global/js/Plugin/action-btn.js') }}"></script>
        <script src="{{ asset('/cliente/global/js/Plugin/editlist.js') }}"></script>
        <script src="{{ asset('/cliente/global/js/Plugin/bootbox.js') }}"></script>
        <script src="{{ asset('/cliente/assets/js/Site.js') }}"></script>
        <script src="{{ asset('/cliente/assets/js/App/Calendar.js') }}"></script>
        <script src="{{ asset('/cliente/assets/examples/js/apps/calendar.js') }}"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/bootstrap3-typeahead.js') }}"></script>
        
    @yield('scripts')
  </body>
</html>
