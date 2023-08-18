<template>
    <v-toolbar flat class="px-0">
      <v-toolbar-title>Customers</v-toolbar-title>
      <v-text-field clearable v-model="table_search" outlined hide-details dense style="maxWidth: 1500px" label="Enter Customer" class=""  @change="search"></v-text-field>
      <v-btn color="primary" dark class="ml-3" @change="search"> Search </v-btn>
      <v-divider class="mx-4" inset vertical></v-divider>
      <v-spacer></v-spacer>
    </v-toolbar>

<v-table
  fixed-header
  height="750px"
>
  <thead>
    <tr>
      <th class="text-left">
        Customer Reference
      </th>
      <th class="text-left">
        Name
      </th>
      <th class="text-left">
        Email
      </th>
      <th class="text-left">
        Contact
      </th>
      <th class="text-left">
        Enabled
      </th>
    </tr>
  </thead>
  <tbody>
    <tr
      v-for="item in customers"
      :key="item.id"
    >
      <td>{{ item.customer_ref }}</td>
      <td>{{ item.customer_lname }}, {{ item.customer_fname }} </td>
      <td>{{ item.user_email }}</td>
      <td>{{ item.contact_number }}</td>
      <td>
        <v-col cols="13">
        <v-switch
          v-model="item.isEnabled"
          hide-details
          inset
          :label="`Enabled: ${item.isEnabled.toString()}`"
          @change="onChangeCustomers(item.customer_id,item.isEnabled)"
        ></v-switch>
        </v-col>
      </td>
      
    </tr>
  </tbody>
</v-table>
</template>

<script>
export default {
  data () {
    return {
      customers:[],
      table_search: '',
    }
  },
  created(){
      this.getCustomers();
  },
  methods: {
     getCustomers(){
        this.$axios.get('/Customers/index')
          .then((response) => {
            this.customers = response.data;
          })
          .catch((error) => {
          });
    },

    onChangeCustomers(id,boolean){
      axios
        .post("/Customers/enabled-or-dissabled/" +id+"/"+boolean)
        .then((response) => {
          this.getCustomers();
          this.close();
        })
        .catch((error) => {
          console.error("There was an error!", error);
      });
    },
    search() {
          axios.get('/Basket/search/basket/?s=' + this.table_search).then((response) => {
            if(this.table_search === ''){
                this.getCustomers();
            }else{
                this.baskets = response.data.data
            }
          }).catch(() => {
            toast.fire({
            icon: 'error',
            title: "search failed"
            })
          })
      },
  },
  watch:{
  
  },
  computed: {
 
  },
}
</script>