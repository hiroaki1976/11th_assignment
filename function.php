<?php
// 共通に使う関数を記述
// XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }

// DB接続
function db_conn() {
  try {
      $db_name = 'tsunagu'; //データベース名
      $db_id   = 'root'; //アカウント名
      $db_pw   = ''; //パスワード：MAMPは'root'
      $db_host = 'localhost'; //DBホスト
      return $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
  } catch (PDOException $e) {
      exit('DB Connection Error:' . $e->getMessage());
  }
}

// SQLエラー関数：sql_error($stmt)
function sql_error($stmt) {
  $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}

// リダイレクト関数: redirect($file_name)
function redirect($file_name) {
  header("Location: $file_name");
  exit();
}

// ログインチェック処理 loginCheck()
function loginCheck() {
  if (  !isset($_SESSION['chk_ssid'])  ||  $_SESSION['chk_ssid']  !==  session_id()  ) {
    exit('LOGIN ERROR');
  } else {
    // ログイン済み処理
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
  }
}
