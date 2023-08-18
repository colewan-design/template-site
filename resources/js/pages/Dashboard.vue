<template>
    <v-container class="dashboard-body">
        <div class="flex-fill">
            <v-row>
                <v-col cols="12" md="4" lg="4" xl="4">
                    <v-img aspect-ratio="4/3" class="d-flex d-sm-none" src="https://images.pexels.com/photos/2223238/pexels-photo-2223238.jpeg?auto=compress&cs=tinysrgb&w=600"></v-img>
                    <v-img width="500" height="650" class="d-none d-sm-flex" src="https://images.pexels.com/photos/2223238/pexels-photo-2223238.jpeg?auto=compress&cs=tinysrgb&w=600"></v-img>
                </v-col>
                <v-col cols="12" md="8" lg="8" xl="8">
                    <h1>Premium Products and Goodies, Delivered Straight to Your Doorstep</h1>
                    <p style="text-align: justify;">
                        Siged Tiklis offers well-balanced, healthy, and affordable food in one basket.  These baskets include fresh and processed vegetables and fruits from farmers, tailored to your health needs. Siged Tiklis engages with different groups, such as Atok Organic Practitioners Association, Inc. (ATOPAI) for highland vegetables and the Aduyon Organic Farmers Association (AOFA) for fruits and poultry supplies. The supply is updated weekly based on the organization's crops.
                    </p>
                    <!-- sign up -->
                    <router-link to="/sign-up" v-slot="{ navigate }" custom>
                        <v-btn class="button_set_a d-flex d-sm-none ma-2" block @click="navigate" role="link">Get Started</v-btn>
                        <v-btn class="button_set_a d-none d-sm-flex ma-4 mx-auto" width="30em" @click="navigate" role="link">Get Started</v-btn>
                    </router-link>
                </v-col>
            </v-row>
        </div>
    </v-container>
</template>

<script>
    import router from '../routes.js';
    export default {

    }
</script>

<style scoped>
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
            font-size: 	21.333px;
        }
    }
    body {
        font-family: 'Inter', sans-serif;
    }
    .dashboard-body{
        padding: 0;
        padding-right: 2rem;
        padding-top: 2rem;
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
        margin-left: 10px;
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
        /* width: 158px;
        height: 52px; */
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
</style>
