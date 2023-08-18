<template>
  <v-app id="inspire">
    <v-main>
      <v-container class="fill-height login-body" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="6">
            <v-card shaped color="rgba(237, 233, 228, .5)" class="elevation-12 login-card">
              <v-row dense>
                <v-col cols="12">
                  <v-img class="ml-3" contain height="150px" src="/img/icon/tiklis-pac-logo-transparent-bg.png"></v-img>
                </v-col>
                <v-col cols="12">
                  <v-img class="ml-3" contain height="100px" src="/img/icon/siged-tiklis.png"></v-img>
                </v-col>
              </v-row>
              
              <v-row dense justify="center">
                <v-col cols="12" md="9">
                  <v-card-text>
                    <v-form>
                      <v-text-field
                        v-model="formLogin.email"
                        label="User Email"
                        prepend-icon="mdi-email"
                        type="text"
                        density="compact"
                      />
                      <v-text-field
                        v-model="formLogin.password"
                        id="password"
                        label="Password"
                        prepend-icon="mdi-lock"
                        type="password"
                        density="compact"
                      />
                    </v-form>
                  </v-card-text>
                  <div class="text-center ma-2">
                    <v-btn class="text-white" block color="#4d783f" @click="login" dark><v-icon left>mdi-login-variant</v-icon>LOGIN</v-btn><br>
                    <v-btn class="text-white" block color="#4d783f" @click="installPWA"><v-icon left>mdi-download</v-icon>Install App</v-btn>
                  </div>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
  
  <!-- <h1>Login</h1> -->
</template>

<script>
export default {
  data() {
    return {
      formLogin: new Form({
        email: '',
        password: '',
      }),
      shown: false,
    }
  },
  beforeMount() {
    window.addEventListener('beforeinstallprompt', (e) => {
      e.preventDefault()
      this.installEvent = e
      this.shown = true
    })
  },

  methods: {
    dismissPrompt() {
      this.shown = false
    },
    login() {
      // this.$store.dispatch('Auth/login', this.formLogin);
      this.$store.dispatch('auth/login', this.formLogin);
      // this.$swal('', 'Successfully logged in', 'success');
    },
    installPWA() {
      this.installEvent.prompt()
      this.installEvent.userChoice.then((choice) => {
        this.dismissPrompt() // Hide the prompt once the user's clicked
        if (choice.outcome === 'accepted') {
          // Do something additional if the user chose to install
        } else {
          // Do something additional if the user declined
        }
      })
    },
  },
};
</script>

<style>
/* mobile screen */
@media only screen and (max-width: 600px) {
      h1{
              font-weight: bold;
              text-transform: uppercase; 
              font-size:32px !important;
          }
          p{
              font-size: 	21.333px;
          }
          .login-body{
          padding: 0;
          margin: 0;
          box-sizing: border-box;
          
      }
      .login-card{
          margin-right: 2rem;
      
      }
    }
 
</style>