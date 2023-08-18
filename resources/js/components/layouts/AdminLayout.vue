<template>
    <v-app id="main">
        <app-header v-if="token"></app-header>
        <app-navbar v-if="token"></app-navbar>

        <v-main>
            <v-container>
                <router-view></router-view>
            </v-container>
        </v-main>
    </v-app>

</template>

<script>
import Navbar from './Navbar'
import Header from './Header'
import Footer from './Footer'

export default {
    name: 'App',
    components: {
        'app-navbar': Navbar,
        'app-header': Header,
        'app-footer': Footer
    },
  data() {
    var userData = JSON.parse(localStorage.getItem("mobileUserData"))
    return {
      token: userData ? userData.token : null,
    };
  },
  created() {
    window.axios.defaults.headers.common[
      "Authorization"
    ] = `Bearer ${this.token}`;
  },
}
</script>
