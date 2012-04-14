<?php
$page = "";
include_once("_header.php");
?>
<div align="center">
<table border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td>
        <img src="images/title_administrator_section.jpg" /><br>
        </td>
    </tr>
    <tr>   
        <td colspan="2">
        <div align="right"><a href="logout.php" style="text-decoration:none;color:gray;"><img src="images/lock_open.png"> Logout</a></div>
        </td>
    </tr>
    <tr>
        <td>
        This section allows you to control the records in the database: <br>
        <br>
        <ul>
            <li><a href="administrators.php" style="text-decoration:underline;color:gray;font-weigth:bold;">Manage administrators</a> of this section</li>
            <li>View / Edit / Delete <a href="vendors.php" style="text-decoration:underline;color:gray;font-weigth:bold;">Users</a> </li>  
            <li>Add / Edit / Delete <a href="categories.php" style="text-decoration:underline;color:gray;font-weigth:bold;">Categories</a></li>
        </ul>   
        </td>
        <td></td>
    </tr>
</table>
</div>
<?php
include_once("_footer.php");
?>
