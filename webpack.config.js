import Encore from '@symfony/webpack-encore'
import webpack from 'webpack'

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.UF_MODE || 'dev');
}

Encore
    .setOutputPath('public/assets')
    .setPublicPath('/assets/')
    .addEntry('app', './app/assets/main.ts')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableTypeScriptLoader()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableVueLoader(() => {}, { 
        runtimeCompilerBuild: false
    })
    .enableLessLoader()
    .addPlugin(new webpack.DefinePlugin({
        __VUE_OPTIONS_API__: true,
        __VUE_PROD_DEVTOOLS__: false,
        __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false
    }))

    // Disable client overlay
    // @see https://github.com/vuejs/vue-cli/issues/7431#issuecomment-1804682832
    .configureDevServerOptions(options => {
        options.client = {
            overlay: false
        }
    })
;
var config = Encore.getWebpackConfig();

// Fix for extensionless imports
// @see https://webpack.js.org/configuration/module/#resolvefullyspecified
config.module.rules.push({
    test: /\.m?js/,
    resolve: {
        fullySpecified: false
    }
});

export default config;