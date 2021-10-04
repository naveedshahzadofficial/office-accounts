<template>
    <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Rubick Tailwind HTML Admin Template" class="w-6" :src="dashboardLogo">
            <span class="hidden xl:block text-white text-lg ml-3"> PPRA<span class="font-medium">&nbsp;TASK's</span> </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <router-link class="side-menu" :to="{ name: 'admin.dashboard'}" :class="{'side-menu--active':activeMenu==='Dashboard'}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Dashboard </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.advices.index'}" :class="{'side-menu--active':activeMenu==='Advices'}">
                    <div class="side-menu__icon"> <i data-feather="radio"></i> </div>
                    <div class="side-menu__title"> Advices </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.court-cases.index'}" :class="{'side-menu--active':activeMenu==='CourtCase'}">
                    <div class="side-menu__icon"> <i data-feather="award"></i> </div>
                    <div class="side-menu__title"> Court Cases </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.document-vettings.index'}" :class="{'side-menu--active':activeMenu==='DocumentVetting'}">
                    <div class="side-menu__icon"> <i data-feather="file-minus"></i> </div>
                    <div class="side-menu__title"> Document Vetting </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.complaints-redressals.index'}" :class="{'side-menu--active':activeMenu==='ComplaintRedressal'}">
                    <div class="side-menu__icon"> <i data-feather="file-minus"></i> </div>
                    <div class="side-menu__title"> Complaints Redressal </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.blacklistings.index'}" :class="{'side-menu--active':activeMenu==='Blacklisting'}">
                    <div class="side-menu__icon"> <i data-feather="file-minus"></i> </div>
                    <div class="side-menu__title"> Blacklisting </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.violation-examinations.index'}" :class="{'side-menu--active':activeMenu==='ViolationExamination'}">
                    <div class="side-menu__icon"> <i data-feather="file-minus"></i> </div>
                    <div class="side-menu__title"> Violation Examination </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.documents-uploadings.index'}" :class="{'side-menu--active':activeMenu==='DocumentUploading'}">
                    <div class="side-menu__icon"> <i data-feather="file-minus"></i> </div>
                    <div class="side-menu__title"> Documents Uploading </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.accounts.index'}" :class="{'side-menu--active':activeMenu==='Account'}">
                    <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                    <div class="side-menu__title"> Login IDs/ Accounts </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.trainings.index'}" :class="{'side-menu--active':activeMenu==='Training'}">
                    <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                    <div class="side-menu__title"> Trainings </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.procuring-agencies.index'}" :class="{'side-menu--active':activeMenu==='procuringAgency'}">
                    <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                    <div class="side-menu__title"> Procuring Agencies </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.tender-fees.index'}" :class="{'side-menu--active':activeMenu==='TenderFee'}">
                    <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                    <div class="side-menu__title"> Tender Fee </div>
                </router-link>
            </li>

            <li>
                <router-link class="side-menu" :to="{ name: 'admin.inspections.index'}" :class="{'side-menu--active':activeMenu==='Inspection'}">
                    <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                    <div class="side-menu__title"> Inspections </div>
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
        activeMenu() {
                return this.$route.meta?this.$route.meta.title:'';
        }
    }
}
</script>

<style scoped>

</style>
