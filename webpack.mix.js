const mix = require('laravel-mix');

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
mix.disableNotifications()
	.sourceMaps();

// backend
mix.js('resources/asset/backend/js/app.js', 'public/js')
	.sass('resources/asset/backend/sass/app.scss', 'public/css')
	.sass('resources/asset/backend/sass/admin_custom.scss', 'public/css');

//frontend
mix.copyDirectory('resources/asset/frontend-template-church/fonts','public/fonts')
	.copy('resources/asset/frontend-template-church/js/jquery.googlemap.js', 'public/js');

mix.sass('resources/asset/frontend-template-church/css/main.scss', 'public/css')
	.sass('resources/asset/frontend-template-church/special.scss', 'public/css')
	.combine([
		'resources/asset/frontend-template-church/js/jquery.js',
		'resources/asset/frontend-template-church/js/bootstrap.min.js',
		'resources/asset/frontend-template-church/js/plugins/owl-crousel/owl.carousel.js',
		'resources/asset/frontend-template-church/js/plugins/animation/wow.min.js',
		'resources/asset/frontend-template-church/js/plugins/animation/jquery.appear.js',
		'resources/asset/frontend-template-church/js/plugins/counter/jquery.countTo.js',
		'resources/asset/frontend-template-church/js/custom.js'
	], 'public/js/main.js');

