<?php
$page = "orders";
include_once("_header.php");

if(isset($_POST['search_o']))
{
    if(isset($_POST['id']))
    {
        $list = $_POST['id'];
        $param = $_POST['param'];
        switch($list)
        {
            case 1:
                $query = "SELECT o.*, os.name AS status, ot.total AS total_sum FROM orders o
                LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
                LEFT JOIN order_total ot ON (o.order_id = ot.order_id)
                WHERE o.order_id LIKE '%".$param."%' ORDER BY date_added DESC ";
            break;
            case 2:
                $query = "SELECT o.*, os.name AS status, ot.total AS total_sum FROM orders o
                LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
                LEFT JOIN order_total ot ON (o.order_id = ot.order_id)
                WHERE o.firstname LIKE '%".$param."%' ORDER BY date_added DESC ";
            break;
            case 3:
                $query = "SELECT o.*, os.name AS status, ot.total AS total_sum FROM orders o
                LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
                LEFT JOIN order_total ot ON (o.order_id = ot.order_id)
                WHERE os.name LIKE '%".$param."%' ORDER BY date_added DESC ";
            break;
            case 4:
                $query = "SELECT o.*, os.name AS status, ot.total AS total_sum FROM orders o
                LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
                LEFT JOIN order_total ot ON (o.order_id = ot.order_id)
                WHERE o.date_added LIKE '%".$param."%' ORDER BY date_added DESC ";
            break;
            case 5:
                $query = "SELECT o.*, os.name AS status, ot.total AS total_sum FROM orders o
                LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
                LEFT JOIN order_total ot ON (o.order_id = ot.order_id)
                ORDER BY date_added DESC ";
            break;
        }  
    }
    
    
    
}
else
{
$query = "SELECT o.*, os.name AS status, ot.total AS total_sum FROM orders o
        LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
        LEFT JOIN order_total ot ON (o.order_id = ot.order_id)
        ORDER BY date_added DESC"; 
    
} 
?>
<div align="center">
<table class="overrow" border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td>
         <img src="images/titles/title_orders.jpg" /><br>
        </td>
    </tr>
    <tr>
        <td>
            <form onsubmit="return valid_search()" method="POST" action="orders.php" >
              <fieldset>
                <legend>Search Orders:</legend>
            <table class="search_order">
            <tr>
            	<td>
                <label>Search By:</label> 
                <select name="id" id="id">
                <option value="all">Select</option>
                    <option value="1">Order ID</option>
                    <option value="2">Customer</option>
                    <option value="3">Status</option>
                    <option value="4">Date</option>
                    <option value="5">Alls</option>
                </select>    
                </td>
            	<td>
             <label>Orders Parameters:</label> 
             <input type="text" name="param" id="param" size="32" maxlength="32" value=""/>
                                                    
                </td>
            	<td>
                <input type="submit" name="search_o" value="Search"/>
                
                </td>
            </tr>
            </table>
              </fieldset>
            </form>
        </td>
    </tr>
