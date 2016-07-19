<?php
/*******************************************************************************************************
 * Direct Access limit
*******************************************************************************************************/
if(basename($_SERVER['PHP_SELF']) == basename(__FILE__)){ @Header("HTTP/1.0 404 Not Found");exit;}

/*******************************************************************************************************
 * Header Define
*******************************************************************************************************/
header('Content-Type:text/html;charset=utf-8');
header('P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');
date_default_timezone_set("Asia/Seoul");

/*******************************************************************************************************
 * Log Reporting for Print
*******************************************************************************************************/
//ERROR_REPORTING(0); // 모든 보고 끔
//ERROR_REPORTING(E_ALL ^ E_NOTICE); // 경고 제외 모든 오류 보고
//ERROR_REPORTING(E_ERROR | E_WARNING | E_PARSE);
// ERROR_REPORTING(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
/*******************************************************************************************************
 * Session Setting
*******************************************************************************************************/

session_start();  // Session Start
@set_time_limit(0);
session_save_path($_SERVER['DOCUMENT_ROOT']."/session");

/*******************************************************************************************************
 * Default Function
*******************************************************************************************************/
function classload($path, $core){
  if(file_exists($path)){
    include_once($path);
    $newClass = new $core();
    return $newClass;
  }
}

/*******************************************************************************************************
 * Parameters
*******************************************************************************************************/
// Default define
define("MODE", "dev");
define("URI", ($_SERVER['REQUEST_URI'] != "/") ? str_replace(INDEX, "", $_SERVER['REQUEST_URI']) : null);

// File Define
define("C_DEF", "Main");
define("EXT", "php");
define("V_EXT", "html");
define("PREFIX_CON", "_controll");
define("PREFIX_VIEW", "_view");
define("PREFIX_MODEL", "_model");

// Path Define
define("DS", "/");
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
define("LIB", ROOT . DS . "lib");
define("C_PATH", ROOT . DS . "controll");
define("M_PATH", ROOT . DS . "model");
define("V_PATH", ROOT . DS . "view");
define("F_PATH", ROOT . DS . "upload");
define("L_PATH", ROOT . DS . "language");
define("LANG", "kor");

// DB define
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_NAME", "IoE");
define("DB_PWD", "SmartHKMySQL2014");
define("DB_PORT", "3306");
define("DB_CHARSET", "utf8");

// DB Table
define("MEMBER", "member_info");
define("MENU", "menu");
define("BOARD", "board");
define("SITE", "site");



?>
