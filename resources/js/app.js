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



Vue.config.productionTip = false

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
