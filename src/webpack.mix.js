let mix = require('laravel-mix');
mix.sass('resources/scss/app.scss', 'css/app.css')
   .js('resources/js/app.js', 'js/app.js');