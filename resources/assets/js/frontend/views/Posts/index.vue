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
            posts() {
                return chunk(this.$store.getters['Posts/pData'], 10)
            }
        },
        methods: {
            getDescription(post) {
                let el = document.createElement('div')
                el.innerHTML = post.body
                return el.textContent.slice(0, 147) + '...'
            },
            getFacebookShare(post) {
                return 'http://www.facebook.com/sharer.php?u=' + (window.location.protocol + '//' + window.location.host + window.location.pathname) + '/' + post.id
            },
            getGPlusShare(post) {
                return `https://twitter.com/share?url=${(window.location.protocol + '//' + window.location.host + window.location.pathname) + '/' + post.id}&text=${post.title}&hashtags=toNaRadioBomJesus`
            },
            getTwitterShare(post) {
                return `https://plus.google.com/share?url=${(window.location.protocol + '//' + window.location.host + window.location.pathname) + '/' + post.id}`
            },
            goTo(post) {
                return {
                    name: 'Posts.Child',
                    params: {
                        id: post.id
                    }
                }
            },
            goRoute(post) {
                this.$router.push({
                    name: 'Posts.Child',
                    params: {
                        id: post.id
                    }
                })
            },
            getDiff(post) {
                return moment(post.updated_at).fromNow()
            },
            getTitle(post) {
                return post.title.length > 50 ? post.title.slice(0, 47) + '...' : post.title
            }
        }
    }
</script>

<template>
    <div>
        <h1 class="title white--text">Matérias</h1>

        <v-container fluid grid-list-md>
            <v-layout row wrap align-center v-for="(group, index) in posts" :key="index">
                <v-flex xs12 md6 v-for="(post, i) in group" :key="i">
                    <v-card light>
                        <v-container fluid grid-list-lg>
                            <v-layout row justify-center align-center>
                                <v-flex xs5>
                                    <img
                                            :src="post.thumb"
                                            @click="goRoute(post)"
                                            style="cursor: pointer; max-width: 100%"
                                    />
                                </v-flex>
                                <v-flex xs7>
                                    <v-card-media contain>
                                        <router-link :to="goTo(post)" class="headline">{{ getTitle(post) }}</router-link>
                                        <div>{{ getDescription(post) }}
                                            <router-link :to="goTo(post)">ler mais</router-link>
                                        </div>
                                    </v-card-media>
                                </v-flex>
                            </v-layout>
                        </v-container>
                        <v-card-actions>
                            <span class="subheading">{{ getDiff(post) }}</span>
                            <v-spacer></v-spacer>
                            <v-btn icon light :href="getFacebookShare(post)" target="_blank">
                                <v-icon fa>facebook</v-icon>
                            </v-btn>
                            <v-btn icon light :href="getGPlusShare(post)" target="_blank">
                                <v-icon fa>google-plus</v-icon>
                            </v-btn>
                            <v-btn icon light :href="getTwitterShare(post)" target="_blank">
                                <v-icon fa>twitter</v-icon>
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>

        <r-pagination getter="Posts/pagination"></r-pagination>

    </div>
</template>