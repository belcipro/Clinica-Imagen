@extends('layouts.theme')

@section('content')
<!-- Section: home -->
    <section id="home" class="divider">
      <div class="container-fluid p-0">
        
        <!-- Slider Revolution Start -->
        <div class="rev_slider_wrapper">
          <div class="rev_slider" data-version="5.0">
            <ul>

              <!-- SLIDE 1 -->
              <li data-index="rs-1" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="images/bg/bg2.jpg"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                <!-- MAIN IMAGE -->
                <img src="{{ asset('images/bg/bg2.jpg') }}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-dark-transparent-light pl-30 pr-30"
                  id="rs-1-layer-1"

                  data-x="['center']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['-115']" 
                  data-fontsize="['30']"
                  data-lineheight="['50']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:45px;">Centro Odontologico
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent pl-40 pr-40"
                  id="rs-1-layer-2"

                  data-x="['center']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['-45']" 
                  data-fontsize="['48']"
                  data-lineheight="['70']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:45px;">PERCOVICH
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme text-center text-white" 
                  id="rs-1-layer-3"

                  data-x="['center']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['30']"
                  data-fontsize="['16']"
                  data-lineheight="['28']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1400" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;"><br>.....
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption tp-resizeme" 
                  id="rs-1-layer-4"

                  data-x="['center']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['90']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;"
                  data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                  data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1400" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:1px;">
                  <a class="btn btn-colored btn-lg btn-theme-colored pl-20 pr-20" href="{{ url('/login') }}">Reserve su cita</a>
                  <a class="btn btn-colored btn-lg btn-theme-colored pl-20 pr-20" href="{{ url('/register') }}">Regístrese</a>
                </div>
              </li>

              <!-- SLIDE 2 -->
              <li data-index="rs-2" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="{{ asset('images/bg/bg1.jpg') }}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                <!-- MAIN IMAGE -->
                <img src="{{ asset('images/bg/bg1.jpg') }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-dark-transparent-light pl-15 pr-15"
                  id="rs-2-layer-1"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-110']" 
                  data-fontsize="['30']"
                  data-lineheight="['50']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:600;"> Centro Odontologivo
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent pl-15 pr-15"
                  id="rs-2-layer-2"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-45']" 
                  data-fontsize="['48']"
                  data-lineheight="['70']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:600;">Misión
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme text-white" 
                  id="rs-2-layer-3"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['30']"
                  data-fontsize="['16']"
                  data-lineheight="['28']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1400" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;">Brindar servicios odontológicos<br> de calidad con profesionales de alto nivel comprometidos con el cuidado de la salud <br>bucal para lograr la satisfacción y fidelización de nuestros pacientes.
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption tp-resizeme" 
                  id="rs-2-layer-4"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['90']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;"
                  data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                  data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1400" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:1px;">
                  <a class="btn btn-colored btn-lg btn-theme-colored pl-20 pr-20" href="{{ url('/login') }}">Reserve su cita</a>
                  <a class="btn btn-colored btn-lg btn-theme-colored pl-20 pr-20" href="{{ url('/register') }}">Regístrese</a> 
                </div>
              </li>

              <!-- SLIDE 3 -->
              <li data-index="rs-3" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="{{ asset('images/bg/bg3.jpg') }}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                <!-- MAIN IMAGE -->
                <img src="{{ asset('images/bg/bg3.jpg') }}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-dark-transparent-light pl-15 pr-15"
                  id="rs-3-layer-1"

                  data-x="['right']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-110']" 
                  data-fontsize="['30']"
                  data-lineheight="['50']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:600;">Centro Odontologíco
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent pl-15 pr-15"
                  id="rs-3-layer-2"

                  data-x="['right']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-45']" 
                  data-fontsize="['48']"
                  data-lineheight="['70']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 7; white-space: nowrap; font-weight:600;">Vision
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme text-right text-white" 
                  id="rs-3-layer-3"

                  data-x="['right']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['30']"
                  data-fontsize="['16']"
                  data-lineheight="['28']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1400" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;">Ser el Mejor centro odontologico lider anivel nacional, reconocido<br> por su calidad y servicio, satifaser las espectativas de nuestros paciente<br> atravez d ela eficincia y etica con equidad solides y calidad de vida
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption tp-resizeme" 
                  id="rs-3-layer-4"

                  data-x="['right']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['90']"

                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;"
                  data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                  data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-start="1400" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:1px;">
                  <a class="btn btn-colored btn-lg btn-theme-colored pl-20 pr-20" href="{{ url('/login') }}">Reserve su cita</a>
                  <a class="btn btn-colored btn-lg btn-theme-colored pl-20 pr-20" href="{{ url('/register') }}">Regístrese</a>
                </div>
              </li>
            </ul>
          </div><!-- end .rev_slider -->
        </div>
        <!-- end .rev_slider_wrapper -->
        <script>
          $(document).ready(function(e) {
            var revapi = $(".rev_slider").revolution({
              sliderType:"standard",
              sliderLayout: "auto",
              dottedOverlay: "none",
              delay: 5000,
              navigation: {
                  keyboardNavigation: "off",
                  keyboard_direction: "horizontal",
                  mouseScrollNavigation: "off",
                  onHoverStop: "off",
                  touch: {
                      touchenabled: "on",
                      swipe_threshold: 75,
                      swipe_min_touches: 1,
                      swipe_direction: "horizontal",
                      drag_block_vertical: false
                  },
                  arrows: {
                      style: "gyges",
                      enable: true,
                      hide_onmobile: false,
                      hide_onleave: true,
                      hide_delay: 200,
                      hide_delay_mobile: 1200,
                      tmp: '',
                      left: {
                          h_align: "left",
                          v_align: "center",
                          h_offset: 0,
                          v_offset: 0
                      },
                      right: {
                          h_align: "right",
                          v_align: "center",
                          h_offset: 0,
                          v_offset: 0
                      }
                  },
                    bullets: {
                    enable: true,
                    hide_onmobile: true,
                    hide_under: 800,
                    style: "hebe",
                    hide_onleave: false,
                    direction: "horizontal",
                    h_align: "center",
                    v_align: "bottom",
                    h_offset: 0,
                    v_offset: 30,
                    space: 5,
                    tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
                }
              },
              responsiveLevels: [1240, 1024, 778],
              visibilityLevels: [1240, 1024, 778],
              gridwidth: [1170, 1024, 778, 480],
              gridheight: [655, 768, 960, 720],
              lazyType: "none",
              parallax: {
                  origo: "slidercenter",
                  speed: 1000,
                  levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                  type: "scroll"
              },
              shadow: 0,
              spinner: "off",
              stopLoop: "on",
              stopAfterLoops: 0,
              stopAtSlide: -1,
              shuffle: "off",
              autoHeight: "off",
              fullScreenAutoWidth: "off",
              fullScreenAlignForce: "off",
              fullScreenOffsetContainer: "",
              fullScreenOffset: "0",
              hideThumbsOnMobile: "off",
              hideSliderAtLimit: 0,
              hideCaptionAtLimit: 0,
              hideAllCaptionAtLilmit: 0,
              debugMode: false,
              fallbacks: {
                  simplifyAll: "off",
                  nextSlideOnWindowFocus: "off",
                  disableFocusListener: false,
              }
            });
          });
        </script>
        <!-- Slider Revolution Ends -->

      </div>
    </section>
