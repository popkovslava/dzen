let mix = require('laravel-mix');
let path = require('path');
let _ = require('lodash');
let webpack = require('webpack');

// Image min
let ImageminPlugin = require('imagemin-webpack-plugin').default;
let imageminMozjpeg = require('imagemin-mozjpeg');
let imageminPngquant = require('imagemin-pngquant');
let imageminOptipng = require('imagemin-optipng');
let imageminGifsicle = require('imagemin-gifsicle');
let imageminSvgo = require('imagemin-svgo');
// Image min


let SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
let CopyWebpackPlugin = require('copy-webpack-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Set up the spritemap plugin
/* mix.webpackConfig({
    plugins: [
        new SVGSpritemapPlugin({
            src: 'resources/assets/img/svg/*.svg',
            filename: 'img/sprite/symbol_sprite_new.svg',
            prefix: 'icon-',
            svg4everybody: {
                polyfill: true
            },
            glob: {
                root: __dirname
            },
            // svgo: {
            //     plugins: [{
            //         removeAttrs: {
            //             active: true,
            //             attrs: [
            //                 '*:(fill|stroke|style)',
            //                 '(?!symbol).*:id'
            //             ]
            //         }
            //     }],
            //     js2svg: {
            //         pretty: true
            //     },
            // },
        })
    ]
}); */

const assetsDir = 'resources/assets/';
const buildDir = 'public/';

const savePathImageAssets = (path) => {
    if (! /node_modules|bower_components/.test(path)) {
        return path
            .replace(/\\/g, '/')
            .replace(new RegExp(`.*${assetsDir}`, 'g'), '') + '?[hash]';
    }

    return Config.fileLoaderDirs.images + '/vendor/' + path
        .replace(/\\/g, '/')
        .replace(
            /((.*(node_modules|bower_components))|images|image|img|assets)\//g, ''
        ) + '?[hash]';
}

// Mix options
let options = {
    fileLoaderDirs: {
        images: 'img',
        fonts: 'fonts'
    },
    imgLoaderOptions: {
        enabled: true,
        gifsicle: {
            interlaced: false
        },
        mozjpeg: {
            progressive: true,
            arithmetic: false,
            quality: 70
        },
        optipng: false, // disabled
        pngquant: {
            floyd: 0.5,
            speed: 2
        },
        svgo: {
            plugins: [
                { removeTitle: true },
                // { convertPathData: false },
                // { removeStyleElement: true },
                // { removeUselessStrokeAndFill: true },
                { cleanupAttrs: true },
            ]
        }
    }
};

// Path images
let copyPluginPath = [{
    from: path.resolve(__dirname, assetsDir + 'img'),
    to: path.resolve(__dirname, buildDir + 'img')
}]

// Optimaze loader images
mix.options(options);

// Optimaze images and copy public dir
mix.webpackConfig({
    output: {
        chunkFilename: mix.inProduction() ? 'js/chunks/[name].[chunkhash].js' : 'js/chunks/[name].js'
    },
    resolve: {
        alias: {
            "TweenLite": path.resolve('node_modules', 'gsap/src/uncompressed/TweenLite.js'),
            "TweenMax": path.resolve('node_modules', 'gsap/src/uncompressed/TweenMax.js'),
            "TimelineLite": path.resolve('node_modules', 'gsap/src/uncompressed/TimelineLite.js'),
            "TimelineMax": path.resolve('node_modules', 'gsap/src/uncompressed/TimelineMax.js'),
            "ScrollMagic": path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/ScrollMagic.js'),
            "animation.gsap": path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js'),
            "debug.addIndicators": path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js'),
            "loadCSS": path.resolve('node_modules', 'fg-loadcss/src/loadCSS.js'),
            "onloadCSS": path.resolve('node_modules', 'fg-loadcss/src/onloadCSS.js'),
            "cssrelpreload": path.resolve('node_modules', 'fg-loadcss/src/cssrelpreload.js')
        }
    },
    plugins: [
        new CopyWebpackPlugin(copyPluginPath),
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i,
            plugins: [
                imageminGifsicle(options.imgLoaderOptions.gifsicle),
                imageminMozjpeg(options.imgLoaderOptions.mozjpeg),
                imageminPngquant(options.imgLoaderOptions.pngquant),
                imageminSvgo(options.imgLoaderOptions.svgo)
            ]
        })
    ]
});

// Adapt laravel-mix webpack config to better handle svg images.
Mix.listen('configReady', (webpackConfig) => {

    // Add separate svg loader
    webpackConfig.module.rules.push({
        test: /\.(svg)$/,
        include: [
            path.resolve(__dirname, "resources/assets/img"),
            path.resolve(__dirname, "resources/assets/img/svg"),
            path.resolve(__dirname, "resources/assets/images"),
            path.resolve(__dirname, "resources/assets/images/svg"),
        ],
        loaders: [
            {
                loader: 'file-loader',
                options: {
                    // name: Config.fileLoaderDirs.images + '/[name].[ext]?[hash]',
                    name: savePathImageAssets,
                    publicPath: Config.resourceRoot
                }
            },
            {
                loader: 'img-loader',
                options: Config.imgLoaderOptions
            }
        ]
    });

    // Exclude local 'svg' folder from font loader
    let fontLoaderConfig = webpackConfig.module.rules.find(rule => String(rule.test) === String(/\.(woff2?|ttf|eot|svg|otf)$/));
    fontLoaderConfig.exclude = [
        path.resolve(__dirname, "resources/assets/img"),
        path.resolve(__dirname, "resources/assets/img/svg"),
        path.resolve(__dirname, "resources/assets/images"),
        path.resolve(__dirname, "resources/assets/images/svg"),
    ];
    // Save path image assets
    let imageLoaderConfig = webpackConfig.module.rules.find(rule => String(rule.test) === String(/\.(png|jpe?g|gif)$/));
    let imageLoaderConfigFileLoader = _.find(imageLoaderConfig.loaders, { loader: 'file-loader' });
    imageLoaderConfigFileLoader.options.path = savePathImageAssets;
});

// Sleeping owl custom
mix.scripts('node_modules/cropper/dist/cropper.min.js', buildDir + 'packages/sleepingowl/custom/cropper/js/cropper.js')
    .styles('node_modules/cropper/dist/cropper.min.css', buildDir + 'packages/sleepingowl/custom/cropper/css/cropper.css');

mix.babel(assetsDir + 'sleepingowl/js/admin/form/cropimage.js', buildDir + 'packages/sleepingowl/custom/js/admin/form/cropimage.js');


// Styles
mix.sass(assetsDir + 'sass/libs.scss', buildDir + 'css/libs.min.css')
    .sass(assetsDir + 'sass/app.scss', buildDir + 'css')
    .sass(assetsDir + 'sass/main.sass', buildDir + 'css')
    .sass(assetsDir + 'sass/one-screen.sass', buildDir + 'css')
    .sass(assetsDir + 'sass/jquery-ui.scss', buildDir + 'css');

// Stcripts
mix.js(assetsDir + 'js/app.js', buildDir + 'js')
    .js(assetsDir + 'js/jquery-ui.js', buildDir + 'js')
    .js(assetsDir + 'js/fileupload.js', buildDir + 'js')
    .js(assetsDir + 'js/vue-root-app.js', buildDir + 'js')
    .js(assetsDir + 'js/works.js', buildDir + 'js')
    .extract(['jquery', 'axios', 'vue', 'svg4everybody']);

if (mix.inProduction()) {
    mix.version();
}