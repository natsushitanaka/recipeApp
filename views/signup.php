<?php
require_once(__DIR__ . '/../Controller/SignupController.php');

$signup = new SignupController();
$signup->singupAction();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>signup</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="top">
    <h1>My Recipes</h1>
    <h3>アカウント登録</h3>
  </div>
  <p><?= $signup->singup; ?></p>
  <form action="" method="post">
    <p class="form_content">ユーザー名：<input type="text" name="user_name"></p>
    <p class="form_content">パスワード：<input type="password" name="password"></p>
    <input class="submit" type="submit" value="登録">
  </form>
  <a href="index.php">ログイン画面へ</a>
</body>
</html>
