<div id=123A style="float: left; text-align: left;">
<form action="payment/confirm" id="confirmFrm" method="post">
<!--
<br />
<pre>
<?php //print_r($m);?>
</pre>
<br />
-->
<?php echo $this->Form->hidden('first_name',array('value' => $m['m']['firstname'])); ?>
<?php echo $this->Form->hidden('last_name', array('value' => $m['m']['lastname'])); ?>
<?php echo $this->Form->hidden('email',     array('value' => $m['m']['email'])); ?>
<?php echo $this->Form->hidden('address1',  array('value' => $m['a']['address'])); ?>
<?php echo $this->Form->hidden('address2',  array('value' => $m['a']['address'])); ?>
<?php echo $this->Form->hidden('city',      array('value' => $m['a']['city'])); ?>
<?php echo $this->Form->hidden('zip',       array('value' => $m['a']['postcode'])); ?>
<?php echo $this->Form->hidden('country',   array('value' => $m['c']['iso_code_2'])); ?>
<?php echo $this->Form->hidden('state',     array('value' => $m['z']['name'])); ?>
<?php echo $this->Form->hidden('payment_amount', array('value' => $total)  ); ?>
<?php echo $this->Form->hidden('ip_address', array('value' => $_SERVER['REMOTE_ADDR'])  ); ?>


     <div align="left">
    <h1>Credit Card Details</h1>
     </div>
    <table class="form">
    <tbody><tr>
      <td>Card Owner:</td>
        <td>
        <?php echo $this->Form->text('cc_owner'); ?>
        </td>
    </tr>
    <tr>
      <td>Card Number:</td>
      <td>
      <?php echo $this->Form->text('cc_number'); ?>
      </td>
    </tr>
    <tr>
      <td>Card Type:</td>
      <td>
      <select class="select" name="data[cc_type]">
        <option value="">select</option>
        <option value="VISA">Visa</option>
        <option value="MASTERCARD">MasterCard</option>
        <option value="DISCOVER">Discover Card</option>
        <option value="AMEX">American Express</option>
    </select>
      </td>
    </tr>
    <tr>
      <td>Card Expiry Date:</td>
      <td><select name="data[cc_expire_date_month]">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
        /
        <select name="data[cc_expire_date_year]">
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                  </select></td>
    </tr>
    <tr>
      <td>Card Security Code (CVV2):</td>
      <td>
       <?php echo $this->Form->text('cc_cvv2',array('size' => 3)); ?>
      </td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td>
       <?php echo $this->Form->submit();?>
      </td>
    </tr>
  </tbody>
  </table>
</form>
</div>
<div id=123B style="float: left; text-align: right; padding-left: 150px">
    <table>
    <tr><td><h1>Review your cart</h1></td></tr>
    <tr>
    <td>
        <b>Subtotal:</b>
    <td>
        $<?php echo number_format($subtotal, 2);?>
    </td>
    <tr>
    <td>
        <b>Tax Description:</b>
    </td>
    <td>    
        <?php echo $taxdescription; ?>
    </td>
    </tr>
    <tr>
    <td>    
        <b>Tax:</b>
    </td>    
    <td>    
        $<?php echo number_format($tax, 2);?>
    </td>
    </tr>
    <tr>
    <td>
        <b>Shipping Method:</b>
    </td>
    <td>
        <?php echo $method_ship;?><br />
    </td>
    </tr>
    <tr>
    <td>
        <b>Shipping Price:</b><br />
    </td>
    <td>
        $<?php echo number_format($costship, 2);?>
    </td>
    </tr>
    <tr>
    <td>
        <b>Total:</b><br />
    </td>
    <td>
        $<?php echo number_format($total, 2);?>
    </td>
    </tr>
    </table>
</div>