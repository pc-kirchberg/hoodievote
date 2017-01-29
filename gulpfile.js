const elixir = require('laravel-elixir');
require('laravel-elixir-postcss');

const mq4HoverShim = require('mq4-hover-shim');

require('laravel-elixir-vue-2');

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

elixir.config.sourcemaps = true;

elixir(mix => {
    mix.sass('app.scss', 'resources/assets/postcss')
      .postcss('app.css', {
          plugins: [
            mq4HoverShim.postprocessorFor({
                hoverSelectorPrefix: 'body.hover-ok'
            })
          ]
      })
       .webpack('app.js');
});
