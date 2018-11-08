export default {
    namespaced: true,

    state: {
        events: [],
        current: null
    },

    mutations: {
        SET_EVENTS(state, payload) {
            state.events = payload
        },
        SET_CURRENT(state, payload) {
            state.current = payload
        }
    },

    actions: {
        setEvents({commit}, payload) {
            commit('SET_EVENTS', payload)
        },
        setCurrent({commit}, payload) {
            commit('SET_CURRENT', payload)
        }
    },

    getters: {
        pData(state) {
            if (!state.events) return []

            return state.events.data
        },
        pSource(state) {
            if (!state.events) return []

            let pag = state.events

            return {
                current_page: pag.current_page,
                last_page: pag.last_page,
                next_page_url: pag.next_page_url,
                prev_page_url: pag.prev_page_url
            }
        },
        pagination: state => state.events,
        current: state => state.current
    }

}