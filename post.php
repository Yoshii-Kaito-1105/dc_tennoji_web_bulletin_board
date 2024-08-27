<?php

date_default_timezone_set('Asia/Tokyo');

include "./dba/pgConnection.php";

$dbh = null;
try {
    
    // データベースに接続する
    global $dbh;
    $dbh = connectToDb();
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // 
    $userId = 1;
    $text = htmlspecialchars($_POST["text"]);
    $majorCategory = htmlspecialchars($_POST["mainCategory"]);
    $minorCategory = htmlspecialchars($_POST["subCategory"]);
    $createdAt = date("Y-m-d H:i:s");
    $inputMiss;

    // カテゴリの未入力チェック
    if ($majorCategory == null || $majorCategory == "") {
        disconnectDb();
        global $inputMiss;
        $inputMiss = null;
        echo "<h1>カテゴリーを選択してください</h1>";
        var_dump($inputMiss);
        require "./index.php";
        return false;
    // サブカテゴリの未入力チェック
    } else if ($majorCategory == null || $majorCategory == "") {
        disconnectDb();
        global $inputMiss;
        $inputMiss = null;
        echo "<h1>サブカテゴリーを選択してください</h1>";
        var_dump($inputMiss);
        require "./index.php";
        return false;
    }

    global $inputMiss;
    if ($inputMiss == null) {
        $majorCategory = $inputMiss;
        $minorCategory = $inputMiss;
        $text = $inputMiss;
        $createdAt = $inputMiss;
        var_dump($majorCategory);
        var_dump($minorCategory);
        print_r($text);
        var_dump($createdAt);
        return;
    }

        // カテゴリの内容をセットする
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
            case "HTML":
                $minorCategory = 1;
                break;
            case "CSS":
                $minorCategory = 2;
                break;
            case "JavaScript":
                $minorCategory = 3;
                break;
            case "Python":
                $minorCategory = 4;
                break;
            case "Java":
                $minorCategory = 5;
                break;
            case "Ruby":
                $minorCategory = 6;
                break;
            case "PHP":
                $minorCategory = 7;
                break;
            case "C#":
                $minorCategory = 8;
                break;
            case "C++":
                $minorCategory = 9;
                break;
            case "Swift":
                $minorCategory = 10;
                break;
        }


        // $stmt = $dbh->prepare(
        //     "insert into articles
        //         (user_id, content, created_at, minor_category_id, major_category_id)
        //     values
        //         (:user_id, :content, :created_at, :minor_category_id, :major_category_id)"
        // );

        // // 入力値の検証(不正値チェック)
        // $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        // $stmt->bindValue(':content', $text, PDO::PARAM_STR);
        // $stmt->bindValue(':created_at', $createdAt, PDO::PARAM_STR);
        // $stmt->bindValue(':minor_category_id', $minorCategory, PDO::PARAM_INT);
        // $stmt->bindValue(':major_category_id', $majorCategory, PDO::PARAM_INT);
        // $stmt->execute();



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
