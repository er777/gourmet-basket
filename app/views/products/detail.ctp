<!--<div class="modal">
    <div class="overlay"><h1>This product cannot be added to the cart</h1></div>
    <div class="message">message</div>
</div>
-->
<div class="name"><?php echo $products[0]['Product']['product_name'];?></div>
<div class="content_page" style="padding-top: 0px;">
    <div class="image_product">
        <div id="gallery" class="gallery-content">
            <div class="slideshow-container">
                <div id="loading" class="loader"></div>
                <div id="slideshow" class="slideshow"></div>
            </div>
        </div>

        <!-----------------------             pictures to be shown         -------------------------------------------->

        <div id="thumbs" class="navigation">
            <ul class="thumbs noscript">
                <?php if($products[0]['Product']['image']):?>
                <li>
                    <!--image full -->
                    <a class="thumb" name="pic" href = "<?php echo"/admin/images/product/{$products[0]['Product']['image']}";?>">
                        <!--image thumb -->
            <img src="<?php echo"/admin/images/product/{$products[0]['Product']['image']}";?>" width="50" height="50" alt="<?php echo $products[0]['Product']['image']; ?>"/></a>
                </li>
                <?php endif;?>
                <?php if($products[0]['Product']['image_1']):?>
                <li>
                    <!--image full -->
                    <a class="thumb" name="pic" href = "<?php echo"/admin/images/product/{$products[0]['Product']['image_1']}";?>">
                        <!--image thumb -->
                        <img src="<?php echo"/admin/images/product/{$products[0]['Product']['image_1']}";?>" width="50" height="50" /></a>
                </li>
                <?php endif;?>
                <?php if($products[0]['Product']['image_2']):?>
                <li>
                    <!--image full -->
                    <a class="thumb" name="pic" href = "<?php echo"/admin/images/product/{$products[0]['Product']['image_2']}";?>">
                        <!--image thumb -->
                        <img src="<?php echo"/admin/images/product/{$products[0]['Product']['image_2']}";?>" width="50" height="50" /></a>
                </li>
                <?php endif;?>
                <?php if($products[0]['Product']['image_3']):?>
                <li>
                    <!--image full -->
                    <a class="thumb" name="pic" href = "<?php echo"/admin/images/product/{$products[0]['Product']['image_3']}";?>">
                        <!--image thumb -->
                        <img src="<?php echo"/admin/images/product/{$products[0]['Product']['image_3']}";?>" width="50" height="50" /></a>
                </li>
                <?php endif;?>
                <?php if($products[0]['Product']['image_4']):?>
                <li>
                    <!--image full -->
                    <a class="thumb" name="pic" href = "<?php echo"/admin/images/product/{$products[0]['Product']['image_4']}";?>">
                        <!--image thumb -->
                        <img src="<?php echo"/admin/images/product/{$products[0]['Product']['image_4']}";?>" width="50" height="50" /></a>
                </li>
                <?php endif;?>
                <?php if($products[0]['Product']['image_5']):?>
                <li>
                    <!--image full -->
                    <a class="thumb" name="pic" href = "<?php echo"/admin/images/product/{$products[0]['Product']['image_5']}";?>">
                        <!--image thumb -->
                        <img src="<?php echo"/admin/images/product/{$products[0]['Product']['image_5']}";?>" width="50" height="50" /></a>
                </li>
                <?php endif;?>
            </ul>

        </div><!-- thumbs noscript -->

        <div style="clear: both;"></div>

    </div><!--id="thumbs" class="navigation" -->
</div><!-- content_page -->



<!---------------------------------------  end to show pictures  ---------------------------------------------------->

<!---------------------------------------  start product info and form----------------------------------------->


<div class="info_product"> 
    <table class="product-info-table">
        
        <tr>
            <td class="th20" colspan="2"><span class="description"> <?php echo $products[0]['Product']['description'];?> </span></td>
        </tr>
        <tr >
            <td colspan="2"><span class="long-description"> <?php echo $products[0]['Product']['long_description'];?> </span></td>
        </tr>
        <tr >
            <td colspan="2"><strong>Ingredients:</strong><span class="ingredients"><br /><?php echo $products[0]['Product']['ingredients'];?> </span></td>
        </tr>
        <tr><td colspan="2">
        <?php if(!empty($product_mods)):?>
        <strong>Product Features:</strong><br/>
        <?php print $product_mods;?>
        <?php endif;?>
        </td></tr>
        <tr class="th20"> </tr>
        <tr>
            <td width="75"><span class="priceLabel">Price:</span></td>
            <td><span class="price">$<?php echo $products[0]['Product']['selling_price'];?></span></td>
        </tr>
        <tr>
            <td width="75"><span class="quantity">Qty:</span></td>
            <td><?php
                echo $this->Form->create(null, array('url' => array('controller' => 'products', 'action' => 'addcart')));
                echo $form->hidden('product_id', array('value' => $products[0]['Product']['product_id']));
                echo $form->hidden('product_name', array('value' => $products[0]['Product']['product_name']));
                echo $form->hidden('business_name', array('value' => $products[0][0]['bname']));
                echo $form->hidden('price', array('value' => $products[0]['Product']['price']));
                echo $form->input('qty', array('label' => false, 'style' => 'width:40px', 'value' => '1'));
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="button_left"></div>
                <input type='submit' class="button_center" style="width: 120px;" value="Add To Cart">
                <div class="button_right"></div>
                <?php  echo $form->end(); ?>
            </td>
        </tr>
    </table>
