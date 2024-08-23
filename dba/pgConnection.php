<!-- データベース接続管理 -->
<?php
include "PgDao.php";

$dbh = null;
function connectToDb() {
    try {
        // クラスをインスタンス化;
        $dao = new PgDao();
        // DBに接続する
        $host = $dao->getHost();
        // それぞれに値をセット
        $port = $dao->getPort();
        $dbName = $dao->getDbName();
        $user = $dao->getUserName();
        $password = $dao->getPassword();
        global $dbh;
        $dbh = new PDO("pgsql:host=$host;port=$port;dbname=$dbName;user=$user;password=$password");
<<<<<<< HEAD:dba/pgConnection.php
        echo "<script>console.log('データベース接続に接続しました。');</script>";
        
=======
        echo "データベースに接続しました。。";
        echo "<script>console.log('データベースに接続しました。');</script>";
>>>>>>> 0536ce06b644ce86c543ba7d8a29e806255e6c19:dba/dba.php
    } catch (PDOException $e) {
        $e->getMessage();
        echo "<script>console.log('データベース接続に失敗しました');</script>";
    }
    
}
// DBの接続を切る
function disconnectDb() {
    global $dbh;
    $dbh = null;
    echo "<script>console.log('データベース接続を切断しました');</script>";
}

