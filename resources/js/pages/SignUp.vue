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
                  src=""
                  max-height="200"
                  height="120"
                ></v-img>
              </v-col>
            </v-row>
            <v-row dense>
              <v-col>
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
            <v-btn variant="flat"
              @click="step = 2">Proceed</v-btn
            >
          
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
                src=""
                height="120"
                max-height="200"
              ></v-img>
            </v-col>
          </v-row>
          <v-row no-gutters>
            <v-col>
              <h1>Almost there!</h1>
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
 
</style>