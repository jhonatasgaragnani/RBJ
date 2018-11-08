import axios from 'axios'
import cookie from 'js-cookie'
import {uniq} from 'lodash'
export default {
    namespaced: true,
    state: {
        poll: null
    },
    mutations: {
        SET_POLL(state, payload) {
            state.poll = payload
        }
    },
    actions: {
        setPoll({commit}, payload) {
            commit('SET_POLL', payload)
        },
        async vote({commit, getters}, payload) {
            let {data} = await axios.post(`/api/admin/radio/polls/options/${payload}/vote`)
            let voted = cookie.getJSON('VOTED')

            voted.push(getters.poll.id)

            cookie.set('VOTED', uniq(voted), {expires: 30})
            commit('SET_POLL', data)
            console.log(cookie.getJSON('VOTED'))
        },
        async moduleInit({commit}) {
            if (!cookie.getJSON('VOTED')) cookie.set('VOTED', [])
            let { data } = await axios.get('/api/polls')
            commit('SET_POLL', data)
        },
        async fetch({commit}) {
            let { data } = await axios.get('/api/polls')
            commit('SET_POLL', data)

            return Promise.resolve()
        }
    },
    getters: {
        poll: state => state.poll
    }
}