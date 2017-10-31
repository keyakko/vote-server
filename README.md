# vote-server

## なにこれ
展示で利用した脆弱性たっぷりの投票ページです。



## 使用ライブラリ
- jquery
- Bootstrap
- chart.js


## main.goの実行環境でやること
linux環境では、何もしないままだと「Too many open files」の表示が出て送信するリクエストが限られる。
そのため、送信するリクエストの上限を上げるために、/etc/security/limits.confを設定する必要がある。

参考:http://d.hatena.ne.jp/akishin999/20130213/1360711554

