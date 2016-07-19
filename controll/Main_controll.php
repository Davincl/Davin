<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class Main extends Common{

  public function __remap($path){
    if(method_exists($this, "header")){
      $this->header($path);
    }
    $this->$path["fun"]();
    if(method_exists($this,"footer")){
      $this->footer($path);
    }
  }

  public function index(){
    echo "USER";
  }
}
?>
