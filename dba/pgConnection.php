<!-- データベース接続管理 -->
<?php

// データベース
include "PgDao.php";

$dbh = null;

function connectToDb() 
{
    try {
        // クラスをインスタンス化;
        $dao = new PgDao();
        $host = $dao->getHost();
        $port = $dao->getPort();
        $dbName = $dao->getDbName();
        $user = $dao->getUserName();
        $password = $dao->getPassword();

        global $dbh;
        $dbh = new PDO(
            "pgsql:host=$host;port=$port;dbname=$dbName;user=$user;password=$password"
        );
        
        echo "<script>console.log('データベースに接続しました');</script>";
        return $dbh;

    } catch (PDOException $e) {
        $e->getMessage();
        echo "<script>console.log('データベース接続に失敗しました');</script>";
    }
    
}
// DBの接続を切る
function disconnectDb() 
{
    echo "<script>console.log('データベースの接続を切断しました');</script>";
    global $dbh;
    return $dbh = null;
}