<?php
    if(!isset($_GET["cmd"])) {        
    ?>
    <tr>   
        <td>
        <br>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td>List of Orders:</td>
                <td align="right" width="250"><!--<a href="administrators.php?cmd=add" style="text-decoration:none;color:Gray;"><img src="images/add.png" width="16"/> Add an administrator</a>--></td>
            </tr>
        </table>
        <table style="width:650px;" border="0" cellpadding="2" cellspacing="2">
            <tr style="font-size:8pt; background:lightblue; color:black;">
                <th>Order ID</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Date Added</th>
                <th>Total</th>
                <th>Action</th>     
            </tr>
            <?php            
            $pages = pagin_top(10,$query);
            $query = $query . ' ' . $pages->limit;
            DB::query($query);
            $b = 0;
            while ($row = DB::fetch_row()) {
                $bgcolor = "#FFFFFF";
                if(($b%2)==0) $bgcolor = "#E0E0E0";
                ?>
            <tr bgcolor="<?php echo $bgcolor;?>">
                <td><?php echo $row["order_id"]; ?></td>
                <td><?php echo $row["firstname"]." ".$row["lastname"]; ?></td>
                <td><?php echo $row["status"]; ?></td>
                <td><?php echo $row["date_added"]; ?></td>
                <td>$<?php echo number_format($row["total_sum"], 2); ?></td>
                <td><a href="orders.php?cmd=view&oid=<?php echo $row["order_id"]; ?>">View</a></td>     
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
    <?php 
    } else {
        $post_type = "view"; 
        $order_id = "";
        $customer_id = "";
        $customer = "";
        $phone = "";
        $fax = "";
        $email = "";
        $ship_firstname = "";
        $ship_lastname = "";
        $ship_address = "";
        $ship_city = "";
        $ship_postcode = "";
        $ship_zone = "";
        $ship_zone_code = "";
        $ship_country = "";
        $ship_method = "";
        $pay_firstname = "";
        $pay_lastname = "";
        $pay_address = "";
        $pay_postcode = "";
        $pay_zone = "";
        $pay_zone_code = "";
        $pay_country = "";
        $pay_city = "";
        $pay_method = "";
        $comment = "";
        $total = "";
        $status = "";
        $date_modified = "";
        $date_added = "";
        $ip = "";
        $products = array();
        
        switch($_GET["cmd"]) {
            case "view": 
                DB::query("SELECT o.*, os.name AS status, 
                            sz.`name` AS ship_zone, sz.`code` AS ship_zone_code,
                            sc.`name` AS ship_country,
                            pz.`name` AS pay_zone, pz.`code` AS pay_zone_code,
                            pc.`name` AS pay_country FROM orders o
                            LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
                            LEFT JOIN zone sz ON (o.shipping_zone_id = sz.zone_id)
                            LEFT JOIN countries sc ON (o.shipping_country_id = sc.country_id)
                            LEFT JOIN zone pz ON (o.payment_zone_id = pz.zone_id)
                            LEFT JOIN countries pc ON (o.payment_country_id = pc.country_id)
                            WHERE o.order_id = " . $_GET["oid"]);
                while ($row = DB::fetch_row()) {
                    $order_id = $row["order_id"];
                    $customer_id = $row["customer_id"];
                    $customer = $row["firstname"]." ".$row["lastname"];
                    $phone = $row["telephone"];
                    $fax = $row["fax"];
                    $email = $row["email"];
                    $ship_firstname = $row["shipping_firstname"];
                    $ship_lastname = $row["shipping_lastname"];
                    $ship_address = $row["shipping_address"];
                    $ship_city = $row["shipping_city"];
                    $ship_postcode = $row["shipping_postcode"];
                    $ship_zone = $row["ship_zone"];
                    $ship_zone_code = $row["ship_zone_code"];
                    $ship_country = $row["ship_country"];
                    $ship_method = $row["shipping_method"];
                    $pay_firstname = $row["payment_firstname"];
                    $pay_lastname = $row["payment_lastname"];
                    $pay_address = $row["payment_address"];
                    $pay_city = $row["payment_city"];
                    $pay_postcode = $row["payment_postcode"];
                    $pay_zone = $row["pay_zone"];
                    $pay_zone_code = $row["pay_zone_code"];
                    $pay_country = $row["pay_country"];
                    $pay_method = $row["payment_method"];
                    $comment = $row["comment"]!="none"?$row["comment"]:"";
                    $total = $row["total"];
                    $status = $row["status"];
                    $date_modified = $row["date_modified"];
                    $date_added = $row["date_added"];
                    $ip = $row["ip"];
                } 
                
                DB::query("SELECT op.*, os.name AS status, v.user_name AS vendor, v.business_name AS shop_vendor FROM order_product op
                            LEFT JOIN users v ON (op.vendor_id = v.user_id)
                            LEFT JOIN order_status os ON (op.order_status_id = os.order_status_id)
                            WHERE op.order_id = " . $_GET["oid"] . " ORDER BY op.vendor_id ASC");
                $cont = 0;
                $ven_id = "";
                while ($row = DB::fetch_row()) {
                    if($ven_id == $row["vendor_id"]){
                        $cont = $cont + 1;
                    }else{
                        $cont = 0;
                    }
                    
                    $products[$row["vendor_id"]]['vendor'] = $row["vendor"];
                    $products[$row["vendor_id"]]['shop_vendor'] = $row["shop_vendor"];
                    $products[$row["vendor_id"]]['reg'][$cont]['order_prod_id'] = $row["order_product_id"];
                    $products[$row["vendor_id"]]['reg'][$cont]['prod_id'] = $row["product_id"];
                    $products[$row["vendor_id"]]['reg'][$cont]['prod_status'] = $row["status"];
                    $products[$row["vendor_id"]]['reg'][$cont]['prod_name'] = $row["name"];
                    $products[$row["vendor_id"]]['reg'][$cont]['price'] = $row["price"];
                    $products[$row["vendor_id"]]['reg'][$cont]['total'] = $row["total"];
                    $products[$row["vendor_id"]]['reg'][$cont]['shipping'] = $row["shipping"];
                    $products[$row["vendor_id"]]['reg'][$cont]['tax'] = $row["tax"];
                    $products[$row["vendor_id"]]['reg'][$cont]['quantity'] = $row["quantity"];
                                        
                    $ven_id = $row["vendor_id"];
                } 
                
                DB::query("SELECT * FROM order_total WHERE order_id = " . $_GET["oid"]);
                while ($row = DB::fetch_row()) {

                    $subtotal_o = $row["subtotal"];
                    $tax_o = $row["tax"];
                    $shipping_o = $row["shipping"];
                    $total_o = $row["total"];                                        
                    
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
        <tr>
            <td>
            <br>
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
                <tr>
                    <td>Order #<?php echo $order_id;?>:</td>
                    <td align="right"><a href="orders.php" style="text-decoration:none;color:Gray;"><img src="images/arrow_back.png"> Back to Orders list</td>
                </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="2" style="width:700px;">
                <tr>
                    <td>
                        <div id="tabs">
                            <ul>
                                <li><a href="#tabs-1">Order Detail</a></li>
                                <li><a href="#tabs-2">Products</a></li>
                                <li><a href="#tabs-3">Shipping Address</a></li>
                                <li><a href="#tabs-4">Payment Address</a></li>
                            </ul>
                            <div id="tabs-1">
                                <table width="50%" style="float: left;">
                                    <tr>
                                        <td>
                                            Order ID:
                                        </td>
                                        <td>
                                            <b><?php echo $order_id;?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Customer ID:
                                        </td>
                                        <td>
                                            <b><?php echo $customer_id;?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Customer:
                                        </td>
                                        <td>
                                            <b><?php echo $customer;?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            E-mail:
                                        </td>
                                        <td>
                                            <b><?php echo $email;?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Telephone:
                                        </td>
                                        <td>
                                            <b><?php echo $phone;?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Fax:
                                        </td>
                                        <td>
                                            <b><?php echo $fax;?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Comment:
                                        </td>
                                        <td>
                                            <b><?php echo $comment;?></b>
                                        </td>
                                    </tr>
                                </table>
                                <table width="50%" style="float: left;">
                                    <tr>
                                        <td>
                                            Date Added:
                                        </td>
                                        <td>
                                            <b><?php echo $date_modified; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Date Update:
                                        </td>
                                        <td>
                                            <b><?php echo $date_added; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Ip:
                                        </td>
                                        <td>
                                            <b><?php echo $ip; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Shipping Method:
                                        </td>
                                        <td>
                                            <b><?php echo $ship_method; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Payment Method:
                                        </td>
                                        <td>
                                            <b><?php echo $pay_method; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Order Total:
                                        </td>
                                        <td>
                                            <b>$<?php echo number_format($total,2); ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Order Status:
                                        </td>
                                        <td>
                                            <b><?php echo $status; ?></b>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div id="tabs-2">
                                <table id="products_orders" cellpadding="3" cellspacing="0">
                                  <thead>
                                    <tr style="background-color: #CCCCCC;">
                                      <td style="font-weight: bold;">Vendor</td>
                                      <td style="font-weight: bold;">Status</td>
                                      <td style="font-weight: bold;">Product</td>
                                      <td style="font-weight: bold;">Quantity</td>
                                      <td style="font-weight: bold;">Unit Price</td>
                                      <td width="1" style="font-weight: bold;">Total</td>
                                    </tr>
                                  </thead>
                                  <?php 
                                    foreach ($products as $k => $val) {
                                        $numrow = count($val['reg']);
                                  ?>   
                                  <tbody id="vendor_<?php echo $k;?>">
                                    <tr>
                                      <td rowspan="<?php echo $numrow;?>" ><?php echo $val['vendor'];?></td>
                                    <?php 
                                      $subtotal_vendor = 0;
                                      $tax_vendor = 0;
                                      $shipping_vendor = 0;
                                      $total_vendor = 0;
                                      foreach ($val['reg'] as $key => $value) {
                                      if ($key == 0) {
                                    ?>
                                      <td><?php echo $value['prod_status'];?></td>                                                                                             
                                      <td><?php echo $value['prod_name'];?></td>
                                      <td><?php echo $value['quantity'];?></td>
                                      <td>$<?php echo number_format($value['price'], 2);?></td>
                                      <td>$<?php echo number_format($value['total'], 2);?></td>
                                    </tr>
                                    <?php
                                      }else{ 
                                    ?>
                                    <tr>
                                      <td><?php echo $value['prod_status'];?></td>                                               
                                      <td><?php echo $value['prod_name'];?></td>
                                      <td><?php echo $value['quantity'];?></td>
                                      <td>$<?php echo number_format($value['price'], 2);?></td>
                                      <td>$<?php echo number_format($value['total'], 2);?></td>
                                    </tr>
                                    <?php
                                      }
                                      $subtotal_vendor = $subtotal_vendor + $value['total'];                                 
                                      $shipping_vendor = $shipping_vendor + $value['shipping'];
                                      $tax_vendor = $tax_vendor + $value['tax'];
                                      }
                                      $total_vendor = $subtotal_vendor + $shipping_vendor + $tax_vendor; 
                                    ?>
                                    <tr style="background-color: rgb(244, 244, 248);">
                                      <td colspan="5" align="right" style="font-weight: bold;">Sub-Total:</td>
          			  			      <td>$<?php echo number_format($subtotal_vendor, 2);?></td>
                                    </tr>
                                    <tr style="background-color: rgb(244, 244, 248);">
                                      <td colspan="5" align="right" style="font-weight: bold;">Tax:</td>
                                      <td>$<?php echo number_format($tax_vendor, 2);?></td>
                                    </tr>
                                    <tr style="background-color: rgb(244, 244, 248);">
                                      <td colspan="5" align="right" style="font-weight: bold;">Shipping:</td>
                                      <td>$<?php echo number_format($shipping_vendor, 2);?></td>
                                    </tr>
                                    <tr style="background-color: rgb(244, 244, 248);">        
                                      <td colspan="5" align="right" style="font-weight: bold;">Total:</td>
                                      <td>$<?php echo number_format($total_vendor, 2);?></td>
                                    </tr>
                                  </tbody>
                                  <?php 
                                    } 
                                  ?>
                                  <tbody id="totals">
                                    <tr>
                                      <td colspan="6"></td>
                                    </tr>
                                    <tr style="background-color: #CCCCCC;">
                                      <td colspan="5" align="right" style="font-weight: bold;">Sub-Total:</td>
          			  			      <td>$<?php echo number_format($subtotal_o, 2);?></td>
                                    </tr>
                                    <tr>
                                      <td colspan="5" align="right" style="font-weight: bold;">Tax:</td>
                                      <td>$<?php echo number_format($tax_o, 2);?></td>
                                    </tr>
                                    <tr style="background-color: #CCCCCC;">
                                      <td colspan="5" align="right" style="font-weight: bold;">Shipping:</td>
                                      <td>$<?php echo number_format($shipping_o, 2);?></td>
                                    </tr>
                                    <tr>        
                                      <td colspan="5" align="right" style="font-weight: bold;">Total:</td>
                                      <td>$<?php echo number_format($total_o, 2);?></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                            <div id="tabs-3">
                                <table width="100%" style="float: left;">
                                    <tr>
                                        <td>
                                            First Name:
                                        </td>
                                        <td>
                                            <b><?php echo $ship_firstname; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Last Name:
                                        </td>
                                        <td>
                                            <b><?php echo $ship_lastname; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address:
                                        </td>
                                        <td>
                                            <b><?php echo $ship_address; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            City:
                                        </td>
                                        <td>
                                            <b><?php echo $ship_city; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Post Code:
                                        </td>
                                        <td>
                                            <b><?php echo $ship_postcode; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Country:
                                        </td>
                                        <td>
                                            <b><?php echo $ship_country; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Region / State:
                                        </td>
                                        <td>
                                            <b><?php echo $ship_zone." (".$ship_zone_code.")"; ?></b>
                                        </td>
                                    </tr>
                                </table>                
                            </div>
                            <div id="tabs-4">
                                <table width="100%" style="float: left;">
                                    <tr>
                                        <td>
                                            First Name:
                                        </td>
                                        <td>
                                            <b><?php echo $pay_firstname; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Last Name:
                                        </td>
                                        <td>
                                            <b><?php echo $pay_lastname; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address:
                                        </td>
                                        <td>
                                            <b><?php echo $pay_address; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            City:
                                        </td>
                                        <td>
                                            <b><?php echo $pay_city; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Post Code:
                                        </td>
                                        <td>
                                            <b><?php echo $pay_postcode; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Country:
                                        </td>
                                        <td>
                                            <b><?php echo $pay_country; ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Region / State:
                                        </td>
                                        <td>
                                            <b><?php echo $pay_zone." (".$pay_zone_code.")"; ?></b>
                                        </td>
                                    </tr>
                                </table>                
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            </td>
        </tr>
        <?php
    }    
    ?>
</table>
</div>
<?php
include_once("_footer.php");
?>
<link media="all" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" rel="stylesheet">
<link media="all" type="text/css" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/i18n/jquery-ui-i18n.min.js"></script>
<!-- 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
-->
<script type="text/javascript" language="javascript">
    $(function() {
        $( "#tabs" ).tabs();
    });
    
    function valid_search()
    {

        var field = document.getElementById('id');
        if(field.value == 'all')
        {
            alert("select an option");
            return false;
        }
        else
        {
            return true;
        }
        
    }
</script>