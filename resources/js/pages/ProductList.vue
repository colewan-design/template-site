<template>
    <v-container class="product-list-body">
        <h1>Page Title</h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere quidem harum ducimus veniam laboriosam suscipit, repellendus reiciendis omnis. Eaque natus commodi eos autem non, culpa magnam eius quo nulla sapiente?</p>

            <div class = "flex-fill">

                <v-row>
                   
                    <v-col cols="12">
                        <div>
                            <h2>Sub Section</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum autem quibusdam amet accusantium neque, sed voluptatum nemo. Facilis fugit iste quam consequuntur libero. Et unde sunt officiis qui totam! Quos.</p>
                         
                            <products-gallery :category="'Vegetables'" :products="basket_items.filter(item => item.category == 'Vegetables')"></products-gallery>
                        </div>
                        
                        <div>
                            <h2>title</h2>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis quam enim at soluta. Ullam, enim consequuntur! Neque tenetur non nesciunt nisi exercitationem amet quia, architecto, aperiam quibusdam dolores delectus consectetur!</p>
                            <products-gallery :category="'Poultry'" :products="basket_items.filter(item => item.category == 'Poultry')"></products-gallery>
                        </div>

                        <div>
                            <h2>title</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam reprehenderit accusamus at fuga porro qui natus mollitia, vitae ea corporis harum incidunt veniam ducimus pariatur officia voluptates tempore nisi. Incidunt!</p>
                    
                            <products-gallery :category="'Fruits'" :products="basket_items.filter(item => item.category == 'Fruits')"></products-gallery>
                        </div>

                        <div>
                            <h2>title</h2>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae molestiae aliquid quos, accusantium quia, cum modi eligendi voluptatem repellendus sit expedita beatae vitae minima sed? Mollitia harum dolores inventore esse?</p>
                            <products-gallery :category="'Herbs'" :products="basket_items.filter(item => item.category == 'Herbs')"></products-gallery>
                        </div>
                    </v-col>
                </v-row>
                <hr>

                
              

                <v-row>
                    <v-col>
                        <h1>Title</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit ducimus in perferendis laborum facilis expedita mollitia suscipit eligendi accusamus voluptatibus repellat ipsa perspiciatis maxime consectetur, voluptate quibusdam reiciendis aperiam nisi!</p>
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
