
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import { setupCalendar, Calendar} from 'v-calendar'
import 'v-calendar/lib/v-calendar.min.css';
import Vuetify from 'vuetify'
import DaySpanVuetify from 'dayspan-vuetify'
import App from './components/Calendar.vue'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import 'dayspan-vuetify/dist/lib/dayspan-vuetify.min.css'
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
Vue.component('medico', require('./components/Medico.vue'));
Vue.component('paciente', require('./components/Paciente.vue'));
Vue.component('tratamiento', require('./components/Tratamiento.vue'));
Vue.component('categoria', require('./components/Categoria.vue'));
Vue.component('articulo', require('./components/Articulo.vue'));
Vue.component('cliente', require('./components/Cliente.vue'));
Vue.component('proveedor', require('./components/Proveedor.vue'));
Vue.component('rol', require('./components/Rol.vue'));
Vue.component('user', require('./components/User.vue'));
Vue.component('ingreso', require('./components/Ingreso.vue'));
Vue.component('venta', require('./components/Venta.vue'));
Vue.component('mis-citas', require('./components/MisCitas.vue'));
Vue.component('payment', require('./components/Payment.vue'));
Vue.component('mis-pagos', require('./components/MisPagos.vue'));
Vue.component('mis-datos', require('./components/MisDatos.vue'));

Vue.component('cita', require('./components/Cita.vue'));
Vue.component('pagos', require('./components/Pagos.vue'));
Vue.component('calendar', require('./components/Calendar.vue'));
Vue.component('consulta', require('./components/Consulta.vue'));
Vue.component('perfil', require('./components/Perfil.vue'));
Vue.component('tratamiento-users', require('./components/TratamientoUsers.vue'));
Vue.component('v-calendar', Calendar);

Vue.mixin({ 
  methods: {
      capitalizeFirstLetter: str => str.charAt(0).toUpperCase() + str.slice(1),
      getCleanedString:function(cadena){
          // Definimos los caracteres que queremos eliminar
          var specialChars = "!@#$^&%*()+=-[]\/{}|:<>?,.";
          // Los eliminamos todos
          for (var i = 0; i < specialChars.length; i++) {
              cadena= cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
          }   
          // Lo queremos devolver limpio en minusculas
          cadena = cadena.toLowerCase();

          // Quitamos espacios y los sustituimos por _ porque nos gusta mas asi
          cadena = cadena.replace(/ /g,"");

          // Quitamos acentos y "ñ". Fijate en que va sin comillas el primer parametro
          cadena = cadena.replace(/á/gi,"a");
          cadena = cadena.replace(/é/gi,"e");
          cadena = cadena.replace(/í/gi,"i");
          cadena = cadena.replace(/ó/gi,"o");
          cadena = cadena.replace(/ú/gi,"u");
          cadena = cadena.replace(/ñ/gi,"n");
          return cadena;
      },
  } 
}) 
setupCalendar({
    firstDayOfWeek: 2,  // Monday,
  });

  Vue.config.productionTip = false

  Vue.use(Vuetify);
  
  Vue.use(DaySpanVuetify, {
    methods: {
      getDefaultEventColor: () => '#1976d2'
    }
  });
  
const app = new Vue({
    el: '#app',
    data :{
        menu : 0
    },
});
