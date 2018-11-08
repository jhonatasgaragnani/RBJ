<script>
    import {component} from '../../router/resolver'
    import {chunk, groupBy} from 'lodash'
    import moment from 'moment'
    import 'moment/locale/pt-br'
    export default {
        computed: {
            photos() {
                let photos = this.$store.getters['Gallery/pData']

                photos = groupBy(photos, (photo) => {
                    return moment(photo.created_at).year() + '-' + moment(photo.created_at).month()
                })

                return photos
            },
            singlePhotos() {
                let photos = this.photos
                let payload = []

                for (let group in photos) {
                    for (let photo in photos[group]) {
                        payload.push(photos[group][photo])
                    }
                }

                return payload
            }
        },
        components: {
            rPagination: component('rPagination')
        },
        data: () => ({
            lightbox: false,
            lightboxImg: {}
        }),
        methods: {
            toggleLightbox(photo) {
                this.lightboxImg = photo
                this.lightbox = !this.lightbox
            },
            nextLightbox() {
                let vm = this
                let img = vm.lightboxImg
                let index = this.singlePhotos.indexOf(img)

                if ((index + 1) === this.singlePhotos.length) {
                    this.lightboxImg = this.singlePhotos[0]
                    return
                }
                this.lightboxImg = this.singlePhotos[index + 1]
            },
            prevLightbox() {
                let vm = this
                let img = vm.lightboxImg
                let index = this.singlePhotos.indexOf(img)

                if ((index - 1) < 0) {
                    this.lightboxImg = this.singlePhotos[this.singlePhotos.length - 1]
                    return
                }
                this.lightboxImg = this.singlePhotos[index - 1]
            },
            getMonth(index) {
                return moment(parseInt(index.split('-')[1]) + 1, 'M').format("MMMM")
            },
            getDiff(photo) {
                return moment(photo.created_at).fromNow()
            }
        },
        watch: {
            lightbox(value) {
                let vm = this
                if (value) {
                    document.addEventListener('keyup', (ev) => {
                        ev.preventDefault()
                        if (ev.keyCode === 37) {
                            vm.prevLightbox()
                        } else if (ev.keyCode === 39) {
                            vm.nextLightbox()
                        } else if (ev.keyCode === 27) {
                            vm.lightbox = false
                        }
                    }, false)

                    document.addEventListener('beforeunload', (ev) => {
                        ev.preventDefault()

                        vm.lightbox = false
                    }, false)
                } else {
                    document.removeEventListener('keyup', null, false)
                    document.removeEventListener('beforeunload', null, false)
                }
            }
        }
    }
</script>

<template>
    <div>
        <h1 class="title white--text">Galeria de imagens</h1>

        <v-container fluid>
            <template v-for="(group, index) in photos">
                <v-subheader>{{ getMonth(index) }}</v-subheader>
                <v-container grid-list-sm fluid>
                    <v-layout row wrap>
                        <v-flex xs6 sm4 md3 v-for="(photo, inde) in group" :key="inde"
                                @click.stop="toggleLightbox(photo)">
                            <v-card height="200px" :img="photo.thumb">
                                <img :src="photo.thumb" v-show="false">
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>
            </template>
        </v-container>

        <v-dialog v-model="lightbox" lazy hide-overlay width="auto" fullscreen content-class="photo--dialog">
            <v-card>
                <v-toolbar dark class="blue">
                    <v-btn icon @click.native="lightbox = false">
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-toolbar>
                <v-container fluid>
                    <v-layout row>
                        <v-card-title>
                            <span class="body-1"><b>{{ getDiff(lightboxImg)}}</b> - {{ lightboxImg.description }}</span>
                        </v-card-title>
                    </v-layout>
                    <v-layout row>
                        <v-flex flexbox justify-center align-center class="hidden-sm-and-down">
                            <v-btn icon large @click.native="prevLightbox">
                                <v-icon>keyboard_arrow_left</v-icon>
                            </v-btn>
                        </v-flex>
                        <v-flex xs12 flexbox align-center justify-center>
                            <img :src="lightboxImg.image" :alt="lightboxImg.alt" style="max-width: 100%">
                        </v-flex>
                        <v-flex flexbox justify-center align-center class="hidden-sm-and-down">
                            <v-btn icon large @click.native="nextLightbox">
                                <v-icon>keyboard_arrow_right</v-icon>
                            </v-btn>
                        </v-flex>
                    </v-layout>
                    <v-layout row wrap align-center justify-center>
                        <v-flex flexbox justify-center align-center class="hidden-md-and-up">
                            <v-btn icon large @click.native="prevLightbox">
                                <v-icon>keyboard_arrow_left</v-icon>
                            </v-btn>
                        </v-flex>
                        <v-flex flexbox justify-center align-center class="hidden-md-and-up">
                            <v-btn icon large @click.native="nextLightbox">
                                <v-icon>keyboard_arrow_right</v-icon>
                            </v-btn>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-card>
        </v-dialog>

        <r-pagination getter="Gallery/pagination"></r-pagination>
    </div>
</template>