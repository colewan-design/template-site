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
        Basket Amount
      </th>
      <th class="text-left">
        Enabled
      </th>
      <th class="text-left">
        Action
      </th>
    </tr>
  </thead>
  <tbody>
    <tr
      v-for="item in baskets"
      :key="item.id"
    >
      <td>{{ item.sku }}</td>
      <td>{{ item.basket_size }}</td>
      <td>
          <v-img
            class="white--text align-end"  height="150px" contain
            :src="item.path ? item.path : 'img/icon/B2C TIKLIS APP.jpg'"
          ></v-img>
        </td>
      <td>
        <div v-for="item in JSON.parse(item.basket_item) " :key="item">
            {{ item }},
        </div>
      </td>
      <td>{{ item.basket_amount }}</td>
      <td>{{ item.from }}</td>
      <td>{{ item.to }}</td>
      <td>
        <v-btn @click="edit(item)" small dark color="teal" class="ma-2">
          <v-icon left> mdi-pencil </v-icon> Edit
        </v-btn>
        <v-btn @click="delete_basket(item.id, item.basket_code)" small dark color="teal" class="ma-2">
          <v-icon left> mdi-close </v-icon> Delete
        </v-btn>
      </td>
    </tr>
  </tbody>
</v-table>
  <v-dialog v-model="modal_basket" transition="dialog-top-transition" scrollable persistent max-width="50%" enctype="multipart/form-data">
  <v-card>
          <v-toolbar dense fixed height="60px">
              <v-toolbar-title>{{ formTitle }}</v-toolbar-title>
              <v-spacer></v-spacer>
              <div class="text-center">
        <v-btn @click="Save()" dark color="teal" class="ma-2">
                      <v-icon left> mdi-eye </v-icon>Save
                  </v-btn>
                  <v-btn dark color="orange" class="ma-2" @click="close()">
                      <v-icon left> mdi-close </v-icon> Close
                  </v-btn>
              </div>
          </v-toolbar>
    
    <v-col cols="12" class="pa-5">
        <v-col cols="13">
        <v-select
            label="Select"
            :items="['Big Basket', 'Medium Basket', 'Small Basket']"
            v-model="basket_crud.basket_size"
        ></v-select>
        </v-col>
        <v-col cols="13">
            <v-autocomplete
            label="Autocomplete"
            :items="basket_items"
            outlined
            dense
            chips
            small-chips
            multiple
            v-model="basket_crud.basket_item"
            ></v-autocomplete>
        </v-col>
     <v-col cols="13">
      <v-text-field label="Basket Amount" type="number" v-model="basket_crud.basket_amount" outlined hide-details dense></v-text-field>
      </v-col>
      <v-col cols="13">
            <v-text-field label="Date From" type="date" v-model="basket_crud.from"></v-text-field>
        </v-col>
        <v-col cols="13">
            <v-text-field label="Date To" type="date" v-model="basket_crud.to"></v-text-field>
        </v-col>
        <v-col cols="13">
          <input type="file" class="form-control" v-on:change="onChange">
        </v-col>
    </v-col>
          <v-card-text>

    </v-card-text>
      </v-card>
  </v-dialog>
<v-dialog v-model="dialog_delete" persistent max-width="600">
          <v-card>
              <v-card-title class="text-h5"> Notification </v-card-title>
              <v-card-text class="ma-0">
                  <v-alert dense border="left" color="error" type="error">
                      {{notify_text}}
                  </v-alert>
                  <v-divider></v-divider>
              </v-card-text>
              <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="teal" text @click="deleteBasket()">Confirm</v-btn>
                  <v-btn color="grey" text @click="dialog_delete=false">Close</v-btn>
              </v-card-actions>
          </v-card>
      </v-dialog>
</template>

<script>
export default {
  data () {
    return {
      modal_basket: false,
      dialog_delete: false,
      editedIndex: -1,
      basket_items: [],
      baskets:[],
      basket_crud:{
        file:"",
        basket_code:"",
        basket_size:"",
        basket_item:[],
        basket_from:"",
        basket_to:"",
      },
      defaultItem: {  
        file:"",
        basket_code:"",
        basket_size:"",
        basket_item:[],
        basket_from:"",
        basket_to:"",
      },
      id:"",
      notify_text: '',
      table_search: '',
    }
  },
  created(){
      this.Baskets();
      this.getItems();
  },
  methods: {
      onChange(e) {
                this.basket_crud.file = e.target.files[0];
      },
     create_basket() {
        this.key = this.key + 1;
        this.baskets = {};
        this.modal_basket = true;
      },
      async Baskets() {
        var basket_item =[];
          this.$axios.get('/Basket/index')
          .then((response) => {
            this.baskets = response.data;
          })
          .catch((error) => {
          });
      },
      Save(e) {
        const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
        }
        let data = new FormData();
          data.append('file', this.basket_crud.file);
        if (this.id) {
          axios
            .post("/Basket/basket-update/" +this.id, this.basket_crud, config)
            .then((response) => {
              this.Baskets();
              this.close();
            })
            .catch((error) => {
              console.error("There was an error!", error);
            });
        } else {
          axios
            .post("/Basket/basket-store", this.basket_crud, config)
            .then((response) => {
              this.Baskets();
              this.close();
            })
            .catch((error) => {
              console.error("There was an error!", error);
            });
        }
      
            },
      edit(val) {
        this.id = val.id;
        this.editedIndex = this.baskets.indexOf(val);
        this.basket_crud = Object.assign({}, val);
        this.basket_crud.basket_item = JSON.parse(val.basket_item);
        this.modal_basket = true;
            },
      close() {
          this.modal_basket = false;
          this.$nextTick(() => {
            this.basket_crud = Object.assign({}, this.defaultItem);
            this.editedIndex = -1;
          });
          this.Baskets();
      },
      delete_basket: function(id, basket_code) {
        this.notify_text = "Are You Sure To Delete This Basket : " + basket_code;
        this.id = id;
        this.dialog_delete = true;
            },
      async deleteBasket() {
          var res = await axios.delete("/Basket/basket-delete/" + this.id);
          if (res.status === 200) {
            this.Baskets();
            this.dialog_delete = false;
          } else {
            this.$Notice.error({
              title: "Error",
              desc: "Error occurred while loading data",
            });
          }
     },
     getItems(){
        this.$axios.get('/Basket/get-items')
          .then((response) => {
            this.basket_items = response.data;
          })
          .catch((error) => {
          });
    },
    search() {
          axios.get('/Basket/search/basket/?s=' + this.table_search).then((response) => {
            if(this.table_search === ''){
                this.Baskets();
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
    dialog(val) {
       val || this.close();
    },
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Basket." : "Edit Basket.";
    },
  },
}
</script>