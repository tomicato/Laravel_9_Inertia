const path = require('path')
const mix = require('laravel-mix')
const webpackNodeExternals = require('webpack-node-externals')

// Rezolve Ziggy
mix.alias({
    ziggy: path.resolve("vendor/tightenco/ziggy/dist/vue"),
});

mix
    .options({ manifest: false })
    .js('resources/js/ssr.js', 'public/js')
    .vue({ version: 3, useVueStyleLoader: true, options: { optimizeSSR: true } })
    .alias({ '@': path.resolve('resources/js') })
    .webpackConfig({
        target: 'node',
        externals: [webpackNodeExternals()],
    })
    .version();
