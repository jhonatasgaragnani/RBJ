<script>
    import axios from 'axios'
    import {Carousel, Slide} from 'vue-carousel'
    import {groupBy} from 'lodash'

    export default {
        name: 'Tops',
        components: {
            Carousel,
            Slide
        },
        data: () => ({
            width: 560,
            height: 315,
        }),
        computed: {
            tops() {
                return this.$store.getters['Home/tops']
            }
        },
        async created() {
            if (!this.tops.length) {
                let {data} = await axios.get('/api/tops')
                this.$store.dispatch('Home/setTops', data)
            }
        },
        methods: {
            getId(url) {
                var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                var match = url.match(regExp);

                if (match && match[2].length == 11) {
                    return match[2];
                } else {
                    return null;
                }
            },
            getThumb(top) {
                return `https://img.youtube.com/vi/${this.getId(top.music)}/mqdefault.jpg`
            },
            getVideo(top) {
                return `//www.youtube.com/watch?v=${this.getId(top.music)}`
            }
        }
    }
</script>

<style lang="stylus">
    .video--wrapper
        position relative
        padding-bottom 56.25%
        padding-top 25px
        margin 10px
        height 0

        iframe
            position absolute
            top 0
            left 0
            width 100%
            height 100%
</style>


<template>
    <v-container>
        <h1 class="headline text-xs-center white--text">As mais tocadas</h1>
        <carousel :perPageCustom="[[100, 1], [600, 2], [1024, 3], [1440, 4], [1920, 5]]" loop :autoplayTimeout="3000"
                  autoplayHoverPause :navigationClickTargetSize="10" navigationEnabled>
            <slide v-for="(top, i) in tops" :key="i">
                <h2 class="subheading white--text">{{ top.position }}º {{ top.title }} - {{ top.artist }}</h2>
                <div class="video--wrapper">
                    <a target="_blank" :href="getVideo(top)">
                        <img :src="getThumb(top)" style="width: 100%">
                    </a>
                </div>
            </slide>
        </carousel>
    </v-container>
</template>
