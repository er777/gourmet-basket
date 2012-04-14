<div id=123A style="float: left; text-align: left; padding-left: 100px">
<div class="">
    <h1>Account Information</h1>
        <div>
            <h2>Billing Information</h2> 
            <p>
                <b><?php echo $binfo['firstname']. " " . $binfo['lastname'];?></b><br />
                <?php echo $binfo['address'];?><br />
                <?php echo $binfo['city'] .", ". $binfo['state']." ".$binfo['postcode'];?><br />
                <?php echo $binfo['country'];?><br />                
                <br />
                <a href="/checkout/address/billing" style="text-decoration: none;">Change Billing Address</a>
            </p>
             <?php
            //}
            ?> 
        </div>
        <br />
        <br />
        <div>
            <h2>Shipping Information</h2>
            <p>
            <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td>
                <b><?php echo $sinfo['firstname']. " " . $sinfo['lastname'];?></b><br />
                <?php echo $sinfo['address'];?><br />
                <?php echo $sinfo['city'] .", ". $sinfo['state']." ".$sinfo['postcode'];?><br />
                <?php echo $sinfo['country'];?><br />                
                <br />
                <a href="/checkout/address/shipping" style="text-decoration: none;">Change Shipping Address</a>
                <br />
                <br />
                <br />
                
                <a href="/payment" class="button">
                    <div class="button_left"></div>
                    <div class="button_center" style="width: 126px;">Continue</div>
                    <div class="button_right"></div>
                </a>
                </td>
                </tr>
            </table>
        </div>
</div>
</div>

<div id=123B style="float: left; text-align: right; padding-left: 150px; padding-top: 80px">
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
                <?php echo $methodship;?><br />
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