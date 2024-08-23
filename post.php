<?php

// use Illuminate\Support\Facades\DB;

include "./dba/pgConnection.php";
// include "./entity/Article.php";


// 送信データを受け取る(index.php)
// $category = $_POST["category1"];
// $text = $_POST["text"];



// データベース接続する
$dbh = connectToDb();
// sqlクエリ
$sql = "select * from major_categories";

$stmt = $dbh->prepare($sql);


echo $stmt->execute();

// disconnectDb();
// env()
