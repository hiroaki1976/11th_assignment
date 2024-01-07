<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form name="login-form" action="login_act.php" method="post" id="myForm">
        <dl>
            <dt>E-mail:</dt><dd><input type="email" name="email" id="email" class="width-height"></dd>
            <dt>Password:</dt><dd><input type="password" name="password" id="password" class="width-height"></dd>
        </dl>
        
        <input type="submit" value="ログイン" id="submit">
    </form>
    <p class="shinki-touroku">新規ユーザー登録は<a href="index.php">こちら</a></p>
</body>
</html>