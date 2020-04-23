<?php
require_once(__DIR__ .'/Models/RecipeRepository.php');
require_once(__DIR__ .'/Models/UserRepository.php');

class Controller
{
  public function home()
  {
    if($_SESSION['USER'] === null){
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
    }
  }
}
