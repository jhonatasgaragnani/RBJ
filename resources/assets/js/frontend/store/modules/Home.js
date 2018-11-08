export default {
    namespaced: true,
    state: {
        tops: [],
        carousels: {}
    },
    mutations: {
        SET_TOPS (state, payload) {
            state.tops = payload
        },
        SET_CAROUSEL (state, {key, payload}) {
            state.carousels[key] = payload
        }
    },
    actions: {
        setTops ({commit}, payload) {
            commit('SET_TOPS', payload)
        },
        setCarousel({commit}, payload) {
            if (!payload.key || !payload.payload) return
            commit('SET_CAROUSEL', payload)
        }
    },
    getters: {
        tops: state => state.tops,
        carousels: state => state.carousels
    }
}