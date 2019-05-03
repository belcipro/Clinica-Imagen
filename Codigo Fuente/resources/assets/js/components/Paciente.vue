<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Pacientes
                        <button type="button" @click="abrirModal('paciente','registrar')" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nombre">Nombre</option>
                                      <option value="apellidos">Apellidos</option>
                                      <option value="dni">N° Documento</option>
                                      <option value="email">Email</option>
                                      <option value="celular">Celular</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarPaciente(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarPaciente(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>N° Documento</th>
                                    <th>Dirección</th>
                                    <th>Celular</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="paciente in arrayPaciente" :key="paciente.id">
                                    <td>
                                        <button type="button" @click="abrirModal('paciente','actualizar',paciente)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <template v-if="paciente.estado">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarPaciente(paciente.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else>
                                            <button type="button" class="btn btn-info btn-sm" @click="activarPaciente(paciente.id)">
                                                <i class="icon-check"></i>
                                            </button>
                                        </template>
                                    </td>
                                    <td v-text="paciente.nombre"></td>
                                    <td v-text="paciente.apellidos"></td>
                                    <td v-text="paciente.dni"></td>
                                    <td v-text="paciente.direccion"></td>
                                    <td v-text="paciente.celular"></td>
                                    <td v-text="paciente.email"></td>
                                    <td>
                                        <div v-if="paciente.estado">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
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
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
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
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre (*)</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="nombre" class="form-control" placeholder="Nombre del paciente">                                        
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Apellidos (*)</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="apellidos" class="form-control" placeholder="Apellidos del paciente">                           
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">N° de Documento</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="dni" class="form-control" placeholder="Número de documento">                                        
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Género</label>
                                    <div class="col-md-9">
                                        <input type="radio" id="masculino" value="1" v-model="genero">
                                        <label for="masculino">Masculino</label>
                                        <input type="radio" id="femenino" value="0" v-model="genero">
                                        <label for="femenino">Femenino</label>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Dirección</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="direccion" class="form-control" placeholder="Dirección">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Celular</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="celular" class="form-control" placeholder="Celular">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" v-model="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div v-show="errorPaciente" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjPaciente" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarPaciente()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarPaciente()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
        </main>
</template>

<script>
    export default {
        data (){
            return {
                paciente_id: 0,
                nombre : '',
                apellidos : '',
                dni : '',
                genero : 1,
                direccion : '',
                celular : '',
                email : '',
                arrayPaciente : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorPaciente : 0,
                errorMostrarMsjPaciente : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'nombre',
                buscar : ''
            }
        },
        computed:{
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
            listarPaciente (page,buscar,criterio){
                let me=this;
                var url= '/paciente?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url)
                .then(function (response) {
                    var respuesta = response.data;
                    me.arrayPaciente = respuesta.pacientes.data;
                    me.pagination = respuesta.pagination;
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
                me.listarPaciente(page,buscar,criterio);
            },
            registrarPaciente(){
                if (this.validarPaciente()){
                    return;
                }
                
                let me = this;

                axios.post('/paciente/registrar',{
                    'nombre': this.nombre,
                    'apellidos': this.apellidos,
                    'dni' : this.dni,
                    'genero' : this.genero,
                    'direccion' : this.direccion,
                    'celular' : this.celular,
                    'email' : this.email
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarPaciente(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizarPaciente(){
               if (this.validarPaciente()){
                    return;
                }
                
                let me = this;

                axios.put('/paciente/actualizar',{
                    'nombre': this.nombre,
                    'apellidos': this.apellidos,
                    'dni' : this.dni,
                    'genero' : this.genero,
                    'direccion' : this.direccion,
                    'email' : this.email,
                    'celular' : this.celular,
                    'id': this.paciente_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarPaciente(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
            desactivarPaciente(id){
               swal({
                title: 'Esta seguro de desactivar este paciente?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/paciente/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarPaciente(1,'','nombre');
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) 
            },
            activarPaciente(id){
               swal({
                title: 'Esta seguro de activar este paciente?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/paciente/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarPaciente(1,'','nombre');
                        swal(
                        'Activado!',
                        'El registro ha sido activado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) 
            },        
            validarPaciente(){
                this.errorPaciente=0;
                this.errorMostrarMsjPaciente =[];

                if (!this.nombre) this.errorMostrarMsjPaciente.push("El nombre del paciente no puede estar vacío.");
                if (!this.apellidos) this.errorMostrarMsjPaciente.push("Los apellidos del paciente no pueden quedar vacíos.");

                if (this.errorMostrarMsjPaciente.length) this.errorPaciente = 1;

                return this.errorPaciente;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre='';
                this.apellidos='';
                this.dni='';
                this.genero = 1;
                this.direccion='';
                this.email='';
                this.errorPaciente=0;
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "paciente":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Paciente';
                                this.nombre= '';
                                this.apellidos='';
                                this.dni='';
                                this.genero=1;
                                this.direccion='';
                                this.celular='';
                                this.email='';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                this.modal=1;
                                this.tituloModal='Actualizar Paciente';
                                this.paciente_id=data['id'];
                                this.nombre = data['nombre'];
                                this.apellidos = data['apellidos'];
                                this.dni = data['dni'];
                                this.genero = data['genero'];
                                this.direccion = data['direccion'];
                                this.celular = data['celular'];
                                this.email = data['email'];
                                this.tipoAccion=2;
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarPaciente(1,this.buscar,this.criterio);
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
        position: absolute !important;
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
