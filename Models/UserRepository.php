<?php
require_once(__DIR__ . '/../DbManager.php');

class UserRepository extends DbManager
{
  public function isUnique($user_name)
  {
    $sql = "select count(id) as count from user where user_name = :user_name";

    $stmt = $this->_db->prepare($sql);
    $stmt->execute([':user_name' => $user_name]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['count'] === '0'){
        return true;
    }
        return false;
  }

  public function addUser($user_name, $password)
  {
    $sql = "insert into user(user_name, password, status) values(:user_name, :password, :status)";
    $stmt = $this->_db->prepare($sql);
    $stmt->execute([
      ':user_name' => $user_name,
      ':password' => $password,
      ':status' => 1,
    ]);
  }

  public function isLogin($user_name)
  {
    $sql = "select status from user where user_name = :user_name";
    $stmt = $this->_db->prepare($sql);
    $stmt->execute([
      ':user_name' => $user_name,
    ]);
    $status = $stmt->fetch(PDO::FETCH_ASSOC);
    if($status['status'] === '0'){
        return true;
    }
        return false;
  }

  public function login($user_name, $password)
  {
    $sql = "select user_name, password from user where user_name = :user_name";
    $stmt = $this->_db->prepare($sql);
    $stmt->execute([
      ':user_name' => $user_name,
    ]);
    $status = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user_name === $status['user_name'] &&
        $password === $status['password']){
      $sql = "update user set status=0 where user_name = :user_name";
      $stmt = $this->_db->prepare($sql);
      $stmt->execute([
        ':user_name' => $user_name,
      ]);
    }
  }

  public function logout($user_name)
  {
    $sql = "update user set status=1 where user_name = :user_name";
    $stmt = $this->_db->prepare($sql);
    $stmt->execute([
      ':user_name' => $user_name,
    ]);
  }
}
