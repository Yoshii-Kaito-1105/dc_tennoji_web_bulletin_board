<?php

// use Illuminate\Support\Facades\DB;
date_default_timezone_set('Asia/Tokyo');

include "./dba/pgConnection.php";

$dbh = null;
try {
    
    // データベース接続する
    global $dbh;
    $dbh = connectToDb();
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // 
    $userId = 1;
    $text = htmlspecialchars($_POST["text"]);
    $majorCategory = htmlspecialchars($_POST["category1"]);
    $minorCategory = htmlspecialchars($_POST["category2"]);
    $createdAt = date("Y-m-d H:i:s");

    // チェックリストの値を調べる
    switch ($majorCategory) {
        case "frontend":
            $majorCategory = 1;
            break;
        case "backend":
            $majorCategory = 2;
            break;
        case "infrastructure":
            $majorCategory = 3;
            break;
        case "game":
            $majorCategory = 4;
            break;
        case "code":
            $majorCategory = 5;
            break;
    }
    switch ($minorCategory) {
        case "html":
            $minorCategory = 1;
            break;
        case "css":
            $minorCategory = 2;
            break;
        case "js":
            $minorCategory = 3;
            break;
        case "py":
            $minorCategory = 4;
            break;
        case "java":
            $minorCategory = 5;
            break;
        case "ruby":
            $minorCategory = 6;
            break;
        case "php":
            $minorCategory = 7;
            break;
        case "cs":
            $minorCategory = 8;
            break;
        case "cpp":
            $minorCategory = 9;
            break;
        case "swift":
            $minorCategory = 10;
            break;
    }

    $stmt = $dbh->prepare(
        "insert into articles
            (user_id, content, created_at, minor_category_id, major_category_id)
        values
            (:user_id, :content, :created_at, :minor_category_id, :major_category_id)"
    );
        

    // 入力値の検証(不正値チェック)
    $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':content', $text, PDO::PARAM_STR);
    $stmt->bindValue(':created_at', $createdAt, PDO::PARAM_STR);
    $stmt->bindValue(':minor_category_id', $minorCategory, PDO::PARAM_INT);
    $stmt->bindValue(':major_category_id', $majorCategory, PDO::PARAM_INT);

    $stmt->execute();


    global $dbh;
    $dbh = disconnectDb();
    // 
    require "./index.php";


} catch (PDOException $e) {
    echo $e->getMessage();
    disconnectDb();
}
// 送信データを受け取る(index.php)

// 入力のバリデーションを行う
// データベースに保存する
// 登録メッセージを出力する
// 画面に遷移する


?>
