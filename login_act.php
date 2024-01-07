<?php 
session_start();

//POST値を受け取る
$email = $_POST['email'];
$password = $_POST['password'];

//1.  DB接続します
require_once('function.php');
$pdo = db_conn();

//2. データ登録SQL作成
// gs_bm_tableに、IDとPWがあるか確認する。
// $stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE email = :email AND password = :password;');
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE email = :email;'); // PasswordをHash化している場合はこちらのSELECT文を使う
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
// $stmt->bindValue(':password', $password, PDO::PARAM_STR); // PasswordをHash化している場合は不要
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status === false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

if($val['id'] != '' && password_verify($password, $val['password'])){ // PasswordをHash化している場合はこっちのIFを使う
// if( $val['id'] != ''){
    //Login成功時 該当レコードがあればSESSIONに値を代入
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    header('Location: kanri.php');
}else{
    //Login失敗時(Logout経由)
    header('Location: login.php');
    
}

exit();
?>