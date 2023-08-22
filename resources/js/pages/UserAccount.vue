<template>
    <v-container class="track-your-order-body">
        <v-window v-model="tab" :touch="{left: null, right: null}">
            <v-window-item :value="1" key="sub2">
                <v-row justify="space-around">
                    <v-card width="600" style="padding-left: 1rem;padding-top: 1rem;">
                        <v-container>
                            <v-row>
                                <v-col>
                                    <router-link to="/user-dashboard" v-slot="{ navigate }" custom>
                                        <v-icon @click="navigate">
                                            mdi-menu-left
                                        </v-icon>
                                         Dashboard
                                    </router-link>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card>

                    <v-card class="margin-1" width="600" height="100">
                        <v-container>
                            <v-row>
                                <v-col cols="3" @click="sheet = !sheet">
                                    <v-img aspect-ratio="1" width="100" src="/img/placeholder/jk-placeholder-image-300x203.jpg" cover></v-img>
                                </v-col>
                                <v-col cols="8">
                                    <v-container class="user-account-banner">
                                        <v-row>
                                            <v-col>
                                            <h1> John A. Doe</h1>
                                            </v-col>

                                        </v-row>
                                        <v-row>
                                            <v-col>
                                                18 My Likes
                                            </v-col>
                                            <v-col>
                                                6 Followed Stores
                                            </v-col>
                                            <v-col>
                                                8 Vouchers
                                            </v-col>
                                            
                                        </v-row>
                                    </v-container>
                                </v-col>
                                <v-col cols="1">
                                    <v-icon size="20" @click="tab = 2">mdi-chevron-double-left</v-icon>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card>
            
                    <v-card class="margin-1 my-orders-card" width="600">
                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col cols="9">
                                        My Orders
                                    </v-col>
                                    <router-link to="/order-history" v-slot="{ navigate }" custom>
                                        <v-col cols="3">
                                        
                                        <div @click="navigate" role="link">See all orders</div>
                                 
                                
                                        </v-col>
                                     </router-link>
                                </v-row>
                            </v-container>
                        </v-card-text>

                        <v-card-actions>
                            <v-container>
                                <v-row>
                                    <v-col>
                                        <v-container>
                                            <v-row>
                                                <v-btn> <v-icon size="32">mdi-wallet-travel</v-icon></v-btn>
                                            </v-row>
                                            <v-row class="point-2-px-margin-left">
                                                To Pay
                                            </v-row>
                                        </v-container>
                                    </v-col>
                                    <v-col>
                                        <v-container>
                                            <v-row>
                                                <v-btn> <v-icon size="32">mdi-truck</v-icon></v-btn>
                                            </v-row>
                                            <v-row class="point-2-px-margin-left">
                                                To Ship
                                            </v-row>
                                        </v-container>
                                    </v-col>
                                    <v-col>
                                        <v-container>
                                            <v-row>
                                                <v-btn> <v-icon size="32">mdi-package-variant-closed</v-icon></v-btn>
                                            </v-row>
                                            <v-row>
                                                To Receive
                                            </v-row>
                                        </v-container>
                                    </v-col>
                                    <v-col>
                                        <v-container>
                                            <v-row>
                                                <v-btn> <v-icon size="32">mdi-comment-processing</v-icon></v-btn>
                                            </v-row>
                                            <v-row>
                                                To Review
                                            </v-row>
                                        </v-container>
                                    </v-col>

                                    <v-col>
                                        <v-container>
                                            <v-row>
                                                <v-btn> <v-icon size="32">mdi-briefcase-upload</v-icon></v-btn>
                                            </v-row>
                                            <v-row>
                                                Cancellations
                                            </v-row>
                                        </v-container>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-actions>
                    </v-card>
            
                    <v-card class="margin-1" title="Receiver Name and Address">
                        <v-card-text>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea provident ad nesciunt accusantium? Amet aspernatur libero assumenda sunt dolores! Sequi ducimus magni repellat fugit sit vitae assumenda ipsum adipisci recusandae?
                        </v-card-text>
                    </v-card>
            
                    
                </v-row>

                <v-row>
                    <v-card class="margin-1 my-orders-card" width="600">
                    <v-card-actions>
                            <v-container>
                                <v-row>
                                    <v-col>
                                        <v-container>
                                            <v-row>
                                                <v-btn> <v-icon size="32">mdi-message-plus</v-icon></v-btn>
                                            </v-row>
                                            <v-row class="point-2-px-margin-left">
                                                Chat With Customer Care
                                            </v-row>
                                        </v-container>
                                    </v-col>
                                    <v-col>
                                        <v-container>
                                            <v-row>
                                                <v-btn> <v-icon size="32">mdi-comment-text</v-icon></v-btn>
                                            </v-row>
                                            <v-row class="point-2-px-margin-left">
                                                My Review
                                            </v-row>
                                        </v-container>
                                    </v-col>
                                    <v-col>
                                        <router-link to="/user-plan" v-slot="{ navigate }" custom>
                                            <v-container @click="navigate" >
                                                <v-row>
                                                    <v-btn> <v-icon size="32">mdi-gesture-double-tap</v-icon></v-btn>
                                                </v-row>
                                                <v-row>
                                                    Subscription
                                                </v-row>
                                            </v-container>
                                        </router-link>
                                    </v-col>
                                    <v-col>
                                        <v-container>
                                            <v-row>
                                                <v-btn> <v-icon size="32">mdi-restore</v-icon></v-btn>
                                            </v-row>
                                            <v-row>
                                                Recently Viewed
                                            </v-row>
                                        </v-container>
                                    </v-col>

                                   
                                </v-row>
                                <v-row>
                                    <v-col cols="3">
                                        <v-container>
                                            <v-row>
                                                <v-btn> <v-icon size="32">mdi-help-circle</v-icon></v-btn>
                                            </v-row>
                                            <v-row class="point-2-px-margin-left">
                                                Help
                                            </v-row>
                                        </v-container>
                                    </v-col>

                                    <v-col cols="3">
                                        <router-link to="/user-cart" v-slot="{ navigate }" custom>
                                            <v-container @click="navigate" >
                                                <v-row>
                                                    <v-btn> <v-icon size="32">mdi-cart</v-icon></v-btn>
                                                </v-row>
                                                <v-row class="point-2-px-margin-left">
                                                    Cart
                                                </v-row>
                                            </v-container>
                                        </router-link>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-actions>
                </v-card>
                </v-row>
            
            </v-window-item>

            <v-window-item :value="2" key="sub2">
            
                <v-row justify="space-around">
                    <v-card class="margin-1" width="600" height="50">
                        <v-container>
                        <v-row>
                            <v-col cols="1">
                                <v-icon @click="tab = 1">mdi-arrow-left</v-icon>
                            </v-col>

                            <v-col cols="8">
                                <h2>Settings</h2>
                            </v-col>
                           

                        </v-row>
                        </v-container>
                    </v-card>
                </v-row>
          
                    <v-container>
                        <v-row>
                           <!-- <v-card-text>
                            Account Information
                           </v-card-text> -->
                           <router-link to="/user-profile" v-slot="{ navigate }" custom>
                                    <v-btn block @click="navigate" role="link"> Account Information</v-btn>
                                    <v-btn class="button_set_a d-none d-sm-flex ma-4 mx-auto" width="30em" @click="navigate" role="link">Account Information</v-btn>
                            </router-link>
                        </v-row>
                    </v-container>
            
                       
                       <v-container>
                        <v-row>
                         <v-col>
                            <v-btn block> Address Book</v-btn>
                         </v-col>
                        </v-row>
                       </v-container>
                       
                       <v-container>
                        <v-row>
                            <v-btn block> Messages</v-btn>
                        </v-row>
                       </v-container>

                       <v-container>
                        <v-row>
                            <v-btn block> Account Security</v-btn>
                        </v-row>
                       </v-container>

                      <v-container>
                        <v-row>
                            <v-btn block> Help</v-btn>
                        </v-row>
                      </v-container>
                      <v-container>
                        <v-row>
                            <v-btn block> FeedBack</v-btn>
                        </v-row>
                      </v-container>
                 
        
                
                <v-card>
                    <v-container>
                        <v-row>
                            <v-btn block>Logout</v-btn>
                        </v-row>
                    </v-container>

                </v-card>
              
            
            </v-window-item>
        </v-window>
       
   
    </v-container>
    
  </template>
  
  <script>
    export default {
      data: () => ({
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
      .my-orders-card{
        font-size: 12px;

      }
      .point-2-px-margin-left{
        margin-left: 2px;
      }
      .user-account-banner{
        font-size: 12px;
      }
      .v-col {
         padding: 0;
         margin: 0;
      }
      /* .v-btn {
         padding-right: 1rem;
      } */
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