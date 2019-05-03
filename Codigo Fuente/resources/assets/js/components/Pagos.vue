<template>
            <main class="main">
            <!-- Breadcrumb -->
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Mis Pagos
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                           <div class="col-md-6" v-bind:class="{'col-md-10':criterio=='detalle_pago.created_at'||criterio=='c.fechaInicio'}">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="detalle_pago.estado">Estado</option>
                                      <option value="detalle_pago.tipo_pago">Tipo de pago</option>
                                      <option value="p.nombre">Nombres</option>
                                      <option value="p.apellidos">Apellidos</option>
                                      <option value="p.num_documento">Num. Documento</option>
                                      <option value="detalle_pago.created_at">Fecha de creacion</option>
                                      <option value="c.fechaInicio">Fecha de reserva</option>
                                    </select>
                                    <input v-if="isSelected==true" type="text" v-model="buscar" @keyup.enter="listarPagos(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <span class="spnaDate" v-if="criterio=='detalle_pago.created_at'||criterio=='c.fechaInicio'">Desde</span>
                                    <date-picker v-model="dateStart" v-if="criterio=='detalle_pago.created_at'||criterio=='c.fechaInicio'" :config="options" @keyup.enter="listarPagos(1,buscar,criterio)"></date-picker>
                                     <span class="spnaDate" v-if="criterio=='detalle_pago.created_at'||criterio=='c.fechaInicio'">Hasta</span>
                                    <date-picker v-if="criterio=='detalle_pago.created_at'||criterio=='c.fechaInicio'" v-model="dateEnd" :config="options" @keyup.enter="listarPagos(1,buscar,criterio)"></date-picker>
                                    <button type="submit" @click="listarPagos(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                            <div class="col-md-6" v-bind:class="{'col-md-2':criterio=='detalle_pago.created_at'||criterio=='c.fechaInicio'}">
                                <div class="input-group">
                                    <button v-on:click="allPdf(1)" class="btn btn-success"><i class="fas fa-print"></i>Ver</button>
                                    <button v-on:click="allPdf(2)" class="btn btn-success"><i class="fas fa-file-download"></i>Descargar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead style="text-align:center">
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">Paciente</th>
                                    <th style="text-align: center">Descripcion</th>
                                    <th style="text-align: center">Fecha y hora de pago</th>
                                    <th style="text-align: center">Total</th>
                                    <th style="text-align: center">Estado</th>
                                    <th style="text-align: center">Imprimir</th>
                                    <th style="text-align: center">Descargar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(pago,i) in arrayPagos" :key="pago.id">
                                    <td>
                                        {{i+1}}
                                    </td>
                                    <td>{{pago.apellidos+" "+pago.nombre}}</td>
                                    <td style="text-align: center" v-text="pago.tipo_consulta"></td>
                                    <td style="text-align:center" v-text="pago.created_at"></td>
                                    <td style="text-align:center">S/.{{checkedPrecio(pago.total)}}</td>
                                    <td style="text-align:center">
                                        <button v-if="pago.estado=='Pagado'" class="btn btn-info">{{pago.estado}}</button>
                                        <button v-if="pago.estado!=='Pagado'" @click="abrirModal('pago','actualizar',pago)" class="btn btn-danger">{{pago.estado}}</button>
                                    </td>
                                    <td style="text-align:center">
                                        <button class="btn btn-info" @click="pdfSingle(pago.id,1)"><i class="fas fa-print"></i></button>
                                    </td>
                                    <td style="text-align:center">
                                        <button class="btn btn-info" @click="pdfSingle(pago.id,2)"><i class="fas fa-download"></i></button>
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
                                    <label class="col-md-3 form-control-label" for="text-input">Abonar (*)</label>
                                    <div class="col-md-9">
                                        <input type="number" v-model="pago.abono" class="form-control" placeholder="Nombre del paciente">                                        
                                    </div>
                                </div>
                                <div v-show="errorPago" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjpago" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                             <div style="text-align: center;font-size: 30px;font-weight: bold;">
                                   Total S/. {{checkedPrecio(pago.total)}}
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="registrarPago()">Abonar</button>
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
    export default {
        data (){
            return {
                pago_id: 0,
                nombre : '',
                tipo_documento : '',
                num_documento : '',
                direccion : '',
                telefono : '',
                email : '',
                usuario: '',
                password:'',
                idrol: '',
                arrayPagos : [],
                pago:{
                    estado:'',
                    total: 0,
                    abono:0
                },
                arrayRol : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorPago : 0,
                errorMostrarMsjpago : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'detalle_pago.estado',
                buscar : '',
                dateStart:moment().subtract(7, 'days').format('YYYY-MM-DD'),
                dateEnd: moment().format('YYYY-MM-DD'),
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
                if((this.criterio=='detalle_pago.created_at')||(this.criterio=='c.fechaInicio')){
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
            listarPagos (page,buscar,criterio){
                let me=this;
                var url= '/pago/pagossearch?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio+'&paginate=10';
                if(criterio=='detalle_pago.created_at'||criterio=='c.fechaInicio'){
                    url= '/pago/pagossearch?page=' + page + '&criterio='+ criterio + '&dateStart='+ me.dateStart+' 00:00:00'+ '&dateEnd='+ me.dateEnd+' 23:59:59'+'&&paginate=10';
                }
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayPagos = respuesta.pagos.data;
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
                me.listarPagos(page,buscar,criterio);
            },
            registrarPago(){
               if (this.validarPago()){
                    return;
                }
                
                let me = this;

                axios.post('/pago/actualizar-pago',{
                    'abono': this.pago.abono,
                    'id': this.pago_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarPagos(1,me.buscar,me.criterio);
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
            validarPago(){
                this.errorPago=0;
                this.errorMostrarMsjPago =[];

                if (!this.pago.abono) this.errorMostrarMsjpago.push("El estado no puede estar vacío.");
                if (this.pago.abono<=0) this.errorMostrarMsjpago.push("Debe abonar para guardar.");

                if (this.errorMostrarMsjPago.length) this.errorPago = 1;

                return this.errorPago;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.errorPago=0;
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "pago":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar pago';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                this.modal=1;
                                this.tituloModal='Registrar Pago';
                                this.pago_id=data['id'];
                                this.pago.total=data['total'];
                                this.pago.abono=this.checkedPrecio(data['total']);
                                this.tipoAccion=2;
                                break;
                            }
                        }
                    }
                }
            },
            allPdf:function(tipo){
                let me=this;
                var url= 'pago/pagossearch?&buscar='+ me.buscar + '&criterio='+ me.criterio+'&pdf='+tipo+'&paginate=1000000000000000000000';
                if(me.criterio=='detalle_pago.created_at'||me.criterio=='c.fechaInicio'){
                    url= 'pago/pagossearch?&criterio='+ me.criterio + '&dateStart='+ me.dateStart+' 00:00:00'+ '&dateEnd='+ me.dateEnd+' 23:59:59'+'&pdf='+tipo+'&paginate=1000000000000000000000';
                }

                this.redirect(url);
            },
            pdfSingle:function(idPago,tipo){
                var url="pago/pdfsingle?id="+idPago+"&"+"tipo="+tipo;
                this.redirect(url);
            },
            redirect: function(url){
                window.open("/"+url);
            },
        },
        mounted() {
            this.listarPagos(1,this.buscar,this.criterio);
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
        position: fixed !important;
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
</style>
