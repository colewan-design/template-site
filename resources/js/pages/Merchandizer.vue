<template>
    <v-toolbar flat class="px-0">
      <v-toolbar-title>Merchandizers</v-toolbar-title>
      <v-text-field clearable v-model="table_search" outlined hide-details dense style="maxWidth: 1500px" label="Enter Product Name" class=""  @change="search"></v-text-field>
      <v-btn color="primary" dark class="ml-3" @change="search"> Search </v-btn>
      <v-divider class="mx-4" inset vertical></v-divider>
      <v-btn small dark color="teal" @click="create_merchandizer()" class="ma-2">
        <v-icon left> mdi-book-variant </v-icon> New Merchandizer
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
        Image
      </th>
      <th class="text-left">
        Name
      </th>
      <th class="text-left">
        Registered Name
      </th>
      <th class="text-left">
        Address
      </th>
      <th class="text-left">
        Email
      </th>
      <th class="text-left">
        Contact
      </th>
      <th class="text-left">
        Tin
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
      v-for="item in merchandizers"
      :key="item.name"
    >
      <td>
          <v-img
            class="white--text align-end"  height="150px" contain
            :src="item.path ? item.path : 'img/icon/B2C TIKLIS APP.jpg'"
          ></v-img>
      </td>
      <td>{{ item.name }}</td>
      <td>{{ item.registered_name }}</td>
      <td>{{ item.address }}</td>
      <td>{{ item.email }}</td>
      <td>{{ item.contact }}</td>
      <td>{{ item.tin }}</td>
      <td>{{ item.isEnabled }}</td>
      <td>
        <v-btn @click="edit(item)" small dark color="teal" class="ma-2">
          <v-icon left> mdi-pencil </v-icon> Edit
        </v-btn>
        <v-btn @click="delete_merchandizer(item.id, item.additional_name)" small dark color="teal" class="ma-2">
          <v-icon left> mdi-close </v-icon> Delete
        </v-btn>
      </td>
    </tr>
  </tbody>
</v-table>
  <v-dialog v-model="modal_merchandizer" transition="dialog-top-transition" scrollable persistent max-width="100%" enctype="multipart/form-data">
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
      <v-text-field label="Name" v-model="merchandizers_crud.name" outlined hide-details dense></v-text-field>
    </v-col>
    <v-col cols="12" class="pa-5">
      <v-text-field label="Registered Name" v-model="merchandizers_crud.registered_name" outlined hide-details dense></v-text-field>
    </v-col>
    <v-col cols="13" class="pa-5">
      <v-text-field label="Address" v-model="merchandizers_crud.address" outlined hide-details dense></v-text-field>
    </v-col>
    <v-col cols="12" class="pa-5">
      <v-text-field label="Email" v-model="merchandizers_crud.email" outlined hide-details dense></v-text-field>
    </v-col>
    <v-col cols="13">
      <v-text-field label="Contact" type="number" v-model="merchandizers_crud.contact" outlined hide-details dense></v-text-field>
      </v-col>
      <v-col cols="13">
      <v-text-field label="Tin" type="number" v-model="merchandizers_crud.tin" outlined hide-details dense></v-text-field>
      </v-col>
      <v-col cols="13">
        <v-switch
          v-model="merchandizers_crud.isEnabled"
          hide-details
          inset
          :label="`Enabled: ${merchandizers_crud.isEnabled.toString()}`"
        ></v-switch>
      </v-col>
      <v-col cols="13">
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
                  <v-btn color="teal" text @click="deleteMerchandizer()">Confirm</v-btn>
                  <v-btn color="grey" text @click="dialog_delete=false">Close</v-btn>
              </v-card-actions>
          </v-card>
      </v-dialog>
</template>

<script>
export default {
  data () {
    return {
      modal_merchandizer: false,
      dialog_delete: false,
      editedIndex: -1,
      merchandizers: [],
      merchandizers_crud:{
        file:"",
        name:"",
        registered_name:"",
        email:"",
        contact:"",
        tin:"",
        isEnabled:true,
      },
      defaultItem: { 
        file:"",
        name:"",
        registered_name:"",
        email:"",
        contact:"",
        tin:"",
        isEnabled:true,
      },
      id:"",
      notify_text: '',
      table_search: '',
    }
  },
  created(){
      this.Merchandizers();
  },
  methods: {
      onChange(e) {
                this.merchandizers_crud.file = e.target.files[0];
      },
      create_merchandizer() {
        this.key = this.key + 1;
        this.merchandizers = {};
        this.modal_merchandizer = true;
      },
      async Merchandizers() {
          this.$axios.get('/Merchandizer/index')
          .then((response) => {
            this.merchandizers = response.data;
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
          data.append('file', this.merchandizers_crud.file);
        if(this.id) {
          axios
            .post("/Merchandizer/merchandizer-update/" +this.id, this.merchandizers_crud,config)
            .then((response) => {
              this.Merchandizers();
              this.close();
            })
            .catch((error) => {
              console.error("There was an error!", error);
            });
        } else {
          axios
            .post("/Merchandizer/merchandizer-store", this.merchandizers_crud,config)
            .then((response) => {
              this.Merchandizers();
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
        this.editedIndex = this.merchandizers.indexOf(val);
        this.merchandizers_crud = Object.assign({}, val);
        this.modal_merchandizer = true;
            },
      close() {
          this.modal_merchandizer = false;
          this.$nextTick(() => {
            this.merchandizers_crud = Object.assign({}, this.defaultItem);
            this.editedIndex = -1;
          });
          this.Additionals();
      },
      delete_merchandizer: function(id, merchandizers) {
        this.notify_text = "Are You Sure To Delete This Merchandizer : " + merchandizers;
        this.id = id;
        this.dialog_delete = true;
            },
      async deleteMerchandizer() {
          var res = await axios.delete("/Merchandizer/merchandizer-delete/" + this.id);
          if (res.status === 200) {
            this.Merchandizers();
            this.dialog_delete = false;
          } else {
            this.$Notice.error({
              title: "Error",
              desc: "Error occurred while loading data",
            });
          }
     },
     search() {
            axios.get('/Additional/search/merchandizer/?s=' + this.table_search).then((response) => {
              if(this.table_search === ''){
                 this.Merchandizers();
              }else{
                 this.merchandizers = response.data.data
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
      return this.editedIndex === -1 ? "New Merchandizer." : "Edit Merchandizer.";
    },
  },
}
</script>