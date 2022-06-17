const state = {
    units: []
}
const getters = {
    units(state){
        return state.units;
    },
}
const actions = {
    loadUnits({ commit }){
        return axios.post('/api/v1/load-units').then(({data}) => {
            commit('SET_UNITS', data.data)
        }).catch(({response: {data}}) => {
            commit('SET_UNITS', {})
        })
    },
}

const mutations = {
    SET_UNITS(state,value){
        state.units = value
    }
}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
