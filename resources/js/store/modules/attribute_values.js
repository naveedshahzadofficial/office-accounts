const state = {
    attribute_values: []
}
const getters = {
    attribute_values(state){
        return state.attribute_values;
    },
}
const actions = {
    loadAttributeValues({ commit }){
        return axios.post('/api/v1/load-attribute-values').then(({data}) => {
            commit('SET_ATTRIBUTE_VALUES', data.data)
        }).catch(({response: {data}}) => {
            commit('SET_ATTRIBUTE_VALUES', {})
        })
    },
}

const mutations = {
    SET_ATTRIBUTE_VALUES(state,value){
        state.attribute_values = value
    }
}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
