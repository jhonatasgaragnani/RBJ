<script>
    import {component} from '../../router/resolver'
    import {groupBy} from 'lodash'
    import moment from 'moment'
    import 'moment/locale/pt-br'
    export default {
        components: {
            rPagination: component('rPagination')
        },
        computed: {
            videos() {
                return groupBy(this.$store.getters['Videos/pData'], video => {
                    return moment(video.created_at).year() + '-' + moment(video.created_at).month()
                })
            }
        },
        data: () => ({
            lightbox: false,
            video: {}
        }),
        methods: {
            toggleLightbox(video) {
                let el = document.createElement('div')

                el.innerHTML = video.video

                this.video = video

                if (el.getElementsByTagName('video').length > 0) {
                    this.video.url = el.getElementsByTagName('video')[0].getElementsByTagName('source')[0].src
                    this.video.type = 'video'
                } else {
                    this.video.url = el.getElementsByTagName('iframe')[0].src
                    this.video.type = 'iframe'
                }

                this.lightbox = !this.lightbox
            },
            getMonth(index) {
                return moment(parseInt(index.split('-')[1]) + 1, 'M').format("MMMM")
            },
            getDiff(video) {
                return moment(video.created_at).fromNow()
            }
        },
        watch: {
            lightbox(value) {
                if (!value) {
                    this.video = {}
                }
            }
        }
    }
</script>

<template>
    <div>
        <h1 class="title white--text">Galeria de videos</h1>

        <v-container fluid>
            <template v-for="(group, index) in videos">
                <v-subheader>{{ getMonth(index) }}</v-subheader>
                <v-container grid-list-sm fluid>
                    <v-layout row wrap>
                        <v-flex xs6 sm4 md3 v-for="(video, index) in group" :key="index">
                            <v-card :img="video.thumb" height="200px" @click.stop="toggleLightbox(video)">
                                <img :src="video.thumb" :alt="video.title" v-show="false">
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>
            </template>
        </v-container>

        <v-dialog v-model="lightbox" lazy absolute width="80vh" content-class="photo--dialog">
            <v-card>
                <v-container fluid>
                    <v-layout row>
                        <v-flex xs12 flexbox align-center justify-center>
                            <video v-if="video.type === 'video'" controls width="560" height="314"
                                   style="max-width: 100%">
                                <source :src="video.url">
                            </video>
                            <iframe v-else :src="video.url" allowfullscreen="allowfullscreen" width="560" height="314"
                                    style="max-width: 100%"></iframe>
                        </v-flex>
                    </v-layout>
                    <v-card-title primary-title>
                        <div><b>{{ getDiff(video) }}</b> - {{ video.description }}</div>
                    </v-card-title>
                </v-container>
            </v-card>
        </v-dialog>

        <r-pagination getter="Videos/pagination"></r-pagination>
    </div>
</template>