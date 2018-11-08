let defaultPage = [
    { name: 'title', content: 'Titulo Padrão' }
];

export default {
    namespaced: true,
    state: {
        all: {},
        current: defaultPage,
        defaultPage
    },
    mutations: {
        SET_ALL (state, payload) {
            state.all = payload
        },
        SET_CURRENT (state, payload) {
            state.current = payload
        }
    },
    actions: {
        setAll({commit}, payload) {
            commit('SET_ALL', payload)
        },
        setCurrent({commit}, payload) {
            commit('SET_CURRENT', payload)
        }
    },
    getters: {
        all(state) {
            return state.all
        },
        current(state) {
            return state.current
        }
    }
}