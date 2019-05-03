<!DOC<!DOCTYPE html>
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

  <div class="about">
    <div class="container">
      <div class="text-center">
        <h2>Mision</h2>
        <div class="col-md-10 col-md-offset-1">
          <p>Brindar servicios odontológicos de calidad con profesionales de alto nivel comprometidos con el cuidado de la salud bucal para lograr la satisfacción y fidelización de nuestros pacientes. </p>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="btn-gamp"><a href="#">Mision</a></div>
          
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="gamp-btn"><a href="#">Vision</a></div>
        </div>

      </div>
    </div>
  </div>
  <hr>

  <section id="about-us">
    <div class="container">
      <div class="skill-wrap clearfix">
        <div class="row">
          <div class="col-sm-3">
            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="joomla-skill">
                <p><em>Calidad</em></p>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <div class="html-skill">
                <p><em>Respeto</em></p>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
              <div class="css-skill">
                <p><em>Liderazgo</em></p>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
              <div class="wp-skill">
                <p><em>Lealtad</em></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- our-team -->
      <div class="team">
        <div class="text-center wow fadeInDown">
          <h2>Nuestro Equipo</h2>
        </div>

        <div class="row clearfix">
          <div class="col-md-4 col-sm-6">
            <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="media">
                <div class="pull-left">
                  <a href="#"><img class="media-object" src="img/man1.jpg" alt=""></a>
                </div>
                <div class="media-body">
                  <h4>Lyn Cheng Percovich Amorotto</h4>
                  <ul class="social_icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                </div>
              </div>
              <!--/.media -->
              <p>Responsable de orientar al paciente en su tratamiento bucodental y de coordinar el tratamiento del paciente.</p>
            </div>
          </div>
          <!--/.col-lg-4 -->


          <div class="col-md-4 col-sm-6 col-md-offset-2">
            <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="media">
                <div class="pull-left">
                  <a href="#"><img class="media-object" src="img/man2.jpg" alt=""></a>
                </div>
                <div class="media-body">
                  <h4>Asistente</h4>
                  <ul class="social_icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                </div>
              </div>
              <!--/.media -->
              <p>Responsable de orientar al paciente en su tratamiento bucodental y de coordinar el tratamiento del paciente.</p>
            </div>
          </div>
          <!--/.col-lg-4 -->
        </div>
        <!--/.row -->
        <div class="row team-bar">
          <div class="first-one-arrow hidden-xs">
            <hr>
          </div>
          <div class="first-arrow hidden-xs">
            <hr> <i class="fa fa-angle-up"></i>
          </div>
          <div class="second-arrow hidden-xs">
            <hr> <i class="fa fa-angle-down"></i>
          </div>
          <div class="third-arrow hidden-xs">
            <hr> <i class="fa fa-angle-up"></i>
          </div>
          <div class="fourth-arrow hidden-xs">
            <hr> <i class="fa fa-angle-down"></i>
          </div>
        </div>
        <!--skill_border-->
        <!--/.row-->
      </div>
      <!--section-->
    </div>
    <!--/.container-->
  </section>
  <!--/about-us-->

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
          
            <a href="http://www.servitecflhuaraz.com/">SystemDNS</a> by <a href="http://www.servitecflhuaraz.com/">SystemDNS</a>
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

      <!--/.container-->
    </nav>
    <!--/nav-->
  </header>
  <!--/header-->

  <div class="about">
    <div class="container">
      <div class="text-center">
        <h2>Mision</h2>
        <div class="col-md-10 col-md-offset-1">
          <p>Brindar servicios odontológicos de calidad con profesionales de alto nivel comprometidos con el cuidado de la salud bucal para lograr la satisfacción y fidelización de nuestros pacientes. </p>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="btn-gamp"><a href="#">Mision</a></div>
          
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="gamp-btn"><a href="#">Vision</a></div>
        </div>

      </div>
    </div>
  </div>
  <hr>

  <section id="about-us">
    <div class="container">
      <div class="skill-wrap clearfix">
        <div class="row">
          <div class="col-sm-3">
            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="joomla-skill">
                <p><em>Calidad</em></p>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <div class="html-skill">
                <p><em>Respeto</em></p>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
              <div class="css-skill">
                <p><em>Liderazgo</em></p>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
              <div class="wp-skill">
                <p><em>Lealtad</em></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- our-team -->
      <div class="team">
        <div class="text-center wow fadeInDown">
          <h2>Nuestro Equipo</h2>
        </div>

        <div class="row clearfix">
          <div class="col-md-4 col-sm-6">
            <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="media">
                <div class="pull-left">
                  <a href="#"><img class="media-object" src="img/man1.jpg" alt=""></a>
                </div>
                <div class="media-body">
                  <h4>Lyn Cheng Percovich Amorotto</h4>
                  <ul class="social_icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                </div>
              </div>
              <!--/.media -->
              <p>Responsable de orientar al paciente en su tratamiento bucodental y de coordinar el tratamiento del paciente.</p>
            </div>
          </div>
          <!--/.col-lg-4 -->


          <div class="col-md-4 col-sm-6 col-md-offset-2">
            <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="media">
                <div class="pull-left">
                  <a href="#"><img class="media-object" src="img/man2.jpg" alt=""></a>
                </div>
                <div class="media-body">
                  <h4>Asistente</h4>
                  <ul class="social_icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                </div>
              </div>
              <!--/.media -->
              <p>Responsable de orientar al paciente en su tratamiento bucodental y de coordinar el tratamiento del paciente.</p>
            </div>
          </div>
          <!--/.col-lg-4 -->
        </div>
        <!--/.row -->
        <div class="row team-bar">
          <div class="first-one-arrow hidden-xs">
            <hr>
          </div>
          <div class="first-arrow hidden-xs">
            <hr> <i class="fa fa-angle-up"></i>
          </div>
          <div class="second-arrow hidden-xs">
            <hr> <i class="fa fa-angle-down"></i>
          </div>
          <div class="third-arrow hidden-xs">
            <hr> <i class="fa fa-angle-up"></i>
          </div>
          <div class="fourth-arrow hidden-xs">
            <hr> <i class="fa fa-angle-down"></i>
          </div>
        </div>
        <!--skill_border-->
        <!--/.row-->
      </div>
      <!--section-->
    </div>
    <!--/.container-->
  </section>
  <!--/about-us-->

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
          
            <a href="http://www.servitecflhuaraz.com/">SystemDNS</a> by <a href="http://www.servitecflhuaraz.com/">SystemDNS</a>
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
