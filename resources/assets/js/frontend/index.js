require('./plugins');
import Vue from 'vue'
import router from './router'
import store from './store'
import App from './App.vue'

export default new Vue({
    el: '#app',
    router,
    store,
    ...App,
    mounted () {
        if (window.ServerData) {
            let data = window.ServerData

            if (data.hasOwnProperty('metas')) {
                this.$store.dispatch('Pages/setAll', data.metas)
            }

            if (data.hasOwnProperty('page_metas')) {
                this.$store.dispatch('Pages/setCurrent', data['page_metas'])
            }

            if (data.hasOwnProperty('config')) {
                this.$store.dispatch('Config/setAll', data['config'])
            }

            if (data.hasOwnProperty('schedules')) {
                this.$store.dispatch('Schedules/setAll', data['schedules'])
            }
        }
    },
    watch: {
        '$route'(route) {
            if (route.hasOwnProperty('name') && route.name.trim()) {
                this.$store.dispatch('Pages/setCurrent', this.$store.getters['Pages/all'][route.name])
            }
        }
    }
});
