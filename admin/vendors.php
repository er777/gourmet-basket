<?php

$page = "vendors";

include_once("_header.php");

if ($_SESSION['l_level'] != 'admin'){
    //header("/admin/index.php");
    //exit;
}
    

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : NULL;
$user_vendor = NULL;
if (!$user_id && $_SESSION["l_user_id"] != '' && $_SESSION['l_level']=='vendor') {
    $user_vendor = $_SESSION["l_user_id"];
    $user_id = $user_vendor;
}
/* Delete user  */

if (isset($_GET["cmd"]) && $_GET["cmd"] == "delete") {
    deleteData('users', 'user_id', $_GET["uid"], 'vendors.php');
}

if ($user_id) {
    include 'utils/vendors/iuvendor.php';
} else {
    include 'utils/vendors/listvendors.php';
}
include_once("_footer.php");
?>