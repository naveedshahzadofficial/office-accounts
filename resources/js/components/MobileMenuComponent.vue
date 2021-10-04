<template>
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Rubick Tailwind HTML Admin Template" class="w-6" :src="dashboardLogo">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-theme-29 py-5 hidden">

            <li>
                <a href="side-menu-light-inbox.html" class="menu">
                    <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="menu__title"> Inbox </div>
                </a>
            </li>

        </ul>
    </div>
</template>

<script>
export default {
    name: "MobileMenuComponent",
    computed:{
        dashboardLogo(){
            return process.env.MIX_BASE_URL+"/images/logo.svg";
        },
        activeMenu() {
            return this.$route.meta?this.$route.meta.title:'';
        }
    }
}
</script>

<style scoped>

</style>
