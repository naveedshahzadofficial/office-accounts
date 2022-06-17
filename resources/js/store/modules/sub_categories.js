const state = {
    sub_categories: []
}
const getters = {
    sub_categories(state){
        return state.sub_categories;
    },
}
const actions = {
    loadSubCategories({ commit }){
        return axios.post('/api/v1/load-sub-categories').then(({data}) => {
            commit('SET_SUB_CATEGORIES', data.data)
        }).catch(({response: {data}}) => {
            commit('SET_SUB_CATEGORIES', {})
        })
    },
}

const mutations = {
    SET_SUB_CATEGORIES(state,value){
        state.sub_categories = value
    }
}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
