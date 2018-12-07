process.env.DISABLE_NOTIFIER = true;

const elixir = require('laravel-elixir');
const postStylus = require('poststylus');
const nib = require('nib');
const imagemin = require('gulp-imagemin');
const pngquant = require('imagemin-pngquant');

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

elixir((mix) => {
    mix.stylus('main.styl', 'resources/assets/css/main.css', {
        use: [
            postStylus(['lost', 'rucksack-css']),
            nib()
        ]
    });

    mix.styles([
        'main.css',
        '../../../node_modules/slick-carousel/slick/slick.css',
        '../../../node_modules/magnific-popup/dist/magnific-popup.css',
    ]);

    mix.webpack('script.js', 'public/js/all.js');

    if(elixir.config.production) {
        mix.version(['css/all.css', 'js/all.js']);
    }

    mix.browserSync({
        proxy: 'soundcloud.local'
    });
    mix.task('images', 'resources/assets/img/**/*.*');
    mix.task('fonts', 'resources/assets/font/**/*.*');
});


gulp.task('images', function () {
    return gulp.src('resources/assets/img/**/*')
        .pipe(imagemin({
            progressive: true,
            optimizationLevel: 1,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('public/img'));
});

gulp.task('fonts', function () {
    return gulp.src('resources/assets/font/**/*')
        .pipe(gulp.dest('public/font'));
});