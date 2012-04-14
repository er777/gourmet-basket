<div class="content_page">
    <h1></h1>
    <pre>
    <?php //print_r($shipping);?>
    </pre>
        <div class="content-fields">
        <form action="shipping" method="post" enctype="multipart/form-data" id="cart">
            <table style="width: 100%;">
            <tr><td colspan="4" style="font-weight: bold;"><span class="title_info">Shipping for products</span></td></tr>
            <tr><td colspan="4" style="font-weight: bold;"><span class="title_info">&nbsp;</span></td></tr>
            <tr>
                <td style="font-weight: bold;"><span class="title_info">Vendor</span></td>
                <td style="font-weight: bold;"><span class="title_info">Product</span></td>
                <td style="font-weight: bold;"><span class="title_info">Qty</span></td>
                <td style="font-weight: bold;"><span class="title_info">Shipping FEDEX</span></td>
                <td style="font-weight: bold;"><span class="title_info">Shipping UPS</span></td>
            </tr>
            <?php
            foreach ($shipping as $shipp) {       
            ?>
                <tr>
                    <td>
                        <?php echo $shipp['business_name'];?> 
                    </td>
                    <td>
                        <?php echo $shipp['product_name'];?> 
                    </td>
                    <td>
                        <?php echo $shipp['qty'];?> 
                    </td>
                    <td>
                        $<?php echo $shipp['ratef'];?> 
                    </td>
                    <td>
                        $<?php echo $shipp['rateu'];?> 
                    </td>
                </tr>
            <?php
            }	
            ?>
            <tr>
                <td style="font-weight: bold;" align="right" colspan="3"><span class="title_info">TOTAL:</span></td>
                <td style="font-weight: bold;">$<?php echo number_format($total_fedex, 2);?></td>
                <td style="font-weight: bold;">$<?php echo number_format($total_ups, 2);?></td>
            </tr>
            <tr>
                <td style="font-weight: bold;" colspan="3"><span class="title_info">Select Option Shipping products</span></td>
                <td style="font-weight: bold;"><input id="CartShipp1" type="radio" value="1" name="data[Cart][shipp]" onclick="$('#cart').submit();" <?php echo $this->Session->read('CartTotal.shipping_method')==1?'checked="true"':''; ?>/></td>
                <td style="font-weight: bold;"><input id="CartShipp2" type="radio" value="2" name="data[Cart][shipp]" onclick="$('#cart').submit();" <?php echo $this->Session->read('CartTotal.shipping_method')==2?'checked="true"':''; ?>/></td>
            </tr>
            </table>
            </form>
        </div>
        <a href="/cart">back to cart <?php echo $this->Session->read('CartTotal.shipping_method'); ?></a>
</div>