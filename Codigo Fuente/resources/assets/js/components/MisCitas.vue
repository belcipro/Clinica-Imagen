<template>
  <div class="row">

      <div class="col-xl-3 col-lg-6"  v-for="(data, i) in datas">
            <!-- Card -->
            <div class="card-group">
              <div class="card card-block p-0"  @mouseleave="$set(data, 'selected', false)" @mouseover="$set(data, 'selected', true)">
                <div class="cardContainer" v-if="data.estado.toUpperCase()=='PENDIENTE'" v-bind:class="{cardShow: data.selected,cardHidden: !data.selected}">
                    <div class="btnCenter">
                        <button class="btn btn-outline-info" v-on:click="pagarCita(data.id)">Pagar</button>
                    </div>
                </div>
                <div class="counter counter-md vertical-align bg-white h-350">
                  <div class="counter-icon p-20" v-bind:class="{ 'red-600': data.estado.toUpperCase()=='ANULADO', 'green-600': data.estado.toUpperCase()=='RESERVADO','yellow-600': data.estado.toUpperCase()=='PENDIENTE' }" style="position:absolute;top:0;left:0;">
                    <i class="" v-bind:class="{ 'fas fa-times': data.estado.toUpperCase()=='ANULADO', 'fas fa-check-double': data.estado.toUpperCase()=='RESERVADO','fas fa-check': data.estado.toUpperCase()=='PENDIENTE' }"></i>
                  </div>
                  <div class="counter-icon p-20 font-size-30" v-bind:class="{ 'red-600': data.estado.toUpperCase()=='ANULADO', 'green-600': data.estado.toUpperCase()=='RESERVADO','yellow-600': data.estado.toUpperCase()=='PENDIENTE' }" style="position:absolute;top:0;right:0;">
                    <span class="counter-number">{{data.estado}}</span>
                  </div>
                  <div class="counter-number-group font-size-30 vertical-align-middle">
                    
                    <div class="font-size-18 mt-3">Tiempo restante</div>
                    <span class="counter-icon mr-10" v-bind:class="{ 'red-600': data.estado.toUpperCase()=='ANULADO', 'green-600': data.estado.toUpperCase()=='RESERVADO','yellow-600': data.estado.toUpperCase()=='PENDIENTE' }"><i class="fas fa-clock" ></i></span>
                    <span class="counter-number">{{data.regressive_date}} {{updateTimer(data.estado.toUpperCase(),data.payment_time,i,data.id)}}</span>
                    <div class="font-size-16 mt-3">Tipo de consulta: <span>{{data.tipo_consulta}}</span> </div>
                    <div class="font-size-16 mt-3">Doctor(ra): <span>{{data.nombre+" "+data.apellidos}}</span> </div>
                  </div>

                  <div class="counter-icon p-20 font-size-12" v-bind:class="{ 'red-600': data.estado.toUpperCase()=='ANULADO', 'green-600': data.estado.toUpperCase()=='RESERVADO','yellow-600': data.estado.toUpperCase()=='PENDIENTE' }" style="position:absolute;bottom:0;left:0;">
                    <span class="counter-number">{{data.fechaInicio}}</span>
                  </div>
                  <div class="counter-icon p-20 font-size-12" v-bind:class="{ 'red-600': data.estado.toUpperCase()=='ANULADO', 'green-600': data.estado.toUpperCase()=='RESERVADO','yellow-600': data.estado.toUpperCase()=='PENDIENTE' }" style="position:absolute;bottom:0;right:0;">
                    <span class="counter-number">{{data.fechaFin}}</span>
                  </div>
               </div>
            </div>
          </div>
            <!-- End Card -->
      </div>
  </div>
</template>
<script>
  
</script>
<script>
    import axios from 'axios';
    import toast from 'toastr';
    import moment from 'moment';
    moment.locale('es');
    export default {
        data(){
            return{
                isActive: false,
                selected: undefined,
                datas:[],
            }
        },
        count:0,
        props: ['id'],
        created: function(){
            this.listaCitas();
            
        },
        computed:{
            isActived: function(){
               
            },
            
            //Calcula los elementos de la paginación
            pagesNumber: function() {
               
            }
        },
        methods: {
            listaCitas: function(){
                var url='/client/citaclienteespecialista/'+this.id;
                axios.get(url).then(response=>{
                    this.datas=response.data;
                })
                .catch(function (error) {
                    //console.log(error);
                    toast.error('No se pudo listar','Error')
                });
            },
            filterIndexArray: function(id,arrayFind){
                function recursiveSearchIndex(min,max){
                    if(min>max){
                        return -1;
                    }
                    var midle=Math.floor((min+max)/2);
                    if(arrayFind[midle].id===id){
                        return midle;
                    }
                    if(arrayFind[midle].id>id){
                        return recursiveSearchIndex(min,midle-1);
                    }
                    return recursiveSearchIndex(midle+1,max);
                }
                return recursiveSearchIndex(0,arrayFind.length-1);
            },
            checkedDateTime: function(date){
                var compareTo=new Date();
                var dateRest=moment(date).fromNow();
                var isAfter = moment(date).isAfter(compareTo);
                return dateRest;
            },
            anularCita: function(id){
                var url='/client/desactivarcita';
                axios.post(url,{
                    id:id,
                }).then(reponse=>{
                    this.listaCitas();
                }).catch(error=>{
                });
            },
            redirect: function(url){
                window.location.href = "/"+url;
            },
            pagarCita: function(id){
                var url='/client/miscitasid';
                axios.post(url,{
                    idCita:id,
                }).then(reponse=>{
                    this.redirect('client/citapayment');
                    //console.log(response);
                }).catch(error=>{

                });
            },
            updateTimer: function(estado,date,index,id){
                if(estado=="PENDIENTE"){
                    var me=this;
                    var timerUpdate=setInterval(function(){
                        const indexT=index;
                        let t=me.checkedDateTimer(date);
                        if(t.remainTime<= 1){
                            clearInterval(timerUpdate);
                            me.anularCita(id);
                        }
                        else{
                            let days=t.remainDays<=1? t.remainDays +" dia": t.remainDays+" dias";
                            me.datas[indexT].regressive_date=days+" "+t.remainHours+":"+t.remainMinutes+":"+t.remainSecond
                        }                    
                    },1000);
                }
                
            },
            checkedDateTimer: function(date){;
                let now= new Date(),
                    remainTime=(new Date(date)-now+1000)/1000,
                    remainSecond=('0'+Math.floor(remainTime%60)).slice(-2),
                    remainMinutes=('0'+Math.floor(remainTime/60%60)).slice(-2),
                    remainHours=('0'+Math.floor(remainTime/3600%24)).slice(-2),
                    remainDays=Math.floor(remainTime/(3600*24));
                return{
                    remainTime,
                    remainSecond,
                    remainMinutes,
                    remainHours,
                    remainDays,
                }
            }
        },
        mounted() {
        }
    }
</script>
<style>
    .cardContainer{
        width: 0;
        position: absolute;
        background: rgba(0,0,0,.8);
        height: 100%;
        display: flex;
        z-index: 100;
        transition: width 2s;
    }
    .cardShow{
        width: 100%;
        visibility: visible;
        transition:visibility 2s linear,width 2s;
    }
    .cardHidden{
        width: 0;
        visibility: hidden;
        transition:visibility 2s linear,width 2s;
    }
    .btnCenter{
        margin: auto;
        text-align: center;
    }
</style>