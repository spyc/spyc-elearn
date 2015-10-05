var elixir = require('laravel-elixir');
var CleanCss = require('less-plugin-clean-css'),
    cleancss = new CleanCss({advanced: true});

require('./gulp/react');
require('./gulp/script');

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

const scripts = [
    'jquery.min.js',
    'jquery.nicescroll.min.js',
    'jquery.metismenu.min.js',
    'raphael.min.js',
    'morris.min.js',
    'bootstrap.min.js',
    'markdown.min.js',
    'react.min.js'
];

elixir(function(mix) {
    mix.phpUnit();
    mix.less('app.less', 'public/css/style.css', {plugins: [cleancss]});
    mix.jsx();
    mix.js();
    mix.scripts(scripts, 'public/js/engine.min.js');
});
