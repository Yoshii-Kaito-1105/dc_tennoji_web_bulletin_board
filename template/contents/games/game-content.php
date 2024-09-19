<!-- ゲームの記事一覧ページ -->
<?php

    // 投稿日と更新日を日本時間に適用する
    date_default_timezone_set('Asia/Tokyo');
    // 別階層にあるDBコネクタの読み込み
    require_once(__DIR__ . "/../../../dba/pgConnection.php");
    // データベースに接続
    $dbh = connectToDb();

    // データベースからメインカテゴリのIDが4(ゲーム)のレコードを全て取得する
    $sql = 
        "select 
            u.name as user_name,
            a.created_at,
            mjrc.name as major_category_name,
            minc.name as minor_category_name,
            a.content
        from 
            articles a
        inner join 
            users u
        on a.user_id = u.user_id
        inner join
            major_categories mjrc
        on a.major_category_id = mjrc.major_category_id
        inner join 
            minor_categories minc
        on a.minor_category_id = minc.minor_category_id
        where
            a.major_category_id = 4";
    $stmt = $dbh->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // 記事テーブルにあるレコード数を取得する
    $recodeCount = $stmt->rowCount(); 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ゲームの記事一覧</title>
    <link rel="stylesheet" href="../../common/css/style.css">
</head>
<body>
    <!--ヘッダー埋め込み-->
    <?php require_once(__DIR__.   '../../../common/header.php') ?>
    <h2 class="new-page">最新の記事</h2>
        <?php foreach ($articles as $article) {
            $userName = $article['user_name'];
            $createdAt = date('Y年m月d日', strtotime($article['created_at']));
            $majorCategory = $article['major_category_name'];
            $minorCategory = $article['minor_category_name'];
            $content = htmlspecialchars($article['content'], ENT_QUOTES, 'UTF-8');
            // 取得結果を画面に表示する  
            echo <<<EOT
            <!--このあたりに記事-->
            <div class="toukou">
                <div class="article-status">
                    <p class="username" id="username">投稿者 
                        {$userName}
                    </p>
                    <p class="time-stamp" id="time-stamp">投稿日
                        {$createdAt}
                    </p>
                    <p class="article-category" id="article-category">カテゴリー名: {$majorCategory} </p>
                    <p class="article-category" id="article-category">サブカテゴリー名:{$minorCategory}  </p>
                    <!--記事本文-->
                    <p class="contents">本文: {$content}</p>
                </div>
                    <div class="article-buttons">
                        <button type="submit" class="article-btn edit">編集</button>
                        <button type="submit" class="article-btn delete">削除</button>
                    </div>
            </div>
            EOT;
        }
    ?>
    <!--フッター埋め込み-->
    <?php  require_once(__DIR__. '../../../common/footer.php') ?>
    <!-- DBの接続を切る -->
    <?php $dbh = disconnectDb(); ?>
</body>
</html>