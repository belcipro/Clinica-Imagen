<template>
            <main class="main">
            <!-- Breadcrumb -->
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>Calendar
                    </div>
                    <div class="event-calendar__grid">
                        <div class="containerControls">
                            <button class="btn" @click="prevDate()"><i class="fas fa-chevron-left"></i></button>
                            <h2>{{nameMonth}}</h2>
                            <button class="btn" @click="nextDate()"><i class="fas fa-chevron-right"></i></button>
                        </div>
                        <div class="days-of-week">
                            <div>Lunes</div>
                            <div>Martes</div>
                            <div>Miercoles</div>
                            <div>Jueves</div>
                            <div>Viernes</div>
                            <div>Sabado</div>
                            <div>Domingo</div>
                        </div>
                        <div class="week" v-for="week in month" :key="week.week">
                            <div class="day" :class="{ 'is-today': isToday(day) }" v-for="(day, index) in week.days" :key="index">
                                <div class="comtainerDay">
                                    <div class="day__header">{{ day.format('DD') }}    
                                    </div>
                                    <div class="day__events">
                                        <div class="event" v-for="event in eventsOf(day)" :key="event.id" v-bind:style="{background: event.color}"  @click="abrirModal('calendar', 'actualizar',event )" >{{ event.titulo }}
                                            
                                        </div>
                                    </div>
                                    <div class="containerRegister"  @click="abrirModal('calendar', 'registrar', {'dateStart':day.format('YYYY-MM-DD'),'dateEnd':day.format('YYYY-MM-DD')} )" >
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Titulo (*)</label>
                                    <div class="col-md-9">
                                       <input class="form-control" v-model="calendar.titulo"> 
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Fecha de Inicio (*)</label>
                                    <div class="col-md-9">
                                        <div class="input-group mb-3">
                                            <date-picker v-model="calendar.dateStart" :config="optionsDate"></date-picker>
                                            
                                                <span class="spnaDate" id="basic-addon1">Hora</span>
                                            <date-picker v-model="calendar.timeStart" :config="optionsTime"></date-picker>
                                        </div>
                                    </div>
                                </div>
                                 
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Fecha fin (*)</label>
                                    <div class="col-md-9">
                                        <div class="input-group mb-3">
                                            <date-picker v-model="calendar.dateEnd" :config="optionsDate"></date-picker>
                                            
                                                <span class="spnaDate" id="basic-addon1">Hora</span>
                                            <date-picker v-model="calendar.timeEnd" :config="optionsTime"></date-picker>
                                        </div>
                                    </div>
                                </div>
                                <div  v-if="cita.create">
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label" for="text-input">Buscar paciente</label>
                                        <div class="col-md-9">
                                            <search-autocomplete-component @selected="selectedUsuario"/>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-link" @click="createUsersTratamiento()">Crear tratamiento</a>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label" for="text-input">Seleccionar tratamiento</label>
                                        <div class="col-md-9">
                                            <div class="input-group mb-3">
                                            <select class="form-control" v-model="tratamientoDetalle.id_tratamiento_usuario">    
                                                <option value="">--Seleccione--</option>
                                                <option v-for="(item) in dataTratamientosUser" :key="item.id" :value="item.id">Inicio en {{item.fechaInicio}} - termina el {{item.fechaFin}}</option>
                                                
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label" for="text-input">Pago (S/.)</label>
                                        <div class="col-md-9">
                                            <div class="input-group mb-3">
                                            <input class="form-control" v-model="tratamientoDetalle.pago">    
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <hr>
                                <a class="btn btn-link" href="#" @click="AddCita()">{{txtCita}}</a>
                                <div v-show="errorCalendar" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjCalendar" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarCalendario()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarCalendario()">Actualizar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-danger" @click="eliminarCalendario()">Eliminar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <form-tratamiento/>
        </main>
</template>

