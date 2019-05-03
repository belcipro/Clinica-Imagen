<!DOCTYPE html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<meta name="csrf-token" content="{{ csrf_token() }}">
	  	<!-- Las 3 metaetiquetas anteriores * deben * ser lo primero en la cabeza; cualquier otro contenido principal debe venir * después * de estas etiquetas -->
	  	<title>Percovich</title>

	  	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
	  	{{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
	  	<link rel="stylesheet" href="css/font-awesome.min.css">
	  	<link rel="stylesheet" href="css/animate.css">
	  	<link href="css/animate.min.css" rel="stylesheet">
	  	<link href="css/style.css" rel="stylesheet" />
		<link href="{{ asset('assets/css/now-ui-dashboard.min69ea.css?v=1.1.2') }}" rel="stylesheet" />
	  	<link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
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

  	<div class="content">
        <div class="col-xl-8 mr-auto ml-auto">
		    <div class="wizard-container">
		        <div class="card card-wizard" data-color="primary" id="wizardProfile">
		            <form action="#" method="">
		            	{{ csrf_field() }}
		                <div class="card-header text-center" data-background-color="orange">
		                    <div class="wizard-navigation">
		                        <ul class="nav nav-pills">
		                            <li class="nav-item">
		                                <a class="nav-link active" href="#about" data-toggle="tab" role="tab" aria-controls="about" aria-selected="true">
		                                <i class="now-ui-icons users_circle-08"></i>
		                                Consulta/Examen 
		                                </a>
		                            </li>
		                            <li class="nav-item">
		                                <a class="nav-link" href="#account" data-toggle="tab" data-toggle="tab" role="tab" aria-controls="account" aria-selected="false">
		                                <i class="now-ui-icons ui-1_settings-gear-63"></i>
		                                Pago y Resumen
		                                </a>
		                            </li>
		                        </ul>
		                     </div>
		                </div>
		                <div class="card-body">
		                    <div class="tab-content">
		                        <div class="tab-pane show active" id="about">
		                            <div class="row justify-content-center">
		                               
		                                
		                                <div class="col-xl-4">
		                                    <select class="selectpicker" data-size="7" data-style="btn btn-info btn-round" title="Campo obligatorio" required id="id_medico" name="id_medico">
		                                        <option disabled selected>Médico</option>
		                                        @foreach ($medics as $medico)
		                                            <option value="{{ $medico->id }}">
		                                                {{ $medico->nombres.' '.$medico->apellido_paterno }}
		                                            </option>
		                                        @endforeach
		                                    </select>
		                                </div> 
		                            </div>
                            		<hr>
		                            <div class="row">
		                              	<div class="col-md-6 ml-auto mr-auto">
		                                  	<div class="card card-calendar">
		                                      	<div class="card-body ">
		                                          	<div id="fullCalendar"></div>
		                                      	</div>
		                                  	</div>
		                              	</div>
		                          	</div>
                        		</div>
                        		<div class="tab-pane fade" id="account">
                            		<div class="row justify-content-center">
										<div class="col-xl-8 ml-auto mr-auto">
											<div class="card ">
			                                    <div class="card-header ">
			                                       <h4 class="card-title text-info">PAGO Y RESUMEN</h4>
			                                    </div>
	                                      		<div class="card-body ">
	                                        		<form class="form-horizontal">
			                                           			                                           
			                                            <div class="row">
			                                                <label class="col-md-3 col-form-label">Medico: </label>

			                                                <div class="col-md-9">
			                                                    <div class="form-group">
			                                                        <input type="text" class="form-control" id="mostrar_id_medico" readonly="">
			                                                    </div>
			                                                </div>
			                                            </div>
	                                        		</form>
	                                    		</div>
	    									</div>
										</div>
                                	</div>
                                	<div class="row">
                                		<div class="col-md-4 ml-auto mr-auto">
		                                    <div class="form-check">
		                                        <label class="form-check-label">
		                                            <input class="form-check-input" type="checkbox" name="check" id="check" value="5">
		                                            <span class="form-check-sign"></span>
		                                            Acepto los términos y condiciones.
		                                        </label>
		                                    </div>
		                                </div>
		                                <div class="col-md-4 text-right">
		                                    <button class="btn btn-info btn-lg btn-block" id="buyButton" type="button" role="button" query-medic-id="{{ $queryMedic->id }}" data-query-medic="{{ $queryMedic->nombre }}" data-precio={{ $queryMedic->precio }} >
		                                        Pagar
		                                    </button>   
		                                </div>
                                	</div>
                            	</div>
                        	</div>
                    	</div>
                    	<div class="card-footer">
		                    <div class="pull-right">
		                        <input type='button' class='btn btn-next btn-fill btn-info btn-round btn-wd' name='next' value='Siguiente' id="btn_siguiente" />
		                        {{-- <input type='submit' class='btn btn-finish btn-fill btn-info btn-round btn-wd' name='finish' value='Guardar' /> --}}
		                    </div>

		                    <div class="pull-left">
		                        <input type='button' class='btn btn-previous btn-fill btn-info btn-round btn-wd' name='previous' value='Regresar' />
		                    </div>
		                    <div class="clearfix"></div>
		                </div>
                    </form>
                </div>
        	</div>
    	</div>
	</div> 
  	@include('modal-info-medico')
  	<hr>
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
          <h4>Galeria-Fotos</h4>
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
          Todos los Derechos Reservados
          <div class="credits">
      
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 		<script src="{{ asset('assets/js/core/jquery.min.js') }}" ></script>
        <script src="{{ asset('assets/js/core/popper.min.js') }}" ></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}" ></script>
        <script src="{{ asset('assets/js/plugins/fullcalendar/moment.min.js') }}"></script> 
        <script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}" ></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery-jvectormap.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}" ></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
        <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
        <script src="{{ asset('assets/js/now-ui-dashboard.min69ea.js?v=1.1.2') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/plugins/fullcalendar/es.js') }}"></script>
        <script src="{{ asset('assets/demo/demo.js') }}"></script>
      <script>
        $(document).ready(function(){
          demo.initFullCalendar();
          demo.checkFullPageBackgroundImage();
                demo.initDateTimePicker();
                demo.initNowUiWizard();
                setTimeout(function(){
                  $('.card.card-wizard').addClass('active');
                },600);
        });
    </script>
    <script>
    	$('#btn_siguiente').click(function() {
            resumenConsultaM();
        })
      	function resumenConsultaM() {
        	var id_consulta_medica = $('#id_consulta_medica option:selected').text();
        	var id_tratamiento = $('#id_tratamiento option').text();
        	var id_medico = $('#id_medico option:selected').text();

        	mostrar_consulta_medica = $('#mostrar_consulta_medica').val(id_consulta_medica);
        	mostrar_id_tratamiento = $('#mostrar_id_tratamiento').val(id_tratamiento);
        	mostrar_id_medico = $('#mostrar_id_medico').val(id_medico);
        	

      	}
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#id_medico').change(function() {
                $('#info-medico').modal('show');
                id_medico = document.getElementById("id_medico").value;

                getMedics(id_medico);
            })

            function getMedics(id_medico) {
                $.ajax({
                    type: 'GET',
                    url:  '{{ route('getMedicsAll') }}',
                    data: {id_medico: id_medico},
                    success:function(data)
                    {
                        $('.result').empty().html(data);
                    }
                })
            }
        });
    </script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#id_especialidad').change(function()
            {
                id_especialidad = document.getElementById("id_especialidad").value;

                getMedics(id_especialidad);
            })
        });

        function getMedics(id_especialidad)
        {
            $.ajax({
                type: 'GET',
                url:  '{{ route('getMedicsAll') }}',
                data: {id_especialidad: id_especialidad},
                success:function(data)
                {
                    $('.result').empty().html(data);
                }
            })
        }
    </script>
    <!-- Incluyendo .js de Culqi Checkout-->
	<script src="https://checkout.culqi.com/js/v3"></script>
	<!-- Configurando el checkout-->
	<script>
	    Culqi.publicKey = 'pk_test_G0a8veW4WFqkk5a9';

	    var query_medic = $('#buyButton').attr('data-query-medic');
	    var query_price = $('#buyButton').attr('data-precio');
	    var query_medic_id = $('#buyButton').attr('query-medic-id');
	    $('#buyButton').on('click', function(e) {

            // Abre el formulario con las opciones de Culqi.settings
            Culqi.open();
            e.preventDefault();
		});

		Culqi.settings({
	        title: 'PERCOVICH',
	        currency: 'PEN',
	        description: query_medic,
	        amount: 8000
	    });

		function culqi() { 
		    if(Culqi.token) { // ¡Token creado exitosamente!
		        // Get the token ID:
		        var token = Culqi.token.id;
		        var email = Culqi.token.email;
		        crsfToken = document.getElementsByName("_token")[0].value;
		        var data = { "X-CSRF-TOKEN": crsfToken, query_medic_id: query_medic_id, query_price: query_price, query_medic: query_medic, token: token,email:email };
		        var url = "{{ route('postPayment') }}";
		        function generatePayment(data, url) {
	                $.ajax({
	                    type: 'POST',
	                    url:  url,
	                    data: data,
	                    success:function(res)
	                    {
	                       alert(res);
	                    },
	                    error: function(error) {
	                    	console.info(error);
	                    }

	                })
	            }
		        // alert('Se ha creado un token:' + token);

		    }else{ // ¡Hubo algún problema!
		        // Mostramos JSON de objeto error en consola
		        console.log(Culqi.error);
		        alert(Culqi.error.user_message);
		    }
		};
	</script>

    {{-- <script>
        var producto = '';
        var precio = '';
        var email = '';
        var idproducto = '';
        var costoreal = 0;
        $(function() { 
            CheckChecked();
            Culqi.publicKey = 'pk_test_G0a8veW4WFqkk5a9';
        });
        $('#miBoton').on('click', function(e) {
            producto = '{{ $queryMedic->nombre }}';
            precio = '{{ $queryMedic->precio }}';
            email = 'jaureguizjo@gmail.com';
            idproducto = '{{ $queryMedic->id }}';
            costoreal = 8000;
            ConfiguracionCulqui(producto, precio);
            VerificarButton();
            e.preventDefault();
        });
        $('#check').change(function() {
            CheckChecked();
        });

        function VerificarButton() {
            $('#check').is(":checked") ? Culqi.open() : '';
        }

        function ConfiguracionCulqui(producto, precio) {
            Culqi.settings({
                title: producto,
                currency: 'PEN',
                description: 'PERCOVICH',
                amount: costoreal,
            });
        }

        function culqi() {
            if (Culqi.token) {
                // AccionPago();
                var token = Culqi.token.id;
                var data = {
                    producto,
                    idproducto,
                    precio,
                    token,
                    email
                };
                var url = "{{ route('postPayment') }}";
                GenerarPago(data, url);
            } else {
                CargarEstadoPago(Culqi.error.user_message);
            }
        };

        // function AccionPago() {
        //     $('#contenedorpago').hide();
        //     $('#mensajepago').html('<h2>Estamos procesando su transacción no cierre esta ventana </h2><img src="res/assets/images/icn/cargador-development.gif" alt="cargador pago" style=" width: 600px;">');
        // }

        function GenerarPago(data, url) {
            $.post(url, data, function(response) {
                var datos = JSON.parse(response);
                if (datos.object === "error") {
                    CargarEstadoPago(datos.user_message);
                } else {
                    parametros = {
                        idtransanccion: datos.id,
                        montopagado: datos.amount / 100,
                        idproducto,
                        costoreal,
                        descripcion: producto,
                        creation_date: datos.creation_date,
                        email: datos.source.email,
                        card_number: datos.source.card_number,
                        ip: datos.source.client.ip
                    };
                    // GuardarPago(parametros);
                    CargarEstadoPago(datos.outcome.user_message);
                }
            });
        }

        // function GuardarPago(parametros) {
        //     $.ajax({
        //         type: 'POST',
        //         url: './?action=pay',
        //         data: parametros,
        //         success: function(response) {
        //             console.log(response);
        //         }
        //     });    
        // }

        // function CargarEstadoPago(mensaje) {
        //     window.location = './?view=main_confirmacionpago&menssage=' + mensaje;
        // }

        function CheckChecked() {
            $('#check').is(":checked") ? $('#miBoton').removeAttr("disabled") : $('#miBoton').attr('disabled', 'disabled');
        }
    </script>  --}}
</body>

</html>
