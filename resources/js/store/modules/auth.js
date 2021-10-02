const state = {
    authenticated: false,
    user: {}
}

const getters = {
    authenticated(state){
        return state.authenticated;
    },
    user(state){
        return state.user;
    }
}

const actions = {
    login({ commit }){
        return axios.post('/api/v1/user').then(({data}) => {
            commit('SET_USER', data.data)
            commit('SET_AUTHENTICATED', true)
        }).catch(({response: {data}}) => {
            commit('user', {})
            commit('SET_AUTHENTICATED', false)
        })
    },
    logout({commit}) {
        return  axios.post('/api/v1/logout').then(() => {
            commit('user', {})
            commit('SET_AUTHENTICATED', false)
            localStorage.removeItem("authToken");
            //window.location.replace('/')
        }).catch(({response: {data}}) => {
            commit('user', {})
            commit('SET_AUTHENTICATED', false)
            localStorage.removeItem("authToken");
        })
    }
}

const mutations = {
    SET_AUTHENTICATED(state,value){
        state.authenticated = value
    },
    SET_USER(state, value) {
        state.user = value
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
