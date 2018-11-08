<script>
    import store from '../../store'
    import rForm from './Form'
    import rLogin from './Login'
    import rMessages from './Messages'

    export default {
        beforeRouteEnter(to, from, next) {
            store.dispatch('Ui/setFillHeight', true)
            next()
        },
        beforeRouteLeave(to, from, next) {
            store.dispatch('Ui/setFillHeight', false)
            next()
        },
        components: {
            rForm,
            rLogin,
            rMessages
        },
        computed: {
            person() {
                return this.$store.getters['Chat/as']
            },
            messages() {
                return this.$store.getters['Chat/messages']
            }
        },
        mounted () {
            this.$refs.chat.scrollTop = this.$refs.chat.scrollHeight
        },
        updated() {
            this.$refs.chat.scrollTop = this.$refs.chat.scrollHeight
        },
    }
</script>

<template>
    <v-container fluid>
        <v-layout row>
            <v-flex xs12 class="chat--box" style="max-width: 100%">
                <v-card height="100%" light class="chat--inner grey lighten-2" ref="chat">
                    <r-messages :messages="messages"></r-messages>
                </v-card>
            </v-flex>
        </v-layout>
        <v-layout row>
            <v-flex xs12 class="chat--form">
                <v-card class="grey lighten-4 elevation-0" v-if="person" tile>
                    <r-form></r-form>
                </v-card>
                <v-card class="grey lighten-4 elevation-0" v-else tile>
                    <r-login></r-login>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>
