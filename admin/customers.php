<?php
$page = "costumers";
include_once("_header.php");

?>
<div align="center">
<table class="overrow" border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td>
         <img src="images/titles/title_costumers.jpg" /><br>
        </td>
    </tr>
    <tr>   
        <td>
        <br/>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td>List of Customers:</td>  
                 <td align="right" width="250">
                 <a href="iuvendor.php" style="text-decoration:none;color:Gray;" title="Gourmet Basket - Vendors Editor">
                 <img src="images/add.png" width="16"/> Add Customers</a></td>              
            </tr>
        </table>
        <input type="hidden" value="row_none" id="prevrowid">        
        <table  class="overrow tabledata" style="width:800px;" border="0" cellpadding="2" cellspacing="2">
            <tr style="font-size:8pt; background:lightblue; color:black;">
                <th>User ID</th>
                <th>User Name</th> 
                <th>Password</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>City</th>     
                <th>E-mail</th>
                <th>Date Created</th>
            </tr>
            <?php
            $query = "SELECT *,concat(firstname, '', lastname) as name FROM members Where member_id >= 0 ";//
            $var1 = "";
            $var1 .= "SELECT m.member_id, ";
            $var1 .= "       concat(m.firstname, '', m.lastname) as name, ";
            $var1 .= "       m.email, ";
            $var1 .= "       m.password, ";
            $var1 .= "       m.username, ";
            $var1 .= "       m.phone, ";
            $var1 .= "       m.date_added, ";
            $var1 .= "       ma.address, ";
            $var1 .= "       ma.city, ";
            $var1 .= "       ma.postcode ";
            $var1 .= "FROM   members AS m ";
            $var1 .= "       INNER JOIN members_address AS ma ";
            $var1 .= "         ON m.address_id = ma.address_id " ;

            
            $pages = pagin_top(10, $var1);
            $var1 = $var1 . ' ' . $pages->limit;
            DB::query($var1);   
            $b = 0;
            $bgcolor_op = "#F0F0F0";
            while ($row = DB::fetch_assoc()) {
                $bgcolor    = ($b%2==0)?"#F0F0F0":"#E0E0E0"; 
                $bgcolor_op = ($b%2==0)?"#E0E0E0":"#F0F0F0"; 
            ?>
            <tr 
            bgcolor="<?php echo $bgcolor;?>"
            id="row_<?php echo $row["member_id"]; ?>" 
            onmouseover="switchClass('row_<?php echo $row["member_id"]; ?>', '<?php echo $bgcolor_op; ?>');" 
            >
                <td><?php echo $row["member_id"]; ?></td>
                <td><a href="vendors.php?cmd=edit&uid=<?php echo $row["member_id"]; ?>"><?php echo $row["username"]; ?></a></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["city"]." , " .$row["postcode"]; ?></td>   
                <td><?php echo $row["email"]; ?></td>     
                <td><?php echo $row["date_added"]; ?></td>     
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
</table>
</div>
<?php
include_once("_footer.php");
?>
