<?php 
            // 投稿日と更新日を日本時間に適用する
            date_default_timezone_set('Asia/Tokyo');
            // 別階層にあるDBコネクタの読み込み
            require_once(__DIR__ . "/../../dba/pgConnection.php"); 
            $dbh=null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>表示書き換えテスト</title>
</head>
<body>
<div class="container">
        <!--検索バー-->
        <form method="post" class="search_container">
        カテゴリー：<select name="mainCategory" id="mainCategory">
                        <option value="">選択してください</option>
                        <option value="1">フロントエンド</option>
                        <option value="2">バックエンド</option>
                        <option value="3">インフラ</option>
                        <option value="4">ゲーム</option>
                        <option value="5">効率的なコードの書き方</option>
                    </select>
                    
                    サブカテゴリー：<select name="subCategory" id="subCategory">
                        <option value=" ">選択してください</option>
                        
                        
                    </select>
                    <input type="text" size="25" id="keyWord" name="keyWord" placeholder=" キーワード検索">
                    <input type="submit" value="検索" name="search">
        </form>
    
        <div class="result">
        <?php    
            global $dbh;
            $dbh = connectToDb();

            
            //データベース接続確認
            //if ($dbh === null) {
            //    echo 'データベース接続に失敗しました。';
            //} else {
            //    echo 'データベース接続が成功しました。';
            //}
            
                         // データベースからレコードを全て取得する
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
                         ";
            
            $stmt = $dbh->query($sql);
            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $text='○○の検索結果：××件';
            $replace=$text;
            $mainSearchCategory = filter_input(INPUT_POST,"mainCategory",FILTER_VALIDATE_INT) ; // 検索画面のメインカテゴリ
            
            $subSearchCategory = filter_input(INPUT_POST,"subCategory",FILTER_VALIDATE_INT); // 検索画面のサブカテゴリ

            $keyWord = filter_input(INPUT_POST,"keyWord",FILTER_SANITIZE_STRING); // 検索画面の投稿内容
            

            $searchSwitch=0;//検索フラグ用の変数
            
            function searchBranch($dbh, $searchSwitch, $mainSearchCategory, $subSearchCategory, $keyWord) {
                global $dbh;
                $dbh = connectToDb();
                $articles = []; // 結果を保存する配列
                $sql = "SELECT * FROM articles "; // 基本のSQLクエリ
                $conditions = []; // WHERE条件を保存する配列
                $params = []; // パラメータを保存する配列
            
                // 条件分岐でクエリを作成
                switch($searchSwitch) {
                    case 0:
                        // 全件取得
                        break;
                    case 1:
                        // キーワードのみで検索
                        $conditions[] = "content LIKE :keyword";
                        $params[':keyword'] = '%' . $keyWord . '%';//部分一致のためワイルドカードを追加
                        break;
                    case 2:
                        // メインカテゴリーのみで検索
                        $conditions[] = "major_category_id = :mainSearchCategory";
                        $params[':mainSearchCategory'] = $mainSearchCategory;
                        break;
                    case 3:
                        // メインカテゴリーとキーワードで検索
                        $conditions[] = "major_category_id = :mainSearchCategory";
                        $conditions[] = "content LIKE :keyword";
                        $params[':mainSearchCategory'] = $mainSearchCategory;
                        $params[':keyword'] = '%' . $keyWord . '%';
                        break;
                    case 4:
                        // メインカテゴリーとサブカテゴリーで検索
                        $conditions[] = "major_category_id = :mainSearchCategory";
                        $conditions[] = "minor_category_id = :subSearchCategory";
                        $params[':mainSearchCategory'] = $mainSearchCategory;
                        $params[':subSearchCategory'] = $subSearchCategory;
                        break;
                    case 5:
                        // メインカテゴリー、サブカテゴリー、キーワードで検索
                        $conditions[] = "major_category_id = :mainSearchCategory";
                        $conditions[] = "minor_category_id = :subSearchCategory";
                        $conditions[] = "content LIKE :keyword";
                        $params[':mainSearchCategory'] = $mainSearchCategory;
                        $params[':subSearchCategory'] = $subSearchCategory;
                        $params[':keyword'] = '%' . $keyWord . '%';
                        break;
                }
            
                // 条件がある場合はWHERE句を追加
                if (count($conditions) > 0) {
                    $sql .= " WHERE " . implode(" AND ", $conditions);
                }
            
                // クエリを実行して記事を取得
                $stmt = $dbh->prepare($sql);
                $stmt->execute($params);
                $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                // 記事の件数を取得
                $count = count($articles);
            
                // 結果としてレコードと件数を返す
                return ['count' => $count, 'articles' => $articles];
            }
            
                

                
                

            if (isset($_POST['search'])) {
                if ($mainSearchCategory == "") {
                    // メイン未選択の場合
                    if (empty($keyWord)) {
                        // 検索なし（全件取得）
                        $result = searchBranch($dbh, 0, null, null, null);
                    } else {
                        // キーワードのみで検索
                        $result = searchBranch($dbh, 1, null, null, $keyWord);
                    }
                } else {
                    if ($subSearchCategory == '') {
                        // サブ未選択の場合
                        if (empty($keyWord)) {
                            // メインのみで検索
                            $result = searchBranch($dbh, 2, $mainSearchCategory, null, null);
                        } else {
                            // メインとキーワードで検索
                            $result = searchBranch($dbh, 3, $mainSearchCategory, null, $keyWord);
                        }
                    } else {
                        if (empty($keyWord)) {
                            // メインとサブで検索
                            $result = searchBranch($dbh, 4, $mainSearchCategory, $subSearchCategory, null);
                        } else {
                            // メインとサブとキーワードで検索
                            $result = searchBranch($dbh, 5, $mainSearchCategory, $subSearchCategory, $keyWord);
                        }
                    }
                }
            
                // 結果から件数と記事を取得
                $count = $result['count'];
                $articles = $result['articles'];
            
                // 件数を使ってメッセージを更新
                $replace = str_replace('○○の検索結果：××件', "{$keyword}の検索結果:{$count}件", $text);
            }
            
            
            
            
            ?>
            <h2>
            <?php echo $replace; ?>
            </h2>

            <?php 
            global $dbh;
            foreach ($articles as $article) {
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
                </div>
                <!--記事本文-->
                <p class="contents">本文: {$content}</p>
                    <div class="article-buttons">
                        <button type="submit" class="article-btn edit">編集</button>
                        <button type="submit" class="article-btn delete">削除</button>
                    </div>
            </div>
            EOT;
        }
    ?>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        

        // #subCategoryの中身を準備
        var articles = {
            1:[//フロントエンド
                ['選択してください', ''],
                ['HTML', '1'],
                ['CSS', '2'],
                ['JavaScript', '3']
            ],
            2:[//バックエンド
                ['選択してください', ''],
                ['Python', '4'],
                ['PHP','5'],
                ['Java', '6']
            ],
            3:[//インフラ
                ['選択してください', ''],
                ['Python', '7'],
                ['Ruby', '8'],
                ['Java', '9']
            ],
            4:[//ゲーム
                ['選択してください', ''],
                ['C++', '10'],
                ['C#', '11'],
                ['Swift', '12']
            ],
            5:[//効率的なコードの書き方
                ['未分類', '13']
            ]
        };

        var none = $('#subCategory').html(); // #subCategoryの最初の状態
        $("#subCategory").attr("disabled", true); // #mainCategoryが「選択してください」のときは操作不可に

        $('#mainCategory').on('change', function(){
            var cont = $(this).val(); // 選択された項目のvalueを取得
            if(cont){ // valueに何か値が入っていた場合
                var item = articles[cont]; // リストからカテゴリに登録されたサブカテゴリの配列を取得
                $("#subCategory").attr("disabled", false); // #subCategoryを選択可能に
                $('#subCategory').html('');
                var option;
                for(var i = 0; i < item.length; i++){
                    option = '<option value="' + item[i][1] + '">' + item[i][0] + '</option>';
                    $('#subCategory').append(option);
                }
            } else { // valueに何も値が入っていない場合
                $("#subCategory").attr("disabled", true);
                $('#subCategory').html(none); // 保存された最初の状態に戻す
            }
        });



    </script>
        <!-- DBの接続を切る -->
        <?php $dbh = disconnectDb(); ?>
</body>
</html>