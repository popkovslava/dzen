var gulp = require('gulp'),
    // sass = require('gulp-sass'),
    // sourcemaps = require('gulp-sourcemaps'),
    // browserSync = require('browser-sync'),
    // concat = require('gulp-concat'),
    // cssnano = require('gulp-cssnano'),
    // rename = require('gulp-rename'),
    // del = require('del'),
    // uglify = require('gulp-uglifyjs'),
    // imagemin = require('gulp-imagemin'),
    // pngquant = require('imagemin-pngquant'),
    // cache = require('gulp-cache'),
    // autoprefixer = require('gulp-autoprefixer'),
        svgSprite = require('gulp-svg-sprites'),
        svgmin = require('gulp-svgmin'),
        cheerio = require('gulp-cheerio'),
        replace = require('gulp-replace');
    // minifyjs = require('gulp-js-minify'),
    // uglifycss = require('gulp-uglifycss'),
    // image = require('gulp-image');


var assetsDir = 'resources/assets/';
var buildDir = 'public/';

gulp.task('image', function () {

    gulp.src(buildDir + 'files/uploads/thumb/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/thumb/'));

    gulp.src(buildDir + 'files/uploads/client-thumb/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: true,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 30
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/client-thumb/'));

    gulp.src(buildDir + 'files/uploads/hight/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/hight/'));

    gulp.src(buildDir + 'files/uploads/large/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/large/'));

    gulp.src(buildDir + 'files/uploads/medium/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/medium/'));

    gulp.src(buildDir + 'files/uploads/title_img/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/title_img/'));

    gulp.src(buildDir + 'files/uploads/title_img/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/title_img/'));

    gulp.src(buildDir + 'files/uploads/title_img_gallery/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/title_img_gallery/'));

    gulp.src(buildDir + 'files/uploads/work-image/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/work-image/'));

    gulp.src(buildDir + 'files/uploads/work-large/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/work-large/'));

    gulp.src(buildDir + 'files/uploads/work-large/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/work-medium/'));

    gulp.src(buildDir + 'files/uploads/client-image/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/client-image/'));

    gulp.src(buildDir + 'files/uploads/client-image/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/client-image/'));

    gulp.src(buildDir + 'files/uploads/image/*')
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10
        }))
        .pipe(gulp.dest(buildDir + 'files/compress/uploads/image/'));
});

gulp.task('css', function () {
    gulp.src(buildDir + 'css/main.css')
        .pipe(uglifycss({
            "maxLineLen": 1800,
            "uglyComments": true
        }))
        .pipe(gulp.dest(buildDir + 'css/css'));

    gulp.src(buildDir + 'css/objects.css')
        .pipe(uglifycss({
            "maxLineLen": 1800,
            "uglyComments": true
        }))
        .pipe(gulp.dest(buildDir + 'css/css'));

    gulp.src(buildDir + 'css/reset.css')
        .pipe(uglifycss({
            "maxLineLen": 1800,
            "uglyComments": true
        }))
        .pipe(gulp.dest(buildDir + 'css/css'));

});

// generate svg sprite
gulp.task('svgSpriteBuild', function () {
    return gulp.src(assetsDir + 'img/svg/icon/*.svg')
        // minify svg
        .pipe(svgmin({
            js2svg: {
                pretty: true
            }
        }))
        // remove all fill, style and stroke declarations in out shapes
        .pipe(cheerio({
            run: function ($) {
                $('[fill]').removeAttr('fill');
                $('[stroke]').removeAttr('stroke');
                $('[style]').removeAttr('style');
            },
            parserOptions: { xmlMode: true }
        }))
        // cheerio plugin create unnecessary string '&gt;', so replace it.
        .pipe(replace('&gt;', '>'))
        // build svg sprite
        .pipe(svgSprite({
            mode: "symbols",
            preview: false,
            selector: "icon-%f",
            svg: {
                symbols: 'symbol_sprite.svg'
            }
        }))
        .pipe(gulp.dest(assetsDir + 'img/sprite/'));
});

gulp.task('svgSpriteSass', function () {
    return gulp.src(assetsDir + 'img/svg/icon/*.svg')
        .pipe(svgSprite({
            preview: false,
            selector: "icon-%f",
            svg: {
                sprite: 'svg_sprite.html'
            },
            cssFile: '../../sass/_svg_sprite.scss',
            templates: {
                css: require("fs").readFileSync(assetsDir + 'sass/templates/_sprite_template.scss', "utf-8")
            }
        }
        ))
        .pipe(gulp.dest(assetsDir + 'img/sprite/'));
});

gulp.task('svgSprite', ['svgSpriteBuild', 'svgSpriteSass']);

