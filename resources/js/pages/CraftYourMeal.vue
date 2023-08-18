<template>
    <v-container class="subscribe-body">
        <v-window v-model="tab">
            <v-window-item :value="1" key="sub1">
                <h1>Craft Your Meal</h1>
                    
                <v-item-group selected-class="bg-green">
                    <v-container>
                    <v-row>
                        <v-col v-for="diet in diets" :key="diet" cols="12" md="4">
                        <v-item v-slot="{ isSelected, selectedClass, toggle }">
                            <v-card
                            :class="['d-flex align-center', selectedClass]"
                            dark
                            height="200"
                            @click="toggle"
                            >
                            <div class="text-h3 flex-grow-1 text-center">
                                <h1>
                                    {{ isSelected ? 'Selected' : diet.name }}
                                </h1>
                            </div>
                            </v-card>
                        </v-item>
                        </v-col>
                    </v-row>
                    </v-container>
                </v-item-group>

                <div class="next_button">
                    <button class="button_set_a" @click="tab = 2">Next</button>
                </div>
            </v-window-item>

            <v-window-item :value="2" key="sub1">
                <h1>Make Your Own Plan</h1>
                    
                <v-item-group selected-class="bg-green" multiple>
                <v-container>
                    <h1>Produce</h1>
                    <v-row>
                    <v-col v-for="produc in produce" :key="produc" cols="4">
                        <v-item v-slot="{ isSelected, selectedClass, toggle }">
                        <v-card :class="['d-flex align-center produce-card', selectedClass]" dark @click="toggle(produc)" height="150">
                            <div class="text-h3 flex-grow-1 text-center">
                                <v-img :src="produc.image"></v-img>
                            <p>{{ isSelected ? 'Selected' : '' }}</p>
                            </div>
                        </v-card>
                        <p class="produce-card-caption">{{ produc.name }}</p>
                        </v-item>
                    </v-col>
                    </v-row>
                </v-container>
                </v-item-group>

                <v-item-group selected-class="bg-green" multiple>
                    <v-container>
                        <h1>Protein</h1>
                    <v-row>
                       
                        <v-col v-for="protei in protein" :key="protei" cols="4">
                            
                        <v-item v-slot="{ isSelected, selectedClass, toggle }">
                            <v-card
                            :class="['d-flex align-center', selectedClass]"
                            dark
                            @click="toggle"
                            height="150"
                            >
                            <div class="text-h3 flex-grow-1 text-center">
                                <v-img :src="protei.image"></v-img>
                                <p>
                                    {{ isSelected ? 'Selected' : '' }}
                                </p>
                            </div>
                            </v-card>
                            <p class="protein-card-caption">{{ protei.name }}</p>
                        </v-item>
                        </v-col>
                    </v-row>
                    </v-container>
                </v-item-group>

                <v-item-group selected-class="bg-green" multiple>
                    <v-container>
                        <h1>Condiment</h1>
                    <v-row>
                      
                        <v-col v-for="condimen in condiment" :key="condimen" cols="4">
                            
                        <v-item v-slot="{ isSelected, selectedClass, toggle }">
                            <v-card
                            :class="['d-flex align-center', selectedClass]"
                            dark
                            @click="toggle"
                            height="150"
                            >
                            <div class="text-h3 flex-grow-1 text-center">
                                <v-img :src="condimen.image"></v-img>
                                <p>
                                    {{ isSelected ? 'Selected' : '' }}
                                </p>
                            </div>
                            </v-card>
                            <p class="condiment-card-caption">{{ condimen.name }}</p>
                        </v-item>
                        </v-col>
                    </v-row>
                    </v-container>
                </v-item-group>

                <v-item-group selected-class="bg-green" multiple>
                    <v-container>
                        <h1>Choose your add-ons</h1>
                    <v-row>
                    
                        <v-col v-for="addo in addon" :key="addo" cols="4">
                            
                        <v-item v-slot="{ isSelected, selectedClass, toggle }">
                            <v-card
                            :class="['d-flex align-center', selectedClass]"
                            dark
                            height="150"
                            @click="toggle"
                            >
                            <div class="text-h3 flex-grow-1 text-center">
                                 <v-img :src="addo.image"></v-img>
                                <p>
                                    {{ isSelected ? 'Selected' : '' }}
                                </p>
                            </div>
                            </v-card>
                            <p class="addon-card-caption">{{ addo.name }}</p>
                        </v-item>
                        </v-col>
                    </v-row>
                    </v-container>
                </v-item-group>

                <div class="next_button">
                    <button class="button_set_a" @click="tab = 3">Proceed</button>
                </div>
            </v-window-item>


            <v-window-item :value="3" key="sub6">
            <h1>Checkout</h1>

            <div>
                <v-container>
                <div class="total-amount">
                    <h3>Total Amount: ₱.00</h3>
                </div>

               
                <div class="shipping-address">
                    <h3> Shipping Address</h3>
                    <v-card class="address-card" >
                    <v-card-text>
                        <v-row>
                            <v-col cols="11">
                              
                            </v-col>
                            <v-col cols="1">
                                <v-icon size="30" class="back-icon">mdi-chevron-right</v-icon>
                            </v-col>
                        </v-row>
                    </v-card-text>
                    
                    </v-card>
                </div>

                <div class="special-instruction">
                   <v-row>
                    <v-col>
                        <h3>Special Instruction</h3>
                    </v-col>
                   </v-row>
                   <v-row>
                    <v-col>
                        {{ specialInstruction }}
                    </v-col>
                   </v-row>
                </div>
                <!-- Payment Method Section -->
                <div class="payment-method">
                    <h3>Payment Method</h3>
                    <!-- Use v-radio-group to allow the user to select the payment method -->
                    <v-radio-group v-model="selectedPaymentMethod" row>
                    <v-radio label="Cash on Delivery" value="cash_on_delivery"></v-radio>
                    <v-radio label="GCash" value="gcash"></v-radio>
                    </v-radio-group>
                </div>

                <!-- List of Checked Out Items -->
                <div class="checked-out-items">
                    <h3>Checked Out Items</h3>
                    <v-container>
                    <v-row>
                        <!-- <v-col v-for="(record, index) in checkedOutItems" :key="index" cols="12" sm="6" md="4">
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
                        </v-col> -->
                    </v-row>
                    </v-container>
                </div>

                <!-- Place Order Button -->
                <v-row>
                    <v-col>
                    <v-card>
                        <v-btn size="x-large" variation="flat" color="#C7C47F">Place Order</v-btn>
                    </v-card>
                    </v-col>

                    <!-- <div class="snackbar-container">
                    <v-snackbar v-model="snackbar.show" :timeout="snackbar.timeout" :color="snackbar.color" :top="snackbar.top" >
                        {{ snackbar.message }}
                    </v-snackbar>
                    </div> -->
                </v-row>
                </v-container>
            </div>
            </v-window-item>

        </v-window>

        <v-tabs v-model="tab" align-tabs="center">
            <v-tab :value="1"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
            <v-tab :value="2"><v-icon icon="mdi-circle-small"></v-icon></v-tab>
           
        </v-tabs>
    </v-container>
