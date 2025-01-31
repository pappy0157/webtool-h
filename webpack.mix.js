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
    .js('resources/js/app.js', 'public/js/app.js')
    .js('resources/js/punycode.js', 'public/js/punycode.js')
    .js('resources/js/converters.js', 'public/js/converters.js')
    .js('resources/js/cards.js', 'public/js/cards.js')
    .sass('resources/scss/style.scss', 'public/css/app.css')

.minify('resources/js/lipsum.js', 'public/js/lipsum.js')
    .minify('resources/js/seotags.js', 'public/js/seotags.js')
    .minify('resources/js/formatters.js', 'public/js/formatters.js')

.minify('resources/css/ace-custom.css', 'public/css/ace-custom.css')
.minify('resources/css/all.min.css', 'public/css/all.min.css')

.postCss('resources/css/backend.css', 'public/css/theme.css', [
    require('tailwindcss')
])

.options({
    processCssUrls: false
});