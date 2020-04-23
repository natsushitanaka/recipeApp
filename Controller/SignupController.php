<?php
require_once(__DIR__ . '/../Models/UserRepository.php');

class SignupController
{
  public $signup = '';

  public function __construct()
  {
    $this->_db = new UserRepository();
  }

  public function singupAction()
  {
    if(empty($_POST['user_name']) || empty($_POST['password']) ||
        empty($_POST['user_name']) && empty($_POST['password'])
      ){
      $this->singup = "＊ユーザー名・パスワードを入力してください。";

    }elseif(!$this->_db->isUnique($_POST['user_name'])){
      $this->singup = "＊そのユーザー名またはパスワードは使用できません。";

    }else{
      $this->_db->addUser($_POST['user_name'], $_POST['password']);
      $this->singup = "＊アカウント登録ができました。ログインしてください。";
    }
  }

}
