<table style="font-family: Verdana,sans-serif; font-size: 11px; color: #374953; width: 600px;">
  <tr>
    <td align="left"><a href="http://test.gourmet-basket.com/admin/" title="gourmet-basket.com"><img src="http://gourmet-basket.com/test/app/webroot/img/logo.png" alt="gourmet-basket.com" style="border: none;"/></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">There is a new pending order.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" style="background-color: #D5452A; color:#FFF; font-size: 12px; font-weight: bold; padding: 0.5em 1em;">Order Details</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Order ID: <span style="color: #D5452A; font-weight: bold;"><?php echo $order_info['order_id']; ?></span><br />
      Date Ordered: <?php echo $order_info['date_added']; ?><br />
      Payment Method: <strong><?php echo $order_info['pay_method']; ?></strong><br />
      Shipping Method: <strong><?php echo $order_info['ship_method']; ?></strong><br />
	  <br />
	  Email: <strong><?php echo $order_info['email']; ?></strong><br />
	  Telephone: <strong><?php echo $order_info['phone']; ?></strong><br />
	  IP Address: <strong><?php echo $order_info['ip']; ?></strong>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table style="width: 100%; font-family: Verdana,sans-serif; font-size: 11px; color: #FFFFFF;">
        <tr style="background-color: #CCCCCC; text-transform: uppercase;">
          <th style="text-align: left; padding: 0.3em;">Shipping Address</th>
          <th style="text-align: left; padding: 0.3em;">Payment Address</th>
        </tr>
        <tr>
          <td style="padding: 0.3em; background-color: #EEEEEE; color: #000;">
          <?php echo $order_info['ship_firstname']." ".$order_info['ship_lastname']; ?>,<br />
          <?php echo $order_info['ship_address']; ?>,<br />
          <?php echo $order_info['ship_city'].", ".$order_info['ship_zone']." (".$order_info['ship_zone_code'].")"; ?>,<br />
          <?php echo $order_info['ship_postcode'].", ".$order_info['ship_country']; ?>          
          </td>
          <td style="padding: 0.3em; background-color: #EEEEEE; color: #000;">
          <?php echo $order_info['pay_firstname']." ".$order_info['pay_lastname']; ?>,<br />
          <?php echo $order_info['pay_address']; ?>,<br />
          <?php echo $order_info['pay_city'].", ".$order_info['pay_zone']." (".$order_info['pay_zone_code'].")"; ?>,<br />
          <?php echo $order_info['pay_postcode'].", ".$order_info['pay_country']; ?>          
          </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left"><table style="width: 100%; font-family: Verdana,sans-serif; font-size: 11px; color: #000000;">
        <thead>
            <tr style="background-color: #CCCCCC;">
              <th align="left" style="padding: 0.3em; color: #FFFFFF;">Vendor</th>
              <th align="left" style="width: 15%; padding: 0.3em; color: #FFFFFF;">Product</th>
              <th align="right" style="width: 15%; padding: 0.3em; color: #FFFFFF;">Quantity</th>
              <th align="right" style="width: 15%; padding: 0.3em; color: #FFFFFF;">Unit Price</th>
              <th align="right" style="width: 20%; padding: 0.3em; color: #FFFFFF;">Total</th>
            </tr>
        </thead>
        <?php 
        foreach ($order_info['products'] as $k => $val) {
            $numrow = count($val['reg']);
        ?>   
        <tbody id="vendor_<?php echo $k;?>" style="background-color: #EEEEEE; text-align: center;">
            <tr>
              <td rowspan="<?php echo $numrow;?>" ><?php echo $val['vendor'];?></td>
            <?php 
              $subtotal_vendor = 0;
              $shipping_vendor = 0;
              $total_vendor = 0;
              foreach ($val['reg'] as $key => $value) {
              if ($key == 0) {
            ?>                                                           
              <td><?php echo $value['prod_name'];?></td>
              <td><?php echo $value['quantity'];?></td>
              <td align="right">$<?php echo number_format($value['price'], 2);?></td>
              <td align="right">$<?php echo number_format($value['total'], 2);?></td>
            </tr>
            <?php
              }else{ 
            ?>
            <tr>                                               
              <td><?php echo $value['prod_name'];?></td>
              <td><?php echo $value['quantity'];?></td>
              <td align="right">$<?php echo number_format($value['price'], 2);?></td>
              <td align="right">$<?php echo number_format($value['total'], 2);?></td>
            </tr>
            <?php
              }
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
              <td align="right">$<?php echo number_format($total_vendor, 2);?></td>
            </tr>
        </tbody>
        <?php 
        } 
        ?>
        <tbody id="totals">
            <tr>
              <td colspan="5"></td>
            </tr>
            <tr style="background-color: #CCCCCC;">
              <td colspan="4" align="right" style="background-color: #EEEEEE; font-weight: bold; padding: 0.3em;">Sub-Total:</td>
              <td align="right" style="background-color: #EEEEEE; padding: 0.3em;">$<?php echo number_format($order_info['subtotal_o'], 2);?></td>
            </tr>
            <tr>
              <td colspan="4" align="right" style="background-color: #EEEEEE; font-weight: bold; padding: 0.3em;">Tax:</td>
              <td align="right" style="background-color: #EEEEEE; padding: 0.3em;">$<?php echo number_format($order_info['tax_o'], 2);?></td>
            </tr>
            <tr style="background-color: #CCCCCC;">
              <td colspan="4" align="right" style="background-color: #EEEEEE; font-weight: bold; padding: 0.3em;">Shipping:</td>
              <td align="right" style="background-color: #EEEEEE; padding: 0.3em;">$<?php echo number_format($order_info['shipping_o'], 2);?></td>
            </tr>
            <tr>        
              <td colspan="4" align="right" style="background-color: #EEEEEE; font-weight: bold; padding: 0.3em;">Total:</td>
              <td align="right" style="background-color: #EEEEEE; padding: 0.3em;">$<?php echo number_format($order_info['total_o'], 2);?></td>
            </tr>
        </tbody>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" style="background-color: #D5452A; color: #FFF; font-size: 12px; font-weight: bold; padding: 0.5em 1em;"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <?php if ($order_info['comment']!="") { ?>
  <tr>
    <td align="left" style="background-color: #D5452A; color: #FFF; font-size: 12px; font-weight: bold; padding: 0.5em 1em;"><?php echo $text_comment; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left"><?php echo $order_info['comment']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>