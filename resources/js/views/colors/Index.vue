<template>
    <div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Validation -->
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">Colors</h2>

                        <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                            <button class="btn btn-success shadow-md mr-2" @click.prevent="$router.push({name: 'admin.colors.create'})">
                                <feather type="plus" class="w-4 h-4"></feather>
                                &nbsp;Add
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
                                            <feather type="search" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></feather>
                                        </div>
                                    </div>

                                </div>

                                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                                    <BaseTableComponent :columns="columns"  :sortKey="sortKey" :sortOrders="sortOrders" @sortBy="sortBy">
                                        <tbody>
                                        <tr class="hover:bg-gray-200" v-for="row in getCollection.data" :key="row.id">
                                            <td class="border-b dark:border-dark-5 text-center">{{ row.color_name }}</td>
                                            <td class="border-b dark:border-dark-5 text-center">{{ row.hex_code }}</td>
                                            <td class="border-b dark:border-dark-5 text-center">{{ row.rgb_code }}</td>
                                            <td class="border-b dark:border-dark-5 text-center">{{ row.created_at  }}</td>
                                            <td class="border-b dark:border-dark-5 text-center">
                                                <div class="flex items-center justify-center text-theme-6" :class="row.color_status?'text-theme-9':'text-theme-6'">{{ row.color_status?'Active':'Inactive'}}</div>
                                            </td>
                                            <td class="border-b dark:border-dark-5 text-center">
                                                <router-link class="mr-2" title="Edit" :to="{ name: 'admin.colors.edit', params: { id: row.id } }">
                                                    <feather type="check-square" class="w-4 h-4 mr-1"></feather>
                                                </router-link>
                                                <span title="Delete" class="text-theme-6 cursor-pointer" @click.prevent="confirmDelete(row.id)">
                                                    <feather type="trash-2" class="w-4 h-4 mr-1"></feather>
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </BaseTableComponent>

                                </div>

                                <p class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" v-if="getCollection.meta && !getCollection.meta.total">Currently no color is added.</p>

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
    name: "Colors",
    data(){
        let sortOrders = {};

        let columns = [
            { label: 'Name', name: 'color_name', orderable: true },
            { label: 'Hex Code', name: 'hex_code', orderable: true },
            { label: 'RGB Code', name: 'rgb_code', orderable: true },
            { label: 'Date', name: 'created_at', orderable: true},
            { label: 'Status', name: 'color_status', orderable: true},
            { label: 'Actions', name: null},
        ];

        columns.forEach((column) => {
            if(column.name != null)
            sortOrders[column.name] = -1;
        });


       return {
           collection: {},
           columns: columns,
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
        loadCollection: function(url = '/api/v1/colors'){
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
            axios.post(`/api/v1/colors/${delete_id}`, { _method : 'DELETE' }).then((resp) => {
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
