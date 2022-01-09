const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
 /* CSS */
 .sass('resources/sass/main.scss', 'public/css/oneui.css')
 .sass('resources/sass/oneui/themes/amethyst.scss', 'public/css/themes/')
 .sass('resources/sass/oneui/themes/city.scss', 'public/css/themes/')
 .sass('resources/sass/oneui/themes/flat.scss', 'public/css/themes/')
 .sass('resources/sass/oneui/themes/modern.scss', 'public/css/themes/')
 .sass('resources/sass/oneui/themes/smooth.scss', 'public/css/themes/')
 .copyDirectory('resources/media','public/media')
 .copyDirectory('resources/fonts','public/fonts')
 .copyDirectory('resources/frontend','public/frontend')
 .copyDirectory('resources/js/plugins','public/js/plugins')

 /* JS */
 .js('resources/js/app.js', 'public/js/laravel.app.js')
 .js('resources/js/oneui/app.js', 'public/js/oneui.app.js')

 /* Page JS */
 .js('resources/js/pages/tables_datatables.js', 'public/js/pages/tables_datatables.js')
 .js('resources/js/app.js', 'public/js')
 .js('resources/js/chart.js', 'public/js/chart.js')
 .disableNotifications()
 /* Options */
 .options({
     processCssUrls: false
 });
 