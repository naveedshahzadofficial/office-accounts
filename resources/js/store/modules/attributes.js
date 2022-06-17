const state = {
    attributes: []
}
const getters = {
    attributes(state){
        return state.attributes;
    },
}
const actions = {
    loadAttributes({ commit }){
        return axios.post('/api/v1/load-attributes').then(({data}) => {
            commit('SET_ATTRIBUTES', data.data)
        }).catch(({response: {data}}) => {
            commit('SET_ATTRIBUTES', {})
        })
    },
}

const mutations = {
    SET_ATTRIBUTES(state,value){
        state.attributes = value
    }
}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
