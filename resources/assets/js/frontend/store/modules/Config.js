export default {
    namespaced: true,

    state: {
        all: [
            { key: 'suffix', value: 'Radio Bom Jesus' }
        ]
    },

    mutations: {
        SET_ALL (state, payload) {
            state.all = payload
        }
    },

    actions: {
        setAll({commit}, payload) {
            commit('SET_ALL', payload)
        }
    },

    getters: {
        all (state) {
            return state.all
        },
        key (state) {
            let payload = {}

            state.all.forEach(config => {
                payload[config.key] = config
            })

            return payload
        }
    }
}