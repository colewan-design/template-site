<template>
    <v-container class="dashboard-body">
        <div class="flex-fill">
            <v-row>
                <v-col cols="12" md="8" lg="8" xl="8">
                  
                    <!-- sign up -->
                    <!-- <router-link to="/sign-up" v-slot="{ navigate }" custom>
                        <v-btn class="button_set_a d-flex d-sm-none ma-2" block @click="navigate" role="link">Get Started</v-btn>
                        <v-btn class="button_set_a d-none d-sm-flex ma-4 mx-auto" width="30em" @click="navigate" role="link">Get Started</v-btn>
                    </router-link> -->
                </v-col>
            </v-row>
        </div>
    </v-container>
</template>

<script>
    export default {

    }
</script>

<style scoped>
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
   
</style>
