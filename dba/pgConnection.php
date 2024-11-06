<!-- データベース接続管理 -->
<?php

// ローカルデータベースファイルを読み込む
include "PgDao.php";

// データベース接続用のグローバル変数
$dbh = null;

// データベースに接続する関数
function connectToDb() 
{
    // 例外処理(tryで処理を実行)
    try {
        
        $dao = new PgDao(); // クラスをインスタンス化;
        $host = $dao->getHost(); // ホストを取得
        $port = $dao->getPort(); // ポート番号を取得
        $dbName = $dao->getDbName(); // データベース名を取得
        $user = $dao->getUserName(); //  データベースユーザー名を取得
        $password = $dao->getPassword(); // データベース接続用パスワードを取得

        global $dbh; // グローバル変数を使用できるようにする
        /**
         * PHP付属の関数を使ってPostgreSQLに接続する
        */
        $dbh = new PDO(
            "pgsql:host=$host;port=$port;dbname=$dbName;user=$user;password=$password"
        );
        echo "<script>console.log('データベースに接続しました');</script>"; // コンソールに接続成功のメッセージを出力する
        return $dbh; // 接続した情報を返す

    } catch (PDOException $e) { // 何かしらの例外が発生した際にキャッチする
        $e->getMessage(); // 例外の情報が記載された情報を画面に出力する
        echo "<script>console.log('データベース接続に失敗しました');</script>"; // コンソールに接続失敗のメッセージを出力する
    }
    
}
// DBの接続を切る関数
function disconnectDb() 
{
    echo "<script>console.log('データベースの接続を切断しました');</script>"; // コンソールに接続切断のメッセージを出力する
    global $dbh; // グローバル変数を呼び出す
    return $dbh = null; // nullを代入し、接続を切る
}

