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

elixir(function(mix) {

    //mix.less('app.less');

    mix.less([
        'app.less'
    ], 'public/css/final.css', 'resources/assets/less');

    mix.scripts([
        'jquery.js',
        'jquery-timepicker.js',
        'jquery-ui.js',
        'modernizr.js',
        'jquery-validation.js',
        'validation.js',
        'main.js'
    ], 'public/js/final.js', 'resources/assets/js');
});
