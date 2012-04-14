<?php
$page = "administrators";
include_once("_header.php");


if(isset($_GET["cmd"]) && $_GET["cmd"] == "delete") {
    $qry = "DELETE FROM users WHERE user_id = " . $_GET["uid"];
    DB::execute($qry);
    //header("location: administrators.php");
   // exit;
}
?>
<table border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td><img src="images/titles/title_administrators.jpg" /><br></td>
    </tr>
    <?php
    if(!isset($_GET["cmd"])) {
    ?>
    <tr>   
        <td>
        <br>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td>List of administrator to this section:</td>
                <td align="right" width="250"><a href="administrators.php?cmd=add" style="text-decoration:none;color:Gray;"><img src="images/add.png" width="16"/> Add an administrator</a></td>
            </tr>
        </table>
        <table style="width:650px;" border="0" cellpadding="2" cellspacing="2">
            <tr style="font-size:8pt; background:lightblue; color:black;">
                <th>User ID</th>
                <th>User Name</th>
                <th>Password</th>
                <th>E-mail</th>     
            </tr>
            <?php
            $query = "SELECT * FROM users Where level='admin'";  
            $pages = pagin_top(10,$query);
            $query = $query . ' ' . $pages->limit;
            DB::query($query);
            $b = 0;
            while ($row = DB::fetch_row()) {
                $bgcolor = "#FFFFFF";
                if(($b%2)==0) $bgcolor = "#E0E0E0";
                ?>
            <tr bgcolor="<?php echo $bgcolor;?>">
                <td><?php echo $row["user_id"]; ?></td>
                <td><a href="administrators.php?cmd=edit&uid=<?php echo $row["user_id"]; ?>"><?php echo $row["user_name"]; ?></a></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["email"]; ?></td>     
            </tr>
            <?php  
            $b++;  
            }
            ?>
            </tr>
        </table>
        <?php  pagin_bottom($pages) ?>   
        </td>
    </tr>
    <?php } 
    else {
        $post_type = "add"; 
        $user_id = "";
        $username = "";
        $password = "";
        $email = "";
        $msg = "";
        switch($_GET["cmd"]) {
            case "add": 
                if(isset($_POST["post_type"])) {
                    switch($_POST["post_type"]){
                        case "add": 
                            $qry = "INSERT INTO users
                                SET user_name = '" . $_POST["username"] . "',
                                password = '" . $_POST["password"] . "',
                                email = '" . $_POST["email"] . "',  
                                level = 'admin'";
                            DB::execute($qry);
                            DB::query("SELECT * FROM users ORDER BY user_id DESC LIMIT 1");
                            while ($row = DB::fetch_row()) {
                                $user_id = $row["user_id"];
                                $username = $row["user_name"];
                                $password = $row["password"];
                                $email = $row["email"];
                            }                                                    
                            $post_type = "update";
                            $msg = "<b style=\"color:green\">User saved OK</b>";
                            break;
                    }
                }
                break;
            case "edit":
                $user_id = "";
                if(isset($_GET["uid"]) )
                    $user_id = $_GET["uid"];
                else
                    $user_id = $_POST["user_id"];
                $post_type = "update";
                if(isset($_POST["post_type"])) {
                    switch($_POST["post_type"]){
                        case "update":
                            $qry = "UPDATE users
                                SET user_name = '" . $_POST["username"] . "',
                                email = '" . $_POST["email"] . "',
                                password = '" . $_POST["password"] . "'
                                WHERE user_id = " . $_POST["user_id"];
                            DB::execute($qry);
                            $post_type="update";
                            $user_id = $_POST["user_id"];
                            $msg = "<b style=\"color:green\">User updated OK</b>";   
                            break;
                    }
                }       
                DB::query("SELECT * FROM users WHERE user_id = " . $user_id);
                while ($row = DB::fetch_row()) {
                    $user_id = $row["user_id"];
                    $username = $row["user_name"];
                    $password = $row["password"];
                    $email = $row["email"];
                }                                                                    
            break;
        }
        ?>
            
        <form name="frmAdmin" method="post" action="administrators.php?cmd=<?php echo $_GET["cmd"];?>">
        <input type="hidden" name="post_type" value="<?php echo $post_type;?>" />
        <input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
        <tr>
            <td>
            <br>
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
                <tr>
                    <td>Complete the form below to <?php echo $post_type;?> an administrator:</td>
                    <td align="right"><a href="administrators.php" style="text-decoration:none;color:Gray;"><img src="images/arrow_back.png"> Back to administrators</td>
                </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="2" style="width:400px;">
                <tr>
                    <td>User Name:</td>
                    <td align="center"><input type="text" size="32" maxlength="32" name="username" id="username" value="<?php echo $username;?>" /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td align="center"><input type="password" size="32" maxlength="32" name="password" id="password" value="<?php echo $password;?>" /></td>
                </tr>
                <tr>
                    <td>Confirm&nbsp;Password:</td>
                    <td align="center"><input type="password" size="32" maxlength="32" name="confirm_password" id="confirm_password" value="<?php echo $password;?>" /></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td align="center"><input type="text=" size="32" maxlength="32" name="email" id="email" value="<?php echo $email;?>" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="image" src="images/btn_<?php echo $post_type;?>.jpg" onclick="return check_form();" />&nbsp;
                        <?php
                            if($post_type =="update") {
                                ?>
                                <a href="administrators.php?cmd=delete&uid=<?php echo $user_id; ?>"><img src="images/btn_delete.jpg" border="0"></a>
                                <?php
                            } ?>
                    </td>
                </tr>
            </table>
            <?php echo $msg; ?>
            <script language="javascript">
            <!--//
            function check_form(){
                var strErr = '';
                var oUser = document.getElementById('username');
                var oPass = document.getElementById('password');
                var oConf = document.getElementById('confirm_password');
                var oEmail = document.getElementById('email');
                if(oUser.value=='') strErr += '- User Name\n';
                if(oPass.value=='') strErr += '- Password\n';
                if(oConf.value=='') strErr += '- Confirm Password\n';
                if(oEmail.value=='') strErr += '- E-mail\n';
                if(oPass.value!=oConf.value) strErr = '- Passwords don\'t match';
                if(strErr!=''){
                    alert('Please correct the following:\n' + strErr);
                    return false;
                }
                else return true;
            }
            //-->
            </script>
            </td>
        </tr>
        </form>
        <?php
    }    
    ?>
</table>
<?php
include_once("_footer.php");           
?>