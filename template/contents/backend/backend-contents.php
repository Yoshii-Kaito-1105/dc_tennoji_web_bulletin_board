<!-- バックエンドの記事一覧ページ -->
<?php
require_once(__DIR__ . "/../../../dba/pgConnection.php");
// データベースに接続
$dbh = connectToDb();

// データベースからメインカテゴリのIDがバックエンドのものを記事を全て取得する
$stmt = $dbh->prepare(
    "select * from articles where major_category_id = 2"
);

// 画面に描画する

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>バックエンドの記事一覧</title>
</head>
<body>
<!--ヘッダー埋め込み-->
<?php require "./common/header.php" ?>

<!--フッター埋め込み-->
<?php include "./common/footer.php" ?>
</body>
</html>