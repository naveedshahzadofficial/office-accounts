<template>
    <div class="top-bar">

        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
            <div v-if="breadcrumbs">
            <a href="">Application</a>
            <feather type="chevron-right" class="breadcrumb__icon"></feather>
            <a href="" class="breadcrumb--active">Dashboard</a>
            </div>
        </div>
        <!-- END: Breadcrumb -->

        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">
                <img alt="PAS PPRA" :src="userProfileImage">
            </div>
            <div class="dropdown-menu w-56">
                <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                    <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                        <div class="font-medium">{{ userProfile.name }}</div>
                        <div class="text-xs  mt-0.5 text-white dark:text-white" v-if="userProfile.role">{{ userProfile.role.role_name }}</div>
                    </div>
                    <div class="p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <feather type="user" class="w-4 h-4 mr-2"></feather> Profile </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <feather type="lock" class="w-4 h-4 mr-2"></feather> Reset Password </a>
                    </div>
                    <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                        <a @click.prevent="logout()" class="flex cursor-pointer items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <feather type="toggle-right" class="w-4 h-4 mr-2"></feather> Logout </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</template>

<script>
import {mapActions} from "vuex";
export default {
    name: "TopbarComponent",
    props: {
        breadcrumbs: []
    },
    data: () => ({}),
    computed:{
        userProfileImage(){
            return process.env.MIX_BASE_URL+"/images/profile-6.jpg";
        },
        userProfile() {
            let user =  this.$store.state.auth.user;
            if(!user){
                this.signOut()
                this.$router.push({name: 'login'});
            }
            return user;
        },
    },
    mounted() {

    },
    methods: {
        ...mapActions({
            signOut:"auth/logout"
        }),
        logout: function (){
            this.signOut();
            //this.$router.push({name: 'login'});
        }
    }
}
</script>

<style scoped>

</style>
