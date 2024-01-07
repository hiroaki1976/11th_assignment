<?php
session_start();
require_once('function.php');

//1. POSTデータ取得
$jigyousyo = isset($_POST['jigyousyo']) ? $_POST['jigyousyo'] : '';
$a_gata = isset($_POST['a_gata']) ? 'A型' . $_POST['a_gata'] : 'A型';
$b_gata = isset($_POST['b_gata']) ? 'B型' . $_POST['b_gata'] : 'B型';
$ikou = isset($_POST['ikou']) ? '移行' . $_POST['ikou'] : '移行';
$other = isset($_POST['other']) ? 'その他' . $_POST['other']: 'その他';
$postcode = isset($_POST['postcode']) ? $_POST['postcode'] : '';
$prefecture = isset($_POST['prefecture']) ? $_POST['prefecture'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$town = isset($_POST['town']) ? $_POST['town'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$name_kana = isset($_POST['name_kana']) ? $_POST['name_kana'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password1 = isset($_POST['password1']) ? $_POST['password1'] : '';
$password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
$time = date('Y/m/d H:i:s');
$kanri_flg = 0;

$hashed_pw = password_hash($password1, PASSWORD_DEFAULT);

//2. DB接続します
$pdo = db_conn();

//3．データ登録SQL作成

// 3-1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, time, jigyousyo, officetype_a, officetype_b, officetype_ikou, officetype_other, postcode, prefecture, city, town, name, name_kana, email, password, kanri_flg)
VALUES (NULL, sysdate(), :jigyousyo, :officetype_a, :officetype_b, :officetype_ikou, :officetype_other, :postcode, :prefecture, :city, :town, :name, :name_kana, :email, :password, :kanri_flg );");
// 3-2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':jigyousyo', $jigyousyo, PDO::PARAM_STR);
$stmt->bindValue(':officetype_a', $a_gata, PDO::PARAM_STR);
$stmt->bindValue(':officetype_b', $b_gata, PDO::PARAM_STR);
$stmt->bindValue(':officetype_ikou', $ikou, PDO::PARAM_STR);
$stmt->bindValue(':officetype_other', $other, PDO::PARAM_STR);
$stmt->bindValue(':postcode', $postcode, PDO::PARAM_STR);
$stmt->bindValue(':prefecture', $prefecture, PDO::PARAM_STR);
$stmt->bindValue(':city', $city, PDO::PARAM_STR);
$stmt->bindValue(':town', $town, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':name_kana', $name_kana, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $hashed_pw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);

// 3-3. 実行
$status = $stmt->execute();

// 3-４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}

// 4.データをセッションに格納
$_SESSION['jigyousyo'] = $jigyousyo;
$_SESSION['a_gata'] = $a_gata;
$_SESSION['b_gata'] = $b_gata;
$_SESSION['ikou'] = $ikou;
$_SESSION['other'] = $other;
$_SESSION['postcode'] = $postcode;
$_SESSION['prefecture'] = $prefecture;
$_SESSION['city'] = $city;
$_SESSION['town'] = $town;
$_SESSION['name'] = $name;
$_SESSION['name_kana'] = $name_kana;
$_SESSION['email'] = $email;
// $_SESSION['password1'] = $password1;
// $_SESSION['password2'] = $password2;
$_SESSION['time'] = $time;
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>ユーザー登録完了</h1>
    <h2>「確認する」からご登録内容が確認できます</h2>

    <ul>
        <li><a href="read.php">確認する</a></li>
        <li><a href="index.php">戻る</a></li>
    </ul>
</body>
</html>