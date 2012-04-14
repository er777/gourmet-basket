<?php
	if( !isset($thiscategory) ) $thiscategory = 'H' ;
	
	//if( !isset($thissubcategory) ) $thissubcategory = 'H' ;
	
	foreach($subcategories as$subcategory) if($subcategory["sc"]["subcategory_id"]==$products[0]["Product"]["category_id"])$thissubcategory=$subcategory["sc"];

?>


<div id="category-article">
    <div id="category-article-name"><?php echo $subcategory_name; ?></div>
<?php /* comment because no article
    <div class="category-article-wrapper" style="height:400px; overflow:scroll;">
        <div style="float:left"><img src="../../app/webroot/img/pantry/<?php echo $thiscategory["category_image"];?>" width="140" height="120" /></div>

        <?php echo$thiscategory["category_article"];?> </div>
    </div>
*/ ?>

<div id="subcat-menu"> 
	<h2>Sub Categories:<br /><?php echo $subcategory_name; ?></h2>
    <?php
    foreach ($subsubcategories as $key => $val) {   ?>
          <ul>
              <li><a href="/products/subsubcategory/<?php echo $val['ssc']['sub_subcat_id'];?>_<?php echo $val['ssc']['sub_subcategory']; ?>">
                  <div class="name"> <?php echo strlen($val['ssc']['sub_subcategory'])>25?substr($val['ssc']['sub_subcategory'],0,35)."...":$val['ssc']['sub_subcategory'];?></div></a>
              </li>
          </ul>
        <?php
    }
    ?>
    </div>




<h1>All Products: <?php echo $subcategory_name; ?></h1>
    <?php
foreach ($products as $val) {
?>

    <div class="content-product">
      <div class="content-img">
      <?php $link = 'detail/' . $val['Product']['product_id'] . '_' . $val['Product']['product_name']; ?>
      <?php echo $html->image('../admin/images/product/'.($val['Product']['image']!=""?$val['Product']['image']:'default.png'), array('border' => '0', 'alt' => 'p', 'title' => 'p', 'width' => '118px', 'height' => '118px',"url"=> $link)); ?>
      </div>

      <a href="/products/detail/<?php echo $val['Product']['product_id'];?>_<?php echo $val['Product']['product_name']; ?>">
	<div class="name-price">
      <div class="p-name"> <?php echo strlen($val['Product']['product_name'])>25?substr($val['Product']['product_name'],0,35)."...":$val['Product']['product_name'];?> </div>

      <div class="price"> $<?php echo $val['Product']['price'];?> </div></a>
	</div>
    
    </div><!--content-product-->
<?php
}
    ?>
</div><!--content-product-wrapper-->

<div class="clear"></div>


<div class="clear-both"></div>
