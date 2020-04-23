<?php
require_once(__DIR__ .'/../Controller/RecipeController.php');
$recipe = new RecipeController();
$recipe->recipeAction($_POST['menu']);
$details = $recipe->getDetailAction($_SESSION['menu']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title><?= $_SESSION['USER']; ?>'s Recipe-<?= h($details['title']); ?></title>
  <link rel="stylesheet" href="recipe.css">
</head>
<body>
  <h1><?= $_SESSION['USER']; ?>'s Recipe</h1>
  <p>メニュー：<?= h($details['title']); ?></p><p>原価：￥<?= h($details['cost']); ?></p>
  <p>～～作り方～～</span></p>
  <p><?= h($details['body']); ?></p>
  <form action="edit.php" method="post">
      <input type="hidden" name="edit" value="<?= h($details['title']); ?>">
      <input type="submit" value="レシピを変更する">
  </form>
  <a href="menulist.php">MENU LIST</a>
  <a href="keep.php">HOME</a>
</body>
</head>
