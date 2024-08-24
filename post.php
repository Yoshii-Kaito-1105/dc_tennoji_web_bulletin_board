<?php

// use Illuminate\Support\Facades\DB;

include "./dba/pgConnection.php";
// include "./entity/Article.php";


// 送信データを受け取る(index.php)
$category = htmlspecialchars($_POST["category1"]);
$text = htmlspecialchars($_POST["text"]);


if ($category !== null && $text !== null) {
    
}
var_dump($category);
var_dump($text);

// 送信データを受け取る
// 入力のバリデーションを行う
// データベースに保存する
// 登録メッセージを出力する
// 画面に遷移する

/*
// データベース接続する
$pdo = connectToDb();
// sqlクエリ
$sql = "select * from minor_categories";
$stmt = $pdo->query($sql);
foreach ($stmt as $record) {
    print_r($record);
    // var_dump($record);
}



// disconnectDb();
// env()
*/
?>
