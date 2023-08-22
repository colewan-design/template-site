<template>
  <v-app id="inspire">
    <v-main>
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="6">
            <v-card class="elevation-12" v-if="registerForm.account_num">
                  <v-row>
                    <v-col cols="12" md="12">
                      <v-card-text>
                        <h1>Create New Account</h1>
                        <v-text-field
                          disabled
                          v-model="registerForm.account_num"
                          label="Account Number"
                          required
                        ></v-text-field>
                        <v-text-field
                          disabled
                          v-model="registerForm.full_name"
                          label="Complete Name"
                          required
                        ></v-text-field>
                        <v-text-field
                          disabled
                          v-model="registerForm.contact_number"
                          label="Contact Number"
                          required
                        ></v-text-field>
                        <v-text-field
                          disabled
                          v-model="registerForm.date_of_birth"
                          label="BirthDate"
                          required
                        ></v-text-field>
                        <v-text-field
                          v-model="registerForm.user_name"
                          label="User Name"
                          required
                        ></v-text-field>
                        <v-text-field
                          v-model="registerForm.password"
                          label="Password"
                          required
                        ></v-text-field>
                      </v-card-text>
                      <div class="text-center ma-3">
                        <v-btn @click.prevent="register()" rounded dark>Register</v-btn>
                      </div>
                    </v-col>
                  </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          Verify Your Account Number
        </v-card-title>

        <v-card-text>
          <v-text-field
            v-model="form.macct_num"
            label="Please Provide Your Account Number*"
            required
          ></v-text-field>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="verify()"
          >
            Verify
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-app>
</template>

<script>
export default {
    data() {
      return {
        dialog: true,
        form: new Form({
            macct_num: '',
        }),
        array: [],
        registerForm:{
          account_num:null,
          full_name:'',
          contact_number:'',
          date_of_birth: '',
          user_name: '',
          password: ''
        }
      }
    },
    methods: {
      verify() {

        axios.post('verify', this.form)
          .then(res => {
            this.registerForm.account_num = res.data.data[0].acct_number
            this.registerForm.full_name = res.data.data[0].full_name.complete
            this.registerForm.contact_number = res.data.data[0].contact_number
            this.registerForm.date_of_birth = res.data.data[0].birth_date
            this.dialog = false;
          })
          .catch(error => alert('Invalid Account Number'))
      },
      register() {
        axios.post('register', this.registerForm)
          .then(res => {
            alert('success')
          })
          .catch(error => console.log(error))
      }
  },
};
</script>