<?php
require_once(__DIR__ . '/../Controller/LoginController.php');
$login = new LoginController();
$login->loginAction($_POST['user_name'], $_POST['password'], $_POST['logout']);
$login->logoutAction($_POST['logout']);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="top">
    <h1>My Recipes</h1>
    <h3>ログイン画面</h3>
  </div>
  <p><?= $login->login; ?></p>
  <form action="" method="post">
    <p class="form_content">ユーザー名：<input type="text" name="user_name"></p>
    <p class="form_content">パスワード：<input type="password" name="password"></p>
    <input class="submit" type="submit" value="ログイン">
  </form>
  <a href="signup.php">アカウント登録</a>
</body>
</html>
