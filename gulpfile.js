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
            'style.css'
        ], 'public/dist/css')
        .version([
            'public/dist/css/all.css'
        ])
        .copy('vendor/bower_components/font-awesome/fonts/', 'public/fonts/');
});
