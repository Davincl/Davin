<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class Access extends Database {
  var $accType;
  function __construct(){
    if(!empty(INDEX)){
      $accType = "ADMIN";
    }else{
      $accType = "USER";
    }
  }

  public function loginCheck(){
    print_r($_SESSION);
  }
}

?>
