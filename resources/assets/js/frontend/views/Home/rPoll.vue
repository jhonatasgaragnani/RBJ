<script>
    import axios from 'axios'
    export default {
        name: 'Poll',
        computed: {
            poll() {
                return this.$store.getters['Polls/poll']
            },
            valid() {
                return !!this.poll
            }
        },
        data: () => ({
            voting: true,
            voted: false,
            selected: null
        }),
        methods: {
            select(id) {
                if (!this.voting) return
                this.selected = id
            },
            votar() {
                this.$store.dispatch('Polls/vote', this.selected)
                    .then(poll => {
                        this.voting = false
                        this.voted = true
                    })
            },
            async buscar() {
                await this.$store.dispatch('Polls/fetch')
                this.selected = null
                this.voting = true
                this.voted = false
            }
        }
    }
</script>

<template>
    <v-container>
        <v-list subheader light v-if="valid">
            <v-subheader>Participe de algumas enquetes</v-subheader>
            <form @submit.prevent="votar">
                <v-subheader class="title">{{ poll.question }}</v-subheader>
                <v-list-tile v-for="(option, i) in poll.options" :key="i" @click.native="select(option.id)">
                    <v-list-tile-content v-show="voting">
                        <v-radio light v-model="selected" :value="option.id" :label="option.name">{{ selected }}
                        </v-radio>
                    </v-list-tile-content>
                    <v-list-tile-content v-show="!voting">
                        <span class="grey--text">
                            {{ option.name }} - {{ option.votes }}
                        </span>
                    </v-list-tile-content>
                </v-list-tile>
                <v-btn primary v-show="voting" type="submit">votar</v-btn>
                <v-btn class="blue" @click.native="voting = !voting" v-show="!voted">
                    {{ voting ? 'placar' : ''}}

                    <v-icon v-show="!voting">arrow_back</v-icon>
                </v-btn>
                <v-btn v-show="!voting && voted" @click.native="buscar">
                    próximo

                </v-btn>
            </form>
        </v-list>
        <v-card light v-if="!valid" height="300px">
            <v-container fill-height>
                <v-layout row align-center justify-center>
                    <span class="grey--text text--darken-2">não há novas enquetes</span>
                </v-layout>
            </v-container>
        </v-card>
    </v-container>
</template>
