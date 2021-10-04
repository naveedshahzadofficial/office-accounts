import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'
import Home from '../views/Home.vue'

import Login from "../views/auth/Login";
import AdminDashboard from "../views/dashboards/AdminDashboard";

import Advice from "../views/advices/Index.vue";
import AdviceCreate from "../views/advices/Create";
import AdviceEdit from "../views/advices/Edit";

import CourtCase from "../views/courtCases/Index.vue";
import CourtCaseCreate from "../views/courtCases/Create";
import CourtCaseEdit from "../views/courtCases/Edit";

import DocumentVetting from "../views/documentVettings/Index.vue";
import DocumentVettingCreate from "../views/documentVettings/Create";
import DocumentVettingEdit from "../views/documentVettings/Edit";

import ComplaintRedressal from "../views/complaintRedressals/Index.vue";
import ComplaintRedressalCreate from "../views/complaintRedressals/Create";
import ComplaintRedressalEdit from "../views/complaintRedressals/Edit";

import Blacklisting from "../views/blacklistings/Index.vue";
import BlacklistingCreate from "../views/blacklistings/Create";
import BlacklistingEdit from "../views/blacklistings/Edit";

import ViolationExamination from "../views/violationExaminations/Index.vue";
import ViolationExaminationCreate from "../views/violationExaminations/Create";
import ViolationExaminationEdit from "../views/violationExaminations/Edit";

import DocumentUploading from "../views/documentUploadings/Index.vue";
import DocumentUploadingCreate from "../views/documentUploadings/Create";
import DocumentUploadingEdit from "../views/documentUploadings/Edit";

import Account from "../views/accounts/Index.vue";
import AccountCreate from "../views/accounts/Create";
import AccountEdit from "../views/accounts/Edit";

import Training from "../views/trainings/Index.vue";
import TrainingCreate from "../views/trainings/Create";
import TrainingEdit from "../views/trainings/Edit";

import procuringAgency from "../views/procuringAgencies/Index.vue";
import procuringAgencyCreate from "../views/procuringAgencies/Create";
import procuringAgencyEdit from "../views/procuringAgencies/Edit";

import TenderFee from "../views/tenderFee/Index.vue";
import TenderFeeCreate from "../views/tenderFee/Create";
import TenderFeeEdit from "../views/tenderFee/Edit";

