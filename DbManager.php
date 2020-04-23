<?php
require_once(__DIR__.'/config.php');

class DbManager
{
  public $_db;

  public function __construct(){
    try {
      $this->_db = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
      $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
    echo $e->getMessage();
    exit;
    }
  }
}
