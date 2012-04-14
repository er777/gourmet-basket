<table width="100%" border="0" cellpadding="4" cellspacing="4">
    <tr>
        <td>List of current Products:</td>
        <td align="right">
        <a href="utils/products/iuproduct.php?product_id=new&user_id=<?php echo ((isset($_GET['id']) && $_GET['id']!='all')?$_GET['id']:($_SESSION["l_level"]=='admin'?'admin':'')); ?>&url=<?php echo urlencode($_SERVER['REQUEST_URI']) ?>" class="add" title="Gourmet Basket - Product Editor" onclick="Modalbox.show(this.href, {title: this.title, width:665, height: 470, aspnet: false}); return false;">
        <img src="images/add.png" width="16"/> Add Product</a>
        </td>
        <!--<td align="right">[&nbsp;<a href="utils/tab_product1.php?user_id=<?php echo $_SESSION["l_user_id"]; ?>" title="Gourmet Basket - Product Editor">Create New Product</a>&nbsp;]</td>-->
    </tr>
    <tr>
        <td align="right" colspan="2">
<form method="get" action="products.php" name="f_search" id="f_search">
  <fieldset>
    <legend>Search Products:</legend>
<table class="t_search">
<tr>
	<td>
    <?php if($_SESSION["l_level"] == 'admin'){ ?>
    <label>Select Vendor:</label> 
    <select name="id" id="id">
    <option value="all">Select</option>
    <?php echo DB::db_options("SELECT `user_id`, `business_name` FROM `users` Where level='vendor' order by `user_id`") ?>
    </select>        
    <?php } ?>   
    </td>
	<td>
 <label>Product Name:</label> 
 <input type="text" name="prod_name" id="prod_name" size="32" maxlength="32" value="<?php //echo $prod_name; ?>"/>
                                        
    </td>
	<td>
    <input type="submit" value="Search"/>
    
    </td>
</tr>
</table>
  </fieldset>
</form>
        </td>
     </tr>    
</table>
<style>
.tabledata tr{
    cursor: default;
}
</style>
<table width="100%" border="0" cellpadding="4" cellspacing="4">
    <tr>
        <td>
            <table class="tabledata" style="width:850px;" border="0" cellpadding="2" cellspacing="2">
                <tr style="font-size:8pt; background:lightblue; color:black;">
                    <th>ID#</th> 
                    <th>Owner</th> 
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Image</th> 
                    <th>Delete</th>                                                     
                </tr>
                <?php
                $var1 = "";
                $var1 .= "SELECT DISTINCT p.product_id, ";
                $var1 .= "       u.user_id, ";
                $var1 .= "       u.user_name, ";
                $var1 .= "       p.product_name, ";
                $var1 .= "       p.description, ";
                $var1 .= "       IF(p.image = '','default.png',p.image) as image, ";
                $var1 .= "       c.category_name, ";
                $var1 .= "       p.stock ";
                $var1 .= "FROM   products p ";
                $var1 .= "       INNER JOIN users u ";
                $var1 .= "         ON u.user_id = p.user_id ";
                $var1 .= "       LEFT JOIN categories c ";
                $var1 .= "         ON p.category_id = c.category_id ";
                $var1 .= "       LEFT JOIN subcategories s ";
                $var1 .= "         ON p.subcategory_id = s.subcategory_id ";
                $var1 .= "       LEFT JOIN sub_subcategories ssc ";
                $var1 .= "         ON ssc.subcategory_id = s.subcategory_id ";
                if($_SESSION["l_level"] == 'vendor'){
                 $var1 .= "         Where u.user_id='" . $_SESSION["l_user_id"] . "' ";
                }else{
                if($userid)
                     $var1 .= "" . ($userid=='all' ? " Where u.user_id > 0 " : " Where u.user_id = '" . $userid . "' ");
                }
                if($prod_name != '')
                     $var1 .= "         AND (p.product_name like '%" . $prod_name . "%' or p.description LIKE '%" . $prod_name . "%' ) ";
                
                $var1 .= "         Order By u.user_id asc ";  
                
                
                $pages = pagin_top(10, $var1);
                $var1 = $var1 . ' ' . $pages->limit;
                DB::query($var1);
                //echo $var1;
                
                $b = 0;
                while ($row = DB::fetch_row()) {
                    $bgcolor = ($b % 2 == 0) ? "#F0F0F0" : "#E0E0E0";
                    $bgcolor_op = ($b % 2 == 0) ? "#E0E0E0" : "#F0F0F0";
                    ?>
                    <tr bgcolor="<?php echo $bgcolor; ?>"                        
                        id="row_<?php echo $row["product_id"]; ?>" 
                        onmouseover="switchClass('row_<?php echo $row["product_id"]; ?>', '<?php echo $bgcolor_op; ?>');"
                         >   
                        <td><?php echo $row["product_id"]; ?></td>                                     
                        <td><?php echo $row["user_name"]; ?></td>
                        <td>
                        <a href="#" onclick="javascript:Modalbox.show('utils/products/iuproduct.php?product_id=<?php echo $row["product_id"]; ?>&user_id=<?php echo $row["user_id"]; ?>&url=<?php echo urlencode($_SERVER['REQUEST_URI']) ?>', {title: 'Gourmet Basket - Product Editor', width: 704, height: 576, aspnet: false}); return false;"">
                        <?php echo $row["product_name"]; ?></a>
                        </td> 
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo $row["category_name"]; ?></td>
                        <td><?php echo $row["stock"]; ?></td>
                        <td><?php echo "<img src='images/product/" . $row["image"] . "' width=50 height=50 />"; ?></td>
                        <td align="center">
                        <a href="utils/products/iuproduct.php?cmd=delete&pid=<?php echo $row["product_id"]; ?>&url=<?php echo urlencode( $_SERVER['REQUEST_URI'] ) ?>">
                            <img src="images/del.jpg" height="15" border="0"/>
                        </a>
                        </td>
                    </tr>
                <?php $b++;
            } ?>
            </table>
            <?php pagin_bottom($pages) ?>  
        </td>
    </tr>
</table>   