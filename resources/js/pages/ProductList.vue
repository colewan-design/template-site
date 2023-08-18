<template>
    <v-container class="product-list-body">
        <h1>Our Products</h1>
            <p>Siged Tiklis, The Good Basket, is committed to providing organic and sustainably-sourced products. When you buy a basket, you'll be getting a balanced combination of fruits and vegetables, poultry products, and guilt-free snacks.</p>

            <div class = "flex-fill">
                <!-- <v-row>
                    <v-col
                        v-for="item in basket_items"
                        :key="item.id"
                        cols="12"
                        md="4"
                        lg="4"
                        xl="4"
                        >
                        <v-hover v-slot="{ isHovering, props }">
                            <v-card class="mx-auto" color="grey-lighten-4" max-width="600" v-bind="props">
                                <v-img :aspect-ratio="16/9" cover src="https://cdn.vuetifyjs.com/images/cards/kitchen.png">
                                    <v-expand-transition>
                                    <div
                                        v-if="isHovering"
                                        class="d-flex transition-fast-in-fast-out bg-orange-darken-2 v-card--reveal text-h2"
                                        style="height: 100%;"
                                    >
                                    {{ item.basket_item_name }}
                                    </div>
                                    </v-expand-transition>
                                    
                                </v-img>

                                <v-card-text class="pt-6">
                                    <div class="font-weight-light text-grey text-h6 mb-2">
                                    {{item.category }}
                                    
                                    </div>
                                    

                                    <h3 class="text-h4 font-weight-light text-orange mb-2">
                                    {{item.created_at }}
                                    </h3>

                                    <div class="font-weight-light text-h6 mb-2">
                                    Details
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-hover>
                    </v-col>
                </v-row>
                <hr> -->

                <v-row>
                    <!-- <v-col cols="12" md="4" lg="4" xl="4">
                        <v-parallax aspect-ratio="4/3" src="https://images.pexels.com/photos/1691180/pexels-photo-1691180.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></v-parallax>
                    </v-col> -->
                    <v-col cols="12">
                        <div>
                            <h2>Vegetables</h2>
                            <p>With Siged Tiklis, you can enjoy a wide range of hand-grown vegetables, sourced from groups such as the  Atok Organic Practitioners Association, Inc.</p>
                            <p>We offer vegetables such as bulbs, leafy vegetables, cole crops, legumes, stems and shoots, fruit vegetables, and root and tuber crops.</p>
                            <products-gallery :category="'Vegetables'" :products="basket_items.filter(item => item.category == 'Vegetables')"></products-gallery>
                        </div>
                        
                        <div>
                            <h2>Poultry</h2>
                            <p>Siged Tiklis We provide ducks and native chickens, which can be delivered to you live or dressed. We also offer fresh free-range and native eggs.</p>
                            <p>Our poultry sources are refreshed weekly to ensure freshness.</p>
                            <products-gallery :category="'Poultry'" :products="basket_items.filter(item => item.category == 'Poultry')"></products-gallery>
                        </div>

                        <div>
                            <h2>Seasonal Fruit</h2>
                            <p>Siged Tiklis sources its seasonal fruit from different groups, such as the Atok Organic Practitioners Association, Inc. for highland vegetables and the Aduyon Organic Farmers Association (AOFA) for fruits and poultry supplies. We update our supply weekly to ensure freshness.</p>
                            <p>Our range of seasonal fruit includes rambutan, indian mango, avocado, lemon green, and passion fruit.</p>
                            <products-gallery :category="'Fruits'" :products="basket_items.filter(item => item.category == 'Fruits')"></products-gallery>
                        </div>

                        <div>
                            <h2>Herbs</h2>
                            <p>Our hand-grown herbs are sure to bring your dish depth of flavor. You can enjoy lemon grass, mint, oregano, and rosemary with our services.</p>
                            <products-gallery :category="'Herbs'" :products="basket_items.filter(item => item.category == 'Herbs')"></products-gallery>
                        </div>
                    </v-col>
                </v-row>
                <hr>

                <v-row>
                    <v-col cols="12" md="4" lg="4" xl="4">
                        <v-parallax aspect-ratio="4/3" src="https://gcdnb.pbrd.co/images/OsG2FZm6LQhS.png?o=1"></v-parallax>
                    </v-col>
                    <v-col cols="12" md="8" lg="8" xl="8">
                        <h1>Indigenous and Organic Products</h1>
                        <p>With Siged Tiklis, you can enjoy a variety of indigenous and organic products.</p>

                        <h1>Processed Products</h1>
                        <!-- <v-img src = "https://gcdnb.pbrd.co/images/VT742efYvU7A.png?o=1" width = "200px" height ="200px"></v-img> -->
                        <p>Siged Tiklis can provide a wide range of processed products. Choose from our selection of dehydrated fruits and vegetable snacks or treat yourself to our tomato and rhubarb spreads.</p>

                        <h1>Ancestral and Domain-Based</h1>
                        <p>Enjoy a wide range of Siged Tiklis' ancestral and domain-based products. We offer locally-produced heirloom rice, natural wild products, and more.</p>
                        <!-- <v-btn block class="button_set_a mx-auto">Subscribe</v-btn> -->
                    </v-col>
                </v-row>
                <hr>

                <v-row>
                    <v-col>
                        <h1>Cultivated With Love</h1>
                        <p>With Siged Tilkis, every crop, fruit, and meal plan was designed with your health and enjoyment in mind. </p>
                        <p>We are dedicated to delivering healthy, locally-sourced meals with every basket. Get yours now.</p>
                        <v-btn block class="button_set_a mx-auto d-flex d-sm-none">Learn More</v-btn><!-- <600px viewport -->
                        <v-btn class="button_set_a mx-auto d-none d-sm-flex" width="30em">Learn More</v-btn><!-- >600px viewport -->
                    </v-col>
                </v-row>
            </div>
             <!-- Add buttons to scroll to the top and bottom of the page -->
    <v-btn @click="scrollToTop" fab bottom left class="btn-scroll">
      <v-icon>mdi-chevron-up</v-icon>
    </v-btn>

    <v-btn @click="scrollToBottom" fab bottom right class="btn-scroll">
      <v-icon>mdi-chevron-down</v-icon>
    </v-btn>
    </v-container>
   
