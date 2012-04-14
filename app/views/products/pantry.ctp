<!--
<br />
<pre>
<?php //print_r($products);?>
</pre>
<br />
-->
<div id="tea_shoppe">
	<?php echo $html->image('tea_shoppe.png', array('border' => '0', 'alt' => 'Tea Shoppe', 'title' => 'Tea Shoppe')); ?>
</div>

<div class="content-product_wrapper">pantry

<?php
$i = count($products);
//echo $i;
    
foreach ($products as $k => $val) { 
    $val = $val['Product'];
   if( count($products) >= 1 && $val['product_id'] != ""){
?>
    <div class="content-product">
      <div class="content_img"> 
      <?php echo $html->image('../admin/images/product/'.($val['image']!=""?$val['image']:'default.png'), array('border' => '0', 'alt' => $val['description'], 'title' => $val['description'], 'width' => '155px', "url"=> array('controller' => 'products', 'action' => 'detail', 'id' => $val['product_id']))); ?>      
      </div>
      <a href="/products/detail/<?php echo $val['product_id'];?>">
      
      <span class="name"> <?php echo strlen($val['product_name'])>25?substr($val['product_name'],0,25)."...":$val['product_name'];?> </span>
      
      <span class="price"> $<?php echo $val['price'];?> </span></a> 
      
    </div><!--content-product--> 
<?php 
    }else{
?>
    <div class="content-product">
      <div class="content_img"> 
      <a href="/vendors"> 
      <?php echo $html->image('../admin/images/product/default.png', array('border' => '0', 'alt' => $val['description'], 'title' => $val['description'], 'width' => '155px')); ?> 
      </a>
      </div>
      
      <a href="/vendors">
      
      <span class="name"> STILL NO PRODUCT </span>
      
      </a> <span class="price">  </span>
      
    </div><!--content-product--> 
<?php      
    }
}	
?>
</div><!--content-product-wrapper-->

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
