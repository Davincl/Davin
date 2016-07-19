<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}


if(file_exists(LIB . "/class.common.php")){
    include_once(LIB . "/class.common.php");
}

$DA = (Object) array();
$DA->Common = classload(LIB . "/class.common.php", "Common");
$DA->Router = classload(LIB . "/class.router.php", "Router");
$DA->DB = classload(LIB . "/class.db.php", "Database");

$DA->Router->setPathSource();
// // Default lib
// $core = Array("Menu", "Member", "Information");
// $system = Array();
// for($i = 0 ; $i < count($core) ; $i++){
//   if(file_exists(LIB . "/class." . $core[$i] . "." . EXT)){
//     include_once(LIB . "/class." . $core[$i] . "." . EXT);
//     // $newClass = new $core[$i]();
//     // $system[$core[$i]] = $newClass;
//   }
// }

?>
