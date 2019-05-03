<template>
            <main class="main">
            <!-- Breadcrumb -->
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Mis citas
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6" v-bind:class="{'col-md-10':criterio=='c.created_at'||criterio=='c.fechaInicio'}">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="c.estado">Estado</option>
                                      <option value="client.nombre">Nombres</option>
                                      <option value="client.apellidos">Apellidos</option>
                                      <!--<option value="client.email">Correo</option>
                                      <option value="client.num_documento">Numero de documento</option>
                                      <option value="c.created_at">Fecha de creacion</option>-->
                                      <option value="c.fechaInicio">Fecha de reserva</option>
                                    </select>
                                    <input v-if="isSelected==true" type="text" v-model="buscar" @keyup.enter="listarcitas(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                         <span class="spnaDate" v-if="criterio=='c.created_at'||criterio=='c.fechaInicio'">Desde</span>
                                    <date-picker v-model="dateStart" v-if="criterio=='c.created_at'||criterio=='c.fechaInicio'" :config="options" @keyup.enter="listarcitas(1,buscar,criterio)"></date-picker>
                                     <span class="spnaDate" v-if="criterio=='c.created_at'||criterio=='c.fechaInicio'">Hasta</span>
                                    <date-picker v-if="criterio=='c.created_at'||criterio=='c.fechaInicio'" v-model="dateEnd" :config="options" @keyup.enter="listarcitas(1,buscar,criterio)"></date-picker>
                                    <button type="submit" @click="listarcitas(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                            <div class="" v-bind:class="{'col-md-2':criterio=='c.created_at'||criterio=='c.fechaInicio','col-md-6':!criterio=='c.created_at'}">
                                <div class="input-group">
                                    <button v-on:click="allPdf(1)" class="btn btn-success"><i class="fas fa-print"></i>Ver</button>
                                    <button v-on:click="allPdf(2)" class="btn btn-success"><i class="fas fa-file-download"></i>Descargar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead style="text-align:center">
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Fecha y hora de inicio</th>
                                    <th>Fecha y hora de fin </th>
                                    <th>Tipo de consulta</th>
                                    <th>Precio de consulta</th>
                                    <th>Especialista</th>
                                    <th>Estado</th>
                                    <th style="width: 11%">Opciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(cita,i) in arraycitas" :key="cita.id">
                                    
                                    <td>
                                        {{i+1}}
                                    </td>
                                    <td>{{cita.apellidosCli+" "+cita.nombreCli}}</td>
                                    <td style="text-align:center" v-text="cita.fechaInicio"></td>
                                    <td style="text-align:center" v-text="cita.fechaFin"></td>
                                    <td v-text="cita.tipo_consulta"></td>
                                    <td style="text-align:center">S/.{{checkedPrecio(cita.precio)}}</td>
                                    <td>{{cita.apellidosEsp+" "+cita.nombreEsp}}</td>
                                    <td style="text-align:center" v-bind:style="{background: cita.color}" v-text="cita.estado"></td>
                                    <td>
                                         <button type="button" @click="abrirModal('cita','actualizar',cita)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button>
                                        <button type="button" @click="pdfSingle(cita.id,1)" class="btn btn-info btn-sm">
                                          <i class="fas fa-print"></i>
                                        </button>
                                        <button type="button" @click="pdfSingle(cita.id,2)" class="btn btn-success btn-sm">
                                         <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
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
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Estado (*)</label>
                                    <div class="col-md-9">
                                        
                                        <select v-model="cita.estado" class="form-control">
                                            <option value="pendiente">Pendiente</option>
                                            <option value="reservado">Reservado</option>
                                            <option value="anulado">Anulado</option>
                                        </select>                                    
                                    </div>
                                </div>
                                <div v-show="errorcita" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjcita" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarCita()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarEstado()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </main>
</template>

<script>
    import moment from "moment";
    import datePicker from 'vue-bootstrap-datetimepicker';
    import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
    
    moment.locale('es');
    export default {
        data (){
            return {
                cita_id: 0,
                nombre : '',
                cita:{
                    estado:'',
                },
                arraycitas : [],
                modal : 0,
                tituloModal : '',
                //dateStart:moment().subtract(1, 'months').format('DD/MM/YYYY'),
                dateStart:moment().subtract(7, 'days').format('YYYY-MM-DD'),
                dateEnd: moment().format('YYYY-MM-DD'),
                tipoAccion : 0,
                errorcita : 0,
                errorMostrarMsjcita : [],
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
                options: {
                    format: 'YYYY-MM-DD',
                    useCurrent: false,
                }     
            }
        },
        components: {
            datePicker
        },
        computed:{
            isSelected: function(){
                if((this.criterio=='c.created_at')||(this.criterio=='c.fechaInicio')){
                    return false;
                }
                else{
                    return true;
                }
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
            checkedPrecio:function(num){
                var newnNum=parseFloat(num);
                var newPrecio=newnNum.toFixed(2);
                return newPrecio;
            },
            listarcitas (page,buscar,criterio){
                let me=this;
                var url= '/cita?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio+'&paginate=10';
                if(criterio=='c.created_at'||criterio=='c.fechaInicio'){
                    url= '/cita?page=' + page + '&criterio='+ criterio + '&dateStart='+ me.dateStart+' 00:00:00'+ '&dateEnd='+ me.dateEnd+' 23:59:59'+'&&paginate=10';
                }
                
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arraycitas = respuesta.citas.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarcitas(page,buscar,criterio);
            },
            registrarcita(){
               
            },
            validarCita(){
                this.errorCita=0;
                this.errorMostrarMsjCita =[];

                if (!this.cita.estado) this.errorMostrarMsjCita.push("El estado no puede estar vacío.");

                if (this.errorMostrarMsjCita.length) this.errorCita = 1;

                return this.errorCita;
            },
            actualizarEstado(){
               if (this.validarCita()){
                    return;
                }
                
                let me = this;

                axios.post('/cita/actualizar-estado',{
                    'estado': this.cita.estado,
                    'id': this.cita_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarcitas(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.errorcita=0;
            },
            allPdf:function(tipo){
                let me=this;
                var url= 'cita?&buscar='+ me.buscar + '&criterio='+ me.criterio+'&pdf='+tipo+'&paginate=1000000000000000000000';
                if(me.criterio=='c.created_at'||me.criterio=='c.fechaInicio'){
                    url= 'cita?&criterio='+ me.criterio + '&dateStart='+ me.dateStart+' 00:00:00'+ '&dateEnd='+ me.dateEnd+' 23:59:59'+'&pdf='+tipo+'&paginate=1000000000000000000000';
                }

                this.redirect(url);
            },
            pdfSingle:function(idCita,tipo){
                var url="cita/pdfsingle?id="+idCita+"&"+"tipo="+tipo;
                this.redirect(url);
            },
            redirect: function(url){
                window.open("/"+url);
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "cita":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar cita';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                this.modal=1;
                                this.tituloModal='Actualizar Estado';
                                this.cita_id=data['id'];
                                this.cita.estado=data['estado'];
                                this.nombre = data['nombre'];
                                this.tipoAccion=2;
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarcitas(1,this.buscar,this.criterio);
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
    .formDate{
        height: 36px !important;
        padding: 10px !important;
        width: 110px !important;
    }
    .spnaDate{
        background-color: #ddcece;
        padding: 6px;
    }
</style>
