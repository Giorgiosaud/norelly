var elixir = require('laravel-elixir');
elixir.config.publicPath='compiled';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

 elixir(function(mix) {
 	mix.copy('vendor/bower_components/open-sans/fonts/','compiled/fonts/')
 	.sass('sass.scss', 'resources/css',
 	{
 		includePaths:[
 		__dirname + '/vendor/bower_components',
 		]

 	})
 	.styles(
 		[
 		'sass.css'
 		],null,'resources/css')
 	.scripts([
 		'jquery/dist/jquery.min.js',
 		'bootstrap-sass/assets/javascripts/bootstrap.min.js'
 		],'resources/js','vendor/bower_components/')
 	.scripts([
 		'all.js',
 		'main.js'
 		],null,'resources/js');
 });
