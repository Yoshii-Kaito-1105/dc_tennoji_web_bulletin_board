<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>掲示板ホーム画面</title>
    <link rel="stylesheet" href="./template/common/css/style.css">
</head>
<body>

        <!--ヘッダー埋め込み-->
        <?php include "./template/common/header.html" ?>
        
        <img  class="top-image" src="./image/仮置き画像.gif"></img> 
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
    <div class="container">
        <!--トップ画像-->
        
        <!--検索バー-->

            <h2 class="new-page">最新の記事</h2>
            <!--このあたりに記事-->
            <div class="toukou">
                
                <div class="article-status">
                    <!--タイムスタンプ-->
                    <div class="username" id="username">投稿者　ディーキャリア太郎</div>
                    <div class="time-stamp" id="time-stamp">投稿日　2024年8月21日</div>
                    <div class="article-category" id="article-category">カテゴリー名　フロントエンド</div>
                </div>
                <!--記事本文-->
                <div class="honbun">PHPファイルを作る時は拡張子を.phpで作った方がいいよ</div>
                <div class="article-buttons">
                    <div class="article-btn edit">編集</div>
                    <div class="article-btn delete">削除</div>
                    
                </div>
            </div>
            <h2 class="new-article">新しい記事を投稿する</h2>
            <!--このあたりに記事投稿機能-->
            <form action="./post.php" method="post">
                <div class="toukou">
                    <div class="liner">
                        
                    <h3>新規投稿フォーム</h3>
                </div>
                <br>
                <div class="toukounaiyou">
                    <!--改行するとずれるのでそのまま-->
                    <div class="hissu" >必須</div>カテゴリー：
                    <select name="category1">
                        <option value="frontend">フロントエンド</option>
                        <option value="backend">バックエンド</option>
                        <option value="infrastructure">インフラ</option>
                        <option value="game">ゲーム</option>
                        <option value="code">効率的なコードの書き方</option>
                    </select>
                    <br>
                    <div class="toukouhonnbunn">
                        <div class="hissu" >必須</div>投稿内容：<textarea name="text" rows="5" required></textarea>
                    </div>
                    <div class="btn" type="submit">
                        <button>投稿する</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
        <!--フッター埋め込み-->
        <?php include "./template/common/footer.html" ?>
        <?php include "./dba/dba.php";
        ?>
</body>
    
</body>
</html>