const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.UF_MODE || 'dev');
}

Encore
    .setOutputPath('public/assets')
    .setPublicPath('/assets/')
    .addEntry('app', './app/assets/main.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableVueLoader(() => {}, { 
        runtimeCompilerBuild: false
    })
    .enableSassLoader()
    .enableLessLoader()
    .enableBuildNotifications()
    // .configureDevServerOptions(options => {
    //     options.port = 8080;
    //     options.liveReload = true;
    //     options.static = {
    //         watch: false
    //     };
    //     options.watchFiles = {
    //         paths: ['app/src/**/*.php', 'templates/**/*'],
    //     };
    //     options.proxy = {
    //         '!/public/assets/**': {
    //             target: 'http://localhost:8888',
    //             changeOrigin: true,
    //         }
    //     };
    // })
;

module.exports = Encore.getWebpackConfig();