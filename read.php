<?php
session_start();
require_once('function.php');

// リファラーを取得
$referer = @$_SERVER['HTTP_REFERER'];

// リファラーが存在しない場合、直接アクセスとみなしエラーメッセージを表示
if (empty($referer)) {
    die('このページへの直接アクセスは禁止されています。');
}
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録内容確認</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
    $jigyousyo = $_SESSION['jigyousyo'];
    $a_gata = $_SESSION['a_gata'];
    $b_gata = $_SESSION['b_gata'];
    $ikou = $_SESSION['ikou'];
    $other = $_SESSION['other'];
    $image = $_SESSION['image'];
    $postcode = $_SESSION['postcode'];
    $prefecture = $_SESSION['prefecture'];
    $city = $_SESSION['city'];
    $town = $_SESSION['town'];
    $name = $_SESSION['name'];
    $name_kana = $_SESSION['name_kana'];
    $email = $_SESSION['email'];
    $time = $_SESSION['time'];
    ?>
    <h1>登録内容確認</h1>
    <div id="myForm">
        <dl>
            <dt>【登録日時】</dt><dd><?php echo h($time); ?></dd>
            <dt>【事業所名】</dt><dd><?php echo h($jigyousyo); ?></dd>
            <dt>【事業所種別】</dt><dd><?php echo h($a_gata); ?><?php echo h($b_gata); ?><?php echo h($ikou); ?><?php echo h($other); ?></dd>
            <dt>【イメージ画像】</dt><dd><img src="<?php echo $image;?>" alt="イメージ画像"></dd>
            <dt>【郵便番号】</dt><dd><?php echo h($postcode); ?></dd>
            <dt>【都道府県】</dt><dd><?php echo h($prefecture); ?></dd>
            <dt>【市区町村】</dt><dd><?php echo h($city); ?></dd>
            <dt>【町名など】</dt><dd><?php echo h($town); ?></dd>
            <dt>【ご担当者様氏名】</dt><dd><?php echo h($name); ?></dd>
            <dt>【ご担当者様氏名（カナ）】</dt><dd><?php echo h($name_kana); ?></dd>
            <dt>【E-MAIL】</dt><dd><?php echo h($email); ?></dd>
            <dt>【Password】</dt><dd>パスワードは非表示です</dd>
        </dl>
    </div>
    <ul>
        <li><a href="index.php">戻る</a></li>
    </ul>
    
</body>
</html>