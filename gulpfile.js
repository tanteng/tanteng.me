const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.styles([
        'cover.css'
    ], 'public/css/cover.css');
    mix.styles([
        'style.css',
        'pill.css'
    ], 'public/css/style.css');
    mix.scripts([
        'scrollerup.js'
    ], 'public/js/all.js');
    mix.version([
        'public/css/cover.css',
        'public/css/style.css',
        'public/js/all.js'
    ]);
});