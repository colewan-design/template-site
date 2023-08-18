require('./bootstrap');
import { createApp } from 'vue/dist/vue.runtime.esm-bundler';
import router from './routes.js';
import axios from 'axios'
import VueAxios from 'vue-axios'

axios.defaults.baseURL = '/api/'

// vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, mdi } from 'vuetify/iconsets/mdi'
import '@mdi/font/css/materialdesignicons.css'
import { VuetifyDateAdapter } from 'vuetify/labs/date/adapters/vuetify'
const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
          mdi,
        },
    },
    adapter: VuetifyDateAdapter,
})

//Vform
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;

//COMMON
import common from './common';

// vue-sweetalert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

// Vuex
import store from './store.js'

// components
import Footer from './components/layouts/Footer.vue'
import Header from './components/layouts/Header.vue'
import ProductsGallery from './components/ProductsGallery.vue'

//Modal
import ModalBasketItems from './modal/Basket_Items/Modal_Basket_Items.vue'

// initiate vue app
const app = createApp({})
app.component('app-footer', Footer)
app.component('app-header', Header)
app.component('products-gallery', ProductsGallery)

app.use(VueSweetalert2);
app.use(vuetify)
app.use(router)
app.use(VueAxios, { $axios: axios})
app.use(store)
app.mixin(common)
app.mount("#app")