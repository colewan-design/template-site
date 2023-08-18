<template>
      <v-toolbar flat class="px-0">
        <v-toolbar-title>Basket Items</v-toolbar-title>
        <v-text-field clearable v-model="table_search" outlined hide-details dense style="maxWidth: 1500px" label="Enter Product Name" class=""  @change="search"></v-text-field>
        <v-btn color="primary" dark class="ml-3" @change="search"> Search </v-btn>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-btn small dark color="teal" @click="create_basket_items()" class="ma-2">
					<v-icon left> mdi-book-variant </v-icon> New Item
				</v-btn>
        <v-spacer></v-spacer>
      </v-toolbar>

  <v-table
    fixed-header
    height="800px"
  >
    <thead>
      <tr>
        <th class="text-left">
          SKU
        </th>
        <th class="text-left">
          Category
        </th>
        <th class="text-left">
          Image
        </th>
        <th class="text-left">
          Basket Item Name
        </th>
        <th class="text-left">
          Basket Item Amount
        </th>
        <th class="text-left">
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="item in basket_items"
        :key="item.name"
      >
       <td>{{ item.sku }}</td>
        <td>{{ item.category }}</td>
        <td>
          <v-img
            class="white--text align-end"  height="150px" contain
            :src="item.path ? item.path : 'img/icon/B2C TIKLIS APP.jpg'"
          ></v-img>
        </td>
        <td>{{ item.basket_item_name }}</td>
        <td>{{ item.item_amount }}</td>
        <td>
          <v-btn @click="edit(item)" small dark color="teal" class="ma-2">
            <v-icon left> mdi-pencil </v-icon> Edit
          </v-btn>
          <v-btn @click="delete_basket_product(item.id, item.basket_item_name)" small dark color="teal" class="ma-2">
            <v-icon left> mdi-close </v-icon> Delete
          </v-btn>
        </td>
      </tr>
    </tbody>
  </v-table>
	<v-dialog v-model="modal_basket_item" transition="dialog-top-transition" scrollable persistent max-width="100%" enctype="multipart/form-data">
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
      <v-col cols="12">
      <v-select
          label="Category"
          :items="['Meat', 'Vegtables', 'Poultry', 'Fruit', 'Herbs' , 'Add Ons']"
          v-model="basket_items_crud.category"
      ></v-select>
      </v-col>
      <v-col cols="12" class="pa-5">
        <v-text-field label="Product Name" v-model="basket_items_crud.basket_item_name" outlined hide-details dense></v-text-field>
      </v-col>
      <v-col cols="12">
      <v-text-field label="Basket Item Amount" type="number" v-model="basket_items_crud.item_amount" outlined hide-details dense></v-text-field>
      </v-col>
      <v-col cols="12" class="pa-5">
        <input type="file" class="form-control" v-on:change="onChange">
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
					<v-btn color="teal" text @click="deleteBasketItem()">Confirm</v-btn>
					<v-btn color="grey" text @click="dialog_delete=false">Close</v-btn>
				</v-card-actions>
			</v-card>
		</v-dialog>
</template>

<script>
  export default {
    data () {
      return {
        modal_basket_item: false,
        dialog_delete: false,
        editedIndex: -1,
        basket_items: [],
        basket_items_crud:{
          file:"",
          category:"",
          basket_item_name:"",
          item_amount:""
        },
        defaultItem: { 
          file:"",
          category:"",
          basket_item_name:"",
          item_amount:""
        },
        id:"",
        notify_text: '',
        table_search: '',
      }
    },
    created(){
        this.BasketItems();
    },
    methods: {
        onChange(e) {
                this.basket_items_crud.file = e.target.files[0];
        },
        create_basket_items() {
          this.key = this.key + 1;
          this.basket_items = {};
          this.modal_basket_item = true;
        },
        async BasketItems() {
            this.$axios.get('/Basket_Items/index')
            .then((response) => {
              this.basket_items = response.data;
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
          data.append('file', this.basket_items_crud.file);
          data.append('category', this.basket_items_crud.category);
          data.append('basket_item_name', this.basket_items_crud.basket_item_name);
          data.append('item_amount', this.basket_items_crud.item_amount);
          if (this.id) {
            axios
              .post("/Basket_Items/basket-items-update/" +this.id, data, config)
              .then((response) => {
                this.BasketItems();
                this.close();
              })
              .catch((error) => {
                console.error("There was an error!", error);
              });
          } else {
            axios
              .post("/Basket_Items/basket-items-store", data, config)
              .then((response) => {
                this.BasketItems();
                this.close();
              })
              .catch((error) => {
                console.error("There was an error!", error);
              });
          }
        
			  },
        edit(val) {
          console.log(val);
          this.id = val.id;
          this.editedIndex = this.basket_items.indexOf(val);
          this.basket_items_crud = Object.assign({}, val);
          this.modal_basket_item = true;
		  	},
        close() {
            this.modal_basket_item = false;
            this.$nextTick(() => {
              this.basket_items_crud = Object.assign({}, this.defaultItem);
              this.editedIndex = -1;
            });
            this.BasketItems();
        },
        delete_basket_product: function(id, basket_product) {
          this.notify_text = "Are You Sure To Delete This Product : " + basket_product;
          this.id = id;
          this.dialog_delete = true;
			  },
        async deleteBasketItem() {
            var res = await axios.delete("/Basket_Items/basket-items-delete/" + this.id);
            if (res.status === 200) {
              this.BasketItems();
              this.dialog_delete = false;
            } else {
              this.$Notice.error({
                title: "Error",
                desc: "Error occurred while loading data",
              });
            }
        },
        search() {
            axios.get('/Basket_Items/search/basket-items/?s=' + this.table_search).then((response) => {
              if(this.table_search === ''){
                 this.BasketItems();
              }else{
                 this.basket_items = response.data.data
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
        return this.editedIndex === -1 ? "New Basket Item." : "Edit Basket Item.";
      },
    },
  }
</script>