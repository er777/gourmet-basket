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

<?php $attributes = array("allergen",
                          "gluten",
                          "vegan",
                          "fat_free",
                          "sugar",
                          "msg",
                          "lactose",
                          "low_carb",
                          "nut",
                          "heart",
                          "no_preservatives",
                          "organic",
                          "kosher",
                          "halal",
                          "fair_traded"
                          );
?>
<div>
<?php foreach ($attributes as $attribute):?>
<?php if(isset($products[0]['Product'][$attribute])) : ?>
<?php if($products[0]['Product'][$attribute] == 1):?>
    <div class="icon-set">
        <div class="icons">
            <img src="../../app/webroot/img/attributes/<?php print $attribute;?>.png" width="50" height="50" />
        </div>
        <div class="icon-caption">
            <?php print str_replace("_"," ",$attribute);?>
        </div>
    </div>
<?php endif;?>
<?php endif;?>
<?php endforeach;?>
</div>
<div><img src="../../app/webroot/img/social-bar.jpg" width="660" height="27" alt="" /> </div>
<?php
if(!empty($products[0]['Product']['related_products'])):
$related_products = unserialize($products[0]['Product']['related_products']);
$sql = "SELECT product_name, product_id, description, image FROM products WHERE product_id IN (".join(",",array_keys($related_products)).")";
$result = mysql_query($sql);?>
<h2>PAIRINGS & RELATED PRODUCTS</h2>
<div id="carousel-image-and-text" class="touchcarousel grey-blue">
    <ul class="touchcarousel-container">
        <?php while ($row = mysql_fetch_object($result)):?>
        <li class="touchcarousel-item">
            <a class="item-block" href="/product/<?php echo $row->product_id;?>">
                <img src="/admin/images/product/<?php echo $row->image; ?>"/>
                <h4><?php echo $row->product_name; ?></h4>
                <p>
                <?php echo (!empty($related_products[$row->product_id]['description']) ? $related_products[$row->product_id]['description'] : $row->description) ; ?>
                </p>
            </a>
        </li>
        <?php endwhile;?>
    </ul>
</div>
<?php endif;?>
<div class="clear"></div>
</div>
<!--<div class="category-article-wrapper" id="mcs3-container">
<?php //if(isset($this_parent_category)):?>

    <div class="category-article-pic">

        <img src="../../app/webroot/img/pantry/<?php echo $this_parent_category["category_image"];?>" width="280" height="240" />
    </div>
    <div class="category-info">
        <?php //echo $this_parent_category["category_name"];?>
        <?php //echo $this_parent_category["category_article"]; ?>
  	</div>
  <?php //endif;?>
</div>-->
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