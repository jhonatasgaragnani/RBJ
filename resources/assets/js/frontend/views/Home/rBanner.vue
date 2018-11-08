<script>
export default {
    name: 'Banner',
    computed: {
        src() {
            return this.$store.getters['Config/key']['banner_src']['value']
        },
        url() {
            return this.$store.getters['Config/key']['banner_url']['value']
        },
        style() {
            let str = 'height: 500px; width: 100%; display: block; margin: auto; cursor: pointer; background-size: contain; background-position: center center;'
            str += 'background-image: url("' +
                    this.src +
                    '");'
            return str
        }
    },
    methods: {
        go() {
            window.location.href = this.url
        }
    }
}
</script>

<template>
    <v-container fluid>
        <h1 class="text-xs-center">
            <a :href="url" class="headline white--text " style="text-decoration: none">Confira a Rádio no Giro Esportivo</a>
        </h1>
        <div :style="style" @click="go"></div>
    </v-container>
</template>
