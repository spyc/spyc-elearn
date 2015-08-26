var elixir = require('laravel-elixir');
var CleanCss = require('less-plugin-clean-css'),
    cleancss = new CleanCss({advanced: true});

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

const MODE = 'dev';

elixir(function(mix) {
    mix.less('app.less', 'public/css/style.css', {plugins: [cleancss]});
    mix.scripts([
        'jquery.min.js',
        'jquery.nicescroll.min.js',
        'bootstrap.min.js',
        'markdown.min.js',
        MODE === 'dev' ? 'react-dev.min.js' :'react.min.js'
    ], 'public/js/engine.min.js');
});
