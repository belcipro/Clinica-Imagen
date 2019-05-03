<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Clinica odontologico imagen ">
    <meta name="author" content="Clinica odontologico imagen">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Clinica odontologico imagen') }}</title>
    
    <link rel="apple-touch-icon" href="{{ asset('cliente/assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('cliente/assets/images/favicon.ico') }}">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('cliente/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cliente/global/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cliente/assets/css/site.min.css') }}">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('cliente/global/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('cliente/global/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('cliente/global/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('cliente/global/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('cliente/global/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('cliente/global/vendor/jquery-mmenu/jquery-mmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('cliente/global/vendor/flag-icon-css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('cliente/assets/examples/css/pages/login-v3.css') }}">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('cliente/global/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cliente/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <script src="{{ asset('cliente/global/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition page-login-v3 layout-full">
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
      <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="panel">
          <div class="panel-body">
            <div class="brand">
              <img class="brand-img" src="{{ asset('cliente/assets//images/logo-colored.png') }}" alt="...">
              <h2 class="brand-text font-size-18">Clinica odontologico imagen</h2>
            </div>

            @yield('content')
            
          </div>
        </div>

        <footer class="page-copyright page-copyright-inverse">
          {{-- <p>WEBSITE BY Creation Studio</p>
          <p>© 2018. All RIGHT RESERVED.</p> --}}
            <a class="btn btn-icon btn-pure" href="/login/facebook">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
            <a class="btn btn-icon btn-pure" href="/login/google">
            <i class="icon bd-google-plus" aria-hidden="true"></i>
          </a>
          </div>
        </footer>
      </div>
    </div>
    <!-- End Page -->


    <!-- Core  -->
    <script src="{{ asset('cliente/global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/popper-js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/animsition/animsition.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
    
    <!-- Plugins -->
    <script src="{{ asset('cliente/global/vendor/jquery-mmenu/jquery.mmenu.min.all.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/switchery/switchery.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/intro-js/intro.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/screenfull/screenfull.js') }}"></script>
    <script src="{{ asset('cliente/global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
        <script src="{{ asset('cliente/global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('cliente/global/js/Component.js') }}"></script>
    <script src="{{ asset('cliente/global/js/Plugin.js') }}"></script>
    <script src="{{ asset('cliente/global/js/Base.js') }}"></script>
    <script src="{{ asset('cliente/global/js/Config.js') }}"></script>
    
    <script src="{{ asset('cliente/assets/js/Section/Menubar.js') }}"></script>
    <script src="{{ asset('cliente/assets/js/Section/Sidebar.js') }}"></script>
    <script src="{{ asset('cliente/assets/js/Section/PageAside.js') }}"></script>
    <script src="{{ asset('cliente/assets/js/Section/GridMenu.js') }}"></script>
    
    <!-- Config -->
    <script src="{{ asset('cliente/global/js/config/colors.js') }}"></script>
    <script src="{{ asset('cliente/assets/js/config/tour.js') }}"></script>
    <script>Config.set('assets', 'assets');</script>
    
    <!-- Page -->
    <script src="{{ asset('cliente/assets/js/Site.js') }}"></script>
    <script src="{{ asset('cliente/global/js/Plugin/asscrollable.js') }}"></script>
    <script src="{{ asset('cliente/global/js/Plugin/slidepanel.js') }}"></script>
    <script src="{{ asset('cliente/global/js/Plugin/switchery.js') }}"></script>
    <script src="{{ asset('cliente/global/js/Plugin/jquery-placeholder.js') }}"></script>
    <script src="{{ asset('cliente/global/js/Plugin/material.js') }}"></script>
    
    <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
    
  </body>
</html>
