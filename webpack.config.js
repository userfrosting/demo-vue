import Encore from '@symfony/webpack-encore'
import ForkTsCheckerWebpackPlugin from 'fork-ts-checker-webpack-plugin'
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
    // Allow typescript to parse vue components imported from source
    // eg.: @userfrosting/theme-pink-cupcake-example/src/views/DashboardAlerts.vue
    .configureLoaderRule('typescript', loaderRule => {
        loaderRule.exclude = undefined
    })
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
    .addPlugin(new ForkTsCheckerWebpackPlugin())

    // Disable client overlay
    // @see https://github.com/vuejs/vue-cli/issues/7431#issuecomment-1804682832
    .configureDevServerOptions(options => {
        options.client = {
            overlay: false
        }
    })
;

export default Encore.getWebpackConfig();