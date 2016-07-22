<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class Access extends Common {
  public $accType, $model, $user;
  function __construct(){
    if(!empty(INDEX)){
      $accType = "ADMIN";
    }else{
      $accType = "USER";
    }
    if(!empty($_SESSION["user_id"])){
      $this->model = $this->model(MEMBER);
      $this->user = $this->model->getMemberById($_SESSION["user_id"]);
    }else{
      $this->user = Array("user_level" => 0);
    }
  }

  public function loginCheck(){
    if($this->user["user_level"] == 0){
      $this->alert($this->MESSAGE["LOGIN_MSG"], ADMIN_LOGIN);
    }
  }
}

?>
