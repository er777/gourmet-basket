<?php
//if( !isset($thiscategory) ) $thiscategory = 'H' ;
foreach($all_categories as $category) {
	  if($category['category_id'] == $products[0]["Product"]["category_id"]) {
		    $thisCategory = $category;
	  }
}
$this->Html->addCrumb('Categories', 'http://test.gourmet-basket.com/categories');
?>

<div id="category-article"> <?php echo $this->Html->getCrumbs(' > ','Categories'); ?>
  <div id="category-article-name"><?php echo $thisCategory["category_name"];?></div>
  <div class="category-article-wrapper">
    <div style="float:left"> <img src="../../app/webroot/img/pantry/<?php echo $thisCategory["category_image"];?>" width="140" height="120" /> </div>
    <?php echo $thisCategory["category_article"];?> </div>
</div>
</div>
<div id="category-display">
  <div id="subcat-menu">
    <h2><?php echo $thisCategory["category_name"];?></h2>
    <h3>Products:</h3>
    <?php foreach ($thisCategory['children'] as $child) : ?>
    <ul>
      <li><a href="/products/subcategory/<?php echo $child['subcategory_id'];?>-<?php echo $child['child_slug']; ?>">
        <div class="name"><?php print (strlen( $child['name'] ) > 25 ? substr( $child['name'] ,0,25) . "..." : $child['name'] );?> </div>
        </a> </li>
    </ul>
    <?php endforeach;?>
  </div>
  <h1>All Products in <?php echo $thisCategory["category_name"];?></h1>
  <?php
foreach ($products as $val) :?>
  <div class="content-product">
    <div class="content-img">
      <?php $link = 'detail/' . $val['Product']['product_id'] . '-' . $val['Product']['product_name']; ?>
      <?php echo $html->image('../admin/images/product/'.($val['Product']['image']!=""?$val['Product']['image']:'default.png'), array('border' => '0', 'alt' => 'p', 'title' => 'p', 'width' => '118px', 'height' => '118px',"url"=> $link)); ?> </div>
    <a href="/products/detail/<?php echo $val['Product']['product_id'];?>_<?php echo $val['Product']['product_name']; ?>">
    <div class="name-price">
      <div class="p-name"> <?php echo strlen($val['Product']['product_name'])>25?substr($val['Product']['product_name'],0,25)."...":$val['Product']['product_name'];?> </div>
      <div class="price"> $<?php echo $val['Product']['price'];?> </div>
    </div>
    
    <!-- /products/vendor/<?php //echo $products[0][0]['bname'] ?>--> 
    <a href="">vendor</a>
    <?php //echo $val['u']['shop_name'];?>
  </div>
  <!--content-product-->
  <?php endforeach; ?>
</div>
</div>
<div class="clear"></div>
<!--content-product-wrapper-->
<div class="clear-both"></div>
