let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .babelConfig({
       presets: [
           ['@babel/preset-env', {
               targets: "defaults",
               modules: 'auto'
           }]
       ]
   })
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
       require('autoprefixer'),
   ]);

if (mix.inProduction()) {
    mix.version();
}
