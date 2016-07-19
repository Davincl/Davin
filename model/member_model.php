<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class member_model extends Database {

  function getList() {
     return $this->select(MEMBER);
  }

  function getMemberById($id){
    $this->where(Array(
      "user_id" => $id
    ));
    $member = $this->select(MEMBER);
    return array_pop($member);
  }

  function getMemberByName(){
  }

  function getMemberBySeq(){
  }
}

?>
