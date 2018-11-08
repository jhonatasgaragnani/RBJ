const {mix} = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js('resources/assets/js/app.js', 'public/js')
    .webpackConfig({
        resolve: {
            extensions: ['*', '.js', '.vue', '.json']
        }
    })
    .extract([
        'vue',
        'vuex',
        'vue-router',
        'vuetify',
        'axios',
        'moment',
        'js-cookie',
        'lodash'
    ])
    .stylus('resources/assets/stylus/app.styl', 'public/css')
    .autoload({
        vue: ['Vue', 'window.Vue']
    })
    .disableNotifications();
 

/*  mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
    'resources/admin/js/app.js',
    'resources/admin/js/plugins/slimScroll/slimscroll.js',
    'resources/admin/js/plugins/datatables/jquery.dataTables.js',
    'resources/admin/js/plugins/datatables/dataTables.bootstrap.js',
    'resources/admin/js/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js',
    'resources/admin/js/plugins/select2/select2.full.js',
    'resources/admin/js/plugins/select2/i18n/pt-BR.js',
    'public/vendor/laravel-filemanager/js/lfm.js',
    'resources/admin/js/plugins/tinymce/js/tinymce/tinymce.min.js',
    'resources/admin/js/plugins/tinymce/js/tinymce/jquery.tinymce.min.js',
    'resources/admin/js/plugins/lightbox/js/lightbox.js',
    'resources/admin/js/plugins/timepicker/bootstrap-timepicker.js',
    'resources/admin/js/plugins/datepicker/bootstrap-datepicker.js',
    'resources/admin/js/plugins/datepicker/locales/bootstrap-datepicker.pt-BR.js',
    'resources/admin/js/plugins/ekko/ekko.js',
    'resources/admin/js/custom.js'
], 'public/backend/js/app.js');

mix.sass('node_modules/bootstrap-sass/assets/stylesheets/_bootstrap.scss', 'public/backend/css/bootstrap.css');

mix.styles([
    'public/backend/css/bootstrap.css',
    'node_modules/font-awesome/css/font-awesome.css',
    'resources/admin/css/skins/_all-skins.css',
    'resources/admin/css/AdminLTE.css',
    'resources/admin/js/plugins/select2/select2.css',
    'resources/admin/css/alt/AdminLTE-select2.css',
    'resources/admin/css/plugins/checkbox.css',
    'resources/admin/js/plugins/datatables/dataTables.bootstrap.css',
    'resources/admin/js/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css',
    'resources/admin/js/plugins/lightbox/css/lightbox.css',
    'resources/admin/js/plugins/timepicker/bootstrap-timepicker.css',
    'resources/admin/js/plugins/datepicker/datepicker3.css',
    'resources/admin/js/plugins/ekko/ekko.css',
], 'public/backend/css/app.css');

mix.js('resources/admin/js/babel/app.js', 'public/backend/js/babel.js');  */