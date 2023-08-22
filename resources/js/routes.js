import { createRouter, createWebHistory } from 'vue-router'

// pages
import Dashboard from './pages/Dashboard.vue'
import Login from './pages/Auth/Login.vue'
import Subscribe from './pages/Subscribe.vue'
import NotFoundComponent from './pages/Error/error_404.vue'
import HowItWorks from './pages/HowItWorks.vue'
import ProductList from './pages/ProductList.vue'
import BasketItems from './pages/BasketItems.vue'
import Basket from './pages/Basket.vue'
import Additional from './pages/Additional.vue'
import SignUp from './pages/SignUp.vue'
import UserProfile from './pages/UserProfile.vue'
import UserActivity from './pages/ActivityView.vue'
import UserPlan from './pages/UserPlan.vue'
import CraftYourMeal from './pages/CraftYourMeal.vue'
import TrackYourOrder from './pages/TrackYourOrder.vue'
import OrderHistory from './pages/OrderHistory.vue'
import UserAccount from './pages/UserAccount.vue'
import UserDashboard from './pages/UserDashboard.vue'
import UserCart from './pages/UserCart.vue'
import Merchandizer from './pages/Merchandizer.vue'
import Customers from './pages/Customers.vue'

const routes = [
    {
        path: '/',
        redirect: '/about-us',
        meta: { guest: true }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: { guest: true }
    },
    {
        path: '/subscribe',
        name: 'subscribe',
        component: Subscribe 
    },
    { 
        path: '/:pathMatch(.*)', 
        component: NotFoundComponent ,
        meta: { guest: true }
    },
    {
        path: '/how-it-works',
        name: 'how-it-works',
        component: HowItWorks
    },
    {
        path: '/product-list',
        name: 'product-list',
        component: ProductList
    },
    {
        path: '/basket-items',
        name: 'basket-items',
        component: BasketItems
    },
    {
        path: '/basket',
        name: 'basket',
        component: Basket
    },
    {
        path: '/additional',
        name: 'additional',
        component: Additional
    },
    {
        path: '/sign-up',
        name: 'sign-up',
        component: SignUp
    },
    {
        path: '/user-profile',
        name: 'user-profile',
        component: UserProfile
    },
    {
        path: '/user-activity',
        name: 'user-activity',
        component: UserActivity
    },
    {
        path: '/user-plan',
        name: 'user-plan',
        component: UserPlan
    },
    {
        path: '/craft-your-meal',
        name: 'craft-your-meal',
        component: CraftYourMeal
    },
    {
        path: '/track-your-order',
        name: 'track-your-order',
        component: TrackYourOrder
    },
    {
        path: '/order-history',
        name: 'order-history',
        component: OrderHistory
    },
    {
        path: '/user-account',
        name: 'user-account',
        component: UserAccount
    },

    {
        path: '/user-dashboard',
        name: 'user-dashboard',
        component: UserDashboard
    },
    {
        path: '/user-cart',
        name: 'user-cart',
        component: UserCart
    },
    {
        path: '/merchandizer',
        name: 'merchandizer',
        component: Merchandizer
    },
    {
        path: '/customers',
        name: 'customers',
        component: Customers
    },
    {
        path: '/about-us',
        name: 'about-us',
        component: Dashboard
    }
];



const router = createRouter({
    history: createWebHistory(),
    routes
})


// function loggedIn() {
//     return JSON.parse(localStorage.getItem("mobileUserData"))
//   }
//   router.beforeEach((to, from, next) => {
//     if (to.matched.some(record => record.meta.requiresAuth)) {
//         // this route requires auth, check if logged in
//         // if not, redirect to login page.
//         if (!loggedIn()) {
//             next({
//                 path: '/login',
//                 // query: { redirect: to.fullPath }
//             })
//         } else {
//             next({
//                 path: '/dashboard',
//                 // query: { redirect: to.fullPath }
//             })
//         }
//     } else if (to.matched.some(record => record.meta.guest)) {
//         if (loggedIn()) {
//             next({
//                 path: '/dashboard',
//                 // query: { redirect: to.fullPath }
//             })
//         } else {
//             next()
//         }
//     } else {
//         next() // make sure to always call next()!
//     }
//   })

export default router