gulp.task('sass', function () {
    return gulp.src(assetsDir + 'sass/**/*.sass')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(buildDir + 'css'))
        .pipe(browserSync.reload({ stream: true }))
});

gulp.task('css-libs', ['sass'], function () {
    return gulp.src([

        assetsDir + 'libs/aos/dist/aos.css',
        assetsDir + 'libs/slick-carousel/slick/slick.css',
        assetsDir + 'libs/intl-tel-input/build/css/intlTelInput.css',
        assetsDir + 'libs/jquery-selectric/public/selectric.css',
        /***************************new************************************/
        assetsDir + 'libs/jquery-ui/themes/base/jquery-ui.min.css',
        assetsDir + 'libs/fullpage.js/dist/jquery.fullpage.css',
        assetsDir + 'libs/magnific-popup/dist/magnific-popup.css'
    ])/*сюда надо прописывать все стили из билиотек*/
        .pipe(cssnano())
        .pipe(concat('libs.min.css'))
        .pipe(gulp.dest(buildDir + 'css'));
});

gulp.task('scripts', function () {
    return gulp.src([
        // assetsDir + 'libs/jquery/dist/jquery.min.js',/*сюда надо прописывать все скрипты библиотек*/
        assetsDir + 'libs/slick-carousel/slick/slick.js',
        assetsDir + 'libs/aos/dist/aos.js',
        assetsDir + 'libs/lazy-line-painter/jquery.lazylinepainter-1.7.0.js',
        assetsDir + 'libs/intl-tel-input/build/js/utils.js',
        assetsDir + 'libs/intl-tel-input/build/js/intlTelInput.js',
        assetsDir + 'libs/jquery-selectric/public/jquery.selectric.js',
        assetsDir + 'libs/jquery.iframe-transport.js',
        assetsDir + 'libs/jquery.knob.js',


        // assetsDir + 'libs/jquery.ui.widget.js'
        /***************************new***********************************/

        assetsDir + 'libs/jquery-ui/jquery-ui.min.js',
        assetsDir + 'libs/fullpage.js/vendors/scrolloverflow.min.js',
        assetsDir + 'libs/fullpage.js/dist/jquery.fullpage.js',
        assetsDir + 'libs/scrollmagic/scrollmagic/minified/ScrollMagic.min.js',
        assetsDir + 'libs/gsap/src/minified/TweenMax.min.js',
        assetsDir + 'libs/gsap/src/minified/TimelineMax.min.js',
        assetsDir + 'libs/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js',
        assetsDir + 'libs/magnific-popup/dist/jquery.magnific-popup.js'

    ])
        .pipe(concat('libs.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(buildDir + 'js'));
});

gulp.task('img', function () {
    return gulp.src(assetsDir + 'img/**/*')
        .pipe(cache(imagemin({
            interlaced: true,
            progressive: true,
            svgoPlugins: [{ removeViewBox: false }],
            use: [pngquant()]
        })))
        .pipe(gulp.dest(buildDir + 'img'));
});

// gulp.task('browser-sync', function() {
//   browserSync({
//     server: {
//       baseDir: 'public'
//     },
//     notify: false
//   });
// });

// gulp.task('watch', ['browser-sync', 'css-libs', 'sass', 'scripts', 'svgSprite'], function() {
//   gulp.watch(assetsDir + 'sass/**/*.sass', ['sass']);
//   gulp.watch(assetsDir + '*.html', browserSync.reload);
//   gulp.watch(assetsDir + 'js/**/*.js', browserSync.reload);
// });

// gulp.task('clean', function() {
//     return del.sync([
//         'public/css/**',
//         'public/js/**',
//         'public/fonts/**',
//         'public/img/**',
//         '!public/css/app.css',
//         '!public/js/app.js'
//     ]);
// });

// gulp.task('clear', function () {
//   return cache.clearAll();
// });

gulp.task('build', [/*'clean',*/ 'css-libs', 'sass', 'scripts', 'img', 'svgSprite'], function () {
    // var buildCss = gulp.src([
    //   assetsDir + 'css/main.css',
    //   assetsDir + 'css/libs.min.css'
    // ])
    // .pipe(gulp.dest(buildDir + 'css'))

    var buildFonts = gulp.src(assetsDir + 'fonts/**/*') // Переносим шрифты в продакшен
        .pipe(gulp.dest(buildDir + 'fonts'))

    var buildJs = gulp.src(assetsDir + 'js/main/**/*') // Переносим скрипты в продакшен
        .pipe(gulp.dest(buildDir + 'js'))

    // var buildHtml = gulp.src(assetsDir + '*.html') // Переносим HTML в продакшен
    //   .pipe(gulp.dest('public'));
});

// gulp.task('default', ['watch']);