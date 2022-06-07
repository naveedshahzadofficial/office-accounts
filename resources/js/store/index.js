import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from "./modules/auth";
import roles from "./modules/roles"
import categories from "./modules/categories"
Vue.use(Vuex)

export default new Vuex.Store({
    plugins:[
      createPersistedState
    ],
    state: {
    },
    mutations: {
    },
    actions: {
    },
    modules: {
        auth,
        roles,
        categories,
    }
})
