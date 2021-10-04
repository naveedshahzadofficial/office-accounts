<template>
    <div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Validation -->
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">Edit Inspection</h2>
                    </div>
                    <div class="p-5">
                        <div class="preview">
                            <div v-if="message" class="alert alert-danger-soft show flex items-center mb-2" role="alert"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                {{ message }} </div>
                            <!-- BEGIN: Validation Form -->
                            <form class="validate-form lg:w-1/2">

                                <div class="input-form" :class="{'has-error':(errors && errors.inspection_internal_conducted)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        No. of Internal Inspections Conducted <span class="text-primary-3">*</span>
                                    </label>
                                    <vue-numeric   placeholder="Internal Inspections Conducted"  separator="," class="form-control" v-model="form.inspection_internal_conducted" required></vue-numeric>
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.inspection_internal_conducted">
                                        {{  errors.inspection_internal_conducted[0] }}</div>
                                </div>

                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.inspection_verification_entries)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        No. of Case Disposed off <span class="text-primary-3">*</span>
                                    </label>
                                    <vue-numeric   placeholder="Case Disposed off"  separator="," class="form-control" v-model="form.inspection_verification_entries" required></vue-numeric>
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.inspection_verification_entries">
                                        {{  errors.inspection_verification_entries[0] }}</div>
                                </div>

                                <div class="input-form mt-5">
                                    <label class="form-label w-full flex flex-col sm:flex-row font-bold">
                                        No. of Pending Reference
                                    </label>
                                </div>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="input-form" :class="{'has-error':(errors && errors.inspection_pending_3_to_7)}">
                                            <label class="form-label w-full flex flex-col sm:flex-row">
                                                From 3 to 07 Days <span class="text-primary-3">*</span>
                                            </label>
                                            <vue-numeric   placeholder="From 3 to 10 Days Advices Pending"  separator="," class="form-control" v-model="form.inspection_pending_3_to_7" required></vue-numeric>
                                            <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.inspection_pending_3_to_7">{{ errors.inspection_pending_3_to_7[0] }}</div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="input-form" :class="{'has-error':(errors && errors.inspection_pending_more_than_7)}">
                                            <label class="form-label w-full flex flex-col sm:flex-row">
                                                More than 07 Days <span class="text-primary-3">*</span>
                                            </label>
                                            <vue-numeric   placeholder="More than 10 Days Advices Pending"  separator="," class="form-control" v-model="form.inspection_pending_more_than_7" required></vue-numeric>
                                            <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.inspection_pending_more_than_7">{{ errors.inspection_pending_more_than_7[0] }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.inspection_miscellaneous_disposed_off)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        No. of Miscellaneous References Disposed Off <span class="text-primary-3">*</span>
                                    </label>
                                    <vue-numeric   placeholder="Miscellaneous References Disposed Off"  separator="," class="form-control" v-model="form.inspection_miscellaneous_disposed_off" required></vue-numeric>
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.inspection_miscellaneous_disposed_off">
                                        {{  errors.inspection_miscellaneous_disposed_off[0] }}</div>
                                </div>



                                <button type="button" class="btn btn-success mt-5 mr-3" @click.prevent="updateForm">Update <i v-if="processing" data-loading-icon="spinning-circles" data-color="white" class="w-4 h-4 ml-2"></i></button>
                                <button type="button" class="btn btn-secondary mt-5" @click.prevent="$router.push({name: 'admin.inspections.index'})">Cancel</button>
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
    name: "InspectionEdit",
    data: () => ({
        form:{
            inspection_internal_conducted: '',
            inspection_verification_entries: '',
            inspection_pending_3_to_7: '',
            inspection_pending_more_than_7: '',
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
            axios.get('/api/v1/inspections/' + this.$route.params.id).then(response => {
                this.form = response.data.row;
            }).catch((error)=>{
                this.processing = false
                this.$vToastify.error("Record has been not found.");
                this.$router.push({name: 'admin.inspections.index'});
            });
        },
        updateForm: function (){
            this.processing = true;
            axios.put(`/api/v1/inspections/${this.$route.params.id}`, this.form).then((resp) => {
                this.processing = false
                if(resp.data.error){
                    this.message = resp.data.message;
                }else {
                    this.$vToastify.success(resp.data.message);
                    this.$router.push({name: 'admin.inspections.index'});
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
