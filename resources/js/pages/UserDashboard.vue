<template>
    <v-navigation-drawer v-model="drawer" temporary location="right" :width="450">
        <v-list-item>
            <h3>Search Filter</h3>
        </v-list-item>

        <v-spacer></v-spacer>
        <v-list-item title="Shipped to">
           
            <p class="drawer-p">  <v-icon>mdi-map-marker</v-icon> Benguet Baguio,</p>
        </v-list-item>

        <v-spacer></v-spacer>
        <v-spacer></v-spacer>
        <v-list-item title="Location">
            <v-container>
                <v-row>
                    <v-col cols="10">
                        City
                    </v-col>
                    <v-col cols="2">
                       <p class="drawer-p"> More <v-icon>mdi-chevron-down</v-icon> </p>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col v-for="n in 12" :key="n" class="d-flex child-flex" cols="4">
                        <v-btn>city here</v-btn>
                        </v-col>
                </v-row>
            </v-container>
        </v-list-item>

        <v-list-item title="Rating">
            <v-container>
                <v-row>
                    <v-col v-for="rating in [5, 4, 3, 2, 1]" :key="rating" cols="2">
                        <v-btn>{{ rating }}
                            <v-icon color="yellow-darken-3" size="20">mdi-star</v-icon>
                        </v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-list-item>

           
        <v-spacer></v-spacer>
        <v-list-item title="Price">

            <v-container>
                <v-row>
                    <v-col cols="5">
                        <v-text-field placeholder="Min"></v-text-field>
                    </v-col>
                    <v-col cols="2">
                        <v-icon>mdi-minus</v-icon>
                    </v-col>
                    <v-col cols="5">
                        <v-text-field placeholder="Max"></v-text-field>
           
                    </v-col>
                </v-row>
            </v-container>

        </v-list-item>


        <template v-slot:append>
          <v-container>
            <v-row>
                <v-col cols="6">
                    <v-btn block>
                        Reset
                    </v-btn>
                </v-col>
                <v-col cols="6">
                    <v-btn block>
                        Done
                    </v-btn>
                </v-col>
            </v-row>
          </v-container>
        </template>
    </v-navigation-drawer>
    <v-container class="user-dashboard-body">
        <!-- <v-row style="padding: 1rem;">
           <v-card width="600">
              <v-container>
                <v-row>
                    <v-col col="6">
                    <router-link to="/user-account" v-slot="{ navigate }" custom>
                        <v-btn class="button_set_a d-flex d-sm-none ma-2" block @click="navigate" role="link">User Account</v-btn>
                    </router-link>
                    </v-col>
                    <v-col col="6">
                            <router-link to="/user-dashboard" block v-slot="{ navigate }" custom>
                                <v-btn class="button_set_a d-flex d-sm-none ma-2"  @click="navigate" role="link">User Dashboard</v-btn>
                            </router-link>
                    </v-col>
                </v-row>
              </v-container>
            </v-card>
          
        </v-row> -->
     
        
        <v-window v-model="tab" :touch="{left: null, right: null}">
            <v-window-item :value="1" key="sub2">

            <div class="bottom-navigation-icon">
              <v-container>
                <v-row>
                    <v-col cols="6">
                        <router-link to="/user-account" v-slot="{ navigate }" custom>
                           <v-btn icon @click="navigate" style="background-color: rgb(4, 68, 36); color: white;">
                            <v-icon size="32" >
                                mdi-account
                            </v-icon>
                           </v-btn>
                        </router-link>
                    </v-col>
                    
                </v-row>
              </v-container>
              
            </div>
            <v-row style="padding: 1rem;">
                <v-card class="pa-4" flat width="600" img="https://cdn.vuetifyjs.com/images/toolbar/map.jpg">
                    <v-text-field
                    label="Search"
                    prepend-inner-icon="mdi-magnify"
                    @click="activateTab(8)"
                    variant="outlined"
                    >
                    <template v-slot:append>
                        <div class="search-button">
                        <v-btn @click="activateTab(10)">Search</v-btn>
                        </div>
                    </template>
                    </v-text-field>
                </v-card>
            </v-row>
            <v-row justify="space-around">
                <v-card class="margin-1" width="580">
                    <v-container>
                        <v-row>
                            <v-col cols="9">
                                <h3>Sale Today</h3>

                            </v-col>
                            <v-col cols="3">
                                See more
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
           
                <v-card class="margin-1" width="580" height="200">
                    <v-carousel cycle  height="200">
                    <v-carousel-item
                        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                        cover
                       
                    ></v-carousel-item>

                    <v-carousel-item
                        src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg"
                        cover
                       
                    ></v-carousel-item>

                    <v-carousel-item
                        src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                        cover
                       
                    ></v-carousel-item>
                    </v-carousel>
                </v-card>
           

                <v-card class="margin-1 padding-1" width="580">
                    <v-row>
                            <v-col cols="9">
                                <h3>Best Sellers</h3>

                            </v-col>
                            <v-col cols="3">
                                See more
                            </v-col>
                        </v-row>
                    <v-row>
                        <v-col v-for="n in 3" :key="n" class="d-flex child-flex" cols="4">
                        <v-img
                            :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
                            :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
                            aspect-ratio="1"
                            cover
                            class="bg-grey-lighten-2 image-with-border-radius"
                        >
                            <template v-slot:placeholder>
                            <v-row class="fill-height ma-0" align="center" justify="center">
                                <v-progress-circular
                                indeterminate
                                color="grey-lighten-5"
                                ></v-progress-circular>
                            </v-row>
                            </template>
                        </v-img>
                        </v-col>
                    </v-row>
                </v-card>

               

                <v-card class="margin-1 padding-1" width="580">
                    <v-row>
                            <v-col cols="9">
                                <h3>Food Groups</h3>

                            </v-col>
                            <v-col cols="3">
                                See more
                            </v-col>
                        </v-row>
                    <v-row>
                        <v-col v-for="n in 9" :key="n" class="d-flex child-flex" cols="3">
                        <v-img
                            :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
                            :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
                            aspect-ratio="1"
                            cover
                            class="bg-grey-lighten-2 image-with-border-radius"
                        >
                            <template v-slot:placeholder>
                            <v-row class="fill-height ma-0" align="center" justify="center">
                                <v-progress-circular
                                indeterminate
                                color="grey-lighten-5"
                                ></v-progress-circular>
                            </v-row>
                            </template>
                        </v-img>
                        </v-col>
                    </v-row>
                </v-card>
                <!-- do not remove -->
                <v-card class="margin-1" width="580">
                    <v-row>
                       <v-col  v-for="item in basket_items" :key="item" cols="6" @click="itemDetails(9, item)">
                        <v-img
                            :src="`https://picsum.photos/500/300?image`"
                            :lazy-src="`https://picsum.photos/10/6?image`"
                            aspect-ratio="1"
                            cover

                            class="bg-grey-lighten-2"
                        >
                            <template v-slot:placeholder>
                            <v-row class="fill-height ma-0" align="center" justify="center">
                                <v-progress-circular
                                indeterminate
                                color="grey-lighten-5"
                                ></v-progress-circular>
                            </v-row>
                            </template>
                        
                        </v-img>

                        <v-card-text>
                            <v-container>
                                 <v-row>
                                    <div class="item-name-font-size">
                                        {{ item.name }}
                                    </div>
                                 </v-row>
                                 <v-row>
                                    <div class="item-name-font-size item-font-color">
                                        <v-icon size="10"> mdi-currency-php</v-icon> {{ item.price }}.00 
                                    </div>
                                 </v-row>

                                  <v-row>
                                    <v-col class="item-name-font-size-small font-weight-normal" col="8">
                                        <v-icon size="10" color="yellow-darken-3" icon="mdi-star"></v-icon>
                                        {{ item.rate }} ( {{ item.numberOfReview }} )
                                    </v-col>
                                    <v-col class="item-name-font-size-small font-weight-normal" col="3">
                                        {{ item.sold }} sold
                                    </v-col>
                                  </v-row>
                            </v-container>
                        </v-card-text>
                       </v-col>
                    </v-row>
                    <v-row>
                        
                    </v-row>
                </v-card>

            </v-row>
        </v-window-item>
        <v-window-item :value="2" key="sub2">
            <v-row justify="space-around">
                    <v-card class="margin-1" width="600" height="50">
                        <v-container>
                        <v-row>
                            <v-col cols="1">
                                <v-icon @click="tab = 1">mdi-arrow-left</v-icon>
                            </v-col>

                            <v-col cols="8">
                                <h2>Choice</h2>
                            </v-col>
                           

                        </v-row>
                        </v-container>
                    </v-card>
                </v-row>
        
        </v-window-item>

      <v-window-item :value="6" key="sub2">
        
    </v-window-item>
    <v-window-item :value="7" key="sub7">
        
    </v-window-item>
    
    <v-window-item :value="8" key="sub8">
    <v-row justify="space-around">
      <v-card class="pa-4" flat width="600" img="https://cdn.vuetifyjs.com/images/toolbar/map.jpg">
        <v-text-field
          label="Search"
          prepend-icon="mdi-chevron-left"
          @click:prepend="tab = 1"
          variant="outlined"
          v-model="searchText"
          @input="handleSearchInput"
          
        >
          <template v-slot:append>
            <div class="search-button">
              <v-btn @click="search">Search</v-btn>
            </div>
          </template>
        </v-text-field>
      </v-card>
    </v-row>
    <v-row justify="space-around">
      <v-card width="600" flat>
        <v-container>
          <v-row>
            <v-col cols="9">
              <h3>Search History</h3>
            </v-col>
            <v-col cols="2">
              <v-btn style="font-size: 10px;">Clear all</v-btn>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
    </v-row>
    <v-row justify="space-around">
      <v-container>
        <v-row v-if="!typing">
          <v-col v-for="n in 12" :key="n" cols="4">
            <v-card @click="activateTab(11)">
              <!-- Display content when user is not typing -->
              search text here
            </v-card>
          </v-col>
        </v-row>
        <v-row v-else>
          <v-col v-for="item in filteredBasketItems" :key="item.id" cols="12">
            <v-card  @click="activateTab(11, item)">
              <v-container>
                <v-row>
                  <v-col cols="10">
                    {{ item.basket_item_name }}
                  </v-col>
                  <v-col cols="2">
                    <v-icon @click="activateTab(1, item)">mdi-arrow-top-left</v-icon>
                  </v-col>
                </v-row>
              </v-container>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-row>
  </v-window-item>

    <v-window-item :value="9" key="sub9">
        <v-container>
            <v-row>
                <v-icon @click="reloadPage">
                    mdi-chevron-left
                </v-icon>
            </v-row>
            <v-row>
                <v-col>
                    <v-img
                        :src="`https://picsum.photos/500/300?image`"
                        :lazy-src="`https://picsum.photos/10/6?image`"
                        aspect-ratio="1"
                        cover
                        class="bg-grey-lighten-2 image-with-border-radius"
                    >
                        <template v-slot:placeholder>
                        <v-row class="fill-height ma-0" align="center" justify="center">
                            <v-progress-circular
                            indeterminate
                            color="grey-lighten-5"
                            ></v-progress-circular>
                        </v-row>
                        </template>
                    </v-img>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-icon>mdi-currency-php</v-icon>    {{ selectedItemPrice}}.00 
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    {{ selectedItemName }}
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="3">
                    <v-icon color="yellow-darken-3" icon="mdi-star" class="mx-3"></v-icon>
                    {{ selectedItemRate }}/5({{ selectedItemNOR }})
                </v-col>
                <v-col cols="3">
                    {{ selectedItemSold }} sold
                </v-col>
                <v-col cols="6">
                    <v-icon icon="mdi-truck-fast" class="mx-3"></v-icon>
                   Free Shipping
                </v-col>

            </v-row>
            <v-row>
                <v-col cols="2" >
                    <v-btn prepend-icon="mdi-store" stacked>
                     Shop
                    </v-btn>
                </v-col>
                <v-col cols="2">
                    <v-btn prepend-icon="mdi-message-outline" stacked>
                     Chat
                    </v-btn>
                </v-col>
                <v-col cols="4">
                    <v-btn variant="outlined" height="70" @click="addNewItemToCart(selectedItemName)">
                        Add to cart
                    </v-btn>
                </v-col>
                <v-col cols="4">
                    <v-btn variant="outlined" height="70">
                       Buy Now
                    </v-btn>
                </v-col>
            </v-row>
        </v-container>
        
    </v-window-item>

    <v-window-item :value="10" key="sub10">
      
        <v-container>
           
            <v-row>
                <v-card class="margin-1" width="580">
                    <v-container>
                        <v-row>
                            <v-card class="pa-4" flat width="600" img="https://cdn.vuetifyjs.com/images/toolbar/map.jpg">
                                    <v-text-field
                                    label="Search"
                                    prepend-icon="mdi-chevron-left"
                                    @click:prepend="tab = 1"
                                    variant="outlined"
                                    >
                                    <template v-slot:append>
                                        <div class="search-button">
                                        <v-btn @click="">Search</v-btn>
                                        </div>
                                    </template>
                                    </v-text-field>
                                </v-card>
                        </v-row>
                        <v-row>
                            <v-col cols="2" >
                                <v-btn style="font-size: 8px;">Best Match</v-btn>
                            </v-col>

                            <v-col cols="2">
                                <v-btn style="font-size: 8px;">Top Sales</v-btn>
                            </v-col>

                            <v-col cols="2">
                                <v-btn style="font-size: 8px;">Price
                                <v-icon><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(-90 12 12)"><path fill="currentColor" d="m14.6 16.6l4.6-4.6l-4.6-4.6L16 6l6 6l-6 6l-1.4-1.4m-5.2 0L4.8 12l4.6-4.6L8 6l-6 6l6 6l1.4-1.4Z"/></g></svg></v-icon></v-btn>
                              
                              
                            </v-col>
                            <v-col cols="2"></v-col> <v-col cols="2"></v-col>

                            <v-col cols="2">
                                <v-btn style="font-size: 8px;" @click.stop="drawer = !drawer"><v-icon>mdi-filter-outline</v-icon> Filter </v-btn>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>

                <v-card class="margin-1" width="580">
                        <v-row>
                            <v-col v-for="n in 20" :key="n" class="d-flex child-flex" cols="6">
                            <v-img
                                :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
                                :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
                                aspect-ratio="1"
                                cover
                                class="bg-grey-lighten-2 image-with-border-radius"
                            >
                                <template v-slot:placeholder>
                                <v-row class="fill-height ma-0" align="center" justify="center">
                                    <v-progress-circular
                                    indeterminate
                                    color="grey-lighten-5"
                                    ></v-progress-circular>
                                </v-row>
                                </template>
                            </v-img>
                            </v-col>
                        </v-row>
                    </v-card>
            </v-row>
               
        </v-container>
        
    </v-window-item>

    <v-window-item :value="11" key="sub11">
        <v-container>
           
           <v-row>
               <v-card class="margin-1" width="580">
                   <v-container>
                       <v-row>
                           <v-card class="pa-4" flat width="600" img="https://cdn.vuetifyjs.com/images/toolbar/map.jpg">
                                   <v-text-field
                                   label="Search"
                                   prepend-icon="mdi-chevron-left"
                                   @click:prepend="reloadPage"
                                   variant="outlined"
                                   v-model="searchedItem.basket_item_name"
                                   >
                                   <template v-slot:append>
                                       <div class="search-button">
                                       <v-btn @click="">Search</v-btn>
                                       </div>
                                   </template>
                                   </v-text-field>
                               </v-card>
                       </v-row>
                       <v-row>
                           <v-col cols="2" >
                               <v-btn style="font-size: 8px;">Best Match</v-btn>
                           </v-col>

                           <v-col cols="2">
                               <v-btn style="font-size: 8px;">Top Sales</v-btn>
                           </v-col>

                           <v-col cols="2">
                               <v-btn style="font-size: 8px;">Price
                               <v-icon><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(-90 12 12)"><path fill="currentColor" d="m14.6 16.6l4.6-4.6l-4.6-4.6L16 6l6 6l-6 6l-1.4-1.4m-5.2 0L4.8 12l4.6-4.6L8 6l-6 6l6 6l1.4-1.4Z"/></g></svg></v-icon></v-btn>
                             
                             
                           </v-col>
                           <v-col cols="2"></v-col> <v-col cols="2"></v-col>

                           <v-col cols="2">
                               <v-btn style="font-size: 8px;" @click.stop="drawer = !drawer"><v-icon>mdi-filter-outline</v-icon> Filter </v-btn>
                           </v-col>
                       </v-row>
                   </v-container>
               </v-card>

               <v-card class="margin-1" width="580">
                <v-row>
                    <v-col  v-for="item in filteredBasketItems" :key="item" cols="6" @click="itemDetails(9, item)">
                    <v-img
                        :src="`https://picsum.photos/500/300?image`"
                        :lazy-src="`https://picsum.photos/10/6?image`"
                        aspect-ratio="1"
                        cover

                        class="bg-grey-lighten-2"
                    >
                        <template v-slot:placeholder>
                        <v-row class="fill-height ma-0" align="center" justify="center">
                            <v-progress-circular
                            indeterminate
                            color="grey-lighten-5"
                            ></v-progress-circular>
                        </v-row>
                        </template>
                    
                    </v-img>

                    <v-card-text>
                        <v-container>
                                <v-row>
                                <div class="item-name-font-size">
                                    {{ item.basket_item_name }}
                                </div>
                                </v-row>
                                <v-row>
                                <div class="item-name-font-size item-font-color">
                                    <v-icon size="10"> mdi-currency-php</v-icon> {{ item.price }}.00 
                                </div>
                                </v-row>

                                <v-row>
                                <v-col class="item-name-font-size-small font-weight-normal" col="8">
                                    <v-icon size="10" color="yellow-darken-3" icon="mdi-star"></v-icon>
                                    {{ item.rate }} ( {{ item.numberOfReview }} )
                                </v-col>
                                <v-col class="item-name-font-size-small font-weight-normal" col="3">
                                    {{ item.sold }} sold
                                </v-col>
                                </v-row>
                        </v-container>
                    </v-card-text>
                    </v-col>
                </v-row>
                <v-row>
                    
                </v-row>
                   </v-card>
           </v-row>
              
       </v-container>
        
        </v-window-item>

    </v-window>
    </v-container>
    
  </template>
  
  <script>
    export default {
      data: () => ({
        searchText: '',
        typing: false,
        drawer: null,
        rating: 3,
        basket_items: [],
        // basket_items: [
        // {
        //     name: 'Item 1',
        //     price: `100`,
        //     rate: '1',
        //     numberOfReview: '120',
        //     sold: '41',
        //     location: 'Baguio',
        //   },
        //   {
        //     name: 'Item 2',
        //     price: `200`,
        //     numberOfReview: '89',
        //     rate: '2',
        //     sold: '29',
        //     location: 'Baguio',
        //   },
        //   {
        //     name: 'Item 3',
        //     price: `300`,
        //     rate: '3',
        //     numberOfReview: '30',
        //     sold: '11',
        //     location: 'Baguio',
        //   },
        // ],
        item_details: [],
        selectedItemName : '',
        selectedItemPrice : '',
        selectedItemRate : '',
        selectedItemSold : '',
        selectedItemNOR : '',
        show: false,
        productShow: false,
        rating: 3,
        tab: 1,
        deliveryInfo: [
          {
            status: 'Paid',
            date: `Mar 22`,
            time: '10:42am',
            color: 'deep-purple-lighten-1',
          },
          {
            status: 'Shipped',
            date: `Mar 22`,
            time: '10:37am',
            color: 'green',
          },
          {
            status: 'Delivered',
            date: `Mar 28`,
            time: '9:47am',
            color: 'deep-purple-lighten-1',
          },
        ],
        icons: ['mdi-snowflake', 'mdi-leaf', 'mdi-fire', 'mdi-water'],
  
      }),
      created(){
        this.fetchBasketItems();
     },
  
      mounted() {
            if (this.tab === 8) {
                this.$nextTick(() => this.$refs.searchField.focus())
            }
        },
        computed: {
            filteredBasketItems() {
                const searchTextLower = this.searchText.toLowerCase();
                return this.basket_items.filter(item => 
                item.basket_item_name && item.basket_item_name.toLowerCase().includes(searchTextLower)
                );
            },
        },
      methods: {
        addNewItemToCart(selectedItemName) {
            this.selectedItemName = selectedItemName;
            console.log(this.selectedItemName);

            axios.post('/Cart/cart-store', { selectedItemName: this.selectedItemName })
                .then(response => {
                    console.log('Item added to cart:', response.data);
                    // Handle any frontend updates you need here
                })
                .catch(error => {
                    console.error('Error adding item to cart:', error);
                    // Handle error case
                });
        },

        reloadPage() {
        window.location.reload(); // Reload the page
        },
        handleSearchInput() {
        this.typing = true; // Set typing to true when input is detected
        console.log('Search Text:', this.searchText);
        },
        async fetchBasketItems() {
            try {
            const response = await this.$axios.get('/Basket_Items/user-dashboard-items');
            this.basket_items = response.data;
            } catch (error) {
            console.error(error);
            }
        },
        search() {
        this.typing = false; // Reset typing to false when search is performed
        // Implement your search logic here
        },  
        activateTab(tabNumber, itemId) {
            this.searchedItem = itemId;
            this.tab = tabNumber;
            console.log(this.tab);
            console.log(this.searchedItem);
        },
        itemDetails(tabNumber, selectedItem) {
            this.tab = tabNumber;

            this.selectedItemName = selectedItem.basket_item_name;
            this.selectedItemRate = selectedItem.rate;
            this.selectedItemPrice = selectedItem.price;
            this.selectedItemSold = selectedItem.sold;
            this.selectedItemNOR = selectedItem.numberOfReview;
            console.log( this.selectedItemName );
            console.log( this.selectedItemPrice );
            console.log( this.selectedItemRate );
            console.log( this.selectedItemSold );
            console.log( this.selectedItemNOR );
        },
        
        handleSearch() {
            console.log('Search Text:', this.searchText);
        },
       
      },
    }
  </script>
  
  <style scoped>
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
          .user-dashboard-body{
          padding: 0;
          padding-right: 2rem;
          margin: 0;
          box-sizing: border-box;
          
        }
     
      /* .expanded-rating-card{
        font-size: 12px;
      } */
     
        .v-col {
        padding-right: 2px;
        }
        .margin-1{
            margin: .5rem;
        }
        .padding-1{
            padding: 1rem;
        }

        .image-with-border-radius {
        border-radius: 10px;
        }
        .drawer-p{
            font-size: 12px;
        }
        .item-text-font-size{
            font-size: 16px;
           
            font-weight: 900;
        }
        .item-name-font-size{
            font-size: 16px;
            font-weight: 900;
        }
        .item-name-font-size-small{
            font-size: 10px;
            margin-left: 0;
            padding-left: 0;
           
        }
        .font-weight-normal{
            font-weight: 700;
        }
        .item-font-color{
            color: rgb(35, 184, 84);
        }
        .search-button {
            position: absolute;
            top: 50%;
            right: 50px;
            transform: translateY(-80%);
            }
        .bottom-navigation-icon{
        position: fixed;
        bottom: 60px;
        left: 30px;
        width: 100%;
        z-index: 1000;
        
    }
    
  
     
   }
  
  
  </style>