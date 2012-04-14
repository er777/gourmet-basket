<?php
include '_init.php';

$action = $_REQUEST['action'];

switch ($action) {
    case 1://validate nameuser

        if ($_POST['user_id'] == 'new') {
            $qry = "SELECT user_name FROM users WHERE user_name = '" . $_POST["q"] . "'";
            $n = DB::result($qry);
            if ($n)
                echo 1;
            else
                echo 0;
        }else {
            $qry = "SELECT user_name FROM users WHERE user_name = '" . $_POST["q"] . "' and  user_id = '" . $_POST['user_id'] . "'";
            $n = DB::result($qry);
            if ($n === $_POST['q']) {
                echo 2;
            } else {
                $qry = "SELECT user_name FROM users WHERE user_name = '" . $_POST["q"] . "' and user_id != '" . $_POST['user_id'] . "'";
                $n = DB::result($qry);
                if ($n)
                    echo 1;
                else
                    echo 0;
            }
        }

        break;

    case 2: //get subcategories 
        ?>
        <select name="subcategory_id" id="subcategory_id" class="left" onchange="exeAjax('id='+this.value+'&action=3', 'scat-ssubcat', false)" >
            <option value="">Select</option>
            <?php echo DB::db_options("SELECT `subcategory_id`, `subcategory` FROM `subcategories` where `category_id` = '" . $_GET["id"] . "' order by `subcategory_id`") ?>
        </select>        
        <?php
        break;

    case 3:
        ?>
        <select name="sub_subcat_id" id="sub_subcat_id" class="left" >
            <option value="">Select</option>
            <?php echo DB::db_options("SELECT `sub_subcat_id`, `sub_subcategory` FROM `sub_subcategories` where `subcategory_id` = '" . $_GET["id"] . "'") ?>
        </select>   
        <?php
        break;
    case 4://more culinary tradition
        $i_trad = 0;
        $i_trad = $_GET["i_trad"] + 1;
        ?>
        <div id="tradition<?php echo $i_trad; ?>" class="more">            
            <select name="tradition_id[]" id="tradition_id[]" class="left" >
                <option value="">Select</option>
                <?php echo DB::db_options("SELECT `tradition_id`, `name` FROM `culinary_tradition` order by `sort_by`") ?>
            </select> 
            <a onclick="less('tradition<?php echo $i_trad; ?>')" id="mor" class="mor" href="javascript:void(0)">-</a>  
            <a onclick="exeAjax('i_trad=<?php echo $i_trad; ?>&action=4', 'traditions<?php echo $i_trad; ?>', true)" id="mor1" class="mor" href="javascript:void(0)">+</a>     
        </div>  
        <div id="traditions<?php echo $i_trad; ?>"></div>                  
        <?php
        break;
    case 5: // delete ethnicity
        deleteData('ethnicities', 'ethnicity_id', $_POST["del_etn_id"]);
        ?>
        <select name="ethnicity_id" id="ethnicity_id" class="left">
            <option value="">Select</option>
            <?php echo DB::db_options("SELECT `ethnicity_id`, `name` FROM `ethnicities` order by `ethnicity_id`") ?>
        </select>
        <label for="delete_etn_id" style="display: none;">
            <input type="checkbox" value="1" onclick="del_etn('ethnicity_id')" name="delete_etn_id" id="delete_etn_id" />
            Delete
        </label> 
        <?php
        break;
    case 6: //  update  ethnicity
        $e = array();
        $e = DB::get_single('ethnicities', 'ethnicity_id', $_POST['get_data']);
        ?>
        <input type="hidden" value="<?php echo $e['ethnicity_id'] ?>" name="ethnicity_idx" id="ethnicity_idx" />
        <label>Name:</label> 
        <input type="text" value="<?php echo $e['name'] ?>" name="name" id="name" />
        <label>Description:</label>
        <input type="text" value="<?php echo $e['description'] ?>" name="description" id="description" />
        <?php
        break;
    case 7: //  insert  ethnicity
        $etn = DB::insert_update($_POST, 'ethnicities', 'ethnicity_id');
        ?>
        <select name="ethnicity_id" id="ethnicity_id" class="left">
            <option value="">Select</option>
            <?php echo DB::db_options("SELECT `ethnicity_id`, `name` FROM `ethnicities` order by `ethnicity_id`", $etn['ethnicity_id']) ?>
        </select>
        <label id="label_del" for="delete_etn_id" class="label_del" style="display: none;">
            <input type="checkbox" value="1" onclick="del_etn('ethnicity_id')" name="delete_etn_id" id="delete_etn_id" />
            Delete
        </label> 
        <?php
        break;
    case 8: // delete culinary_tradition 
        deleteData('culinary_tradition', 'tradition_id', $_POST["del_trad_id"]);
        ?>
        <select name="tradition_id" id="tradition_id" class="left" >
            <option value="">Select</option>
            <?php echo DB::db_options("SELECT `tradition_id`, `name` FROM `culinary_tradition` order by `sort_by`") ?>
        </select> 
        <label id="label_delc" for="delete_trad_id" class="label_del" style="display: none;">
            <input type="checkbox" value="1" onclick="del_trad('tradition_id')" name="delete_trad_id" id="delete_trad_id" />
            Delete
        </label> 
        <?php
        break;
    case 9: //  update  ethnicity
        /* update tradiction  * */
        $t = array();
        $t = DB::get_single('culinary_tradition', 'tradition_id', $_POST['get_data_trad']);
        ?>
        <input type="hidden" value="<?php echo $t['tradition_id'] ?>" name="tradition_idx" id="tradition_idx" />
        <label>Name:</label> 
        <input type="text" value="<?php echo $t['name'] ?>" name="name_trad" id="name_trad" />
        <label>Sort by:</label>
        <input type="text" value="<?php echo $t['sort_by'] ?>" name="sort_by" id="sort_by" />
        <?php
        break;
    case 10: //  insert  culinary_tradition
        $data = DB::insert_update($_POST, 'culinary_tradition', 'tradition_id');
        ?>
        <select name="tradition_id" id="tradition_id" class="left">
            <option value="">Select</option>
            <?php echo DB::db_options("SELECT `tradition_id`, `name` FROM `culinary_tradition` order by `sort_by`", $data['tradition_id']) ?>
        </select> 
        <label id="label_delc" for="delete_trad_id" class="label_del" style="display: none;">
            <input type="checkbox" value="1" onclick="del_trad('tradition_id')" name="delete_trad_id" id="delete_trad_id" />
            Delete
        </label> 
        <?php
        break;
    case 11: //get states
        ?>
        <select name="zone_id" id="zone_id" class="left" style="width: 198px;">
        	<option value="">Select</option>
        	<?php echo DB::db_options("SELECT `zone_id`, `name` FROM `zone` where `country_id` = '" . $_GET["id"] . "' order by `zone_id`") ?>
        </select>      
        <?php
        break;
    case 12: //get states this is for cake
        ?>
        <select id="usersZoneId" style="width:206px" name="data[users][zone_id]">
        	<option value="">Select</option>
        	<?php echo DB::db_options("SELECT `zone_id`, `name` FROM `zone` where `country_id` = '" . $_GET["id"] . "' order by `zone_id`") ?>
        </select>   
        <?php
        break;
    case 13: //send email shipped  
        /*include('utils/form_shiped.php');
        exit;*/
        
        $res =  explode(':::', $_REQUEST['newstatus']);
        
        //shipping
        if($res[0]==3 || $res[0]==13)
        {
            $var1 = "";
            $var1 .= "SELECT o.email, ";
            $var1 .= "       o.firstname, ";
            $var1 .= "       o.lastname, ";
            $var1 .= "       u.business_name, ";
            $var1 .= "       op.order_product_id, ";
            $var1 .= "       u.user_id, ";
            $var1 .= "       o.order_id, ";
            $var1 .= "       p.product_id, ";
            $var1 .= "       p.product_name, ";
            $var1 .= "       p.description ";
            $var1 .= "FROM   order_product AS op ";
            $var1 .= "       INNER JOIN products AS p ";
            $var1 .= "         ON p.product_id = op.product_id ";
            $var1 .= "       INNER JOIN users AS u ";
            $var1 .= "         ON op.vendor_id = u.user_id ";
            $var1 .= "       INNER JOIN orders AS o ";
            $var1 .= "         ON o.order_id = op.order_id ";
            if(isset($res[3])){
                $var1 .= "WHERE  o.order_id = '". $res[1] ."' " ;
                $var1 .= "AND    op.vendor_id = '". $res[2] ."' " ; 
            }else{
                $var1 .= "WHERE  op.order_product_id = '". $res[1] ."' " ;
                $var1 .= "AND    p.product_id = '". $res[2] ."' " ;            
            }
                      
            $d = array();
            $d = DB::array_assoc($var1);
            //echo $var1;
            $content = "";
            $content .= "Thank you for your interest in Gourmet-Basket products.\n\n";
            if($res[0]==3){
                $subject = "Gourmet Basket --> Your order has shipped\n\n";
                $content .= $subject;
            }else{
                $subject = "Gourmet Basket --> Chargeback \n\n";
                $content .= $subject;
            }
            
            $content .= $d[0]['business_name'] . "\n\n";
            $content .= "sent the following products:  \n\n";
            
            foreach($d as $k => $v){
                $content .= "* " . $v['product_name']. "\n";
            }
            
            switch($_REQUEST['method'])
            {
                case 1:
                    $insert = "INSERT INTO order_history SET
                    product_id = '".$_REQUEST['product']."',
                    order_id = '".$_REQUEST['order']."', 
                    order_status_id = '".$res[0]."',
                    notify = '1',
                    date_added = Now()";
                    DB::execute($insert);
                break;
                case 2:
                    foreach($_REQUEST['product'] as $key => $valor)
                    {   
                    $insert = "INSERT INTO order_history SET
                              product_id = '".$valor['value']."',
                              order_id = '".$_REQUEST['order']."', 
                              order_status_id = '".$res[0]."',
                              notify = '1',
                              date_added = Now()";
                    DB::execute($insert);                
                    }
                break;
            }
           
             
            ?>
            
        	<form id="form-send" method="post" style="width: 530px;display: block;">
            <input type="hidden" value="16" name="action" />
            <input type="hidden" value="<?php echo $res[0] ?>" name="order_status_id" />
            <?php if(isset($res[3])){?>
            <input type="hidden" value="<?php echo $res[1] ?>" name="order_id" />
            <input type="hidden" value="<?php echo $res[2] ?>" name="vendor_id" />
            <?php }else{ ?>
            <input type="hidden" value="<?php echo $res[1] ?>" name="order_product_id" />
            <input type="hidden" value="<?php echo $res[2] ?>" name="product_id" />
            <?php } ?>            
            
            <input type="hidden" value="<?php echo $d[0]['email'];?>" name="email" id="email" />
            <table>
            <tr>
            	<td valign="top" colspan="2"><label for="name"><?php echo " Will notify the customer shipping" ?></label></td>
            	  </tr>
            <tr>
            	<td valign="top"><label for="name"># Tracking:</label></td>
            	<td><input type="text" name="num_tracking" id="num_tracking" class="text ui-widget-content ui-corner-all" />
        		</td>
            </tr>
            <tr>
            	<td valign="top"><label for="name">Email:</label></td>
            	<td><?php echo $d[0]['email'];?></td>
            </tr>
            <tr>
            	<td valign="top"><label for="name">Subject:</label></td>
            	<td><input type="text" name="subject" id="subject" value="<?php echo $subject ?>" class="text ui-widget-content ui-corner-all" style="width: 280px;" /></td>
            </tr>
            <tr>
            	<td valign="top"><label for="name">Content Email:</label></td>
            	<td><textarea name="content" id="contect" cols="60" rows="10"><?php echo $content ."\n\n"?></textarea></td>
            </tr>
            <tr>
            	<td valign="top"><label for="name"></label></td>
            	<td></td>
            </tr>
            </table>
        	</form>            
            <?php
        }
        
                
        break;   
    case 14: //get categories 
        ?>
        <select name="category_id" id="category_id" class="left" onchange="exeAjax('id='+this.value+'&action=2', 'cat-subcat', false)" >
            <option value="">Select</option>
            <?php 
            $mycat = DB::result("SELECT mycategories from users where user_id = '". $_GET["id"]  ."'");
            if($mycat==""){
                echo DB::db_options("SELECT `category_id`, `category_name` FROM `categories` order by `category_id`", $p['category_id']);
            }else{
                echo DB::db_options("SELECT `category_id`, `category_name` FROM `categories` where category_id IN ($mycat) order by `category_id`", $p['category_id']);
            }
            ?>
        </select>        
        <?php
        break;
    case 15:
        switch($_POST['method'])
        {
            case 1:
                if($st[0] == '3')
                {
                    $statusid = '0';
                }
                $st = explode(":::", $_POST['newstatus']);
                $insert = "INSERT INTO order_history SET
                          product_id = '".$_POST['product']."',
                          order_id = '".$_POST['order']."', 
                          order_status_id = '".$st[0]."',
                          notify = '".$statusid."',
                          date_added = Now()";
                DB::execute($insert);
                if(isset($st[3]))
                $sql = "UPDATE `order_product` SET `order_status_id`='". $st[0] ."' WHERE (`order_id`='". $st[1] ."' AND `vendor_id`='". $st[2] ."')   ";
                else
                $sql = "UPDATE `order_product` SET `order_status_id`='". $st[0] ."' WHERE (`order_product_id`='". $st[1] ."')   ";
                echo $sql . "  ";
                DB::execute($sql);
            break;
            case 2:
                $st = explode(":::", $_POST['newstatus']);
                
                foreach($_POST['product'] as $key => $valor)
                {   
                    $insert = "INSERT INTO order_history SET
                              product_id = '".$valor['value']."',
                              order_id = '".$_POST['order']."', 
                              order_status_id = '".$st[0]."',
                              notify = '".$statusid."',
                              date_added = Now()";
                    DB::execute($insert);                
                }
                if(isset($st[3]))
                $sql = "UPDATE `order_product` SET `order_status_id`='". $st[0] ."' WHERE (`order_id`='". $st[1] ."' AND `vendor_id`='". $st[2] ."')   ";
                else
                $sql = "UPDATE `order_product` SET `order_status_id`='". $st[0] ."' WHERE (`order_product_id`='". $st[1] ."')   ";
                echo $sql . "  ";
                DB::execute($sql);
            break;
        }        
        break;

    case 16:
    
        if(isset($_POST['order_id']))
        $sql = "UPDATE `order_product` SET `order_status_id`='". $_POST['order_status_id'] ."' WHERE (`order_id`='". $_POST['order_id'] ."' AND `vendor_id`='". $_POST['vendor_id'] ."')   ";
        else
        $sql = "UPDATE `order_product` SET `order_status_id`='". $_POST['order_status_id'] ."' WHERE (`order_product_id`='". $_POST['order_product_id'] ."')   ";
        echo $sql . "  " . DB::execute($sql);
        
         send_email($_POST['email'], $_POST['subject'], $_POST['content']);
        break;
    case 17:

//allow db updates (assumes first column is the primary key of the table)
$option_db_allow_update = 1;

//delay answering ajax requests (demonstrates the first "A" in AJAX) 
$option_delay_seconds = 2;

//all ajax requests are logged to this file
$option_ajax_log_file = "./temp/ajax_log.txt";


//==============================================================================
// AJAX HANDLER
//==============================================================================
if (isset($_POST['ajax'])) {
    if ($option_ajax_log_file) {
        $open = fopen($option_ajax_log_file, 'a');
        fwrite($open, serialize($_REQUEST));
        fwrite($open, "\r\n");
        fclose($open);
    }

    extract($_POST);

    switch ($ajax) {
        case 'nav':
            /*
              AJAX 'nav' request variables:
              $ajax:     the ajax command ('nav')
              $tbl:      table name
              $pos:      new position (1 based)
              $sortcol:  columnname to sort on
              $sortdesc: set to 1 if sort descending

              the AJAX reply is the new table body
             */
            $at = BuildTable($tbl, $pos, $sortcol, $sortdesc);
            echo $at->GenerateTableSpan();
            break;
        case 'updcell':
            /*
              AJAX 'updcell' request variables:
              $ajax:  the ajax command ('updcell')
              $tbl:   table name
              $rowid: row id
              $colid: columnname
              $new:   the new cell value that was typed into the text input
              $old:   old value

              the AJAX reply is the error message, or empty on success
             */

            //update the database
            if ($option_db_allow_update) {
                
                
                //NOTE: assumes first column is the primary key of the table
                $col_rowid = mysql_field_name(mysql_query("SELECT * FROM `$tbl` LIMIT 1"), 0);
                $sql = "UPDATE `$tbl` SET `$colid`='$new' WHERE `$col_rowid`='$rowid' LIMIT 1";
                //uncomment next line for strict updates [updates only if data was not changed by another session]
                //$sql = "UPDATE `$tbl` SET `$colid`='$new' WHERE `$colid`='$old' AND `$col_rowid`='$rowid' LIMIT 1";
                if (!mysql_query($sql))
                    echo mysql_error() . " in $sql";
                /*elseif (mysql_affected_rows() == 0)
                    echo "Database table update failed.";*/
            }
            else {
                echo 'Database updates are disabled in example_mysql.php. set $option_db_allow_update to enable.';
            }
            break;
        default:
            echo 'Unknown AJAX cmd';
    }
    /*if ($option_delay_seconds)
        sleep($option_delay_seconds);
        */
    exit();
} 
        
        break; 
    case 18:
    
        if(isset($_POST['id']))
        $sql = "DELETE FROM `tax_rate` WHERE (`id`='". $_POST['id'] ."')";
        echo DB::execute($sql);
        
        break;      
    default :
        break;
        
}
?>




