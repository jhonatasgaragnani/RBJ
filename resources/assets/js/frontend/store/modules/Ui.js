export default {
    namespaced: true,
    state: {
        fillHeight: false
    },
    mutations: {
        SET_FILL_HEIGHT(state, payload) {
            state.fillHeight = payload
        }
    },
    actions: {
        setFillHeight({commit}, payload) {
            commit('SET_FILL_HEIGHT', payload)
        }
    },
    getters: {
        fillHeight: state => state.fillHeight,
        all: state => state
    }
}