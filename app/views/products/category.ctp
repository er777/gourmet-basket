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
<?php echo $this->Html->getCrumbs(' > ','Home'); ?>
<div id="category-article">
<div id="category-article-name"><?php print $category['name'];?></div>
<?php if (isset($parent_category['article'])):?>
    <div class="category-article-wrapper">    
					<div style="float:left">
						<img src="/app/webroot/img/pantry/<?php print $parent_category['image'];?>" width="140" height="120" />
					</div>
		<?php echo $parent_category["article"]; ?>
    </div><?php endif;?>
</div>
</div>
<div id="category-display">
	<div id="subcat-menu">
		<h2><?php echo $parent_category["name"];?></h2>
        <h3>Products:</h3>
					<?php
					if(isset($category['children']) && !empty($category['children'])):
					foreach ($category['children'] as $child) :
					
					?>
            <ul>
            	<li><a href="/products/category/<?php echo ($parent_category['slug'] !== $category['slug'] ? $parent_category['slug']."/" : '').$category['slug'] . "/" . $child['slug'];?>">
                <div class="name"><?php echo strlen($child['name']) > 25 ? substr($child['name'], 0, 25) . "..." : $child['name'];?></div></a>
                </li>
            </ul>
					<?php
					endforeach;
					else:?>
					<p>There are no categories within &quot;<?php echo $category['name'];?>&quot;</p>
					<?php endif; ?>
    </div>
<h1>All Products in <?php echo $category["name"];?></h1>
<?php

foreach ($products as $product) :

?>

<div class="content-product">
    <div class="content-img">
        <?php $link = '/product/' . $product['Product']['product_id'] . '-' .  str_replace(array("&","/","'",'"'," "), array("-and-","-","","","-"),$product['Product']['product_name']); ?>
        <a href="<?php echo $link;?> "><img src="/admin/images/product/<?php echo ($product['Product']['image']!="" ? $product['Product']['image']:'default.png')?>" height="118" width="118"/></a>
				
    </div>
    <a href="/product/<?php echo $product['Product']['product_id'];?>-<?php echo str_replace(array("&","/","'",'"'," "), array("-and-","-","","","-"),$product['Product']['product_name']); ?>">
		<div class="name-price">
            <div class="p-name"> <?php echo strlen($product['Product']['product_name']) > 25 ? substr($product['Product']['product_name'], 0, 25) . "..." : $product['Product']['product_name']; ?> </div>
    
            <div class="price"> $<?php echo $product['Product']['price'];?> </div></a>
		</div>
 <a href=""><?php print  (isset($AllProductsandUsers[$product['Product']['product_id']]) ? $AllProductsandUsers[$product['Product']['product_id']] : '');?></a>      
</div>
<?php endforeach; ?>
</div>


</div>

<div class="clear"></div>


    

<!--content-product-wrapper-->

<div class="clear-both"></div>


