<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
    <div class="header">
        <div class="header-left">
            <h1 >掲示板</h1>
            <div class="clear"></div>
        </div>
        
        
        <div class="clear"></div>
        <div class="main-menu">
            <h3><a class="menu-link" href="掲示板モック.html#article">HOME</a></h3>
            <h3><a class="menu-link" href="../../dc_tennoji_web_bulletin_board/template/contents/掲示板の使い方.html">未経験案内</a></h3>
            <h3><a class="menu-link" href="掲示板の使い方.html#article-title">掲示板の使い方</a></h3>
            <h3><a class="menu-link" href="">学習サイト</a></h3>
            <details class="categories-link">
                <summary>カテゴリー</summary>
                <ul id="categories">
                    <li href="">エンジニア分野</li>
                    <a href="../../dc_tennoji_web_bulletin_board/template/contents/frontend/frontend-contents.php"><li>フロントエンド</li></a>
                    <details class="categories-link">
                        <summary>各項目</summary>
                        <ul id="categories">
                            各言語
                            <li href="">HTML</li>
                            <li href="">CSS</li>
                            <li href="">JavaScript</li>
                        </ul>
                    </details>

                    <a href="../../dc_tennoji_web_bulletin_board/template/contents/backend/backend-contents.php"><li>バックエンド</li></a>
                    <details class="categories-link">
                        <summary>各項目</summary>
                        <ul id="categories">
                            各言語
                            <li href="">Python</li>
                            <li href="">Java</li>
                        </ul>
                    </details>
                    <a href="../../dc_tennoji_web_bulletin_board/template/contents/infra/infra-content.php"><li>インフラ</li></a>
                    <details class="categories-link">
                        <summary>各項目</summary>
                        <ul id="categories">
                            各言語
                            <li href="">Python</li>
                            <li href="">Ruby</li>
                            <li href="">Java</li>
                        </ul>
                    </details>
                    <li href="">ゲーム</li>
                    <details class="categories-link">
                        <summary>各項目</summary>                        
                            <ul id="categories">
                                各言語
                                <li href="">C#</li>
                                <li href="">C++</li>
                                <li href="">Swift</li>
                            </ul>
                        </details>
                </ul>

            </details>
            
            
            
            

        </div>
    </div>
    
    
    
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
</body>
</html>