<template>
    <div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Validation -->
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">Advices</h2>

                        <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                            <button class="btn btn-primary shadow-md mr-2" @click.prevent="$router.push({name: 'admin.advices.create'})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus w-4 h-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                &nbsp;Add Advice
                            </button>
                        </div>

                    </div>
                    <div class="p-5">
                        <div class="preview">
                            <div v-if="message" class="alert alert-danger-soft show flex items-center mb-2" role="alert"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                {{ message }} </div>

                            <div class="grid grid-cols-12 gap-6">
                                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center">

                                    <div class="hidden md:block text-gray-600">
                                        <select v-model="limit" class="form-select box">
                                            <option value="30" selected >30</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                        </select>
                                    </div>

                                    <div class="hidden md:block mx-auto text-gray-600"></div>

                                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                                        <div class="w-56 relative text-gray-700 dark:text-gray-300">
                                            <input v-model="search" type="text" class="form-control w-56 box pr-10 placeholder-theme-13 border-dark-2" placeholder="Search...">
                                            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                                        </div>
                                    </div>

                                </div>

                                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                                    <table  class="table">
                                        <thead>
                                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                                            <th class="whitespace-nowrap text-center">No. of Advices Issued</th>
                                            <th colspan="2" class="whitespace-nowrap text-center">No. of Advices Pending</th>
                                            <th class="whitespace-nowrap text-center">Date</th>
                                            <th class="whitespace-nowrap text-center">Status</th>
                                            <th class="whitespace-nowrap text-center">Actions</th>
                                        </tr>
                                        <tr class="bg-primary-10 dark:bg-dark-1 text-white">
                                            <th class="whitespace-nowrap text-center">&nbsp;</th>
                                            <th class="whitespace-nowrap text-center">From 3 to 10 Days</th>
                                            <th class="whitespace-nowrap text-center">More than 10 Days</th>
                                            <th class="whitespace-nowrap text-center">&nbsp;</th>
                                            <th class="whitespace-nowrap text-center">&nbsp;</th>
                                            <th class="whitespace-nowrap text-center">&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="advice in getAdvices.data" :key="advice.id">
                                            <td class="border-b dark:border-dark-5 text-center">{{ advice.advice_issued | numFormat }}</td>
                                            <td class="border-b dark:border-dark-5 text-center">{{ advice.advice_pending_3_to_10 | numFormat  }}</td>
                                            <td class="border-b dark:border-dark-5 text-center">{{ advice.advice_pending_more_than_10 | numFormat  }}</td>
                                            <td class="border-b dark:border-dark-5 text-center">{{ advice.created_at | formatDate  }}</td>
                                            <td class="border-b dark:border-dark-5 text-center"><span :class="advice.advice_status?'text-theme-9':'text-theme-6'">{{ advice.advice_status?'Active':'Inactive' }}</span></td>
                                            <td class="border-b dark:border-dark-5 text-center">
                                                <router-link :to="{ name: 'admin.advices.edit', params: { id: advice.id } }">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                    Edit
                                                </router-link>
                                                <span class="ml-3 text-theme-6 cursor-pointer" @click.prevent="confirmDelete(advice.id)"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    Delete
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <p class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" v-show="!getAdvices.total > 0">Currently no advice is added.</p>

                                <!-- BEGIN: Pagination -->
                                <div v-show="getAdvices.total" class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                                    <div class="hidden md:block text-gray-600 mt-3 sm:mt-0">Showing {{ getAdvices.from | numFormat }} to {{ getAdvices.to | numFormat }} of {{ getAdvices.total | numFormat }} entries</div>
                                    <div class="hidden md:block mx-auto text-gray-600"></div>
                                    <div class="w-full sm:w-auto mt-3 sm:mt-0">
                                    <pagination :data="getAdvices" @pagination-change-page="loadAdvices">
                                        <span slot="prev-nav">Previous</span>
                                        <span slot="next-nav">Next</span>
                                    </pagination>
                                    </div>

                                </div>
                                <!-- END: Pagination -->


                             </div>


                        </div>

                    </div>
                </div>
                <!-- END: Form Validation -->
            </div>
        </div>


        <DeleteModalComponent v-if="isShowDeleteModel" @confirm-modal="confirmModel" />

    </div>
</template>

<script>

import DeleteModalComponent from "../../components/DeleteModalComponent.vue";

export default {
    name: "Index.vue",
    data: () => ({
        advices: {},
        message: '',
        now: new Date().toISOString(),
        search: "",
        page: 1,
        limit: 30,
        processing: false,
        is_show_model: false,
        delete_id: 0
    }),
    watch:{
        limit:function(val, old){
            this.loadAdvices();
        },
        search(val, old) {
            if (val.length >= 2 || old.length >= 2) {
                this.loadAdvices();
            }
        },
    },
    computed:{
        isShowDeleteModel: function (){
            return this.is_show_model;
        },
        getAdvices: function (){
            return this.advices;
        }
    },
    components: {
        DeleteModalComponent
    },
    created() {
        this.loadAdvices();
    },
    methods: {
        loadAdvices: function(page = this.page){
            this.processing = true;
            axios
                .get("/api/v1/advices?page=" + page, {
                    params: {
                        limit: this.limit,
                        search: this.search.length >= 2 ? this.search : "",
                    },
                })
                .then((response) => {
                    this.advices = response.data;
                    console.log(this.advices);
                    this.loading = false;
                }).catch((error)=>{
                this.processing = false
                //this.errors = error.response.data.errors;
                });

        },
        confirmDelete: function (delete_id){
            this.delete_id = delete_id;
            this.is_show_model = true;
        },
        confirmModel: function (answer){
            this.is_show_model = false;
            if(answer==="Delete"){
                this.deleteAdvice();
            }
        },
        deleteAdvice: function (delete_id = this.delete_id){
            this.processing = true;
            axios.delete(`/api/v1/advices/${delete_id}`).then((resp) => {
                    this.$vToastify.success(resp.data.message);
                    this.loading = false;
                    this.advices.to--;
                    this.advices.total--;
                    this.advices.data = this.advices.data.filter((advice) => advice.id !== delete_id );
                    this.delete_id = 0;
                }).catch((error)=>{
                this.processing = false
                this.$vToastify.error("Record has been not found.");
            });
        },
    }
}
</script>

<style scoped>

</style>
