<?php
$var1 = "";
$var1 .= "SELECT u.*, ";
$var1 .= "       c.`name` AS cname, ";
$var1 .= "       z.`name` AS zname ";
$var1 .= "FROM   users AS u ";
$var1 .= "       LEFT JOIN countries AS c ";
$var1 .= "         ON c.country_id = u.country_id ";
$var1 .= "       LEFT JOIN zone AS z ";
$var1 .= "         ON u.zone_id = z.zone_id ";
$var1 .= "WHERE  u.`level` = 'vendor' ORDER BY u.shop_name " ;
$pages = pagin_top(10,$var1);
$var1 = $var1 . ' ' . $pages->limit;
DB::query($var1);   
?>
<table border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td><img src="images/titles/title_vendors.jpg" /></td>
    </tr>
    <tr>   
        <td>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td>List of Users to this section:</td>  
                 <td align="right" width="250">
                 <a href="vendors.php?user_id=new" style="text-decoration:none;color:Gray;" title="Gourmet Basket - Vendors Editor">
                 <img src="images/add.png" width="16"/> Add Vendors</a>
            </td>              
            </tr>
        </table>
        <input type="hidden" value="row_none" id="prevrowid">        
        <table  class="sortandsearch">
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th> 
                <th>Password</th>
                <th>Business Name</th>
                <th>Address</th>
                <th>City</th>     
                <th>E-mail</th>
                <th>Date Created</th>
            </tr></thead>
            <tbody>
            <?php while ($row = DB::fetch_row()) :?>
            <tr>
                <td><?php echo $row["user_id"]; ?></td>
                <td><a href="vendors.php?user_id=<?php echo $row["user_id"]; ?>"><?php echo $row["user_name"]; ?></a></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["shop_name"]; ?></td>
                <td><?php echo $row["street_address"]; ?></td>
                <td><?php echo $row["city"]." , ".$row["zname"]." , " .$row["zip"]; ?></td>   
                <td><?php echo $row["email"]; ?></td>     
                <td><?php echo $row["create_date"]; ?></td>     
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        <?php  pagin_bottom($pages) ?>   
        </td>
    </tr>
</table>
