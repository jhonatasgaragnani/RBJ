<script>
    import {component} from './router/resolver'
    const rPlayer = component('rPlayer');
    const rFooter = component('rFooter');
    export default {
        metaInfo() {
            return {
                titleTemplate: this.titleTemplate,
                title: this.title,
                meta: this.metas
            }
        },
        data: () => ({
            drawer: true,
            persistent: true,
            isMobile: false,
            items: [
                {title: 'Home', icon: 'dashboard', to: '/'},
                {title: 'Programação', icon: 'access_time', to: '/schedule'},
                {title: 'Notícias', icon: 'insert_drive_file', to: '/news'},
                {title: 'Entrevistas', icon: 'mic', to: '/interviews'},
                {title: 'Matérias', icon: 'library_books', to: '/posts'},
                {title: 'Eventos', icon: 'event', to: '/events'},
                {title: 'Galeria de fotos', icon: 'photo_library', to: '/gallery'},
                {title: 'Tv Rádio Bom Jesus', icon: 'video_library', to: '/videos'},
                {title: 'A Equipe', icon: 'supervisor_account', to: '/team'},
                {title: 'A Rádio', icon: 'info_outline', to: '/about'},
                {title: 'Parceiros', icon: 'tag_faces', to: '/partners'},
                {title: 'Fale conosco', icon: 'chat', to: '/chat'},
            ]
        }),
        computed: {
            title() {
                return this.$store.getters['Pages/current'].filter(config => config.name === 'title')[0].content
            },
            titleTemplate() {
                let payload = this.$store.getters['Config/all'].filter(config => config.key === 'suffix')[0].value
                return '%s - ' + payload
            },
            metas() {
                return this.$store.getters['Pages/current'].map(config => ({
                    name: config['name'],
                    content: config['content'],
                    vmid: config['name']
                }))
            },
            getUi() {
                let ui = this.$store.getters['Ui/all']
                let payload = {}

                if (ui.fillHeight) payload['fill-height'] = true

                return payload
            },
            logoSrc() {
                return this.$store.getters['Config/key']['logo_src'] ? this.$store.getters['Config/key']['logo_src']['value'] : '/photos/assets/logo_thumb.png'
            }
        },
        methods: {
          toggleDrawer() {
              this.drawer = !this.drawer
          }
        },
        components: {
            rPlayer,
            rFooter
        },
        mounted () {
            let vm = this
            setInterval(() => {
                vm.isMobile = vm.$refs.drawer.isMobile
            }, 1000)
        }
    }
</script>

<template>
    <v-app toolbar dark>
        <v-navigation-drawer height="100%" class="orange lighten-2" persistent enable-resize-watcher :clipped="!isMobile" v-model="drawer" ref="drawer">
            <router-link v-if="false" to="/" tag="img" style="cursor: pointer; display: block; max-width: 150px; margin: 10px auto 0 " :src="logoSrc"></router-link>
            <v-list class="orange lighten-2">
                <v-list-tile v-for="(item, index) in items" :key="index" :to="item.to">
                    <v-list-tile-action>
                        <v-icon>{{item.icon}}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <span>{{ item.title }}</span>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar class="primary" fixed>
            <v-toolbar-side-icon @click.native.stop="toggleDrawer" class="hidden-md-and-up"></v-toolbar-side-icon>
            <v-toolbar-title>
                <router-link to="/"
                             tag="img"
                             style="cursor: pointer; max-width: 90px; position: relative; top: 3px;"
                             :src="logoSrc"></router-link>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <r-player></r-player>
        </v-toolbar>
        <main>
            <v-container fluid v-bind="getUi">
                <transition name="r-fade" mode="out-in">
                    <router-view></router-view>
                </transition>
            </v-container>
        </main>
        <r-footer></r-footer>
    </v-app>
</template>
