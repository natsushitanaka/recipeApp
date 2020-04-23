<?php

require_once(__DIR__ . '/../Models/UserRepository.php');

class LoginController
{
  // public $login= '＊ログインしてください。';

  public function __construct()
  {
    $this->_db = new UserRepository();
  }

  public function loginAction($user_name, $password, $logout)
  {
    if(isset($user_name) && isset($password)){
      $this->_db->login($user_name, $password);
    }else{
      $this->login = "＊ログインしてください。";
      return;
    }

    if($this->_db->isLogin($user_name)){
      $_SESSION['USER'] = $user_name;
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/keep.php');
    }else{
      $this->login = "＊ユーザー名またはパスワードが正しくありません。";
    }

    if(isset($logout)){
      $this->_db->logout($logout);
      $_SESSION['USER'] = null;
    }
  }

  public function logoutAction($logout)
  {
    if(isset($logout)){
      $this->_db->logout($logout);
      $_SESSION['USER'] = null;
    }
  }
}
