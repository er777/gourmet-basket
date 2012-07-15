<?php echo $html->css('members.css') ?>
<script type="text/javascript">
<!--
$(document).ready(function() {
    //Default Action
    $(".vtabs-content").hide(); //Hide all content
    $("div.vtabs a:first").addClass("selected").show(); //Activate first tab
    $(".vtabs-content:first").show(); //Show first tab content

    //On Click Event
    $("div.vtabs a").click(function() {
        $("div.vtabs a").removeClass("selected"); //Remove any "active" class
        $(this).addClass("selected"); //Add "active" class to selected tab
        $(".vtabs-content").hide(); //Hide all tab content
        var activeTab = $(this).attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active content
        return false;
    });
});
//-->
</script>
<div class="detaill-account">
        <b>Order No.: </b><?php  echo $order_id ?>
        <span><a href="/members/orders">BACK TO ORDERS</a></span>
</div>
<div style="clear: both;"></div>

<div id="tabs-items">
    <div class="vtabs">
        <a href="#tab-product">Products</a>
        <a href="#tab-history">Order History</a>
    </div>
</div>
<div class="checkout-orders">
    <div id="tab-product" class="vtabs-content">
        <table class="cart-heading" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Shop Name</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php if(count($products)){?>
                <?php foreach($products As $key => $value){?>
                <tr>
                    <td><?php echo (isset($value['o_product_id'])) ? $value['o_product_id'] : null?></td>
                    <td><?php echo (isset($value['o_status'])) ? $value['o_status'] : null?></td>
                    <td><?php echo (isset($value['o_shop_name'])) ? $value['o_shop_name'] : null ?></td>                    
                    <td><?php echo (isset($value['o_name'])) ? $value['o_name'] : null?></td>
                    <td><?php echo (isset($value['o_unit_price'])) ? $value['o_unit_price'] : null?></td>
                    <td style="text-align: center;"><?php echo (isset($value['o_quantity'])) ? $value['o_quantity'] : null?></td>
                </tr>
                <?php }?>
            <?php }?>
            </tbody>
        </table>
    </div>
    <div id="tab-history" class="vtabs-content">
        <div id="history">
            <table class="list">
              <thead>
                <tr>
                  <td class="left"><b>Date Added</b></td>
                  <td class="left"><b>Comment</b></td>
                  <td class="left"><b>Status</b></td>
                  <td class="left"><b>Customer Notified</b></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="left">28/12/2011</td>
                  <td class="left"></td>
                  <td class="left">Pending</td>
                  <td class="left">Yes</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>