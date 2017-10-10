let mix = require('laravel-mix');

mix.styles([
	'resources/assets/css/toastr.css',
	'resources/assets/css/main.css',
	], 'public/assets/css/main.css');
mix.scripts([
	'resources/assets/js/vue.js',
	'resources/assets/js/axios.js',
	'resources/assets/js/toastr.js',
	'resources/assets/js/main.js'
	],'public/js/vue-axios.js');
mix.sass('resources/assets/app/sass/themes/theme-f.scss', 'public/assets/css');
mix.copyDirectory('resources/assets/app', 'public/app');
mix.copyDirectory('resources/assets/css', 'public/assets/css');
mix.copyDirectory('resources/assets/js', 'public/assets/js');
mix.copyDirectory('resources/assets/fonts', 'public/assets/fonts');
mix.copyDirectory('resources/assets/img', 'public/assets/img');
mix.copyDirectory('resources/assets/partials', 'public/assets/partials');