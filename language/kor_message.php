<?php
if(realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)){ exit('No direct script access allowed');}
$LANG["LOGIN_DONE"] = "로그인 되었습니다.";
$LANG["LOGIN_ERROR"] = "아이디 / 비밀번호를 확인하시기 바랍니다.";
$LANG["LOGIN_MSG"] = "로그인 후에 가능합니다.";

//Code Errro;
$LANG["ERR_500"] = "데이터베이스 접속 오류 입니다.";
$LANG["ERR_501"] = "데이터베이스의 이름이 존재하지 않습니다.";
?>
