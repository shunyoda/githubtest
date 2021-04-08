<?php
require_once('funcs.php');

//1. POSTデータ取得
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];

// 簡単なバリデーション処理。-------------------------------------------------------------------------
// 名前、ID.PWが空白の場合、$err配列に1が挿入される（もうちょっといい書き方あるけど、簡単に。）
if (trim($_POST["name"]) === '') {
    $err[] = '名前を確認してください。';
}
if (trim($_POST["lid"]) === '') {
    $err[] = 'idを確認してください。';
}
if (trim($_POST["lpw"]) === '') {
    $err[] = 'PWを確認してください。';
}

$fileName = $_FILES['image']['name'];
if (!empty($fileName)) {
    $check =  substr($fileName, -3);
    if ($check != 'jpg' && $check != 'gif' && $check != 'png') {
        $err[] = '写真の内容を確認してください。';
    }
}

// もしerr配列に何か入っている場合はエラーなので、redirect関数でindexに戻す。その際、GETでerrを渡す。
if (count($err) > 0) {
    foreach ($err as $key => $val) {
        echo "<p>${val}</p>";
    }
    exit;
}
// -------------------------------------------------------------------------




// エラーが無ければ、画像ファイル保存処理-------------------------------------------------------------------------
// formから送られた type="file" の中身は、$_FILESに入っている。
// $_FILESの中身が気になったら、下4行のコメントを外す
// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';
// exit();

// 保存するための「ファイル名」をまず決定。ここでは、日付時間をファイル名に付与して同じ名前をアップロードされても重複しないようにする。
// ↓で保存した場合、ファイル名のイメージは、'202011010110FILENAME.png'みたいな感じになる。
$image = date('YmdHis') . $_FILES['image']['name'];

/**
 * (1)$_FILES['image']['tmp_name']... 一時的にアップロードされたファイルがある。
 * (2)'../picture/' . $image...写真を保存したい場所。 ※先に'picture'というフォルダを手動で作成作成しておく。
 * (3)move_uploaded_file(引数1, 引数2)関数で、（１）の写真を（２）に移動させる。
 */
move_uploaded_file($_FILES['image']['tmp_name'], 'picture/' . $image);
// -------------------------------------------------------------------------



/*
* ※管理フラグ(formのチェックボックス)について。
* var_dumpで`$_POST`を確認すると、
* inputのチェックがない場合は何も送られてこない($_POST["kanri_flg"]が存在しない)
* チェックがついている場合は中身が、on（$_POST["kanri_flg"]に何かが入っている）
* で送られてくることがわかる。
* よって、下記にてif文で 0 or 1を振り分けてあげる。
* （他にも方法があるかと思いますが、一例です。）
*/

if (isset($_POST["kanri_flg"])) {
    $kanri_flg = 1;
} else {
    $kanri_flg = 0;
}

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    "INSERT INTO
        gs_user_table_with_photo(name,lid,lpw,kanri_flg,img)
    VALUES
        (:name,:lid,:lpw,:kanri_flg, :img)
    "
);
// $stmt = $pdo->prepare("INSERT INTO gs_user_table(name,lid,lpw,kanri_flg) VALUES (:name,:lid,:lpw,:kanri_flg)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_STR);
$stmt->bindValue(':img', $image, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php?success');
}