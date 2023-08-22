<template>
     <div>
    <div   
    ref="scrollContainer"
        @scroll="handleScroll"
        style="height: 1000px; overflow-y: auto;">
    <v-container class="order-history-body">
      
        <v-window v-model="tab" :touch="{left: null, right: null}">
            <v-card class="margin-1 my-orders-card" max-width="600">
                        <v-card-actions>
                            <v-container>
                                <v-row>
                                    <v-col cols="2">
                                        <v-container>
                                            <v-row>
                                                <router-link to="/user-account" v-slot="{ navigate }" custom>
                                                <v-btn @click="navigate"> <v-icon size="32">mdi-account</v-icon></v-btn>
                                                </router-link>
                                            </v-row>
                                        </v-container>
                                    </v-col>

                                    <v-col cols="4" style="padding: .5rem;">
                                        Shopping Cart
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-actions>
                    </v-card>
            <v-window-item :value="1" key="sub1" class="window-item-1">
                <v-sheet
                class="bottom-navigation-sheet"
                elevation="4"
                height="130"
                rounded
                max-width="600"
                width="100%"
                :class="{ 'inactive': !active }"
                >
                <v-container>
                    <v-row>
                        <v-col cols="3" style="padding-left: 1rem;">
                            <v-checkbox v-model="selectAll" @change="handleSelectAll"> All</v-checkbox>
                        </v-col>
                        <v-col cols="6" style="padding-top: 1rem;">
                            <div>SubTotal: <v-icon>mdi-currency-php</v-icon>{{ calculateTotalAmount() }}.00</div>
                        </v-col>
                        <v-col cols="3" style="padding-right: 1rem;padding-top: .5rem;">
                            <v-btn @click="activateTab(2)">
                                Checkout({{ this.checkout_items.length }})
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
                    
                </v-sheet>
                <v-row v-for="(item, index) in cart_items" :key="item.id">
                <v-col>
                    <v-card class="margin-1" width="580">
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
                            <v-col cols="3">
                                <v-img cover aspect-ratio="1" src="/img/placeholder/jk-placeholder-image-300x203.jpg"></v-img>
                            </v-col>
                            <v-col cols="8">
                                <v-card-text>
                                    {{item.item_name}} | Product Details here
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
                            <div>Total: <v-icon>mdi-currency-php</v-icon>{{ calculateTotalAmount() }}.00</div>
                        </v-col>
                        <v-col cols="3" style="padding-right: 1rem;padding-top: .75rem;">
                            <v-btn @click="placeOrder(2)">
                                Place Order
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
                    
                </v-sheet>
          
            <v-row v-for="item in checkout_items" :key="item" justify="space-around">
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
                                <v-img cover aspect-ratio="1" src="/img/placeholder/jk-placeholder-image-300x203.jpg"></v-img>
                            </v-col>
                            <v-col cols="8" @click="tab = 6">
                                <v-card-text>
                                    {{ item.item_name}} | Product Details here
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
                    </v-container>
                </v-card>
           
            </v-row>
        </v-window-item>
    </v-window>

    
    </v-container>
    </div>
</div>
  </template>
  
  <script>
    export default {
      data: () => ({
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
        
     },
     computed: {
        selectedItemsTotalPrice() {
            return this.checkout_items.reduce((total, item) => total + (item.item_amount * item.quantity), 0);
        }
    },
    mounted() {
      window.addEventListener('scroll', this.handleScroll);
    },

    beforeDestroy() {
      window.removeEventListener('scroll', this.handleScroll);
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
        activateTab(tabNumber){
            this.tab = tabNumber;
            console.log(this.checkout_items)
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
        handleScroll() {
            const scrollThreshold = 50; // Adjust this value as needed
            if (this.$refs.scrollContainer.scrollTop > scrollThreshold) {
            this.active = true; // Set to false when scrolling down
            } else {
            this.active = false; // Set to true when scrolling up
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
            this.cart_items = response.data.map(item => ({ ...item, selected: false }));
            console.log( this.cart_items);
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
        padding-bottom: 5rem;
       }
       .window-item-2{
        padding-bottom: 5rem;
       }
  
     
   }
  
  
  </style>