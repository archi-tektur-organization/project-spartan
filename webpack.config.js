let Encore = require('@symfony/webpack-encore');

Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .addEntry('security', './assets/js/security.js')
  .addEntry('dashboard', './assets/js/dashboard.js')
  .enableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .configureBabel(() => {}, {
    useBuiltIns: 'usage',
    corejs: 3
  })
  .enableSassLoader()
  .enableIntegrityHashes();

module.exports = Encore.getWebpackConfig();