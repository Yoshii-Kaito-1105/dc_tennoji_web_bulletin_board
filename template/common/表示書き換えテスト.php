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
                        <option value="frontend">フロントエンド</option>
                        <option value="backend">バックエンド</option>
                        <option value="infrastructure">インフラ</option>
                        <option value="game">ゲーム</option>
                        <option value="code">効率的なコードの書き方</option>
                    </select>
                    
                    サブカテゴリー：<select name="subCategory" id="subCategory">
                        <option value=" ">選択してください</option>
                        
                        
                    </select>
                    <input type="text" size="25" id="keyWord" placeholder=" キーワード検索">
                    <input type="submit" value="検索"　name="search">
        </form>
    
        <div class="result">
        <?php    
            
            $text='○○の検索結果：××件';
            $replace=$text;
            $mainSearchCategory = filter_input(INPUT_POST,"mainCategory") ; // 検索画面のメインカテゴリ
            $subSearchCategory = filter_input(INPUT_POST,"subCategory"); // 検索画面のサブカテゴリ
            $keyWord = filter_input(INPUT_POST,"keyWord"); // 検索画面の投稿内容
            $searchSwitch=0;//検索フラグ用の関数
            function NumberofSearches($searchSwitch){
                //検索して出た数に応じてカウントアップ
                switch($searchSwitch){
                case 0:
                    $counts = 0;
                break;
                case 1;
                    //キーワード一致
                    //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM articles');
                break;
                case 2:
                    //メイン一致
                    //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM items');
                break;
                case 3:
                    //メインとキーワード一致
                    //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM items');
                break;
                case 4:
                    //メインとサブ一致
                    //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM items');
                break;
                case 5:
                    //メイン・サブ・キーワード一致
                    //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM items');
                break;
                
                }
                //$counts = $dbh->query('SELECT COUNT(article_id) as cnt FROM items');
                //$count = $counts->fetch();
                //echo ($count['cnt']);
            }
            if(isset($_POST['search'])){
                if($mainSearchCategory==""){
                    if (isset($keyWord)==true){
                        //検索なし
                        NumberofSearches(0);
                    }
                    else{
                        //キーワードのみで検索
                        NumberofSearches(1);
                        //データベースが出来次第検索結果の部分にcountを入れる
                        $replace =str_replace('○○の検索結果：××件',"{$keyWord}の検索結果:0件",$text);
                        
                    }
                }
                else{
                    if($subSearchCategory==''){
                        if (isset($keyWord)==true){
                            //メインのみで検索
                            NumberofSearches(2);
                            $replace =str_replace('○○の検索結果：××件',"{$mainSearchCategory}の検索結果:0件",$text);
                        }
                        else{
                            //メインとキーワードで検索
                            NumberofSearches(3);
                            $replace =str_replace('○○の検索結果：××件',"メインカテゴリー：{$mainSearchCategory}の{$keyWord}の検索結果:0件",$text);
                        }
                    }
                    else{
                        if (isset($keyWord)==true){
                            //メインとサブで検索
                            NumberofSearches(4);
                            $replace =str_replace('○○の検索結果：××件',"メインカテゴリー：{$mainSearchCategory},サブカテゴリー:{$subSearchCategory}の検索結果:0件",$text);
                        }
                        else{
                            //メインとサブとキーワードで検索
                            NumberofSearches(5);
                            $replace =str_replace('○○の検索結果：××件',"メインカテゴリー：{$mainSearchCategory},サブカテゴリー:{$subSearchCategory}の{$keyWord}の検索結果:0件",$text);
                        }
                    }
                }
            }
            
            
            
            ?>
            <h2>
            <?php echo $replace; ?>
            </h2>

            <!--この辺に検索して出た記事-->
            <?php 
            
            
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        

        // #subCategoryの中身を準備
        var items = {
            frontend:[
                ['選択してください', ''],
                ['HTML', 'HTML'],
                ['CSS', 'CSS'],
                ['JavaScript', 'JavaScript']
            ],
            backend:[
                ['選択してください', ''],
                ['Python', 'Python'],
                ['PHP','PHP'],
                ['Java', 'Java']
            ],
            infrastructure:[
                ['選択してください', ''],
                ['Python', 'Python'],
                ['Ruby', 'Ruby'],
                ['Java', 'Java']
            ],
            game:[
                ['選択してください', ''],
                ['C++', 'C++'],
                ['C#', 'C#'],
                ['Swift', 'Swift']
            ],
            code:[
                ['未分類', 'uncategorized']
            ]
        };

        var none = $('#subCategory').html(); // #subCategoryの最初の状態
        $("#subCategory").attr("disabled", true); // #mainCategoryが「選択してください」のときは操作不可に

        $('#mainCategory').on('change', function(){
            var cont = $(this).val(); // 選択された項目のvalueを取得
            if(cont){ // valueに何か値が入っていた場合
                var item = items[cont]; // リストからカテゴリに登録されたサブカテゴリの配列を取得
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
</body>
</html>