</template>

<script>
    export default {
        data() {
            return {
                tab: 1,
                selectedItems: {
                    produce: [],
                    protein: [],
                    condiment: [],
                    addon: []
                },
                diets: [
                {
                    id: 1,
                    name: 'Vegan',
                    price: 'PHP 599',
                    description: 'Good For 1-2',
                    details: 'Plan 1 details here...',
                },
                {
                    id: 2,
                    name: 'Vegetarian',
                    price: 'PHP 999',
                    description: 'Good For 3-4',
                    details: 'Plan 2 details here...',
                },
                {
                    id: 3,
                    name: 'Pescatarian',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                },
                {
                    id: 4,
                    name: 'None/Im not on diet',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                },
                ],

                produce: [
                {
                    id: 1,
                    name: 'produce 1',
                    price: 'PHP 599',
                    description: 'Good For 1-2',
                    details: 'Plan 1 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 2,
                    name: 'produce 2',
                    price: 'PHP 999',
                    description: 'Good For 3-4',
                    details: 'Plan 2 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 3,
                    name: 'produce 3',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 4,
                    name: 'produce 4',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                ],

                protein: [
                {
                    id: 1,
                    name: 'protein 1',
                    price: 'PHP 599',
                    description: 'Good For 1-2',
                    details: 'Plan 1 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 2,
                    name: 'protein 2',
                    price: 'PHP 999',
                    description: 'Good For 3-4',
                    details: 'Plan 2 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 3,
                    name: 'protein 3',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 4,
                    name: 'protein 4',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                ],

                condiment: [
                {
                    id: 1,
                    name: 'condiment 1',
                    price: 'PHP 599',
                    description: 'Good For 1-2',
                    details: 'Plan 1 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 2,
                    name: 'condiment 2',
                    price: 'PHP 999',
                    description: 'Good For 3-4',
                    details: 'Plan 2 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 3,
                    name: 'condiment 3',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 4,
                    name: 'condiment 4',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                ],


                addon: [
                {
                    id: 1,
                    name: 'addon 1',
                    price: 'PHP 599',
                    description: 'Good For 1-2',
                    details: 'Plan 1 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 2,
                    name: 'addon 2',
                    price: 'PHP 999',
                    description: 'Good For 3-4',
                    details: 'Plan 2 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 3,
                    name: 'addon 3',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                {
                    id: 4,
                    name: 'addon 4',
                    price: 'PHP 1599',
                    description: 'Good For 5-6',
                    details: 'Plan 3 details here...',
                    image: 'img/placeholder/jk-placeholder-image-300x203.jpg',
                },
                ],
               
            }
        },
        created(){
           

        },
        methods: {
            
            toggle(item, category) {
            // Check if the item is already selected
            const index = this.selectedItems[category].indexOf(item);
            if (index > -1) {
                // Item is selected, remove it from the list
                this.selectedItems[category].splice(index, 1);
            } else {
                // Item is not selected, add it to the list
                this.selectedItems[category].push(item);
            }

            // Print the selected items in the console log
            console.log("Selected items:", this.selectedItems);
            },
            getCategory(item) {
            // Determine the category of the item (produce, protein, condiment, addon)
            if (this.produce.includes(item)) {
                return "produce";
            } else if (this.protein.includes(item)) {
                return "protein";
            } else if (this.condiment.includes(item)) {
                return "condiment";
            } else if (this.addon.includes(item)) {
                return "addon";
            }
            return null;
            }
           
        },
        watch: {
            selectedPaymentMethod(newMethod) {
            // You can perform any additional actions based on the selected method here
            console.log("Selected payment method:", newMethod);
            },
        },
        mounted() {
     
        }
    }
</script>

<style scoped>
 @media only screen and (max-width: 600px) {
        h1{
            font-weight: bold;
            text-transform: uppercase; 
            font-size:32px !important;
        }
        p{
            font-size: 	21.333px;
        }
        .subscribe-body{
        padding: 0;
        padding-right: 2rem;
        margin: 0;
        box-sizing: border-box;
        
    }

    .produce-card{
        padding: 0;
        margin: 0;
    }
    .produce-card-caption , .protein-card-caption , .addon-card-caption, .condiment-card-caption{
        padding-left: 2rem;
    }
        .v-col {
       padding: 0;
       margin: 0;
    }
        .v-card--reveal {
            align-items: center;
            bottom: 0;
            justify-content: center;
            opacity: 0.9;
            position: absolute;
            width: 100%;
        }
        .snackbar-container {
        position: fixed;
        top: 50%; /* Center vertically */
        left: 50%; /* Center horizontally */
        transform: translate(-50%, -50%);
        z-index: 9999; /* Adjust the z-index if needed to make sure the snackbar is on top of other elements */
        }
        .shipping-address-btn {
        max-width: 300px; /* Set a maximum width for the button */
        word-wrap: break-word; /* Allow text to wrap within the button */
        }
        /* my cart */
      
        .record-card {
        margin: 8px 0;
        height: 100%;
        
        }

        .record-content {
        margin-bottom: 8px;
        }

        .product-name {
        font-size: 16px;
        margin-bottom: 4px;
        }

        .description {
        font-size: 12px;
        margin-bottom: 4px;
        }

        .price {
        font-size: 14px;
        margin-bottom: 4px;
        }
        .quantity-control {
        display: flex;
        align-items: center;
        justify-content: space-between;
        }

        .quantity-btn {
            min-width: 24px;
            min-height: 24px;
            padding: 0;
        }

        .checkout-card {
        margin-top: 16px;
        }
        .content_section {
        margin: 0;
        }

        .total-amount {
        font-size: 16px;
        margin-top: 12px;
        }

        .shipping-address h3,
        .payment-method h3,
        .checked-out-items h3 {
        font-size: 16px;
        margin-bottom: 8px;
        }

        .shipping-address {
        margin-top: 16px;
        }

        .checked-out-items {
        margin-top: 16px;
        }

        .record-card {
        margin: 8px 0;
        padding: 8px;
        }

        .product-name {
        font-size: 14px;
        margin-bottom: 2px;
        }

        .description {
        font-size: 12px;
        margin-bottom: 2px;
        }

        .price {
        font-size: 12px;
        margin-bottom: 2px;
        }

        .quantity {
        font-size: 12px;
        font-weight: bold;
        margin: 2px 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 50px; /* Added margin for spacing */
        }

        .navigation_bar {
            width: 100%;
            background-color: #4d783f;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 50px;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            font-size: 20px;
            color: #ffffff;
        }

        .logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: white;
        }

        .company_name {
            font-size: 20px;
            color: white;
            font-weight: bold;
            font-family: 'Gelasio', serif;
            font-style: italic;
        }

        .navigation_section ul {
            list-style-type: none;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .navigation_section ul li {
            margin-right: 20px;
        }

        .navigation_section ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            font-family: 'Inter', sans-serif;
        }

        .user_section {
            display: flex;
            align-items: center;
            margin-top: 20px; /* Added margin for spacing */
        }

    .button_set_a {
        width: 158px;
        height: 52px;
        border-radius: 13px;
        background-color: #2d4d22;
        font-weight: bold;
        font-size: 18px;
        color: #ffffff;
    }

    .sign_up_button {
        width: 158px;
        height: 52px;
        border-radius: 13px;
        background-color: #C7C47F;
        font-weight: bold;
        font-size: 18px;
        color: #2d4d22;
    }

    .columns {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        width: 100%;
        margin-top: 40px; /* Increased margin for spacing */
    }

    .price1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        width: 25%;
        box-sizing: border-box;

    }

    .price2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        width: 25%;
        box-sizing: border-box;

    }


    .price {
        display: flex;
        flex-direction: column;
        align-items: center;
        list-style-type: none;
        border: 1px solid #eee;
        margin: 0;
        padding: 0;
        transition: 0.3s;
        /* width: 20%; */
        box-sizing: border-box;
        border-radius: 10px;
        border:solid #39612C 2px;

    }


    .price:hover {
        box-shadow: 0 8px 12px 0 rgba(130, 176, 135, 0.75);
    }

    .price .header {
        /* background-color: #2d4d22; */
        color: #2d4d22;
        font-size: 35px;
        font-family: 'Gelasio', serif;
        font-weight: bold;
        text-align: center;
        padding: 20px;
        display: flex;
        justify-content: center;
    }

    .price li {
        /* border-bottom: 2px solid #7EAB6E; */
        padding: 20px;
        text-align: center;
        font-family: 'Inter', sans-serif;
        font-size: 16px;
    }

    .price .grey {
        /* background-color: #E8E5A9; */
        font-weight: bold;
        font-size: 20px;
    }

    .price .button {
        background-color: #39612C;
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
    }

    .next_button {
        display: flex;
        justify-content: center;
        margin-top: 40px; /* Increased margin for spacing */
    }

    .next_button .button_set_a {
        font-size: 20px;
    }

    .next_button button {
        font-size: 18px;
        font-weight: bold;
        color: #ffffff;
        background-color: #2d4d22;
        border: none;
        border-radius: 13px;
        padding: 10px 20px;
        margin-right: 10px;
        cursor: pointer;
    }

    .banner {
        object-fit: cover;
        width: 100%;
        height: 300px;
        background-image: url('https://images.pexels.com/photos/2252482/pexels-photo-2252482.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-position: center;
        background-size: cover;
        opacity: 0.75;
    }

    h1 {
        font-size: 60px;
        font-weight: 600;
        font-family: 'Gelasio', serif;
        color: #2d4d22;
        margin-top: 40px;
    }

    h2 {
    font-size: 20px;
    font-weight: 650;
    font-style: bold;
    font-family: 'Gelasio', serif;
    color: #2d4d22;
    }

    p {
        font-size: 20px;
        color: #000;
        margin-bottom: 40px;
        text-align: justify;
    }

    .left_section {
        display: flex;
        align-items: center;
    }

    .right_section {
        display: flex;
        align-items: center;
    }

    .content_section {
    margin-left: 100px;
    margin-right: 100px;
  }

    table {
        margin: 0 auto;
        font-size: 18px;
        font-family: 'Inter', sans-serif;
        color: #000;
        border-collapse: collapse;
        width: 80%;
        margin-bottom: 20px;
    }

    th {
        background-color: white;
        font-weight: bold;
        font-size: 25px;
        font-family: 'Inter', sans-serif;
        color: #2d4d22;
        padding: 10px;
    }

    td {
        text-align: center;
        border-bottom: 1px solid #7EAB6E;
        padding: 10px;
    }

    select {
        font-family: 'Inter', sans-serif;
        font-size: 14px;
    }

    input[type="number"] {
        width: 50px;
        padding: 5px;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
    }

    .customize-section {
        text-align: center;
        margin-top: 50px;
    }

    td.center-cell,
    th.center-cell {
        text-align: center;
        padding: 15px;
    }

    a {
        text-decoration: none;
        color: #379937;
    }

    .dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #FAF9E7;
        min-width: 140px;
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: inline-block;
    }

    textarea {
        width: 100%;
        height: 150px;
        border: 2px solid #26451B;
        background: rgba(217, 217, 217, 0.06);
        font-family: 'Inter', sans-serif;
        margin: 0 auto;
        display: block;

    }

    .text-center {
    margin-top: 30px;
    }

  .text-center v-btn {
    margin: 0 10px;
     }

  .v-card {
    margin-bottom: 30px;
    margin-top: 20px;
    margin-left: 25px;
    margin-right: 24px;
  }

  .v-radio label {
    font-size: 15px;
    font-weight: 800;
    font-family: 'Inter', sans-serif;
    color: black;
    background-color: "#DCE4C3"

  }


    /* payment method section */
    .payment-card {
    display: flex;
    align-items: center;
    padding: 16px;
    }

    .payment-icon {
    margin-right: 16px;
    }

    .payment-info {
    flex-grow: 1;
    }

    .payment-name {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
    line-height: 1.2; /* Added line-height property */
    }

    .payment-description {
    margin: 0;
    line-height: 1.2; /* Added line-height property */
    }
    /* onclick plan */
    .selected {
    background-color: #f5f5f5; /* Apply a background color to the selected plan */
    }

    .checkmark {
    float: right;
    margin-right: 10px;
    }


    /* customize your plan */

    .center-cell {
    text-align: center;
    }

    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropbtn {
    background-color: #4caf50;
    color: white;
    padding: 5px;
    font-size: 14px;
    border: none;
    cursor: pointer;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    padding: 10px;
    }

    .dropdown-content label {
    display: block;
    }

    .dropdown-content label input {
    margin-right: 5px;
    }

    .dropdown:hover .dropdown-content {
    display: block;
    }
    .basket_cards:hover{
        box-shadow: 0 8px 12px 0 rgba(130, 176, 135, 0.75);
    }
    
}
</style>