<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>掲示板 掲示板の使い方</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/keiziban.css">
    <link rel="stylesheet" href="../common/css/style.css">
</head>

<body>
    <!--ヘッダー埋め込み-->
    <?php require_once(__DIR__.   '../../common/header.php') ?>

    
    <div class="hamburger-menu">
        <input type="checkbox" id="menu-btn-check">
        <label for="menu-btn-check" class="menu-btn"><span></span></label>
        <div class="menu-content">
            <h2>月別記事メニュー</h2>
            <ul>
                <li>
                    <a href="">2024年9月分の記事</a>
                </li>
                <li>
                    <a href="">2024年10月分の記事</a>
                </li>
                <li>
                    <a href="">2024年11月分の記事</a>
                </li>

            </ul>
        </div>
    </div>
    <main>
        <div class="main-img">

        </div>

        <div class="container">

            <div class="article">
                <form method="get" action="#" class="search_container">
                    <input type="text" size="25" placeholder=" キーワード検索">
                    <input type="submit" value="検索">
                </form>

            </div>

            <div id="article-title">
                <h2>掲示板の使い方</h2>
                <img src="../../image/掲示板カテゴリー.png" alt="">
            </div>

            <div class="article-image">
                <img src="../../image/カテゴリ機能.png" alt="">


                <p>①まずは、下ボタンをクリックしてカテゴリーの中から該当する項目を選んでいただきます。</p>

            </div>

            <div class="article-image">
                <img src="../../image/投稿フォーム2.png" alt="">
                <p>②次は共有したいITに関する情報を投稿内容に入力して頂きます。
                    入力し終わったら投稿するボタンを押したら投稿完了です</p>
            </div>

            <div class="sub-image">
                <h2>編集機能<span>と</span><span class="rogo">削除機能</span></h2>
                <img src="../../image/投稿編集.png" alt="">
                <p>ITに関する情報は日々、新しく更新されます。
                    投稿した情報が古く仕様が大きく変わる物もあるので
                    編集機能で編集ボタンを押して情報を更新する事ができます。
                </p>
            </div>

            <div class="article-image">
                <img src="../../image/投稿削除.png" alt="">
                <p>情報が間違っていた場合は削除ボタンを押すことで削除することができます。</p>
            </div>



            </div>

    </main>
    <!--フッター埋め込み-->
    <?php require_once(__DIR__ .  "../../common/footer.php") ?>
</body>
</html>
