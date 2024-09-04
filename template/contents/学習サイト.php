<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板 学習サイト</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/study.css">
    <link rel="stylesheet" href="../common/css/style.css">
</head>
<body>
    <!--ヘッダー埋め込み-->
    <?php require_once(__DIR__.   '../../common/header.php') ?>
    <main>
        <div class="main-img"></div>


        <div class="container">
        <div class="article">
            <form method="get" action="#" class="search_container">
                <input type="text" size="25" placeholder=" キーワード検索">
                <input type="submit" value="検索">
            </form>

        </div>
        <div id="main-content">
            <h2>学習サイト紹介</h2>
            <img src="/dc_tennoji_web_bulletin_board/image/プロゲートpng.png" alt="">
            <p><a href="https://prog-8.com/">Progateへ</a></p>
        </div>
        <div class="text">
            <p class="main-text">Progateは自分のペースで勉強・復習できる「スライド学習」が特徴のサイトです。
            初心者から創れる人になるために必要なレッスンを最適なステップで実践的に学べるので、
            「まずは気軽に学びたい」という人におすすめです。</p>
        </div>

        <div class="sub-content">
            <img src="/dc_tennoji_web_bulletin_board/image/ドットインストール.png" alt="">
            <p><a href="https://dotinstall.com/">ドットインストールへ</a></p>
        </div>
        <div class="text">
            <p class="main-text">ドットインストールは、豊富なプログラミング言語を無料で学習できるサイトです。
                1レッスン3分以内の動画で構成されているため、スキマ時間に勉強できるのが特徴です。</p>
        </div>

        <div class="sub-section">
            <img src="/dc_tennoji_web_bulletin_board/image/ラーニング.png" alt="">
            <p><a href="https://paiza.jp/works">paizaラーニングへ</a></p>
        </div>
        <div class="text">
            <p class="main-text">paizaラーニング は、動画を使ったオンラインのプログラミング入門学習コンテンツです。
                Java、Python、Ruby、PHP、C言語、SQL、JavaScript、HTML+CSS などの講座を公開。
                1本約3分の動画とそれぞれのチャプターに対応した演習課題で効率よく学べます。</p>
        </div>

        <div class="section">
            <img src="/dc_tennoji_web_bulletin_board/image/Schoo.png" alt="">
            <p><a href="https://schoo.jp/">Schooへ</a></p>
        </div>
        <div class="text">
            <p class="main-text">Schooとは、"みんなで学べる"ライブ動画学習サービスです。
                参加型生放送授業と、8,000本以上の録画授業から幅広いジャンルの学びを提供しています。</p>
        </div>

        <div class="section2">
            <img src="/dc_tennoji_web_bulletin_board/image/シラバス.png" alt="">
            <p><a href="https://cyllabus.jp/">シラバスへ</a></p>
        </div>
        <div class="text">
            <p class="main-text">シラバスは、webデザインやwebアプリケーションの開発方法を学ぶことができるwebサービスです。
                ステップバイステップでマネをしながら学習することができます。</p>
        </div>

        <div class="section3">
            <img src="/dc_tennoji_web_bulletin_board/image/インフラ系学習.png" alt="">
            <p><a href="https://engineer-ninaritai.com/">InfraAcademyへ</a></p>
        </div>
        <div class="text">
            <p class="main-text">InfraAcademyでは、インフラエンジニアに必要な知識を学ぶことができます。
                インフラエンジニアは、インフラの設計や構築、運用などの業務を行います。
                これらの業務を行うためには、さまざまな知識が必要です。
                現在では、AWSやAzureといったクラウドが主流ですが、Linuxの知識は必須になります。
                このようなクラウドの基礎部分も学習することができます。</p>
        </div>




    </div>
    </main>
        <!--フッター埋め込み-->
        <?php require_once(__DIR__ .  "../../common/footer.php") ?>
</body>
</html>