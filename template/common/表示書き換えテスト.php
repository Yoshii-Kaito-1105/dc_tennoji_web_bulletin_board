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
                    <input type="submit" value="検索">
        </form>
    
        <div class="result">
        <?php    
            
            $text='○○の検索結果：××件';
            $mainCategory = filter_input(INPUT_POST,"mainCategory") ; // メインカテゴリ
            $subCategory = filter_input(INPUT_POST,"subCategory"); // サブカテゴリ
            $keyWord = filter_input(INPUT_POST,"keyWord"); // 投稿内容
            if($mainCategory==""){
                if (isset($keyWord)==true){
                    //検索なし
                }
                else{
                    //キーワードのみで検索
                    $replace =str_replace('○○',$keyWord,$text);
                }
            }
            else{
                if($subCategory==''){
                    if (isset($keyWord)==true){
                        //メインのみで検索
                        $replace =str_replace('○○',"{$mainCategory}",$text);
                    }
                    else{
                        //メインとキーワードで検索
                        $replace =str_replace('○○',"メインカテゴリー：{$mainCategory}の{$keyWord}",$text);
                    }
                }
                else{
                    if (isset($keyWord)==true){
                        //メインとサブで検索
                        $replace =str_replace('○○',"メインカテゴリー：{$mainCategory},サブカテゴリー:{$subCategory}",$text);
                    }
                    else{
                        //メインとサブとキーワードで検索
                        $replace =str_replace('○○',"メインカテゴリー：{$mainCategory},サブカテゴリー:{$subCategory}の{$keyWord}",$text);
                    }
                }
            }
            
            
            ?>
            <h2>
            <?php echo $replace; ?>
            </h2>

            <!--この辺に検索して出た記事-->
            
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