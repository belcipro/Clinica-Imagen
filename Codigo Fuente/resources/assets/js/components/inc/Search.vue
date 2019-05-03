<template>
    <main>
        <div class="autocomplete">
            <input placeholder="Buscar" @keydown.down="onArrowDown" @keydown.up="onArrowUp" @keydown.enter="onEnter(3)" v-model="searchUsuaurio" @input="searchList(3)" class="form-control w-100">
            <ul class="autocomplete-results" v-show="isOpen3">
            <li class="loading" v-if="isLoading">
                Loading results...
            </li>
            <li class="autocomplete-result" v-else v-for="(result, i) in results" :key="i" @click="setResult(result,3)" :class="{ 'active': i === arrowCounter }">
                {{ result.nombre }}
                </li>
            </ul>
        </div>
    </main>
</template>
<script>
import {EventBus} from '../../helpers/event-bus.js'
export default {
    data(){
        return{
            searchUsuaurio:'',
            search:{
                descripcion:'',
            },
            items:[],
            items2:[],
            items3:[],

            searchProveedorEntidad:'',
            searchProductoCat:'',

            results: [],
            arrowCounter: -1,
            isLoading:false,
            isOpen: false,
            isOpen2: false,
            isOpen3: false,
            isAsync:false,
        }
    },
    mounted(){
        EventBus.$on('tratamiento-create',data=>{
            this.searchUsuaurio=data;
        });
    },
    methods:{
        filter:function(item,list){
            return list.filter(function(el){
                return el.id.indexOf(item)>-1;
            });
        },
        searchList:function(num){
            switch(num){
                case 1:
                    break;
                case 2:
                    break;
                case 3:
                    this.$emit('input', this.searchUsuaurio);
                    if (this.isAsync) {
                        this.isLoading = true;
                    } else {
                        // Data is sync, we can search our flat array
                        this.filterResults(3);
                        this.isOpen3 = true;
                    }
                    break;

            }
        },
        setResult(result,num) {
            switch(num){
              case 1:
               

              break;
              case 2:
                
              break;
              case 3:
                this.$emit('selected',result);
                var nombre=result.nombre.trim();
                this.searchUsuaurio = nombre;
                this.isOpen3 = false;
                

              break;
            }
          },
        filterResults(num) {
            switch(num){
                case 1:
                   
                case 2:
                    
                    break;
                case 3:
                    this.results = this.items3.filter(item => {
                        var nombre=item.nombre.trim();
                        return this.getCleanedString(nombre).indexOf(this.getCleanedString(this.searchUsuaurio)) > -1;
                    });
                    if(this.results.length==0){
                        this.listarUsuario(this.searchUsuaurio);
                    }
                break;
            }
        },
        onArrowDown() {
            if (this.arrowCounter < this.results.length) {
                this.arrowCounter = this.arrowCounter + 1;
            }
        },
        onArrowUp() {
            if (this.arrowCounter > 0) {
                this.arrowCounter = this.arrowCounter - 1;
            }
        },
        onEnter(num) {
            switch(num){
                case 1:
                    break;
                case 2:
                    break;
                case 3:
                    this.$emit('selected',this.results[this.arrowCounter]);
                    var nombre=this.results[this.arrowCounter].nombre.trim();
                    this.searchUsuaurio = nombre;
                    this.isOpen3 = false;
                    break;
            }
            this.arrowCounter = -1;
        },
        listarUsuario:function(valor,option=0){
            axios.get('/user?buscar='+valor)
            .then(response=>{
                console.log(response);
                const {data}=response;
                    this.items3=data.personas.data;
            })
            .catch(error=>{

            });
        }
    }
}
</script>
