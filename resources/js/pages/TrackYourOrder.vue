<template>
  <v-container class="track-your-order-body" :width="600">
    
        <v-row style="padding:1rem;">
           <v-col>
            <router-link to="/order-history" v-slot="{ navigate }" custom>
                <v-icon @click="navigate">
                    mdi-chevron-left
                </v-icon>
                Delivery Detail
            </router-link>
           </v-col>
      
           <v-col style="color: red;" class="ta-right">
            View Order Detail
           </v-col>
        </v-row>
      
    <v-row>
       <v-card width="600" flat style="margin-top: 1rem; padding: 0 1rem;">
        <v-container>
            <v-row>
                <v-col cols="6">
                    <v-container class="delivery-detail-main">
                        <v-row class="fw-900">
                            Delivered!
                        </v-row>
                        <v-row class="fs-12">
                            Package  was delivered on
                        </v-row>
                        <v-row class="fs-32 fw-900">
                            Jul 28 2023
                        </v-row>
                    </v-container>
                </v-col>
                <v-col cols="6">
                    <v-img
                            :src="`https://picsum.photos/500/300?image`"
                            :lazy-src="`https://picsum.photos/10/6?image`"
                            aspect-ratio="1"
                            cover
                            class="bg-grey-lighten-2 image-with-border-radius"
                            max-height="120"
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
            </v-row>
            <v-row>

            </v-row>
        </v-container>
       </v-card>
       <v-card width="600" style="padding-left: 1rem;">
        <v-container>
            <v-row>
                <v-col cols="2">
                    <v-img
                            :src="`https://picsum.photos/500/300?image`"
                            :lazy-src="`https://picsum.photos/10/6?image`"
                            aspect-ratio="1"
                            cover
                            class="bg-grey-lighten-2 image-with-border-radius"
                            max-height="50"
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
                <v-col cols="1"></v-col>
                <v-col cols="9">
                    Delivery Partner: J&T Express PH
                </v-col>
            </v-row>
            <v-row style="padding-top: 1rem;">
                <v-divider></v-divider>
            </v-row>
            <v-row style="padding-top: 2rem;">
               <span style="padding-right: 1rem;"> Tracking Number: <span style="color: blue;">0000000000</span>  </span>
                <v-icon color="blue">mdi-server-plus</v-icon>
            </v-row>
        </v-container>
       </v-card>
        <v-card width="600" style="padding-left: 1rem;" flat>
           <v-container>
            <v-row>
                <v-col cols="1">
                    <v-icon size="30">mdi-playlist-plus</v-icon>
                </v-col>
                <v-col>
                    <v-container>
                        <v-row class="fs-12 fw-900">
                            Receiver: John Jones
                        </v-row>
                        <v-row class="fs-8 fw-100">
                            Loakan Baguio Philippines
                        </v-row>
                    </v-container>
                </v-col>
            </v-row>
            
           </v-container>
        </v-card>
        <v-timeline side="end" align="start" width="600">
            <v-timeline-item v-for="n in deliveryInfo" :key="n"
            dot-color="pink"
            size="small"
            width="600"
            >
            <v-container>
            <v-row>
                <v-col cols="3">
                    <v-container class="fs-12">
                    <v-row>
                        {{ n.date }}
                    </v-row>
                    <v-row>
                        {{ n.time }}
                    </v-row>
                    </v-container>
                </v-col>
                <v-col cols="8" class="ta-left">
                    <v-container >
                        <v-row class="fs-14">
                            {{ n.status }}
                        </v-row>
                        <v-row class="fs-12">
                            {{ n.description }}
                        </v-row>
                        <v-row class="fs-12">
                            {{ n.received_by }}
                        </v-row>
                        <v-row>
                            
                        </v-row>
                    </v-container>
                </v-col>
            </v-row>
            </v-container>
            </v-timeline-item>
        </v-timeline>
      
    </v-row>

    
 
  </v-container>
  
</template>

<script>
  export default {
    data: () => ({
      deliveryInfo: [
        {
          status: 'Delivered',
          description: 'Package has been delivered.',
          date: `Mar 22`,
          time: '10:42am',
          notice: 'Please check item if complete and in good condition. For filling a Return/Refund, click "View Order Detail" on the top right portion of this page. ',
          delivery_location: 'Baguio',
          color: 'deep-purple-lighten-1',
          received_by: 'John Doe',
        },
        {
            status: 'Delivered',
          description: 'Package has been delivered.',
          date: `Mar 22`,
          time: '10:42am',
          notice: 'Please check item if complete and in good condition. For filling a Return/Refund, click "View Order Detail" on the top right portion of this page. ',
          delivery_location: 'Baguio',
          color: 'deep-purple-lighten-1',
          received_by: 'John Doe',
        },
        {
            status: 'Delivered',
          description: 'Package has been delivered.',
          date: `Mar 22`,
          time: '10:42am',
          notice: 'Please check item if complete and in good condition. For filling a Return/Refund, click "View Order Detail" on the top right portion of this page. ',
          delivery_location: 'Baguio',
          color: 'deep-purple-lighten-1',
          received_by: 'John Doe',
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
    .fs-32{
        font-size: 32px;
    }
    .fs-14{
        font-size: 14px;
    }

    .fw-100{
        font-weight: 100;
    }
    .fs-8{
        font-size: 8px;
    }
    .delivery-detail-main{
        line-height: 200%;
    }
    .fs-12{
        font-size: 12px;
    }
    .fw-900{
        font-weight: 900;
    }
    .ta-right{
        text-align: right;
    }
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
        padding-left: .25rem;
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