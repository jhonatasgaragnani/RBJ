<script>
const getSocial = (store, key) => {
    return store.getters['Config/key'][`social_${key}`]['value'] || ''
}
export default {
    name: 'Social',
    methods: {
        items() {
            return  [
            { title: 'Facebook', icon: 'facebook', link: getSocial(this.$store, 'facebook'), color: 'blue--text text--darken-4' },
            { title: 'Instagram', icon: 'instagram', link: getSocial(this.$store, 'instagram'), color: '' },
            { title: 'Twitter', icon: 'twitter', link: getSocial(this.$store, 'twitter') , color: 'blue--text lighten-2'},
            { title: 'Youtube', icon: 'youtube-play', link: getSocial(this.$store, 'youtube'), color: 'red--text darken-3'},
            { title: 'App Android', icon: 'android', link: getSocial(this.$store, 'android'), md: true, color: 'green--text'}
        ]
        }
    }
}
</script>

<template>
    <v-container>
        <v-list subheader light>
            <v-subheader>Encontre a rádio nas redes sociais</v-subheader>
            <v-list-tile v-for="(item, i) in items()" :key="i" :href="item.link" target="_blank">
                <v-list-tile-action>
                    <v-icon :class="item.color" v-bind="{ fa: !!!item.md }" light>{{ item.icon }}</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    {{ item.title }}
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-container>
</template>
