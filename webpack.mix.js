const mix = require('laravel-mix');

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


mix.styles([
    'resources/css/pace-theme-default.min.css',
    'resources/css/vendors-rtl.min.css',
    'resources/css/toastr.min.css',
    'resources/css/bootstrap.min.css',
    'resources/css/bootstrap-extended.min.css',
    'resources/css/colors.min.css',
    'resources/css/components.min.css',
    'resources/css/dark-layout.min.css',
    'resources/css/bordered-layout.min.css',
    'resources/css/resources/css/semi-dark-layout.min.css',
    'resources/css/vertical-menu.min.css',
    'resources/css/dashboard-ecommerce.min.css',
    'resources/css/ext-component-toastr.min.css',
    'resources/css/custom-rtl.min.css',
    'resources/css/style-rtl.css'
], 'public/css/vendors.css');


mix.js('resources/js/app.js', 'public/js/vendors.js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css/vendors.css');
