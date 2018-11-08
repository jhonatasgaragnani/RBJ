export default {
    namespaced: true,
    state: {
        interviews: null,
        current: null
    },
    mutations: {
        SET_INTERVIEWS (state, payload) {
            state.interviews = payload
        },
        SET_CURRENT (state, payload) {
            state.current = payload
        }
    },
    actions: {
        setInterviews ({commit}, payload) {
            commit('SET_INTERVIEWS', payload)
        },
        setCurrent ({commit}, payload) {
            commit('SET_CURRENT', payload)
        }
    },
    getters: {
        pagination: state => state.interviews,
        pData(state) {
            if (!state.interviews) return []

            return state.interviews.data
        },
        pSource(state) {
            if (!state.interviews) return []

            let pag = state.interviews

            return {
                current_page: pag.current_page,
                last_page: pag.last_page,
                next_page_url: pag.next_page_url,
                prev_page_url: pag.prev_page_url
            }
        },
        current: state => state.current
    }
}