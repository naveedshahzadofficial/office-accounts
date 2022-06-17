const state = {
    colors: []
}
const getters = {
    colors(state){
        return state.colors;
    },
}
const actions = {
    loadColors({ commit }){
        return axios.post('/api/v1/load-colors').then(({data}) => {
            commit('SET_COLORS', data.data)
        }).catch(({response: {data}}) => {
            commit('SET_COLORS', {})
        })
    },
}

const mutations = {
    SET_COLORS(state,value){
        state.colors = value
    }
}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
