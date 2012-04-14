<?php
$page = "orders";
include_once("_header.php");


/** status *//** status *//** status *//** status */
    $statusArr =array();
    $var1 = "";
    $var1 .= "SELECT os.order_status_id AS id, ";
    $var1 .= "       os.`name` ";
    $var1 .= "FROM   order_status AS os ";
    $var1 .= "ORDER  BY id ASC " ;
    DB::query($var1);
    $b = 0;
    while ($row = DB::fetch_row()) {
        $statusArr[$row['id']] = $row['name'];
    }
/** status *//** status *//** status *//** status */


$list = isset($_POST['id']);
$param = isset($_POST['param']);
switch($list)
{
    case 1:
        $query = "SELECT DISTINCT o.order_id, o.*, os.name AS status, op.product_id, SUM(op.total) AS total_vendor FROM orders o
        LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
        LEFT JOIN order_product op ON (o.order_id = op.order_id)
        LEFT JOIN users v ON (op.vendor_id = v.user_id)
        WHERE v.user_id = '".$_SESSION["l_user_id"]."' AND o.order_id LIKE '%".$param."%' GROUP BY o.order_id ORDER BY date_added DESC";
        
    break;
    case 2:
        $query = "SELECT DISTINCT o.order_id, o.*, os.name AS status, op.product_id, SUM(op.total) AS total_vendor FROM orders o
        LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
        LEFT JOIN order_product op ON (o.order_id = op.order_id)
        LEFT JOIN users v ON (op.vendor_id = v.user_id)
        WHERE v.user_id = '".$_SESSION["l_user_id"]."' AND o.firstname LIKE '%".$param."%' GROUP BY o.order_id ORDER BY date_added DESC";
        
    break;
    case 3:
        $query = "SELECT DISTINCT o.order_id, o.*, os.name AS status, op.product_id, SUM(op.total) AS total_vendor FROM orders o
        LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
        LEFT JOIN order_product op ON (o.order_id = op.order_id)
        LEFT JOIN users v ON (op.vendor_id = v.user_id)
        WHERE v.user_id = '".$_SESSION["l_user_id"]."' AND os.name LIKE '%".$param."%' GROUP BY o.order_id ORDER BY date_added DESC";
        
    break;
    case 4:
        $query = "SELECT DISTINCT o.order_id, o.*, os.name AS status, op.product_id, SUM(op.total) AS total_vendor FROM orders o
        LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
        LEFT JOIN order_product op ON (o.order_id = op.order_id)
        LEFT JOIN users v ON (op.vendor_id = v.user_id)
        WHERE v.user_id = '".$_SESSION["l_user_id"]."' AND o.date_added LIKE '%".$param."%' GROUP BY o.order_id ORDER BY date_added DESC";
        
    break;
    case 5:
        $query = "SELECT DISTINCT o.order_id, o.*, os.name AS status, op.product_id, SUM(op.total) AS total_vendor FROM orders o
        LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
        LEFT JOIN order_product op ON (o.order_id = op.order_id)
        LEFT JOIN users v ON (op.vendor_id = v.user_id)
        WHERE v.user_id = '".$_SESSION["l_user_id"]."' GROUP BY o.order_id ORDER BY date_added DESC";

    break;
    default:
        $query = "
        SELECT DISTINCT o.order_id, o.*, 
        os.name AS status, 
        op.product_id, 
        SUM(op.total) AS total_vendor 
        FROM orders o
        LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
        LEFT JOIN order_product op ON (o.order_id = op.order_id)
        LEFT JOIN users v ON (op.vendor_id = v.user_id)
        WHERE v.user_id = '".$_SESSION["l_user_id"]."' GROUP BY o.order_id ORDER BY date_added DESC";

    
}
        
    
?>
<div align="center">
<table class="overrow" border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td>
         <img src="images/titles/title_orders.jpg" /><br>
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
                <td>
                    <form onsubmit="return valid_search()" method="POST" action="orders_vendor.php" >
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
            <tr>
                <td>List of Orders:</td>
                <td align="right" width="250"><!--<a href="administrators.php?cmd=add" style="text-decoration:none;color:Gray;"><img src="images/add.png" width="16"/> Add an administrator</a>--></td>
            </tr>
        </table>
        <table style="width:800px;" border="0" cellpadding="2" cellspacing="2">
            <tr style="font-size:8pt; background:lightblue; color:black;">
                <th>Order ID</th>
                <th>Customer</th>
                <th style="width: 120px;">Status</th>
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
                <td>                
                <select id="statusOrderProduct">
                    <?php 
                    foreach($statusArr as $k => $v){
                        echo '<option value="'. $k .'" '. ($k == $row["status"]?'selected':'') .' >'. $v .'</option>'."\n";
                    } ?>
                </select>
                </td>
                <td><?php echo $row["date_added"]; ?></td>
                <td>$ <?php echo number_format($row["total_vendor"], 2); ?></td>
                <td><a href="orders_vendor.php?cmd=view&oid=<?php echo $row["order_id"]; ?>">View</a></td>     
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
            $var1 = "";
            $var1 .= "SELECT o.*, sz.`name`    AS ship_zone, ";
            $var1 .= "       sz.`code`    AS ship_zone_code, ";
            $var1 .= "       sc.`name`    AS ship_country, ";
            $var1 .= "       pz.`name`    AS pay_zone, ";
            $var1 .= "       pz.`code`    AS pay_zone_code, ";
            $var1 .= "       pc.`name`    AS pay_country, ";
            $var1 .= "       op.product_id, ";
            $var1 .= "       op.name as `status`, ";
            $var1 .= "       SUM(op.total)AS total_vendor, ";
            $var1 .= "       os.`name` as status ";
            $var1 .= "FROM   orders AS o ";
            $var1 .= "       INNER JOIN order_product AS op ";
            $var1 .= "         ON( o.order_id = op.order_id ) ";
            $var1 .= "       LEFT JOIN zone AS sz ";
            $var1 .= "         ON( o.shipping_zone_id = sz.zone_id ) ";
            $var1 .= "       LEFT JOIN countries AS sc ";
            $var1 .= "         ON( o.shipping_country_id = sc.country_id ) ";
            $var1 .= "       LEFT JOIN zone AS pz ";
            $var1 .= "         ON( o.payment_zone_id = pz.zone_id ) ";
            $var1 .= "       LEFT JOIN countries AS pc ";
            $var1 .= "         ON( o.payment_country_id = pc.country_id ) ";
            $var1 .= "       LEFT JOIN users AS v ";
            $var1 .= "         ON( op.vendor_id = v.user_id ) ";
            $var1 .= "       INNER JOIN order_status AS os ";
            $var1 .= "         ON op.order_status_id = os.order_status_id ";
            $var1 .= "WHERE  o.order_id = '" . $_GET["oid"] . "' ";
            $var1 .= "       AND op.vendor_id = '".$_SESSION["l_user_id"]."' " ;

            $q = "SELECT o.*, os.name AS status, 
                            sz.`name` AS ship_zone, sz.`code` AS ship_zone_code,
                            sc.`name` AS ship_country,
                            pz.`name` AS pay_zone, pz.`code` AS pay_zone_code,
                            pc.`name` AS pay_country, 
                            op.product_id, SUM(op.total) AS total_vendor FROM orders o
                            LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
                            LEFT JOIN zone sz ON (o.shipping_zone_id = sz.zone_id)
                            LEFT JOIN countries sc ON (o.shipping_country_id = sc.country_id)
                            LEFT JOIN zone pz ON (o.payment_zone_id = pz.zone_id)
                            LEFT JOIN countries pc ON (o.payment_country_id = pc.country_id)
                            LEFT JOIN order_product op ON (o.order_id = op.order_id)
                            LEFT JOIN users v ON (op.vendor_id = v.user_id)
                            WHERE o.order_id = '" . $_GET["oid"] . "' 
                            AND op.vendor_id ='".$_SESSION["l_user_id"]."'";
            //echo $var1;
                DB::query($var1);
                
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
                    $total = $row["total_vendor"];
                    $status = $row["status"];
                    $date_modified = $row["date_modified"];
                    $date_added = $row["date_added"];
                    $ip = $row["ip"];
                } 
                
                DB::query("SELECT op.*, v.user_name AS vendor, 
                            v.business_name AS shop_vendor 
                            FROM order_product op
                            LEFT JOIN users v ON (op.vendor_id = v.user_id)
                            WHERE op.order_id = " . $_GET["oid"] . "  
                            AND op.vendor_id ='".$_SESSION["l_user_id"]."' 
                            ORDER BY op.vendor_id ASC");
                
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
                    $products[$row["vendor_id"]]['reg'][$cont]['status'] = $row["order_status_id"];
                    $products[$row["vendor_id"]]['reg'][$cont]['prod_name'] = $row["name"];
                    $products[$row["vendor_id"]]['reg'][$cont]['price'] = $row["price"];
                    $products[$row["vendor_id"]]['reg'][$cont]['total'] = $row["total"];
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
                    <td>Order #<?php echo $order_id;?>: <input type="hidden" id="oid" name="oid" value="<?php echo $order_id;?>" />  
                    <script>
                          var oidd = document.getElementById("oid").value;                                                 
                    </script>
                    
                    <script>
                        function validate(form, id)
                        { 
                            /*if(id.checked)
                            {
                                alert('check');
                            }*/
                        /*for(var i = 0; i < form.choice.length; i++){ 
                        if(form.choice[i].checked)return true; 
                        } 
                        alert('selected one product'); 
                        return false; */
                        } 
                    </script>
                    <?php 
                        //<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#tabs-2">Products</a></li>
                     $toid="inactive";
                    
                    if(isset($_REQUEST['oidd'])){
                        if($_REQUEST['oidd']!=""){
                            $toid="active";
                        }
                    }
                    ?>
                    
                    </td>
                    <td align="right"><a href="orders_vendor.php" style="text-decoration:none;color:Gray;"><img src="images/arrow_back.png"> Back to Orders list</td>
                </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="2" style="width:600px;">
                <tr>
                    <td>
                        <div id="tabs">
                            <ul>
                                <li <?php if($toid=="active"){?> class="ui-state-default ui-corner-top" <?php } ?>><a href="#tabs-1">Order Detail</a></li>
                                <li <?php if($toid=="active"){?> class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active" <?php } ?>><a href="#tabs-2">Products</a></li>
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
                                </table>
                            </div>
                            <div id="tabs-2">
                                <!--<form method="get" action="products.php" enctype="text/plain" name="f_search" id="f_search">
                                  <fieldset>
                                    <legend>Search vendor detail:</legend>
                                    <table class="t_search">
                                    <tr>
                                    	<td>
                                        <label>Select Vendor:</label> 
                                        <select name="id" id="id">
                                        <option value="all">Select</option>
                                        <?php echo DB::db_options("SELECT v.`user_id`, v.`user_name` FROM order_product op
                                                                    LEFT JOIN users v ON (op.vendor_id = v.user_id)
                                                                    WHERE op.order_id = 3 GROUP BY op.vendor_id 
                                                                    ORDER BY op.vendor_id ASC") ?>
                                        </select>    
                                        </td>
                                    	<td>
                                        <input type="submit" value="Search"/>
                                        
                                        </td>
                                    </tr>
                                    </table>
                                  </fieldset>
                                </form>
                                <br />-->



                                 <form name='form'  >
                                <table id="products_orders" cellpadding="3" cellspacing="0">
                                  <thead>
                                    <tr style="background-color: #CCCCCC;">
                                      <!--<td style="font-weight: bold;">Vendor</td>-->
                                      <td style="font-weight: bold;"><input type="checkbox" name="check_all" id="check_all" onclick="checkAll();"/></td>
                                      <td style="font-weight: bold;">Product</td>
                                      <td style="font-weight: bold;">Status</td>
                                      <td style="font-weight: bold;">Quantity</td>
                                      <td style="font-weight: bold;">Unit Price</td>
                                      <td width="1" style="font-weight: bold;">Total</td>
                                    </tr>
                                  </thead>
                                  <?php 
                                    foreach ($products as $k => $val) {
                                        $numrow = count($val['reg'])+1;
                                  ?>   
                                  <tbody id="vendor_<?php echo $k;?>">
                                    <!--<tr>
                                      <td rowspan="<?php echo $numrow;?>" ><?php echo $val['vendor'];?></td>
                                      <td colspan="4"></td>id="<?php echo $value['order_prod_id']; ?>"
                                    </tr>-->
                                    <?php 
                                      $subtotal_vendor = 0;
                                      $shipping_vendor = 0;
                                      $total_vendor = 0;
                                      foreach ($val['reg'] as $key => $value) {
                                    ?>
                                    <tr>    
                                    <form name="form" id="form">   
                                      <td><input type='checkbox' class="checked_all2" id="checkbox<?php echo $value['prod_id'];?>" name="checkboxall[]" value="<?php echo $value['prod_id'];?>"/> </td>                               
                                      <td><?php echo $value['prod_name'];?></td>
                                      <td>
                                      <input type="hidden" name="prod_id" id="prod_id" value="<?php echo $value['prod_id']?>"/>
                                      <input type="hidden" name="order" id="order" value="<?php echo $order_id;?>"/>
                                      <input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo $_SESSION["l_user_id"]?>"/>
                                      <select class="statusOrderProduct" id="statusOrderProduct<?php echo $value['order_prod_id'];?>" >
                                      <?php 
                                        foreach($statusArr as $k1 => $v1){//.':::'. $value['order_prod_id'] .':::'. $value['prod_id']
                                            echo '<option value="'. $k1 .':::'. $value['order_prod_id'] .':::'. $value['prod_id'] .'" '. ($k1 == $value['status']?'selected':'') .' >'. $v1 .'</option>'."\n";
                                        }                                                 
                                      ?>
                                      </select>
                                      </td>
                                      <td><?php echo $value['quantity']; ?></td>
                                      <td>$<?php echo number_format($value['price'], 2);?></td>
                                      <td>$<?php echo number_format($value['total'], 2);?></td>
                                      </form>
                                    </tr>
                                    <?php
                                      $subtotal_vendor = $subtotal_vendor + $value['total'];                                 
                                      }
                                      $total_vendor = $subtotal_vendor + $shipping_vendor; 
                                    ?>
                                    <!--<tr style="background-color: rgb(244, 244, 248);">
                                      <td colspan="4" align="right">Sub-Total:</td>
          			  			      <td>$<?php echo number_format($subtotal_vendor, 2);?></td>
                                    </tr>
                                    <tr>
                                      <td colspan="4" align="right">Free Shipping:</td>
                                      <td>$<?php echo number_format($shipping_vendor, 2);?></td>
                                    </tr>-->
                                    <tr style="background-color: rgb(244, 244, 248);">        
                                      <td colspan="4" align="right">Total:</td>
                                      <td>$<?php echo number_format($total_vendor, 2);?></td>
                                    </tr>
                                    <tr style="background-color: rgb(244, 244, 248);">        
                                      <td colspan="3" align="right">Change Status All:</td>
                                      <td colspan="2">
                                      <div id="states">
                                      <input type="hidden" name="valstate" id="valstate" value="<?php echo $value['status']?>"/>
                                      <select id="statusOrderProductAll">
                                 
                                  <?php 
                                    foreach($statusArr as $k => $v){//.':::'. $order_id .':::'. $_SESSION['l_user_id'] .':::?
                                        echo '<option value="'. $k . ':::' . $order_id .':::'. $_SESSION['l_user_id'] .':::?" '. ($k == $value['status']?'selected':'') .' >'. $v .'</option>'."\n";
                                    }                                                 
                                  ?>
                                  </select>
                                  </div>
                                  </td>
                                    </tr>
                                  </tbody>
                                  <?php 
                                    } 
                                  ?>
                                </table>
                                </form>
                                  
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

<link media="all" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" rel="stylesheet">
<link media="all" type="text/css" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/i18n/jquery-ui-i18n.min.js"></script>
<!-- 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
-->
<style>
.ui-dialog .ui-dialog-titlebar-close span {
    padding: 0;
}
</style>



<div id="dialog-form" title="Send Email to Costumer">
  
</div>
<!--
<script>
function checkCheckBoxes() {
if ( document.getElementById().checked == false
document.frmTest.CHKBOX_1.checked == false &&
document.frmTest.CHKBOX_2.checked == false &&
document.frmTest.CHKBOX_3.checked == false)
{
alert ('You didn\'t choose any of the checkboxes!');
return false;
}
else
{
return true;
}
}

Read more about javascript by www.netevolution.co.uk

</script>
-->
<script type="text/javascript" language="javascript">
    
function checkAll()
    {
        var nodoCheck = document.getElementsByTagName("input");
        var varCheck = document.getElementById("check_all").checked;
        for (i=0; i<nodoCheck.length; i++){
            if (nodoCheck[i].type == "checkbox" && nodoCheck[i].name != "all" && nodoCheck[i].disabled == false) {
                nodoCheck[i].checked = varCheck;
            }
        }    
    }
</script>
<script type="text/javascript" language="javascript">
    
    $(function() {
        $( "#tabs" ).tabs();
        
           $( ".statusOrderProduct" ).change(function()
            {
            $status = $(this).val().split(":::");
            $status[0]
            var isChk = $('#checkbox'+$status[2]).is(':checked');           
            var Prod = $('#prod_id').val();
            var Vendor = $('#vendor_id').val();
            var order = $('#order').val();
                if(isChk == true)
                {
                    if($status[0]==3 || $status[0]==13){
                    $('#dialog-form').load('ajax.php?action=13&method=1&order='+order+'&product='+Prod+'&newstatus=' + $( this ).val() ,  
                    function(){
                        $( "#dialog-form" ).dialog({ height: 400 })
                                           .dialog({ width: 550  })
                                           .dialog( "open" ); 
                        });
                   }else{
                    $.post("ajax.php", { action:15, method:1, newstatus:$( this ).val(), product:Prod, vendor:Vendor, order:order},
                       function(data) {
                         alert(" Order product status changed. ");  
                    });
                   }  
                }
                else
                {
                    alert('mark the ckeckbox of product');                    
                }
           
            }); 
        
            
       
        $( "#statusOrderProductAll" ).change(function(){
            $status = $(this).val().split(":::");
            $status[0]
            var chkall = $('#check_all').is(':checked');
            var Prod = $('#prod_id').val();
             var select = $('#valstate').val();
            var Vendor = $('#vendor_id').val();
            var order = $('#order').val();
           var values = jQuery(".checked_all2").serializeArray();           
            if(chkall==true)
            {
                if($status[0]==3 || $status[0]==13)
                {
                    $.post("ajax.php", { action:13, method:2, newstatus:$( "#statusOrderProductAll" ).val(), product:values, order:order},
                       function(data) {                        
                        $("#dialog-form").html(data);  
                        dialogform();        
                        }
                    );
               }else{
                $.post("ajax.php", { action:15, method:2, newstatus:$( "#statusOrderProductAll" ).val(), product:values, vendor:Vendor, order:order},
                   function(data) {
                     alert(" Order product status changed. ");
                      location.reload(); 
                });
               }   
            }
            else
            {   
                alert('Mark all checkbox'); 
                location.reload();            
            }           
        });
        if(<?php echo isset($_GET['tab2'])?1:0 ?>)
            $( "#tabs" ).tabs( "option", "selected", 1 );
    		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
	function dialogform()
    {
        	$( "#dialog-form" ).dialog
        ({
            autoOpen: true,
            height: 400,
			width: 560,
            show: 'blind',
            hide: 'explode',
            modal: true,
            resizable: false,
			buttons: {
				"Send": function() {
					 // aqui todo bien
						$.post("ajax.php", $("#form-send").serialize(),
                           function(data) {
                             alert(" Order product status changed. ");
                        });
						$( this ).dialog( "close" );
					
				},
				Cancel: function() {
				    $toid=oidd;
				    location.href="orders_vendor.php?cmd=view&oid="+oidd+"&oidd="+oidd;
					$( this ).dialog( "close" );
                    $toid=oidd;
				}
			},
			close: function() {
			 location.href="orders_vendor.php?cmd=view&oid="+oidd+"&oidd="+oidd;
				allFields.val( "" ).removeClass( "ui-state-error" );
                
			}
		});
   }	
		
	
	});
    
    
    function send(){
        
            
    }
    
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
<?php
include_once("_footer.php");
?>