<?php
session_start();
require_once('funcs.php');

//1. POSTデータ取得
$id = $_POST["id"];
$name = $_POST["name"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];

$err = [];
$fileName = $_FILES['image']['name'];
// 画像に変更ない場合は、$_SESSION、変数に格納されている$_SESSION['img']されているを利用して上書き
if (!$_FILES['image']['name']) {
    $image = $_SESSION['img'];
} else {
    // 修正画面で新しく画像を上書きする場合(基本は新規登録のところとほぼ同じ)
    $image = date('YmdHis') . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'picture/' . $image);
    if (!empty($fileName)) {
        // 拡張子チェック
        $check =  substr($fileName, -3);
        if ($check != 'jpg' && $check != 'gif' && $check != 'png') {
            $err[] = '写真の内容を確認してください。';
        }
    }
}

if (trim($_POST["name"]) === '') {
    $err[] = '名前を確認してください。';
}
if (trim($_POST["lid"]) === '') {
    $err[] = 'idを確認してください。';
}
if (trim($_POST["lpw"]) === '') {
    $err[] = 'PWを確認してください。';
}

// 何かしらのエラーある場合は、ここで処理終了、
if (count($err) > 0) {
    foreach ($err as $key => $val) {
        echo "<p>${val}</p>";
    }
    exit;
} elseif ($fileName) {
    // エラーない場合 && 新規の$_FILESあれば過去画像消しちゃう
    unlink('picture/' . $_SESSION['img']);
}

// 空白がなければ、$_POST["kanri_flg"]と、$_POST["life_flg"]をチェック
if (isset($_POST["kanri_flg"])) {
    $kanri_flg = 1;
} else {
    $kanri_flg = 0;
}

if (isset($_POST["life_flg"])) {
    $life_flg = 1;
} else {
    $life_flg = 0;
}

//2. DB接続します
$pdo = db_conn();
//３．データ登録SQL作成
// ↓横に長いので、改行してます。横に1列で書いてもokです。
$stmt = $pdo->prepare(
    "UPDATE
        gs_user_table_with_photo
    SET
        name = :name, lid = :lid, lpw = :lpw, kanri_flg = :kanri_flg, life_flg = :life_flg, img = :img
    WHERE
        id = :id;"
);


$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':img', $image, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
} else {
    redirect("select_regist.php?id=${id}&success=1");
}