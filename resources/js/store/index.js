import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from "./modules/auth";
import roles from "./modules/roles"
import categories from "./modules/categories"
import sub_categories from "./modules/sub_categories"
import units from "./modules/units"
import colors from "./modules/colors"
import attributes from "./modules/attributes"
import attribute_values from "./modules/attribute_values"

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
        sub_categories,
        units,
        colors,
        attributes,
        attribute_values,
    }
})
