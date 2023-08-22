<template>
  
    <v-container class="user-plan-body">
      <v-card width="500" title="Choose your Subscription">
          <v-container>
              <v-row>
                  <router-link to="/user-account" v-slot="{ navigate }" custom>
                      <v-btn class="button_set_a d-flex d-sm-none ma-2" @click="navigate" role="link">User Account</v-btn>
                  </router-link>
              </v-row>
          </v-container>
      </v-card>
      <v-row class="plan-card-row pd-left-2" v-for="plan in plans" :key="plan.id">
        <v-card class="subscription-card" outlined width="600">
          <v-card-title class="headline">Premium Subscription</v-card-title>
          <v-card-subtitle class="subheading">Only $9.99/month</v-card-subtitle>
          <v-card-text>
            <v-list dense>
              <v-list-item v-for="detail in plan.details" :key="detail.id">
                <v-list-item-content>{{ detail.label }}</v-list-item-content>
              </v-list-item>
            </v-list>
          </v-card-text>
          <v-card-actions>
            <v-btn color="primary">Subscribe Now</v-btn>
          </v-card-actions>
        </v-card>
      </v-row>
    </v-container>
</template>

<script>
  export default {
    name: "UserPlan",
    data() {
      return {
        currentPlanId: 2, // Set the current plan ID here (e.g., 2 for Plan 2)
        plans: [
          {
            id: 1,
            name: "Plan 1",
            price: "PHP 599 / Week",
            details: [
              { id: 1, label: "Details..." },
              { id: 2, label: "Details" },
              { id: 3, label: "Details" },
            ],
          },
          {
            id: 2,
            name: "Plan 2",
            price: "PHP 999 / Week",
            details: [
              { id: 1, label: "Details..." },
              { id: 2, label: "Details" },
              { id: 3, label: "Details" },
            ],
          },
          {
            id: 3,
            name: "Plan 3",
            price: "PHP 1,599 / Week",
            details: [
              { id: 1, label: "Details..." },
              { id: 2, label: "Details" },
              { id: 3, label: "Details" },
            ],
          },
        ],
      };
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
  };
  </script>

<style>
 @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@1,500&display=swap');
 @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

  /* mobile screen */
    @media only screen and (max-width: 600px) {
        .user-plan-body{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        
        }
        h1{
            font-weight: bold;
            text-transform: uppercase; 
            font-size:32px !important;
        }
        p{
            font-size: 	21.333px;
        }
        .pd-left-2{
        padding-left: 2rem;
      }

        .subscription-card {
          max-width: 400px;
          margin: 20px;
          padding: 20px;
          text-align: center;
        }

        .headline {
          font-size: 24px;
          font-weight: bold;
          background-color: aquamarine;
        }

        .subheading {
          font-size: 18px;
          color: #757575;
          margin-bottom: 10px;
        }

        ul {
          list-style-type: none;
          padding: 0;
        }

        li {
          margin-bottom: 5px;
        }

        /* .v-btn {
          margin-top: 10px;
        } */
    }
    /* large screen */
    @media (min-width: 1200px) {
     .user-plan-body{
        padding: 0;
        padding-right: 10rem;
        margin: 0;
        box-sizing: border-box;
        }
        .plan-card-row{
            
        padding-right: 10rem;
        }
    }
    /* medium screen */
    @media (min-width: 960px) and (max-width: 1200px) {
     .user-plan-body{
        padding: 0;
        padding-right: 2rem;
        margin: 0;
        box-sizing: border-box;
        }
        .plan-card-row{
            
        padding-right: 2rem;
        }
    }

    /* small screen */
    @media (min-width: 600px) and (max-width: 960px) {
     .user-plan-body{
        padding: 0;
        padding-right: 2rem;
        margin: 0;
        box-sizing: border-box;
        }
        .plan-card-row{
            
        padding-right: 2rem;
        }
    }

  .price {
    border: 1px solid #eee;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    min-width: 250px;
  }
  
  .price:hover {
    box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2);
  }
  
  .header {
    background-color: #214e24;
    color: white;
    font-size: 25px;
  }
  
  .grey {
    background-color: #eee;
    font-size: 20px;
  }
  
  .button {
    background-color: #04aa6d;
    color: white;
    font-size: 18px;
  }
  </style>