<script>
    import {EventBus} from '../helpers/event-bus.js'
    import SearchAutoCompleteComponent from "./inc/Search.vue"

    import Cita from '../models/cita.js'
    import TratamientoUsers from '../models/tratamiento_user.js'
    import DetalleTratamiento from '../models/detalle_tratamiento.js'
    import moment from "moment";
    import datePicker from 'vue-bootstrap-datetimepicker';
    import TratamientoUserForm from './inc/TratamientoUserForm.vue'
     import toast from 'toastr';
    moment.locale('es');
    export default {
        data (){
            return {
                selectedDate: {
                    start: new Date(2018, 9, 16),
                    end: new Date(2018, 9, 18)
                },
                date: moment(),
                calendar_id: 0,
                txtCita:'Crear cita',
                nombre : '',
                calendar:{
                    titulo:'',
                    dateStart:'',
                    timeStart:'09:00:00',
                    dateEnd: '',
                    timeEnd:'22:00:00',
                },
                arrayCalendar : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorCalendar : 0,
                errorMostrarMsjCalendar : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'c.estado',
                buscar : '',
                optionsDate: {
                    format: 'YYYY-MM-DD',
                    collapse: true,
                    useStrict:true,
                },
                optionsTime: {
                    format: 'HH:mm:ss',
                    collapse: true,
                    useStrict:true,
                },
                cita:new Cita(),
                tratamientoUsers:new TratamientoUsers(),
                tratamientoDetalle:new DetalleTratamiento(),
                modalTratamiento:false,
                dataTratamientosUser:[]
            }
        },
        components: {
            datePicker,
            'form-tratamiento':TratamientoUserForm,
            'search-autocomplete-component':SearchAutoCompleteComponent,
        },
        
        computed:{
            startWeek() {
                return this.date.month() === 0 ? 0 : this.date.clone().startOf('month').week();
            },
            nameMonth(){
               var month=this.date.format('MMMM YYYY');
               this.listarCalendar();
                return month;
            },
            endWeek() {
                return this.date.clone().endOf('month').week();
            },
             month() {
                const month = [];
                console.log( this.startWeek);
                for (let week = this.startWeek; week <= this.endWeek; week++) { 
                    console.log(week);
                    month.push({ 
                        week: week, 
                        days: [,,,,,,,].fill(0).map((n, i) => {
                            return this.date
                                .clone()
                                .week(week)
                                .startOf('week')
                                .add(i, 'day');
                        })
                    });
                }
                return month;
            },
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            }
        },
        methods : {
            listTratamientoUsers:function(){
                axios.get('/tratamiento-users?id_usuario='+this.tratamientoUsers.id_usuario)
                .then(res=>{
                    const {data}=res;
                    this.dataTratamientosUser=data;
                })
                .catch(err=>{

                })

            },
            selectedUsuario:function(item){
                this.tratamientoUsers.id_usuario=item.id;
                this.listTratamientoUsers();
            },
            AddCita(){
                if(this.cita.create==true){
                    
                    this.cita.create=false;
                    this.txtCita='Crear cita';
                    this.tituloModal='Registrar horario no disponible';
                    return;
                }
                this.cita.create=true;
                this.txtCita='Crear horario no disponible';
                this.tituloModal='Registrar cita';
            },
            createUsersTratamiento(){
                const modal=true;
                EventBus.$emit('tratamiento-modal',modal);
            },
            eventsOf(day) {
                return this.arrayCalendar[day.format('YYYY-MM-DD')];
            },
            isToday(day) {
                return moment().format('YYYY-MM-DD') === day.format('YYYY-MM-DD');
            },
            checkedPrecio:function(num){
                var newPrecio=num.toFixed(2);
                return newPrecio;
            },
            listarCalendar (){
                let me=this;
                var url= '/calendar?year='+this.date.format('YYYY')+'&month='+this.date.format('MM');
                axios.get(url).then(response=>{
                    var respuesta= response.data;
                    var respDate=JSON.stringify(respuesta);
                    var resp=JSON.parse(respDate);
                    var newObj=new Array();
                    for(const x in  resp){
                        //console.log(resp[x][0]);
                        if(moment(resp[x][0].fechaInicio).format('YYYY-MM-DD')==moment(resp[x][0].fechaFin).format('YYYY-MM-DD')){
                            var date=moment(resp[x].index).format('YYYY-MM-DD');
                            console.log(resp[x].indexOf());
                            var newObjDate='{"'+date+'": [{ "id": "'+resp[x][0].id+'","fechaInicio":  "'+resp[x][0].fechaInicio+'","fechaFin":  "'+resp[x][0].fechaFin+'","color": "'+resp[x][0].color+'","titulo":"'+resp[x][0].titulo+'"}]}';
                            var data=JSON.parse(newObjDate);
                            newObj.push(data);
                        }
                        else{
                            var date=moment(resp[x][0].fechaFin).format('YYYY-MM-DD');
                            var newObjDate='{"'+date+'": [{ "id": "'+resp[x][0].id+'","fechaInicio":  "'+resp[x][0].fechaInicio+'","fechaFin":  "'+resp[x][0].fechaFin+'","color": "'+resp[x][0].color+'","titulo":"'+resp[x][0].titulo+'"}]}';
                            var data=JSON.parse(newObjDate);
                            newObj.push(data);
                        }
                    }
                    console.log(newObj);
                    me.arrayCalendar = respuesta;
                    
                    
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            prevDate: function(){
                 var newDate=moment(this.date).subtract(1, 'months').format('YYYY-MM');
                 this.date=moment(newDate);
                 console.log(newDate,this.date);
            },
            nextDate: function(){
                 var newDate=moment(this.date).add(1, 'months').format('YYYY-MM');
                 this.date=moment(newDate);
                 console.log(newDate,this.date);
            },
            createCita(){
                this.cita.titulo=this.calendar.titulo;
                this.cita.fechaInicio=this.calendar.dateStart+" "+this.calendar.timeStart;
                this.cita.fechaFin=this.calendar.dateEnd+" "+this.calendar.timeEnd;
               
                axios.post('tratamiento-detalle',{
                    'cita':this.cita,
                    'tratamiento_users':this.tratamientoUsers,
                    'detalle':this.tratamientoDetalle,
                })
                .then(res=>{
                    toast.success('Se guardo correctamente')
                    this.modal=false;
                })
                .catch(err=>{
                    toast.error('No se guardo correctamente')
                })
            },
            registrarCalendario(){
                if(this.tratamientoUsers!=0&&this.cita.create==true){
                    this.createCita();
                    return;
                }
                if (this.validarCalendar()){
                    return;
                }
                
                let me = this;

                axios.post('/calendar/registrar',{
                    'titulo': this.calendar.titulo,
                    'fechaInicio': this.calendar.dateStart+' '+this.calendar.timeStart,
                    'fechaFin': this.calendar.dateEnd+' '+ this.calendar.timeEnd,
                    'color':'#757575',
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarCalendar();
                     me.calendar.titulo='';
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
            validarCalendar(){
                this.errorCalendar=0;
                this.errorMostrarMsjCalendar =[];
                if (!this.calendar.titulo) this.errorMostrarMsjCalendar.push("El Titulo no puede estar vacío.");
                if (!this.calendar.dateStart) this.errorMostrarMsjCalendar.push("La fecha de inicio no puede estar vacío.");
                if (!this.calendar.timeStart) this.errorMostrarMsjCalendar.push("La fecha final no puede estar vacío.");
                if (!this.calendar.dateEnd) this.errorMostrarMsjCalendar.push("La hora de inicio no puede estar vacío.");
                if (!this.calendar.timeEnd) this.errorMostrarMsjCalendar.push("La hora final no puede estar vacío.");

                if (this.errorMostrarMsjCalendar.length) this.errorCalendar = 1;

                return this.errorCalendar;
            },

            actualizarCalendario(){
               if (this.validarCalendar()){
                    return;
                }
                let me = this;
                axios.put('/calendar/actualizar',{
                    'id': this.calendar_id,
                    'titulo': this.calendar.titulo,
                    'fechaInicio': this.calendar.dateStart+' '+this.calendar.timeStart,
                    'fechaFin': this.calendar.dateEnd+' '+ this.calendar.timeEnd,
                    'color':'#757575',
                }).then(function (response) {
                    me.cerrarModal();
                    me.calendar.titulo='';
                    me.calendar_id=0;
                    me.listarCalendar();
                    toast.success('Exito al acctualizar');
                }).catch(function (error) {
                    console.log(error);
                    toast.error('Error al acctualizar');
                }); 
            },
            eliminarCalendario(){
                let me = this;
                console.log( this.calendar_id)
                axios.delete('/calendar/eliminar/'+this.calendar_id).then(function (response) {
                    me.cerrarModal();
                    me.calendar.titulo='';
                    me.calendar_id=0;
                    me.listarCalendar();id_usuario
                    toast.success('Exito al eliminar');
                }).catch(function (error) {
                    console.log(error);
                    toast.error('Error al eliminar');
                }); 
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.errorCalendar=0;
            },
            abrirModal(modelo, accion, data = []){
                console.log(data)
                var newDate=new Date();
                var dateStart=new Date(data['dateStart']);
                console.log(dateStart,newDate);
                console.log(Date.parse(dateStart),Date.parse(newDate));
                if(Date.parse(dateStart)<Date.parse(newDate)){
                    return false
                }
                switch(modelo){
                    case "calendar":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar horario no disponible';
                                this.tipoAccion = 1;
                                this.calendar.dateStart=data['dateStart'];
                                this.calendar.dateEnd=data['dateEnd'];
                                break;
                            }
                            case 'actualizar':
                            {
                                this.modal=1;
                                this.tituloModal = 'Actualizar';
                                this.tipoAccion = 2;
                                this.calendar.dateStart=moment(data['fechaInicio']).format('YYYY-MM-DD');
                                this.calendar.dateEnd=moment(data['fechaFin']).format('YYYY-MM-DD');
                                this.calendar.timeStart=moment(data['fechaInicio']).format('HH:mm:ss');
                                this.calendar.timeEnd=moment(data['fechaFin']).format('HH:mm:ss');
                                this.calendar.titulo=data['titulo'];
                                this.calendar_id=data['id'];
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarCalendar();
            EventBus.$on('tratamiento-created',data=>{
               TratamientoUsers.id_usuario= data.id_usuario;
            })
        }
    }
    
</script>
<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: fixed!important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
    .containerControls{
        display: flex;
    }
    .containerControls button{
        flex:1;
    }
    .containerControls h2{
        flex:3;
        text-align:center;
    }
    .days-of-week {
        display: flex;
        text-align: center;
    }
    .days-of-week > div {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50px;
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
    .event-calendar__grid {
        border: 1px solid rgba(0, 0, 0, 0.1);
    }
    .week {
        display: flex;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    .week:last-child {
        border-bottom: none;
    }
    .week > .day {
        flex: 1;
        height: 130px;
        padding: 5px;
        box-sizing: border-box;
        border-right: 1px solid rgba(0, 0, 0, 0.1);
    }
    .week > .day:last-child {
        border-right: none;
    }
    .day.is-today {
        background-color: #ddd;
    }
    .spnaDate{
        background-color: #ddcece;
        padding: 6px;
    }
    .day__events>.event{
        background: #00A3D0;
        border-radius: 10px;
        padding: 3px 10px;
        margin: 1px;
        color: #fff;
        cursor:pointer;
    }
    .comtainerDay{
        position: relative;
        width: 100%;
        height: 100%;
    }
    .day__header{
        position: absolute;
        z-index: 100;
    }
    .day__events{
        z-index: 100;
        position: absolute;
        top: 30px;
        width: 100%;
        padding: 2px;
    }
    .containerRegister{
         cursor:pointer;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        z-index: 2;
    }
</style>