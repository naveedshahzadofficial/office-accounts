<template>
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="PPRA Logo" src="/images/login-logo.png">
                </a>
                <div class="my-auto">
                    <img alt="PPRA Middle Logo" class="-intro-x w-1/2 -mt-16" src="/images/login_left_img.png">
                </div>

                <div class="-intro-x flex items-center pt-5">
                    <img alt="PITB Logo" src="/images/logo-pitb.png">
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Sign In</h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your tasks in one place</div>
                    <div class="intro-x mt-8">

                        <div v-if="message" class="alert alert-danger-soft show flex items-center mb-2" role="alert"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            {{ message }} </div>

                        <form id="login-form">
                            <input id="username" v-model="form.username" type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Username or Email" value="">
                            <div id="error-username" class="login__input-error w-5/6 text-theme-6 mt-2" v-if="errors.username">{{ errors.username[0] }}</div>
                            <input id="password" v-model="form.password"  type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Password" value="">
                            <div id="error-password" class="login__input-error w-5/6 text-theme-6 mt-2" v-if="errors.password">{{ errors.password[0] }}</div>
                        </form>
                    </div>
                    <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                            <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                        </div>
                        <a class="hidden" href="#">Forgot Password?</a>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button id="btn-login" class="btn btn-success py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" @click.prevent="login">Login</button>
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "Login",
    data: () => ({
        form:{
            username: '',
            password: ''
        },
        errors: [],
        message: "",
        processing: false
    }),
    mounted(){
        document.body.classList.remove('main');
        document.body.classList.add('login');
    },
    methods:{
        ...mapActions({
           signIn: 'auth/login'
        }),
        login: async function () {
            this.processing= true
            await axios.post('/api/v1/login', this.form).then((resp) => {
                if(resp.data.error){
                    this.message = resp.data.message;
                }else {
                    this.signIn()
                    localStorage.setItem('authToken', resp.data.data.api_token);
                    this.$router.push({name: 'admin.dashboard'});
                }
            }).catch((error)=>{
                this.errors = error.response.data.errors;
            })
        }
    }
}
</script>

<style scoped>

</style>
