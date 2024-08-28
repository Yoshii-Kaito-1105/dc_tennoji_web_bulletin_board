<!-- バックエンドの記事一覧ページ -->
<?php

// 投稿日と更新日を日本時間に適用する
date_default_timezone_set('Asia/Tokyo');
require_once(__DIR__ . "/../../../dba/pgConnection.php");
// データベースに接続
$dbh = connectToDb();

// データベースからメインカテゴリのIDがバックエンドのものを記事を全て取得する
$sql = "select * from articles where major_category_id = 2";
$articles = $dbh->query($sql);
$usersSql = "select * from users";
$users = $dbh->query($usersSql);


// 画面に描画する
// foreach ($articles as $article) {
//     print_r($article);
//     print "<br>";
// }
  
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>バックエンドの記事一覧</title>
    <link rel="stylesheet" href="../../../common/css/style.css">
</head>
<body>
<!--ヘッダー埋め込み-->
<?php require_once(__DIR__. '../../../../common/header.php') ?>
<h2 class="new-page">最新の記事</h2>
            <!--このあたりに記事-->
            <div class="toukou">
                
                <div class="article-status">
                    <!--タイムスタンプ-->
                    <div class="username" id="username">投稿者 
                        <?php 
                            foreach($users as $user) { 
                                echo $user["name"];
                            }
                        ?>
                    </div>
                    <div class="time-stamp" id="time-stamp">投稿日 
                        <?php
                            foreach($articles as $article) {
                                $convertTime =  $article["created_at"];
                                echo date('Y年m月d日', strtotime($convertTime)); 
                            }
                        ?>
                    </div>
                    <div class="article-category" id="article-category">メインカテゴリー名: </div>
                    <div class="article-category" id="article-category">サブカテゴリー名:  </div>
                </div>
                <!--記事本文-->
                <div class="honbun">本文: <?php ?> PHPファイルを作る時は拡張子を.phpで作った方がいいよ</div>
                <div class="article-buttons">
                    <div class="article-btn edit">編集</div>
                    <div class="article-btn delete">削除</div>
                    
                </div>
            </div>
<!--フッター埋め込み-->
<?php  require_once(__DIR__. '../../../../common/footer.php') ?>
</body>
</html>