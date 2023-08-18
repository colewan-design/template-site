<template>
     <div>
    <div>
    <v-container class="order-history-body">
      
        <v-window v-model="tab" :touch="{left: null, right: null}">
            <v-window-item :value="1" key="sub1" class="window-item-1">
                <v-sheet
                class="bottom-navigation-sheet"
                elevation="4"
                height="130"
                rounded
                max-width="600"
                width="100%"
                >
                <v-container>
                    <v-row>
                        <v-col cols="3" style="padding-left: 1rem;">
                            <v-checkbox v-model="selectAll" @change="handleSelectAll"> All</v-checkbox>
                        </v-col>
                        <v-col cols="6" style="padding-top: 1rem; color: red;">
                            <div>SubTotal: <v-icon>mdi-currency-php</v-icon>{{ calculateTotalAmount() }}.00</div>
                        </v-col>
                        <v-col cols="3" style="padding-right: 1rem;padding-top: .5rem;">
                            <v-btn @click="activateTab(2)" class="gradient-button">   Checkout({{ this.checkout_items.length }}) </v-btn>
                            <v-snackbar v-model="snackbar">
                            {{ text }}

                            <template v-slot:actions>
                                <v-btn color="pink" variant="text" @click="snackbar = false">
                                Close
                                </v-btn>
                            </template>
                            </v-snackbar>
                        </v-col>
                    </v-row>
                </v-container>
                    
                </v-sheet>

                <v-card max-width="600" flat class="user-account-top-nav" height="60">
                    <v-container>
                        <v-row>
                            <v-col style="padding-top: 1rem;">
                                <router-link to="/user-account" v-slot="{ navigate }" custom>
                                    <v-icon @click="navigate">
                                        mdi-menu-left
                                    </v-icon>
                                        Shopping Cart
                                </router-link>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
                
                <v-row v-for="(item, index) in cart_items" :key="item.id">
                <v-col>
                    <v-card class="margin-1" max-width="600" variant="toned">
                    <v-container>
                        <v-row>
                            <v-col cols="1" class="padding-1">
                            <input
                                type="checkbox"
                                :value="index"
                                v-model="item.isChecked"
                                @change="checkedCartItem(item)"
                            >
                            </v-col>
                            <v-col cols="3" >
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
                            </v-col>
                            <v-col cols="8">
                                <v-card-text class="fw-900">
                                    {{item.item_name}}
                                </v-card-text>
                                <v-card-text>
                                    Product Category here
                                </v-card-text>
                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col class="color-green fw-900">
                                            <v-icon size="15">mdi-currency-php</v-icon> {{ item.item_amount}}.00
                                        </v-col>
                                        <v-col>
                                           <v-container>
                                            <v-row>
                                                <v-col cols="2">
                                                    <v-icon size="12" @click="decrementQuantity(item)">mdi-minus</v-icon>
                                                    
                                                </v-col>
                                                <v-col cols="2">
                                                    {{ item.item_quantity }}
                                                </v-col>
                                                <v-col cols="2">
                                                    <v-icon size="12" @click="incrementQuantity(item)" >mdi-plus</v-icon>
                                                </v-col>
                                            </v-row>
                                           </v-container>
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>

                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
                </v-col>
           
            </v-row>
          
        </v-window-item>
        <v-window-item :value="2" key="sub2" class="window-item-2">
            <v-sheet
                class="bottom-navigation-sheet"
                elevation="4"
                height="130"
                rounded
                max-width="600"
                width="100%"
                >
                <v-container>
                    <v-row>
                        <v-col cols="6" style="padding-top: .75rem;">
                                <v-icon @click="tab = 1">
                                    mdi-menu-left
                                </v-icon>
                                <v-icon>
                                        mdi-cart
                                </v-icon>
                          
                        </v-col>
                        <v-col cols="3" style="padding-top: 1rem;">
                            <div>Total: <v-icon size="20">mdi-currency-php</v-icon>{{ calculateTotalAmount() }}.00</div>
                        </v-col>
                        <v-col cols="3" style="padding-right: 1rem;padding-top: .75rem;">
                            <v-snackbar :timeout="2000" top>
                                <template v-slot:activator="{ props }">
                                    <v-btn @click="placeOrder(2)" v-bind="props" class="gradient-button">
                                        Place Order
                                    </v-btn>
                                </template>
                                Added to cart successfully! 
                            </v-snackbar>
                        </v-col>
                    </v-row>
                </v-container>
                    
                </v-sheet>
                <v-card max-width="600" flat class="user-account-top-nav" height="60">
                    <v-container>
                        <v-row>
                            <v-col style="padding-top: 1rem;">
                               
                                    <v-icon @click="tab = 1">
                                        mdi-menu-left
                                    </v-icon>
                                        Checkout
                              
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
                <v-card>
                    <v-container>
                        <v-row>
                            <v-col cols="1">
                                <v-img>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 64 64">
                                    <path fill="#fff7f0" d="M57,28.33V51a6,6,0,0,1-6,6H13a6,6,0,0,1-6-6V13a6,6,0,0,1,6-6H39.23"></path><path fill="#72caaf" d="M7,51V13a6,6,0,0,1,6-6H39.23L39,19Z"></path><path fill="#f9e3ae" d="M13,57,9,56,7.17,52.17C7.17,48.85,42.5,16,42.5,16l.21,11.54Z"></path><path fill="#97e0bb" d="M57,7H12c-.55,0-4,2.45-4,3H8a4,4,0,0,0,4,4H58a4,4,0,0,0,4-4h0C62,9.45,57.55,7,57,7Z"></path><path fill="#faefde" d="M36.6,33.6,57,54c0-3.31.52-26.84.52-26.84l-14.79.41Z"></path><path fill="#85cbf8" d="M13 57L50 57 31.45 38.71 13 57z"></path><path fill="#ed7899" d="M37,14.28a13,13,0,0,1,26,0c0,9.39-11.56,17.33-13,28.84C48.56,31.62,37,23.67,37,14.28Z"></path><path fill="#f9dd8f" d="M50 9A5 5 0 1 0 50 19A5 5 0 1 0 50 9Z"></path><path fill="#8d6c9f" d="M17 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 17 16zM12 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 12 16zM32 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 32 16zM22 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 22 16zM27 16a1 1 0 0 0 1-1V13a1 1 0 0 0-2 0v2A1 1 0 0 0 27 16z"></path><path fill="#8d6c9f" d="M64,14.28A14,14,0,0,0,38.74,6H13a7,7,0,0,0-7,7V51c0,.12,0,.23,0,.35a1,1,0,0,0,0,.25A7,7,0,0,0,12.4,58a1,1,0,0,0,.16,0l.09,0L13,58H51a7,7,0,0,0,7-7V28.33s0,0,0,0C61.1,23.63,64,19.22,64,14.28Zm-14-12a12,12,0,0,1,12,12c0,4.4-2.82,8.62-5.8,13.09-2.38,3.56-4.81,7.21-6.2,11.34-1.38-4.13-3.82-7.78-6.2-11.34-3-4.47-5.8-8.69-5.8-13.09A12,12,0,0,1,50,2.28ZM13,8H37.51A13.89,13.89,0,0,0,36,14.28a15,15,0,0,0,1.18,5.6l-.1.06L8,49V13A5,5,0,0,1,13,8ZM8.08,51.78l30-30A52.77,52.77,0,0,0,41.15,27L12.22,55.92A5,5,0,0,1,8.08,51.78Zm23.14-12L47.47,56H15ZM51,56h-.7L32.64,38.33l3.64-3.64L40.54,39A1,1,0,0,0,42,37.54l-4.26-4.26,4.59-4.59c3,4.48,6,9.13,6.73,14.56a1,1,0,0,0,2,0c.55-4.38,2.65-8.25,5-11.94V51a4.9,4.9,0,0,1-.05.53l-4.37-4.37a1,1,0,0,0-1.41,1.41l5.07,5.07A5,5,0,0,1,51,56Z"></path><path fill="#8d6c9f" d="M50 12A2 2 0 1 0 50 16A2 2 0 1 0 50 12Z"></path><path fill="#8d6c9f" d="M50,20a6,6,0,0,0,6-6,1,1,0,0,0-2,0,4,4,0,1,1-5.2-3.82,1,1,0,1,0-.6-1.91A6,6,0,0,0,50,20Z"></path><path fill="#8d6c9f" d="M51.48 10.28a4 4 0 0 1 1.45 1 1 1 0 1 0 1.46-1.36 6 6 0 0 0-2.17-1.48 1 1 0 1 0-.74 1.86zM44.89 40.48a1 1 0 0 0-1.41 1.41l1.85 1.85a1 1 0 0 0 1.41-1.41z"></path><path fill="#faefde" d="M18,30a6,6,0,0,0,6-6,1,1,0,0,0-1-1H19.25a1,1,0,0,0,0,2h2.62a4,4,0,1,1-2-4.52,1,1,0,1,0,1-1.76A6,6,0,1,0,18,30Z"></path>
                                    </svg>
                                </v-img>
                            </v-col>
                            <v-col  cols="11">
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" >
                                            <span class="fw-900">
                                                {{ customerData.customer_fname }} {{ customerData.customer_lname }}
                                            </span>
                                           
                                            091234567899
                                        </v-col>
                                        
                                    </v-row>
                                    <v-row>
                                        <v-col cols="10" class="p-14">
                                            23 Street, sample village, sample city, sample province
                                        </v-col>
                                       
                                    </v-row>
                                </v-container>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
            <v-row v-for="item in checkout_items" :key="item" justify="space-around">
                <v-card class="margin-1" width="580">
                    <v-container>
                        <v-row>
                            <v-col cols="4">
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
                            </v-col>
                            <v-col cols="8" @click="tab = 6">
                                <v-card-text>
                                    {{ item.item_name}}
                                </v-card-text>
                                <v-card-text>
                                    Product Category here
                                </v-card-text>
                                <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col>
                                            <v-icon>mdi-currency-php</v-icon> {{ item.item_amount}}.00
                                        </v-col>
                                        <v-col>
                                            Qty: {{ item.item_quantity}}
                                        </v-col>
                                </v-row>
                                </v-container>
                                </v-card-text>

                            </v-col>
                        </v-row>
                        <v-row>
                           
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                                <v-col cols="8" @click="navigate">
                                    <v-card-text class="padding-1 break-line p-12">
                                        Delivery Option
                                    </v-card-text>
                                </v-col>
                            </router-link>
                            <router-link to="/track-your-order" v-slot="{ navigate }" custom>
                            <v-col cols="4" class="padding-1 p-12 ta-right text-link">
                                View all options
                                <v-icon @click="navigate">
                                    mdi-chevron-right
                                </v-icon>

                            </v-col>
                            </router-link>
                        </v-row>

                        <v-row>
                            <v-card width="600" variant="outlined">
                              <v-container>
                                <v-row>
                                    <v-col cols="10" class="p-12">
                                    Standard Delivery
                                    </v-col>
                                    <v-col cols="2" class="p-12">
                                        <v-icon>mdi-currency-php</v-icon> 0.00
                                    </v-col>
                                </v-row>
                                <v-row class="p-12">
                                    <v-icon>mdi-truck</v-icon>
                                    Get By 19-24 Aug
                                </v-row>
                              </v-container>
                            </v-card>
                        </v-row>

                    </v-container>
                </v-card>
           
            </v-row>
            <v-card>
               <v-container>
                    <v-row class="padding-b-2">
                        <v-col class="fw-900">
                            Select Payment Method
                        </v-col>
                        <v-col class="ta-right p-14 text-link">
                            View all methods <v-icon> mdi-chevron-right </v-icon>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-card variant="outlined">
                                <v-container>
                                    <v-row class="padding-b-2">
                                        <v-col cols="2" class="ta-center">
                                            <v-icon>
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 100.355 100.352" style="enable-background:new 0 0 100.355 100.352;" xml:space="preserve">
                                            <g>
                                                <path d="M41.346,48.366c-7.64,0-13.855,6.214-13.855,13.852S33.706,76.07,41.346,76.07c7.636,0,13.849-6.214,13.849-13.852
                                                    C55.194,54.58,48.982,48.366,41.346,48.366z M41.346,73.07c-5.986,0-10.855-4.868-10.855-10.852c0-5.983,4.87-10.852,10.855-10.852
                                                    c5.982,0,10.849,4.868,10.849,10.852C52.194,68.202,47.328,73.07,41.346,73.07z"/>
                                                <path d="M12.21,48.366c-0.829,0-1.5,0.671-1.5,1.5V74.57c0,0.829,0.671,1.5,1.5,1.5s1.5-0.671,1.5-1.5V49.866
                                                    C13.71,49.038,13.039,48.366,12.21,48.366z"/>
                                                <path d="M70.008,48.366c-0.829,0-1.5,0.671-1.5,1.5V74.57c0,0.829,0.671,1.5,1.5,1.5s1.5-0.671,1.5-1.5V49.866
                                                    C71.508,49.038,70.836,48.366,70.008,48.366z"/>
                                                <path d="M94.459,22.328h-72.85c-0.829,0-1.5,0.671-1.5,1.5v7.348H13.45c-0.829,0-1.5,0.671-1.5,1.5v8.172H4.586
                                                    c-0.829,0-1.5,0.671-1.5,1.5v39.738c0,0.829,0.671,1.5,1.5,1.5h72.85c0.829,0,1.5-0.671,1.5-1.5v-8.172H86.3
                                                    c0.829,0,1.5-0.671,1.5-1.5v-7.352h6.659c0.829,0,1.5-0.671,1.5-1.5V23.827C95.959,23,95.287,22.328,94.459,22.328z M75.936,80.587
                                                    H6.086V43.849h69.85V80.587z M78.936,70.915V42.349c0-0.829-0.671-1.5-1.5-1.5H14.95v-6.672H84.8v36.738H78.936z M92.959,62.063
                                                    H87.8V32.676c0-0.829-0.671-1.5-1.5-1.5H23.109v-5.848h69.85L92.959,62.063L92.959,62.063z"/>
                                            </g>
                                            </svg>
                                            </v-icon>
                                        </v-col>
                                        <v-col class="fw-900">
                                            Cash On Delivery
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col class="p-12">
                                            Pay when you receive
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card>
                        </v-col>
                        <v-col>
                            <v-card variant="toned">
                                <v-container>
                                    <v-row class="padding-b-2">
                                        <v-col cols="2" class="ta-center">
                                            <v-icon>
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 100 100">
                                                    <path fill="#78a1d1" d="M82.189,26.498c-0.547,0-1.089,0.13-1.59,0.386c-1.718,0.879-2.401,2.992-1.522,4.71	C82.012,37.332,83.5,43.525,83.5,50c0,6.477-1.487,12.669-4.422,18.406c-0.427,0.833-0.503,1.781-0.216,2.67	c0.288,0.89,0.904,1.614,1.736,2.04c0.5,0.256,1.036,0.385,1.592,0.385c1.322,0,2.518-0.73,3.118-1.907	C88.754,64.863,90.5,57.598,90.5,50c0-7.595-1.746-14.86-5.19-21.594c-0.426-0.833-1.15-1.449-2.041-1.737	C82.915,26.555,82.551,26.498,82.189,26.498z"></path><path fill="#4a5397" d="M43,85C23.701,85,8,69.299,8,50s15.701-35,35-35c7.843,0,15.262,2.543,21.454,7.355	c1.744,1.355,2.06,3.869,0.704,5.613c-1.354,1.744-3.868,2.061-5.612,0.705C54.771,24.961,49.049,23,43,23	c-14.888,0-27,12.112-27,27s12.112,27,27,27c6.049,0,11.771-1.961,16.546-5.672c1.745-1.357,4.258-1.04,5.612,0.704	c1.355,1.745,1.041,4.257-0.704,5.613C58.262,82.457,50.844,85,43,85z"></path><path fill="#78a1d1" d="M71.142,33.498c-0.501,0-1.001,0.109-1.47,0.326c-1.751,0.811-2.517,2.896-1.706,4.647	C69.647,42.104,70.5,45.983,70.5,50s-0.853,7.896-2.534,11.53c-0.811,1.751-0.045,3.836,1.706,4.647	c0.466,0.215,0.959,0.324,1.467,0.324c1.36,0,2.608-0.797,3.179-2.031C76.43,59.908,77.5,55.04,77.5,50s-1.07-9.908-3.183-14.47	c-0.392-0.849-1.091-1.493-1.968-1.815C71.956,33.569,71.548,33.498,71.142,33.498z"></path><path fill="#e3e2e3" d="M43,29.5c-11.304,0-20.5,9.196-20.5,20.5S31.696,70.5,43,70.5S63.5,61.304,63.5,50	c0-1.93-1.57-3.5-3.5-3.5H48c-1.93,0-3.5,1.57-3.5,3.5s1.57,3.5,3.5,3.5h8.058l-0.212,0.654C54.034,59.744,48.872,63.5,43,63.5	c-7.444,0-13.5-6.056-13.5-13.5S35.556,36.5,43,36.5c2.86,0,5.604,0.899,7.938,2.601c0.756,0.551,1.681,0.774,2.603,0.631	c0.924-0.144,1.736-0.64,2.287-1.395c1.138-1.56,0.795-3.753-0.765-4.891C51.524,30.864,47.354,29.5,43,29.5z"></path><path fill="#1f212b" d="M82.19,74.001c-0.637,0-1.249-0.148-1.819-0.44c-0.95-0.486-1.655-1.314-1.984-2.331	c-0.328-1.018-0.241-2.102,0.246-3.052C81.53,62.514,83,56.398,83,50c0-6.395-1.47-12.511-4.368-18.179	c-1.004-1.963-0.224-4.378,1.74-5.383c0.95-0.484,2.044-0.571,3.051-0.245c1.017,0.328,1.846,1.033,2.332,1.985	C89.235,34.983,91,42.325,91,50c0,7.679-1.765,15.021-5.246,21.822C85.067,73.166,83.702,74.001,82.19,74.001z M82.189,26.998	c-0.474,0-0.933,0.111-1.362,0.331c-1.473,0.753-2.058,2.564-1.305,4.037C82.493,37.176,84,43.445,84,50	c0,6.558-1.506,12.827-4.477,18.633c-0.366,0.713-0.432,1.526-0.186,2.29c0.247,0.762,0.775,1.383,1.488,1.748	c0.429,0.219,0.888,0.331,1.364,0.331c1.134,0,2.158-0.626,2.673-1.634C88.271,64.707,90,57.519,90,50	c0-7.516-1.728-14.704-5.136-21.366c-0.365-0.713-0.986-1.242-1.749-1.489C82.813,27.047,82.503,26.998,82.189,26.998z"></path><path fill="#1f212b" d="M43,86C23.149,86,7,69.851,7,50s16.149-36,36-36c8.067,0,15.698,2.616,22.067,7.565	c1.055,0.819,1.728,2,1.894,3.326s-0.193,2.636-1.013,3.69c-0.819,1.054-2,1.727-3.325,1.893c-1.327,0.167-2.636-0.194-3.691-1.013	C54.334,25.889,48.825,24,43,24c-14.337,0-26,11.664-26,26s11.663,26,26,26c5.825,0,11.334-1.889,15.933-5.462	c1.055-0.819,2.366-1.181,3.69-1.014c1.325,0.167,2.506,0.839,3.325,1.894s1.179,2.365,1.013,3.69	c-0.166,1.325-0.839,2.506-1.894,3.326C58.698,83.384,51.067,86,43,86z M43,16C24.252,16,9,31.252,9,50s15.252,34,34,34	c7.619,0,14.825-2.471,20.841-7.146c0.633-0.492,1.036-1.2,1.136-1.995c0.1-0.795-0.116-1.582-0.608-2.214	c-0.491-0.633-1.199-1.037-1.994-1.136c-0.793-0.1-1.582,0.116-2.214,0.608C55.207,75.966,49.273,78,43,78	c-15.439,0-28-12.561-28-28s12.561-28,28-28c6.273,0,12.207,2.034,17.159,5.883c0.634,0.492,1.421,0.708,2.214,0.607	c0.796-0.1,1.504-0.503,1.995-1.136c0.492-0.633,0.708-1.419,0.608-2.214c-0.1-0.795-0.503-1.504-1.136-1.996	C57.825,18.471,50.618,16,43,16z"></path><path fill="#1f212b" d="M71.139,67.001c-0.58,0-1.144-0.125-1.676-0.37c-2.002-0.927-2.877-3.31-1.951-5.311	C69.163,57.753,70,53.944,70,50s-0.837-7.753-2.488-11.32c-0.926-2.001-0.051-4.384,1.95-5.311c0.965-0.447,2.063-0.491,3.061-0.125	c1.003,0.369,1.802,1.105,2.249,2.075C76.914,39.947,78,44.886,78,50s-1.086,10.053-3.229,14.68	C74.119,66.09,72.693,67.001,71.139,67.001z M71.142,33.998c-0.435,0-0.858,0.094-1.26,0.279c-1.501,0.695-2.157,2.482-1.462,3.983	C70.132,41.959,71,45.91,71,50s-0.868,8.041-2.58,11.74c-0.695,1.501-0.039,3.288,1.462,3.983c1.472,0.678,3.312-0.012,3.981-1.463	C75.944,59.766,77,54.968,77,50s-1.056-9.766-3.137-14.26c-0.335-0.727-0.935-1.28-1.687-1.556	C71.842,34.06,71.493,33.998,71.142,33.998z"></path><path fill="#1f212b" d="M43,71c-11.579,0-21-9.42-21-21s9.421-21,21-21c4.46,0,8.733,1.397,12.357,4.042	c0.862,0.629,1.428,1.557,1.593,2.614s-0.09,2.114-0.719,2.976c-0.63,0.864-1.559,1.43-2.614,1.595	c-1.059,0.165-2.112-0.092-2.975-0.721C48.396,37.866,45.753,37,43,37c-7.168,0-13,5.832-13,13s5.832,13,13,13	c5.654,0,10.626-3.617,12.37-9H48c-2.206,0-4-1.794-4-4s1.794-4,4-4h12c2.206,0,4,1.794,4,4C64,61.58,54.579,71,43,71z M43,30	c-11.028,0-20,8.972-20,20s8.972,20,20,20s20-8.972,20-20c0-1.654-1.346-3-3-3H48c-1.654,0-3,1.346-3,3s1.346,3,3,3h7.37	c0.319,0,0.622,0.154,0.81,0.413c0.188,0.259,0.24,0.594,0.142,0.897C54.442,60.105,49.089,64,43,64c-7.72,0-14-6.28-14-14	s6.28-14,14-14c2.967,0,5.813,0.933,8.232,2.697c0.646,0.472,1.439,0.667,2.23,0.541c0.792-0.124,1.488-0.548,1.96-1.195	c0.976-1.337,0.682-3.218-0.655-4.193C51.316,31.331,47.247,30,43,30z"></path><path fill="#1f212b" d="M43,60c-0.487,0-1.004-0.044-1.579-0.136c-0.272-0.043-0.458-0.3-0.415-0.572	c0.044-0.273,0.293-0.463,0.573-0.415C42.101,58.959,42.565,59,43,59c0.793,0,1.589-0.108,2.367-0.322	c0.271-0.072,0.541,0.083,0.615,0.35c0.073,0.266-0.084,0.542-0.35,0.614C44.768,59.88,43.882,60,43,60z"></path><path fill="#1f212b" d="M38.5,58.867c-0.08,0-0.162-0.019-0.237-0.06C35.017,57.058,33,53.683,33,50c0-5.514,4.486-10,10-10	c2.083,0,4.085,0.642,5.79,1.856c0.225,0.16,0.277,0.472,0.117,0.697c-0.16,0.226-0.473,0.278-0.697,0.117	C46.676,41.578,44.874,41,43,41c-4.963,0-9,4.038-9,9c0,3.314,1.815,6.352,4.737,7.927c0.243,0.131,0.334,0.434,0.203,0.677	C38.85,58.772,38.678,58.867,38.5,58.867z"></path><path fill="#1f212b" d="M47.5,58.858c-0.177,0-0.349-0.095-0.439-0.262c-0.132-0.243-0.042-0.546,0.201-0.678	c0.44-0.239,0.86-0.513,1.248-0.814c0.215-0.17,0.53-0.131,0.701,0.088c0.17,0.218,0.13,0.532-0.088,0.702	c-0.431,0.334-0.896,0.638-1.385,0.903C47.662,58.839,47.581,58.858,47.5,58.858z"></path>
                                                    </svg>
                                            </v-icon>
                                        </v-col>
                                        <v-col class="fw-900">
                                            GCash e-wallet
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col class="p-12">
                                            GCash e-wallet
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card>
                        </v-col>
                    </v-row>
               </v-container>
            </v-card>
            
        </v-window-item>
    </v-window>

        
    </v-container>
    </div>
