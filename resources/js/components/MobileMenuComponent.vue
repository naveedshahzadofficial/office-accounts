<template>
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="PMS PPRA" class="w-6" :src="dashboardLogo">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler">
                <feather type="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></feather>
            </a>
        </div>
        <ul class="border-t border-theme-29 py-5 hidden">

            <li>
                <a href="#" class="menu">
                    <div class="menu__icon">
                        <feather type="inbox"></feather>
                    </div>
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
            return process.env.MIX_BASE_URL+"/images/logo-punjab.png";
        },
        activeMenu() {
            return this.$route.meta?this.$route.meta.title:'';
        }
    }
}
</script>

<style scoped>

</style>
