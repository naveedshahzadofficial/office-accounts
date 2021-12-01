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
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" data-v-1fd3b8b7=""><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Dashboard </div>
                </router-link>
            </li>

            <li v-show="isLegalWing || isSuperAdmin || isAssistantOne">
                <router-link class="side-menu" :to="{ name: 'admin.advices.index'}" :class="{'side-menu--active':activeMenu==='Advices'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Advices </div>
                </router-link>
            </li>

            <li  v-show="isLegalWing || isSuperAdmin || isAssistantOne">
                <router-link class="side-menu" :to="{ name: 'admin.court-cases.index'}" :class="{'side-menu--active':activeMenu==='CourtCase'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Court Cases </div>
                </router-link>
            </li>

            <li  v-show="isLegalWing || isSuperAdmin || isAssistantOne">
                <router-link class="side-menu" :to="{ name: 'admin.document-vettings.index'}" :class="{'side-menu--active':activeMenu==='DocumentVetting'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Document Vetting </div>
                </router-link>
            </li>

            <li  v-show="isLegalWing || isSuperAdmin || isAssistantTwo">
                <router-link class="side-menu" :to="{ name: 'admin.complaints-redressals.index'}" :class="{'side-menu--active':activeMenu==='ComplaintRedressal'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Complaints Redressal </div>
                </router-link>
            </li>

            <li  v-show="isLegalWing || isSuperAdmin || isAssistantThree">
                <router-link class="side-menu" :to="{ name: 'admin.blacklistings.index'}" :class="{'side-menu--active':activeMenu==='Blacklisting'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Blacklisting </div>
                </router-link>
            </li>

            <li  v-show="isLegalWing || isSuperAdmin || isSupritendent">
                <router-link class="side-menu" :to="{ name: 'admin.violation-examinations.index'}" :class="{'side-menu--active':activeMenu==='ViolationExamination'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Violation Examination </div>
                </router-link>
            </li>

            <li v-show="isITWing || isSuperAdmin || isAssistantThree">
                <router-link class="side-menu" :to="{ name: 'admin.documents-uploadings.index'}" :class="{'side-menu--active':activeMenu==='DocumentUploading'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Documents Uploading </div>
                </router-link>
            </li>

            <li v-show="isITWing || isSuperAdmin || isAssistantThree">
                <router-link class="side-menu" :to="{ name: 'admin.accounts.index'}" :class="{'side-menu--active':activeMenu==='Account'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Login IDs/ Accounts </div>
                </router-link>
            </li>

            <li v-show="isITWing || isSuperAdmin || isAssistantThree">
                <router-link class="side-menu" :to="{ name: 'admin.trainings.index'}" :class="{'side-menu--active':activeMenu==='Training'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Trainings </div>
                </router-link>
            </li>

            <li v-show="isITWing || isSuperAdmin || isAssistantThree">
                <router-link class="side-menu" :to="{ name: 'admin.procuring-agencies.index'}" :class="{'side-menu--active':activeMenu==='procuringAgency'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Registrations </div>
                </router-link>
            </li>

            <li v-show="isAdminWing || isSuperAdmin || isAccountOfficer">
                <router-link class="side-menu" :to="{ name: 'admin.tender-fees.index'}" :class="{'side-menu--active':activeMenu==='TenderFee'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Tender Fee </div>
                </router-link>
            </li>

            <li v-show="isAdminWing || isSuperAdmin || isDeputyDirector">
                <router-link class="side-menu" :to="{ name: 'admin.inspections.index'}" :class="{'side-menu--active':activeMenu==='Inspection'}">
                    <div class="side-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <div class="side-menu__title"> Inspections </div>
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
        isLegalWing() {
            return this.$store.state.auth.user.role_id===2;
        },
        isITWing() {
            return this.$store.state.auth.user.role_id===3;
        },
        isAdminWing() {
            return this.$store.state.auth.user.role_id===4;
        },
        isDeputyDirector() {
            return this.$store.state.auth.user.role_id===5;
        },
        isAccountOfficer() {
            return this.$store.state.auth.user.role_id===6;
        },
        isSupritendent() {
            return this.$store.state.auth.user.role_id===7;
        },
        isAssistantOne() {
            return this.$store.state.auth.user.role_id===8;
        },
        isAssistantTwo() {
            return this.$store.state.auth.user.role_id===9;
        },
        isAssistantThree() {
            return this.$store.state.auth.user.role_id===10;
        },
    },
    created() {
        this.$store.dispatch('auth/login');
    },

}
</script>

<style scoped>

</style>
