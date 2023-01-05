const mix = require('laravel-mix');

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

//Third party packages
//const ImageminPlugin     = require('imagemin-webpack-plugin').default;
//const CopyWebpackPlugin  = require('copy-webpack-plugin');
//const imageminMozjpeg    = require('imagemin-mozjpeg');

var optimizeImages = false;
var optimizeScripts = true;
var optimizeStyles = true;
//Only in production, you can remove if you want to use "npm run dev"
if(mix.inProduction() && optimizeImages) {
    mix.webpackConfig({
        plugins: [
            //Compress images
            new CopyWebpackPlugin([{
                from: 'public/uploads/productphoto/original_4', // FROM
                to: 'uploads/productphoto/original-2', // TO
            }]),
            new ImageminPlugin({
                test: /\.(jpe?g|png|gif|svg)$/i,
                pngquant: {
                    quality: '65-80'
                },
                plugins: [
                    imageminMozjpeg({
                        quality: 85,
                        //Set the maximum memory to use in kbytes
                        //maxmemory: 1000 * 512
                    })
                ]
            })
        ],
    });
}
if(optimizeScripts) {
    mix.scripts([
        'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js',
        'node_modules/slick-carousel/slick/slick.js',
        'node_modules/selectize/dist/js/standalone/selectize.min.js',
        'node_modules/validate.js/validate.min.js',
    ], 'public/js/vendor.js').version();

    mix.scripts([
        // partials

        // main
        'resources/assets/js/helpers.js',
        'resources/assets/js/app.js'
    ], 'public/js/app.js').version();
}
if(optimizeStyles) {
    mix.styles([
        'resources/assets/fonts/icomoon/style.css',
        'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css',
        'node_modules/slick-carousel/slick/slick.css',
        'node_modules/selectize/dist/css/selectize.css',
    ], 'public/css/vendor.css').version();

    mix.sass('resources/assets/sass/app.scss', 'public/css')
        .options({
            postCss: [
                require("css-mqpacker")()
            ]
        })
        .version();
}