const state = {
    roles: []
}
const getters = {
    roles(state){
        return state.roles;
    },
}
const actions = {
    loadRoles({ commit }){
        return axios.post('/api/v1/load-roles').then(({data}) => {
            commit('SET_ROLES', data.data)
        }).catch(({response: {data}}) => {
            commit('SET_ROLES', {})
        })
    },
}

const mutations = {
    SET_ROLES(state,value){
        state.roles = value
    }
}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
