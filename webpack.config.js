module.exports = {
    // モードの指定（[development],[production],[none]）
    mode: 'development',
    // エントリーポイントのjsファイル指定
    entry: './app/webroot/js/entrypoint.js',
    output: {
      // 出力先パスの指定
      path: `${__dirname}/app/webroot/js/dest`,
      // 出力先ファイルの指定
      filename: 'bundle.js'
    }
  };