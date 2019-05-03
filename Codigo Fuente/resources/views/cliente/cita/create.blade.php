{{-- @extends('layouts.clienteApp')

@section('content')
@endsection --}}
@extends('layouts.clienteApp')

@section('content')

<!-- Page -->
    <div class="page">
      <div class="page-main">
        <div class="calendar-container">
          <div id="calendarNew"></div>
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
                    <label class="col-md-2 form-control-label" for="ename">Cita:</label>
                    <div class="col-md-10">
                      <select id="tipoConsultaCreate" name="tipoConsultaCreate" class="form-control tipo-consulta-chosen" required data-placeholder="Seleccione...">
                        <option></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="ename">Doctor:</label>
                    <div class="col-md-10">
                      <select id="doctorCreate" class="form-control form-control-chosen" required data-placeholder="Seleccione...">
                        <option></option>

                      </select>
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="starts">Comienzo:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="startDatetimePicker" data-target-input="nearest">
                          <input disabled required type="text" class="form-control datetimepicker-input" id="starts" data-target="#startDatetimePicker"/>
                          <span data-target="#startDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                            <i class="icon wb-calendar" aria-hidden="true"></i>
                          </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row" style="visibility:hidden">
                    <label class="col-md-2 form-control-label" for="ends">Fin:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="endDatetimePicker" data-target-input="nearest">
                        <input disabled required type="text" class="form-control datetimepicker-input" id="ends" data-target="#endDatetimePicker"/>
                        <span data-target="#endDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-actions">
                  <div class="checkbox checkbox-primary">
                    <div class="row">
                      <div class="col-md-7">
                        <div class="RadioContent">
                          <label class="options checked" for="option1">
                            <span></span>
                            <i class="fas fa-check iconCheck"></i>
                            <input type="radio" checked name="options_payment" value="tarjeta" id="option1">Pagar con Tarjeta
                          </label>
                          <label class="options" for="option2">
                            <span></span>
                            <i class="fas fa-check iconCheck"></i>
                            <input type="radio" name="options_payment"  value="consultoria" id="option2">Pagar en consultoría
                          </label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <button class="btn btn-primary" type="submit" id="btnCitaForm" onclick="guardarCita()" data-dismiss="modal" type="button">Nueva Cita</button>
                        <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                      </div>
                    </div>
                  </div>
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
                    <label class="col-md-2 form-control-label" for="editStarts">Comienzo:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="startEditDatetimePicker" data-target-input="nearest">
                        <input disabled type="text" class="form-control datetimepicker-input" id="editStarts" data-target="#startEditDatetimePicker"/>
                        <span data-target="#startEditDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row" style="visibility:hidden">
                    <label class="col-md-2 form-control-label" for="editEnds">Fin:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="endEditDatetimePicker" data-target-input="nearest">
                        <input disabled type="hidden" class="form-control datetimepicker-input" id="editEnds" data-target="#endEditDatetimePicker"/>
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
        </div>
      </div>
    </div>
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group-sm hidden" id="contentColor">
          <a href="#" class="btn btn-fab color-libre" data-toggle="tooltip" data-placement="left" data-original-title="Other" title="" id="libre">
            Libre
          </a>
          <a href="#" class="btn btn-fab color-pendiente" data-toggle="tooltip" data-placement="left" data-original-title="Other" title="" id="pendiente">
            Pendiente
          </a>
          <a href="#" class="btn btn-fab color-reservado" data-toggle="tooltip" data-placement="left" data-original-title="SMS" title="" id="reservado">
            Reservado
          </a>
          <a href="#" class="btn btn-fab color-anulado" data-toggle="tooltip" data-placement="left" data-original-title="Mail" title="" id="anulado">
            Anulado
          </a>
          <a href="#" class="btn btn-fab color-reservas" data-toggle="tooltip" data-placement="left" data-original-title="Mail" title="" id="reservas">
            Otras reservas
          </a>
          <a href="#" class="btn btn-fab color-nodisponible" data-toggle="tooltip" data-placement="left" data-original-title="Mail" title="" id="nodisponible">
            No disponible
          </a>
        </div>
        <div class="btn-group">
          <a href="javascript:void(0)" class="btn btn-success btn-fab" id="colorPedido">
            Estados
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection 
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>
<script>
    $("#colorPedido").click(function() {
      $("#contentColor").toggleClass('hiddenColor');
    });
// page is now ready, initialize the calendar...
var id=$('#userId').val();

$('.RadioContent label').click(function(){
  console.log(this);
	$('.RadioContent label').removeClass('checked');
  $(this).addClass('checked');
});

console.log(moment().format('YYYY-MM-DD'));
lisDateFullcalendar();
listDoctor();
listTipoConsulta();

