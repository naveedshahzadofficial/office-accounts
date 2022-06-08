<template>
    <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
            <img alt="PMS PPRA" class="w-10" :src="dashboardLogo">
            <span class="hidden xl:block text-white text-lg ml-3"> PAS <span class="font-medium">&nbsp;PPRA</span> </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <router-link class="side-menu" :to="{ name: 'admin.dashboard'}" :class="{'side-menu--active':activeMenu==='Dashboard'}">
                    <div class="side-menu__icon"><feather type="home"></feather></div>
                    <div class="side-menu__title"> Dashboard </div>
                </router-link>
            </li>

            <li v-if="isSuperAdmin || isAdmin">
                <router-link class="side-menu" :to="{ name: 'admin.roles.index'}" :class="{'side-menu--active':activeMenu==='Roles'}">
                    <div class="side-menu__icon"><feather type="lock"></feather></div>
                    <div class="side-menu__title"> Roles </div>
                </router-link>
            </li>

            <li v-if="isSuperAdmin || isAdmin">
                <router-link class="side-menu" :to="{ name: 'admin.users.index'}" :class="{'side-menu--active':activeMenu==='Users'}">
                    <div class="side-menu__icon"><feather type="users"></feather></div>
                    <div class="side-menu__title"> Users </div>
                </router-link>
            </li>

            <li v-if="isSuperAdmin || isAdmin">
                <router-link class="side-menu" :to="{ name: 'admin.units.index'}" :class="{'side-menu--active':activeMenu==='Units'}">
                    <div class="side-menu__icon"><feather type="triangle"></feather></div>
                    <div class="side-menu__title"> Units </div>
                </router-link>
            </li>

            <li v-if="isSuperAdmin || isAdmin">
                <router-link class="side-menu" :to="{ name: 'admin.colors.index'}" :class="{'side-menu--active':activeMenu==='Colors'}">
                    <div class="side-menu__icon"><feather type="target"></feather></div>
                    <div class="side-menu__title"> Colors </div>
                </router-link>
            </li>

            <li v-if="isSuperAdmin || isAdmin">
                <router-link class="side-menu" :to="{ name: 'admin.categories.index'}" :class="{'side-menu--active':activeMenu==='Categories'}">
                    <div class="side-menu__icon"><feather type="grid"></feather></div>
                    <div class="side-menu__title"> Categories </div>
                </router-link>
            </li>

            <li v-if="isSuperAdmin || isAdmin">
                <router-link class="side-menu" :to="{ name: 'admin.sub-categories.index'}" :class="{'side-menu--active':activeMenu==='SubCategories'}">
                    <div class="side-menu__icon"><feather type="grid"></feather></div>
                    <div class="side-menu__title"> SubCategories </div>
                </router-link>
            </li>

            <li v-if="isSuperAdmin || isAdmin">
                <router-link class="side-menu" :to="{ name: 'admin.attributes.index'}" :class="{'side-menu--active':['Attributes','AttributeValues'].includes(activeMenu)}">
                    <div class="side-menu__icon"><feather type="grid"></feather></div>
                    <div class="side-menu__title"> Attributes </div>
                </router-link>
            </li>

        </ul>
    </nav>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "SidebarComponent",
    computed:{
        dashboardLogo(){
            return process.env.MIX_BASE_URL+"/images/logo-punjab.png";
        },
        activeMenu() {
                return this.$route.meta?this.$route.meta.title:'';
        },
        isSuperAdmin() {
            return this.$store.state.auth.user.role_id===1;
        },
        isAdmin() {
            return this.$store.state.auth.user.role_id===2;
        },
        isAccountant() {
            return this.$store.state.auth.user.role_id===3;
        },
        isEmployee() {
            return this.$store.state.auth.user.role_id===4;
        },
    },
    created() {
        this.$store.dispatch('auth/login');
    },

}
</script>

<style scoped>

</style>
