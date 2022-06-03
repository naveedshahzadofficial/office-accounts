import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'
import Home from '../views/Home.vue'

import Login from "../views/auth/Login";
import AdminDashboard from "../views/dashboards/AdminDashboard";

import Role from "../views/roles/Index.vue";
import RoleCreate from "../views/roles/Create";
import RoleEdit from "../views/roles/Edit";

import User from "../views/users/Index.vue";
import UserCreate from "../views/users/Create";
import UserEdit from "../views/users/Edit";

import Unit from "../views/units/Index.vue";
import UnitCreate from "../views/units/Create";
import UnitEdit from "../views/units/Edit";

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'default-login',
        component: Login,
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
            title: 'Dashboard'
        }
    },
    /* Begin: Roles */
    {
        path: '/admin/roles',
        name: 'admin.roles.index',
        component: Role,
        meta:{
            middleware:"auth",
            title: 'Roles'
        }
    },
    {
        path: '/admin/roles/create',
        name: 'admin.roles.create',
        component: RoleCreate,
        meta:{
            middleware:"auth",
            title: 'Roles'
        }
    },
    {
        path: "/admin/roles/edit/:id",
        name: "admin.roles.edit",
        component: RoleEdit,
        meta:{
            middleware:"auth",
            title: 'Roles'
        }
    },
    /* End: Roles */

    /* Begin: Users */
    {
        path: '/admin/users',
        name: 'admin.users.index',
        component: User,
        meta:{
            middleware:"auth",
            title: 'Users'
        }
    },
    {
        path: '/admin/users/create',
        name: 'admin.users.create',
        component: UserCreate,
        meta:{
            middleware:"auth",
            title: 'Users'
        }
    },
    {
        path: "/admin/users/edit/:id",
        name: "admin.users.edit",
        component: UserEdit,
        meta:{
            middleware:"auth",
            title: 'Users'
        }
    },
    /* End: Users */

    /* Begin: Units */
    {
        path: '/admin/units',
        name: 'admin.units.index',
        component: Unit,
        meta:{
            middleware:"auth",
            title: 'Units'
        }
    },
    {
        path: '/admin/units/create',
        name: 'admin.units.create',
        component: UnitCreate,
        meta:{
            middleware:"auth",
            title: 'Units'
        }
    },
    {
        path: "/admin/units/edit/:id",
        name: "admin.units.edit",
        component: UnitEdit,
        meta:{
            middleware:"auth",
            title: 'Units'
        }
    },
    /* End: Units */

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
