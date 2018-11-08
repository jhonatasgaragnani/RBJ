export default {
    namespaced: true,

    state: {
        videos: []
    },

    mutations: {
        SET_VIDEOS(state, payload) {
            state.videos = payload
        }
    },

    actions: {
        setVideos({commit}, payload) {
            commit('SET_VIDEOS', payload)
        }
    },

    getters: {
        pData(state) {
            if (!state.videos) return []

            return state.videos.data
        },
        pSource(state) {
            if (!state.videos) return []

            let pag = state.videos

            return {
                current_page: pag.current_page,
                last_page: pag.last_page,
                next_page_url: pag.next_page_url,
                prev_page_url: pag.prev_page_url
            }
        },
        pagination: state => state.videos
    }

}