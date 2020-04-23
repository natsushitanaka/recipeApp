<?php
require_once(__DIR__ .'/../Controller/RecipeController.php');
$recipe = new RecipeController();
$menus = $recipe->menulistAction($_SESSION['USER'], $_POST['delete']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>My-menus</title>
  <link rel="stylesheet" href="menulist.css">
</head>
<body>
  <h1><?= $_SESSION['USER']; ?>'s Menus</h1>
  <div class="body">
    <ol type="1">
      <?php foreach($menus as $menu): ?>
      <form action="recipe.php" method="post">
        <li>
          <span><?= h($menu['title']); ?></span>
          <input type="hidden" name="menu" value="<?= h($menu['title']); ?>">
          <input type="submit" value="レシピを見る"></p>
        </li>
      </form>
      <form action="" method="post">
        <input type="hidden" name="delete" value="<?= h($menu['title']); ?>">
        <input type="submit" value="削除">
      </form>
      <?php endforeach; ?>
    </ol>
  </div>
  <a href="keep.php">HOME</a>
</body>
</head>
