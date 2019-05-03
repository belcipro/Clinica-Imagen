@if(Auth::user()->idrol !== 3)
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Ventas Laravel Vue Js- IncanatoIT">
    <meta name="author" content="Incanatoit.com">
    <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Clinica Odontologica "Imagen"</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icons -->
    <link href="css/plantilla.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <div id="app">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" style="background-image: none" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Escritorio</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Configuraciones</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <i class="icon-bell"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Notificaciones</strong>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-envelope-o"></i> Ingresos
                        <span class="badge badge-success">3</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-tasks"></i> Ventas
                        <span class="badge badge-danger">2</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="d-md-down-none">{{Auth::user()->usuario}} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        
        @if(Auth::check())
            @if (Auth::user()->idrol == 1)
                @include('plantilla.sidebaradministrador')
            @elseif (Auth::user()->idrol == 2)
                @include('plantilla.sidebarvendedor')
            @elseif (Auth::user()->idrol == 3)
                @include('plantilla.sidebaralmacenero')
            @else

            @endif

        @endif
        <!-- Contenido Principal -->
        @yield('contenido')
        <!-- /Fin del contenido principal -->
    </div>   
    </div>

    <div class="modal fade" id="addNewEvent" aria-hidden="true" aria-labelledby="addNewEvent"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple">
              <form class="modal-content form-horizontal" id="citaNewForm" role="form">
                <div class="modal-header">
                  <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                  <h4 class="modal-title">Nueva Cita</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="ename">Doctor:</label>
                    <div class="col-md-10">
                      <select id="tipoConsultaCreate" name="tipoConsultaCreate" class="form-control tipo-consulta-chosen" data-placeholder="Seleccione...">
                        <option></option>

                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="ename">Doctor:</label>
                    <div class="col-md-10">
                      <select id="doctorCreate" class="form-control form-control-chosen" data-placeholder="Seleccione...">
                        <option></option>

                      </select>
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="starts">Comienso:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="startDatetimePicker" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" id="starts" data-target="#startDatetimePicker"/>
                          <span data-target="#startDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                            <i class="icon wb-calendar" aria-hidden="true"></i>
                          </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="ends">Fin:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="endDatetimePicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="ends" data-target="#endDatetimePicker"/>
                        <span data-target="#endDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-actions">
                  <button class="btn btn-primary" type="submit" id="btnCitaForm" onclick="guardarCita()" data-dismiss="modal" type="button">Nueva Cita</button>
                    <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal fade" id="editNewEvent" aria-hidden="true" aria-labelledby="editNewEvent"
            role="dialog" tabindex="-1" data-show="false">
            <div class="modal-dialog modal-simple">
              <form class="modal-content form-horizontal" action="#" method="post" role="form">
                <div class="modal-header">
                  <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                  <h4 class="modal-title">Modificar Cita</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editEname">Tipo de consulta:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="editEname" name="editEname">
                      <input type="hidden" class="form-control" id="editId" name="editId">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editStarts">Comienso:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="startEditDatetimePicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="editStarts" data-target="#startEditDatetimePicker"/>
                        <span data-target="#startEditDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editEnds">Fin:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="endEditDatetimePicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="editEnds" data-target="#endEditDatetimePicker"/>
                        <span data-target="#endEditDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-actions">
                    <button class="btn btn-primary" data-dismiss="modal" onclick="editCita()" type="button">Guardar</button>
                    <button class="btn btn-danger" data-dismiss="modal"  onclick="deleteCita()" type="button">Eliminar</button>
                    <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancelar</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
    <footer class="app-footer">
        <span><a href="http://www.clinica.com/">Clinica</a> &copy; 2019</span>
        <span class="ml-auto">Desarrollado por <a href="http://www.clinica.com/">Clinica Odontologica imagen</a></span>
    </footer>



    <script src="js/app.js"></script>
    <script src="js/plantilla.js"></script>
    

</body>

</html>
@endif 