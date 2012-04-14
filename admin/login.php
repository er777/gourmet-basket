<?php
session_start();
include_once '_init.php';

$msg = "";

if(isset($_POST["login"]) && $_POST["login"]=="yes") {
   $q = "SELECT user_id,level,user_name FROM users WHERE user_name = '" . $_POST["username"] . "' AND password='" . $_POST["password"] . "'";
   DB::query($q);
   $user = DB::fetch_assoc();
  //exit;
    if($user) {
        //setcookie("authenticated",$_COOKIE['authenticated'],time()+180); 
        $_SESSION["enter"] = "on";
        $_SESSION["l_user_id"] = $user['user_id'];  
        $_SESSION["l_level"] = $user['level'];  
        $_SESSION["l_user_name"] = $user['user_name'];
        header("location: index.php");      
        //exit;  
    }
    else $msg = "<b style='color:red;'>User login incorrect.</b>";
}
DB::close();

include_once("_header.html");
?>
<form name="login" method="post" action="login.php">
<input type="hidden" name="login" value="yes" />
<div align="center">
<table border="0" cellpadding="0" cellspacing="0" style="width:400px; text-align:left">
    <tr>
        <td>
        <img src="images/titles/title_login.jpg" /><br>
        Please enter your user name and password to continue:<br><br>
        <table border="0" cellpadding="4" cellspacing="2">
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="username" size="22" maxlength="32" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" size="22" maxlength="32" /></td>
            </tr>            
            <tr>
                <td>&nbsp;</td>
                <td><input type="image" src="images/btn_login.jpg" /></td>
            </tr>
        </table>
        <?php echo $msg;?>
        </td>
    </tr>
</table>
</div>
</form>
<?php
include_once("_footer.html");
?>
