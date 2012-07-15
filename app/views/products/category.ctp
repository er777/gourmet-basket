<?php
 // category.ctp
$url_array = explode('/',$this->params['url']['url']); // pull full URL path from CAKE.
array_shift($url_array); // kill 'products'
array_shift($url_array); // kill 'category'
$last = count($url_array); 
$growing_crumb_path = '';
$i=1;
foreach ($url_array as $crumb) {
			$readable_crumb = ucwords(str_replace("-", " ", $crumb));
			$growing_crumb_path .= '/' . $crumb;
			$useable_path = ($i < $last ? "/products/category/" . $growing_crumb_path : NULL );
			$this->Html->addCrumb($readable_crumb, $useable_path);
			$i++;
}
?>
<br/>

<div style="margin-bottom:15px">
<?php echo $this->Html->getCrumbs(' > ','Home'); ?>
</div>

<div id="subcat-menu">
      <h3><?php echo $parent_category["name"];?></h3>
      <!--<h3>Products:</h3>-->
      <?php
					if(isset($category['children']) && !empty($category['children'])):
					foreach ($category['children'] as $child) :
					
					?>
      <ul>
         <li><a href="/products/category/<?php echo ($parent_category['slug'] !== $category['slug'] ? $parent_category['slug']."/" : '').$category['slug'] . "/" . $child['slug'];?>">
            <div class="name"><?php echo strlen($child['name']) > 25 ? substr($child['name'], 0, 25) . "..." : $child['name'];?></div>
            </a> </li>
      </ul>
      <?php
					endforeach;
					else:?>
      <p class="small">There are no sub categories within &quot;<?php echo $category['name'];?>&quot;</p>
      <?php endif; ?>
   </div>





<?php if (isset($parent_category["summary"])):?>

<div id="category-summary" class="category-special">
	<?php echo $parent_category["summary"];?>
    <?php endif;?>
    <div class="read-more"><a href="#category-article" >read more...</a></div>
    </div>




</div>
</div>



<div id="category-display">
   
   <h1>All Products in <?php echo $category["name"];?></h1>
   <?php

foreach ($products as $product) :
			if(isset($AllProductsandUsers[$product['Product']['product_id']])):
						$product_id = $product['Product']['product_id'];
						$shop_name = $AllProductsandUsers[$product_id]['shop_name'];
						
						$url = $AllProductsandUsers[$product_id]['url'];
			endif;
?>
   <div class="content-product">
      <div class="content-img">
         <?php $link = $url.'/product/' . $product['Product']['product_id'] . '-' .  str_replace(array("&","/","'",'"'," "), array("-and-","-","","","-"),$product['Product']['product_name']); ?>
         <a href="<?php echo $link;?> "><img src="/admin/images/product/<?php echo ($product['Product']['image']!="" ? $product['Product']['image']:'default.png')?>" height="118" width="118"/></a> </div>
         
      <a href="<?php echo $url;?>/product/<?php echo $product['Product']['product_id'];?>-<?php echo str_replace(array("&","/","'",'"'," "), array("-and-","-","","","-"),$product['Product']['product_name']); ?>">
      
      <div class="name-price">
      
         <div class="p-name"> <?php echo strlen($product['Product']['product_name']) > 25 ? substr($product['Product']['product_name'], 0, 25) . "..." : $product['Product']['product_name']; ?> </div>
         
         <div class="price"> $<?php echo $product['Product']['price'];?> </div>
         
         </a> </div>
				
      <div class="vendor-label"><a href="<?php echo $url; ?>"><?php echo $shop_name; ?></a> </div>
   </div>
   <?php endforeach; ?>
</div>
</div>
<div class="clear"></div>

<!--content-product-wrapper-->

<div class="clear-both"></div>
<div class="view_pagin">
  <?php if($paginator->numbers()){ ?>
  <?php echo $paginator->numbers(); ?> 
  &nbsp;&nbsp;&nbsp; 
  <?php echo  $paginator->prev('Prev', array(), null,  array('class'=>'disabled'));?> 
  &nbsp;|&nbsp; 
  <?php echo  $paginator->next('Next', array(), null,  array('class'=>'disabled'));
  }
  ?>
</div>




