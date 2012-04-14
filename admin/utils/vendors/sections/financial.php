<?php
?>

<table class="input left">
  <tr>
    <td colspan="2"><h2 style="text-align:center">FINANCIAL INFORMATION</h2></td>
  </tr>
  
  <tr>
    <td></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td><strong>Vendor Financial Contact</strong></td>
  </tr>
  
  <tr>
    <th>First Name</th>
    <td align="left"><input name="contact_fin_first_name" type="text" class="will-be-required" value="<?php echo $v['contact_fin_first_name'] ?>"/>
      &nbsp;*</td>
  </tr>
  
  <tr>
    <th>Last Name</th>
    <td align="left"><input name="contact_fin_last_name" type="text" class="will-be-required"  value="<?php echo $v['contact_fin_last_name'] ?>"/>
      &nbsp;*</td>
  </tr>
  
  <tr>
    <th>Phone</th>
    <td align="left"><input name="contact_fin_phone" type="text" class="will-be-required"  value="<?php echo $v['contact_fin_phone'] ?>"/>
      &nbsp;*</td>
  </tr>
  
  <!--<tr>
                  <td>eMail for Invoicing Orders</td>
                  <td align="left">
                      <input name="contact_fin_email" type="text" class="will-be-required"  value="<?php //echo $v['contact_fin_email'] ?>"/>
&nbsp;*</td>
              </tr>-->
  

  
  <?php $f = DB::get_single('financial', 'user_id', $user_id); ?>
  <tr>
    <th width="163">Email to send invoice</th>
    <td width="225" align="left"><input name="data[financial][order_email]" type="text" size="30" class="will-be-required" value="<?php echo (isset($f['order_email']))?$f['order_email']:''; ?>"/>
      &nbsp;* </td>
  </tr>
  
  <!-- <tr> 
            <td>
                      <strong>Bank Information</strong>
                  </td>                        
           </tr>   
        <tr>
            <th width="163">Bank Name</th>
            <td width="225" align="left">
                <input name="data[financial][bank_name]" type="text" size="30" class="will-be-required"  value="<?php //echo (isset($f['bank_name']))?$f['bank_name']:''; ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Bank Address</th>
            <td align="left">
                <input name="data[financial][bank_address]" type="text" size="30" class="will-be-required"  value="<?php //echo (isset($f['bank_address']))?$f['bank_address']:''; ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Account Number</th>
            <td align="left">                            
                <input name="data[financial][bank_account]" type="text" size="30" class="will-be-required"  value="<?php //echo (isset($f['bank_account']))?$f['bank_account']:''; ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
            <th>Routing Number</th>
            <td align="left">                            
                <input name="data[financial][bank_routing]" type="text" size="30" class="will-be-required"  value="<?php //echo (isset($f['bank_routing']))?$f['bank_routing']:''; ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr> 
            <td>
                      <strong>Bank Contact Information</strong>
                  </td>                        
           </tr>   
        <tr>
       
        <tr>
            <th>First Name</th>
            <td align="left">
                <input name="data[financial][bank_contact]" type="text" class="will-be-required"  value="<?php //echo isset($f['bank_contact'])?$f['bank_contact']:''; ?>"/>
 &nbsp;*
            </td>
        </tr>
         <tr>
            <th>Last Name</th>
            <td align="left">
                <input name="data[financial][bank_contact]" type="text" class="will-be-required"  value="<?php //echo isset($f['bank_contact'])?$f['bank_contact']:''; ?>"/>
 &nbsp;*
            </td>
        </tr>
        <tr>
         <td></td>
         
          <tr>
            <th>Phone</th>
            <td align="left">                                                        
                <input name="data[financial][bank_phone]" type="text" class="will-be-required"  value="<?php //echo isset($f['bank_phone'])?$f['bank_phone']:''; ?>"/>
 &nbsp;*
            </td>
        </tr>-->
  
  	<tr><td>&nbsp;</td></tr>
    <td colspan="2" align="left"><div style="text-align:left;margin-bottom:10px;font-weight:bold;width:600px">Address to send payments if different from business address.</div></td>
	</tr>
    
  <tr>
    <th>Business Name</th>
    <td align="left"><input name="payment_biz_name" type="text" size="30" class="will-be-required" value="<?php echo $v['payment_biz_name'] ?>"/>
      &nbsp;*</td>
  </tr>
  
  <tr>
    <th>Street</th>
    <td align="left"><input name="payment_street_address" type="text" size="30" class="will-be-required" id="usersPaymentStreetAddress" value="<?php echo $v['payment_street_address'] ?>"/>
      &nbsp;* </td>
  </tr>
  
  <tr>
    <th>City</th>
    <td align="left"><input name="payment_city" type="text" size="30" class="will-be-required" id="usersPaymentCity" value="<?php echo $v['payment_city'] ?>"/>
      &nbsp;* </td>
  </tr>
  
  
<!-- <tr>
  <th>State</th>                            
  <td align="left">
      <span id="zone_span" style="padding: 0px;">
          <select name="zone_id" id="zone_id" class="left" style="width: 198px;">
              <option value="" id="zo-country_id">Select</option>
              <?php //echo DB::db_options("SELECT `zone_id`, `name` FROM `zone` where `country_id` = '" . $v['country_id'] . "' order by `zone_id`", $v['zone_id']) ?>
          </select> 
      </span>
      &nbsp;*</td>
</tr>-->

  
   <tr>
    <th>Zip</th>
    <td align="left"><input name="payment_zip" type="text" size="10" class="will-be-required" id="usersPaymentZip" value="<?php echo $v['payment_zip'] ?>"/>
      &nbsp;* </td>
  </tr>
  
</table>
