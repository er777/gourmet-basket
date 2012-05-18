
<div class="content_page" style="width: 900px">
<h1>Shopping Cart</h1>
<div style="margin-bottom: 10px; display: inline-block; width: 100%; text-align: center;">
      <table class="cart">
        <tr>
          <th>Remove</th>
          <th>Vendor</th>
          <th>Product Name</th>
          <th>SKU</th>
          <th>Qty</th>
          <th>Cost</th>
          <th >Total</th>
          <th>Update</th>
        </tr>
        <?php
        if($session->read('Cart')!=NULL){
            //$v = $this->Session->read('Cart')
            $arraycart = $this->Session->read('Cart');
            foreach($this->Session->read('Cart') as $i => $v){
           //echo '---------------'.$i.'---------------------';
        ?>
        <tr>
          <td>
              <form action="/products/removeitemcart" method="post">
                  <?php echo $this->Form->hidden('product_id', array('value' => $arraycart[$i]['product_id'])); ?>
                  <input type="submit" class="button_center" style="width: 80px; height: 30px" value="Remove">
              <?php  echo $form->end(); ?>
              <?php //echo $this->Form->checkbox('remove', array('value' => $arraycart[$i]['product_id'])); ?></td>
          <td><?php echo $arraycart[$i]['business_name'];?></td>
          <td><?php echo $arraycart[$i]['product_name'];?></td>
          <td>
              <?php echo $arraycart[$i]['features']; ?>
          </td>
          <td><form action="/products/updateitemcart" method="post">
              <?php echo $this->Form->text('qty', array('value' => $v['qty'], 'size' => '5')); ?></td>
          <td>$<?php echo $v['price'];?></td>
          <td>$<?php echo number_format($v['tot'], 2);?></td>
          <td>

                  <?php echo $this->Form->hidden('product_id', array('value' => $arraycart[$i]['product_id'])); ?>
                  <input type="submit" class="button_center" style="width: 80px; height: 30px" value="Update">
                  <?php  echo $form->end(); ?>
          </td>
        </tr>
        <?php 
        }
        }else{
        ?>
        <tr>
          <td colspan="6" align="center"><b>Your Shopping Cart is empty</b></td>
        </tr> 
        <?php   
        }
        ?>
      <tr><td>&nbsp;</td></tr>
      </table>
      <?php
        if($this->Session->read('CartTotal') != NULL){
            $carttotal = $this->Session->read('CartTotal');
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
            <td style="text-align: right;"><a class="button" href="/cart/shipping">Click here to compare Fedex and UPS prices. Shipping</a>:</td>
            <td> &nbsp;$ <?php echo number_format($carttotal['shipping'], 2 );?></td>
          </tr>
          <tr>
            <td style="text-align: right;"><b>Total:</b></td>
            <td> &nbsp;$ <?php echo number_format($carttotal['total'], 2 );?></td>
          </tr>
        </table>
      </div>
      <?php   
        }
      ?>
    <br /> <br />
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
                <form action="/products/cleancart" method="post">
                    <div class="button_left"></div>
                    <input type="submit" class="button_center" style="width: 126px; height:28px;" value="Clean cart">
                    <div class="button_right"></div>
                <?php  echo $form->end(); ?>
            </td>

            <td align="left">
                <a class="button" href="/products">
                    <div class="button_left"></div>
                    <div class="button_center" style="width: 126px;">Continue shopping</div>
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
</div>
</div>