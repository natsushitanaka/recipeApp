<?php
require_once(__DIR__ .'/../Controller/RecipeController.php');
$recipe = new RecipeController();
$recipe->keepAction($_POST['title'], $_POST['body'], $_POST['cost']);
// var_dump($recipe->keep);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>My-menus</title>
  <link rel="stylesheet" href="keep.css">
</head>
<body>
  <div class="top">
    <p>ログインユーザー：<?= $_SESSION['USER']; ?></p>
    <h1>Welcome to My Recipe Site</h1>
  </div>
  <div class="body">
    <p><?= $recipe->keep; ?></p>
    <form action="" method="post">
      <input class="content" type="text" name="title" placeholder="Menu Title:"><br>
      <input class="content" type="text" name="cost" placeholder="Cost:¥">
      <input class="submit" type="submit" value="追加する"><br>
      <textarea rows="25" cols="30" name="body" placeholder="Recipe:"></textarea><br>
    </form>
    <a href="menulist.php">MENU LIST</a>
    <form action="index.php" method="post">
      <input type="hidden" name="logout" value="<?= $_SESSION['USER']; ?>">
      <input class="submit" type="submit" value="ログアウト"><br>
    </form>
  </div>
</body>
</head>
