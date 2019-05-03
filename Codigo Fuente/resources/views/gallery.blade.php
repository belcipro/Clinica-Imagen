@extends('layouts.theme')

@section('content')
<!-- Section: Gallery -->
    <section id="gallery" class="bg-lighter">
      <div class="container pb-0">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0">Galleria</h2>
              <div class="title-icon">
                <img class="mb-10" src="{{ asset('images/title-icon.png') }}" alt="">
              </div>
              <p>Realizamos tratamientos de belleza para mejorar la estética de todos los Pacientes que confian en nuestro Profesionalismo. <br> Una Sonrisa tuya es nuestro objetivo!</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Works Filter -->
            <div class="portfolio-filter font-alt align-center">
              <a href="#" class="active" data-filter="*">Fotos</a>
              <a href="#dental" class="" data-filter=".dental">Dentales</a>
              <a href="#surgery" class="" data-filter=".surgery">Cirugía</a>
              <a href="#laboratory" class="" data-filter=".laboratory">Laboratorio</a>
            </div>
            <!-- End Works Filter -->
            
            <!-- Portfolio Gallery Grid -->
            <div id="grid" class="gallery-isotope grid-4 gutter clearfix">
              <!-- Portfolio Item Start -->
              <div class="gallery-item dental">
                <div class="thumb">
                  <img class="img-fullwidth" src="{{ asset('images/portfolio/1.jpg') }}" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="{{ asset('images/portfolio/1.jpg') }}"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item photography">
                <div class="thumb">
                  <img class="img-fullwidth" src="{{ asset('images/portfolio/2.jpg') }}" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="{{ asset('images/portfolio/2.jpg') }}"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item photography">
                <div class="thumb">
                  <img class="img-fullwidth" src="{{ asset('images/portfolio/3.jpg') }}" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="{{ asset('images/portfolio/3.jpg') }}"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item photography">
                <div class="thumb">
                  <img class="img-fullwidth" src="{{ asset('images/portfolio/4.jpg') }}" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="{{ asset('images/portfolio/4.jpg') }}"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item surgery">
                <div class="thumb">
                  <img class="img-fullwidth" src="{{ asset('images/portfolio/5.jpg') }}" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="{{ asset('images/portfolio/5.jpg') }}"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item photography">
                <div class="thumb">
                  <img class="img-fullwidth" src="{{ asset('images/portfolio/6.jpg') }}" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="{{ asset('images/portfolio/6.jpg') }}"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item laboratory">
                <div class="thumb">
                  <img class="img-fullwidth" src="{{ asset('images/portfolio/7.jpg') }}" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="{{ asset('images/portfolio/7.jpg') }}"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item photography">
                <div class="thumb">
                  <img class="img-fullwidth" src="{{ asset('images/portfolio/8.jpg') }}" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="{{ asset('images/portfolio/8.jpg') }}"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item dental">
                <div class="thumb">
                  <img class="img-fullwidth" src="{{ asset('images/portfolio/9.jpg') }}" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="{{ asset('images/portfolio/9.jpg') }}"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item photography">
                <div class="thumb">
                  <img class="img-fullwidth" src="{{ asset('images/portfolio/10.jpg') }}" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="{{ asset('images/portfolio/10.jpg') }}"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item laboratory">
                <div class="thumb">
                  <img class="img-fullwidth" src="images/portfolio/11.jpg" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="images/portfolio/11.jpg"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

              <!-- Portfolio Item Start -->
              <div class="gallery-item surgery">
                <div class="thumb">
                  <img class="img-fullwidth" src="images/portfolio/12.jpg" alt="project">
                  <div class="overlay-shade"></div>
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="social-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a data-lightbox="image" href="images/portfolio/12.jpg"><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Portfolio Item End -->

            </div>
            <!-- End Portfolio Gallery Grid -->
          </div>
        </div>
      </div>
    </section>

    <!-- Section: News -->
    <section id="news">
      <div class="container pb-110">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0">Salud Dental</h2>
              <div class="title-icon">
                <img class="mb-10" src="images/title-icon.png" alt="">
              </div>
              <p>Consejos que pueden hacer de tu sonrisa un motivo mas de felicidad<br> El cuidado de tus dientes estas en nuestras manos!</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row multi-row-clearfix">
            <div class="blog-posts">
              <div class="col-xs-12 col-sm-12 col-md-6">
                <article class="post style1 clearfix maxwidth500">
                  <div class="col-md-4 p-0">
                    <div class="entry-header">
                      <div class="post-thumb">
                        <img src="images/blog/sm-1.jpg" alt="" class="img-responsive img-fullwidth">
                      </div>
                      <div class="entry-date entry-date-absolute">
                        25 <span>Dec</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 p-0">
                    <div class="entry-content pl-50 p-20 pt-30 pr-20">
                      <h5 class="entry-title pt-0"><a href="#">Se me ha roto un diente y ahora, ¿que ago?</a></h5>
                      <p> Qué debemos hacer frente a una fractura dental con pérdida total o parcia!</p>
                      <div class="entry-meta pull-left flip mt-10">
                        <ul class="list-inline">
                          <li><i class="fa fa-thumbs-o-up mr-5"></i> 13</li>
                          <li><i class="fa fa-comments-o mr-5"></i> 43</li>
                        </ul>
                      </div>
                     
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </article>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6">
                <article class="post style1 clearfix maxwidth500">
                  <div class="col-md-4 p-0">
                    <div class="entry-header">
                      <div class="post-thumb">
                        <img src="images/blog/sm-2.jpg" alt="" class="img-responsive img-fullwidth">
                      </div>
                      <div class="entry-date entry-date-absolute">
                        25 <span>Dec</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 p-0">
                    <div class="entry-content pl-50 p-20 pt-30 pr-20">
                      <h5 class="entry-title pt-0"><a href="#">Higiene bucodnetal</a></h5>
                      <p>La mala higiene bucodental dará lugar, a medio-largo plazo una infección en las encías, conocida como periodontitis o piorrea.</p>
                      <div class="entry-meta pull-left flip mt-10">
                        <ul class="list-inline">
                          <li><i class="fa fa-thumbs-o-up mr-5"></i> 13</li>
                          <li><i class="fa fa-comments-o mr-5"></i> 43</li>
                        </ul>
                      </div>
                      
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </article>
              </div>           
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Contact -->
    <section id="contact" class="bg-deep">
      <div class="container pb-100">
        <div class="section-title">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
              <h2 class="font-playfair text-uppercase mt-0 mb-10">Sugerencias</h2>
                <p>En el Centro Odontologico "Percovich" nos interesa tu opinión, por ello contamos con   distintos canales de comunicación para recibir tus sugerencias, comentarios, felicitaciones y/o reclamos: Completa tus datos con el siguiente formulario.
                </p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-5">
              <!-- Google Map HTML Codes -->
              <div 
                data-address="121 King Street, Melbourne Victoria 3000 Australia"
                data-popupstring-id="#popupstring1"
                class="map-canvas autoload-map"
                data-mapstyle="style2"
                data-height="420"
                data-latlng="-37.817314,144.955431"
                data-title="sample title"
                data-zoom="12"
                data-marker="images/map-marker.png">
              </div>
              <div class="map-popupstring hidden" id="popupstring1">
                <div class="text-center">
                  <h3>Medinova Office</h3>
                  <p>121 King Street, Melbourne Victoria 3000 Australia</p>
                </div>
              </div>
              <!-- Google Map Javascript Codes -->
              <script src="http://maps.google.com/maps/api/js?key=AIzaSyAYWE4mHmR9GyPsHSOVZrSCOOljk8DU9B4"></script>
              <script src="js/google-map-init.js"></script>
            </div>
            <div class="col-md-7">
              <h4 class="text-theme-colored line-bottom mt-0 mb-30 mt-sm-20">Ingrese su Mensaje</h4>            
              <!-- Contact Form -->
              <form id="contact_form" name="contact_form" class="" action="includes/sendmail.php" method="post">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <input id="form_name" name="form_name" class="form-control" type="text" placeholder="Ingrese Nombre" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Ingrese su Email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <input id="form_subject" name="form_subject" class="form-control required" type="text" placeholder="Ingrese apellidos">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-30">
                      <input id="form_phone" name="form_phone" class="form-control" type="text" placeholder="Ingrese su numero">
                    </div>
                  </div>
                </div>
                    <div class="form-group mb-30">
                  <textarea id="form_message" name="form_message" class="form-control required" rows="5" placeholder="Ingreser Mensaje"></textarea>
                </div>
                    <div class="form-group mb-30">
                  <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                  <button type="submit" class="btn btn-dark btn-theme-colored btn-flat" data-loading-text="Please wait...">Envia su Mensaje</button>
                </div>
              </form>
              <!-- Contact Form Validation-->
              <script type="text/javascript">
                $("#contact_form").validate({
                  submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = '#form-result';
                    $(form_result_div).remove();
                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                    var form_btn_old_msg = form_btn.html();
                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                    $(form).ajaxSubmit({
                      dataType:  'json',
                      success: function(data) {
                        if( data.status == 'true' ) {
                          $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                      }
                    });
                  }
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection