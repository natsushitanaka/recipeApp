<?php
require_once(__DIR__ .'/../Controller/RecipeController.php');
$recipe = new RecipeController();
$details = $recipe->editAction($_POST['eid'], $_POST['etitle'], $_POST['ebody'], $_POST['ecost']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title><?= $_SESSION['USER']; ?>'s Recipe-<?= h($details['title']); ?></title>
  <link rel="stylesheet" href="edit.css">
</head>
<body>
  <p><?= $recipe->edited; ?></p>
  <h1>My Recipe[編集]</h1>
  <div class="body">
    <form action="" method="post">
      <p>メニュー：<input name="etitle" type="text" value="<?= h($details['title']); ?>"></p>
      <p>原価：<input name="ecost" type="text" value="<?= h($details['cost']); ?>"></p>
      <p>作り方</p>
      <textarea name="ebody"><?= h($details['body']); ?></textarea>
      <input type="hidden" name="eid" value="<?= h($details['id']); ?>"><br>
      <input class="submit" id="submit" type="submit" value="変更する"><br>
    </form>
  </div>
  <a href="recipe.php">BACK</a>
  <a href="menulist.php">MENU LIST</a>
  <a href="keepRecipe.php">HOME</a>
</body>
</head>
