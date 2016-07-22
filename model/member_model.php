<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class member_model extends Database {

  function getList() {
     return $this->select(MEMBER);
  }

  function getMemberById($id){
    $this->setWhere(Array(
      "user_id" => $id
    ));
    $member = $this->select(MEMBER);
    return array_pop($member);
  }

  function getMemberByName($name){
    $this->setWhere(Array(
      "user_name" => $name
    ));
    $member = $this->select(MEMBER);
    return array_pop($member);
  }

  function getMemberBySeq($seq){
    $this->setWhere(Array(
      "idx" => $seq
    ));
    $member = $this->select(MEMBER);
    return array_pop($member);
  }

  function getMemberbyLogin($id, $pw){
    $this->setWhere(Array(
      "user_id" => $id,
      "user_pwd" => $this->getPassword($pw)
    ));
    $member = $this->select(MEMBER);
    return array_pop($member);
  }
}

?>
