<?php
// Default define
define("MODE", "dev");
define("URI", str_replace("/index.php", "", $_SERVER["REQUEST_URI"]));
define("C_DEF", "Main");
define("DS", "/");
define("EXT", ".php");

// Path Define
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
define("LIB", ROOT . "/lib");
define("C_PATH", ROOT ."/controll");
define("M_PATH", ROOT . "/model");
define("V_PATH", ROOT . "/view");
define("F_PATH", ROOT . "/upload");

// DB define
define("DB_HOST", "localhost");
define("DB_USER", "davin");
define("DB_PWD", "davin123");
define("DB_NAME", "davin");
define("DB_CHARTSET", "UTF-8");

?>
