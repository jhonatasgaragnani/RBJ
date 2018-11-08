window.Vue = require('vue');
window.axios = require('axios');
window.Moment = require('moment');
window.Range = require('moment-range');
window.moment = window.Range.extendMoment(window.Moment);

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


Vue.component('draggable', require('vuedraggable'));