</div>




<div style="clear:both"></div>

<div>

	<div class="icon-set">
    	<div class="icons"><img src="../../app/webroot/img/attributes/awards.png" width="50" height="50" /></div>
    <div class="icon-caption">awards</div>
    </div>
    
	<div class="icon-set">
    	<div class="icons"><img src="../../app/webroot/img/attributes/artisanal.png" width="50" height="50" /></div>
    <div class="icon-caption">artisanal</div>
    </div>
   

	<div class="icon-set">
    <div class="icons"><img src="../../app/webroot/img/attributes/fair-trade.png" width="50" height="50" /></div>
    	<div class="icon-caption">fair trade</div>
    </div>

	<div class="icon-set">
    <div class="icons"><img src="../../app/webroot/img/attributes/vegetarian.png" width="50" height="50" /></div>
    	<div class="icon-caption">vegetarian</div>
    </div>

	<div class="icon-set">
    <div class="icons"><img src="../../app/webroot/img/attributes/organic.png" width="50" height="50" /></div>
    	<div class="icon-caption">organic</div>
    </div>

	<div class="icon-set">
    <div class="icons"><img src="../../app/webroot/img/attributes/imported.png" width="50" height="50" /></div>
    	<div class="icon-caption">imported</div>
    </div>

	<div class="icon-set">
    <div class="icons"><img src="../../app/webroot/img/attributes/kosher.png" width="50" height="50" /></div>
    	<div class="icon-caption">kosher</div>
    </div>

</div>



<div> <img src="../../app/webroot/img/social-bar.jpg" width="660" height="27" alt="" /> </div>

 <h2>PAIRINGS & RELATED PRODUCTS</h2>


<div id="carousel-image-and-text" class="touchcarousel grey-blue">
    <ul class="touchcarousel-container">
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/1.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/2.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/3.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/4.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/5.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/6.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/7.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/8.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/9.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/10.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/11.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/12.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/13.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/14.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/15.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
        <li class="touchcarousel-item"> <a class="item-block" href=""> <img src="/app/webroot/img/carousel/16.jpeg" width="148" height="200" />
            <h4>Lorem Ipsum</h4>
            <p>Dolor sit amet</p>
        </a> </li>
    </ul>
</div>



<div class="clear"></div>

</div>

<div class="category-article-wrapper" id="mcs3-container">
<?php if(isset($this_parent_category)):?>

    <div class="category-article-pic">

        <img src="../../app/webroot/img/pantry/<?php echo $this_parent_category["category_image"];?>" width="280" height="240" />
    </div>
    <div class="category-info">
        <?php echo $this_parent_category["category_name"];?></h2>
        <?php echo $this_parent_category["category_article"]; ?>
  </div>
  <?php endif;?>
</div>
<div class="clear"></div>
<div class="vendor-story-wrapper">
    <div class="signup"> <img src="../../app/webroot/img/temp-pics/signup.png" width="460" /> </div>
    <div class="fb-comment">
        <div class="fb-comments" data-href="http://gourmet-basket.com" data-num-posts="3" data-width="440"></div>
    </div>
</div>
</div>
<script type="text/javascript">

// Format for money method.
Number.prototype.formatMoney = function(c, d, t){
var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
 
    var deviation_model = <?php print $deviation_json;?>;
    $('.mod_selector').change(function(){
    var price = <?php echo $products[0]['Product']['selling_price'];?>;
        $('.mod_selector').each(function(){
            $this = $(this);
            $sku = $this.val();
            $model = deviation_model[$sku];
            switch($model['direction']){
            case '+':
                price = (parseFloat(price) + parseFloat($model['retail_deviation']));
                console.log('add' + $model['retail_deviation']);
            break;
            case '-':
                price = (parseFloat(price) - parseFloat($model['retail_deviation']));
                
                console.log('subtract' + $model['retail_deviation']);
            break;
            }
        });
        
        $('.price').html('$');
        $('.price').append(price.formatMoney(2, '.', ','));
        console.log(parseInt(price.formatMoney(2, '.', ',')));
    });
</script>