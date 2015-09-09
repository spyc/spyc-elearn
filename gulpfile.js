var elixir = require('laravel-elixir');

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

const MODE = 'devOps';

elixir(function(mix) {
    mix.scripts([
        'jquery.min.js',
        'jquery.nicescroll.min.js',
        'jquery.metismenu.min.js',
        'raphael.min.js',
        'morris.min.js',
        'bootstrap.min.js',
        'markdown.min.js',
        MODE === 'dev' ? 'react-dev.min.js' :'react.min.js'
    ], 'public/js/engine.min.js');
});
