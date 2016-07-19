<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class Login extends Common {

  function form(){
    $this->view("loginForm");
  }
}
?>
