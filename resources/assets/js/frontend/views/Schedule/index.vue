<script>
    import {chunk, uniqBy} from 'lodash'

    export default Vue.extend({
        computed: {
            schedules () {
                let schedules = []

                this.$store.getters['Schedules/all'].map(schedule => {
                    if (schedule.schedules.length > 0) {
                        schedule.schedules.forEach(subSchedule => {
                            schedules.push(subSchedule)
                        })
                    }
                })

                return chunk(uniqBy(schedules, 'id'), 9)
            }
        },
        methods: {
            getGrid(index) {
                if (index === 0 || index === 1 || index === 2) {
                    return {
                        'md4': true,
                        'sm6': true,
                        'xs12': true
                    }
                } else if (index === 3 || index === 4) {
                    return {
                        'md6': true,
                        'sm6': true,
                        'xs12': true
                    }
                } else if (index === 5) {
                    return {
                        'md4': true,
                        'sm6': true,
                        'xs12': true
                    }
                } else if (index === 6) {
                    return {
                        'md8': true,
                        'sm6': true,
                        'xs12': true
                    }
                } else if (index === 7) {
                    return {
                        'md8': true,
                        'sm6': true,
                        'xs12': true,
                    }
                } else if (index === 8) {
                    return {
                        'md4': true,
                        'sm6': true,
                        'xs12': true
                    }
                } else if (index === 9) {
                    return {
                        'md4': true,
                        'sm6': true,
                        'xs12': true
                    }
                }
                else {
                    return {
                        'xs12': true,
                        'sm6': true,
                        'md4': true
                    }
                }
            },
            getTitle(schedule, index) {
              return schedule.name.length > 50 ? schedule.name.slice(0, 47) + '...' : schedule.name
            },
            goTo(schedule) {
                this.$router.push({
                    name: 'Schedule.Child',
                    params: {
                        id: schedule.id
                    }
                })
            },
            getFacebookShare(schedule) {
                return 'http://www.facebook.com/sharer.php?u=' + window.location.href + '/' + schedule.id
            },
            getTwitterShare(schedule) {
                return `https://twitter.com/share?url=${window.location.href}/${schedule.id}&text=${schedule.name}&hashtags=toNaRadioBomJesus`
            },
            getGPlusShare(schedule) {
                return `https://plus.google.com/share?url=${window.location.href}/${schedule.id}`
            }
        }
    })
</script>

<style lang="stylus">

</style>

<template>
    <div>
        <v-container fluid grid-list-md>
            <v-layout row wrap v-for="(group, index) in schedules" :key="index" align-center>
                <v-flex v-for="(schedule, ind) in group"
                        :key="ind"
                        v-bind="getGrid(ind)">
                    <v-card light>
                        <v-card-media @click.native="goTo(schedule)" :src="schedule.image" height="300px" style="cursor: pointer">
                        </v-card-media>
                        <v-card-actions>
                            <span class="headline black--text schedule--name">
                                {{ getTitle(schedule) }}
                            </span>
                            <v-spacer></v-spacer>
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
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>