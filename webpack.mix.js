let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .copy('resources/assets/vendor/css/main.css', 'public/css/main.css')
    .copy('resources/assets/vendor/js/app.min.js', 'public/js/main.min.js')
    .extract(['lodash']);