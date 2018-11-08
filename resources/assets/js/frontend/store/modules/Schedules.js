import moment from 'moment'
import {uniqBy} from 'lodash'

export default {
    namespaced: true,

    state: {
        all: []
    },

    mutations: {
        SET_ALL (state, payload) {
            state.all = payload
        }
    },

    actions: {
        setAll ({commit}, payload) {
            commit('SET_ALL', payload)
        }
    },

    getters: {
        all (state) {
            return state.all
        },
        schedules(state) {
            let schedules = []
            state.all.map(schedule => {
                if (schedule.schedules.length > 0) {
                    schedule.schedules.forEach(subSchedule => {
                        schedules.push(subSchedule)
                    })
                }
            })

            return uniqBy(schedules, 'id')
        },
        current (state) {
            let day

            switch (new Date().getDay()) {
                case 0:
                    day = 'Domingo'
                    break;
                case 1:
                    day = 'Segunda-Feira'
                    break;
                case 2:
                    day = 'Terça-Feira'
                    break;
                case 3:
                    day = 'Quarta-Feira'
                    break;
                case 4:
                    day = 'Quinta-Feira'
                    break;
                case 5:
                    day = 'Sexta-Feira'
                    break;
                case 6:
                    day = 'Sábado'
                    break;
                default:
                    day = 'Domingo'
                    break;
            }

            return state.all.filter(payload => payload.name === day)[0]
        }
    }
}