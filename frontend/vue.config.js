// module.exports = {
//     devServer: {
//         historyApiFallback: {
//             logger: console.log.bind(console),
//             verbose: true,
//             disableDotRule: true,
//         },
//         // proxy: {
//         //     // '/api': {
//         //     //     target: process.env.APP_URL,
//         //     //     ws: true,
//         //     //     changeOrigin: true,
//         //     // },
//         //     // '/logout': {
//         //     //     target: process.env.APP_URL,
//         //     //     ws: true,
//         //     //     changeOrigin: true,
//         //     // },
//         // },
//     },
//
//     assetsDir: 'assets',
//     outputDir: '../public',
//     indexPath: '../resources/views/layouts/frontend.blade.php',
//
//     chainWebpack: (config) => {
//         config.module.rule('eslint').use('eslint-loader')
//             .tap((options) => {
//                 if (options) {
//                     options.fix = process.env.LINT_ON_SAVE === 'true';
//                 }
//                 return options;
//             });
//         config.plugin('provide').use(require.resolve('webpack/lib/ProvidePlugin'), [{
//             _: 'lodash',
//             moment: 'moment',
//         }]);
//         config.plugin('ignore').use(require.resolve('webpack/lib/IgnorePlugin'), [{
//             resourceRegExp: /^\.\/locale$/,
//             contextRegExp: /moment$/,
//         }]);
//     },
//     lintOnSave: undefined,
//     pluginOptions: {
//         i18n: {
//             locale: 'en',
//             fallbackLocale: 'en',
//             localeDir: 'locales',
//             enableInSFC: true
//         }
//     }
// };
