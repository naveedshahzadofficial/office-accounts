<template>
    <div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Validation -->
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">Edit Complaints Redressal</h2>
                    </div>
                    <div class="p-5">
                        <div class="preview">
                            <div v-if="message" class="alert alert-danger-soft show flex items-center mb-2" role="alert"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                {{ message }} </div>
                            <!-- BEGIN: Validation Form -->
                            <form class="validate-form lg:w-1/2">

                                <div class="input-form" :class="{'has-error':(errors && errors.complaint_disposed)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        No. of Complaints Disposed (Online) <span class="text-primary-3">*</span>
                                    </label>
                                    <vue-numeric   placeholder="Complaints Disposed"  separator="," class="form-control" v-model="form.complaint_disposed" required></vue-numeric>
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.complaint_disposed">
                                        {{  errors.complaint_disposed[0] }}</div>
                                </div>


                                <div class="input-form mt-5">
                                    <label class="form-label w-full flex flex-col sm:flex-row font-bold">
                                        No. of Complaints Pending (Online)
                                    </label>
                                </div>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="input-form" :class="{'has-error':(errors && errors.complaint_pending_3_to_10)}">
                                            <label class="form-label w-full flex flex-col sm:flex-row">
                                                From 3 to 10 Days <span class="text-primary-3">*</span>
                                            </label>
                                            <vue-numeric   placeholder="From 3 to 10 Days Complaints Pending"  separator="," class="form-control" v-model="form.complaint_pending_3_to_10" required></vue-numeric>
                                            <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.complaint_pending_3_to_10">{{ errors.complaint_pending_3_to_10[0] }}</div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="input-form" :class="{'has-error':(errors && errors.complaint_pending_more_than_10)}">
                                            <label class="form-label w-full flex flex-col sm:flex-row">
                                                More than 10 Days <span class="text-primary-3">*</span>
                                            </label>
                                            <vue-numeric   placeholder="More than 10 Days Complaints Pending"  separator="," class="form-control" v-model="form.complaint_pending_more_than_10" required></vue-numeric>
                                            <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.complaint_pending_more_than_10">{{ errors.complaint_pending_more_than_10[0] }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-form mt-5">
                                    <label class="form-label w-full flex flex-col sm:flex-row font-bold">
                                        No. of Other Complaints
                                    </label>
                                </div>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="input-form" :class="{'has-error':(errors && errors.complaint_other_3_to_10)}">
                                            <label class="form-label w-full flex flex-col sm:flex-row">
                                                From 3 to 10 Days <span class="text-primary-3">*</span>
                                            </label>
                                            <vue-numeric   placeholder="From 3 to 10 Days Other Complaints"  separator="," class="form-control" v-model="form.complaint_other_3_to_10" required></vue-numeric>
                                            <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.complaint_other_3_to_10">{{ errors.complaint_other_3_to_10[0] }}</div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="input-form" :class="{'has-error':(errors && errors.complaint_other_more_than_10)}">
                                            <label class="form-label w-full flex flex-col sm:flex-row">
                                                More than 10 Days <span class="text-primary-3">*</span>
                                            </label>
                                            <vue-numeric   placeholder="More than 10 Days Other Complaints"  separator="," class="form-control" v-model="form.complaint_other_more_than_10" required></vue-numeric>
                                            <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.complaint_other_more_than_10">{{ errors.complaint_other_more_than_10[0] }}</div>
                                        </div>
                                    </div>
                                </div>




                                <button type="button" class="btn btn-success mt-5 mr-3" @click.prevent="updateForm">Update <i v-if="processing" data-loading-icon="spinning-circles" data-color="white" class="w-4 h-4 ml-2"></i></button>
                                <button type="button" class="btn btn-secondary mt-5" @click.prevent="$router.push({name: 'admin.complaints-redressals.index'})">Cancel</button>
                            </form>
                            <!-- END: Validation Form -->

                        </div>
                    </div>
                </div>
                <!-- END: Form Validation -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ComplaintRedressalEdit",
    data: () => ({
        form:{
            complaint_disposed: '',
            complaint_pending_3_to_10: '',
            complaint_pending_more_than_10: '',
            complaint_other_3_to_10: '',
            complaint_other_more_than_10: '',
        },
        errors: [],
        processing: false,
        message: ""
    }),
    mounted() {
        this.loadData();
    },
    methods: {
        loadData: function (){
            axios.get('/api/v1/complaints-redressals/' + this.$route.params.id).then(response => {
                this.form = response.data.row;
                this.form['_method'] = 'PUT';
            }).catch((error)=>{
                this.processing = false
                this.$vToastify.error("Record has been not found.");
                this.$router.push({name: 'admin.complaints-redressals.index'});
            });
        },
        updateForm: function (){
            this.processing = true;
            axios.post(`/api/v1/complaints-redressals/${this.$route.params.id}`, this.form).then((resp) => {
                this.processing = false
                if(resp.data.error){
                    this.message = resp.data.message;
                }else {
                    this.$vToastify.success(resp.data.message);
                    this.$router.push({name: 'admin.complaints-redressals.index'});
                }
                this.errors = [];
            }).catch((error)=>{
                this.processing = false
                this.errors = error.response.data.errors;
            });
        }
    }
}
</script>

<style scoped>

</style>
