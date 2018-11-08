<script>
    import {component} from '../../router/resolver'
    import {chunk} from 'lodash'
    import moment from 'moment'
    import 'moment/locale/pt-br'
    export default {
        components: {
            rPagination: component('rPagination')
        },
        computed: {
            interviews() {
                return chunk(this.$store.getters['Interviews/pData'], 10)
            }
        },
        methods: {
            getDescription(interview) {
                let el = document.createElement('div')
                el.innerHTML = interview.body
                return el.textContent.slice(0, 147) + '...'
            },
            getFacebookShare(interview) {
                return 'http://www.facebook.com/sharer.php?u=' + (window.location.protocol + '//' + window.location.host + window.location.pathname) + '/' + interview.id
            },
            getGPlusShare(interview) {
                return `https://twitter.com/share?url=${(window.location.protocol + '//' + window.location.host + window.location.pathname) + '/' + interview.id}&text=${interview.title}&hashtags=toNaRadioBomJesus`
            },
            getTwitterShare(interview) {
                return `https://plus.google.com/share?url=${(window.location.protocol + '//' + window.location.host + window.location.pathname) + '/' + interview.id}`
            },
            goTo(interview) {
                return {
                    name: 'Interviews.Child',
                    params: {
                        id: interview.id
                    }
                }
            },
            goRoute(interview) {
                this.$router.push({
                    name: 'Interviews.Child',
                    params: {
                        id: interview.id
                    }
                })
            },
            getDiff(interview) {
                return moment(interview.updated_at).fromNow()
            },
            getTitle(interview) {
                return interview.title.length > 50 ? interview.title.slice(0, 47) + '...' : interview.title
            }
        }
    }
</script>

<template>
    <div>
        <h1 class="title white--text">Entrevistas</h1>

        <v-container fluid grid-list-md>
            <v-layout row wrap align-center v-for="(group, index) in interviews" :key="index">
                <v-flex xs12 md6 v-for="(interview, i) in group" :key="i">
                    <v-card light>
                        <v-container fluid grid-list-lg>
                            <v-layout row justify-center align-center>
                                <v-flex xs5>
                                    <img
                                            :src="interview.thumb"
                                            @click="goRoute(interview)"
                                            style="cursor: pointer; max-width: 100%"
                                    />
                                </v-flex>
                                <v-flex xs7>
                                    <v-card-media contain>
                                        <router-link :to="goTo(interview)" class="headline">{{ getTitle(interview) }}</router-link>
                                        <div>{{ getDescription(interview) }} <router-link :to="goTo(interview)">ler mais</router-link></div>
                                    </v-card-media>
                                </v-flex>
                            </v-layout>
                        </v-container>
                        <v-card-actions>
                            <span class="subheading">{{ getDiff(interview) }}</span>
                            <v-spacer></v-spacer>
                            <v-btn icon light :href="getFacebookShare(interview)" target="_blank">
                                <v-icon fa>facebook</v-icon>
                            </v-btn>
                            <v-btn icon light :href="getGPlusShare(interview)" target="_blank">
                                <v-icon fa>google-plus</v-icon>
                            </v-btn>
                            <v-btn icon light :href="getTwitterShare(interview)" target="_blank">
                                <v-icon fa>twitter</v-icon>
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>

        <r-pagination getter="Interviews/pagination"></r-pagination>

    </div>
</template>