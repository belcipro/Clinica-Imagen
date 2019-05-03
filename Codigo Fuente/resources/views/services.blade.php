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
            <h1>PERCOVICH</h1></a>
          </div>
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

  <div class="services">
    <div class="container">
      <div class="text-center">
        <h2>Tratamientos</h2>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
          <img align=center src="img/orto.png">
          <h3>Ortodoncia</h3>
          <p>La ortodoncia es la especialidad de la odontología que se encarga del estudio, prevención, diagnóstico y tratamiento de las anomalías de forma, posición, relación y función de las estructuras dento-maxilofaciales.</p>
        </div>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
          <img align=center src="img/limpieza.png"> 
          <h3>Limpieza Dental</h3>
          <p>es parte de la higiene oral e involucra la remoción de la placa dental de los dientes con la intención de prevenir cavidades, gingivitis, y enfermedades peridontales.</p>
        </div>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
          <img align=center src="img/endo.png"> 
          <h3>Endodoncia</h3>
          <p>Es la especialidad que se ocupa de la prevención, diagnóstico y tratamiento de las enfermedades de la pulpa dental mediante el tratamiento de conductos radiculares, consiste en la extirpación total de la pulpa dental y la obturación del conducto dentario.</p>
        </div>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
          <img align=center src="img/protesis.png"> 
          <h3>Prótesis Dental</h3>
          <p>Especialidad encargada de devolver la función estética y armonía oral mediante prótesis dentales en pacientes edéntulos parciales y edéntulos totales. Se realizan tratamientos de prótesis fija y removible.</p>
        </div>
      </div>
    </div>
    <div class="text-center">
      <div class="container">
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
           <img align=center src="img/implantes.png"> 
          <h3>Implantes Dentales</h3>
          <p>Los implantes dentales son raíces artificiales de titanio que se colocan en el hueso cuando se ha producido una pérdida de una pieza dental. La principal función del implante es la de reemplazar el diente perdido.</p>
        </div>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
          <img align=center src="img/odon.png"> 
          <h3>Odontopediatría</h3>
          <p>Es la rama de la odontología encargada de tratar a los niños, que promueve la salud oral infantil con el objetivo de mantener unos dientes sanos hasta que los niños alcancen la edad adulta.</p>
        </div>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
         <img align=center src="img/peri.png"> 
          <h3>Periodoncia</h3>
          <p>es una rama de la Odontología que se encarga del estudio y tratamiento de los tejidos que rodean y dan soporte a los dientes; Existen múltiples alteraciones que pueden afectar a estos tejidos, entre los más comunes está la gingivitis (inflamación crónica de las encías), y la periodontitis (pérdida parcial o total del hueso soporte).</p>
        </div>
        <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
          <img align=center src="img/estetica.png"> 
          <h3>Estetica Dental</h3>
          <p>analiza y corrige la armonía de los dientes relacionado a las encías de acuerdo a las características faciales de cada individuo, dando naturalidad, y belleza a la sonrisa.</p>
        </div>
      </div>
    </div>
  </div>

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
          <h4>Fotos-Galeria</h4>
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
            
            <a href="http://www.servitecflhuaraz.com/">SystemDNS Themes</a> by <a href="http://www.servitecflhuaraz.com/">SystemDNS</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script>
    wow = new WOW({}).init();
  </script>

</body>

</html>
