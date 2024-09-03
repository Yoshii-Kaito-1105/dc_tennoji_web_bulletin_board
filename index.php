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

    <!--ヘッダー埋め込み-->
    <?php include "./template/common/header.html" ?>

    <img class="top-image" src="./image/仮置き画像.gif"></img>
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
        <div class="toukou">
            <div class="liner">

                <h3>新規投稿フォーム</h3>
            </div>
            <br>
            <div class="toukounaiyou">
                <!--改行するとずれるのでそのまま-->
                <div class="hissu">必須</div>カテゴリー：<select name="mainCategory" id="mainCategory">
                    <option value="">選択してください</option>
                    <option value="frontend">フロントエンド</option>
                    <option value="backend">バックエンド</option>
                    <option value="infrastructure">インフラ</option>
                    <option value="game">ゲーム</option>

                </select>
                <br>
                <div class="hissu">必須</div>サブカテゴリー：<select name="subCategory" id="subCategory">
                    <option value=" ">選択してください</option>


                </select>
                <div class="toukouhonnbunn">
                    <div class="hissu">必須</div>投稿内容：<textarea name="text" rows="5" required></textarea>
                </div>
                <div class="btn" type="submit">
                    投稿する
                </div>
            </div>
        </div>
    </div>
        <!--フッター埋め込み-->
        <?php include "./template/common/footer.html" ?>

        <?php  include "post.php" ?>
    <!--フッター埋め込み-->
    <?php include "./template/common/footer.html" ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // #subCategoryの中身を準備
        var items = {
            frontend: [
                ['選択してください', ''],
                ['HTML', 'HTML'],
                ['CSS', 'CSS'],
                ['JavaScript', 'JavaScript']
            ],
            backend: [
                ['選択してください', ''],
                ['Python', 'Python'],
                ['Java', 'Java'],
            ],
            infrastructure: [
                ['選択してください', ''],
                ['Python', 'Python'],
                ['Ruby', 'Ruby'],
                ['Java', 'Java']
            ],
            game: [
                ['選択してください', ''],
                ['C++', 'C++'],
                ['C#', 'C#'],
                ['Swift', 'Swift']
            ],
        };

        var none = $('#subCategory').html(); // #subCategoryの最初の状態
        $("#subCategory").attr("disabled", true); // #mainCategoryが「選択してください」のときは操作不可に

        $('#mainCategory').on('change', function() {
            var cont = $(this).val(); // 選択された項目のvalueを取得
            if (cont) { // valueに何か値が入っていた場合
                var item = items[cont]; // リストからカテゴリに登録されたサブカテゴリの配列を取得
                $("#subCategory").attr("disabled", false); // #subCategoryを選択可能に
                $('#subCategory').html('');
                var option;
                for (var i = 0; i < item.length; i++) {
                    option = '<option value="' + item[i][1] + '">' + item[i][0] + '</option>';
                    $('#subCategory').append(option);
                }
            } else { // valueに何も値が入っていない場合
                $("#subCategory").attr("disabled", true);
                $('#subCategory').html(none); // 保存された最初の状態に戻す
            }
        });
    </script>
</body>
    
</body>
</html>