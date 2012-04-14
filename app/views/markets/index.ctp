<h4 style="text-align:center">Markets! Click on any item to start your journey.</h4>
<div class="page-title"><h1>US MARKETS</h1></div>


<div id="pantry">

	
<!--<div id="pantry-outside"></div>-->



<div id="left-door">
	<div style="position:absolute"> <img src="../../app/webroot/img/l-door-outside.png" width="234" height="667" /> </div>
  	<div style="position:absolute; left: 5px; top: 30px;"><img src="../../app/webroot/img/l-door-inside.jpg" width="221" height="553" /> </div>
</div>

<div id="right-door">
	<div style="position:absolute;left: -10px; top: -44px;"><img src="../../app/webroot/img/r-door-outside.png" width="220" height="667" /></div>
	<div style="position:absolute;"><img src="../../app/webroot/img/r-door-inside.jpg" width="205" height="546" /></div>
</div>

	<div class="content_category_wrapper">
<?php
foreach ($categories as $cat) {       
?>
		<a class="hand-drawn" href="/products/category/<?php echo $cat['c']['category_id'];?>_<?php echo $cat['c']['category_name'];?>">
  		<div class="cat">
        
        <img src="../../app/webroot/img/pantry/<?php echo $cat['c']['category_image'];?>" width="100" height="100" alt="" />
        
		<span class="category-name"><?php echo $cat['c']['category_name'];?></span>
        </div>
        </a>
  <!--content-product-->
  <?php
}	
?>
  </div>

  </div><!--content-product-wrapper-->
    
</div><!--pantry-->




<h1>Food Category Type</h1>
<div class="content_category_wrapper">

 <?php
foreach ($creations as $pc) {       
?>
  <div class="cat"> <a href="/products/category/pc:<?php echo $pc['pc']['creation_id'];?>"> <?php echo $pc['pc']['type'];?> </a> </div>
  <!--content-product-->
  <?php
}	
?>

</div>

<div class="clear"></div>



<?php echo $this->Form->create( 'Product', array('url' => array('controller' => 'products', 'action' => 'category'))); ?>
<table class="tvendor">
  <tr>
    <td><label>Vendors</label>
      <?php echo $this->Form->select('users', $users, null, array('onchange' => "if(this.value!='')window.location.href=this.value") ); ?></td>
    <td><label>Search</label>
      <?php echo $this->Form->text('search', array('label' => false)); ?></td>
    <td><label>Culinary tradition</label>
      <?php echo $this->Form->select('tradition_id', $list_tradition); ?></td>
    <td><label>Country of manufacture</label>
      <?php echo $this->Form->select('country_id', $countries); ?></td>
  </tr>
  <tr>
    <td colspan="4">
    <h1>Health/nutrition</h1>
      <table>
        <tbody>
          <tr>
            <td><label>Serving Size</label>
              <?php echo $this->Form->text('n_serv_size', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Calories</label>
              <?php echo $this->Form->text('n_cal', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Calories from Fat</label>
              <?php echo $this->Form->text('n_cal_fat', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Servings per Container</label>
              <?php echo $this->Form->text('n_serv_per_cont', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Total Fat</label>
              <?php echo $this->Form->text('n_total_fat', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Saturated Fat</label>
              <?php echo $this->Form->text('n_sat_fat', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Trans Fat</label>
              <?php echo $this->Form->text('n_trans_fat', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
          </tr>
          <tr>
            <td><label>Cholesterol</label>
              <?php echo $this->Form->text('n_chol', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Sodium</label>
              <?php echo $this->Form->text('n_sodium', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Total Carbohydrate</label>
              <?php echo $this->Form->text('n_carbo', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Dietary Fiber</label>
              <?php echo $this->Form->text('n_fiber', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Sugars</label>
              <?php echo $this->Form->text('n_sugar', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Protein</label>
              <?php echo $this->Form->text('n_protein', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Vitamin A</label>
              <?php echo $this->Form->text('n_vit_A', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
          </tr>
          <tr>
            <td><label>Vitamin C</label>
              <?php echo $this->Form->text('n_vit_C', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Calcium</label>
              <?php echo $this->Form->text('n_calcium', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
            <td><label>Iron</label>
              <?php echo $this->Form->text('n_iron', array('label' => false, 'size' => 5, 'title' => 'less than or equal to'));; ?></td>
          </tr>
         <tr>
            <td>
              <label>Search</label>
        		<?php // echo $this->Form->text('search', array('label' => false)); ?>
    		</td>
        </tr>
        </tbody>
      </table>
      </td>
  </tr>
</table>
<?php echo $this->Form->end('Search'); ?>