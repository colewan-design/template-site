import { createRouter, createWebHistory } from 'vue-router'
import store from './store.js'

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
import UserReview from './pages/UserReview.vue'

const user_data = JSON.parse(localStorage.getItem('user_data'));
const permissions = user_data !== null && user_data !== undefined ? user_data.permissions : [];

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
        component: Subscribe,
        meta: { guest: true }
    },
    { 
        path: '/:pathMatch(.*)', 
        component: NotFoundComponent ,
        meta: { guest: true }
    },
    {
        path: '/how-it-works',
        name: 'how-it-works',
        component: HowItWorks,
        meta: { guest: true }
    },
    {
        path: '/product-list',
        name: 'product-list',
        component: ProductList,
        meta: { guest: true }
    },
    {
        path: '/basket-items',
        name: 'basket-items',
        component: BasketItems,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('basketItems-crud') : false) }
    },
    {
        path: '/basket',
        name: 'basket',
        component: Basket,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('baskets-crud') : false) }
    },
    {
        path: '/additional',
        name: 'additional',
        component: Additional,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('additional-crud') : false) }
    },
    {
        path: '/sign-up',
        name: 'sign-up',
        component: SignUp,
        meta: { guest: true }
    },
    {
        path: '/user-profile',
        name: 'user-profile',
        component: UserProfile,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('userProfile-update') : false) }
    },
    {
        path: '/user-activity',
        name: 'user-activity',
        component: UserActivity,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('users-crud') : false) }
    },
    {
        path: '/user-plan',
        name: 'user-plan',
        component: UserPlan,
        meta: { guest: true }
    },
    {
        path: '/user-review',
        name: 'user-review',
        component: UserReview,
        meta: { guest: true }
    },
    {
        path: '/craft-your-meal',
        name: 'craft-your-meal',
        component: CraftYourMeal,
        meta: { guest: true }
    },
    {
        path: '/track-your-order',
        name: 'track-your-order',
        component: TrackYourOrder,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('orders-crud') || permissions.includes('orders-read') : false) }
    },
    {
        path: '/order-history',
        name: 'order-history',
        component: OrderHistory,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('orders-crud') || permissions.includes('orders-read') : false) }
    },
    {
        path: '/user-account',
        name: 'user-account',
        component: UserAccount,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('userProfile-update') : false) }
    },

    {
        path: '/user-dashboard',
        name: 'user-dashboard',
        component: UserDashboard,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('user-dashboard') : false) }
    },
    {
        path: '/user-cart',
        name: 'user-cart',
        component: UserCart,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('user-cart') : false) }
    },
    {
        path: '/merchandizer',
        name: 'merchandizer',
        component: Merchandizer,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('users-crud') : false) }
    },
    {
        path: '/customers',
        name: 'customers',
        component: Customers,
        meta: { guest: (permissions !== null && permissions !== undefined && permissions.length > 0 ? permissions.includes('users-crud') : false) }
    },
    {
        path: '/about-us',
        name: 'about-us',
        component: Dashboard,
        meta: { guest: true }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

/**
 * Navigation guards
 */
function loggedIn() {
    return JSON.parse(localStorage.getItem("user_data"))
}
router.beforeEach((to, from, next) => {
    if(to.meta.guest == true) {
        // guest is allowed
        if (to.matched.some(record => record.meta.requiresAuth)) {
            // this route requires auth, check if logged in
            // if not, redirect to login page.
            if (!loggedIn() && to.name != 'login') {
                next({
                    path: '/login',
                })
            } else {
                next()
            }
        } else if (to.matched.some(record => record.meta.guest)) {
            if (loggedIn()) {
                // next({
                //     path:'/product-list',
                // })
                next()
            } else {
                if (!loggedIn() && to.meta.guest === false) 
                    next({ path: '/login' })
                else
                    next()
            }
        } else {
            next() // make sure to always call next()!
        }
    } else {
        // guest has restricted access
        next({
            path: '/login',
        })
        this.$swal('Restricted Access', 'You are not authorized to access that page', 'warning');
    }
})

export default router