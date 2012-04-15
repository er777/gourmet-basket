<div id="category-article">
    <div id="category-article-name"><?php echo $subsubcategory_name; ?></div>
    <?php /* comment because no article
    <div class="category-article-wrapper" style="height:400px; overflow:scroll;">
        <div style="float:left"><img src="../../app/webroot/img/pantry/<?php echo $thiscategory["category_image"];?>" width="140" height="120" /></div>

        <?php echo$thiscategory["category_article"];?> </div>
    </div>
*/ ?>
    <div class="clear"></div>

    <h1>Products</h1>

    <div class="content-product-wrapper">

        <?php
foreach ($sscproducts as $val) {
?>

    <div class="content-product">
      <div class="content-img">
      <?php $link = 'detail/' . $val['Product']['product_id'] . '-' . $val['Product']['product_name']; ?>
      <?php echo $html->image('../admin/images/product/'.($val['Product']['image']!=""?$val['Product']['image']:'default.png'), array('border' => '0', 'alt' => 'p', 'title' => 'p', 'width' => '118px', 'height' => '118 px',"url"=> $link)); ?>
      </div>

      <a href="/products/detail/<?php echo $val['Product']['product_id'];?>_<?php echo $val['Product']['product_name']; ?>">
	<div class="name-price">
      <div class="p-name"> <?php echo strlen($val['Product']['product_name'])>25?substr($val['Product']['product_name'],0,25)."...":$val['Product']['product_name'];?> </div>

      <div class="price"> $<?php echo $val['Product']['price'];?> </div></a>
	</div>
    
    </div><!--content-product-->
<?php
}
        ?>
    </div><!--content-product-wrapper-->


    <div class="clear-both"></div>


