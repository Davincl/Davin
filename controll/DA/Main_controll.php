<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class Main extends Common {
  function __construct(){
    parent::__construct();
    global $DA;
    $DA->Access->loginCheck();
  }
  public function __remap($path){
    if(method_exists($this, "header")){
      $this->header($path);
    }
    if(method_exists($this, "left")){
      $this->left($path);
    }
    $this->$path["fun"]();
    if(method_exists($this,"footer")){
      $this->footer($path);
    }
  }

  public function header(){
    $this->view("header");
  }
  public function left(){
    $this->view("left");
  }
  public function index(){
    $this->view("main");
  }
  public function footer(){
    $this->view("footer");
  }
}
?>
