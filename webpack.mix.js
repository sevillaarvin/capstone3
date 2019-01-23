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
    .babel("resources/assets/js/post_detail.js", "public/js/post_detail.js")
    .babel("resources/assets/js/profile.js", "public/js/profile.js")
   .sass('resources/assets/sass/app.scss', 'public/css');
