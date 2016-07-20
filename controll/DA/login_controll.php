<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class Login extends Common {
  var $member;
  function __construct(){
    $this->member = $this->model("member");

  }
  public function form(){
    $this->view("loginForm");
  }

  public function loginAction(){
    $id = $this->getPOST("user_id");
    $pw = $this->getPOST("user_pw");
    $member = $this->member->getMemberbyLogin($id, $pw);
    
    if(!empty($member)){
      $_SESSION["user_id"] = $member["user_id"];
      $_SESSION["user_level"] = $member["user_level"];
      $rtn = $this->getJSON("200", $member, $this->MESSAGE["LOGIN_DONE"]);
    }else{
      $rtn = $this->getJSON("900", "", $this->MESSAGE["LOGIN_ERROR"]);
    }
    return $rtn;
  }
}
?>
