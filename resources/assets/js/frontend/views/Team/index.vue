<script>
    import {component} from '../../router/resolver'
    export default {
        components: {
            rPagination: component('rPagination')
        },
        computed: {
            teams() {
                return this.$store.getters['Team/pData']
            }
        }
    }
</script>

<template>
    <div>
        <h1 class="title white--text">Equipe</h1>

        <v-container fluid grid-list-md>
            <v-layout row wrap align-center>
                <v-flex v-for="(member, i) in teams" :key="i" xs12 md8 offset-md2>
                    <v-card light>
                        <v-container fluid grid-list-lg>
                            <v-layout row justify-center align-center>
                                <v-flex xs5>
                                    <v-card-media
                                            :src="member.thumb"
                                            height="125px"
                                            contain></v-card-media>
                                </v-flex>
                                <v-flex xs7>
                                    <v-card-media contain>
                                        <h1 class="headline">{{ member.name }}</h1>

                                        <div><b>{{ member.role}}</b></div>
                                    </v-card-media>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
        <r-pagination getter="Team/pagination"></r-pagination>
    </div>
</template>