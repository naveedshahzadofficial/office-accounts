<template>
    <div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Validation -->
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">Add Procuring Agencies</h2>
                    </div>
                    <div class="p-5">
                        <div class="preview">
                            <div v-if="message" class="alert alert-danger-soft show flex items-center mb-2" role="alert"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                {{ message }} </div>
                            <!-- BEGIN: Validation Form -->
                            <form class="validate-form w-1/2">

                                <div class="input-form" :class="{'has-error':(errors && errors.agency_procuring_registered)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Total No. of Procuring agencies Registered <span class="text-primary-3">*</span>
                                    </label>
                                    <vue-numeric   placeholder="Procuring agencies Registered"  separator="," class="form-control" v-model="form.agency_procuring_registered" required></vue-numeric>
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.agency_procuring_registered">
                                        {{  errors.agency_procuring_registered[0] }}</div>
                                </div>



                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.case_status)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Status <span class="text-primary-3">*</span>
                                    </label>

                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="form-check mr-2">
                                            <input v-model="form.agency_status" id="active_status" class="form-check-input" type="radio" name="agency_status" value="1">
                                            <label class="form-check-label" for="active_status">Active</label>
                                        </div>
                                        <div class="form-check mr-2 mt-2 sm:mt-0">
                                            <input v-model="form.agency_status" id="inactive_status" class="form-check-input" type="radio" name="agency_status" value="0">
                                            <label class="form-check-label" for="inactive_status">Inactive</label>
                                        </div>
                                    </div>

                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.agency_status">
                                        {{  errors.agency_status[0] }}</div>
                                </div>

                                <button type="button" class="btn btn-primary mt-5 mr-3" @click.prevent="saveForm">Save <i v-if="processing" data-loading-icon="spinning-circles" data-color="white" class="w-4 h-4 ml-2"></i></button>
                                <button type="button" class="btn btn-secondary mt-5" @click.prevent="$router.push({name: 'admin.procuring-agencies.index'})">Cancel</button>
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
    name: "ProcuringAgencyCreate",
    data: () => ({
        form:{
            agency_procuring_registered: '',
            agency_status: '',
        },
        errors: [],
        processing: false,
        message: ""
    }),
    methods: {
        saveForm: function (){
            this.processing = true;
            axios.post('/api/v1/procuring-agencies', this.form).then((resp) => {
                this.processing = false
                if(resp.data.error){
                    this.message = resp.data.message;
                }else {
                    this.$vToastify.success(resp.data.message);
                    this.$router.push({name: 'admin.procuring-agencies.index'});
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
