<div id="title_vendor">
<a href="/<?php //echo $products[0]['u']['short_name'] ?>">
<?php

echo $html->image('logos/'.$products[0]['u']['logo'], array('border' => '0', 'alt' => 'Vendor', 'title' => 'Vendor' , 'id' => 'title_vendor'));

?>
</a>
<style type="text/css">
body #menu_vendor .blades{
  height:auto!important;
padding: 10px 0!important;
}
  body #menu_vendor ul.subMenu{
    float: none;
    height: auto;
    margin: 0 0 0 15px;
    text-align: left;
  }
  body #menu_vendor ul.subMenu li{
    float:none;
    height:auto;
    padding: 2px 0;
  }
  body #menu_vendor ul.subMenu li a:hover{
    border-bottom:1px solid #fff;
  }
</style>
</div>
<ul>
<li class="blades"><a href="#" class="ourCategoriesTrigger">OUR CATEGORIES</a>
<?php echo ($ownedProductsByCategory);?></li>
    <li class="blades"><a href="#summary">OUR STORY</a></li>
    <!--<li><?php //echo $html->image('vendor_menu2.png', array('border' => '0', "alt"=>"About", "title"=>"About", "url"=> array('controller' => 'pages', 'action' => 'about'))); ?></li>-->
    <li class="blades"><a href="/policies" title="" alt="">POLICIES</a></li>
   <!-- <li><?php //echo $html->image('vendor_menu4.png', array('border' => '0', "alt"=>"Return", "title"=>"Return", "url"=> array('controller' => 'pages', 'action' => 'return'))); ?></li>-->
   <li class="blades"><a href="/pages/recipies" title="" alt="">RECIPES</a></li>
    <!--<li><?php //echo $html->image('menus/tips.png', array('border' => '0', "alt"=>"Tips", "title"=>"Tips", "url"=> array('controller' => 'pages', 'action' => 'contact'))); ?></li>-->
</ul>
<script type="text/javascript">
  $('.ourCategoriesTrigger').click(function(e){
    e.preventDefault();
    $('.parents.subMenu').slideToggle();
    return false;
  });
</script>
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