<!-- Section: Welcome -->
    <section id="about">
      <div class="container pb-0">
        <div class="row">
          <div class="col-md-4">
            <div class="border-10px p-30">
              <h5><i class="fa fa-clock-o text-theme-colored"></i> Opening Hours</h5>
              <div class="opening-hourse text-left">
                <ul class="list-unstyled">
                  <li class="clearfix line-height-1"> <span> Lunes - Viernes </span>
                    <div class="value"> 9:00 am  - 9:00 pm</div>
                  </li>
                  <li class="clearfix line-height-1"> <span> Sabados </span>
                    <div class="value"> 10:00 am - 16:00 pm </div>
                  </li>
                  <li class="clearfix line-height-1"> <span> Domingos </span>
                    <div class="value"> Previa Cita </div>
                  </li>
                </ul>
              </div>
              <h5 class="mt-30"><i class="fa fa-pencil-square-o text-theme-colored"></i> Necesita Ayuda?</h5>
              <p class="mt-0 text-uppercase">Solo haga una cita para obtener ayuda de nuestros expertos</p>
              <a href="#" class="btn btn-dark btn-theme-colored mt-15" data-toggle="modal" data-target="#modal_appontment_form_at_about">Pedir una Citat</a>

              <!-- Modal - Appontment Form Starts -->
              <div class="modal fade" id="modal_appontment_form_at_about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="border-1px p-25">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="text-theme-colored text-uppercase m-0">Make an Appointment</h4>
                      <div class="line-bottom mb-30"></div>
                      <p>hola munbdo cruel t.</p>
                      <!-- Appointment Form -->
                      <form id="appointment_form_at_home" name="appointment_form_at_home" class="" method="post" action="includes/appointment.php">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group mb-10">
                              <input id="form_name" name="form_name" class="form-control" type="text" required="" placeholder="Enter Name" aria-required="true">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group mb-10">
                              <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group mb-10">
                              <input name="form_appontment_date" class="form-control required datetime-picker" type="text" placeholder="Appoinment Date & Time" aria-required="true">
                            </div>
                          </div>
                        </div>
                        <div class="form-group mb-10">
                          <textarea id="form_message" name="form_message" class="form-control required"  placeholder="Enter Message" rows="5" aria-required="true"></textarea>
                        </div>
                        <div class="form-group mb-0 mt-20">
                          <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                          <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Send Message</button>
                        </div>
                      </form>

                      <!-- Appointment Form Validation-->
                      <script type="text/javascript">
                        $("#appointment_form_at_home").validate({
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
              <!-- Modal - Appontment Form Ends -->
            </div>
          </div>
          <div class="col-md-4">
            <h3 class="text-gray-silver font-playfair mt-10 mt-sm-30 mb-0">ACERCA DE</h3>
            <h1 class="text-gray font-playfair mt-0">PERCOVICH</h1>
            <p><em>Un Centro Odontologico líderes que ofrece atención médica segura en su mejor forma para todos nuestros Pacientes..</em></p>
            <p class="mt-20">Somos un centro odontoliogico dedicada a lograr la satisfacción personal, salud emocional y mejora de la autoestima mediante una sonrisa bella y saludable. Brindamos servicios odontológicos de excelente calidad, gozamos del reconocimiento y prestigio de nuestros pacientes, gracias al esfuerzo y seriedad de nuestros profesionales..</p>
            <p class="mt-20"><img src="{{ asset('images/signature.png') }}" alt=""></p>
                      </div>
          <div class="col-md-4">
            <img src="{{ asset('images/photos/doctor.png') }}" alt="">
          </div>
        </div>
      </div>
    </section>
<!-- Section: Services -->
    <section id="services" class="bg-lighter"> 
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h4 class="font-playfair text-uppercase mt-0">Nuestros Servicios</h4>
            <p>La calidad de nuestros servicios radica en la aplicación de materiales eficientes de última generación, tecnología de punta, formación continua e innovación, garantizamos resultados óptimos y perdurables, manejamos costos de nuestros tratamientos totalmente competitivos con respecto a las tarifas de otras clínicas de primera línea.</p>
            <div class="row mt-20 mb-sm-30">
              <div class="col-sm-6">
                <div class="service-icon-box"> <a href="#" class="pull-left mr-20"><i class="icon-ambulance14"></i></a>
                  <div class="mt-5">
                    <h6 class="mt-5">Emergencias</h6>
                    <p class="font-11"><em></em></p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="service-icon-box"> <a href="#" class="pull-left mr-20"><i class="icon-illness"></i></a>
                  <div class="">
                    <h6 class="mt-5">Tratamientos</h6>
                    <p class="font-11"><em></em></p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="service-icon-box"> <a href="#" class="pull-left mr-20"><i class="icon-stethoscope10"></i></a>
                  <div class="">
                    <h6 class="mt-5">Chekeos Preventivos</h6>
                    <p class="font-11"><em></em></p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="service-icon-box"> <a href="#" class="pull-left mr-20"><i class="icon-medical51"></i></a>
                  <div class="">
                    <h6 class="mt-5">Servicios</h6>
                    <p class="font-11"><em>Lorem ipsum</em></p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="service-icon-box"> <a href="#" class="pull-left mr-20"><i class="icon-hospital35"></i></a>
                  <div class="">
                    <h6 class="mt-5">Hemorragias</h6>
                    <p class="font-11"><em></em></p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="service-icon-box"> <a href="#" class="pull-left mr-20"><i class="icon-tablets9"></i></a>
                  <div class="">
                    <h6 class="mt-5">Medicamentos</h6>
                    <p class="font-11"><em></em></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="thumb">
              <img alt="" src="{{ asset('images/photos/4.jpg') }}" class="img-fullwidth">
            </div>
            <h4 class="mt-20">Por que elegirnos?</h4>
            <div class="panel-group accordion style2 mb-0 mt-20" id="accordion2">
              <div class="panel">
                <div class="panel-title"> <a href="#accordion21" data-toggle="collapse" data-parent="#accordion2"> <span class="open-sub"></span> Valores </a> </div>
                <div class="panel-collapse collapse" id="accordion21">
                  <div class="panel-content">
                    <p>Trabajo en equipo ágil y multidisciplinar
                        Trato humano y personalizado
                      Atención global de la persona
                      Excelencia
                      Compromiso con la sociedad
                      Desarrollo profesional, formativo y personal de colaboradores y trabajadores.</p>
                    </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-title"> <a href="#accordion22" data-toggle="collapse" data-parent="#accordion2"> <span class="open-sub"></span> Responsabilidad Social </a> </div>
                <div class="panel-collapse collapse" id="accordion22">
                  <div class="panel-content">
                    <p>es parte fundamental de nuestra identidad. Todas las actuaciones en nuestra clínica se guían por el espíritu conservador de las estructuras estomatológicas del paciente y de la realización de una intervención mínima, poniendo para ello siempre al paciente por delante del cliente. El desarrollo, motivación e integración de nuestra plantilla constituyen el principal objetivo de nuestra Política de Recursos Humanos. Trabajamos respetando unas determinadas líneas de compromiso.</p>
                  </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-title"> <a href="#accordion23" data-toggle="collapse" data-parent="#accordion2"> <span class="open-sub"></span> Lin Chang Percovic Amoroto </a> </div>
                <div class="panel-collapse collapse" id="accordion23">
                  <div class="panel-content">
                    <p>Su profesionalismo, calidad humana y personalidad apasionada por la odontología, la investigación y su esfuerzo por ofrecer los mejores tratamientos a sus pacientes, fundamentan el crecimiento y solidez de ser un referente distinguido de la odontología.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection