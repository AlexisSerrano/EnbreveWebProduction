require('./bootstrap');
window.Vue = require('vue');

import store from './store'

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

const SocialSharing = require('vue-social-sharing');
Vue.use(SocialSharing);
import { library } from '@fortawesome/fontawesome-svg-core'
import { faMapMarkerAlt,faPhone,faCalendarCheck,faCloudSun,faSearch,faTimes,faEnvelope} from '@fortawesome/free-solid-svg-icons'
import { faFacebookF,faTwitter,faInstagram,faYoutube } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faMapMarkerAlt,faPhone,faFacebookF,faTwitter,faInstagram,faYoutube,faCalendarCheck,faCloudSun,faSearch,faTimes,faEnvelope)
Vue.component('font-awesome-icon', FontAwesomeIcon)

import VueMq from 'vue-mq'
Vue.use(VueMq, {
    breakpoints: {
      xs: 768,
      sm: 992,
      md: 1200,
      lg: Infinity,
    },
  })


Vue.component('inicio', require('./views/Inicio.vue').default);
Vue.component('contacto', require('./views/Contacto.vue').default);
Vue.component('seccion', require('./views/Seccion.vue').default);
Vue.component('interior', require('./views/Interior.vue').default);


const app = new Vue({
    el: '#app',
    store
});
