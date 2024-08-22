<!-- データベース接続管理 -->
<?php
include "PgDao.php";

function connectToDb() {
    $dbh = null;
    try {
        // クラスをインスタンス化;
        $dao = new PgDao();
        // DBに接続する
        $host = $dao->getHost();
        // それぞれに値をセット
        $port = $dao->getPort();
        $dbName = $dao->getDbName();
        $user = $dao->getUser();
        $password = $dao->getPassword();
        global $dbh;
        $dbh = new PDO("pgsql:host=$host;port=$port;dbname=$dbName;user=$user;password=$password");
        echo "<script>console.log('データベース接続に失敗しました');</script>";
    } catch (PDOException $e) {
        $e->getMessage();
        echo "<script>console.log('データベース接続に失敗しました');</script>";
    }
}
// DBの接続を切る
function disconnectDb() {
    global $dbh;
    $dbh = null;
    echo "データベース接続を切断しました";
}

