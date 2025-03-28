<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>掲示板未経験者案内</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/Beginner.css">
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

            <div id="article-img">
                <h2>未経験者案内</h2>
                <h3>フロントエンドとは？</h3>
                <img src="../../image/フロントエンド画像.png" alt="">
                <h4>必要な知識/スキル</h4>
                <ul>
                    <li>HTML、CSS、JavaScriptなどのスキル</li>
                    <li>デザインに関する知識・UI・UX設計</li>
                    <li>バックエンドに関する知識</li>
                    <li>UI・UX設計</li>
                </ul>
                <p>フロントエンドはユーザーに表示されるもので、ボタン、チェックボックス、グラフィック、
                    テキストメッセージなどの視覚要素が含まれています。これにより、ユーザーはアプリケーションを操作できます。
                    フロントエンドエンジニアの仕事は、Webデザイナーが作ったデザインを再現し、ブラウザに表示させることです。 
                    HTMLやCSSはもちろん、JavaScriptを一から記述できるスキルは必須です。 
                    フロントエンドエンジニアはJavaScriptを使用し、双方向な表現が可能なWebサイトの構築など、高い技術が要求されます。</p>

            </div>

            <div class="backend">
                <h3>バックエンドとは？</h3>
                <img src="../../image/バックエンド画像.png" alt="">
                <h4>必要な知識/スキル</h4>
                <ul>
                    <li>プログラミングスキル</li>
                    <li>サーバーやネットワークの知識</li>
                    <li>セキュリティ関連の知識</li>
                    <li>データベースの知識</li>
                    <li>マネジメントスキル</li>
                </ul>
                <p>飛行機の予約システムを例にとると、指定した空港から空港間でその日に運行している便一覧の取得や、
                    空席情報検索時の情報取得、支払いに関するクレジットカードの処理などがバックエンド側の役割となり、
                    このようなユーザーからは直接見えていないサーバーでの処理を行います。
                    システムエンジニア（SE）とは、クライアントの要望や要求に合わせてシステムを設計するエンジニアのことを言います。
                    エンジニアの仕 事内容は、上流工程と下流工程の2つに分けられます。
                    要件定義・基本設計・詳細設計などは上流工程で、開発やテストや運用・保守管理の業務は下流工程の仕事となりますが、
                    このうち、システムエンジニアは主に上流工程を担当します。
                </p>

            </div>

            <div class="sisutemu">
                <h3>システムエンジニアとは？</h3>
                <img src="../../image/システムエンジニア.png"alt="">
                <ul>
                    <li>プログラミング言語・スキル</li>
                    <li>サーバーやネットワークの知識</li>
                    <li>セキュリティ関連の知識</li>
                    <li>データベースの知識</li>
                    <li>マネジメントスキル</li>
                </ul>
                <p>システムエンジニア（SE）とは、クライアントの要望や要求に合わせて
                    システムを設計するエンジニアのことを言います。
                    エンジニアの仕事内容は、上流工程と下流工程の2つに分けられます。
                    要件定義・基本設計・詳細設計などは上流工程で、開発やテストや運用・保守管理の業務は下流工程の仕事となりますが、このうち、システムエンジニアは主に上流工程を担当します。</p>
            </div>

            <div class="IT">
                <h3>社内SEとは？
                    （システムエンジニア）
                </h3>
                <img src="../../image/社内SE.png" alt="">
                <ul>
                    <li>予算管理スキル</li>
                    <li>プロジェクトマネジメントスキル</li>
                    <li>プログラミングスキル</li>
                    <li>ユーザビリティを考慮したシステム開発</li>
                    <li>顧客折衝やマネジメント経験</li>
                </ul>
                <p>社内SEはSE（システムエンジニア）の一種で、「自社内」の業務に特化して
                    いるのが特徴です。
                    社内システム企画と呼ばれることもあり、システムの開発・運用
                    セキュリティー対策・社内コミュニケーションの活性化など自社のIT関連業務に幅広く携わります。</p>
            </div>

            <div class="purogurama-">
                <h3>プログラマーとは？</h3>
                <img src="../../image/プログラマー.png" alt="">
                <ul>
                    <li>プログラミング言語・スキル</li>
                    <li>フレームワーク</li>
                    <li>ライブラリの作成方法</li>
                    <li>データベース</li>
                    <li>情報収集力</li>
                </ul>
                <p>プログラマー(PG)の仕事内容は、SE（システムエンジニア）が設計した仕様書に基づいてプログラミングを行うことです。 
                    プログラミングだけではなく、設計どおりに動作するかのテストや、
                    バグを見つけて修正する作業も含まれます。</p>
            </div>

            <div class="apuri">
                <h3>アプリケーションエンジニアとは？</h3>
                <img src="../../image/アプリ.png" alt="">
                <ul>
                    <li>システム開発に関するスキル</li>
                    <li>ネットワークやデータベースの知識</li>
                    <li>フレームワークの知識</li>
                    <li>マネジメントスキル</li>
                </ul>
                <p>アプリケーションエンジニアの仕事内容は、アプリケーションのシステム設計からプログラミング、動作テスト、運用、メンテナンスなど、幅広い業務を
                    行います。 どんなアプリを作るのか、企画から始めて、実際にアプリの開発を行い、リリースした後もサービスを継続し、必要に応じた機能の追加や
                    改善作業などが主な業務となります。</p>
            </div>

              
            <div class="kumikomi">
                <h3>組込みエンジニアとは？</h3>
                <img src="../../image/組込みエンジニア.png" alt="">
                <ul>
                    <li>アセンプリ言語</li>
                    <li>OSの知識</li>
                    <li>マイコンの知識</li>
                    <li>ハードウェアの知識</li>
                    <li>ソフトウェアの知識</li>
                </ul>
                <p>組込みエンジニアの主な業務内容は、家電製品や電子機器などのハードウェアに搭載されるシステムの設計と開発です。
                    例えば、工場のプラントを制御するシステムや、ウェアラブルデバイスに
                    組み込まれるセンサー、
                    炊飯器や洗濯機などに搭載されるマイコンなどが挙げられます。</p>
                
            </div>

            <div class="se-rusu">
                <h3>セールスエンジニアとは？</h3>
                <img src="../../image/セールスエンジニア.png" alt="">
                <ul>
                    <li>基本的なITスキル</li>
                    <li>コミュニケーション能力</li>
                    <li>ヒアリング・提案能力</li>
                    <li>資料作成スキル</li>
                    <li>英語力</li>

                </ul>
                <p>セールスエンジニアとは、営業職が製品やサービスを販売できるように
                    技術的なサポートをする仕事です。
                     顧客に製品やサービスを提案し、要望に合わせたサンプルプログラムを
                     作るといった業務があります。</p>
            </div>


            <div class="inhura">
                <h3>インフラエンジニアとは？</h3>
                <img src="../../image/インフラ画像.png"alt="">
                <h4>必要な知識/スキル</h4>
                <ul>
                    <li>ネットワーク技術に関する豊富な知識</li>
                    <li>課題やエラーを論理的に解決する能力</li>
                </ul>
                <p>日常生活で電気・水道などの社会インフラが必要であることと同様に、私たちがITシステムやインターネットを使用するためは、
                    OS・ネットワーク・サーバーといったITインフラが欠かせません。
                    そのITインフラの設計・構築・運用・保守に従事する技術者が、インフラエンジニアです。
                    ネットワークエンジニアは、企業における情報やデータのやりとりを安全かつ円滑に行うための
                    ネットワークシステム設計から構築、運用などを広く担う仕事です。
                    データのやりとりは通信機器やコンピュータを介して行われるため、複数の機器間でのでーたの受け渡しや
                    共有を問題なく行うための快適なネットワーク環境を調整する必要があります。
                </p>
            </div>

            <div class="nekko">
                <h3>ネットワークエンジニアとは？</h3>
                <img src="../../image/ネットワークエンジニア.png" alt="">
                <ul>
                    <li>ネットワーク技術に関する豊富な知識</li>
                    <li>課題やエラーを論理的に解決する能力</li>
                </ul>
                <p>ネットワークエンジニアは、企業における情報やデータのやりとりを安全かつ円滑に行うためのネットワークシステム設計から構築、運用などを広く担う
                    仕事です。
                    データのやりとりは通信機器やコンピュータを介して行われるため、
                    複数の機器間でのデータの受け渡しや共有を問題なく行うための快適な
                    ネットワーク環境を調整する必要があります。</p>
            </div>

            <div class="security">
                <h3>セキュリティエンジニアとは？</h3>
                <img src="../../image/セキュリティエンジニア.png" alt="">
                <ul>
                    <li>基礎的なIT技術系のスキルと知識</li>
                    <li>経営に関する知識</li>
                    <li>法律に関する知識</li>
                    <li>規格認証に関する知識</li>
                    <li>サーバーやネットワーク、OSの知識</li>
                    <li>サイバーセキュリティに関する知識</li>
                </ul>
                <p>セキュリティエンジニアは、サイバー攻撃の脅威から組織のネットワークや
                    システムを守るのが主な業務です。
                    1日、セキュリティエンジニアは、サイバー攻撃の脅威から組織のネットワークやシステムを守るのが主な業務です。
                    1日に200万個誕生していると 1日に200万個誕生していると言われる様々な
                    脅威に対して、新たな攻撃手法や技術に関する調査を行い、
                    対策を講じ続けます。</p>
            </div>

            <div class="deta">
                <h3>データベースエンジニアとは？</h3>
                <img src="../../image/データベースエンジニア.png" alt="">
                <ul>
                    <li>データベースに関する知識</li>
                    <li>企業のIT戦略と方針に関する理解</li>
                </ul>
                <p>「データベース」とは企業が扱う膨大な量のデータを保持し、
                    必要なデータを「検索したり抽出したりするための入れ物のようなもの。
                    その入れ物の最適な容量を決めたり、どんな順序でデータを並べるか、
                    どう仕切って入れておいたら出し入れしやすいかを考え整理整頓するのが
                    データベースエンジニアの仕事です。</p>
            </div>



            <div class="game">
                <h3>ゲームエンジニアとは？</h3>
                <img src="../../image/ゲーム画像.png" alt="">
                <h4>必要な知識/スキル</h4>
                <ul>
                    <li>プログラミングスキル</li>
                    <li>ゲームエンジンのスキル</li>
                    <li>コミュニケーションスキル</li>
                    <li>数学や物理に関する知識</li>
                    <li>英語力</li>
                </ul>

                <p>ゲームエンジニアとは、家庭用ゲームやスマ―トフォンアプリケーションのゲーム、PCゲームなどの制作に携わるエンジニアです。
                    ゲームプログラマーと呼ばれることもありますが、近年はゲーム制作に必要な知識がプログラミングに限らないため、
                    より広い職務を示すエンジニアという表現が多く使われています。
                    ゲームプログラマーとは、ゲームプランナーが作成した仕様書や設計書通りにゲーム全体がうまく動くように仕上げる仕事です。 
                    開発言語を用いて、キャラクターや効果音なども含めゲームをプログラミングします。 
                    ゲームのアイディアを形にして、ゲームの品質管理を行う役割も担います。
                </p>
            </div>
        </div>



    <!--ヘッダー埋め込み-->
    <?php require_once(__DIR__.   '../../common/footer.php') ?>


    </main>


</body>

</html>