</div>
  </template>
  
  <script>
    export default {
      data: () => ({
        snackbar: false,
        text: `Please select an item from your cart.`,
        sub_total: 0,
        item_quantity: 1,
        selectAll: false,
        active: true,
        tab: 1,
        isChecked: false,
        countCheckout: 0,
        checkout_items:[],
        cart_items:[],
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
        this.fetchCartItems();
         // fetch logged in user data
         this.customer_data = localStorage.getItem('user_data');
            if (this.customer_data) {
            this.customerData = JSON.parse(this.customer_data);
            console.log(this.customerData);
            }
        
     },
     computed: {
        selectedItemsTotalPrice() {
            return this.checkout_items.reduce((total, item) => total + (item.item_amount * item.quantity), 0);
        }
    },
    mounted() {
     
    },

    
      methods: {
        placeOrder(tabNumber) {
            this.tab = tabNumber;
            axios.post('/Order/order-store', { items: this.checkout_items })
                .then(response => {
                    console.log('Items added to orders:', response.data);
                    // Handle any frontend updates you need here
                })
                .catch(error => {
                    console.error('Error adding items to orders:', error);
                    // Handle error case
                });
        },
        activateTab(tabNumber) {
            if (this.checkout_items.length !== 0) {
                this.tab = tabNumber;
                console.log('if true');
            } else {
                this.snackbar = true;
                console.log('if false');
            }
        },

        incrementQuantity(item) {
            item.item_quantity = parseInt(item.item_quantity) + 1;
            // this.updateItemAmount(item);
        },

        decrementQuantity(item) {
            if (parseInt(item.item_quantity) > 1) {
            item.item_quantity = (parseInt(item.item_quantity) - 1);
            // this.updateItemAmount(item);
            }
        },

        updateItemAmount(item) {
            this.sub_total = parseInt(item.item_quantity) * parseInt(item.item_amount);
            console.log(this.sub_total);
            if (item.isChecked) {
            this.checkedCartItem(item);
            }
        },
        handleSelectAll() {
            this.cart_items.forEach(item => {
            item.isChecked = this.selectAll;
            });

            if (!this.selectAll) {
            this.checkout_items = []; // Clear the checkout_items array if selectAll is false
            } else {
            this.checkout_items = [...this.cart_items]; // Add all cart items to checkout_items if selectAll is true
            }
        },
      
        checkedCartItem(item) {
        if (item.isChecked) {
            // Check if the item is not already in checkout_items
            if (!this.checkout_items.some(checkoutItem => checkoutItem.id === item.id)) {
            this.checkout_items.push(item);
         
            }
        } else {
            // If unchecked, remove from checkout_items if it exists
            const index = this.checkout_items.findIndex(checkoutItem => checkoutItem.id === item.id);
            if (index !== -1) {
            this.checkout_items.splice(index, 1);
            }
        }
        },
        
        calculateTotalAmount() {
            const totalAmount = this.checkout_items.reduce((total, item) => {
                const itemTotal = parseInt(item.item_quantity) * parseInt(item.item_amount);
                // console.log(`Item: ${item.item_name}, Quantity: ${item.item_quantity}, Price: ${item.item_price}, Item Total: ${itemTotal}`);
                return total + itemTotal;
            }, 0);
            // console.log(`Total Amount: ${totalAmount}`);
            return totalAmount;
        },

        async fetchCartItems() {
            try {
                const response = await this.$axios.get('/Cart/index');
                const allCartItems = response.data;

                // Filter cart items based on user_ref
                this.cart_items = allCartItems.filter(item => item.user_ref === this.customerData.user_ref)
                                                .map(item => ({ ...item, selected: false }));
                
                console.log(this.cart_items);
            } catch (error) {
                console.error(error);
            }
                
        },
        handleSelectedItems() {
                this.checkout_items = this.cart_items.filter(item => item.selected);
                }

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
      .ta-right{
        text-align: right;
      }
      .padding-b-2{
        padding-bottom: 2rem;
      }
      .ta-center{
        text-align: center;
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
      .color-green{
        color: green;
      }
      .p-12{
        font-size: 12px;
      }
      .p-14{
        font-size: 14px;
      }
      .text-link{
        cursor:pointer;
        color:blue;
        text-decoration:underline;
      }
      .fw-900{
        font-weight: 900;
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

        .gradient-button {
        background: linear-gradient(to bottom, #4CAF50, #388E3C);
        color: white; /* Set text color to white for better visibility */
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
    
        .bottom-navigation-sheet.inactive {
        transform: translateY(100%); /* Move the sheet out of the viewport */
        }
       .window-item-1{
        padding-top: 2rem;
        padding-bottom: 5rem;
       }
       .window-item-2{
        padding-top: 2rem;
        padding-bottom: 5rem;
       }
       .user-account-top-nav{
        background-color: #e7e3e3;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        color: rgb(53, 52, 52);
      }
      .v-card-text{
        margin: 0;
        padding: .5rem;
      }
  
     
   }
  
  
  </style>