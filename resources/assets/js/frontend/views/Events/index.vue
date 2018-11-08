<script>
import { component } from '../../router/resolver'
import { groupBy, mapKeys } from 'lodash'
import moment from 'moment'
import 'moment/locale/pt-br'
export default {
    components: {
        rPagination: component('rPagination')
    },
    computed: {
        events() {
            let events = this.$store.getters['Events/pData']
            let payload = {}

            events = groupBy(events, event => {
                return moment(event.happen_at).year() + '-' + moment(event.happen_at).month()
            })

            let keys = Object.keys(events).sort().forEach(key => {
                payload[key] = events[key]
            })

            /* For descendant order
            for (let i=keys.length-1; i>=0;i--) {
                payload[keys[i]] = events[keys[i]]
            }*/

            return payload
        }
    },
    methods: {
        getDiff(group) {
            return moment(group, 'Y-MM').fromNow()
        },
        getOffset(ev) {
            if (ev.id % 2 === 0) {
                return {
                    'order-md1': true
                }
            }

            return {}
        },
        getDescription(event) {
            let el = document.createElement('div')
            el.innerHTML = event.body

            if (el.textContent.length > 100) return el.textContent.slice(0, 97) + '...'

            return el.textContent
        },
        getDate(event) {
            return moment(event.happen_at).format('D [de] MMMM [de] YYYY')
        }
    }
}
</script>

<template>
    <div>
        <h1 class="title white--text">Eventos</h1>
    
        <template v-for="(group, index) in events">
            <v-subheader>{{ getDiff(index) }}</v-subheader>
            <v-container fluid>
                <v-layout row wrap v-for="(event, ind) in group" :key="ind" class="mb-2">
                    <v-flex xs12 md6 v-bind="getOffset(event)">
                        <v-card height="300px" :img="event.image" style="cursor: pointer" @click="$router.push({ name: 'Events.Child', params: {id: event.id} })"></v-card>
                    </v-flex>
                    <v-flex>
                        <v-card height="100%" class="white--text">
                            <v-card-title primary-title>
                                <v-container fluid>
                                    <v-layout row>
                                        <div class="headline">
                                            <router-link style="text-decoration: none" :to="{ name: 'Events.Child', params: {id: event.id} }">
                                                {{ event.title }}
                                            </router-link>
                                        </div>
                                    </v-layout>
                                    <v-layout row>
                                        <div>
                                            <b>Descrição:</b> {{ getDescription(event) }}
                                            <router-link :to="{ name: 'Events.Child', params: {id: event.id} }">
                                                saiba mais
                                            </router-link>
                                        </div>
                                    </v-layout>
                                    <v-layout row>
                                        <div>
                                            <b>Data:</b> {{ getDate(event) }}</div>
                                    </v-layout>
                                </v-container>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </template>
    
        <r-pagination getter="Events/pagination"></r-pagination>
    </div>
</template>