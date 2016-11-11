const elixir = require('laravel-elixir');
const pug = require('gulp-pug');

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

elixir(mix => {
    mix.sass('app.scss')
       .sass('site.scss')
       .sass('docs.scss')
       .webpack('app.js')
       .webpack('site.js')
       .task('pug', 'resources/assets/pug/**');
});

gulp.task('pug', () => {
  gulp.src([
    'resources/assets/pug/components/**/*.pug',
    '!resources/assets/pug/components/_includes/*.pug',
    'resources/assets/pug/**/*.pug',
    '!resources/assets/pug/layout.pug',
    '!resources/assets/pug/_includes/*.pug'
  ])
  .pipe(pug({
    pretty: true
  }))
  .pipe(gulp.dest('public/html/', { ext: '.html' }))
});
