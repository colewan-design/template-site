<template>
  <v-container class="sign-up-body">
    <v-window v-model="step">
      <v-window-item :value="1">
        <v-card
          max-width="550"
          class="align-center mx-auto"
          column
          variant="outlined"
          color="#5F9656"
          dense
        >
          <v-card-text>
            <v-row no-gutters>
              <v-col>
                <v-img
                  src="https://gcdnb.pbrd.co/images/yyvLFCMctIZf.png?o=1"
                  max-height="200"
                  height="120"
                ></v-img>
              </v-col>
            </v-row>
            <v-row dense>
              <v-col>
                <h1 class="align-center">Join Us Today</h1>
              </v-col>
            </v-row>
            
            <v-row no-gutters>
              <v-col>
                <v-text-field
                  class="ma-6"
                  label="Email"
                  variant="outlined"
                  color="#2D4D22"
                  v-model="form.email"
                  density="compact"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row no-gutters>
              <v-col>
                <v-text-field
                  class="ma-6"
                  type="Password"
                  label="Password"
                  variant="outlined"
                  color="#2D4D22"
                  length="300px"
                  v-model="form.password"
                  density="compact"
                ></v-text-field>
              </v-col>
            </v-row>
          </v-card-text>
          <v-card-actions class="justify-center">
            <v-btn class="mt-2 font-weight-bold text-white justify-center" variant="flat" color="#2D4D22"
              @click="step = 2">Proceed</v-btn
            >
            <!-- <v-divider></v-divider>
            <h2 class="align-center">Or:</h2>
            <v-card column class="ml-5">
              <v-btn class="ma-2" variant="outlined" color="red"
                >Sign Up With Google</v-btn>
              <v-btn variant="outlined" color="blue">Sign Up With Facebook</v-btn>
            </v-card> -->
          </v-card-actions>
        </v-card>
      </v-window-item>

      <v-window-item :value ="2">
        <v-card
          max-width="1000"
          class="align-center mx-auto"
          column
          variant="outlined"
          color="#5F9656"
          dense
        >
          <v-row no-gutters>
            <v-col>
              <v-img
                src="https://gcdnb.pbrd.co/images/yyvLFCMctIZf.png?o=1"
                height="120"
                max-height="200"
              ></v-img>
            </v-col>
          </v-row>
          <v-row no-gutters>
            <v-col>
              <h1 class="align-center">Almost there!</h1>
            </v-col>
          </v-row>

          <v-row dense>
            <v-col cols="12" lg="6" xl="6">
              <v-text-field
                class="ma-6"
                label="First Name"
                variant="outlined"
                color="#2D4D22"
                v-model="form.customer_fname"
              ></v-text-field>
            </v-col>
            <v-col cols="12" lg="6" xl="6">
              <v-text-field
                class="ma-6"
                label="Last Name"
                variant="outlined"
                color="#2D4D22"
                v-model="form.customer_lname"
              ></v-text-field>
            </v-col>
          </v-row>

          <v-row no-gutters>
            <v-col>
              <v-text-field
                class="ma-6"
                label="Contact Number"
                variant="outlined"
                color="#2D4D22"
                v-model="form.contact_number"
              ></v-text-field>
            </v-col>
          </v-row>

          <v-row dense>
            <v-col class="ml-2"><label>Delivery Address</label></v-col>
          </v-row>
          <v-row no-gutters>
            <v-col cols="12" lg="6" xl="4">
              <v-autocomplete
                class="ma-6"
                label="Province"
                variant="outlined"
                color="#2D4D22"
                :items="provinces"
                item-title="province"
                return-object
                :loading="brgys_loading"
                clearable
                v-model="s_province"
                @update:modelValue="form.main_delivery_addr_province_code = s_province.psgc_pcode; 
                  form.main_delivery_addr_province = s_province.province;
                  filterMuncities();"
                @click:clear="s_province = null; form.main_delivery_addr_province_code = ''; form.main_delivery_addr_province = '';"
              ></v-autocomplete>
            </v-col>
            <v-col cols="12" lg="6" xl="4">
              <v-autocomplete
                class="ma-6"
                label="City/Municipality"
                variant="outlined"
                color="#2D4D22"
                :items="muncities"
                item-title="muncity"
                return-object
                :loading="muncities_loading"
                clearable
                v-model="s_muncity"
                @update:modelValue="form.main_delivery_addr_muncity_code = s_muncity.psgc_mcode; 
                  form.main_delivery_addr_muncity = s_muncity.muncity;
                  filterBrgys();"
                @click:clear="s_muncity = null; form.main_delivery_addr_muncity_code = ''; form.main_delivery_addr_muncity = '';"
              ></v-autocomplete>
            </v-col>
            <v-col cols="12" lg="6" xl="4">
              <v-autocomplete
                class="ma-6"
                label="Barangay"
                variant="outlined"
                color="#2D4D22"
                :items="brgys"
                item-title="brgy"
                return-object
                :loading="provinces_loading"
                clearable
                v-model="s_brgy"
                @update:modelValue="form.main_delivery_addr_brgy_code = s_brgy.psgc_bcode; form.main_delivery_addr_brgy = s_brgy.brgy;"
                @click:clear="s_brgy = null; form.main_delivery_addr_brgy_code = ''; form.main_delivery_addr_brgy = '';"
              ></v-autocomplete>
            </v-col>
            <v-col cols="12" lg="6" xl="4">
              <v-text-field
                class="ma-6"
                label="House Number"
                variant="outlined"
                color="#2D4D22"
                v-model="form.main_delivery_addr_house_num"
              ></v-text-field>
            </v-col>
          </v-row>

          <v-card-actions class="justify-center">
            <v-btn
              class="ma-4 font-weight-bold text-white justify-center"
              variant="flat"
              color="#2D4D22"
              size="x-large"
              @click="subscribeCustomer"
              >Finish</v-btn
            >
          </v-card-actions>
        </v-card>
      </v-window-item>
    </v-window>

    <v-tabs v-model="step" align-tabs="center">
      <v-tab :value="1"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
      <v-tab :value="2"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
    </v-tabs>
  </v-container>
