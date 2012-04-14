<?php 
$res =  explode(':::', $_POST['newstatus']);
        
        //shipping
        if($res[0]==3 || $res[0]==13){
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
                $subject = "Gourmet -- Your order has shipping\n\n";
                $content .= $subject;
            }else{
                $subject = "Gourmet -- Chargeback \n\n";
                $content .= $subject;
            }
            
            $content .= $d[0]['business_name'] . "\n\n";
            $content .= "sent him the following products:  \n\n";
            
            foreach($d as $k => $v){
                $content .= "* " . $v['product_name']. "\n";
            }
            
            switch($_REQUEST['method'])
            {
                case 1:
                    $insert = "INSERT INTO order_history SET
                    product_id = '".$_POST['product']."',
                    order_id = '".$_POST['order']."', 
                    order_status_id = '".$res[0]."',
                    notify = '1',
                    date_added = Now()";
                    DB::execute($insert);
                break;
                case 2:
                    foreach($_POST['product'] as $key => $valor)
                    {   
                    $insert = "INSERT INTO order_history SET
                              product_id = '".$valor['value']."',
                              order_id = '".$_POST['order']."', 
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