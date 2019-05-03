@extends('layouts.theme')

@section('content')
<!-- Section: Specialities -->
    <section id="specialities" data-bg-img="{{ asset('images/pattern/p4.png')}}">
      <div class="container pb-80">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0">NUESTROS TRATAMIENTOS</h2>
              <div class="title-icon">
                <img class="mb-10" src="{{ asset('images/title-icon.png') }}" alt="">
              </div>
              <p>BRINDAMOS LOS MEJORES SERVICIOS<br> PARA SU COMODIDAD!</p>
            </div>
          </div>
        </div>
        <div class="section-centent">
          <div class="row">
            <div class="col-md-12">
              <div class="services-tab border-10px bg-white-light">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab11" data-toggle="tab"><i class="icon-xray2"></i>BRACKETS</a></li>
                  <li><a href="#tab12" data-toggle="tab"><i class="icon-heart36"></i>Ortodoncia</a></li>
                  <li><a href="#tab13" data-toggle="tab"><i class="icon-brain9"></i>Endodoncia</a></li>
                  <li><a href="#tab14" data-toggle="tab"><i class="icon-teeth1"></i> Protesis Dental</a></li>
                  <li><a href="#tab15" data-toggle="tab"><i class="icon-hospital35"></i>Rehabilitacion Oral</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade in active" id="tab11">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="thumb">
                          <img class="img-fullwidth" src="{{ asset('images/services/3.jpg') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-content">
                          <h3 class="sub-title mb-0 mt-30">Servicios de</h3>
                          <h1 class="title mt-0">BRACKETS</h1>
                          <p> Los tratamientos ortodónticos sirven para corregir problemas como los dientes apiñados o torcidos, el retrognatismo y el prognatismo, la posición incorrecta de la mandíbula o los trastornos de la articulación temporal.</p>
                          <div class="row mt-30 mb-20">
                           <div class="col-xs-6">
                            <ul class="mt-10">
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Dentistas calificadoss</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Tratamiento con Implantes Dentales</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Prótesis Total Fija sobre Implantes</li>
                            </ul>
                           </div>
                           <div class="col-xs-6">
                            <ul class="mt-10">
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Mantenimiento de Prótesis</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Outdoor Checkup</li>
                              
                            </ul>
                           </div>
                          </div>
                          <a class="btn btn-lg btn-dark btn-theme-colored" href="#">Tratamientos</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab12">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="thumb">
                          <img class="img-fullwidth" src="{{ asset('images/services/2.jpg') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-content">
                          <h3 class="sub-title mb-0 mt-30">Servicios de</h3>
                          <h1 class="title mt-0">ORTODONCIA</h1>
                          <p>Es recomendable evaluar al niño cuando aún tiene sus dientes temporales, para poder detectar cualquier alteración en el desarrollo de sus maxilares y corregirlos a tiempo. Cuando el paciente ya terminó de crecer el tratamiento es más complicado y requiere más tiempo.</p>
                          <div class="row mt-30 mb-20">
                           <div class="col-xs-6">
                            <ul class="mt-10">
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Enderezar los dientes</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Corregir problemas con la mordida</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Cerrar los espacios entre los dientes</li>
                            </ul>
                           </div>
                           <div class="col-xs-6">
                            <ul class="mt-10">
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Alinear adecuadamente los labios y los dientes</li>
                            </ul>
                           </div>
                          </div>
                          <a class="btn btn-lg btn-dark btn-theme-colored" href="#">TRATAMIENTOS</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab13">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="thumb">
                          <img class="img-fullwidth" src="{{ asset('images/services/3.jpg') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-content">
                          <h3 class="sub-title mb-0 mt-30">Servicios</h3>
                          <h1 class="title mt-0">Endodoncia</h1>
                          <p>La endodoncia nos permite conservar los dientes que tienen problema pulpar, evitando la extracción.</p>
                          <div class="row mt-30 mb-20">
                           <div class="col-xs-6">
                            <ul class="mt-10">
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Requiere la toma de radiografías</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;El tratamiento de endodoncia suele ser prácticamente indoloro</li>
                              </ul>
                           </div>
                           <div class="col-xs-6">
                            <ul class="mt-10">
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Siempre con un aislamiento absoluto de la pieza a tratar.</li>
                             </ul>
                           </div>
                          </div>
                          <a class="btn btn-lg btn-dark btn-theme-colored" href="#">TRATAMIENTO
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab14">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="thumb">
                          <img class="img-fullwidth" src="{{ asset('images/services/4.jpg') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-content">
                          <h3 class="sub-title mb-0 mt-30">Servicios de</h3>
                          <h1 class="title mt-0">Protesis Dental</h1>
                          <p>Actualmente los diversos materiales y técnicas existentes nos permiten rehabilitar completamente la cavidad bucal, reemplazando las piezas dentales ausentes por otras muy estéticas y de gran resistencia, devolviendo así la función masticatoria y la estabilidad socio emocional al paciente.</p>
                          <div class="row mt-30 mb-20">
                           <div class="col-xs-6">
                            <ul class="mt-10">
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Periodontitis crónica</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp; Alteraciones temporomandibulares</li>                              
                            </ul>
                           </div>
                           <div class="col-xs-6">
                            <ul class="mt-10">
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Infección periimplantaria</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;General Medical</li>                           
                            </ul>
                           </div>
                          </div>
                          <a class="btn btn-lg btn-dark btn-theme-colored" href="#">TRATAMIENTO
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab15">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="thumb">
                          <img class="img-fullwidth" src="{{ asset('images/services/5.jpg') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-content">
                          <h3 class="sub-title mb-0 mt-30">Services</h3>
                          <h1 class="title mt-0">REHABILITACION ORAL</h1>
                          <p>Especialidad encargada de devolver la función estética y armonía bucal mediante prótesis dentales. Esta especialidad combina en forma integral las áreas de prótesis fija, prótesis removible, operatoria, oclusión e Implante dental, realizando el diagnóstico y plan de tratamiento adecuado al paciente que requiere recuperar su salud bucal.</p>
                          <div class="row mt-30 mb-20">
                           <div class="col-xs-6">
                            <ul class="mt-10">
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Edentulismo parcial</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Edentulismo total</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;General Medical</li>
                            </ul>
                           </div>
                           <div class="col-xs-6">
                            <ul class="mt-10">
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Alteraciones temporomandibulares</li>
                              <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Enfermedad periodontal con ausencia de piezas dentarias</li>
                            
                            </ul>
                           </div>
                          </div>
                          <a class="btn btn-lg btn-dark btn-theme-colored" href="#">TRATAMIENTO
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- Section: Doctors -->
    <section id="doctors" class="divider" data-bg-img="{{ asset('images/photos/1.jpg') }}">
      <div class="container-fluid p-0">
        <div class="section-content p-90 p-sm-10">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="team-carousel-1col owl-nav-top maxwidth600 mt-sm-50 mb-sm-50">
                <div class="item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="team-thum">
                        <img src="{{ asset('images/team/team1.jpg') }}" alt="">
                      </div>
                    </div>
                    <div class="col-md-6 pl-60 pt-40 pl-sm-15">
                      <h3 class="team-title">Dr.</h3>
                      <h1 class="team-name mt-0">Yulissa Mucha</h1>
                      <h5 class="team-subtitle text-theme-colored">Doctora en Sistemas</h5>
                      <p class="team-description"> Somos un centro de especialidades odontológicas fundado a principios de 2002 y formado por profesionales altamente especializados con más de 15 años de experiencia y que conforman un sólido equipo creado hace más de 8 años. </p>
                      <ul class="social-icons icon-dark icon-theme-colored icon-sm m-0 mt-30">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="team-thum">
                        <img src="{{ asset('images/team/team2.jpg') }}" alt="">
                      </div>
                    </div>
                    <div class="col-md-6 pl-60 pt-40 pl-sm-15">
                      <h3 class="team-title">Dr.</h3>
                      <h1 class="team-name mt-0">Lyn Cheng Percovich</h1>
                      <h5 class="team-subtitle text-theme-colored">Odontológo</h5>
                      <p class="team-description">Su profesionalismo, calidad humana y personalidad apasionada por la odontología, la investigación y su esfuerzo por ofrecer los mejores tratamientos a sus pacientes, fundamentan el crecimiento y solidez de ser un referente distinguido de la odontología.</p>
                      <ul class="social-icons icon-dark icon-theme-colored icon-sm m-0 mt-30">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection