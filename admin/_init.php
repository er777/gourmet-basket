<?php
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . DIRECTORY_SEPARATOR . "_include" . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "main.php");
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . DIRECTORY_SEPARATOR . "_include" . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "options.php");
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . DIRECTORY_SEPARATOR . "_include" . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "db.php");
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . DIRECTORY_SEPARATOR . "_include" . DIRECTORY_SEPARATOR . "lib"    . DIRECTORY_SEPARATOR . "db.php");
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . DIRECTORY_SEPARATOR . "_include" . DIRECTORY_SEPARATOR . "lib"    . DIRECTORY_SEPARATOR . "quick_csv_import.php");
include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "." . DIRECTORY_SEPARATOR . "_include" . DIRECTORY_SEPARATOR . "lib"    . DIRECTORY_SEPARATOR . "class.ajaxdatagrid.php");
include_once("utils/functions.php");
include_once("utils/paginator.class.php");
error_reporting(2047);
ini_set("display_errors", 1);
DB::connect();
/*
t_var($_SESSION);
/*exit;*/

?>
