<script>
    import moment from 'moment'
    import 'moment/locale/pt-br'
    export default {
        metaInfo() {
            return {
                title: this.interviews ? `Entrevista: ${this.interviews.meta_title}` : 'Titulo padrão',
                metas: this.metas ? this.metas : []
            }
        },
        computed: {
            interviews() {
                return this.$store.getters['Interviews/current']
            },
            metas() {
                let payload = {
                    description: '',
                    keywords: ''
                }

                if (this.interviews) {
                    payload = {
                        description: this.interviews.meta_description,
                        keywords: this.interviews.meta_keywords,
                        'og:title': this.interviews.title,
                        'og:image': this.interviews.image
                    }
                }
                return [
                    {name: 'description', content: payload.description, vmid: 'description'},
                    {name: 'keywords', content: payload.keywords, vmid: 'keywords'},
                    {name: 'og:title', content: payload['og:title'], vmid: 'og:title'},
                    {name: 'og:image', content: payload['og:image'], vmid: 'og:image'}
                ]

            },
            createdDiff() {
                return moment(this.interviews.created_at).fromNow()
            },
            updatedDiff() {
                return moment(this.interviews.updated_at).fromNow()
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
    .interviews--body {
        * {
            max-width: 100%;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    }

    .interviews-title {
        max-width: 100%
    }
</style>

<template>
    <div>
        <v-container fluid fill-height light v-if="interviews">
            <v-card light>
                <v-card-media :src="interviews.image" height="300px">
                </v-card-media>
                <v-card-title primary-title>
                    <div>
                        <div class="mb-2">
                            <span class="headline schedule--name"><b>{{ interviews.title }}</b></span>
                        </div>
                        <div class="schedule--description" v-html="interviews.body"></div>
                    </div>
                    <v-container>
                        <v-layout row>
                            <v-flex x12>
                                <p class="body-1">Criado há: <b>{{createdDiff}}.</b></p>
                                <p class="body-1" v-if="createdDiff !== updatedDiff">Editado há: <b>{{updatedDiff}}.</b></p>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-title>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <span class="body-1">Compartilhar:</span>
                    <v-btn icon light :href="getFacebookShare(interviews)" target="_blank">
                        <v-icon fa>facebook</v-icon>
                    </v-btn>
                    <v-btn icon light :href="getGPlusShare(interviews)" target="_blank">
                        <v-icon fa>google-plus</v-icon>
                    </v-btn>
                    <v-btn icon light :href="getTwitterShare(interviews)" target="_blank">
                        <v-icon fa>twitter</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
    </div>
</template>