</template>

<script>
  import { Form } from 'vform';
  import router from '../routes.js';
  import axios from 'axios';
  export default {
    data() {
      return {
        step: '',
        form: new Form({
          email: '',
          password: '',
          customer_fname: '',
          customer_lname: '',
          contact_number: '',
          main_delivery_addr_house_num: '',
          main_delivery_addr_brgy_code: '',
          main_delivery_addr_muncity_code: '',
          main_delivery_addr_province_code: '',
          main_delivery_addr_brgy: '',
          main_delivery_addr_muncity: '',
          main_delivery_addr_province: '',
        }),
        brgys: [],
        muncities: [],
        provinces: [],
        brgys_loading: false,
        muncities_loading: false,
        provinces_loading: false,
        s_province: null,
        s_muncity: null,
        s_brgy: null,
        lib_brgys: [],
        lib_muncities: [],
      }
    },

    methods: {
      async getLocationResources() {
        this.brgys_loading = true;
        this.muncities_loading = true;
        this.provinces_loading = true;

        axios.get('/lib/brgy')
        .then((response) => {
          this.brgys = response.data;
          this.lib_brgys = response.data;
          this.brgys_loading = false;
        });

        axios.get('/lib/muncity')
        .then((response) => {
          this.muncities = response.data;
          this.lib_muncities = response.data;
          this.muncities_loading = false;
        });

        axios.get('/lib/province')
        .then((response) => {
          this.provinces = response.data;
          this.provinces_loading = false;
        });
      },

      async subscribeCustomer() {
        axios.post('/subscribe', this.form)
        .then((response) => {
          this.$swal(response.data.status, response.data.message, response.data.status);
          router.push('/login').catch(() => {});
        })
        .catch((error) => {
          console.log(error);
          // this.$swal(response.data.status, response.data.message, response.data.status);
          this.$swal('An error occurred');
        });
      },

      filterMuncities() {
        if(this.s_province != null) {
          var filtered = this.lib_muncities.filter(muncity => { 
            return muncity.psgc_pcode == this.s_province.psgc_pcode; 
          });
          this.muncities = filtered;
        } else {
          this.muncities = this.lib_muncities;
        }
      },

      filterBrgys() {
        if(this.s_muncity != null) {
          var filtered = this.lib_brgys.filter(brgy => { 
            return brgy.psgc_mcode == this.s_muncity.psgc_mcode; 
          });
          this.brgys = filtered;
        } else {
          this.brgys = this.lib_brgys;
        }
      }
    },

    created() {
      this.getLocationResources();
    }
  }
