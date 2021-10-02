import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'
import Home from '../views/Home.vue'

import Advice from "../views/advices/Index.vue";
import Login from "../views/auth/Login";
import AdminDashboard from "../views/dashboards/AdminDashboard";
import AdviceCreate from "../views/advices/AdviceCreate";
import AdviceEdit from "../views/advices/AdviceEdit";

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta:{
            middleware:"guest",
            title: 'Home'
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta:{
            middleware:"guest",
            title: 'Login'
        }
    },
    {
        path: '/admin/dashboard',
        name: 'admin.dashboard',
        component: AdminDashboard,
        meta:{
            middleware:"auth",
            title: 'Login'
        }
    },
    {
        path: '/admin/advices',
        name: 'admin.advices.index',
        component: Advice,
        meta:{
            middleware:"auth",
            title: 'Advices'
        }
    },
    {
        path: '/admin/advices/create',
        name: 'admin.advices.create',
        component: AdviceCreate,
        meta:{
            middleware:"auth",
            title: 'Advices'
        }
    },
    {
        path: "/admin/advices/edit/:id",
        name: "admin.advices.edit",
        component: AdviceEdit
    },
    {
        path: '/about',
        name: 'About',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "about" */ '../views/About.vue'),
        meta:{
            middleware:"guest",
            title: 'About'
        }
    }
]

const router = new VueRouter({
    mode: 'history',
    //base: process.env.MIX_BASE_URL,
    routes
})

/*router.beforeEach((to, from ,next) => {
   document.title = `${to.meta.title} - ${process.env.MIX_APP_NAME}`
   if(to.meta.middleware=="guest") {
       if (store.state.auth.authenticated) {
           next()
       }
       next()
   }else{
       if (store.state.auth.authenticated) {
           next()
       }else{
           next({ name: 'Login' })
       }
   }
});*/

export default router
