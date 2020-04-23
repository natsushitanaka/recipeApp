<?php
require_once(__DIR__.'/../DbManager.php');

class RecipeRepository extends DbManager
{
  public function onMenus($user_name, $title, $body, $cost)
    {
    $sql = "insert into menus(user, title, body, cost) values(:user, :title, :body, :cost)";
    $stmt = $this->_db->prepare($sql);
    $stmt->execute([
      ':user' => $user_name,
      ':title' => $title,
      ':body' => $body,
      ':cost' => $cost,
    ]);
  }

  public function getAllMenus($user_name)
  {
    $sql = "select * from menus where user = :user order by id";
    $stmt = $this->_db->prepare($sql);
    $stmt->execute([
      ':user' => $user_name,
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getDetail($user, $title)
  {
    $sql = "select * from menus where user = :user and title = :title";
    $stmt = $this->_db->prepare($sql);
    $stmt->execute([
      ':user' => $user,
      ':title' => $title
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function editMenu($id, $title, $body, $cost)
    {
      $sql = "update menus set
          title = :title,
          body = :body,
          cost = :cost
          where id = :id
      ";
      $stmt = $this->_db->prepare($sql);
      $stmt->execute([
        ':id' => $id,
        ':title' => $title,
        ':body' => $body,
        ':cost' => $cost,
      ]);
    }

  public function deleteMenu($title)
    {
      $sql = "delete from menus where title = :title";

      $stmt = $this->_db->prepare($sql);
      $stmt->execute([
        ':title' => $title,
      ]);
    }

}
