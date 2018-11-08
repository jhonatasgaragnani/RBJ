<script>
    import {component} from '../../router/resolver'
    import {chunk} from 'lodash'
    import moment from 'moment'
    import 'moment/locale/pt-br'

    export default {
        computed: {
            news() {
                return chunk(this.$store.getters['News/pData'], 10)
            }
        },
        components: {
            rPagination: component('rPagination')
        },
        methods: {
            getDescription(news) {
                let el = document.createElement('div')
                el.innerHTML = news.body
                return el.textContent.slice(0, 147) + '...'
            },
            getFacebookShare(news) {
                return 'http://www.facebook.com/sharer.php?u=' + (window.location.protocol + '//' + window.location.host + window.location.pathname) + '/' + news.id
            },
            getGPlusShare(news) {
                return `https://twitter.com/share?url=${(window.location.protocol + '//' + window.location.host + window.location.pathname) + '/' + news.id}&text=${news.title}&hashtags=toNaRadioBomJesus`
            },
            getTwitterShare(news) {
                return `https://plus.google.com/share?url=${(window.location.protocol + '//' + window.location.host + window.location.pathname) + '/' + news.id}`
            },
            goTo(news) {
                return {
                    name: 'News.Child',
                    params: {
                        id: news.id
                    }
                }
            },
            goRoute(news) {
                this.$router.push({
                    name: 'News.Child',
                    params: {
                        id: news.id
                    }
                })
            },
            getDiff(news) {
                return moment(news.updated_at).fromNow()
            },
            getTitle(news) {
                return news.title.length > 50 ? news.title.slice(0, 47) + '...' : news.title
            }
        }
    }
</script>

<template>
    <div>
        <h1 class="title white--text">Notícias</h1>

        <v-container fluid grid-list-md>
            <v-layout row wrap align-center v-for="(group, index) in news" :key="index">
                <v-flex xs12 md6 v-for="(sNews, i) in group" :key="i">
                    <v-card light>
                        <v-container fluid grid-list-lg>
                            <v-layout row justify-center align-center>
                                <v-flex xs5>
                                    <img
                                            :src="sNews.thumb"
                                            @click="goRoute(sNews)"
                                            style="cursor: pointer; max-width: 100%"
                                    />
                                </v-flex>
                                <v-flex xs7>
                                    <v-card-media contain>
                                        <router-link :to="goTo(sNews)" class="headline">{{ getTitle(sNews) }}</router-link>
                                        <div>{{ getDescription(sNews) }}
                                            <router-link :to="goTo(sNews)">ler mais</router-link>
                                        </div>
                                    </v-card-media>
                                </v-flex>
                            </v-layout>
                        </v-container>
                        <v-card-actions>
                            <span class="subheading">{{ getDiff(sNews) }}</span>
                            <v-spacer></v-spacer>
                            <v-btn icon light :href="getFacebookShare(sNews)" target="_blank">
                                <v-icon fa>facebook</v-icon>
                            </v-btn>
                            <v-btn icon light :href="getGPlusShare(sNews)" target="_blank">
                                <v-icon fa>google-plus</v-icon>
                            </v-btn>
                            <v-btn icon light :href="getTwitterShare(sNews)" target="_blank">
                                <v-icon fa>twitter</v-icon>
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
        <r-pagination getter="News/pagination"></r-pagination>
    </div>
</template>