const path = require('path');

module.exports = {
    mode: 'development',
    entry: ['@babel/polyfill', './src/index.js'],
    output: {
        filename: 'main.js',
        path: __dirname + '/dist',
        publicPath: 'js'
    },
    module: {
        rules: [{
            test: /\.js$/,
            use: [{
                loader: 'babel-loader?blacklist[]=regenerator',
                options: {
                    presets: ['@babel/preset-env']
                }
            }]
        }]
    },
    devtool: 'source-map',
    devServer: {
        contentBase: path.join(__dirname, 'public'),
        compress: true,
        host: '0.0.0.0',
        port: 3000,
        disableHostCheck: true,
        headers: {
            'Access-Control-Allow-Origin': '*'
        },
        watchOptions: {
            ignored: /node_modules/
        }
    },
};