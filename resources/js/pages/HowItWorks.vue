<template>
    <v-container class="how-it-works-body">
        <div class="banner"></div>

        <div class="flex-fill">
            <h1>How it Works</h1>
            <v-row>
                <v-col class="column" cols="12" md="4" lg="4" xl="4">
                    <img src = "https://gcdnb.pbrd.co/images/SgJYnNDWxIWN.png?o=1" width = "135" height = "122" class = "center">
                    <h3>Choose the Basket of Your Choice</h3>
                    <p>Choose a basket size (big, medium, and small) and provide us with the name and contact number of the person who will receive the delivery.</p>
                </v-col>
                <v-col class="column" cols="12" md="4" lg="4" xl="4">
                    <img src="https://gcdnb.pbrd.co/images/p47Ix3sIUkdw.png?o=1" width = "135" height = "130">
                    <h3>During the Delivery</h3>
                    <p>Prepare your cash or online payment.</p>
                </v-col>
                <v-col class="column" cols="12" md="4" lg="4" xl="4">
                    <img src="https://gcdnb.pbrd.co/images/BkB1fWe5fhuG.png?o=1" width = "135" height = "130" >
                    <h3>After the Delivery</h3>
                    <p>Enjoy! Please let us know what you think about our products and service.</p>
                </v-col>
            </v-row>

            <div class="next_button">
                <router-link to="/product-list">
                    <button>PRODUCTS</button>
                </router-link>
                <router-link to="/subscribe">
                <button>SUBSCRIBE</button>
            </router-link>
            </div>
        </div>
    </v-container>
</template>

<script>

</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@1,500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
    }
    .how-it-works-body{
        padding: 0;
        padding-right: 2rem;
        padding-top: 2rem;
        padding-bottom: 2rem;
        margin: 0;
        box-sizing: border-box;
    }

    .navigation_bar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 8rem;
        width: 100%;
        background-color: #4d783f;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 7%;
        box-sizing: content-box;
        box-shadow: var (--box-shadow);
        z-index: 1000;
    }

    .left_section {
        display: flex;
        align-items: center;
    }

    .logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #ffffff;
    }

    .company_name {
        color: #ffffff;
        margin-left: 5px;
        font-weight: bold;
        font-family: 'Gelasio', serif;
        font-style: italic;
    }

    .right_section {
        display: flex;
        align-items: center;
    }

    .navigation_links {
        display: flex;
        list-style: none;
        margin-right: 20px;
        justify-content: center;
        align-items: center;
        padding: 1rem;
        border-bottom: 2px solid transparent;
    }

    .navigation_links li {
        color: #ffffff;
        margin-right: 15px;
        cursor: pointer;
    }

    .content_section {
        margin-top: 150px;
        margin-left: 100px;
    }

    h1 {
        font-size: 45px;
        font-weight: 600;
        font-style: italic;
        font-family: 'Gelasio', serif;
        color: #2d4d22;
    }

    p {
        font-size: 20px;
        color: #000;
    }

    .navigation_bar {
        height: 100px;
        width: 100%;
        background-color: #4d783f;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 50px;
        font-family: 'Inter', sans-serif;
        font-size: 20px;
        color: #ffffff;

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


    .logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: white;
    }

    .company_name {
        margin-left: 10px;
        font-size: 50px;
        color: white;
    }


    .user_section {
        display: flex;
        align-items: center;
    }

    .button_set_a {
        width: 158px;
        height: 52px;
        border-radius: 13px;
        background-color: #2d4d22;
        font-family: 'Inter', sans-serif;
        font-weight: bold;
        font-size: 18px;
        color: #ffffff;
    }

    .sign_up_button {
        width: 158px;
        height: 52px;
        border-radius: 13px;
        background-color: #C7C47F;
        font-family: 'Inter', sans-serif;
        font-weight: bold;
        font-size: 18px;
        color: #2d4d22;

    }

    h1 {
        font-size: 45px;
        font-weight: 600;
        font-style: italic;
        font-family: 'Gelasio', serif;
        color: #2d4d22;
        margin-bottom: 20px;
        text-align: center;
    }

    h1:after {
        content: '';
        display: block;
        border-bottom: 2px solid #2d4d22;
        width: 50%;
        margin: auto;
        box-sizing: border-box;
    }

    h3 {
        font-size: 25px;
        font-weight: 600;
        /* font-style: italic; */
        font-family: 'Inter', sans-serif;
        color: #2d4d22;
        margin-bottom: 20px;
        text-align: center;
    }

    .row {
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .column {
        text-align: center;
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

    .next_button {
        display: flex;
        justify-content: center;
        margin-top: 40px; /* Increased margin for spacing */
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
        .next_button router-link {
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
    .next_button .button_set_a {
        font-size: 20px;
    }
</style>
