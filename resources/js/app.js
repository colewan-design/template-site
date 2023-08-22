require('./bootstrap');
import { createApp } from 'vue/dist/vue.runtime.esm-bundler';
import router from './routes.js';
import axios from 'axios'
import VueAxios from 'vue-axios'
// import store from './store/modules/Auth/auth.js'

axios.defaults.baseURL = '/api/'
// let token = document.head.querySelector('meta[name="csrf-token"]');
// if (token) {
//     axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//   console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }

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
import { createStore } from 'vuex';
const store = createStore({
  state:
  {
    token: null,
    user_ref: null,
    user_fname: null,
    user_lname: null,
    permissions: null
  },

  mutations: 
  {
    authUser (state, payload) {
      state.token = payload.token;
      state.user_ref = payload.user_ref;
      state.user_fname = payload.customer_fname;
      state.user_lname = payload.customer_lname;
      state.permissions = payload.abilities
    },

    resetUser(state) {
      state.token = '';
      state.user_ref = '';
      state.user_fname = '';
      state.user_lname = '';
      state.permissions = '';
    }
  },

  actions: 
  {
    login({commit}, authData) {
      axios.post('/login', authData)
      .then((res) => {
        var user_data = {
          "token": res.data.data.token,
          "user_ref": res.data.data.customer_ref,
          "customer_fname": res.data.data.customer_fname,
          "customer_lname": res.data.data.customer_lname,
          "permissions": res.data.abilities,
        };
        
        localStorage.setItem("user_data", JSON.stringify(user_data));
        store.commit({
          type: 'authUser',
          data: {
            token: res.data.data.token,
            user_ref: res.data.data.customer_ref,
            customer_fname: res.data.data.customer_fname,
            customer_lname: res.data.data.customer_lname,
            abilities: res.data.abilities
          }
        });
        router.push('/product-list').then(() => { location.reload(); })
        console.log('vuex user_data')
        console.log(store.getters.customerData)
      })
      .catch((error) => {
        console.log(error);

      });
    },

    logout({ commit }) {
      axios.post('/logout')
      .then((res) => {
        localStorage.removeItem("user_data");
        store.commit('resetUser');
        console.log('logged out')
        console.log(res)
        // axios.defaults.headers.common['X-CSRF-TOKEN'] = res;
        router.push('/').catch(() => {});
      })
    }

    // register ({commit}, authData) {
    //   axios.post('register', authData)
    //     .then((res) => {
    //       commit('authUser', {
    //         token: res.data.token,
    //       })
    //       localStorage.setItem('token', res.data.token)
    //     })
    //     .catch(error => console.log(error))
    // }
  },

  getters: 
  {
    customerData(state, getters) {
      const customer_data = state;
      return customer_data;
    }
  }
})

// routing
function loggedIn() {
  return JSON.parse(localStorage.getItem("user_data"))
}
router.beforeEach((to, from, next) => {
  /** get customer data stored in vuex */
  var customer_data = store.getters.customerData;
  console.log('vuex data')
  console.log(customer_data);

  if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!loggedIn() && to.name != 'login') {
        next({
            path: '/login',
        })
      } else {
        next()
      }
  } else if (to.matched.some(record => record.meta.guest)) {
      if (loggedIn()) {
          next({
              path:'/product-list',
          })
      } else {
          next()
      }
  } else {
      next() // make sure to always call next()!
  }
})

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

app.use(vuetify)
app.use(router)
app.use(VueSweetalert2);
app.use(VueAxios, { $axios: axios})
// app.use(VueAxios, axios)
// app.provide('axios', app.config.globalProperties.axios)
app.use(store)
app.mixin(common)
app.mount("#app")
