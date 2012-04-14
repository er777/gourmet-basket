<?php
?>

<table>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Customer Service Contact</strong></td>
  </tr>
  
  <tr>
    <td>Name</td>
    <td align="left"><input name="cust_service_contact" type="text"  value="<?php echo $v['cust_service_contact'] ?>"/>
      &nbsp;*</td>
  </tr>
  
  <tr>
    <td>Phone</td>
    <td align="left"><input name="cust_service_phone" type="text"  value="<?php echo $v['cust_service_phone'] ?>"/>
      &nbsp;*</td>
  </tr>
  
  <tr>
    <td>Extension</td>
    <td align="left"><input name="cust_service_phone_ext" type="text"  value="<?php echo $v['cust_service_phone_ext'] ?>"/>
      &nbsp;*</td>
  </tr>
  
  <tr>
    <td>eMail</td>
    <td align="left"><input name="cust_service_email" type="text"  value="<?php echo $v['cust_service_email'] ?>"/>
      &nbsp;*</td>
  </tr>
  

</table>

<br />

<p><a href="../../app/webroot/documents/CustomerService.pdf" style="color:#C00;font-size:90%">Click here</a> for Gourmet Basket's Standard Customer Service Policy as it will appear in your Shoppe.</p>
<div> Do you want to use this wording?
  
    <p>
      <label>
        <input type="radio" name="Customer Service" value="1" id="CustomerService_0" />
        	YES</label>
      <br />
      <label>
        <input type="radio" name="Customer Service" value="0" id="CustomerService_1" />
        NO</label>
      <br />
    </p>
  
</div>

<div>If not, state your Customer Service Policy as you would like it to be seen in your Shoppe, subject to Gourmet Basket's Approval
</div>

  <br /><br />
  <textarea name="data[customer_service][questions]" id="customer_serviceQuestions" cols="60" rows="5"><?=$c["questions"]?>
				</textarea>


<br />
