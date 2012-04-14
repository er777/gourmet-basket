<?php
session_start();
$_SESSION["authenticated"] = false;
$_SESSION["user_id"] = -1;
session_destroy();
header("location: login.php");  
?>
