export default {
    namespaced: true,
    state: {
        news: null,
        current: null
    },
    mutations: {
        SET_NEWS (state, payload) {
            state.news = payload
        },
        SET_CURRENT (state, payload) {
            state.current = payload
        }
    },
    actions: {
        setNews ({commit}, payload) {
            commit('SET_NEWS', payload)
        },
        setCurrent ({commit}, payload) {
            commit('SET_CURRENT', payload)
        }
    },
    getters: {
        pagination: state => state.news,
        pData(state) {
            if (!state.news) return []

            return state.news.data
        },
        pSource(state) {
            if (!state.news) return []

            let pag = state.news

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