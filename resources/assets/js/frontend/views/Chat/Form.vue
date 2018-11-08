<script>
export default {
    computed: {
        person() {
            return this.$store.getters['Chat/as']
        },
        message: {
            get() {
                return this.$store.getters['Chat/message']
            },
            set(value) {
                this.setMessage(value)
            }
        }
    },
    methods: {
        submit() {
            let vm = this
            let body = JSON.parse(JSON.stringify(this.message))
            let {name, email} = JSON.parse(JSON.stringify(this.person))
            this.$store.dispatch('Chat/addMessage', {
                body,
                name,
                email
            })
        },
        setMessage(value) {
            this.$store.dispatch('Chat/setMessage', value)
        },
        sair() {
            this.$store.dispatch('Chat/removeAs')
        }
    },
    mounted () {
        let vm = this
        window.Echo.channel('chat')
            .listen('MessageSent', data => {
                vm.$store.dispatch('Chat/pushMessage', data.message)
            })
    }
}
</script>

<template>
    <form @submit.prevent="submit">
        <v-container fluid>
            <v-layout row>
                <v-flex sm11 xs10>
                    <v-text-field label="Digite sua mensagem" name="message" id="message" v-model="message" light></v-text-field>
                </v-flex>
                <v-flex sm1 xs2>
                    <v-btn large class="blue" icon type="submit">
                        <v-icon>send</v-icon>
                    </v-btn>
                </v-flex>
            </v-layout>
            <v-layout row wrap>
                <v-flex xs12>
                    <span class="grey--text text--darken-3">Enviando como:
                        <b>{{ person.name }} - {{ person.email }}</b>
                    </span>
                    <v-btn @click="sair" class="primary" small>sair</v-btn>
                </v-flex>
            </v-layout>
        </v-container>
    </form>
</template>