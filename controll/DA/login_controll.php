<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class Login extends Common {
  var $member;
  function __construct(){
    parent::__construct();
    $this->member = $this->model("member");
  }
  public function form(){
    global $DA;
    $DA->Access->loginFormCheck();
    $this->view("loginForm");
  }
  public function logout(){
    session_unset();
    $this->alert($this->MESSAGE["LOGOUT_DONE"], ADMIN_LOGIN);
  }
  public function loginAction(){
    $id = $this->getPOST("user_id");
    $pw = $this->getPOST("user_pw");
    $member = $this->member->getMemberbyLogin($id, $pw);

    if(!empty($member) && ($member["user_level"] == 9)){
      $_SESSION["user_id"] = $member["user_id"];
      $_SESSION["user_level"] = $member["user_level"];
      $rtn = $this->getJSON("200", $member, $this->MESSAGE["LOGIN_DONE"]);
    }else{
      $rtn = $this->getJSON("900", "", $this->MESSAGE["LOGIN_ERROR"]);
    }
    echo $rtn;
  }
}
?>
