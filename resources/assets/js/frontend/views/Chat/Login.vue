<script>
export default {
    data: () => ({
        as: {
            name: '',
            email: ''
        },
        rules: {
            required: value => !!value || 'Campo obrigatório',
            email: (value) => {
                const pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                return pattern.test(value) || 'Emaill invalido.'
            }
        }
    }),
    methods: {
        submit() {
            let as = this.as
            const pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

            if (!as.hasOwnProperty('name') || !as.hasOwnProperty('email')) return
            if (!pattern.test(as.email)) return

            this.$store.dispatch('Chat/setAs', as)

            this.as = {
                name: '',
                email: ''
            }
        }
    }
}
</script>

<template>
    <form @submit.prevent="submit">
        <v-container class="hidden-md-and-up">
            <span class="grey--text text--darken-2 headline">Entrar</span>
            <v-layout row>
                <v-flex xs12>
                    <v-text-field light v-model="as.name" name="name" label="Nome" :rules="[rules.required]"></v-text-field>
                </v-flex>
            </v-layout>
            <v-layout row>
                <v-flex xs12>
                    <v-text-field light v-model="as.email" name="email" label="Email" :rules="[rules.required, rules.email]"></v-text-field>
                </v-flex>
            </v-layout>
            <v-layout row>
                <v-flex xs12>
                    <v-btn class="blue" type="submit" block>entrar</v-btn>
                </v-flex>
            </v-layout>
        </v-container>
        <v-container class="hidden-sm-and-down">
            <span class="grey--text text--darken-2 headline">Entrar</span>            
            <v-layout row>
                <v-flex xs5>
                    <v-text-field light v-model="as.name" name="name" label="Nome" :rules="[rules.required]"></v-text-field>
                </v-flex>
                <v-flex xs5>
                    <v-text-field light v-model="as.email" name="email" label="Email" :rules="[rules.required, rules.email]"></v-text-field>
                </v-flex>
                <v-flex xs2>
                    <v-btn class="blue" type="submit" block>entrar</v-btn>
                </v-flex>
            </v-layout>
        </v-container>
    </form>
</template>