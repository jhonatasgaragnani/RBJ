export default {
    namespaced: true,

    state: {
        gallery: []
    },

    mutations: {
        SET_GALLERY(state, payload) {
            state.gallery = payload
        }
    },

    actions: {
        setGallery({commit}, payload) {
            commit('SET_GALLERY', payload)
        }
    },

    getters: {
        pData(state) {
            if (!state.gallery) return []

            return state.gallery.data
        },
        pSource(state) {
            if (!state.gallery) return []

            let pag = state.gallery

            return {
                current_page: pag.current_page,
                last_page: pag.last_page,
                next_page_url: pag.next_page_url,
                prev_page_url: pag.prev_page_url
            }
        },
        pagination: state => state.gallery
    }

}