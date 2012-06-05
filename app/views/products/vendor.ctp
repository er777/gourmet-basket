<?php
preg_match("/^\/(.*?)[\/]{0,1}$/",$this->here,$matches);
$clean_url = explode("/", $matches[1]);
$unsafe_slug = array_pop($clean_url);
$safe_slug = filter_var($unsafe_slug, FILTER_SANITIZE_STRING);
switch (count($clean_url)){
	case 3:
		$sql = "SELECT category_name as name from categories WHERE slug = '".$safe_slug."'";
		break;
	case 4:
		$sql = "SELECT subcategory as name from subcategories WHERE slug = '".$safe_slug."'";
		break;
	case 5:
		$sql = "SELECT sub_subcategory as name from sub_subcategories WHERE slug = '".$safe_slug."'";
		break;
}
if(isset($sql)){
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)){
		$name = $row['name'];
	}
}
?>
<div id="tea_shoppe">
	<?php echo $html->image('awning-cont.png', array('border' => '0', 'alt' => 'awning', 'width' => '670','title' => 'awning')); ?>
    <div id="shop-info"><?php echo $products[0]['u']['shop_name'] . (isset($name) ? ": ".$name : '') ?></div>
</div>

<div class="vendor-content-product-wrapper">

<?php
$i = count($products);
//echo $i;
    
	foreach ($products as $k => $val) { 
    $val = $val['Product'];
   	if( count($products) >= 1 && $val['product_id'] != ""){
?>
    <div class="content-product">
      <div class="content-img">
      <a href="/product/<?php echo $val['product_id'] . '-' . str_replace(array("&","/","'",'"'," "), array("-and-","-","","","-"),$val['product_name']);?>">
      <img height= "110" width="110" src="/admin/images/product/<?php echo ( $val['image'] != "" ? $val['image'] : 'default.png' ); ?>" alt="<?php echo  $val['description'];?>" />
      </a>
      
        																										 <!-- 'class' =>'resizeme',-->
      </div>
          <a href="/product/<?php echo $val['product_id'];?>-<?php echo str_replace(array("&","/","'",'"'," "), array("-and-","-","","","-"),$val['product_name']);?>">
              <div class="name-price">
                <div class="p-name"> <?php echo strlen($val['product_name'])>40?substr($val['product_name'],0,40)."...":$val['product_name'];?> </div>
                <div class="price"> $<?php echo $val['price'];?> </div>
               
              </div>
          </a> 
      
      
    </div><!--content-product--> 
    
<?php 
    }else{
?>

    <div class="content-product">
      <div class="content-img"> 
      <a href="/vendors"> 
      <?php echo $html->image('../admin/images/product/default.png', array('border' => '0', 'alt' => $val['description'], 'title' => $val['description'], 'width' => '135px')); ?> 
      </a>
      </div>
      
      <a href="/vendors">
      
      <span class="name"> STILL NO PRODUCT </span>
      
      </a> <div class="price">  </div>
      
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


