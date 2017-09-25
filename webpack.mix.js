let mix = require('laravel-mix');

mix.sass('resources/assets/app/sass/themes/theme-a.scss', 'public/assets/css');
mix.copyDirectory('resources/assets/app', 'public/app');
mix.copyDirectory('resources/assets/css', 'public/assets/css');
mix.copyDirectory('resources/assets/js', 'public/assets/js');
mix.copyDirectory('resources/assets/fonts', 'public/assets/fonts');
mix.copyDirectory('resources/assets/img', 'public/assets/img');
mix.copyDirectory('resources/assets/partials', 'public/assets/partials');