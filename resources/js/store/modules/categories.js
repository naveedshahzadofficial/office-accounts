const state = {
    categories: []
}
const getters = {
    categories(state){
        return state.categories;
    },
}
const actions = {
    loadCategories({ commit }){
        return axios.post('/api/v1/load-categories').then(({data}) => {
            commit('SET_CATEGORIES', data.data)
        }).catch(({response: {data}}) => {
            commit('SET_CATEGORIES', {})
        })
    },
}

const mutations = {
    SET_CATEGORIES(state,value){
        state.categories = value
    }
}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
