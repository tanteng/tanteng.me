var elixir = require('laravel-elixir');

elixir.config.production = true;
elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix
        .styles([
            '../../../vendor/bower_components/bootstrap/dist/css/bootstrap.min.css',
            'style.css'
        ], 'public/dist/css/style.css')
        .styles([
            '../../../vendor/bower_components/bootstrap/dist/css/bootstrap.min.css',
            'cover.css'
        ], 'public/dist/css/cover.css')
        .scripts([
            'vendor/bower_components/jquery/dist/jquery.js',
            'vendor/bower_components/bootstrap-sass/assets/javascripts/bootstrap.js'
        ], 'public/dist/js/all.js', './')
        .version([
            'public/dist/css/style.css',
            'public/dist/css/cover.css'
        ])
        .copy('vendor/bower_components/bootstrap/fonts/', 'public/build/dist/fonts/');
});
