<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class Database extends Common{
  var $conn, $table, $where = "", $field = "*", $result;
  function __construct(){
    $this->conn = mysql_connect(DB_HOST, DB_USER, DB_PWD);
    if(!$this->conn){
      $this->error(500);
    }

    if(!mysql_select_db(DB_NAME, $this->conn)){
        echo $this->error(501);
        exit;
    }
    @mysql_query("set session character_set_connection=" . DB_CHARSET . ";");
    @mysql_query("set session character_set_results=" . DB_CHARSET . ";");
    @mysql_query("set session character_set_client=" . DB_CHARSET . ";");
  }

  function __destruct(){
  }

  public function execute($sqlString = ""){
    $this->result = mysql_query($sqlString, $this->conn);
    if(!$this->result){
      $this->error(000, mysql_error());
    }else{
      return $this->result;
    }
  }

  public function select($table){
    $sqlString = "";
    if($this->field != ""){
      $sqlString = "SELECT " . $this->field . " FROM $table";
    }
    if($this->where != ""){
      $sqlString .= $this->where;
    }
    $this->result = $this->execute($sqlString);
    $rtn = Array();
    while($row = mysql_fetch_array($this->result, MYSQL_ASSOC)){
      $rtn[] = $row;
    }
    return $rtn;
  }

  public function where($array){
    $where = "";
    $i = 1 ;
    foreach($array as $key => $val){
      $where .= " $key = '$val' " . ($i != count($array) ? " AND " : "" );
    }
    if($where != ""){
      $this->where = " WHERE " . $where;
    }
  }

}

?>
