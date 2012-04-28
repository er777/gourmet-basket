
<?php 
$var1 = "";
$var1 .= "SELECT users.user_id, ";
$var1 .= "       users.business_name, ";
$var1 .= "       users.logo ";
$var1 .= "FROM   users ";
$var1 .= "WHERE  users.`level` = 'vendor' ";
$var1 .= "       AND ( users.business_name <> '' ) ORDER BY users.business_name" ;
//$pages = pagin_top(5, $var1);
//$var1 = $var1 . ' ' . $pages->limit;
DB::query($var1);
?>
<a href="products.php?id=all">LIST ALL PRODUCTS FROM ALL VEDORS</a>
<h2>By Vendor</h2>
<table id="vendorTable" class="sortandsearch">
    <thead><tr><th>Company Name</th></tr></thead>
    <tbody>
<?php while ($row = DB::fetch_row()) : ?>
<tr>
    <td>
        <a href="products.php?id=<?php echo $row['user_id']; ?>">
            <?php echo $row['business_name']; ?>
        </a>
    </td>
</tr>
<?php endwhile;?>
</tbody>
</table>
<span class="clearfix"></span> 
<?php 
//pagin_bottom($pages) 
?>

