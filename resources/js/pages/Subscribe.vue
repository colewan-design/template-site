<template>
    <div>
        <div   
        ref="scrollContainer"
        @scroll="handleScroll"
        style="overflow-y: auto;"
        >
    <v-container class="subscribe-body">
        <v-window v-model="tab" :touch="{left: null, right: null}">
            <v-snackbar v-model="snackbar_next" :timeout="timeout"  top>
            {{ NoPlanSelectedText }}
            </v-snackbar>
            <v-window-item :value="1" key="sub1" style="padding-bottom: 5rem; padding-right: 1rem;">
             
                       <div class="next-btn">
                               <v-icon size="32" @click="activateTab(2)" >
                                mdi-arrow-right
                               </v-icon>
                               Proceed to Checkout
                       </div>
                       

                <h1>Choose Your Plan</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                    non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <div class="flex-fill">
                        <v-row>
                            <v-col v-for="plan in plans" :key="plan.id" cols="12" md="4" lg="4" xl="4" @click="selectPlan(plan.id)">
                                <v-hover v-slot="{ isHovering, props }">
                                <v-card class="mx-auto" color="grey-lighten-4" max-width="600" v-bind="props">
                                    <v-img :aspect-ratio="16/9" cover src="https://cdn.vuetifyjs.com/images/cards/kitchen.png">
                                    <v-expand-transition>
                                        <div v-if="isHovering" class="d-flex transition-fast-in-fast-out bg-orange-darken-2 v-card--reveal text-h2" style="height: 100%;">
                                        {{ plan.price }}
                                        </div>
                                    </v-expand-transition>
                                    </v-img>

                                    <v-card-text class="pt-6">
                                    <div class="font-weight-light text-grey text-h6 mb-2">
                                        {{ plan.name }}
                                        <!-- Add checkmark icon for selected plan -->
                                        <v-icon v-if="selectedPlan === plan.id" class="icon-selected">mdi-check</v-icon>
                                    </div>

                                    <h3 class="text-h4 font-weight-light text-orange mb-2">
                                        {{ plan.description }}
                                    </h3>
                                    </v-card-text>

                                    <v-spacer></v-spacer>

                                    <v-card-actions>
                                    <v-btn color="orange-lighten-2" variant="text">Explore</v-btn>

                                    <v-spacer></v-spacer>

                                    <v-btn
                                        :icon="getIcon(plan.id)"
                                        @click="toggleExpansion(plan.id)"
                                    ></v-btn>
                                    </v-card-actions>

                                    <v-expand-transition>
                                    <div v-if="isExpanded(plan.id)">
                                        <v-divider></v-divider>

                                        <v-card-text>
                                        {{ plan.details }}
                                        </v-card-text>
                                    </div>
                                    </v-expand-transition>
                                </v-card>
                                </v-hover>
                            </v-col>
                            </v-row>
                        </div>

                   
                </v-window-item>

        <v-window-item :value="2" key="sub6" style="padding-bottom: 5rem;">
          
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
                        <v-col cols="3" style="padding-right: 1rem;padding-top: .5rem;">
                            
                        </v-col>
                        <v-col cols="5" style="padding-right: 1rem;padding-top: .5rem;">
                            <div>Total: <v-icon>mdi-currency-php</v-icon>{{this.checkedOutItems[0].price}}.00</div>
                        </v-col>
                        <v-col cols="4" style="padding-right: 1rem;padding-top: .5rem;" >
                            <v-btn color="green" @click="placeOrder">
                                Subscribe
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
                    
                </v-sheet>
            <div>
                <v-container>
               
               <div>
                <v-container>
                    <v-row>
                        <v-col>
                            <v-icon @click="tab = 1">
                                mdi-arrow-left
                            </v-icon>
                            User Subscription
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            Shipping Address
                        </v-col>
                    </v-row>
                </v-container>
               </div>
               
               <!-- <v-card>
                <v-container>
                    <v-row>
                        <v-col>

                        </v-col>
                    </v-row>
                </v-container>
               </v-card> -->
               <v-spacer>

               </v-spacer>

                <v-card title="Payment Method" class="payment-method">
                    <v-container>
                        <v-row>
                            <v-col>
                                <v-radio-group v-model="selectedPaymentMethod" row>
                                <v-radio label="Cash on Delivery" value="cash_on_delivery"></v-radio>
                                <v-radio label="GCash" value="gcash"></v-radio>
                                </v-radio-group>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>

                <!-- List of Checked Out Items -->
                <div class="checked-out-items">
                    <v-container>
                    <v-row>
                        <v-col v-for="(record, index) in checkedOutItems" :key="index" cols="12" sm="6" md="4">
                        <v-card outlined class="record-card">
                            <v-row class="card-row">
                            <v-col cols="4">
                                <v-img aspect-ratio="1" src="/img/placeholder/jk-placeholder-image-300x203.jpg"></v-img>
                            </v-col>
                            <v-col cols="8">
                                <div class="record-content">
                                <h3 class="product-name">{{ record.product }}</h3>
                                <p class="description">{{ record.description }}</p>
                                <p class="price">Price: {{ record.price }}</p>
                                <div class="quantity-control">
                                    <span class="quantity">Quantity: {{ record.quantity }}</span>
                                </div>
                                </div>
                            </v-col>
                            </v-row>
                        </v-card>
                        </v-col>
                    </v-row>
                    </v-container>
                </div>

                <v-row>
                    <div class="snackbar-container">
                    <v-snackbar v-model="snackbar.show" :timeout="snackbar.timeout" :color="snackbar.color" :top="snackbar.top" >
                        {{ snackbar.message }}
                    </v-snackbar>
                    </div>
                </v-row>
                </v-container>
            </div>
            </v-window-item>
        </v-window>
      
    </v-container>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                NoPlanSelectedText: 'Please Select A Plan First.',
                timeout: 2000,
                snackbar_next: false,
                active: true,
                expandedPlans: [],
                show: false,
                plans: [
                {
                    id: 1,
                    name: 'Plan 1',
                    price: 'PHP 599',
                    description: 'Good For 1-2',
                    details: 'Plan 1 details here...',
                },
                {
                    id: 2,
                    name: 'Plan 2',
                    price: 'PHP 999',
                    description: 'Good For 3-4',
                    details: 'Plan 2 details here...',
                },
                {
                    id: 3,
                    name: 'Plan 3',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                },
                ],
                snackbar: {
                    show: false,
                    timeout: 3000, 
                    color: '', 
                    message: '',
                },
                selectedPaymentMethod: "",
                specialInstruction: '',
                email: '',
                firstName: '',
                lastName: '',
                streetAddress: '',
                townCity: '',
                postCode: '',
                country: '',
                shippingAddress: '', 
                totalAmount: 0,
                checkedOutItems: [],
                records: [
                    { product: 'Plan 1', description: 'Onions, Garlic, Tomatoes, Ginger', price: 699, quantity: 1 },
                    { product: 'Plan 2', description: 'Onions, Garlic, Tomatoes, Ginger', price: 999, quantity: 1 },
                    { product: 'Plan 3', description: 'Onions, Garlic, Tomatoes, Ginger', price: 799, quantity: 1 },
                    
                ],
                selectedBasket: null,
                basket_items: [],
                bundleTypes: ['Pure Veg', 'Pure Meat', 'Veg + Meat'],
                mealTypes: ['Chopsuey', 'Pinapaitan', 'Tinola'],
                addOns: ['Cabbage', 'Onion', 'Ginger', 'Garlic'],
                selectedPlan: null,
                selectedPayment: '', 
                deliveries: [
                {   
                    deliveryNo: 1,
                    bundleType: 'Pure Veg',
                    meal: 'Chopsuey',
                    addOns: [],
                    deliveryDate: '2023-07-08',
                    addOnsPrice: 'PHP 100',
                    bundlePrice: 'PHP 599'
                },
                {
                    deliveryNo: 2,
                    bundleType: 'Pure Veg',
                    meal: 'Chopsuey',
                    addOns: [],
                    deliveryDate: '2023-07-08',
                    addOnsPrice: 'PHP 100',
                    bundlePrice: 'PHP 599'
                },
                {
                    deliveryNo: 3,
                    bundleType: 'Pure Veg',
                    meal: 'Chopsuey',
                    deliveryDate: '2023-07-08',
                    addOnsPrice: 'PHP 100',
                    bundlePrice: 'PHP 599',
                    addOns: [],
                }
                ],
                // deliveries end
                paymentMethods: [
                    {
                        value: 'gcash',
                        icon: 'mdi-currency-usd',
                        name: 'Gcash Payment',
                        description: 'Pay using Gcash digital wallet.',
                        color: '#4CAF50',
                    },
                    {
                        value: 'cod',
                        icon: 'mdi-cash',
                        name: 'Cash on Delivery',
                        description: 'Pay in cash upon delivery.',
                        color: '#FF9800',
                    },
                 ],
                quantity: 0,   
                tab: 1,
                subscribe_data: {

                },
                totalPrice: 0
            }
        },
        created(){
            this.BasketItems();

        },
        beforeDestroy() {
        window.removeEventListener('scroll', this.handleScroll);
        },
        mounted() {
        this.BasketItems();
        window.addEventListener('scroll', this.handleScroll);
        },
        methods: {
            activateTab(tabNumber){
                if(this.checkedOutItems.length == true){
                    this.tab = tabNumber;
                    console.log('if true')
                }
                else{
                    this.snackbar_next = true
                    console.log('if false')
                }

            },
            handleScroll() {
                const scrollThreshold = 50; 
                if (this.$refs.scrollContainer.scrollTop > scrollThreshold) {
                this.active = true; 
                } else {
                this.active = false; 
                }
            },
            isExpanded(planId) {
            return this.expandedPlans.includes(planId);
            },
            toggleExpansion(planId) {
            if (this.expandedPlans.includes(planId)) {
           
                this.expandedPlans = this.expandedPlans.filter((id) => id !== planId);
            } else {
             
                this.expandedPlans = [planId];
            }
            },
            getIcon(planId) {
            return this.isExpanded(planId) ? 'mdi-chevron-up' : 'mdi-chevron-down';
            },
            async placeOrder() {
                await new Promise((resolve) => setTimeout(resolve, 500));
                this.snackbar.message = 'Processing your order...';
                this.snackbar.color = 'info';
                this.snackbar.show = true;
                this.snackbar.position = "top";
                await new Promise((resolve) => setTimeout(resolve, 2000));
        
                this.snackbar.show = false;
        
                this.snackbar.message = 'Order Submitted Successfully!';
                this.snackbar.color = 'success';
                this.snackbar.show = true;
            },
            shippingBillingNextBtn() {
                this.tab = 5;
            },
            checkoutPage() {
                this.tab = 6;
            },
            addBillingShippingAddress() {
                this.shippingAddress = `${this.firstName} ${this.lastName}\n${this.streetAddress}\n${this.townCity}\n${this.postCode}\n${this.country}`;
            },
            addSpecialInstruction() {
                this.specialInstruction = `${this.specialInstruction}`;
            },
            checkoutItems() {
                this.totalPrice = this.checkedOutItems.reduce((total, item) => total + item.price, 0);
                this.addBillingShippingAddress();
                this.addSpecialInstruction();
                this.tab = 1;
            },
            editShippingAddress() {
            this.tab = 8;
            },
            updateShippingAddress() {
            this.tab = 7;
            },
          
            selectBasket(id) {
            this.selectedBasket = id;
            },
            getColumns() {
           
            if (this.$vuetify.breakpoint.xs) {
                return 12; 
            } else {
                return 4; 
            }
            },
            
            selectPlan(planId) {
                const selectedPlan = this.plans.find((plan) => plan.id === planId);
                if (selectedPlan && !this.checkedOutItems.includes(selectedPlan)) {
                    this.checkedOutItems = [];
                    this.checkedOutItems.push(selectedPlan);
                }

                this.selectedPlan = planId;

                // Check if there's at least one item in the checkedOutItems array
                if (this.checkedOutItems.length > 0) {
                    console.log(this.checkedOutItems[0].price);
                } else {
                    console.log("No items checked out.");
                }
            },

            incrementQuantity(index) {
            this.records[index].quantity++;
            },
            decrementQuantity(index) {
            if (this.records[index].quantity > 0) {
                this.records[index].quantity--;
            }
            },
          
            async subscribeCustomer() {
                console.log('test')
                this.$axios.post('/subscribe')
                .then((response) => {
                    console.log('success')
                })
                .catch((error) => {
                    console.log('fail')
                });
            },
             async BasketItems() {
                this.$axios.get('/Display_Basket/index')
                .then((response) => {
                this.basket_items = response.data;
                })
                .catch((error) => {
                });
            },
        },
        watch: {
            selectedPaymentMethod(newMethod) {
           
            console.log("Selected payment method:", newMethod);
            },
        },
       
    }
</script>

<style>
 @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@1,500&display=swap');
 @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

  /* mobile view */
  @media only screen and (max-width: 600px) {

      h1{
        font-weight: bold;
        text-transform: uppercase; 
        font-size:32px !important;
      }
      p{
        font-size: 	16.333px;
      }
      .v-card--reveal {
        align-items: center;
        bottom: 0;
        justify-content: center;
        opacity: 0.9;
        position: absolute;
        width: 100%;
        }
        .bottom-navigation-sheet {
            opacity: 1;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color:rgba(0,0,0,0.2);
            z-index: 1000;
            transform: translateY(0);
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        .next-btn{
            position: fixed;
            bottom: 80px;
            left: 30px;
            width: 100%;
            z-index: 1000;
           
        }
        
    
  }
   
body {
    font-family: 'Inter', sans-serif;
}

.subscribe-body{
    padding: 0;
    padding-right: 2rem;
    padding-top: 2rem;
    margin: 0;
    box-sizing: border-box;
}

</style>

