import axios from 'axios'
import cookie from 'js-cookie'

export default {
    namespaced: true,
    state: {
        as: null,
        messages: [],
        message: '',
    },
    mutations: {
        SET_AS(state, payload) {
            state.as = payload
        },
        REMOVE_AS(state) {
            state.as = null
        },
        SET_MESSAGES(state, payload) {
            state.messages = payload.reverse()
        },
        SET_MESSAGE(state, payload) {
            state.message = payload
        },
        PUSH_MESSAGE(state, payload) {
            state.messages.push(payload)
        }
    },
    actions: {
        setAs({commit}, payload) {
            cookie.set('as', payload, {expires: 7})
            commit('SET_AS', payload)
        },
        removeAs({commit}) {
            cookie.remove('as')
            commit('REMOVE_AS')
            commit('SET_MESSAGE', '')
        },
        setMessages({commit}, payload) {
            commit('SET_MESSAGES', payload)
        },
        setMessage({commit}, payload) {
            commit('SET_MESSAGE', payload)
        },
        async addMessage({commit, getters}, payload) {
            if (!getters.message || !getters.as || !getters.as.name || !getters.as.email) return

            commit('SET_MESSAGE', '')            

            let {body, name, email} = payload

            await axios.post('/api/messages', {body,name,email})

        },
        pushMessage({commit}, payload) {
            commit('PUSH_MESSAGE', payload)
        },
        moduleInit({dispatch}, store) {
            if (cookie.get('as')) {
                dispatch('setAs', cookie.getJSON('as'))
            }
        }
    },
    getters: {
        as: state => state.as,
        messages: state => state.messages,
        message: state => state.message
    }
}