<script>
    import moment from 'moment'
    import 'moment/locale/pt-br'
    export default {
        metaInfo() {
          return {
              title: this.event ? `Event: ${this.event.meta_title}` : 'Titulo padrão',
              metas: this.metas ? this.metas : []
          }
        },
        computed: {
            metas() {
                let payload = {
                    description: '',
                    keywords: ''
                }

                if (this.event) {
                    payload = {
                        description: this.event.meta_description,
                        keywords: this.event.meta_keywords,
                        'og:title': this.event.title,
                        'og:image': this.event.image
                    }
                }
                return [
                    {name: 'description', content: payload.description, vmid: 'description'},
                    {name: 'keywords', content: payload.keywords, vmid: 'keywords'},
                    {name: 'og:title', content: payload['og:title'], vmid: 'og:title'},
                    {name: 'og:image', content: payload['og:image'], vmid: 'og:image'}
                ]  
            },
            event() {
                return this.$store.getters['Events/current']
            },
            getDate() {
                return moment(this.event).format('D [de] MMMM [de] YYYY')
            },
            getFacebookShare() {
                return 'http://www.facebook.com/sharer.php?u=' + (window.location.href)
            },
            getGPlusShare() {
                return `https://plus.google.com/share?url=${window.location.href}`
            },
            getTwitterShare() {
                return `https://twitter.com/share?url=${window.location.href}&text=${this.event.title}&hashtags=toNaRadioBomJesus`
            }
        }
    }
</script>

<template>
    <div>
        <v-container fluid fill-height light v-if="event">
            <v-card light>
                <v-card-media :src="event.image" height="300px">
                </v-card-media>
                <v-card-title primary-title>
                    <div>
                        <div class="mb-2">
                            <span class="headline schedule--name"><b>{{ event.title }}</b></span>
                        </div>
                        <div class="schedule--description" v-html="event.body"></div>
                    </div>
                    <v-container>
                        <v-layout row>
                            <v-flex xs12>
                                Data: <b>{{ getDate }}</b>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-title>
                <v-card-actions>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <span class="body-1">Compartilhar:</span>
                        <v-btn icon light :href="getFacebookShare" target="_blank">
                            <v-icon fa>facebook</v-icon>
                        </v-btn>
                        <v-btn icon light :href="getGPlusShare" target="_blank">
                            <v-icon fa>google-plus</v-icon>
                        </v-btn>
                        <v-btn icon light :href="getTwitterShare" target="_blank">
                            <v-icon fa>twitter</v-icon>
                        </v-btn>
                    </v-card-actions>
                </v-card-actions>
            </v-card>
        </v-container>
    </div>
</template>
