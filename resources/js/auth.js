import router from './routes.js'
// const store = createStore({
//   state:
//   {
//     token: null,
//     user_ref: null,
//     user_fname: null,
//     user_lname: null,
//     permissions: null
//   },

//   mutations: 
//   {
//     authUser (state, payload) {
//       state.token = payload.token;
//       state.user_ref = payload.user_ref;
//       state.user_fname = payload.customer_fname;
//       state.user_lname = payload.customer_lname;
//       state.permissions = payload.abilities
//     },

//     resetUser(state) {
//       state.token = '';
//       state.user_ref = '';
//       state.user_fname = '';
//       state.user_lname = '';
//       state.permissions = '';
//     }
//   },

//   actions: 
//   {
//     login({commit}, authData) {
//       axios.post('/login', authData)
//       .then((res) => {
//         var user_data = {
//           "token": res.data.data.token,
//           "user_ref": res.data.data.customer_ref,
//           "customer_fname": res.data.data.customer_fname,
//           "customer_lname": res.data.data.customer_lname,
//           "permissions": res.data.data.abilities,
//         };
//         localStorage.setItem("user_data", JSON.stringify(user_data));
//         store.commit({
//           type: 'authUser',
//           data: {
//             token: res.data.data.token,
//             user_ref: res.data.data.customer_ref,
//             customer_fname: res.data.data.customer_fname,
//             customer_lname: res.data.data.customer_lname,
//             abilities: res.data.data.abilities
//           }
//         });
//         router.push('/product-list').then(() => { location.reload(); })
//       })
//       .catch((error) => {
//         console.log(error);

//       });
//     },

//     logout({ commit }) {
//       axios.post('/logout')
//       .then((res) => {
//         localStorage.removeItem("user_data");
//         store.commit('resetUser');
//         // axios.defaults.headers.common['X-CSRF-TOKEN'] = res;
//         router.push('/').catch(() => {});
//       })
//     }

//     // register ({commit}, authData) {
//     //   axios.post('register', authData)
//     //     .then((res) => {
//     //       commit('authUser', {
//     //         token: res.data.token,
//     //       })
//     //       localStorage.setItem('token', res.data.token)
//     //     })
//     //     .catch(error => console.log(error))
//     // }
//   },

//   getters: 
//   {
//     getPermissions(state) {
//       const customer_data = state.permissions;
//       return customer_data;
//     }
//   }
// })

// export default store

export default {
  namespaced: true,
  state:
  {
    token: '',
    user_ref: '',
    user_fname: '',
    user_lname: '',
    permissions: []
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
      state.permissions = [];
    }
  },

  actions: 
  {
    login({commit}, authData) {
      axios.post('/login', authData)
      .then((res) => {
        var user_data = {
          "token": res.data.data.token,
          "permissions": res.data.data.abilities,
        };
        localStorage.setItem("user_data", JSON.stringify(user_data));
        commit('authUser', {
            token: res.data.data.token,
            user_ref: res.data.data.customer_ref,
            customer_fname: res.data.data.customer_fname,
            customer_lname: res.data.data.customer_lname,
            abilities: res.data.data.abilities
          });
        router.push('/product-list').then(() => { location.reload(); })
      })
      .catch((error) => {
        console.log(error);

      });
    },

    logout({ commit }) {
      axios.post('/logout')
      .then((res) => {
        localStorage.removeItem("user_data");
        commit('resetUser');
        // axios.defaults.headers.common['X-CSRF-TOKEN'] = res;
        router.push('/').then(() => { location.reload(); }).catch(() => {});
      })
    }
  },

  getters: 
  {
    getPermissions(state) {
      const customer_data = state.permissions;
      return customer_data;
    }
  }
}