</script>

<style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@1,500&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

  body {
    font-family: 'Inter', sans-serif;
    margin: 0;
    padding: 0;
  }

  .sign-up-body{
      padding: 0;
      padding-right: 2rem;
      padding-top: 2rem;
      margin: 0;
      box-sizing: border-box;
    }

  .left_section {
    display: flex;
    align-items: center;
  }

  .logo {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #ffffff;
  }

  .company_name {
    color: #ffffff;
    margin-left: 5px;
    font-weight: bold;
    font-family: 'Gelasio', serif;
    font-style: italic;
  }

  .right_section {
    display: flex;
    align-items: center;
  }

  .content_section {
    margin-top: 150px;
    margin-left: 100px;
  }

  h1 {
    font-size: 39px;
    font-weight: 600;
    font-style: italic;
    font-family: 'Gelasio', serif;
    color: #2d4d22;
  }

  p {
    font-size: 20px;
    color: #000;
  }

  .logo {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: white;
  }

  .company_name {
    margin-left: 10px;
    font-size: 50px;
    color: white;
  }

  .user_section {
    display: flex;
    align-items: center;
  }

  .button_set_a {
    width: 158px;
    height: 52px;
    border-radius: 13px;
    background-color: #2d4d22;
    font-family: 'Inter', sans-serif;
    font-weight: bold;
    font-size: 18px;
    color: #ffffff;
  }

  .sign_up_button {
    width: 158px;
    height: 52px;
    border-radius: 13px;
    background-color: #c7c47f;
    font-family: 'Inter', sans-serif;
    font-weight: bold;
    font-size: 18px;
    color: #2d4d22;
  }

  h1 {
    font-size: 45px;
    font-weight: 600;
    font-style: italic;
    font-family: 'Gelasio', serif;
    color: #2d4d22;
    margin-bottom: 20px;
    text-align: center;
  }

  h3 {
    font-size: 25px;
    font-weight: 600;
    /* font-style: italic; */
    font-family: 'Gelasio', sans-serif;
    color: #2d4d22;
    margin-bottom: 20px;
    text-align: center;
  }

  .row {
    display: flex;
    justify-content: center;
    align-items: flex-start;
  }

  .column {
    text-align: center;
  }

  .banner {
    object-fit: cover;
    width: 100%;
    height: 300px;
    background-image: url('https://images.pexels.com/photos/2252482/pexels-photo-2252482.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
    background-position: center;
    background-size: cover;
    opacity: 0.75;
  }

  .next_button {
    display: flex;
    justify-content: center;
    margin-top: 40px; /* Increased margin for spacing */
  }

  .next_button button {
    font-size: 18px;
    font-weight: bold;
    color: #ffffff;
    background-color: #2d4d22;
    border: none;
    border-radius: 13px;
    padding: 10px 20px;
    margin-right: 10px;
    cursor: pointer;
  }
  .next_button .button_set_a {
    font-size: 20px;
  }
</style>