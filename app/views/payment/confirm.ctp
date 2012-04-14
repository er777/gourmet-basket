<!--
<br />
<pre>
<?php  //var_dump($success);?>
</pre>
<br />

-->
<?php if($success=='yes'){?>
<div class="content_page">
    <h1>Congratulations!</h1>
    <p style="font-family: calibri;font-size: 16px; text-align: center">
    Your payment was processed successfully. Please check your e-mail for a confirmation<br />
    receipt from the payment gateway and further information about your shipment.<br />
    You will receive notifications when your items have been shipped.
    </p>
    <br />
    <br />
    <a href="/vendors" style="text-decoration: none;">[ Back to Site ]</a>
</div>
<?php }else{ ?>
<div class="content_page">
    <h1>Sorry !</h1>
    <p style="font-family: calibri;font-size: 16px; text-align: center">
    Your payment was not processed. Please check your data.
    </p>
    <br />
    <br />
    <a href="/payment" style="text-decoration: none;">[ Back to try again ]</a>
</div>
<?php } ?>