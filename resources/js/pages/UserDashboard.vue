<template >
    <v-navigation-drawer v-model="drawer" temporary location="right" :width="450">
        <v-list-item>
           <v-container>
                <p class="p-16">Search Filter</p>
           </v-container>
        </v-list-item>
        <v-list-item>
           <v-container>
            <v-row class="fw-900">
                Shipped to
            </v-row>
              <v-row>
                <v-col cols="1">
                    <v-icon size="15">mdi-map-marker</v-icon>
                </v-col>
                <v-col class="p-14 ta-left" cols="9">Benguet Baguio Apugan-Loakan</v-col>
                <v-col class="link-text ta-right" cols="2">Select</v-col>
              </v-row>
           </v-container>
        </v-list-item>
        <v-list-item>
            <v-container>
               <v-row class="fw-900">
                    Location
               </v-row>
               <v-row>
                    <v-col cols="6" class="ta-left p-14 fw-900">
                        City
                    </v-col>
                    <v-col cols="6" class="ta-right p-14">
                        More <v-icon>mdi-chevron-down</v-icon>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col v-for="city in 4" :key="city" class="p-10" cols="3">
                        <v-btn @click="" class="p-10">Baguio</v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6" class="ta-left p-14 fw-900">
                        Area
                    </v-col>
                    <v-col cols="6" class="ta-right p-14">
                        More <v-icon>mdi-chevron-down</v-icon>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col v-for="area in 4" :key="area" class="p-10" cols="3">
                        <v-btn @click="" class="p-10">Local</v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-list-item>

        <v-list-item>
            
            <v-container>
                <v-row class="fw-900">
                    Price
               </v-row>
                <v-row>
                    <v-col cols="5" height="100">
                        <v-text-field v-model="minItemAmount" variant="outlined" placeholder="Min" density="compact"></v-text-field>
                    </v-col>
                    <v-col cols="2">
                        <v-icon>mdi-minus</v-icon>
                    </v-col>
                    <v-col cols="5">
                        <v-text-field v-model="maxItemAmount" variant="outlined" placeholder="Max" density="compact"></v-text-field>
                    </v-col>
                </v-row>
            </v-container>
        </v-list-item>

        <v-list-item>
            <v-container>
                <p class="p-16">Rating</p>
                <v-row>
                    <v-col v-for="rating in 5" :key="rating" cols="2">
                        <v-btn @click="selectRating(rating)" :color="selectedRate === rating ? 'primary' : ''">{{ rating }}
                            <v-icon color="yellow-darken-3" size="20">mdi-star</v-icon>
                        </v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-list-item>



        <template v-slot:append>
          <v-container>
            <v-row>
                <v-col cols="1"></v-col>
                <v-col cols="5">
                    <v-btn block @click="resetFilters">
                        Reset
                    </v-btn>
                </v-col>
                <v-col cols="5">
                    <v-btn block @click="drawer = false" class="button-gradient">
                        Done
                    </v-btn>
                </v-col>
                <v-col cols="1"></v-col>
            </v-row>
          </v-container>
        </template>
    </v-navigation-drawer>
    <v-container class="user-dashboard-body" style="margin-top: -1rem; padding-top: -1rem;">
        
        <v-window v-model="tab" :touch="{left: null, right: null}">
            <v-window-item :value="1" key="sub1">

            <v-card max-width="600" flat class="user-account-top-nav" height="60">
                <v-container>
                    <v-row>
                        <v-col cols="11" style="padding-top: 1rem;">
                                    Dashboard
                        </v-col>
                        <v-col cols="1" style="margin-bottom:10rem;">
                            <router-link to="/user-account" v-slot="{ navigate }" custom>
                                    <v-icon size="20" @click="navigate" >
                                        mdi-account
                                    </v-icon>
                            </router-link>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card>
            <v-row>
                <v-card class="m-0-p-0 sub1-searchfield" width="600">
                    <v-text-field
                    density="compact"
                    label="Search"
                    prepend-inner-icon="mdi-magnify"
                    @click="activateTab(8)"
                    variant="outlined"
                    >
                    <template v-slot:append>
                        <div class="sub1-search-button">
                        <v-btn @click="activateTab(10)" style="font-size: 8px;">Search</v-btn>
                        </div>
                    </template>
                    </v-text-field>
                </v-card>
            </v-row>
            <v-row>
                <v-card width="600" class="mt-0-pt-0" flat>
                    <v-container>
                        <v-row class="p-14">
                            <v-col cols="9">
                                <h3>Sale Today</h3>

                            </v-col>
                            <v-col cols="3" class="ta-right text-link">
                                See more
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
           
                <v-card class="margin-1" width="580" height="200" flat>
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
           

                <v-card class="margin-1 padding-1" width="600" flat>
                    
                            <v-row class="p-14">
                                <v-col cols="9">
                                    <h3>Best Sellers</h3>

                                </v-col>
                                <v-col cols="3" class="ta-right text-link">
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

               

                <v-card class="margin-1 padding-1" width="580" flat>
                    <v-row class="p-14">
                        <v-col cols="9">
                            <h3>Food Groups</h3>

                        </v-col>
                        <v-col cols="3" class="ta-right text-link">
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
                <v-card class="margin-1" width="580" flat>
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
                                        {{ item.basket_item_name }}
                                    </div>
                                 </v-row>
                                 <v-row>
                                    <div class="item-name-font-size item-font-color">
                                        <v-icon size="10"> mdi-currency-php</v-icon> {{ item.item_amount }}.00 
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

      <v-window-item :value="6" key="sub6">
        
    </v-window-item>
    <v-window-item :value="7" key="sub7">
        
    </v-window-item>
    
    <v-window-item :value="8" key="sub8">
    <v-row>
      <v-card class="pa-4" flat width="600">
        <v-text-field
        class="sub8-textfield"
          label="Search"
          prepend-icon="mdi-chevron-left"
          @click:prepend="tab = 1; searchText = ''; typing = false"
          variant="outlined"
          v-model="searchText"
          @input="handleSearchInput"
          density="compact"
          
        >
          <template v-slot:append>
            <div class="sub8-search-button">
              <v-btn @click="filterSearch(searchText)" class="button-font-size">Search</v-btn>
            </div>
          </template>
        </v-text-field>
      </v-card>
    </v-row>
    <v-row>
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
        <v-sheet
            class="bottom-navigation-sheet"
            elevation="4"
            height="130"
            rounded
            max-width="600"
            width="100%"
            >
            <v-container>
                <v-row class="m-0-p-0">
                    <v-col cols="2" class="m-0-p-0 mt-0-pt-0">
                       <v-container>
                        <v-row class="font-size-10 m-0-p-0">
                            <v-col class="m-0-p-0">
                            <v-icon size="25" class="m-0-p-0">
                                mdi-store
                            </v-icon>
                            </v-col>
                            <v-col class="m-0-p-0">
                                Shop
                            </v-col>
                          
                        </v-row>
                       </v-container>
                    </v-col>
                    <v-col cols="2" class="m-0-p-0 mt-0-pt-0">
                       <v-container>
                        <v-row class="font-size-10 m-0-p-0">
                            <v-col class="m-0-p-0">
                                <v-icon size="25" class="m-0-p-0">
                                    mdi-message-outline
                                </v-icon>
                            </v-col>
                            <v-col class="m-0-p-0">
                                Chat
                            </v-col>
                           
                        </v-row>
                       </v-container>
                    </v-col>
                    <v-col cols="1"></v-col>
                    <v-col cols="3" class="ta-right m-0-p-0">
                        <v-btn class="p-12" variant="tonal" size="large" rounded="xs" @click="addNewItemToCart(selectedItemName, selectedItemPrice)">
                            Buy Now
                        </v-btn>
                       
                    </v-col>
                    <v-col cols="4" class="ta-right m-0-p-0">
                        <v-navigation-drawer
                            v-model="addToCartDrawer"
                            location="bottom"
                            temporary
                            style="height: 350px"
                        >
                            <v-list>
                                <v-container>
                                    <v-icon size="20" @click="addToCartDrawer = false">mdi-close</v-icon>
                                    <v-row>
                                        <v-col cols="2">
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
                                        <v-col>
                                            <v-container>
                                                <v-row>
                                                    <v-icon size="15">mdi-currency-php</v-icon>    {{ selectedItemPrice}}.00 
                                                </v-row>
                                                <v-row>
                                                    Category: Vegetable
                                                </v-row>
                                            </v-container>
                                        </v-col>
                                        
                                    </v-row>
                                    <v-row>
                                        <v-col cols="12" class="ta-left">
                                            <v-icon size="15">mdi-message-processing</v-icon> <span class="p-14">5.0 rating product, don't miss it!</span>
                                        </v-col>
                                    </v-row>
                                     <v-row>
                                        <v-col cols="6" class="ta-left">
                                         <v-container>
                                            <v-row class="fw-900 p-14">
                                                Quantity
                                            </v-row>
                                         </v-container>
                                        </v-col>
                                        <v-col cols="6" class="ta-right">
                                            <v-container>
                                                <v-row>
                                                    <v-col cols="4" class="ta-right">
                                                        <v-icon size="12" @click="decrementQuantity(selectedItemQuantity)">mdi-minus</v-icon>
                                                        
                                                    </v-col>
                                                    <v-col cols="4" class="ta-center">
                                                    {{ selectedItemQuantity }}
                                                    </v-col>
                                                    <v-col cols="4" class="ta-left">
                                                        <v-icon size="12" @click="incrementQuantity(selectedItemQuantity)">mdi-plus</v-icon>
                                                    </v-col>
                                                </v-row>
                                            </v-container>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col cols="12">
                                            <v-btn block @click="saveItemToCart()" class="gradient-button">Add to Cart</v-btn>
                                        </v-col>
                                    </v-row>

                                </v-container>
                            </v-list>
                        </v-navigation-drawer>
                        <v-btn class="p-12" variant="tonal" size="large" rounded="xs" @click="addNewItemToCart(selectedItemName, selectedItemPrice)">
                            Add to cart
                        </v-btn>
                        <v-snackbar v-model="snackbar">
                           Item added to cart.
                        </v-snackbar>

                    </v-col>
                    
                </v-row>
            </v-container>
                
            </v-sheet>
        <v-container style="padding-bottom:5rem;">
            <v-row>
               <v-col style="padding: 1rem;" cols="1">
                    <v-icon @click="tab = 11">
                        mdi-chevron-left
                    </v-icon>
               </v-col>
                <v-col>
                <v-text-field
                density="compact"
                label="Search"
                prepend-inner-icon="mdi-magnify"
                @click="activateTab(8)"
                rounded
                variant="outlined"
                >
                <template v-slot:append>
                    <div class="sub1-search-button">
                    <v-btn @click="activateTab(10)" style="font-size: 8px;">Search</v-btn>
                    </div>
                </template>
                </v-text-field>
                </v-col>
                <v-col cols="1">
                    <v-icon>mdi-cart</v-icon>
                </v-col>
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
                <v-col class="fw-900" cols="11">
                    <v-icon size="15">mdi-currency-php</v-icon>    {{ selectedItemPrice}}.00 
                </v-col>
                <v-col class="fw-900 ta-right" cols="1" @click="toggleBookmark">
                    <v-icon>{{ bookmarkIcon }}</v-icon>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="fw-900">
                    {{ selectedItemName }}
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-rating
                    color="yellow-darken-3"
                    v-model="rating"
                    size="x-small"
                    density="compact"
                    ></v-rating>
                    <span class="p-14"> {{ selectedItemRate }}/5({{ selectedItemNOR }})</span> | {{ selectedItemSold }} <span class="p-12">sold</span>
                </v-col>
               
                <v-col cols="1">
                    
                </v-col>
                <v-col cols="5" class="ta-right">
                    <v-icon icon="mdi-truck-fast" class="mx-3"></v-icon>
                   <span class="p-12">Free Shipping</span>
                </v-col>

            </v-row>

            <v-row>
                <v-col class="fw-900" cols="8">
                  Delivery
                </v-col>
                <v-col class="ta-right" cols="4">
                    <v-icon size="15">mdi-map-marker</v-icon>
                    <span class="p-16">Loakan Baguio</span>
                  <v-icon>
                    mdi-chevron-right
                  </v-icon>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="p-14">
                  Standard Delivery
                </v-col>
                <v-col class="ta-right">
                 <v-icon size="15"> mdi-currency-php </v-icon>
                 0.00
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="1">
                    <v-icon size="15" color="green">mdi-truck-fast</v-icon>
                </v-col>
                <v-col cols="11">
                  Free Shipping with minimum 3 items
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="1">
                    <v-img
                 
                    src="/img/icon/tiklis-pac-logo-transparent-bg.png"
                    max-height="20"
                    height="20"
                    ></v-img>
                </v-col>
                <v-col cols="10" class="fw-900 p-14">
                    Siged Tiklis Money Back Guarantee
                </v-col>
                <v-col cols="1">
                    <v-icon> mdi-chevron-right</v-icon>
                </v-col>
            </v-row>

            <v-row>
               <v-card width="600" flat>
                <v-container>
                  <v-row>
                    <v-col class="p-14">
                     Review (187)
                    </v-col>
                    <v-col class="p-14 ta-right">
                        View All
                        <v-icon>mdi-chevron-right</v-icon>
                    </v-col>
                  </v-row>
                  <v-row > 
                    <span style="23">4.9</span>
                    /5 
                    <v-rating
                    color="yellow-darken-3"
                    v-model="rating"
                    size="x-small"
                    density="compact"
                    ></v-rating>
                  </v-row>
                </v-container>
               </v-card>
            </v-row>

            <v-row v-for="i in 3" :key="i" class="pb-2">
              <v-card variant="tonal" width="600" rounded="10">
                <v-col cols="12">
                  John D.
                </v-col>
                <v-container>
                   <v-row>
                    <v-col cols="2">
                        <v-rating
                        color="yellow-darken-3"
                        v-model="rating"
                        size="x-small"
                        density="compact"
                        ></v-rating>
                    </v-col>
                    <v-col class="ta-left fs-14">Category: Vegetable</v-col>
                   </v-row>
                   <v-row>
                    <v-col>
                        Product is Delicious
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
                </v-container>
              </v-card>
            </v-row>

            <v-row>
                <v-col cols="12" class="ta-center">
                    ----- Product Details -----
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="9" class="fw-900">
                   Specifications
                </v-col>
                <v-col cols="3" class="p-12">
                  Category, Expiry, etc
                  <v-icon>
                    mdi-chevron-right
                  </v-icon>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="12" class="fw-900">
                   Description
                </v-col>
            </v-row>

            <v-row v-for="n in 3" :key="n">
                <v-img
                    :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
                    :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
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
            </v-row>

          
        </v-container>
        
    </v-window-item>

    <v-window-item :value="10" key="sub10">
      
        <v-container>
           
            <v-row>
                <v-card class="m-0-p-0" max-width="600" flat>
                    <v-container>
                        <v-row>
                            <v-card class="pa-4" flat width="600" img="https://cdn.vuetifyjs.com/images/toolbar/map.jpg">
                                    <v-text-field
                                    style="padding-right: -2rem; margin-right: -2rem;"
                                    label="Search"
                                    density="compact"
                                    prepend-icon="mdi-chevron-left"
                                    @click:prepend="tab = 1; searchText = ''"
                                    v-model="searchText"
                                    variant="outlined"
                                    >
                                    <template v-slot:append>
                                        <div class="search-button">
                                        <v-btn @click="fullWordSearch()" class="button-font-size">Search</v-btn>
                                        </div>
                                    </template>
                                    </v-text-field>
                                </v-card>
                        </v-row>
                    </v-container>
                </v-card>

                <v-card class="" width="580" style="margin-top: -2.1rem; padding-top: -2.1rem;" flat>
                    <v-row>
                            <v-col cols="2" >
                                <v-btn variant="text" style="font-size: 8px;">Best Match</v-btn>
                            </v-col>

                            <v-col cols="2">
                                <v-btn variant="text" style="font-size: 8px;">Top Sales</v-btn>
                            </v-col>

                            <v-col cols="2">
                                <v-btn variant="text" style="font-size: 8px;">Price
                                <v-icon><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(-90 12 12)"><path fill="currentColor" d="m14.6 16.6l4.6-4.6l-4.6-4.6L16 6l6 6l-6 6l-1.4-1.4m-5.2 0L4.8 12l4.6-4.6L8 6l-6 6l6 6l1.4-1.4Z"/></g></svg></v-icon></v-btn>
                              
                              
                            </v-col>
                            <v-col cols="2"></v-col> <v-col cols="2"></v-col>

                            <v-col cols="2">
                                <v-btn variant="text" style="font-size: 8px;" @click="toggleFilter"><v-icon>mdi-filter-outline</v-icon> Filters </v-btn>
                            </v-col>
                        </v-row>
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
                                                <v-icon size="10"> mdi-currency-php</v-icon> {{ item.item_amount }}.00 
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
                    </v-card>
            </v-row>
               
        </v-container>
        
    </v-window-item>

    <v-window-item :value="11" key="sub11">
        <v-container :style="{ position: containerPosition }">
            <v-row>
            <v-card class="sub11-searchfield" width="600" flat>
                <v-text-field
                label="Search"
                prepend-icon="mdi-chevron-left"
                @click:prepend="tab = 8;"
                v-model="searchText"
                density="compact"
                variant="outlined"
                >
                <template v-slot:append>
                    <div class="sub11-search-button">
                    <v-btn @click="" class="button-font-size">Search</v-btn>
                    </div>
                </template>
                </v-text-field>
            </v-card>
            </v-row>
           <v-row >
               <v-card width="600" style="padding-top: -1rem;margin-top: -1rem;" flat>
                <v-row class="mt-0-pt-0">
                    <v-col cols="2" >
                        <v-btn variant="text" style="font-size: 8px;">Best Match</v-btn>
                    </v-col>

                    <v-col cols="2">
                        <v-btn variant="text" style="font-size: 8px;">Top Sales</v-btn>
                    </v-col>

                    <v-col cols="2">
                        <v-btn variant="text" style="font-size: 8px;" @click="priceSortFilteredBasketItems">Price
                        <v-icon><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(-90 12 12)"><path fill="currentColor" d="m14.6 16.6l4.6-4.6l-4.6-4.6L16 6l6 6l-6 6l-1.4-1.4m-5.2 0L4.8 12l4.6-4.6L8 6l-6 6l6 6l1.4-1.4Z"/></g></svg></v-icon></v-btn>
                        
                        
                    </v-col>
                    <v-col cols="2"></v-col> <v-col cols="2"></v-col>

                    <v-col cols="2">
                        <v-btn variant="text" style="font-size: 8px;" @click="toggleFilter"><v-icon>mdi-filter-outline</v-icon> Filter </v-btn>
                    </v-col>
                </v-row>
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
                                    <v-icon size="10"> mdi-currency-php</v-icon> {{ item.item_amount }}.00 
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
        bookmarkIcon: "mdi-bookmark-outline",
        addToCartDrawer: false,
        group: null,
        containerPosition: 'static', 
        selectedLocation: null,
        selectedRate: null,
        minItemAmount: 0,
        maxItemAmount: 0,
        searchText: '',
        typing: false,
        drawer: false,
        basket_items: [],
        // basket_items: [
        // {
        //     basket_item_name: 'Item 1',
        //     item_amount: 100,
        //     rate: '1',
        //     numberOfReview: '120',
        //     sold: '41',
        //     location: 'Baguio',
        //   },
        //   {
        //     basket_item_name: 'Item 11',
        //     item_amount: 1100,
        //     rate: '1',
        //     numberOfReview: '120',
        //     sold: '41',
        //     location: 'Baguio',
        //   },
        //   {
        //     basket_item_name: 'Item 2',
        //     item_amount: 200,
        //     numberOfReview: '89',
        //     rate: '2',
        //     sold: '29',
        //     location: 'Davao',
        //   },
        //   {
        //     basket_item_name: 'Item 22',
        //     item_amount: 2200,
        //     numberOfReview: '89',
        //     rate: '2',
        //     sold: '29',
        //     location: 'Davao',
        //   },
        //   {
        //     basket_item_name: 'Item 3',
        //     item_amount: `300`,
        //     rate: '3',
        //     numberOfReview: 30,
        //     sold: '11',
        //     location: 'Benguet',
        //   },
        //   {
        //     basket_item_name: 'Item 33',
        //     item_amount: 3300,
        //     rate: '3',
        //     numberOfReview: '30',
        //     sold: '11',
        //     location: 'Benguet',
        //   },
        // ],
        snackbar: false,
        item_details: [],
        selectedItemName : '',
        selectedItemPrice : '',
        selectedItemRate : '',
        selectedItemSold : '',
        selectedItemQuantity : 1,
        selectedItemNOR : '',
        show: false,
        productShow: false,
        rating: 3,

        // page tab
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
      watch: {
        group() {
            this.drawer = false;
        },
        },
      created(){
        this.fetchBasketItems();
         // fetch logged in user data
         this.customer_data = localStorage.getItem('user_data');
            if (this.customer_data) {
            this.customerData = JSON.parse(this.customer_data);
            console.log(this.customerData);
            }
        },
      mounted() {
            if (this.tab === 8) {
                this.$nextTick(() => this.$refs.searchField.focus())
            }
        },
        computed: {
            filteredBasketItems() {
            const searchTextLower = this.searchText.toLowerCase();
            return this.basket_items.filter(item => {
                const nameMatches = item.basket_item_name && item.basket_item_name.toLowerCase().includes(searchTextLower);
                const amountInRange = (!this.minItemAmount || item.item_amount >= this.minItemAmount) &&
                                    (!this.maxItemAmount || item.item_amount <= this.maxItemAmount);
                const locationMatches = !this.selectedLocation || item.location === this.selectedLocation;
                const rateMatches = !this.selectedRate || parseInt(item.rate) === parseInt(this.selectedRate); // Convert both to integers for comparison

                return nameMatches && amountInRange && locationMatches && rateMatches;
            });
        },
        },
      methods: {
        toggleBookmark() {
        if (this.bookmarkIcon === "mdi-bookmark-outline") {
            this.bookmarkIcon = "mdi-bookmark"; 
        } else {
            this.bookmarkIcon = "mdi-bookmark-outline"; 
        }
        },
        incrementQuantity(selectedItemQuantity) {
            this.selectedItemQuantity = parseInt(selectedItemQuantity) + 1;
            // this.updateItemAmount(item);
        },

        decrementQuantity(selectedItemQuantity) {
            if (parseInt(selectedItemQuantity) > 1) {
                this.selectedItemQuantity = (parseInt(selectedItemQuantity) - 1);
            // this.updateItemAmount(item);
            }
        },
        fetchBasketItems(){
            this.$axios.get('/Basket_Items/index')
                .then((response) => {
                this.basket_items = response.data;
                })
                .catch((error) => {
                });
        },
        
        priceSortFilteredBasketItems() {
            this.filteredBasketItems.sort((a, b) => {
            const amountA = parseInt(a.item_amount);
            const amountB = parseInt(b.item_amount);
            if (amountA < amountB) {
                return -1;
            }
            if (amountA > amountB) {
                return 1;
            }
            return 0;
            });

            // Trigger a re-render
            this.$forceUpdate();
            console.log(this.filteredBasketItems);
        },
        fullWordSearch() {
      
        },
        toggleFilter() {
            this.drawer = !this.drawer;
            },

        resetFilters() {
            this.minItemAmount = null; // Reset min item amount
            this.maxItemAmount = null; // Reset max item amount
            this.selectedLocation = null; // Reset selected location
            this.selectedRate = null; // Reset selected location
            this.drawer = false;
        },
        selectLocation(location) {
            this.selectedLocation = this.selectedLocation === location ? null : location;
        },
        selectRating(rate) {
            this.selectedRate = this.selectedRate === rate ? null : rate;
        },
        filterSearch(){
            this.tab = 11;
            console.log(this.searchText);
        },
        addNewItemToCart(selectedItemName, selectedItemPrice) {
            // this.snackbar = true;
            this.selectedItemName = selectedItemName;
            this.selectedItemPrice = selectedItemPrice;
            this.addToCartDrawer = !this.addToCartDrawer;
            // Construct the data to send
            const dataToSend = {
            selectedItemName: this.selectedItemName,
            selectedItemPrice: this.selectedItemPrice,
            customerData: this.customerData  // Include the customer data
            };
        },
        saveItemToCart(){
            console.log(this.selectedItemName);
            console.log(this.selectedItemPrice);
            console.log(this.selectedItemQuantity);
            const dataToSend = {
            selectedItemName: this.selectedItemName,
            selectedItemPrice: this.selectedItemPrice,
            selectedItemQuantity: this.selectedItemQuantity,
            customerData: this.customerData  
            };
             axios.post('/Cart/cart-store', dataToSend)
            .then(response => {
                console.log('Item added to cart:', response.data);
            })
            .catch(error => {
                console.error('Error adding item to cart:', error);
            });
        },

        reloadPage() {
        window.location.reload(); 
        },
        handleSearchInput() {
        this.typing = true; 
        console.log('Search Text:', this.searchText);
        },
      
        search() {
        this.typing = false; 
        },  
        activateTab(tabNumber, itemId) {
            this.searchedItem = itemId;
            this.tab = tabNumber;
            console.log("tab:", this.tab);
            console.log("search text:",this.searchedItem);
        },
        itemDetails(tabNumber, selectedItem) {
            this.tab = tabNumber;

            this.selectedItemName = selectedItem.basket_item_name;
            this.selectedItemRate = selectedItem.rate;
            this.selectedItemPrice = selectedItem.item_amount;
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
   @media only screen and (max-width: 600px) {
    .link-text{
        color: blue;
        font-size: 14px;
    }
    .gradient-button {
        background: linear-gradient(to bottom, #4CAF50, #388E3C);
        color: white; 
        }
    .ta-center{
        text-align:center;
    }
    .ta-left{
        text-align:left;
    }
    .fw-900{
        font-weight: 900;
    }
    .p-12{
        font-size: 12px;
    }
    .bottom-navigation-sheet {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: white;
        z-index: 1000;
        transform: translateY(0); /* Initial position */
        transition: transform 0.3s ease-in-out; /* Smooth transition effect */
        }
    .sub11-search-button{
        width: 70px;
        position: absolute;
        top: 79%;
        right: 20px;
        height: 50px;
        transform: translateY(-80%);
    }
    .sub8-search-button{
        width: 70px;
        position: absolute;
        top: 60%;
        right: 34px;
        height: 50px;
        transform: translateY(-80%);
    }
    .button-font-size{
        font-size: 8px;
    }
    .font-size-10{
        font-size: 10px;
    }
    .text-link{
        cursor:pointer;
        color:blue;
        text-decoration:underline;
      }
    .mt-0-pt-0{
        padding-top: -1rem;
        margin-top: -1rem;
    }
    .sub1-search-button{
        width: 70px;
        position: absolute;
        top: 80%;
        right: 20px;
        height: 50px;
        transform: translateY(-80%);
    }
    .sub1-searchfield{
        padding-top: 2.5rem;
        padding-left: 1rem;
    }
    .sub11-searchfield{
        padding-top: 2rem;
        padding-right: -1rem;
        margin-top: -2rem;
        margin-right: -1rem;
    }
   .m-0-p-0{
    margin-bottom: 0;
    padding-bottom: 0;
   }
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
          padding-top: 1rem;
          margin: 0;
          box-sizing: border-box;
          
        }
        .ta-right{
            text-align: right;
        }
        .p-16{
            font-size: 16px;
        }
        .p-14{
            font-size: 14px;
        }
        .p-10{
            font-size: 10px;  
        }
        .minmaxtf{
            width: 100;
            height: 20;
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
            top: 60%;
            right: 5px;
            height: 50px;
            transform: translateY(-80%);
            }
            .sub10-textfield{
                height: 50px;
            }
       
    .user-account-top-nav{
        background-color: #40792d;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        color: white;
      }
      .pb-2{
        padding-bottom: 2rem;
      }
  
     
     
   }
  
  
  </style>
  