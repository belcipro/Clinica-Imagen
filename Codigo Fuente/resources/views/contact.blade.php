<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Las 3 metaetiquetas anteriores * deben * ser lo primero en la cabeza; cualquier otro contenido principal debe venir * después * de estas etiquetas -->
  <title>Percovich</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
 
</head>

<body>
  <header id="header">
    <nav class="navbar navbar-default navbar-static-top" role="banner">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
          <div class="navbar-brand">
 <a href="{{ url('/') }}">
            <h1>PERCOVICH</h1></a>          </div>
        </div>
        <div class="navbar-collapse collapse">
          <div class="menu">
            <ul class="nav nav-tabs" role="tablist">
              <li ><a href="{{ url('/') }}">Inicio</a></li>
              <li ><a href="{{ url('nosotros') }}">Nostros</a></li>
              <li ><a href="{{ url('services') }}">Servicios</a></li>
              <li ><a href="{{ url('/gallery') }}">Galeria</a></li>
              <li ><a href="{{ url('contact') }}">Contactanos</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--/.container-->
    </nav>
    <!--/nav-->
  </header>
  <!--/header-->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3250.9115868494873!2d-75.21876295459187!3d-12.063631427207952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x910e9646d89d615f%3A0xfb0891226a881910!2sAlejandro+O.+Deustua+%26+Junin%2C+Huancayo!5e1!3m2!1ses-419!2spe!4v1532122762230" width="1500" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
  

  <section class="contact-page">
    <div class="container">
      <div class="text-center">
        <h2>SUGERENCIAS</h2>
        <p>En Centro Odontologico "Percovich" nos interesa tu opinión, por ello contamos con distintos canales de comunicación para recibir tus sugerencias, comentarios, felicitaciones y/o reclamos:
        Completa tus datos con el siguiente formulario.</p>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-6 col-md-offset-3">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electronico" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensaje"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Enviar Mensaje</button></div>
          </form>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>
  <!--/#contact-page-->


  <footer>
    <div class="container">
      <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <h4>Centro Odontologico Percovich</h4>
        <p></p>
        <div class="contact-info">
          <ul>
            <li><i class="fa fa-home fa"></i> Ubicado en Jr.Junin # 657 2°Piso-El Tambo-Hyo </li>
            <li><i class="fa fa-phone fa"></i> +51 964582594</li>
            <li><i class="fa fa-envelope fa"></i> percovichdental.com</li>
          </ul>
        </div>
      </div>

      <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="text-center">
          <h4>Photo Gallery</h4>
          <ul class="sidebar-gallery">
            <li><a href="#"><img src="img/gallery1.png" alt="" /></a></li>
            <li><a href="#"><img src="img/gallery2.png" alt="" /></a></li>
            <li><a href="#"><img src="img/gallery3.png" alt="" /></a></li>
            <li><a href="#"><img src="img/gallery4.png" alt="" /></a></li>
            <li><a href="#"><img src="img/gallery5.png" alt="" /></a></li>
            <li><a href="#"><img src="img/gallery6.png" alt="" /></a></li>
          </ul>
        </div>
      </div>

      <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
        <div class="">
          <h4>Previa Cita</h4>
          <p>Atendemos de Lunes a Viernes de 9:00 a 1:00pm y de 3:00 a 8:30 pm. Sábados 09:00 a 2:00pm Atendemos emergencias dentales</p>
          <div class="btn-gamp">
            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Ingresar Aqui">
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>

  <div class="sub-footer">
    <div class="container">
      <div class="social-icon">
        <div class="col-md-4">
          <ul class="social-network">
            <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="col-md-4 col-md-offset-4">
        <div class="copyright">
          &copy; SystemDNS Theme. All Rights Reserved.
          <div class="credits">
           
            <a href="http://www.servitecflhuaraz.com/">SystemDNS Themes</a> by <a href="http://www.servitecflhuaraz.com//">SystemDNS</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <script src="js/wow.min.js"></script>
  <script>
    wow = new WOW({}).init();
  </script>
  <script>
    (function($) {
      //Google Map
      var get_latitude = $('#google-map').data('latitude');
      var get_longitude = $('#google-map').data('longitude');

      function initialize_google_map() {
        var myLatlng = new google.maps.LatLng(get_latitude, get_longitude);
        var mapOptions = {
          zoom: 14,
          scrollwheel: false,
          center: myLatlng
        };
        var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize_google_map);
    })(jQuery);
  </script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
