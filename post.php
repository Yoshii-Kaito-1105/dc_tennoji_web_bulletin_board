<?php

use Illuminate\Support\Facades\DB;

include "./dba/dba.php";

// 送信データを受け取る
$category = $_POST["category1"];
$text = $_POST["text"];
// データベース接続する
connectToDb();
DB::connection("");// スキーマ名を指定
disconnectDb();
