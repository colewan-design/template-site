<template>
  <nav>
    <v-row>
      <v-col>
        <!-- for tablet and desktop, >600 viewport -->
        <v-app-bar app height="90px">
          <v-app-bar-title class="ml-5 font-weight-black">Title</v-app-bar-title>
          <v-spacer></v-spacer>
          <template v-slot:append>
            <router-link v-for="(item, i) in items" :key="i" :to="item.path" v-slot="{ navigate }" custom>
              <v-btn class="ma-2" :value="i" @click="navigate" role="link">
                <v-icon :icon="item.icon" class="mr-1"></v-icon>
                <span>{{ item.title }}</span>
              </v-btn>
            </router-link>

            <router-link v-if="!customer_data"  :to="'/login'" v-slot="{ navigate }" custom>
              <v-btn class="ma-2"  @click="navigate" role="link">
                <v-icon class="mr-1">mdi-login-variant</v-icon>
                <span>Login</span>
              </v-btn>
            </router-link>
          
            <v-btn class="ma-2" @click="userLogout" v-if="customer_data" >
              <v-icon icon="mdi-account-arrow-left-outline" class="mr-1"></v-icon>
              <span>Logout</span>
            </v-btn>
          </template>
        </v-app-bar>

        <!-- for mobile, <600 viewport -->
        <v-bottom-navigation
          class="d-flex d-sm-none text-white"
          app
          v-model="selectedItem"
          bg-color="#4d783f"
          mobile-breakpoint="600"
          density="compact"
          style="height: 4em; position: fixed;"
        >
        <router-link   :to="'/product-list'" v-slot="{ navigate }" custom>
              <v-btn class="ma-2"  @click="navigate" role="link">
                <v-icon class="mr-1">mdi-login-variant</v-icon>
                <span>Navigation</span>
              </v-btn>
        </router-link>

        <router-link   :to="'/'" v-slot="{ navigate }" custom>
              <v-btn class="ma-2"  @click="navigate" role="link">
                <v-icon class="mr-1">mdi-login-variant</v-icon>
                <span>Navigation</span>
              </v-btn>
        </router-link>

        <router-link :to="'/how-it-works'" v-slot="{ navigate }" custom>
              <v-btn class="ma-2"  @click="navigate" role="link">
                <v-icon class="mr-1">mdi-login-variant</v-icon>
                <span>Navigation</span>
              </v-btn>
        </router-link>

        <router-link v-if="!customer_data"  :to="'/login'" v-slot="{ navigate }" custom>
              <v-btn class="ma-2"  @click="navigate" role="link">
                <v-icon class="mr-1">mdi-login-variant</v-icon>
                <span>Login</span>
              </v-btn>
        </router-link>

        <v-btn class="ma-2" @click="userLogout" v-if="customer_data" >
              <v-icon icon="mdi-account-arrow-left-outline" class="mr-1"></v-icon>
              <span>Logout</span>
        </v-btn>

        </v-bottom-navigation>
      </v-col>
    </v-row>
  </nav>
</template>

<script>
  import { onMounted } from 'vue'
  import { useDisplay } from 'vuetify'
  import router from '../../routes.js';
  export default {
    setup() {
      const { width, mobile } = useDisplay()
    },

    data: () => ({
      user: {
        initials: 'JD',
        fullName: 'John Doe',
        email: 'john.doe@doe.com',
      },
      drawer: false,
      items: [
        { title: 'Navigation', icon: 'mdi-food-apple-outline', path:'/product-list' },
        { title: 'Navigation', icon: 'mdi-information-variant', path:'/' },
        { title: 'Navigation', icon: 'mdi-lightbulb-question-outline', path:'/how-it-works' },
  
      ],
      selectedItem: 0,
      // customer_data: {}
    }),

    methods: {
      close () {
          this.drawer =false;
      },

      async userLogout() {
        // this.$store.dispatch('logout');
        localStorage.removeItem("user_data");
        window.location.reload();
      }
    },

    created(){
      this.customer_data = localStorage.getItem('user_data')
      console.log(this.customer_data)
    },
  

    // computed: {
    //   customer_data() {
    //     console.log('customer_data')
    //     console.log(this.customer_data)
    //     return this.$store.getters.customerData;
    //   }
    // }
  }
</script>