require('./bootstrap');

Vue.component('tops', require('./components/Tops.vue'));
Vue.component('youtube-preview', require('./components/YoutubePreview.vue'));
Vue.component('schedule', require('./components/Schedule.vue'));
Vue.component('configuration', require('./components/Configuration.vue'));
Vue.component('pages-manager', require('./components/PagesManager.vue'));
Vue.component('page-edit', require('./components/PageEdit.vue'));
Vue.component('poll-browser', require('./components/PollBrowser.vue'));
Vue.component('poll-options', require('./components/PollOptions.vue'));

new Vue({

}).$mount('#app');
