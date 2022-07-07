let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'js').vue()
    .sass('resources/sass/app.scss', 'css');

mix.version();
if(mix.inProduction()) {
    mix.minify();
}
