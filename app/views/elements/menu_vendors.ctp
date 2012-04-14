<div id="title_vendor">
<a href="/products/vendor/<?php echo $products[0][0]['bname'] ?>">
<?php

echo $html->image('logos/'.$products[0]['u']['logo'], array('border' => '0', 'alt' => 'Vendor', 'title' => 'Vendor' , 'id' => 'title_vendor'));

?>
</a>

</div>
<ul>
    <li class="blades"><a href="#summary">OUR STORY</a></li>
    <!--<li><?php //echo $html->image('vendor_menu2.png', array('border' => '0', "alt"=>"About", "title"=>"About", "url"=> array('controller' => 'pages', 'action' => 'about'))); ?></li>-->
    <li class="blades"><a href="/policies" title="" alt="">POLICIES</a></li>
   <!-- <li><?php //echo $html->image('vendor_menu4.png', array('border' => '0', "alt"=>"Return", "title"=>"Return", "url"=> array('controller' => 'pages', 'action' => 'return'))); ?></li>-->
   <li class="blades"><a href="/pages/recipies" title="" alt="">RECIPES</a></li>
    <!--<li><?php //echo $html->image('menus/tips.png', array('border' => '0', "alt"=>"Tips", "title"=>"Tips", "url"=> array('controller' => 'pages', 'action' => 'contact'))); ?></li>-->
</ul>

<?php if(isset($products[0]['u']['image1']) && $products[0]['u']['image1']!=''){ ?>
<div class="imgvendor">

<?php echo $html->image('logos/'.$products[0]['u']['image1'], array('border' => '0', 'alt' => 'Vendor', 'title' => 'Vendor' )); ?>

</div>
<?php } ?>

<?php if(isset($products[0]['u']['image2']) && $products[0]['u']['image2']!=''){ ?>

<div class="imgvendor">

<?php  echo $html->image('logos/'.$products[0]['u']['image2'], array('border' => '0', 'alt' => 'Vendor', 'title' => 'Vendor' )); ?>


</div>



<?php } ?>



<!-- -->