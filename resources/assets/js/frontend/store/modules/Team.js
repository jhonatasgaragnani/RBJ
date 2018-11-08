export default {
    namespaced: true,

    state: {
        team: []
    },

    mutations: {
        SET_TEAM(state, payload) {
            state.team = payload
        }
    },

    actions: {
        setTeam({commit}, payload) {
            commit('SET_TEAM', payload)
        }
    },

    getters: {
        pData(state) {
            if (!state.team) return []

            return state.team.data
        },
        pSource(state) {
            if (!state.team) return []

            let pag = state.team

            return {
                current_page: pag.current_page,
                last_page: pag.last_page,
                next_page_url: pag.next_page_url,
                prev_page_url: pag.prev_page_url
            }
        },
        pagination: state => state.team
    }

}