import Inspection from "../views/inspections/Index.vue";
import InspectionCreate from "../views/inspections/Create";
import InspectionEdit from "../views/inspections/Edit";

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
    {
        path: '/admin/advices',
        name: 'admin.advices.index',
        component: Advice,
        meta:{
            middleware:"auth",
            title: 'Advices'
        }
    },
    {
        path: '/admin/advices/create',
        name: 'admin.advices.create',
        component: AdviceCreate,
        meta:{
            middleware:"auth",
            title: 'Advices'
        }
    },
    {
        path: "/admin/advices/edit/:id",
        name: "admin.advices.edit",
        component: AdviceEdit,
        meta:{
            middleware:"auth",
            title: 'Advices'
        }
    },

    {
        path: '/admin/court-cases',
        name: 'admin.court-cases.index',
        component: CourtCase,
        meta:{
            middleware:"auth",
            title: 'CourtCase'
        }
    },
    {
        path: '/admin/court-cases/create',
        name: 'admin.court-cases.create',
        component: CourtCaseCreate,
        meta:{
            middleware:"auth",
            title: 'CourtCase'
        }
    },
    {
        path: "/admin/court-cases/edit/:id",
        name: "admin.court-cases.edit",
        component: CourtCaseEdit,
        meta:{
            middleware:"auth",
            title: 'CourtCase'
        }
    },

    {
        path: '/admin/document-vettings',
        name: 'admin.document-vettings.index',
        component: DocumentVetting,
        meta:{
            middleware:"auth",
            title: 'DocumentVetting'
        }
    },
    {
        path: '/admin/document-vettings/create',
        name: 'admin.document-vettings.create',
        component: DocumentVettingCreate,
        meta:{
            middleware:"auth",
            title: 'DocumentVetting'
        }
    },
    {
        path: "/admin/document-vettings/edit/:id",
        name: "admin.document-vettings.edit",
        component: DocumentVettingEdit,
        meta:{
            middleware:"auth",
            title: 'DocumentVetting'
        }
    },
    {
        path: '/admin/complaints-redressals',
        name: 'admin.complaints-redressals.index',
        component: ComplaintRedressal,
        meta:{
            middleware:"auth",
            title: 'ComplaintRedressal'
        }
    },
    {
        path: '/admin/complaints-redressals/create',
        name: 'admin.complaints-redressals.create',
        component: ComplaintRedressalCreate,
        meta:{
            middleware:"auth",
            title: 'ComplaintRedressal'
        }
    },
    {
        path: "/admin/complaints-redressals/edit/:id",
        name: "admin.complaints-redressals.edit",
        component: ComplaintRedressalEdit,
        meta:{
            middleware:"auth",
            title: 'ComplaintRedressal'
        }
    },
    {
        path: '/admin/blacklistings',
        name: 'admin.blacklistings.index',
        component: Blacklisting,
        meta:{
            middleware:"auth",
            title: 'Blacklisting'
        }
    },
    {
        path: '/admin/blacklistings/create',
        name: 'admin.blacklistings.create',
        component: BlacklistingCreate,
        meta:{
            middleware:"auth",
            title: 'Blacklisting'
        }
    },
    {
        path: "/admin/blacklistings/edit/:id",
        name: "admin.blacklistings.edit",
        component: BlacklistingEdit,
        meta:{
            middleware:"auth",
            title: 'Blacklisting'
        }
    },
    {
        path: '/admin/violation-examinations',
        name: 'admin.violation-examinations.index',
        component: ViolationExamination,
        meta:{
            middleware:"auth",
            title: 'ViolationExamination'
        }
    },
    {
        path: '/admin/violation-examinations/create',
        name: 'admin.violation-examinations.create',
        component: ViolationExaminationCreate,
        meta:{
            middleware:"auth",
            title: 'ViolationExamination'
        }
    },
    {
        path: "/admin/violation-examinations/edit/:id",
        name: "admin.violation-examinations.edit",
        component: ViolationExaminationEdit,
        meta:{
            middleware:"auth",
            title: 'ViolationExamination'
        }
    },
    {
        path: '/admin/documents-uploadings',
        name: 'admin.documents-uploadings.index',
        component: DocumentUploading,
        meta:{
            middleware:"auth",
            title: 'DocumentUploading'
        }
    },
    {
        path: '/admin/documents-uploadings/create',
        name: 'admin.documents-uploadings.create',
        component: DocumentUploadingCreate,
        meta:{
            middleware:"auth",
            title: 'DocumentUploading'
        }
    },
    {
        path: "/admin/documents-uploadings/edit/:id",
        name: "admin.documents-uploadings.edit",
        component: DocumentUploadingEdit,
        meta:{
            middleware:"auth",
            title: 'DocumentUploading'
        }
    },
    {
        path: '/admin/procuring-agencies',
        name: 'admin.procuring-agencies.index',
        component: procuringAgency,
        meta:{
            middleware:"auth",
            title: 'procuringAgency'
        }
    },
    {
        path: '/admin/procuring-agencies/create',
        name: 'admin.procuring-agencies.create',
        component: procuringAgencyCreate,
        meta:{
            middleware:"auth",
            title: 'procuringAgency'
        }
    },
    {
        path: "/admin/procuring-agencies/edit/:id",
        name: "admin.procuring-agencies.edit",
        component: procuringAgencyEdit,
        meta:{
            middleware:"auth",
            title: 'procuringAgency'
        }
    },
    {
        path: '/admin/tender-fees',
        name: 'admin.tender-fees.index',
        component: TenderFee,
        meta:{
            middleware:"auth",
            title: 'TenderFee'
        }
    },
    {
        path: '/admin/tender-fees/create',
        name: 'admin.tender-fees.create',
        component: TenderFeeCreate,
        meta:{
            middleware:"auth",
            title: 'TenderFee'
        }
    },
    {
        path: "/admin/tender-fees/edit/:id",
        name: "admin.tender-fees.edit",
        component: TenderFeeEdit,
        meta:{
            middleware:"auth",
            title: 'TenderFee'
        }
    },
    {
        path: '/admin/accounts',
        name: 'admin.accounts.index',
        component: Account,
        meta:{
            middleware:"auth",
            title: 'Account'
        }
    },
    {
        path: '/admin/accounts/create',
        name: 'admin.accounts.create',
        component: AccountCreate,
        meta:{
            middleware:"auth",
            title: 'Account'
        }
    },
    {
        path: "/admin/accounts/edit/:id",
        name: "admin.accounts.edit",
        component: AccountEdit,
        meta:{
            middleware:"auth",
            title: 'Account'
        }
    },
    {
        path: '/admin/trainings',
        name: 'admin.trainings.index',
        component: Training,
        meta:{
            middleware:"auth",
            title: 'Training'
        }
    },
    {
        path: '/admin/trainings/create',
        name: 'admin.trainings.create',
        component: TrainingCreate,
        meta:{
            middleware:"auth",
            title: 'Training'
        }
    },
    {
        path: "/admin/trainings/edit/:id",
        name: "admin.trainings.edit",
        component: TrainingEdit,
        meta:{
            middleware:"auth",
            title: 'Training'
        }
    },
    {
        path: '/admin/inspections',
        name: 'admin.inspections.index',
        component: Inspection,
        meta:{
            middleware:"auth",
            title: 'Inspection'
        }
    },
    {
        path: '/admin/inspections/create',
        name: 'admin.inspections.create',
        component: InspectionCreate,
        meta:{
            middleware:"auth",
            title: 'Inspection'
        }
    },
    {
        path: "/admin/inspections/edit/:id",
        name: "admin.inspections.edit",
        component: InspectionEdit,
        meta:{
            middleware:"auth",
            title: 'Inspection'
        }
    },

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
