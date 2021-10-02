<template>
    <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Rubick Tailwind HTML Admin Template" class="w-6" :src="dashboardLogo">
            <span class="hidden xl:block text-white text-lg ml-3"> PPRA<span class="font-medium">&nbsp;TASK's</span> </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <router-link class="side-menu side-menu--active" :to="{ name: 'admin.dashboard'}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Dashboard </div>
                </router-link>
            </li>

            <li>
                <a href="javascript:;" class="side-menu">
                    <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                    <div class="side-menu__title">
                        System Definitions
                        <div class="side-menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                            <div class="side-menu__title"> Users </div>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.advices.index'}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Advices </div>
                </router-link>
            </li>

        </ul>
    </nav>
</template>

<script>
export default {
    name: "SidebarComponent",
    computed:{
        dashboardLogo(){
            return process.env.MIX_BASE_URL+"/images/logo.svg";
        },
    }
}
</script>

<style scoped>

</style>
