<script>
export default {
    props: {
        message: {
            type: Object,
            required: true
        }
    },
    computed: {
        person() {
            return this.$store.getters['Chat/as']
        },
        admins() {
            return this.$store.getters['Config/key']['chat_admins']['value'].split(',')
        }
    },
    methods: {
        getOffset(message) {
            if (!this.person) {
                return {
                    'offset-xs1': true,
                    'offset-md3': true,
                    'xs10': true,
                    'md6': true
                }
            }
            else if (message.email === this.person.email) {
                return {
                    'offset-xs2': true,
                    'offset-md7': true,
                    'xs10': true,
                    'md5': true
                }
            }
            return {
                'xs10': true,
                'md5': true
            }
        },
        getColor(message) {
            if (!this.person) {
                return {
                    'class': ['orange lighten-3']
                }
            }
            else if (message.email === this.person.email) {
                return {
                    'class': ['green lighten-3']
                }
            }
            return {
                'class': ['blue lighten-2']
            }
        }
    }
}
</script>

<style lang="stylus" scoped>

</style>


<template>
    <v-layout row wrap class="mb-2">
        <v-flex v-bind="getOffset(message)">
            <v-card light hover v-bind="getColor(message)">
                <v-container fluid>
                    <v-layout row>
                        <v-flex xs12>
                            <div class="body-2" style="word-wrap: break-word">{{ message.name }}</div>
                        </v-flex>
                    </v-layout>
                    <v-layout row>
                        <v-flex xs12>
                            <div class="caption" style="word-wrap: break-word">{{ message.email }}</div>
                        </v-flex>
                    </v-layout>
                    <v-layout row wrap>
                        <v-flex xs12>
                            <div class="subheading  grey--text text--darken-3" style="word-wrap: break-word">{{ message.body }}</div>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-card>
        </v-flex>
    </v-layout>
</template>
