const state = {
    authenticated: false,
    role: '',
    user: {}
}

const getters = {
    role(state){
        return state.role;
    },
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
            commit('SET_ROLE', data.data.role)
            commit('SET_AUTHENTICATED', true)
        }).catch(({response: {data}}) => {
            commit('SET_USER', {})
            commit('SET_ROLE', {})
            commit('SET_AUTHENTICATED', false)
        })
    },
    logout({commit}) {
        return  axios.post('/api/v1/logout').then(() => {
            commit('SET_USER', {})
            commit('SET_ROLE', {})
            commit('SET_AUTHENTICATED', false)
            localStorage.removeItem("authToken");
            window.location.replace('/')
        }).catch(({response: {data}}) => {
            commit('SET_USER', {})
            commit('SET_AUTHENTICATED', false)
            localStorage.removeItem("authToken");
            window.location.replace('/')
        })
    }
}

const mutations = {
    SET_ROLE(state,value){
        state.role = value
    },
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
