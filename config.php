<?php
session_start();
// ini_set('display_errors', 1);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
// define('DSN', 'mysql:host=mysql***.xserver.jp;dbname=owazo_myrecipe;charset=utf8');
define('DSN', 'mysql:host=localhost;dbname=MyRecipes;charset=utf8');

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
