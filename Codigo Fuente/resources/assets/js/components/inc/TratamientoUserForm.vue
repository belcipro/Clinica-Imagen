<template>
    <main>
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
                                    <label class="col-md-3 form-control-label" for="text-input">Buscar Paciente (*)</label>
                                    <div class="col-md-9">
                                       <search-autocomplete-component @selected="selectedUsuario"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Tratamiento (*)</label>
                                    <div class="col-md-9">
                                       <select class="form-control" v-model="tratamientoUsers.id_tratamiento"> 
                                           <option value="">--Seleccione--</option>
                                           <option v-for="(item) in dataTratamiento" :key="item.id" :value="item.id">{{item.nombre}}</option>
                                           
                                       </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Fecha de Inicio (*)</label>
                                    <div class="col-md-9">
                                        <div class="input-group mb-3">
                                            <date-picker v-model="tratamientoUsers.fechaInicio" :config="optionsDate"></date-picker>
                                        </div>
                                    </div>
                                </div>
                                 
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Fecha fin (*)</label>
                                    <div class="col-md-9">
                                        <div class="input-group mb-3">
                                            <date-picker v-model="tratamientoUsers.fechaFin" :config="optionsDate"></date-picker>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Seleccionar estado</label>
                                    <div class="col-md-9">
                                        <div class="input-group mb-3">
                                        <select class="form-control" v-model="tratamientoUsers.estado">    
                                            <option value="">--Seleccione--</option>
                                            <option value="En proceso">--En proceso--</option>
                                            <option value="Finalizado">--Finalizado--</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Precio (S/.)</label>
                                    <div class="col-md-9">
                                        <div class="input-group mb-3">
                                        <input class="form-control" v-model="tratamientoUsers.precio">    
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Adelanto (S/.)</label>
                                    <div class="col-md-9">
                                        <div class="input-group mb-3">
                                        <input class="form-control" v-model="tratamientoUsers.adelanto">    
                                        </div>
                                    </div>
                                </div>
                                <hr>
                               

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrar()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizar()">Actualizar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-danger" @click="eliminar()">Eliminar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
    </main>    
</template>
<script>
    import TratamientoUsers from '../../models/tratamiento_user.js'
    import moment from "moment";
    import toastr from "toastr";
    import datePicker from 'vue-bootstrap-datetimepicker';
    import SearchAutoCompleteComponent from "./Search.vue"
    import {EventBus} from '../../helpers/event-bus.js'

    export default {
        data(){
            return{
                tratamientoUsers:new TratamientoUsers(),
                optionsDate: {
                    format: 'YYYY-MM-DD',
                    collapse: true,
                    useStrict:true,
                },
                tipoAccion:1,
                dataTratamiento:[],
                tituloModal:'Registrar tratamiento',
                modal:false,
            }
        },
        mounted(){
            this.listTratamiento()
            EventBus.$on('tratamiento-modal',data=>{
                this.modal=data;
            })
        },
        props:{
            
        },
        components: {
            datePicker,
            'search-autocomplete-component':SearchAutoCompleteComponent,
        },
        methods:{
            registrar:function(){
                axios.post('tratamiento-users',this.tratamientoUsers)
                .then(res=>{
                    this.modal=false;
                    toastr.success('Se guardo correctamente');
                    EventBus.$emmit('tratamiento-created',this.tratamientoUsers);
                })
                .catch(err=>{
                    toastr.error('No se guardo correctamente')

                });
            },
            listTratamiento:function(){
                axios.get('/tratamiento?all=true')
                .then(res=>{
                    const {data}=res;
                    this.dataTratamiento=data.tratamientos.data;
                })
                .catch(err=>{

                });
            },
            selectedUsuario:function(item){
                this.tratamientoUsers.id_usuario=item.id;
            },
            cerrarModal:function(){
                this.modal=false;
            }
        }
    }
</script>

