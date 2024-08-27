<!-- 投稿機能 -->
<?php

include "./dba/pgConnection.php";
// 投稿日と更新日を日本時間に適用する
date_default_timezone_set('Asia/Tokyo');

$dbh = null;
try {
    
    // データベースに接続する
    global $dbh;
    $dbh = connectToDb();
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $isEmpty = false; // 未入力
    $erromMsg = "";
    
    // フォームの入力値を受け取る
    $userId = 1;
    $mainCategory = htmlspecialchars($_POST["mainCategory"]);
    $subCategory = @htmlspecialchars($_POST["subCategory"]);
    $text = htmlspecialchars($_POST["text"]);
    $createdAt = date("Y-m-d H:i:s");


    // カテゴリの未入力チェック
    if( empty($mainCategory) ) {
        $isEmpty = true;
        global $erromMsg;
        $erromMsg = "<h3>メインカテゴリが未選択です。</h3>";
        
        // サブカテゴリの未入力チェック
    } else if( empty($subCategory) ) {
        $isEmpty = true;
        global $erromMsg;
        $erromMsg = "<h3>サブカテゴリが未選択です。</h3>";
    }

    if ($isEmpty) {
        $userId = null;
        $mainCategory = null;
        $subCategory = null;
        $text = null;
        $createdAt = null;
        global $erromMsg;   
        echo $erromMsg;
    }


    // メインカテゴリをセットする
    switch ($mainCategory) {
        case "frontend":
            $mainCategory = 1; // フロントエンド
            break;
        case "backend":
            $mainCategory = 2; // バックエンド
            break;
        case "infrastructure":
            $mainCategory = 3; // インフラ
            break;
        case "game":
            $mainCategory = 4; // ゲーム
            break;
        case "code":
            $mainCategory = 5; // 効率的なコードの書き方
            break;
    }

    // サブカテゴリをセットする
    switch ($subCategory) {
        case "HTML":
            $subCategory = 1; // html
            break;
        case "CSS":
            $subCategory = 2; // css
            break;
        case "JavaScript":
            $subCategory = 3; // javascript
            break;
        case "Python":
            $subCategory = 4; // python
            break;
        case "Java":
            $subCategory = 5; // java
            break;
        case "Ruby":
            $subCategory = 6; // ruby
            break;
        case "PHP":
            $subCategory = 7; // php
            break;
        case "C#":
            $subCategory = 8; // C#
            break;
        case "C++":
            $subCategory = 9; // C++
            break;
        case "Swift": // Swift
            $subCategory = 10;
            break;
    }

        // echo "<p> メインカテゴリ名: " . var_dump($mainCategory) . "</p><br>";
        // echo "<p>サブカテゴリ名: " . var_dump($subCategory) . "</p><br>";
        // echo "<p>メインカテゴリID: " . var_dump($majorCategoryId) . "</p><br>";
        // echo "<p>サブカテゴリID: " . var_dump($minorCategoryId) . "</p><br>";


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
        // $stmt->bindValue(':minor_category_id', $minorCategoryId, PDO::PARAM_INT);
        // $stmt->bindValue(':major_category_id', $majorCategoryId, PDO::PARAM_INT);
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
