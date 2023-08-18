<template>
    <v-container class="order-history-body">
       <v-card width="600" style="padding-top: 2rem;">
        <v-container>
            <v-row >
       
                <v-tabs v-model="tab" align-tabs="center" width="600">

                <v-tab :value="1">All</v-tab>
                <v-tab :value="2">To Pay</v-tab>
                <v-tab :value="3">To Ship</v-tab>
                <v-tab :value="4">To Receive</v-tab>
                <v-tab :value="5">Delivered</v-tab>
                
                </v-tabs>
                
            </v-row>
        </v-container>


       </v-card>
      
        <v-window v-model="tab" :touch="{left: null, right: null}">
            <v-window-item :value="1" key="sub2" class="padding-top">
            <v-card max-width="600" flat class="user-account-top-nav" height="60">
                    <v-container>
                        <v-row>
                            <v-col style="padding-top: 1rem;">
                                <router-link to="/user-account" v-slot="{ navigate }" custom>
                                    <v-icon @click="navigate">
                                        mdi-menu-left
                                    </v-icon>
                                        Orders
                                </router-link>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
            <v-row v-for="n in 12" :key="n" justify="space-around">
                <v-card class="margin-1" width="580">
                    <v-container>
                        <v-row>
                            <v-col cols="1" class="padding-1">
                                <v-icon>
                                    mdi-truck-fast
                                </v-icon>
                            </v-col>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                                <v-col cols="9" @click="navigate">
                            
                                    <v-card-text class="break-line">
                                        Jul 2 Delivered <br>
                                        Your Package Was Delivered! 
                                    </v-card-text>
                            
                                
                                </v-col>
                            </router-link>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                            <v-col cols="2" class="padding-1">
                                <v-icon @click="navigate">
                                    mdi-chevron-right
                                </v-icon>
                            </v-col>
                            </router-link>
                        </v-row>

                        <v-row>
                            <v-col cols="4">
                                <v-img cover aspect-ratio="1"  :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"></v-img>
                            </v-col>
                            <v-col cols="8" @click="tab = 6">
                                <v-card-text>
                                    Product Name | Product Details here
                                </v-card-text>
                                <v-card-text>
                                    Product Category here
                                </v-card-text>
                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            Product Price here
                                        </v-col>
                                        <v-col>
                                            Product Quantity here
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>

                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            
                                        </v-col>
                                        <v-col>
                                            Total: PHP 0.00
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-container>
                                <v-row>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn> More </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn variant="outlined" color="green" class="test"> Buy Again </v-btn>
                                            <v-btn variant="outlined" color="green" class="test" @click="tab = 7"> Edit Review </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-row>
                    </v-container>
                </v-card>
           
            </v-row>
        </v-window-item>
        <v-window-item :value="2" key="sub2">

            <v-row v-for="n in 12" :key="n" justify="space-around">
                <v-card class="margin-1" width="580">
                    <v-container>
                        <v-row>
                            <v-col cols="1" class="padding-1">
                                <v-icon>
                                    mdi-truck-fast
                                </v-icon>
                            </v-col>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                                <v-col cols="9" @click="navigate">
                            
                                    <v-card-text class="break-line">
                                        Jul 2 Delivered <br>
                                        Your Package Was Delivered! 
                                    </v-card-text>
                            
                                
                                </v-col>
                            </router-link>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                            <v-col cols="2" class="padding-1">
                                <v-icon @click="navigate">
                                    mdi-chevron-right
                                </v-icon>
                            </v-col>
                            </router-link>
                        </v-row>

                        <v-row>
                            <v-col cols="4">
                                <v-img cover aspect-ratio="1"  :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"></v-img>
                            </v-col>
                            <v-col cols="8" @click="tab = 6">
                                <v-card-text>
                                    Product Name | Product Details here
                                </v-card-text>
                                <v-card-text>
                                    Product Category here
                                </v-card-text>
                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            Product Price here
                                        </v-col>
                                        <v-col>
                                            Product Quantity here
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>

                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            
                                        </v-col>
                                        <v-col>
                                            Total: PHP 0.00
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-container>
                                <v-row>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn> More </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn variant="outlined" color="green" class="test"> Buy Again </v-btn>
                                            <v-btn variant="outlined" color="green" class="test" @click="tab = 7"> Edit Review </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-row>
                    </v-container>
                </v-card>
           
            </v-row>
        </v-window-item>

        <v-window-item :value="3" key="sub3">
            <v-row v-for="n in 12" :key="n" justify="space-around">
                <v-card class="margin-1" width="580">
                    <v-container>
                        <v-row>
                            <v-col cols="1" class="padding-1">
                                <v-icon>
                                    mdi-truck-fast
                                </v-icon>
                            </v-col>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                                <v-col cols="9" @click="navigate">
                            
                                    <v-card-text class="break-line">
                                        Jul 2 Delivered <br>
                                        Your Package Was Delivered! 
                                    </v-card-text>
                            
                                
                                </v-col>
                            </router-link>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                            <v-col cols="2" class="padding-1">
                                <v-icon @click="navigate">
                                    mdi-chevron-right
                                </v-icon>
                            </v-col>
                            </router-link>
                        </v-row>

                        <v-row>
                            <v-col cols="4">
                                <v-img cover aspect-ratio="1"  :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"></v-img>
                            </v-col>
                            <v-col cols="8" @click="tab = 6">
                                <v-card-text>
                                    Product Name | Product Details here
                                </v-card-text>
                                <v-card-text>
                                    Product Category here
                                </v-card-text>
                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            Product Price here
                                        </v-col>
                                        <v-col>
                                            Product Quantity here
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>

                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            
                                        </v-col>
                                        <v-col>
                                            Total: PHP 0.00
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-container>
                                <v-row>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn> More </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn variant="outlined" color="green" class="test"> Buy Again </v-btn>
                                            <v-btn variant="outlined" color="green" class="test" @click="tab = 7"> Edit Review </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-row>
                    </v-container>
                </v-card>
           
            </v-row>

        </v-window-item>
        <v-window-item :value="4" key="sub4">
            <v-row v-for="n in 12" :key="n" justify="space-around">
                <v-card class="margin-1" width="580">
                    <v-container>
                        <v-row>
                            <v-col cols="1" class="padding-1">
                                <v-icon>
                                    mdi-truck-fast
                                </v-icon>
                            </v-col>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                                <v-col cols="9" @click="navigate">
                            
                                    <v-card-text class="break-line">
                                        Jul 2 Delivered <br>
                                        Your Package Was Delivered! 
                                    </v-card-text>
                            
                                
                                </v-col>
                            </router-link>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                            <v-col cols="2" class="padding-1">
                                <v-icon @click="navigate">
                                    mdi-chevron-right
                                </v-icon>
                            </v-col>
                            </router-link>
                        </v-row>

                        <v-row>
                            <v-col cols="4">
                                <v-img cover aspect-ratio="1"  :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"></v-img>
                            </v-col>
                            <v-col cols="8" @click="tab = 6">
                                <v-card-text>
                                    Product Name | Product Details here
                                </v-card-text>
                                <v-card-text>
                                    Product Category here
                                </v-card-text>
                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            Product Price here
                                        </v-col>
                                        <v-col>
                                            Product Quantity here
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>

                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            
                                        </v-col>
                                        <v-col>
                                            Total: PHP 0.00
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-container>
                                <v-row>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn> More </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn variant="outlined" color="green" class="test"> Buy Again </v-btn>
                                            <v-btn variant="outlined" color="green" class="test" @click="tab = 7"> Edit Review </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-row>
                    </v-container>
                </v-card>
           
            </v-row>

        </v-window-item>
        <v-window-item :value="5" key="sub5">
            <v-row v-for="n in 12" :key="n" justify="space-around">
                <v-card class="margin-1" width="580">
                    <v-container>
                        <v-row>
                            <v-col cols="1" class="padding-1">
                                <v-icon>
                                    mdi-truck-fast
                                </v-icon>
                            </v-col>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                                <v-col cols="9" @click="navigate">
                            
                                    <v-card-text class="break-line">
                                        Jul 2 Delivered <br>
                                        Your Package Was Delivered! 
                                    </v-card-text>
                            
                                
                                </v-col>
                            </router-link>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                            <v-col cols="2" class="padding-1">
                                <v-icon @click="navigate">
                                    mdi-chevron-right
                                </v-icon>
                            </v-col>
                            </router-link>
                        </v-row>

                        <v-row>
                            <v-col cols="4">
                                <v-img cover aspect-ratio="1"  :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"></v-img>
                            </v-col>
                            <v-col cols="8" @click="tab = 6">
                                <v-card-text>
                                    Product Name | Product Details here
                                </v-card-text>
                                <v-card-text>
                                    Product Category here
                                </v-card-text>
                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            Product Price here
                                        </v-col>
                                        <v-col>
                                            Product Quantity here
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>

                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            
                                        </v-col>
                                        <v-col>
                                            Total: PHP 0.00
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>
                            </v-col>
                        </v-row>

                        <v-row>
                            <v-container>
                                <v-row>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn> More </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn variant="outlined" color="green" class="test"> Buy Again </v-btn>
                                            <v-btn variant="outlined" color="green" class="test" @click="tab = 7"> Edit Review </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-row>
                    </v-container>
                </v-card>
           
            </v-row>
        </v-window-item>


      <v-window-item :value="6" key="sub2">
        <v-row justify="space-around">
          <v-card class="margin-1" variant="outlined">
            <v-card-actions>
                <v-btn icon="mdi-chevron-left" @click="tab = 1"> </v-btn>
                Order Details
            </v-card-actions>
              <v-card-text>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea provident ad nesciunt accusantium? Amet aspernatur libero assumenda sunt dolores! Sequi ducimus magni repellat fugit sit vitae assumenda ipsum adipisci recusandae?
              </v-card-text>

              <v-card-text>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea provident ad nesciunt accusantium? Amet aspernatur libero assumenda sunt dolores! Sequi ducimus magni repellat fugit sit vitae assumenda ipsum adipisci recusandae?
              </v-card-text>

              <v-card-text>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea provident ad nesciunt accusantium? Amet aspernatur libero assumenda sunt dolores! Sequi ducimus magni repellat fugit sit vitae assumenda ipsum adipisci recusandae?
              </v-card-text>


          </v-card>

          <v-card class="margin-1" width="580" @click="tab = 6">
                    <v-container>
                        <v-row>
                            <v-col cols="4">
                                <v-img cover aspect-ratio="1"  :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"></v-img>
                            </v-col>
                            <v-col cols="8">
                                <v-card-text>
                                    Product Name | Product Details here
                                </v-card-text>
                                <v-card-text>
                                    Product Category here
                                </v-card-text>
                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            Product Price here
                                        </v-col>
                                        <v-col>
                                            Product Quantity here
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>

                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            
                                        </v-col>
                                        <v-col>
                                            Total: PHP 0.00
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-container>
                                <v-row>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn> More </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                    <v-col>
                                        <v-card-actions>
                                            <v-btn variant="outlined" color="green" class="test"> Buy Again </v-btn>
                                            <v-btn variant="outlined" color="green" class="test" @click="tab = 7"> Edit Review </v-btn>
                                        </v-card-actions>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-row>
                    </v-container>
                </v-card>
          
          </v-row>
    </v-window-item>
    <v-window-item :value="7" key="sub7">
        <v-row justify="space-around">
          <v-card class="margin-1" width="600">
            <v-card-actions>
                <v-btn icon="mdi-chevron-left" @click="tab = 1"> </v-btn>
                Write Review
            </v-card-actions>
          </v-card>
            <v-card class="margin-1" width="600" height="70" @click="tab = 6">
                <v-container>
                    <v-row>
                        <v-col cols="4">
                            <v-img cover aspect-ratio="1"  :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"></v-img>
                        </v-col>
                        <v-col cols="8">
                            <v-card-text>
                                Product Name | Product Details here
                            </v-card-text>
                        
                        </v-col>
                    </v-row>
                    
                </v-container>
            </v-card>

            <v-card class="mx-auto" width="600">
                <v-card-actions>
                <v-container>
                    <v-row>
                    <v-col cols="3"> Over All Rating </v-col>
                    <v-col cols="8">
                        <div class="text-center">
                        <v-rating
                            v-model="rating"
                            bg-color="orange-lighten-1"
                            color="blue"
                        ></v-rating>
                        </div>
                    </v-col>
                    <v-col cols="1">
                        <v-btn
                        :icon="show ? 'mdi-chevron-up' : 'mdi-chevron-down'"
                        @click="show = !show"
                        ></v-btn>
                    </v-col>
                    </v-row>
                </v-container>
                </v-card-actions>

                <v-expand-transition>
                <div v-show="show">
                    <v-container class="expanded-rating-card">
                    <v-row>
                        <v-col cols="1"></v-col>
                        <v-col cols="3" class="padding-left-point-5rem"> Product Quality </v-col>
                        <v-col cols="8">
                        <div class="text-center">
                            <v-rating
                            v-model="rating"
                            bg-color="orange-lighten-1"
                            color="blue"
                            ></v-rating>
                        </div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="1"></v-col>
                        <v-col cols="3 " class="padding-left-point-5rem"> Seller Service </v-col>
                        <v-col cols="8">
                        <div class="text-center">
                            <v-rating
                            v-model="rating"
                            bg-color="orange-lighten-1"
                            color="blue"
                            ></v-rating>
                        </div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="1"></v-col>
                        <v-col cols="3" class="padding-left-point-5rem"> Shipping Service </v-col>
                        <v-col cols="8">
                        <div class="text-center">
                            <v-rating
                            v-model="rating"
                            bg-color="orange-lighten-1"
                            color="blue"
                            ></v-rating>
                        </div>
                        </v-col>
                    </v-row>
                    </v-container>
                </div>
                </v-expand-transition>
            </v-card>

            <v-card class="mx-auto" width="600">
                <v-card-actions>
                <v-container>
                    <v-row>
                    <v-col cols="3"> Product Rating </v-col>
                    <v-col cols="8">
                        <div class="text-center">
                        <v-rating
                            v-model="rating"
                            bg-color="orange-lighten-1"
                            color="blue"
                        ></v-rating>
                        </div>
                    </v-col>
                    <v-col cols="1">
                        <v-btn
                        :icon="productShow ? 'mdi-chevron-up' : 'mdi-chevron-down'"
                        @click="productShow = !productShow"
                        ></v-btn>
                    </v-col>
                    </v-row>
                </v-container>
                </v-card-actions>

                <v-expand-transition>
                <div v-show="productShow">
                    <v-container class="expanded-rating-card">
                    <v-row>
                        <v-col cols="1"></v-col>
                        <v-col cols="3" class="padding-left-point-5rem"> Veg 1 </v-col>
                        <v-col cols="8">
                        <div class="text-center">
                            <v-rating
                            v-model="rating"
                            bg-color="orange-lighten-1"
                            color="blue"
                            ></v-rating>
                        </div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="1"></v-col>
                        <v-col cols="3 " class="padding-left-point-5rem"> Veg 2</v-col>
                        <v-col cols="8">
                        <div class="text-center">
                            <v-rating
                            v-model="rating"
                            bg-color="orange-lighten-1"
                            color="blue"
                            ></v-rating>
                        </div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="1"></v-col>
                        <v-col cols="3" class="padding-left-point-5rem"> Veg 3 </v-col>
                        <v-col cols="8">
                        <div class="text-center">
                            <v-rating
                            v-model="rating"
                            bg-color="orange-lighten-1"
                            color="blue"
                            ></v-rating>
                        </div>
                        </v-col>
                    </v-row>
                    </v-container>
                </div>
                </v-expand-transition>
            </v-card>
            <v-card class="margin-1" width="600">
                <v-container>
                    <v-row>
                        <v-col cols="12" width="600">
                            <v-textarea 
                            clearable
                            clear-icon="mdi-close-circle"
                            label="What do you think of the product?" variant="outlined">
                        </v-textarea>
                           
  
                        </v-col>
                    </v-row>
                    
                </v-container>
            </v-card>
          </v-row>
          <v-row>
            <v-btn block height="100">
                Submit

            </v-btn>
          </v-row>
    </v-window-item>
    </v-window>
    </v-container>
    
  </template>
  
  <script>
    export default {
      data: () => ({
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
  
  
      methods: {
       
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
          .order-history-body{
          padding: 0;
          padding-right: 2rem;
          margin: 0;
          box-sizing: border-box;
          
      }
      .all-orders-card{
        padding-left: 1rem;
      }
      .padding-left-point-5rem{
        margin-left: 1rem;
      }
      /* .expanded-rating-card{
        font-size: 12px;
      } */
      .v-col {
         padding: 0;
         margin: 0;
      }
      .padding-1{
        padding: 1rem;
      }
      
      .margin-1{
          margin: .5rem;
      }
      .pd-left-1{
        padding-left: 1rem;
      }
      .break-line {
        white-space: pre-line;
        }
        .btn-font-size{
           font-size:10px;
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
      .padding-top{
        padding-top: 5rem;
      }
  
     
   }
  
  
  </style>