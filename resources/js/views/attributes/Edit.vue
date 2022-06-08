<template>
    <div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Validation -->
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">Edit Attribute</h2>
                    </div>
                    <div class="p-5">
                        <div class="preview">
                            <div v-if="message" class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                <feather type="alert-octagon" class="w-6 h-6 mr-2"></feather>
                                {{ message }} </div>
                            <!-- BEGIN: Validation Form -->
                            <form class="validate-form lg:w-1/2">
                                <div class="input-form" :class="{'has-error':(errors && errors.name)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Name<span class="text-primary-3">*</span>
                                    </label>
                                    <input type="text" placeholder="Color Name"  class="form-control" v-model="form.name" required />
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.name">
                                        {{  errors.name[0] }}</div>
                                </div>


                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.status)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Status<span class="text-primary-3">*</span>
                                    </label>
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="form-check mr-2">
                                            <input v-model="form.status" id="radio-switch-4" class="form-check-input" type="radio" name="status" value="1">
                                            <label class="form-check-label" for="radio-switch-4">Active</label>
                                        </div>
                                        <div class="form-check mr-2 mt-2 sm:mt-0">
                                            <input v-model="form.status" id="radio-switch-5" class="form-check-input" type="radio" name="status" value="0">
                                            <label class="form-check-label" for="radio-switch-5">Inactive</label>
                                        </div>
                                    </div>
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.status">
                                        {{  errors.status[0] }}</div>
                                </div>

                                <button type="button" class="btn btn-success mt-5 mr-3" @click.prevent="updateForm">Update <i v-if="processing" data-loading-icon="spinning-circles" data-color="white" class="w-4 h-4 ml-2"></i></button>
                                <button type="button" class="btn btn-secondary mt-5" @click.prevent="$router.push({name: 'admin.attributes.index'})">Cancel</button>
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
    name: "AttributeEdit",
    data: () => ({
        form:{
            name: '',
            status: '',
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
            axios.get('/api/v1/attributes/' + this.$route.params.id).then(response => {
                this.form = response.data.row;
                this.form['_method'] = 'PUT';
            }).catch((error)=>{
                this.processing = false
                this.$vToastify.error("Record has been not found.");
                this.$router.push({name: 'admin.attributes.index'});
            });
        },
        updateForm: function (){
            this.processing = true;
            axios.post(`/api/v1/attributes/${this.$route.params.id}`, this.form).then((resp) => {
                this.processing = false
                if(resp.data.error){
                    this.message = resp.data.message;
                }else {
                    this.$vToastify.success(resp.data.message);
                    this.$router.push({name: 'admin.attributes.index'});
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
