const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({
        'jquery': ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"],
        'popper.js/dist/umd/popper.js': ['Popper']
    })
    .js('resources/js/app.js', 'js')
    .js('resources/js/login.js', 'js')
    .js('resources/js/dashboard.js', 'js')
    .js('resources/js/users.js', 'js')
    .js('resources/js/user-create.js', 'js')
    .js('resources/js/profile.js', 'js')
    .postCss('resources/css/app.css', 'css')
    .postCss('resources/css/login.css', 'css')
    // .sass('resources/scss/app.scss', 'css')
    .setPublicPath('public/dist')
    .setResourceRoot('../')
    .options({
        // processCssUrls: false
        fileLoaderDirs: {
            images: `images`,
            fonts: `dist/fonts`
        },
        devtool: 'source-map'
    }).sourceMaps(true, 'source-map')
    .copy( 'resources/adminlte/dist/img/', 'public/dist/images/', false ) // untuk sementara, selama ngetest template biar jalan di laravel copy aja dulu semua gambar dari template
    .version();
 
/*
NOTE :
- Jquery, dan popper js ada konfigurasi tambahan di javascript dan konfigurasi webpack mix ini. karena itu install dari npm aja, bukan file asli dari template
- Option setPublicPath supaya semua resource yang digenerate laravel mix digenerate di direktori tersebut
- Option set resource root maksudnya supaya path relative resource css sesuai template tetap terjaga, misalnya path font, gambar dll
- TBA

 */
