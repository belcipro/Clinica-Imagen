<template>
  <div>
           <form action="" v-on:submit.prevent="registrarPago" id="culqi-card-form" novalidate>
       <div class="row" style="margin-top: 15px">

                <div class="col-xl-6 col-lg-3">
                    <div class="card" style="padding: 15px;">
                            <div class="form-row">
                                <div class="col-md-12 mb-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo Electrónico</label>
                                        <input class="form-control" v-bind:class="{'is-valid':isValidateEmail,'is-invalid':!isValidateEmail}" v-model="formData.email" placeholder="Correo Electrónico" type="email" size="50">
                                        <div class="valid-feedback">
                                        Correo validdo
                                        </div>
                                        <div class="invalid-feedback">
                                            Correo no validdo
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombres</label>
                                        <input class="form-control" v-bind:class="{'is-valid':isValidateNombres,'is-invalid':!isValidateNombres}" v-model="formData.nombres" placeholder="Nombres" type="text" size="50">
                                        <div class="valid-feedback">
                                        Nombre validdo
                                        </div>
                                        <div class="invalid-feedback">
                                            Nombre no validdo
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apellidos</label>
                                        <input class="form-control" v-bind:class="{'is-valid':isValidateApellidos,'is-invalid':!isValidateApellidos}" v-model="formData.apellidos" placeholder="Apellidos" type="text" size="50">
                                        <div class="valid-feedback">
                                        Apellidos validdo
                                        </div>
                                        <div class="invalid-feedback">
                                            Apellidos no validdo
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dirección</label>
                                        <input class="form-control" v-bind:class="{'is-valid':isValidateDireccion,'is-invalid':!isValidateDireccion}" v-model="formData.direccion" placeholder="Dirección" type="text" size="50">
                                        <div class="valid-feedback">
                                        Dirección validdo
                                        </div>
                                        <div class="invalid-feedback">
                                            Dirección no validdo
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefono</label>
                                        <input class="form-control" v-bind:class="{'is-valid':isValidateTelefono,'is-invalid':!isValidateTelefono}" v-model="formData.telefono" placeholder="Telefono" type="text" size="50">
                                        <div class="valid-feedback">
                                        Telefono validdo
                                        </div>
                                        <div class="invalid-feedback">
                                            Telefono no validdo
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Número de documento</label>
                                        <input class="form-control" v-bind:class="{'is-valid':isValidateNumDocumento,'is-invalid':!isValidateNumDocumento}" v-model="formData.num_documento" placeholder="Número de documento" type="text" size="50">
                                        <div class="valid-feedback">
                                        Número de documento validdo
                                        </div>
                                        <div class="invalid-feedback">
                                            Número de documento no validdo
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-3">
                     <div class="card" style="padding: 15px;">
                         <img class="avatarPerfil" v-bind:src="formData.avatar">
                    </div>
                </div>
                <button class="btn btn-info" type="submit">Guardar</button>
        </div>

            </form>
  </div>
</template>
<script>
  
