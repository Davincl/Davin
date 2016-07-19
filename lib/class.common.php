<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}

class Common {

  public $MESSAGE;

  public function view($viewName, $data = []){
    if(file_exists(V_PATH . DS . $viewName . PREFIX_VIEW . '.' . V_EXT)){
      include(V_PATH . DS . $viewName . PREFIX_VIEW . '.' . V_EXT);
    }else{
      echo "No Search View File";
      exit;
    }
  }

  public function model($modelName){
    if(file_exists(M_PATH . DS . $modelName . PREFIX_MODEL . '.' . EXT)){
      include(M_PATH . DS . $modelName .  PREFIX_MODEL . '.' . EXT);
      $modelClass = $modelName . PREFIX_MODEL;
      return new $modelClass();
    }else{
      echo "No Search Model File!!";
      exit;
    }
  }

  public function alert($msg = "", $url = ""){

    echo "<script type='text/javascript'>";
    if($msg != ""){
      echo "alert('" . $msg . "');";
    }
    if($msg != ""){
      echo "location.href='" . $url . "'";
    }else{
      echo "history.back(-1);";
    }
    echo "</script>";
  }

  public function getJSON($code, $data, $msg="") {
      $json['code'] = $code;
      $json['msg'] = $msg;
      $json['data'] = $data;
      if ($code == "200" && $data = false) $json['code'] = "900";
      header('Content-Type: application/json'); // Prototype은 이 해더값을 근거로 responseJSON에 객체를 자동으로 할당하기 때문입니다.
      return json_encode($json);                // 특정 변수나 배열을 받아와 JSON 인코드 문자열로 변환하는 함수인 json_encode
                                                // JSON 인코드 문자열을 받아서 PHP 변수로 변환하는 json_decode가 있습니다.
  }

  public function getPOST($name) {
      if(isset($_POST[$name])) {
        if(is_array($_POST[$name])){
          $value = $_POST[$name];
        }else{
          $value = addslashes(trim( $_POST[$name] )); //trim : 문자열의 처음과 끝에 있는 공백을 지운다.
        }
      } else {
          $value = "";
      }
      return $value;
  }

  public function getGET($name) {
      if(isset($_GET[$name])) {
          $value = trim( $_GET[$name] );
      } else {
          $value = "";
      }
      return addslashes($value);
  }

  public function getAddDate($format, $days, $dateStr = '') {
      if ($dateStr == '') {
          //  현재날짜에 넘겨진 인자만큼 더한다.
          return date($format, mktime(0, 0, 0, date("m"), date("d") + $days, date("Y")));
      } else {
          $a = explode('-', $dateStr); //년,월,일 구별
          //  $dateStr에 념겨진 인자만큼 더한다.
          return date($format, mktime(0, 0, 0, $a[1], $a[2] + $days, $a[0]));
      }
  }

  public function encrypt($data) {
    // $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    // $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    // $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, KEY, $data, MCRYPT_MODE_CBC, $iv);
    // $ciphertext = $iv . $ciphertext;
    $ciphertext_base64 = base64_encode($data);

    return $ciphertext_base64;
  }

  public function decrypt($data) {
    $ciphertext_dec = base64_decode($data);
    // $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    // $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    // $ciphertext_dec = substr($ciphertext_dec, $iv_size);
    // $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, KEY, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);

    return $ciphertext_dec;
  }

  public function language(){

    if(file_exists(L_PATH . DS . LANG . "_message.php")){
      include_once L_PATH . DS . LANG . "_message.php";
      $this->MESSAGE = $LANG;

    }else{
      echo "No Search Language File!!";
    }
  }

  public function error($errCode, $msg = ""){
    $this->language();
    if(!empty($this->MESSAGE["ERR_" . $errCode])){
      echo $this->MESSAGE["ERR_" . $errCode];
    }else{
      if($msg == ""){
        echo "System Error!!";
      }else{
        echo $msg;
      }
    }
    exit;
  }

  public function classload($path, $core){
    if(file_exists($path)){
      include_once($path);
      $newClass = new $core();
      return $newClass;
    }
  }

}
?>
