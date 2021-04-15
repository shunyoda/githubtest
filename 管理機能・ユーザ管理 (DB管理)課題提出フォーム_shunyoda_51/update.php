<?php

//1. POSTデータ取得
$title   = $_POST["title"];
$url  = $_POST["url"];
$comment = $_POST["comment"];
$id = $_POST["id"];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    "UPDATE
        gs_bm_table
    SET
        title = :title,
        url = :url,
        comment= :comment,
        indate = sysdate()
    WHERE
        id = :id
    ;"
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}