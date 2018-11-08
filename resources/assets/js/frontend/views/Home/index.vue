<script>
import rTops from './rTops'
import rGallery from './rGallery'
import rSocial from './rSocial'
import rPoll from './rPoll'
import rBanner from './rBanner' 
export default {
    components: {
        rTops,
        rGallery,
        rSocial,
        rPoll,
        rBanner
    }
}
</script>

<template>
    <div>
        <h1 class="headline white--text">Home</h1>
        <v-layout row-md column>
            <v-flex md6 sm12 xs12>
                <r-gallery fetch="/api/posts/latest" route="Posts.Child" sk="PostLatest">
                    Últimas matérias
                </r-gallery>
            </v-flex>
            <v-flex md6 sm12 xs12>
                <r-gallery fetch="/api/news/latest" route="News.Child" sk="NewsLatest">
                    Últimas notícias
                </r-gallery>
            </v-flex>
        </v-layout>
        <v-layout row>
            <v-flex xs12>
                <r-tops></r-tops>
            </v-flex>
        </v-layout>
        <v-layout row>
            <v-flex xs12>
                <r-banner></r-banner>
            </v-flex>
        </v-layout>
        <v-layout row-md column>
            <v-flex md6 xs12>
                <r-poll></r-poll>
            </v-flex>
            <v-flex md6 xs12>
                <r-social></r-social>
            </v-flex>
        </v-layout>
    </div>
</template>
