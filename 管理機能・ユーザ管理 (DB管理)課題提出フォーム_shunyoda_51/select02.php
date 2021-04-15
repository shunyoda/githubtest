<?php

session_start();

//1.  DB接続
require_once('funcs.php');


//２．データ取得SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';

        $view .= '<a href="detail02.php?id=' . $result['id'] . '">';
        $view .= $result["indate"] . "：" . $result["title"];
        $view .= '</a>';
        $view .= '<a href="delete.php02?id=' . $result['id'] . '">';

        $view .= '</a>'; 
        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>本のブックマーク表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">メイン画面に戻る</a>
        </div>
    </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
        <a href="detail.php"></a>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
