require('./bootstrap');
import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import VueToastify from "vue-toastify";
import numeral from 'numeral';
import numFormat from 'vue-filter-number-format';
import VueNumeric from 'vue-numeric'
import InputMask from 'vue-input-mask';
import moment from 'moment'
import VueFeather from 'vue-feather';
import VueDatePicker from '@mathieustan/vue-datepicker';
import '@mathieustan/vue-datepicker/dist/vue-datepicker.min.css';
import Select2 from 'v-select2-component';


Vue.use(router);
Vue.use(VueToastify,{
    theme: "light",
    position: "top-right",
    maxToasts: 1
});
Vue.filter('numFormat', numFormat(numeral));
Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('DD-MM-YYYY')
    }
});

Vue.use(VueNumeric)
Vue.component('input-mask', InputMask)
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueFeather);
Vue.use(VueDatePicker);
Vue.component('Select2', Select2);



Vue.config.productionTip = false

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