</template>

<script>
    export default {
        data() {
            return{
                data : {
                    id:'',
                    basket_item_name: '',
                },
                basket_items: [],
                perPage: 10,
                pagination: {},
                search:'',
            }
        },

        mounted() {
            axios.get('/Basket_Items/index')
            .then(response => {
            this.basket_items = response.data;
            })
            .catch(error => {
            console.error(error);
            });
        },

        methods : {
            scrollToTop() {
      // Scroll to the top of the page
      window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    scrollToBottom() {
      // Scroll to the bottom of the page
      const documentHeight = document.documentElement.scrollHeight;
      window.scrollTo({ top: documentHeight, behavior: 'smooth' });
    },

        },


        computed : {
            //   collection() {
            //     if (this.search != '') {
            //             return this.audits.filter(audits => {
            //                 // Adjust the condition based on the property you want to search
            //                 return audits.categoryName.toLowerCase().includes(this.search.toLowerCase());
            //             });
            //         } else {
            //             return this.paginate(this.audits);
            //         }

            //     },
        },

    }
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
    body {
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        margin: 0;
        padding: 0;
    }
    .product-list-body{
        padding: 0;
        padding-right: 2rem;
        margin: 0;
        box-sizing: border-box;
    }
    .v-card--reveal {
    align-items: center;
    bottom: 0;
    justify-content: center;
    opacity: 0.9;
    position: absolute;
    width: 100%;
    }
    /* mobile view */
    @media only screen and (max-width: 600px) {
 
    h1{
        font-weight: bold;
        text-transform: uppercase; 
        font-size:32px !important;
    }
    p {
        font-size: 	21.333px;
    }
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


    .next_button {
        display: flex;
        justify-content: center;
        margin-top: 40px; /* Increased margin for spacing */
    }

    .next_button .button_set_a {
        font-size: 20px;
    }

    h1 {
        font-size: 60px;
        font-weight: 600;
        /* font-style: italic; */
        font-family: 'Gelasio', serif;
        color: #2d4d22;
        margin-top: 40px;
    }

    h2 {
        font-size: 40px;
        font-weight: 600;
        /* font-style: italic; */
        font-family: 'Gelasio', serif;
        color: #2d4d22;
        margin-top: 40px;
    }

    h3 {
        font-size: 35px;
        font-weight: 400;
        /* font-style: italic; */
        font-family: 'Inter', sans-serif;
        color: #2d4d22;
        margin-top: 40px;
    }
    p {
        font-size: 20px;
        color: #000;
        margin-bottom: 40px;
    }

    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .column {
        float: right;
        width: 33.33%;
        padding: 5px;
    }

    * {
        box-sizing: border-box
    }

    img {
        width: 100;
        height: 400;
        display: inline-flex;
    }

    hr {
        display: flex;
        background-color: #7EAB6E;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: auto;
        margin-right: auto;
        height: 4px;
        /* border-style: inset;
        border-width: 4px; */
    }

    .btn-scroll {
  position: fixed;
  z-index: 999;
  opacity: 0.8;
  /* Additional styles here */
}
</style>
