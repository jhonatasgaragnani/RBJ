export default {
    namespaced: true,
    state: {
        partners: []
    },
    mutations: {
        SET_PARTNERS(state, payload) {
            state.partners = payload
        }
    },
    actions: {
        setPartners({commit}, payload) {
            commit('SET_PARTNERS', payload)
        }
    },
    getters: {
        pagination: state => state.partners,
        pData(state) {
            if (!state.partners) return []

            return state.partners.data
        },
        pSource(state) {
            if (!state.partners) return []

            let pag = state.partners

            return {
                current_page: pag.current_page,
                last_page: pag.last_page,
                next_page_url: pag.next_page_url,
                prev_page_url: pag.prev_page_url
            }
        }
    }
}