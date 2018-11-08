<script>
import axios from 'axios'
export default {
    name: 'Gallery',
    props: {
        fetch: {
            type: String,
            required: true,
            validator: value => (/^\/api\//).test(value)
        },
        sk: {
            type: String,
            required: true
        },
        route: {
            type: String,
            required: true
        }
    },
    data: () => ({
        items: []
     }),
    async created() {
        if (!Object.keys(this.$store.getters['Home/carousels']).length || 
        !this.$store.getters['Home/carousels'][this.sk]) {
            let { data } = await axios.get(this.fetch)
            let vm = this
            this.$store.dispatch('Home/setCarousel', {
                payload: data,
                key: this.sk
            })
            .then(() => {
                vm.items = vm.$store.getters['Home/carousels'][vm.sk]
            })
        }
        else {
            this.items = this.$store.getters['Home/carousels'][this.sk]            
        }
    },
    methods: {
        go(item) {
            this.$router.push({ name: this.route, params: {id: item.id} })
        }
    }
}
</script>

<template>
    <v-container>
        <h1 class="headline text-xs-center white--text">
            <slot></slot>
        </h1>
        <v-carousel light v-if="items.length" @change.native="test">
            <v-carousel-item v-for="(item, i) in items" :key="i" :src="item.image" style="cursor: pointer" @click.native="go(item)">
            </v-carousel-item>
        </v-carousel>
        <p v-else>carregando...</p>
    </v-container>
</template>
