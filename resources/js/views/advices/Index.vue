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
                                        <select v-model="tableData.length" @change="loadCollection()" class="form-select box">
                                            <option v-for="(records, index) in perPage" :key="index" :value="(records==='All'?'9999999':records)" >{{records}}</option>
                                        </select>
                                    </div>

                                    <div class="hidden md:block mx-auto text-gray-600"></div>

                                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                                        <div class="w-56 relative text-gray-700 dark:text-gray-300">
                                            <input v-model="tableData.search" @input="loadCollection()" type="text" class="form-control w-56 box pr-10 placeholder-theme-13 border-dark-2" placeholder="Search...">
                                            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                                        </div>
                                    </div>

                                </div>

                                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                                    <BaseTableComponent :columns="columns" :childColumns="childColumns" :sortKey="sortKey" :sortOrders="sortOrders" @sortBy="sortBy">
                                        <tbody>
                                        <tr class="hover:bg-gray-200" v-for="row in getCollection.data" :key="row.id">
                                            <td class="border-b dark:border-dark-5 text-center">{{ row.advice_issued | numFormat }}</td>
                                            <td class="border-b dark:border-dark-5 text-center">{{ row.advice_pending_3_to_10 | numFormat  }}</td>
                                            <td class="border-b dark:border-dark-5 text-center">{{ row.advice_pending_more_than_10 | numFormat  }}</td>
                                            <td class="border-b dark:border-dark-5 text-center">{{ row.created_at  }}</td>
                                            <td class="border-b dark:border-dark-5 text-center"><span :class="row.advice_status?'text-theme-9':'text-theme-6'">{{ row.advice_status?'Active':'Inactive' }}</span></td>
                                            <td class="border-b dark:border-dark-5 text-center">
                                                <router-link :to="{ name: 'admin.advices.edit', params: { id: row.id } }">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                    Edit
                                                </router-link>
                                                <span class="ml-3 text-theme-6 cursor-pointer" @click.prevent="confirmDelete(row.id)"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    Delete
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </BaseTableComponent>

                                </div>

                                <p class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" v-if="getCollection.meta && !getCollection.meta.total">Currently no advice is added.</p>

                                <!-- BEGIN: Pagination -->
                                <PaginationComponent :pagination="pagination" :links="links" @page-change="loadCollection"></PaginationComponent>
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

import BaseTableComponent from "../../components/BaseTableComponent.vue";
import PaginationComponent from "../../components/PaginationComponent.vue";
import DeleteModalComponent from "../../components/DeleteModalComponent.vue";

export default {
    name: "Advices",
    data(){
        let sortOrders = {};

        let columns = [
            { label: 'No. of Advices Issued', name: 'advice_issued', orderable: true },
            { label: 'No. of Advices Pending', name: null, colspan:2},
            { label: 'Date', name: 'created_at', orderable: true},
            { label: 'Status', name: 'advice_status', orderable: true},
            { label: 'Actions', name: null},
        ];

        columns.forEach((column) => {
            if(column.name != null)
            sortOrders[column.name] = -1;
        });

        let childColumns = [
            { label: '', name: null },
            { label: 'From 3 to 10 Days', name: 'advice_pending_3_to_10', orderable: true },
            { label: 'More than 10 Days', name: 'advice_pending_more_than_10', orderable: true },
            { label: '', name: null },
            { label: '', name: null },
            { label: '', name: null },
        ];

        childColumns.forEach((column) => {
            if(column.name != null)
                sortOrders[column.name] = -1;
        });

       return {
           collection: {},
           columns: columns,
           childColumns: childColumns,
           message: '',
           now: new Date().toISOString(),
           perPage: ['30', '50', '100', '200', '500', '1000', 'All'],
           tableData: {
               draw: 0,
               length: 30,
               search: '',
               column: 'created_at',
               dir: 'desc',
           },
           sortKey: 'created_at',
           sortOrders: sortOrders,
           processing: false,
           is_show_model: false,
           delete_id: 0
       }
    },
    computed:{
        isShowDeleteModel: function (){
            return this.is_show_model;
        },
        getCollection: function (){
            return this.collection;
        },
        pagination: function(){
            return this.collection?this.collection.meta:{};
        },
        links: function(){
            return this.collection?this.collection.links:{};
        }
    },
    components: {
        BaseTableComponent,
        PaginationComponent,
        DeleteModalComponent
    },
    created() {
        this.loadCollection();
    },
    methods: {
        loadCollection: function(url = '/api/v1/advices'){
            this.processing = true;
            this.tableData.draw++;
            axios.get(url, {params: this.tableData })
                .then((response) => {
                    let data = response.data;
                    this.collection = data;
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
                this.deleteRecord();
            }
        },
        deleteRecord: function (delete_id = this.delete_id){
            this.processing = true;
            axios.delete(`/api/v1/advices/${delete_id}`).then((resp) => {
                    this.$vToastify.success(resp.data.message);
                    this.loading = false;
                    this.collection.meta.to--;
                    this.collection.meta.total--;
                    this.collection.data = this.collection.data.filter((row) => row.id !== delete_id );
                    this.delete_id = 0;
                }).catch((error)=>{
                this.processing = false
                this.$vToastify.error("Record has been not found.");
            });
        },
        sortBy: function (key){
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
            this.tableData.column = key;
            this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc';
            this.loadCollection();
        },
    }
}
</script>

<style scoped>

</style>
