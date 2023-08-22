<template>
  <v-container class="track-your-order-body">
    <v-row style="padding: 1rem;">
           <v-card width="600">
                <router-link to="/order-history" v-slot="{ navigate }" custom>
                    <v-btn class="button_set_a d-flex d-sm-none ma-2" block @click="navigate" role="link">Order History</v-btn>
                    <v-btn class="button_set_a d-none d-sm-flex ma-4 mx-auto" width="30em" @click="navigate" role="link">Order History</v-btn>
                </router-link>
            </v-card>
          
        </v-row>
    <v-row justify="space-around">
        <v-card class="margin-1" title="Your order will be delivered within next hour">
            <v-card-text>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea provident ad nesciunt accusantium? Amet aspernatur libero assumenda sunt dolores! Sequi ducimus magni repellat fugit sit vitae assumenda ipsum adipisci recusandae?
            </v-card-text>
        </v-card>

        <v-card class="margin-1" title="Courier Partner">
            <v-card-text>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea provident ad nesciunt accusantium? Amet aspernatur libero assumenda sunt dolores! Sequi ducimus magni repellat fugit sit vitae assumenda ipsum adipisci recusandae?
            </v-card-text>
            <v-divider color="success"></v-divider>
            <v-card-text>
                Tracking Number
            </v-card-text>
        </v-card>

        <v-card class="margin-1" title="Receiver Name and Address">
            <v-card-text>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea provident ad nesciunt accusantium? Amet aspernatur libero assumenda sunt dolores! Sequi ducimus magni repellat fugit sit vitae assumenda ipsum adipisci recusandae?
            </v-card-text>
        </v-card>

        <v-card width="600" class="delivery-info-card margin-1">
            <v-card-text>
            <div class="font-weight-bold ms-1 mb-2">Delivery Info</div>

            <v-timeline density="compact" align="start">
                <v-timeline-item
                v-for="delivery in deliveryInfo"
                :key="delivery.time"
                :dot-color="delivery.color"
                size="x-small"
                >
                <div class="mb-4">
                    <div class="font-weight-normal">
                    <strong>{{ delivery.status }}</strong> @{{ delivery.time }}
                    </div>
                    <div>{{ delivery.date }}</div>
                </div>
                </v-timeline-item>
            </v-timeline>
            </v-card-text>
        </v-card>
    </v-row>

    
 
  </v-container>
  
</template>

<script>
  export default {
    data: () => ({
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
        .track-your-order-body{
        padding: 0;
        padding-right: 2rem;
        margin: 0;
        box-sizing: border-box;
        
    }
    .v-col {
       padding: 0;
       margin: 0;
    }
    .delivery-info-card{
        padding-right: 2rem;
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
    .margin-1{
        margin: .5rem;
    }

   
 }


</style>