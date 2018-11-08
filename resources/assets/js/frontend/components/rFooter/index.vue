<script>
    export default {
        computed: {
            string () {
                return this.$store.getters['Config/key']['footer_text']['value']
            }
        }
    }
</script>

<template>
    <v-footer>
        <span class="ml-2">{{ string }}</span>
        <v-spacer></v-spacer>
        <span class="mr-2">Criado por <a href="//sites.xfind.com.br/" closs="black-text" style="text-decoration: none"><b>XFind</b></a></span>
    </v-footer>
</template>