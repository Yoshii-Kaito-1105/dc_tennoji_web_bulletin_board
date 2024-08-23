<?php

// use Illuminate\Support\Facades\DB;

include "./dba/dba.php";

// 送信データを受け取る(index.php)
$category = $_POST["category1"];
$text = $_POST["text"];
// データベース接続する
$dbh = connectToDb();
// sqlクエリ
$sql = "select * from  dc-bulletin-board-verti.major_categories";

// $dbh->setAttribute
// disconnectDb();

// function 
