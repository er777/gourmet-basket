<div id="content_vendor">
<div class="content_product">
    <a href="products.php?id=all">
    <span>All Products</span>
    <img border="0" class="shop_logo" alt="p" src="images/product/default.png"/>
    </a>
</div>
<?php 
$var1 = "";
$var1 .= "SELECT users.user_id, ";
$var1 .= "       users.business_name, ";
$var1 .= "       users.logo ";
$var1 .= "FROM   users ";
$var1 .= "WHERE  users.`level` = 'vendor' ";
$var1 .= "       AND ( users.business_name <> '' ) " ;
$pages = pagin_top(5, $var1);
$var1 = $var1 . ' ' . $pages->limit;
DB::query($var1);
while ($row = DB::fetch_row()) {
?>
<div class="content_product">
    <a href="products.php?id=<?php echo $row['user_id']; ?>">
    <div style="text-align:center"><?php echo $row['business_name']; ?></div>
    <div style="margin:auto;width:75px;">
    <img border="0" class="shop_logo" alt="p" src="../app/webroot/img/logos/<?php echo $row['logo']; ?>" width="75" height="75"/>
    </div>
    </a>
</div>
<?php } ?>
</div>
<span class="clearfix"></span> 
<?php 
pagin_bottom($pages) 
?>

