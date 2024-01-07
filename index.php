<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>事業所様ユーザー登録</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>事業所様ユーザー登録</h1>
    <p class="onegai">ユーザー登録をお願い致します</p>
    <form name="contact" action="write.php" method="post" id="myForm">
        <dl>
            <dt><i class="red">【必須】</i>事業所名：</dt><dd><input type="text" name="jigyousyo" placeholder="事業所名を入力して下さい" class="width-height" required></dd>
            <dt>事業所種別：</dt>
            <dd><input type="checkbox" name="a_gata" id="a_gata">就労継続支援A型
                <input type="checkbox" name="b_gata" id="b_gata">就労継続支援B型
                <input type="checkbox" name="ikou" id="ikou">就労移行支援
                <input type="checkbox" name="other" id="other">その他</dd>
            <dt>郵便番号：</dt><dd><input name="postcode" type="text" placeholder="郵便番号を入力すると、住所が自動入力されます" class="width-height"></dd>
            <dt>都道府県：</dt><dd><input name="prefecture" type="text" placeholder="都道府県" class="width-height"></dd>
            <dt>市区町村：</dt><dd><input name="city" type="text" placeholder="市区町村" class="width-height"></dd>
            <dt>町名など：</dt><dd><input name="town" type="text" placeholder="町名など" class="width-height"></dd>
            <dt><i class="red">【必須】</i>ご担当者様氏名：</dt><dd><input type="text" name="name" placeholder="ご担当者様の氏名を入力して下さい" class="width-height" required></dd>
            <dt><i class="red">【必須】</i>ご担当者様氏名（カナ）：</dt><dd><input type="text" name="name_kana" id="name_kana" placeholder="ご担当者様の氏名のカナをカタカナでご入力下さい" class="width-height" required></dd>
            <p id="errorMessage1"></p>
            <dt><i class="red">【必須】</i>E-MAIL：</dt><dd><input type="email" name="email" placeholder="（例）xxx@gmail.com" class="width-height" required></dd>
            <dt><i class="red">【必須】</i>Password登録：</dt><dd><input type="password" name="password1" id="password1" placeholder="半角英数字記号でご入力下さい" class="width-height" required></dd>
            <p id="result"></p>
            <dt><i class="red">【必須】</i>Password登録（確認用）：</dt><dd><input type="password" name="password2" id="password2" placeholder="上と同じパスワードを入力して下さい" class="width-height" required></dd>
            <p id="errorMessage2"></p>
        </dl>
        <input type="submit" value="送信" id="submit">
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>