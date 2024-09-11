

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
        <form method="get" class="search_container">
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
                    <input type="text" size="25" id="keyWord" placeholder=" キーワード検索">
                    <input type="submit" value="検索"　name="search">
        </form>
    
        <div class="result">
        <?php    
            // 投稿日と更新日を日本時間に適用する
            date_default_timezone_set('Asia/Tokyo');
            // 別階層にあるDBコネクタの読み込み
            require_once(__DIR__ . "/../../dba/pgConnection.php"); 
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
            $keyWordWithWildcard = "%" . $keyWord . "%";// 部分一致のためにワイルドカードを追加

            $searchSwitch=0;//検索フラグ用の変数
            function searchBranch($searchSwitch){
                global $dbh;
                global $keyWordWithWildcard;
                //searchSwitch内の数字で分岐
                switch($searchSwitch){
                case 0:
                    
                break;
                case 1;
                    //キーワード部分一致（以降キーワードはすべて部分一致とする）
                    $counts = $dbh->query("SELECT COUNT(article_id) as cnt FROM articles Where content LIKE :keyword");
                    //
                break;
                case 2:
                    //メイン一致
                    //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM articles where major_category ={$mainSearchCategory}');
                break;
                case 3:
                    //メインとキーワード一致
                    //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM articles');
                break;
                case 4:
                    //メインとサブ一致
                    //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM articles');
                break;
                case 5:
                    //メイン・サブ・キーワード一致
                    $query = "SELECT * FROM articles 
                    WHERE main_category = :mainSearchCategory 
                    AND sub_category = :subSearchCategory 
                    AND keyword_column LIKE :keyWord";
                    //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM articles');
                break;
                
                }
                // クエリを実行
                //$stmt = $pdo->prepare($query);
                //$stmt->bindParam(':mainSearchCategory', $mainSearchCategory, PDO::PARAM_INT);
                //$stmt->bindParam(':subSearchCategory', $subSearchCategory, PDO::PARAM_INT);
                //$stmt->bindParam(':keyWord', $keyWordWithWildcard, PDO::PARAM_STR);

                //$stmt->execute();
                //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM articles');
                //$count = $counts->fetch();
                
                
            }
            if(empty($_POST['search'])){
                
                if($mainSearchCategory==""){
                    //メイン未選択の場合
                    if (empty($keyWord)==true){
                        //検索なし
                        searchBranch(0);
                    }
                    else{
                        //キーワードのみで検索
                        searchBranch(1);
                        //データベースが出来次第検索結果の部分にcountを入れる
                        $replace =str_replace('○○の検索結果：××件',"{$keyWord}の検索結果:0件",$text);
                        
                    }
                }
                else{
                    if($subSearchCategory==''){
                        //サブ未選択の場合
                        if (empty($keyWord)==true){
                            //メインのみで検索
                            searchBranch(2);
                            $replace =str_replace('○○の検索結果：××件',"{$mainSearchCategory}の検索結果:0件",$text);
                        }
                        else{
                            //メインとキーワードで検索
                            searchBranch(3);
                            $replace =str_replace('○○の検索結果：××件',"メインカテゴリー：{$mainSearchCategory}の{$keyWord}の検索結果:0件",$text);
                        }
                    }
                    else{
                        if (empty($keyWord)==true){
                            //メインとサブで検索
                            searchBranch(4);
                            $replace =str_replace('○○の検索結果：××件',"メインカテゴリー：{$mainSearchCategory},サブカテゴリー:{$subSearchCategory}の検索結果:0件",$text);
                        }
                        else{
                            //メインとサブとキーワードで検索
                            searchBranch(5);
                            $replace =str_replace('○○の検索結果：××件',"メインカテゴリー：{$mainSearchCategory},サブカテゴリー:{$subSearchCategory}の{$keyWord}の検索結果:0件",$text);
                        }
                    }
                }
            }
            
            
            
            ?>
            <h2>
            <?php echo $replace; ?>
            </h2>

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
            frontend:[
                ['選択してください', ''],
                ['HTML', '1'],
                ['CSS', '2'],
                ['JavaScript', '3']
            ],
            backend:[
                ['選択してください', ''],
                ['Python', '4'],
                ['PHP','5'],
                ['Java', '6']
            ],
            infrastructure:[
                ['選択してください', ''],
                ['Python', '7'],
                ['Ruby', '8'],
                ['Java', '9']
            ],
            game:[
                ['選択してください', ''],
                ['C++', '10'],
                ['C#', '11'],
                ['Swift', '12']
            ],
            code:[
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