</script>
<script>
    import axios from 'axios';
    import toast from 'toastr';
    import 'toastr/build/toastr.css';
    import moment from 'moment';

    moment.locale('es');
    export default {
        data(){
            return{
                isActive: false,
                selected: {
                    tab1:true,
                    tab2:false,
                    tab3:false,
                },
                messageCulqi:'',
                formData:{
                    email:'',
                    nombres:'',
                    apellidos:'',
                    telefono:'',
                    direccion:'',
                    num_documento:'',
                    avatar:'',
                },
                formDataValidate:{
                    email:false,
                },
                listActiveTabs:[],
                data:[],
                dataLogin:[],
                
            }
        },

        created: function(){
           this.listaUsuarioLogin();
        },
        computed:{
            isActived: function(){
               
            },
            isValidateEmail:function(){
                if(this.formData.email){
                    if(!this.formData.email==""&&this.formData.email.length<=4){
                        console.log(this.formData.email)
                        return false;
                    }
                    else if(!this.formData.email==""){
                            return true;
                    }
                }
            },
            isValidateNombres:function(){
                if(this.formData.nombres){
                    if(!this.formData.nombres==""&&this.formData.nombres.length<=4){
                        console.log(this.formData.nombres)
                        return false;
                    }
                    else if(!this.formData.nombres==""){
                            return true;
                    }
                }
            },
            isValidateApellidos:function(){
                if(this.formData.apellidos){
                    if(!this.formData.apellidos==""&&this.formData.apellidos.length<=4){
                        console.log(this.formData.apellidos)
                        return false;
                    }
                    else if(!this.formData.apellidos==""){
                            return true;
                    }
                }
            },
            isValidateDireccion:function(){
                if(this.formData.direccion){
                    if(!this.formData.direccion==""&&this.formData.direccion.length<=4){
                        console.log(this.formData.direccion)
                        return false;
                    }
                    else if(!this.formData.direccion==""){
                            return true;
                    }
                }
            },
            isValidateTelefono:function(){
                if(this.formData.telefono){
                    if(!this.formData.telefono==""&&this.formData.telefono.length<6){
                        console.log(this.formData.telefono)
                        return false;
                    }
                    else if(!this.formData.telefono==""){
                            return true;
                    }
                }
            },
             isValidateNumDocumento:function(){
                if(this.formData.num_documento){
                    if(!this.formData.num_documento==""&&this.formData.num_documento.length<7){
                        console.log(this.formData.num_documento)
                        return false;
                    }
                    else if(!this.formData.num_documento==""){
                            return true;
                    }
                }
            },
            
        },
        methods:{
            checkedPrecio:function(num){
                var newPrecio=num.toFixed(2);
                return newPrecio;
            },
            listaUsuarioLogin: function(){
                var url='/client/listlogin';
                axios.get(url).then(response=>{
                    console.log(response);
                    this.formData.email=response.data.email;
                    this.formData.usuario=response.data.usuario;
                    this.formData.nombres=response.data.nombre;
                    this.formData.apellidos=response.data.apellidos;
                    this.formData.direccion=response.data.direccion;
                    this.formData.telefono=response.data.telefono;
                    this.formData.num_documento=response.data.num_documento;
                    this.formData.avatar=response.data.avatar;
                })
                .catch(function (error) {
                    //console.log(error);
                });
            },
            registrarPago(){               
                let me = this;
                axios.post('/client/perfilupdate',{
                    'email':this.formData.email,
                    'usuario':this.formData.usuario,
                    'nombres':this.formData.nombres,
                    'apellidos':this.formData.apellidos,
                    'direccion':this.formData.direccion,
                    'telefono':this.formData.telefono,
                    'num_documento':this.formData.num_documento,
                    'avatar':this.formData.avatar
                }).then(function (response) {
                    me.listaUsuarioLogin();
                    toast.success('Exito');
                }).catch(function (error) {
                    console.log(error);
                     toast.error('Error');
                }); 
            },
            redirect: function(url){
                window.location.href = "/"+url;
            },
           
        },
        mounted() {
        }
    }
</script>
<style>
    .containerDetailIcon{
        margin: 0 auto;
        text-align: center;
    }
    .reloadPayment{
        visibility:hidden;
        text-align:center;
        width: 100px;
    }
    .iconTitle{
        font-size: 20px;
    }
    .iconDetail{
        font-size: 40px;
        color: #28C0DE;
    }
    .containerTabs{
        height:auto;
        width: auto;
        position: relative;
        overflow-x: auto;
        overflow-y: hidden;
    }
    .containerDetail{
        position: relative;
        height: 200px;
        width: 100%;
    }
    .containerDetailButton{
        text-align:center;
    }
    .textDetail{
        text-align:center;
        font-size: 20px;
    }
    .pasoList{
        background-color: #FF4C52;
        border-radius: 15px;
        color: #fff;
    }
    .avatarPerfil{
        width: 100px;
        height: 100px;
    }
    .pasoList>a{
        cursor: pointer;
        color: #fff;
    }
    .pasoList>a:hover{
        border-radius: 15px;
        background-color: transparent;
        opacity: .5;
        cursor: pointer;
        color: #fff !important;
        
    }
    .pasoList.active{
        opacity: .7;
    }
    .pasoList.selected{
        background-color: rgb(8, 168, 133);
    }
    .trajetasContainer{
        text-align: center;
    }
    .tarjetasImg{
        margin: 15px;
    }
    .seguridadImg{
        width: 50px;
        margin-left: 19px;
        margin-top: -8px;
    }
    .containerPaymentCom{
        margin: 15px 0;
    }
    .titlePaymentCom{
        color: rgb(8, 168, 133);
        font-weight: 500;
    }
    .toast-message{
        color: #fff !important;
    }
</style>