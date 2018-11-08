<script>
    import {component} from '../../router/resolver'
    export default {
        components: {
            rPagination: component('rPagination')
        },
        computed: {
            partners() {
                return this.$store.getters['Partners/pData']
            }
        },
        methods: {
            goTo(partner) {
                if (!partner.site) {
                    return
                }

                window.open(partner.site, '_blank')
            },
            getGrid(index) {
                switch (index) {
                    case 0:
                        return {
                            'xs12': true,
                            'sm6': true,
                            'md3': true
                        }
                        break
                    case 1:
                        return {
                            'xs12': true,
                            'sm6': true,
                            'md4': true
                        }
                        break
                    case 2:
                        return {
                            'xs12': true,
                            'sm6': true,
                            'md3': true
                        }
                        break
                    case 4:
                        return {
                            'xs12': true,
                            'sm6': true,
                            'md4': true
                        }
                        break
                    case 5:
                        return {
                            'xs12': true,
                            'sm6': true,
                            'md4': true
                        }
                    case 6:
                        return {
                            'xs12': true,
                            'sm6': true,
                            'md4': true
                        }
                    case 7:
                        return {
                            'xs12': true,
                            'sm6': true,
                            'md3': true
                        }
                    case 8:
                        return {
                            'xs12': true,
                            'sm6': true,
                            'md4': true
                        }
                    case 9:
                        return {
                            'xs12': true,
                            'sm6': true,
                            'md5': true
                        }
                    default:
                        return {
                            'xs12': true,
                            'sm6': true,
                            'md2': true
                        }
                        break
                }
            }
        }
    }
</script>

<template>
    <div>
        <h1 class="title white--text">Parceiros</h1>

        <v-container fluid grid-list-md>
            <v-layout row wrap>
                <v-flex v-for="(partner, i) in partners" :key="i" v-bind="getGrid(i)">
                    <v-card light>
                        <v-card-media @click.native="goTo(partner)" :src="partner.thumb" height="200px">
                        </v-card-media>
                        <v-card-actions>
                            <a :href="partner.site" target="_blank" v-if="partner.site">
                                {{ partner.name }}
                            </a>
                            <span v-else>{{ partner.name }}</span>
                        </v-card-actions>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>

        <r-pagination getter="Partners/pagination"></r-pagination>
    </div>
</template>