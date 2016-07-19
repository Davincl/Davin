<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class Router {

  var $PATH = Array(
                    "class" => "",
                    "fun" => "",
                    "page" => ""
                  );
  public function setPathSource(){
    $URI = explode("/", URI);
    $this->PATH["class"] = (!empty($URI[1])) ? $URI[1] : C_DEF ;
    $this->PATH["fun"] = (!empty($URI[2])) ? $URI[2] : "index" ;
    $this->PATH["page"] = (!empty($URI[3])) ? $URI[3] : "1" ;
    $this->getSystem();
  }

  private function getSystem(){
    $FILE = C_PATH . DS . $this->PATH["class"] . PREFIX_CON . "." .  EXT;
    if(file_exists($FILE)){
      include_once $FILE;
    }else {
      echo "[ERROR] Controll File No Such!";
      exit;
    }

    $object = new $this->PATH["class"]();
    if(method_exists($object, "__remap")){
      call_user_func_array(array($object, "__remap"), array($this->PATH));
    }else{
      call_user_func(array($object, $this->PATH["fun"]));
    }
  }

}
?>
