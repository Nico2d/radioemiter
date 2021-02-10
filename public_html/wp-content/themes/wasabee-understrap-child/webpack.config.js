const { resolve } = require('path');

module.exports = {
    mode: 'production',
    watch: true,
    stats: {
      colors: true,
      hash: true,
      timings: true,
      assets: true,
      modules: true,
      children: true
    },
    entry: {ie: resolve('./src/js/ie-polyfills.js')},
    output: {
      path: resolve('./js'),
      filename: '[name].js',
    },
    module: {
      rules: [  
            {
            test: /\.js$/,
            use: [{
                loader: 'babel-loader',
                options: {
                    presets: ['@babel/preset-env']
                }
            }]
            }
        ]
    }
}