<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

if(file_exists(LIB . DS . "class.common.php")){
    include_once(LIB . DS . "class.common.php");
}

if(file_exists(L_PATH . DS . LANG . "_message.php")){
  include_once L_PATH . DS . LANG . "_message.php";
}else{
  echo "No Search Language File!!";
  exit;
}

$DA = (Object) array();
// Default Common Class
$DA->Common = classload(LIB . DS . "class.common.php", "Common");
// Database Class
$DA->DB = classload(LIB . DS . "class.db.php", "Database");
// Menu Class
$DA->Menu = classload(LIB . DS . "class.menu.php", "Menu");
// Access Check Class
$DA->Access = classload(LIB . DS . "class.access.php", "Access");

// URI System Class
$DA->Router = classload(LIB . DS . "class.router.php", "Router");


$DA->Router->setPathSource();
?>
