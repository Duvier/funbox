let mix = require('laravel-mix');

mix.styles([
	'resources/assets/css/bootstrap.min.css',
	'resources/assets/css/animate.css',
	'resources/assets/css/style.css',
	/*-- Plugins --*/
	'resources/assets/css/plugins/datepicker/datepicker3.css',
	'resources/assets/css/plugins/dataTables/datatables.min.css',
	'resources/assets/css/plugins/iCheck/custom.css',
	'resources/assets/css/plugins/fullcalendar/fullcalendar.css',
	// 'resources/assets/css/plugins/fullcalendar/fullcalendar.print.css',
	'resources/assets/css/main.css'
	], 'public/css/plantilla.css');

mix.scripts([
	'resources/assets/js/plugins/fullcalendar/moment.min.js',
	'resources/assets/js/jquery-3.1.1.min.js',
	'resources/assets/js/plugins/jquery-ui.min.js',
	'resources/assets/js/vue.js',
	'resources/assets/js/axios.js',
	'resources/assets/js/bootstrap.min.js',
	/*-- Plugins --*/
	'resources/assets/js/plugins/metisMenu/jquery.metisMenu.js',
	'resources/assets/js/plugins/pace/pace.min.js',
	'resources/assets/js/plugins/slimscroll/jquery.slimscroll.min.js',
	'resources/assets/js/plugins/datepicker/bootstrap-datepicker.js',
	'resources/assets/js/plugins/dataTables/datatables.min.js',
	'resources/assets/js/plugins/iCheck/icheck.min.js',
	'resources/assets/js/plugins/fullcalendar/fullcalendar.min.js',
	// 'resources/assets/js/plugins/fullcalendar/es.js',
	/*-- Plantilla --*/
	'resources/assets/js/inspinia.js',
	'resources/assets/js/main.js',
	], 'public/js/plantilla.js');
mix.js('resources/assets/js/app.js', 'public/js');
mix.copyDirectory('resources/assets/css/patterns', 'public/css/');
mix.copyDirectory('resources/assets/js/templates', 'public/js/');
mix.copyDirectory('resources/assets/img', 'public/img/');
mix.copyDirectory('resources/assets/font-awesome', 'public/font-awesome/');