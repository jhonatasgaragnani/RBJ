<script>
export default {
    metaInfo() {
        return {
            title: `Programa: ${this.schedule.name}`,
            meta: this.metas
        }
    },
    computed: {
        schedule() {
            let vm = this
            return this.$store.getters['Schedules/schedules'].filter(schedule => {
                return parseInt(schedule.id) === parseInt(vm.$route.params.id)
            })[0]
        },
        metas() {
            let vm = this
            return this.$store.getters['Pages/current'].map(config => {
                return {
                    name: config['name'],
                    content: config['content'].replace('{name}', vm.schedule.name).replace('{description}', (new DOMParser).parseFromString(vm.schedule.description, 'text/html').documentElement.textContent),
                    vmid: config['name']
                }
            })
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
    .schedule--description
        * {
            max-width: 100%;
        }
        img {
            max-width: 100%;
            height: auto;
        }
</style>

<template>
    <div>
        <v-container fluid fill-height light>
            <v-card light>
                <v-card-media :src="schedule.image" height="300px">
                    <v-container fill-height fluid>
                        <v-layout fill-height>
                            <v-flex x12 align-end flexbox>

                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-media>
                <v-card-title primary-title>
                    <v-container>
                        <v-layout row wrap>
                            <div>
                                <div class="headline schedule--name" >
                                    <b>{{ schedule.name }}</b>
                                </div>
                                <br>
                                <h3 class="subheading" style="word-wrap: break-word">Apresentando:
                                    <b>{{ schedule.speaker }}</b>
                                </h3>
                            </div>
                        </v-layout>
                        <v-layout row>
                            <div class="schedule--description" v-html="schedule.description"></div>
                        </v-layout>
                    </v-container>
                </v-card-title>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <span class="body-1">Compartilhar:</span>
                    <v-btn icon light :href="getFacebookShare(schedule)" target="_blank">
                        <v-icon fa>facebook</v-icon>
                    </v-btn>
                    <v-btn icon light :href="getGPlusShare(schedule)" target="_blank">
                        <v-icon fa>google-plus</v-icon>
                    </v-btn>
                    <v-btn icon light :href="getTwitterShare(schedule)" target="_blank">
                        <v-icon fa>twitter</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
    </div>
</template>