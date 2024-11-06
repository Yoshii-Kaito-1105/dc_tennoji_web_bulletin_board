<!-- 投稿機能 -->
<?php
    include "./dba/pgConnection.php"; // 同一フォルダ内の接続管理ファイルを読み込んで、関数を使えるようにする
    date_default_timezone_set('Asia/Tokyo'); // 投稿日と更新日を日本時間に適用する
    $dbh = null; // DB接続ホスト

    // 例外処理(tryで処理を実行)
    try {    
        global $dbh; // グローバル変数を使用できるようにする
        $dbh = connectToDb(); // DBに接続する
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // DBが正しくデータを受け取れる設定をする
        $isEmpty = false; // 未入力
        $erromMsg = "";// エラーメッセージ
        $userId = 1; // ユーザーID
        $mainCategory = htmlspecialchars($_POST["mainCategory"]); // メインカテゴリをhtmlファイルとして正しく値が受け取れるようにする
        $subCategory = @htmlspecialchars($_POST["subCategory"]); // サブカテゴリをhtmlファイルとして正しく値が受け取れるようにする
        $text = htmlspecialchars($_POST["text"]); // 投稿内容
        $createdAt = date("Y-m-d H:i:s"); // 投稿日


        // カテゴリの未入力チェック
        if( empty($mainCategory) ) {
            $isEmpty = true; // メインカテゴリが未入力のためtrueを代入
            global $erromMsg; // グローバル変数をを使用できるようにする
            $erromMsg = "<h3>メインカテゴリが未選択です。</h3>"; // エラー画面出力用のメッセージを格納する
            
        // サブカテゴリの未入力チェック
        } else if( empty($subCategory) ) {
            $isEmpty = true; // サブカテゴリが未入力のためtrueを代入
            global $erromMsg; // グローバル変数をを使用できるようにする
            $erromMsg = "<h3>サブカテゴリが未選択です。</h3>";
        }

        // 未入力ならデータの登録を防ぐ
        if ($isEmpty) {
            // 記事情報テーブルの追加されるデータを全てをnullにして、データの登録を防ぐ
            $userId = null;
            $mainCategory = null;
            $subCategory = null;
            $text = null;
            $createdAt = null;
            global $erromMsg; // メッセージを使用できるようにする  
            echo $erromMsg; // メッセージを画面に出力
        }


        // メインカテゴリをセットして、登録したい情報を検証する
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

        // サブカテゴリをセットして、登録したい情報を検証する
        switch ($subCategory) {
            case "html":
                $subCategory = 1; // html
                break;
            case "css":
                $subCategory = 2; // css
                break;
            case "js":
                $subCategory = 3; // javascript
                break;
            case "py":
                $subCategory = 4; // python
                break;
            case "java":
                $subCategory = 5; // java
                break;
            case "rb":
                $subCategory = 6; // ruby
                break;
            case "php":
                $subCategory = 7; // php
                break;
            case "cs":
                $subCategory = 8; // C#
                break;
            case "cpp":
                $subCategory = 9; // C++
                break;
            case "swift": // Swift
                $subCategory = 10;
                break;
            case "uncategorized": // 未分類
                $subCategory = 11;
                break;
        }

        // sqlクエリ(データを挿入する)
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
        $stmt->bindValue(':minor_category_id', $subCategory, PDO::PARAM_INT);
        $stmt->bindValue(':major_category_id', $mainCategory, PDO::PARAM_INT);
        // SQLを実行する
        $stmt->execute();



        global $dbh; // DBの接続を切れるように明示する
        $dbh = disconnectDb(); // DBの接続を切る
        require "./index.php"; // ホーム画面に遷移する


    // 例外処理
    } catch (PDOException $e) { // 何かしらの例外が発生した際にキャッチする
        echo $e->getMessage(); // 例外の情報が記載された情報を画面に出力する
        disconnectDb(); // DBの接続を切断する
    }
?>
