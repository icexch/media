let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copy('resources/assets/vendor/css/main.css', 'public/css/vendor.css')
    .copy('resources/assets/vendor/js/main.min.js', 'public/js/vendor.min.js')
    .extract(['lodash']);

mix.copy('resources/assets/js/area.min.js', 'public/js/area.js');
