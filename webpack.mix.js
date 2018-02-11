let mix = require('laravel-mix');

mix.copy('resources/assets/vendor/css/main.css', 'public/css/vendor.css')
    .copy('resources/assets/vendor/js/app.min.js', 'public/js/vendor.min.js');
