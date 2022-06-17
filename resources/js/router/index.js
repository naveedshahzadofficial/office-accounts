import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'
import Home from '../views/Home'

import Login from "../views/auth/Login";
import AdminDashboard from "../views/dashboards/AdminDashboard";

import Role from "../views/roles/Index";
import RoleCreate from "../views/roles/Create";
import RoleEdit from "../views/roles/Edit";

import User from "../views/users/Index";
import UserCreate from "../views/users/Create";
import UserEdit from "../views/users/Edit";

import Unit from "../views/units/Index";
import UnitCreate from "../views/units/Create";
import UnitEdit from "../views/units/Edit";

import Color from "../views/colors/Index";
import ColorCreate from "../views/colors/Create";
import ColorEdit from "../views/colors/Edit";

import Category from "../views/categories/Index";
import CategoryCreate from "../views/categories/Create";
import CategoryEdit from "../views/categories/Edit";

import SubCategory from "../views/sub_categories/Index";
import SubCategoryCreate from "../views/sub_categories/Create";
import SubCategoryEdit from "../views/sub_categories/Edit";

import Attribute from "../views/attributes/Index";
import AttributeCreate from "../views/attributes/Create";
import AttributeEdit from "../views/attributes/Edit";

import AttributeValue from "../views/attribute_values/Index";
import AttributeValueCreate from "../views/attribute_values/Create";
import AttributeValueEdit from "../views/attribute_values/Edit";

import Product from "../views/products/Index";
import ProductCreate from "../views/products/Create";
import ProductEdit from "../views/products/Edit";

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

    /* Begin: Colors */
    {
        path: '/admin/colors',
        name: 'admin.colors.index',
        component: Color,
        meta:{
            middleware:"auth",
            title: 'Colors'
        }
    },
    {
        path: '/admin/colors/create',
        name: 'admin.colors.create',
        component: ColorCreate,
        meta:{
            middleware:"auth",
            title: 'Colors'
        }
    },
    {
        path: "/admin/colors/edit/:id",
        name: "admin.colors.edit",
        component: ColorEdit,
        meta:{
            middleware:"auth",
            title: 'Colors'
        }
    },
    /* End: Colors */


    /* Begin: Categories */
    {
        path: '/admin/categories',
        name: 'admin.categories.index',
        component: Category,
        meta:{
            middleware:"auth",
            title: 'Categories'
        }
    },
    {
        path: '/admin/categories/create',
        name: 'admin.categories.create',
        component: CategoryCreate,
        meta:{
            middleware:"auth",
            title: 'Categories'
        }
    },
    {
        path: "/admin/categories/edit/:id",
        name: "admin.categories.edit",
        component: CategoryEdit,
        meta:{
            middleware:"auth",
            title: 'Categories'
        }
    },
    /* End: Categories */


    /* Begin: SubCategories */
    {
        path: '/admin/sub-categories',
        name: 'admin.sub-categories.index',
        component: SubCategory,
        meta:{
            middleware:"auth",
            title: 'SubCategories'
        }
    },
    {
        path: '/admin/sub-categories/create',
        name: 'admin.sub-categories.create',
        component: SubCategoryCreate,
        meta:{
            middleware:"auth",
            title: 'SubCategories'
        }
    },
    {
        path: "/admin/sub-categories/edit/:id",
        name: "admin.sub-categories.edit",
        component: SubCategoryEdit,
        meta:{
            middleware:"auth",
            title: 'SubCategories'
        }
    },
    /* End: SubCategories */

    /* Begin: Attributes */
    {
        path: '/admin/attributes',
        name: 'admin.attributes.index',
        component: Attribute,
        meta:{
            middleware:"auth",
            title: 'Attributes'
        }
    },
    {
        path: '/admin/attributes/create',
        name: 'admin.attributes.create',
        component: AttributeCreate,
        meta:{
            middleware:"auth",
            title: 'Attributes'
        }
    },
    {
        path: "/admin/attributes/edit/:id",
        name: "admin.attributes.edit",
        component: AttributeEdit,
        meta:{
            middleware:"auth",
            title: 'Attributes'
        }
    },
    /* End: Attributes */

    /* Begin: Attributes Values */

    {
        path: "/admin/attributes/:attribute_id/attribute-values",
        name: "admin.attributes.attribute-values.index",
        component: AttributeValue,
        meta:{
            middleware:"auth",
            title: 'AttributeValues'
        }
    },
    {
        path: "/admin/attributes/:attribute_id/attribute-values/create",
        name: "admin.attributes.attribute-values.create",
        component: AttributeValueCreate,
        meta:{
            middleware:"auth",
            title: 'AttributeValues'
        }
    },
    {
        path: "/admin/attributes/:attribute_id/attribute-values/edit/:id",
        name: "admin.attributes.attribute-values.edit",
        component: AttributeValueEdit,
        meta:{
            middleware:"auth",
            title: 'AttributeValues'
        }
    },

    /* End: Attributes Values */


    /* Begin: Products */
    {
        path: '/admin/products',
        name: 'admin.products.index',
        component: Product,
        meta:{
            middleware:"auth",
            title: 'Products'
        }
    },
    {
        path: '/admin/products/create',
        name: 'admin.products.create',
        component: ProductCreate,
        meta:{
            middleware:"auth",
            title: 'Products'
        }
    },
    {
        path: "/admin/products/edit/:id",
        name: "admin.products.edit",
        component: ProductEdit,
        meta:{
            middleware:"auth",
            title: 'Products'
        }
    },
    /* End: Products */

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
