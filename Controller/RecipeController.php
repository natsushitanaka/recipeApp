<?php
require_once(__DIR__ .'/../Models/RecipeRepository.php');

class RecipeController
{
  public $keep;
  public $edited;

  public function __construct()
  {
    $this->_db = new RecipeRepository();
    $this->home();
  }

  public function home()
  {
    if($_SESSION['USER'] === null){
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
    }
  }

  public function keepAction($title, $body, $cost)
  {
    if(!empty($title) && !empty($body) && !empty($cost)){
      $this->_db->onMenus($_SESSION['USER'], $title, $body, $cost);
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/keep.php');
    }else{
      $this->keep = "＊すべての項目を記入してください。";
    }
  }

  public function menulistAction($user_name, $menu)
  {
    if(isset($_POST['delete'])){
      $this->_db->deleteMenu($menu);

      return $this->_db->getAllMenus($user_name);
    }
    return $this->_db->getAllMenus($user_name);
  }

  public function recipeAction($title)
  {
    if(isset($title)){
      $_SESSION['menu'] = $title;
    }
  }

  public function editAction($id, $title, $body, $cost)
  {
    if(isset($title) &&
        isset($body) &&
        isset($cost))
    {
      $this->_db->editMenu($id, $title, $body, $cost);
      $this->edited = "＊変更されました。";

      return $this->_db->getDetail($_SESSION['USER'], $title);
    }else{
      return $this->_db->getDetail($_SESSION['USER'], $_SESSION['menu']);
    }
  }

  public function getDetailAction($title)
  {
    return $this->_db->getDetail($_SESSION['USER'], $title);
  }



}
