<template>
    <div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Validation -->
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">Edit User</h2>
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
                                    <input type="text" placeholder="Name"  class="form-control" v-model="form.name" required />
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.name">
                                        {{  errors.name[0] }}</div>
                                </div>

                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.username)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Username<span class="text-primary-3">*</span>
                                    </label>
                                    <input type="text" placeholder="Username"  class="form-control" v-model="form.username" required />
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.username">
                                        {{  errors.username[0] }}</div>
                                </div>

                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.email)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Email<span class="text-primary-3">*</span>
                                    </label>
                                    <input type="email" placeholder="Email"  class="form-control" v-model="form.email" required />
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.email">
                                        {{  errors.email[0] }}</div>
                                </div>

                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.phone_number)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Phone Number<span class="text-primary-3">*</span>
                                    </label>
                                    <input type="tel" placeholder="Phone Number"  class="form-control" v-model="form.phone_number" required />
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.phone_number">
                                        {{  errors.phone_number[0] }}</div>
                                </div>

                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.password)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Password<span class="text-primary-3">*</span>
                                    </label>
                                    <input type="password" placeholder="Password"  class="form-control" v-model="form.password" required />
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.password">
                                        {{  errors.password[0] }}</div>
                                </div>

                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.role_id)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Role<span class="text-primary-3">*</span>
                                    </label>
                                    <Select2 v-model="form.role_id" :options="loadRoles" placeholder="Select Role" @change="updateRoleId($event)" />
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.role_id">
                                        {{  errors.role_id[0] }}</div>
                                </div>


                                <div v-show="isEmployee" class="input-form mt-5" :class="{'has-error':(errors && errors.hire_date)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Hire Date<span class="text-primary-3">*</span>
                                    </label>
                                    <VueDatePicker  v-model="form.hire_date" class="form-control" name="hire_date" placeholder="Hire Date" format="DD-MM-YYYY" :visibleYearsNumber=100  :max-date="currentDate" :noHeader=true />
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.hire_date">
                                        {{  errors.hire_date[0] }}</div>
                                </div>

                                <div v-show="isEmployee" class="input-form mt-5" :class="{'has-error':(errors && errors.commission)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Commission<span class="text-primary-3">*</span>
                                    </label>
                                    <vue-numeric   placeholder="Commission"  separator="," class="form-control" v-model="form.commission" required></vue-numeric>
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.commission">
                                        {{  errors.commission[0] }}</div>
                                </div>

                                <div v-show="isEmployee" class="input-form mt-5" :class="{'has-error':(errors && errors.salary)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Salary<span class="text-primary-3">*</span>
                                    </label>
                                    <vue-numeric   placeholder="Salary"  separator="," class="form-control" v-model="form.salary" required></vue-numeric>
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.salary">
                                        {{  errors.salary[0] }}</div>
                                </div>


                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.user_status)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        User Status<span class="text-primary-3">*</span>
                                    </label>
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="form-check mr-2">
                                            <input v-model="form.user_status" id="radio-switch-4" class="form-check-input" type="radio" name="user_status" value="1">
                                            <label class="form-check-label" for="radio-switch-4">Active</label>
                                        </div>
                                        <div class="form-check mr-2 mt-2 sm:mt-0">
                                            <input v-model="form.user_status" id="radio-switch-5" class="form-check-input" type="radio" name="user_status" value="0">
                                            <label class="form-check-label" for="radio-switch-5">Inactive</label>
                                        </div>
                                    </div>
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.user_status">
                                        {{  errors.user_status[0] }}</div>
                                </div>


                                <button type="button" class="btn btn-success mt-5 mr-3" @click.prevent="updateForm">Update <i v-if="processing" data-loading-icon="spinning-circles" data-color="white" class="w-4 h-4 ml-2"></i></button>
                                <button type="button" class="btn btn-secondary mt-5" @click.prevent="$router.push({name: 'admin.users.index'})">Cancel</button>
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
    name: "UserEdit",
    data: () => ({
        form:{
            name: '',
            user_name: '',
            email: '',
            phone_number: '',
            password: '',
            role_id: '',
            hire_date: new Date(),
            commission: 0,
            salary: 0,
            user_status: '',
        },
        currentDate: new Date,
        errors: [],
        processing: false,
        isEmployee: false,
        message: ""
    }),
    created() {
        console.log('created');
        this.$store.dispatch('roles/loadRoles');
    },
    mounted() {
        console.log('mounted');
        this.loadData();
    },
    computed:{
        loadRoles() {
            return this.$store.state.roles.roles.map(option => ({id: option.id, text: option.role_name}));
        },
    },
    methods: {
        loadData: function (){
            axios.get('/api/v1/users/' + this.$route.params.id).then(response => {
                this.form = response.data.row;
                this.isEmployee = this.form.role_id === 4;
                this.form['_method'] = 'PUT';
            }).catch((error)=>{
                this.processing = false
                this.$vToastify.error("Record has been not found.");
                this.$router.push({name: 'admin.users.index'});
            });
        },
        updateForm: function (){
            this.processing = true;
            axios.post(`/api/v1/users/${this.$route.params.id}`, this.form).then((resp) => {
                this.processing = false
                if(resp.data.error){
                    this.message = resp.data.message;
                }else {
                    this.$vToastify.success(resp.data.message);
                    this.$router.push({name: 'admin.users.index'});
                }
                this.errors = [];
            }).catch((error)=>{
                this.processing = false
                this.errors = error.response.data.errors;
            });
        },
        updateRoleId: function (role_id){
            if(role_id==='4'){
                this.isEmployee = true;
            }else{
                this.isEmployee = false;
            }
        }
    }
}
</script>

<style scoped>

</style>
