export default {
    namespaced: true,
    state: {
        posts: null,
        current: null
    },
    mutations: {
        SET_POSTS (state, payload) {
            state.posts = payload
        },
        SET_CURRENT (state, payload) {
            state.current = payload
        }
    },
    actions: {
        setPosts ({commit}, payload) {
            commit('SET_POSTS', payload)
        },
        setCurrent ({commit}, payload) {
            commit('SET_CURRENT', payload)
        }
    },
    getters: {
        pagination: state => state.posts,
        pData(state) {
            if (!state.posts) return []

            return state.posts.data
        },
        pSource(state) {
            if (!state.posts) return []

            let pag = state.posts

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