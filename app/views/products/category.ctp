<!--
<br />
<pre>
<?php //print_r($test);?>
</pre>
<br />
-->

<?php
    
	  if( !isset($thiscategory) ) $thiscategory = 'H' ;
	  
	  foreach($categories as$category) if($category["c"]["category_id"]==$products[0]["Product"]["category_id"])$thiscategory=$category["c"];


//
//if( !isset($thissubcategory) ) $thissubcategory = 'HH' ;
//
//foreach($subcategories as$subcategory) if($subcategory["sc"]["subcategory_id"]==$products[0]["Product"]["category_id"])$thissubcategory=$subcategory["sc"];

	 $this->Html->addCrumb('Categories', 'http://test.gourmet-basket.com/categories');
?>


<!--<div id="tea_shoppe">
	<?php //echo $html->image('tea_shoppe.png', array('border' => '0', 'alt' => 'Tea Shoppe', 'title' => 'Tea Shoppe', 'style' => 'margin-left: 117px')); ?>
</div>
-->


<div id="category-article">

<?php echo $this->Html->getCrumbs(' > ','Categories'); ?>
	 

<div id="category-article-name"><?php echo$thiscategory["category_name"];?></div>
       
    <div class="category-article-wrapper">
    
        <div style="float:left">
        	<img src="../../app/webroot/img/pantry/<?php echo$thiscategory["category_image"];?>" width="140" height="120" />
        </div>
        
		<?php echo$thiscategory["category_article"];?>
       
    </div>
    
</div>



</div>

<div id="category-display">

	<div id="subcat-menu">
		<h2><?php echo$thiscategory["category_name"];?></h2>
        <h3>Products:</h3>
		<?php
        foreach ($subcategories as $key => $val) {   ?>
    
            <ul>
               
            	<li><a href="/products/subcategory/<?php echo $val['sc']['subcategory_id'];?>-<?php echo $val['sc']['subcategory']; ?>">
                <div class="name"> <?php echo strlen($val['sc']['subcategory'])>25?substr($val['sc']['subcategory'],0,25)."...":$val['sc']['subcategory'];?> </div></a>
                </li>
    
            </ul>
            
            <?php
        }
    ?>
    
    </div>



<h1>All Products in <?php echo$thiscategory["category_name"];?></h1>
<?php
foreach ($products as $val) {
    ?>

<div class="content-product">
    <div class="content-img">
        <?php $link = 'detail/' . $val['Product']['product_id'] . '-' . $val['Product']['product_name']; ?>
        <?php echo $html->image('../admin/images/product/'.($val['Product']['image']!=""?$val['Product']['image']:'default.png'), array('border' => '0', 'alt' => 'p', 'title' => 'p', 'width' => '118px', 'height' => '118px',"url"=> $link)); ?>
    </div>

    <a href="/products/detail/<?php echo $val['Product']['product_id'];?>-<?php echo $val['Product']['product_name']; ?>">
		<div class="name-price">
            <div class="p-name"> <?php echo strlen($val['Product']['product_name'])>25?substr($val['Product']['product_name'],0,25)."...":$val['Product']['product_name'];?> </div>
    
            <div class="price"> $<?php echo $val['Product']['price'];?> </div></a>
		</div>
        
        
       <!-- /products/vendor/<?php //echo $products[0][0]['bname'] ?>-->
 <a href="">vendor</a>   
 
<?php //echo $val['u']['shop_name'];?> 
   
        
</div><!--content-product-->

<?php }	?>

</div>


</div>

<div class="clear"></div>


    

<!--content-product-wrapper-->

<div class="clear-both"></div>


