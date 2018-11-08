<script>
    import moment from 'moment'
    import 'moment/locale/pt-br'
    export default {
        metaInfo() {
            return {
                title: this.posts ? `Matéria: ${this.posts.meta_title}` : 'Titulo padrão',
                metas: this.metas ? this.metas : []
            }
        },
        computed: {
            posts() {
                return this.$store.getters['Posts/current']
            },
            metas() {
                let payload = {
                    description: '',
                    keywords: ''
                }

                if (this.posts) {
                    payload = {
                        description: this.posts.meta_description,
                        keywords: this.posts.meta_keywords
                    }
                }
                return [
                    {name: 'description', content: payload.description, vmid: 'description'},
                    {name: 'keywords', content: payload.keywords, vmid: 'keywords'}
                ]

            },
            createdDiff() {
                return moment(this.posts.created_at).fromNow()
            },
            updatedDiff() {
                return moment(this.posts.updated_at).fromNow()
            }
        },
        methods: {
            getFacebookShare(interviews) {
                return 'http://www.facebook.com/sharer.php?u=' + (window.location.href)
            },
            getGPlusShare(interviews) {
                return `https://plus.google.com/share?url=${window.location.href}`
            },
            getTwitterShare(interviews) {
                return `https://twitter.com/share?url=${window.location.href}&hashtags=toNaRadioBomJesus`
            }
        }
    }
</script>

<style lang="stylus">
    .posts--body {
        * {
            max-width: 100%;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    }

    .posts-title {
        max-width: 100%
    }
</style>

<template>
    <div>
        <v-container fluid fill-height light v-if="posts">
            <v-card light>
                <v-card-media :src="posts.image" height="300px">
                </v-card-media>
                <v-card-title primary-title>
                    <div>
                        <div class="mb-2">
                            <span class="headline schedule--name"><b>{{ posts.title }}</b></span>
                        </div>
                        <div class="schedule--description" v-html="posts.body"></div>
                    </div>
                    <v-container>
                        <v-layout row>
                            <v-flex x12>
                                <p class="body-1">Criado há: <b>{{createdDiff}}.</b></p>
                                <p class="body-1" v-if="createdDiff !== updatedDiff">Editado há: <b>{{updatedDiff}}.</b>
                                </p>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-title>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <span class="body-1">Compartilhar:</span>
                    <v-btn icon light :href="getFacebookShare(posts)" target="_blank">
                        <v-icon fa>facebook</v-icon>
                    </v-btn>
                    <v-btn icon light :href="getGPlusShare(posts)" target="_blank">
                        <v-icon fa>google-plus</v-icon>
                    </v-btn>
                    <v-btn icon light :href="getTwitterShare(posts)" target="_blank">
                        <v-icon fa>twitter</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
    </div>
</template>