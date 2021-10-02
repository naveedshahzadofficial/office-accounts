<template>
    <div id="app">
        <div :class="{'flex': !isAuthPage}">
        <SidebarComponent v-if="!isAuthPage" />
            <div :class="{'content': !isAuthPage}">
        <TopbarComponent v-if="!isAuthPage" />
        <router-view/>
             </div>
        </div>
    </div>
</template>

<script>
import SidebarComponent from "./components/SidebarComponent";
import TopbarComponent from "./components/TopbarComponent";

export default {
    name: "App",
    computed: {
        isAuthPage: function() {
            return this.$route.name === 'login';
        }
    },
    components: {
        SidebarComponent,
        TopbarComponent
    },
}
</script>

<style scoped>

</style>
