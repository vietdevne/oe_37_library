let mix = require('laravel-mix');

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
   .js('public/js/custom.js','public/js/site.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles('public/css/custom.css', 'public/css/site.css')
   .styles('public/css/bootstrap-notifications.css', 'public/css/notifications.css')
   .styles('public/css/dashboard.css', 'public/css/admin.css')
   .version();