var my_options = {
  events:[],
  selectable: true,
  selectConstraint: {
      start: moment().format('YYYY-MM-DD'),
      end: '2100-01-01',
  },
  businessHours: {
    // days of week. an array of zero-based day of week integers (0=Sunday)
    dow: [ 1, 2, 3, 4, 5, 6, 7], // Monday - Thursday
    start: '9:00',
    end: '22:00', // an end time (6pm in this example)
  },
  defaultView: 'agendaWeek',
  lang: 'es',
  header: {
    left: null,
    center: 'prev,title,next',
    right: 'month,agendaWeek,agendaDay'
  },
  eventClick: function(event) {
    var color = event.backgroundColor ? event.backgroundColor : 'blue';
    if(0==0){
      return false;
    }
    if(event.estado=='anulado'||event.estado=='reservado'){
      return false;
    }
    if(event.idPaciente!=={{Auth::user()->id}}){
      return false;
    }

    $('#editEname').val(event.title);
    $('#editId').val(event.id);
    if (event.start) {
      $('#editStarts').val(moment(event.start._i).format("MM/DD/YYYY HH:mm"));
    } else {
      $('#editStarts').val('');
    }
    if (event.end) {
      $('#editEnds').val(moment(event.end._i).format("MM/DD/YYYY HH:mm"));
    } else {
      $('#editEnds').val('');
    }
    $('#editNewEvent').modal('show').one('hidden.bs.modal', function(e) {
      event.title = $('#editEname').val();
      $('#calendar').fullCalendar('updateEvent', event);
    })
  },
  unselect: function( jsEvent, view ){   
  },
  select: function( start, end, jsEvent, view ){
    var startDate=moment(start).format("MM/DD/YYYY HH:mm");
    var endDate=moment(end).format("MM/DD/YYYY HH:mm");
    var stDate=new Date(startDate);
    var eDate=new Date(endDate);

    var newStartDate = moment((stDate.getUTCMonth()+1)+"/"+stDate.getDate()+"/"+stDate.getUTCFullYear()+" "+view.calendar.businessHourGenerator.rawComplexDef.start, "MM/DD/YYYY HH:mm").valueOf();
    var startDates=moment(start).format('MM/DD/YYYY HH:mm');
    var endDates=moment(startDates).add(30,'minutes').format("MM/DD/YYYY HH:mm");
    var newEndDate = moment((stDate.getUTCMonth()+1)+"/"+stDate.getDate()+"/"+stDate.getUTCFullYear()+" "+view.calendar.businessHourGenerator.rawComplexDef.end, "MM/DD/YYYY HH:mm").valueOf();
    
   
    var s = moment(newStartDate).format("MM/DD/YYYY HH:mm");
    var e = moment(newEndDate).format("MM/DD/YYYY HH:mm");

    var startCorrect=new Date(s);
    var endCorrect=new Date(e);
    var realDate=new Date();          
    var dowCorrect=view.calendar.businessHourGenerator.rawComplexDef.dow;
    var newDate=moment(realDate).add(7, 'hours').format('MM/DD/YYYY HH:mm');
    var newRealDate=new Date(newDate);
    if(!(Date.parse(stDate)>=Date.parse(newRealDate))){
      return false
    }
    if(view.name!=="month"){

      if(!(Date.parse(stDate)>=Date.parse(startCorrect)&&Date.parse(stDate)<=Date.parse(endCorrect))){
        return false;
      }
      if(!(Date.parse(eDate)>=Date.parse(startCorrect)&&Date.parse(eDate)<=Date.parse(endCorrect))){
        return false;
      }
    }
    var startValid=new Date(moment(start).format('MM/DD/YYYY HH:mm'));

    dia = startValid.getDate() 
    mes = parseInt(startValid.getMonth()) 
    ano = startValid.getFullYear()

    var dateInvalid={
      min:new Date(moment((mes+1)+'/'+dia+'/'+ano+' 09:00').format('MM/DD/YYYY HH:mm')),
      max:new Date(moment((mes+1)+'/'+dia+'/'+ano+' 21:00').format('MM/DD/YYYY HH:mm')),
    };
    
    console.log(dateInvalid.min);

    if(Date.parse(startValid)>Date.parse(dateInvalid.min)&&Date.parse(startValid)<Date.parse(dateInvalid.max)){
      if (start) {
        $('#starts').val(startDate);
      } else {
        $('#starts').val('');
      }
      if (end) {
        $('#ends').val(endDates);
      } else {
        $('#ends').val('');
      }
      $('#addNewEvent').modal('show');
    }
  },
  editable: false,
}
$('#calendarNew').fullCalendar(my_options)
dateTime();
function dateTime(){
  $('#startDatetimePicker').datetimepicker({
    sideBySide: true,
    allowInputToggle: true,
    format:"MM/DD/YYYY HH:mm",
    minDate:moment().format('MM/DD/YYYY HH:mm')
  });
  $('#endDatetimePicker').datetimepicker({
    sideBySide: true,
    allowInputToggle: true,
    format:"MM/DD/YYYY HH:mm",
    minDate:moment().format('MM/DD/YYYY HH:mm')
  });
  $('#startEditDatetimePicker').datetimepicker({
    sideBySide: true,
    allowInputToggle: true,
    format:"MM/DD/YYYY HH:mm",
    minDate:moment().format('MM/DD/YYYY HH:mm')
  });
 
  $('#endEditDatetimePicker').datetimepicker({
    sideBySide: true,
    allowInputToggle: true,
    format:"MM/DD/YYYY HH:mm",
    minDate:moment().format('MM/DD/YYYY HH:mm')
  });
}
function lisDateFullcalendar(){
  var newEvents = new Array();
  $.ajax({
    url: '/cita/citalist',
    dataType: 'json',
    success: function( resp ) {
      for (i in resp) {
          if(resp[i].estado=="anulado"&&resp[i].idPaciente!=={{Auth::user()->id}}){
            
          }
          else{
            var obj = new Object();
              obj.id=resp[i].id;
              obj.start=moment(resp[i].fechaInicio).format("YYYY-MM-DD HH:mm");
              obj.end=moment(resp[i].fechaFin).format("YYYY-MM-DD HH:mm");
              obj.title=resp[i].titulo;
              obj.estado=resp[i].estado;
              if({{Auth::user()->id}}==resp[i].idPaciente){
                obj.idPaciente=resp[i].idPaciente;
                obj.backgroundColor=resp[i].color;
                obj.borderColor=resp[i].color;
              }
              else{
                obj.idPaciente=-1;
                obj.backgroundColor="#40c4ff";
                obj.borderColor="#40c4ff";
              }
            newEvents.push(obj);
          }
      }
      EVENTS = newEvents;
      CAL = $('#calendarNew').fullCalendar('getCalendar');
      CAL.refresh = function() {
          CAL.removeEvents();
          CAL.addEventSource(EVENTS);
      }
      listCalendar();
      CAL.refresh();     
    },
    error: function( req, status, err ) {
      console.log( 'something went wrong', status, err );
      return [];
    }
  });
  return newEvents;
}
function listDoctor(){
  var newEvents = new Array();
  $.ajax({
    url: '/client/doctorsearch',
    dataType: 'json',
    success: function( resp ) {  
      selectedDoctor = document.getElementById('doctorCreate');
      for (i in resp.data) {
        console.log(resp.data[i]);  
        selectedDoctor.options[selectedDoctor.options.length] = new Option(resp.data[i].nombre+" "+resp.data[i].apellidos, resp.data[i].id);    
      }    
      $('#doctorCreate').chosen({
      });
      document.getElementById('doctorCreate').value = resp.data[0].id;  
      $('#doctorCreate').trigger('chosen:updated');
    },
    error: function( req, status, err ) {
      console.log( 'something went wrong', status, err );
      return [];
    }
  });
  return newEvents;
}
function listTipoConsulta(){
  var newEvents = new Array();
  $.ajax({
    url: '/client/listtipoconsulta',
    dataType: 'json',
    success: function( resp ) {  
      selectedtipoConsulta = document.getElementById('tipoConsultaCreate');
      for (i in resp) {
        if(resp[i].id==1){
          selectedtipoConsulta.options[selectedtipoConsulta.options.length] = new Option(resp[i].nombre+" S/."+resp[i].precio, resp[i].id);  
        }
      }  
      $('.tipo-consulta-chosen').chosen({
        
      });
      document.getElementById('tipoConsultaCreate').value = resp[0].id;  
      $('#tipoConsultaCreate').trigger('chosen:updated');

      console.log(resp);
    },
    error: function( req, status, err ) {
      console.log( 'something went wrong', status, err );
      return [];
    }
  });
  return newEvents;
}
function listCalendar(){
  var newEvents = new Array();
  $.ajax({
    url: '/calendar/listall',
    dataType: 'json',
    success: function( resp ) {  
      console.log(resp);
      for (i in resp) {
        var obj = new Object();
              obj.id=resp[i].id;
              obj.start=moment(resp[i].fechaInicio).format("YYYY-MM-DD HH:mm");
              obj.end=moment(resp[i].fechaFin).format("YYYY-MM-DD HH:mm");
              obj.title=resp[i].titulo;
              obj.estado='Feriado';
              obj.idPaciente='-1';
              obj.backgroundColor=resp[i].color;
              obj.borderColor=resp[i].color;
              
            newEvents.push(obj);
      }
      EVENTS = newEvents;
      CAL = $('#calendarNew').fullCalendar('getCalendar');
      CAL.refresh = function() {
          CAL.addEventSource(EVENTS);
      }
      CAL.refresh();    
      console.log(resp); 
    },
    error: function( req, status, err ) {
      console.log( 'something went wrong', status, err );
      return [];
    }
  });
  return newEvents;
}
function guardarCita(){
  var doctor=$('#doctorCreate').val();
  var starts=$('#starts').val();
  var ends=$('#ends').val();
  var tipoConsulta=$('#tipoConsultaCreate').val();
  var tipoPago="";
  var tarjeta=$("#option1");
  var consultoria=$("#option2");
  if(tarjeta[0].checked==true){
    tipoPago=tarjeta.val();
  }
  if(consultoria[0].checked==true){
    tipoPago=consultoria.val();
  }
  if(starts==''||ends==''||doctor==''||tipoConsulta==''){
    toastr.error('Campos vacios','Error')
    return false;
  }
  var data={'tipoConsulta':tipoConsulta,'starts':starts,'ends':ends,'id':id,'idEspecialista':doctor,'tipoPayment':tipoPago}
  $.ajax({
      url:'/client/cita',
      headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type:'POST',
      dataType:'json',
      cache: false,
      data:data,
      async: true,
      beforeSend: function(){
        $('#btnCitaForm').attr('Guardando...');
      },
      success: function( resp ) {
        toastr.success('Cita realizado con exito','Guardado')
        $('#calendarNew').fullCalendar('renderEvent', {
              id: resp.id,
              idEspecialista:doctor,
              title: resp.titulo,
              esstado: resp.estado,
              start: moment(resp.fechaInicio).format("MM/DD/YYYY HH:mm"),
              end: moment(resp.fechaFin).format("MM/DD/YYYY HH:mm"),
              backgroundColor: resp.color,
              idPaciente:parseInt(resp.idPaciente),
              borderColor:resp.color
        });
        if(tarjeta[0].checked==true){
          window.location.href = "/client/citapayment";
        }
      },
      error: function( req, status, err ) {
        toastr.error('Cita no realizado','No Guardado')
      }
    })
    .done(function(respuesta){
    
    })
    .fail(function(resp){
      console.log(resp.responseText);
    })
    .always(function(){
      console.log("complete");
    });
}
function editCita(){
  var starts=$('#editStarts').val();
  var ends=$('#editEnds').val();
  var title=$('#editEname').val();
  var idEdit=$('#editId').val();
  var idEdit=$('#editId').val();
  var data={'title':title,'starts':starts,'ends':ends,'id':idEdit}
  $.ajax({
      url:'/client/editarcita',
      headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type:'POST',
      dataType:'json',
      cache: false,
      data:data,
      async: true,
      beforeSend: function(){
        $('#btnCitaForm').attr('Guardando...');
      },
      success: function( resp ) {
        toastr.success('Cita editado con exito','Editado')
        $('#calendarNew').fullCalendar('removeEvents', idEdit);
        console.log(resp);
          $('#calendarNew').fullCalendar('renderEvent', {
              id: resp.id,
              estado: resp.estado,
              title: resp.titulo,
              start: moment(resp.fechaInicio).format("MM/DD/YYYY HH:mm"),
              end: moment(resp.fechaFin).format("MM/DD/YYYY HH:mm"),
              backgroundColor: resp.color,
              idPaciente:resp.idPaciente,
              borderColor:resp.color
        });
      },
      error: function( req, status, err ) {
        toastr.error('Cita no editado','No editado')
      }
    })
    .done(function(respuesta){
    
    })
    .fail(function(resp){
      console.log(resp.responseText);
    })
    .always(function(){
      console.log("complete");
    });
}
function deleteCita(){
  var idEdit=$('#editId').val();
  var data={'id':idEdit}
  $.ajax({
      url:'/client/desactivarcita',
      headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type:'POST',
      dataType:'json',
      cache: false,
      data:data,
      async: true,
      beforeSend: function(){
        $('#btnCitaForm').attr('Guardando...');
      },
      success: function( resp ) {
        toastr.success('Cita eliminado con exito','Eliminado')
        console.log(resp);
        $('#calendarNew').fullCalendar('removeEvents', idEdit);
          $('#calendarNew').fullCalendar('renderEvent', {
              title: resp.titulo,
              id: resp.id,
              estado: resp.estado,
              start: moment(resp.fechaInicio).format("MM/DD/YYYY HH:mm"),
              end: moment(resp.fechaFin).format("MM/DD/YYYY HH:mm"),
              backgroundColor: resp.color,
              borderColor:resp.color,
              idPaciente:resp.idPaciente,
        });
      },
      error: function( req, status, err ) {
        toastr.error('Cita no eliminado','No eliminado')
      }
    })
    .done(function(respuesta){
    
    })
    .fail(function(resp){
      console.log(resp.responseText);
    })
    .always(function(){
      console.log("complete");
    });
    
}
</script>
@endsection