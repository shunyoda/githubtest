<?php
// SESSIONという機能を利用するため記載
session_start();
require_once("funcs.php");
$pdo = db_conn();
$id = $_GET['id'];

// 編集処理の際に、エラーが有る場合は↓の処理
if ($_GET['err']) {
    $err = $_GET['err'];
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table_with_photo WHERE id=" . $id . ';');
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($status);
} else {
    // 取得結果は一つだけでいいので、この書き方。
    $row = $stmt->fetch();
    // SESSIONという特殊な機能を利用しています。
    $_SESSION['img'] = $row['img'];
    // 下のHTML部分で利用するために、img, kanri_flg、life_flg、の中身を確認して、変数に入れておく

    if ($row['img']) {
        $img = "<img src='picture/" . $row['img'] . "'>";
    } else {
        $img = 'no Image';
    }

    if ($row['kanri_flg']) {
        $kanri_flg = 'checked';
    } else {
        $kanri_flg = '';
    }

    if ($row['life_flg']) {
        $life_flg = 'checked';
    } else {
        $life_flg = '';
    }


    // $_SESSION['img'] = $row['img'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
        <style>
            img {
                max-width: 250px;
            }
        </style>
    </header>
    <?php
    // 編集処理の際に、エラーが有る場合は↓の処理
    if ($_GET['err']) {
        echo '<p class="text-danger">名前 / ID / PWは、何か入力してください</p>';
    }
    ?>
    <form method="POST" action="update.php" enctype="multipart/form-data">
        <div class="jumbotron">
            <fieldset>
                <legend>会員詳細</legend>
                <label>名前：<input type="text" name="name" value=<?= $row['name'] ?>></label><br>
                <label>ID:<input type="text" name="lid" value=<?= $row['lid'] ?>></label><br>
                <label>PW：<input type="text" name="lpw" value=<?= $row['lpw'] ?>></label><br>
                <?= $img ?><br>
                <label>※写真を変更する場合は、ここから新たに選択してください：
                    <input type="file" name="image" size="35"></label><br>
                <label>管理者：<input type="checkbox" name="kanri_flg" value="1" <?= $kanri_flg ?>></label><br>
                <label>退職者：<input type="checkbox" name="life_flg" value="1" <?= $life_flg ?>></label><br>
                <input type="hidden" name="id" value=<?= $row['id'] ?>>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>