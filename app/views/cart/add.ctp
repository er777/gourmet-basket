
<div class="content_page">
    <h1>Shopping Cart</h1>

    <div style="margin-bottom: 10px; display: inline-block; width: 100%; text-align: center;">
        <form action="" method="post" enctype="multipart/form-data" id="cart">
            <table class="cart">
                <tr>
                    <th>Remove</th>
                    <th>Vendor</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Cost</th>
                    <th >Total</th>
                </tr>
                <?php
                if($session->read('Cart')!=NULL){
                    $v = $this->Session->read('Cart')
                    //   foreach($session->read('Cart') as $k => $v){
                    ?>
                    <tr>
                        <td><?php echo $this->Form->checkbox('remove', array('value' => $v['product_id'])); ?></td>
                        <td><?php echo $v['business_name'];?></td>
                        <td><?php echo $v['product_name'];?></td>
                        <td><?php echo $this->Form->text('qty', array('value' => $v['qty'], 'size' => '5')); ?></td>
                        <td>$<?php echo $v['price'];?></td>
                        <td>$<?php echo number_format($v['tot'], 2);?></td>
                    </tr>
                    <?php
                    //   }
                }else{
                    ?>
                    <tr>
                        <td colspan="6" align="center">Shopping Cart is empty</td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
            if($session->read('Cart')!=NULL){
                ?>
                <div style="width: 100%; display: inline-block;">
                    <table style="float: right; display: inline-block;">
                        <tr>
                            <td style="text-align: right;">Subtotal:</td>
                            <td> &nbsp;$ <?php echo number_format($carttotal['subtotal'], 2 );?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><?php echo $carttotal['taxdescription'];?>:</td>
                            <td> &nbsp;$ <?php echo number_format($carttotal['tax'], 2 );?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><a class="button" href="/cart/shipping">Shipping</a>:</td>
                            <td> &nbsp;$ <?php echo number_format($carttotal['shipping'], 2 );?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><b>Total:</b></td>
                            <td> &nbsp;$ <?php echo number_format($carttotal['total'], 2 );?></td>
                        </tr>
                    </table>
                    <br />
                </div>
                <?php
            }
            ?>
            <div style="width: 100%; text-align: right;">
                <table align="right">
                    <tr>
                        <?php
                        if($session->read('Cart')!=NULL){
                            ?>
                            <td align="left">
                                <a class="button" href="/members/track" style="margin-right: 100px; display: block;">
                                    <div class="button_left"></div>
                                    <div class="button_center" style="width: 126px;">Track  Purchases</div>
                                    <div class="button_right"></div>
                                </a>

                            </td>
                            <td align="left">
                                <a class="button" onclick="$('#cart').submit();">
                                    <div class="button_left"></div>
                                    <div class="button_center" style="width: 126px;">Update Cart</div>
                                    <div class="button_right"></div>
                                </a>
                            </td>

                            <td align="left">
                                <a class="button" href="/products">
                                    <div class="button_left"></div>
                                    <div class="button_center" style="width: 126px;">Cancel</div>
                                    <div class="button_right"></div>
                                </a>
                            </td>

                            <td align="right">
                                <a class="button" href="/checkout">
                                    <div class="button_left"></div>
                                    <div class="button_center" style="width: 126px;">Checkout</div>
                                    <div class="button_right"></div>
                                </a>
                            </td>
                            <?php
                        }else{
                            ?>
                            <td align="left">
                                <a class="button" href="/members/track" style="margin-right: 100px; display: block;">
                                    <div class="button_left"></div>
                                    <div class="button_center" style="width: 126px;">Track  Purchases</div>
                                    <div class="button_right"></div>
                                </a>
                            </td>
                            <td align="left">
                                <a class="button" href="/products">
                                    <div class="button_left"></div>
                                    <div class="button_center" style="width: 150px;">Back to shopping</div>
                                    <div class="button_right"></div>
                                </a>
                            </td>
                            <?php
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>