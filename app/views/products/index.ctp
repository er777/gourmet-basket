<?php

     $this->Html->addCrumb('Users', '/users');
     $this->Html->addCrumb('Add User', '/users/add');

?>


<div class="all-products-wrapper" >

<?php
foreach ($products as $val) {       
?>

    <div class="content-product" style="background-color:#FC9">
      <div class="content_img"> 
      <?php echo $html->image('../admin/images/product/'.($val['Product']['image']!=""?$val['Product']['image']:'default.png'), array('border' => '0', 'alt' => $val['Product']['product_name'], 'title' => $val['Product']['product_name'], 'width' => '155px', "url"=> array('controller' => 'products', 'action' => 'detail', 'id' => $val['Product']['product_id']))); ?>
      </div>
      
      <?php echo $html->link( strlen($val['Product']['product_name'])>25?substr($val['Product']['product_name'],0,25)."...":$val['Product']['product_name'], array('controller' => 'products', 'action' => 'detail', 'id' => $val['Product']['product_id']), array('class' => 'name')); ?>
      <span class="price"> $<?php echo $val['Product']['price'];?> </span>
      
    </div><!--content-product--> 
<?php
}	
?>
</div><!--content-product-wrapper-->

<div class="clear-both"></div>

<div class="view_pagin">
  <?php //echo  $paginator->counter(array('format' => 'Pagina %page% de %pages%, mostrando %current% registros de %count%'));?>
  <?php echo $paginator->numbers(); ?> &nbsp;&nbsp;&nbsp; <?php echo  $paginator->prev('Prev', array(), null,  array('class'=>'disabled'));?> &nbsp;|&nbsp; <?php echo  $paginator->next('Next', array(), null,  array('class'=>'disabled'));?>
</div>
