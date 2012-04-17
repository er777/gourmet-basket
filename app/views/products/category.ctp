<?php
 // category.ctp
?>
<?php	 $this->Html->addCrumb('All Categories', 'categories'); ?>
<?php	 $this->Html->addCrumb($parent_category['name']); ?>
<?php if($category['name'] !== $parent_category['name']) $this->Html->addCrumb($category['name']); ?>
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
					pr($parent_category['slug']);
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
foreach ($products as $product) :?>

<div class="content-product">
    <div class="content-img">
        <?php $link = 'product/' . $product['Product']['product_id'] . '-' . str_replace(array("&"," ","/"), array("-"),$product['Product']['product_name']); ?>
        <?php echo $html->image('../admin/images/product/'.($product['Product']['image']!=""?$product['Product']['image']:'default.png'), array('border' => '0', 'alt' => 'p', 'title' => 'p', 'width' => '118px', 'height' => '118px',"url"=> $link)); ?>
    </div>
    <a href="/product/<?php echo $product['Product']['product_id'];?>-<?php echo str_replace(array("&"," ","/"), array("-"),$product['Product']['product_name']); ?>">
		<div class="name-price">
            <div class="p-name"> <?php echo strlen($product['Product']['product_name']) > 25 ? substr($product['Product']['product_name'], 0, 25) . "..." : $product['Product']['product_name']; ?> </div>
    
            <div class="price"> $<?php echo $product['Product']['price'];?> </div></a>
		</div>
 <a href="">vendor</a>      
</div>
<?php endforeach; ?>
</div>


</div>

<div class="clear"></div>


    

<!--content-product-wrapper-->

<div class="clear-both"></div>


