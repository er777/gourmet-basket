
<!--<div id="shop-by"></div>-->
    
<ul class="dropEverything">
<li class="top-li pageOne"><a class="top-a" href="/categories">CATEGORIES</a>
<div class="dropEverything-page">
	<h2>Search by Categories</h2>
	<div class="dropEverything-row">
		<h3>Want a full page list of our categories? Go ----><a href="/pages/catalog">HERE</a></h3>
		<div class="dropEverything-col1 jquery-column">
			<div class="dropEverything-inner">
            
<ul>
<?php foreach ($all_categories as $category_name=>$children_and_cat_id) :?>
	<li>
	<a class="hand-drawn" href="/products/category/<?php print $children_and_cat_id['category_id'];?>"><?php print($category_name);?></a>
    <?php if(isset($children_and_cat_id['children'])): ?>
		<ul style="margin-left:10px;">
        	<?php foreach ($children_and_cat_id['children'] as $subcat_name_and_subcat_id) :?>
            <li><a class="hand-drawn" href="/products/subcategory/<?php print $subcat_name_and_subcat_id['subcategory_id'] ;?>"><?php print $subcat_name_and_subcat_id['name'];?></a>
           
            </li>
        	<?php	endforeach;	?>
		</ul>
     <?php endif;?>
     </li>
<?php	endforeach;	?>
</ul>
				
                
			</div>
		</div> <!-- end column -->
	</div> <!-- end row -->
	<div class="dropEverything-row">
		
		<div class="dropEverything-col4">
			<div class="dropEverything-inner">
				
			</div>
		</div> <!-- end column -->
		<div class="dropEverything-col4">
			<div class="dropEverything-inner">
				
			</div>
		</div> <!-- end column -->
		<div class="dropEverything-col4">
			<div class="dropEverything-inner">
				
			</div>
		</div> <!-- end column -->
		<div class="dropEverything-col4">
			<div class="dropEverything-inner">
				
			</div>
		</div> <!-- end column -->
	<br class="clear" />
	</div> <!-- end row -->
</div>
</li>
<li class="top-li pageTwo"><a class="top-a" href="#url">VENDORS</a>
<div class="dropEverything-page">
	
	<div class="dropEverything-row">
		<div class="dropEverything-col1 jquery-column">
        	<div class="dropEverything-inner">
			
		
		
		<?php //echo $this->Form->create( 'Product', array('url' => array('controller' => 'products', 'action' => 'category'))); ?>

      	<?php //echo $this->Form->select('users', $users, null, array('onchange' => "if(this.value!='')window.location.href=this.value") ); ?>
         <? //var_dump($users);?>
        <ul>
				<?php foreach ($users as $path => $anchor_text) :?>
        	<li><a href="<?php print $path;?>"><?php print $anchor_text; ?></a></li>
            	<? endforeach; ?>
		</ul>
		</div>
        
        
        
                <?php //echo $form->end(); ?>
		</div> <!-- end column -->
	</div> <!-- end row -->
</div>
</li>
<li class="top-li pageThree"><a class="top-a" href="/pages/us-markets">US MARKETS</a>
<div class="dropEverything-page">
	<h2>CSS Drop Everything</h2>
	<div class="dropEverything-row">
		
		<div class="dropEverything-col1">
			<div class="dropEverything-inner">
				<div class="flyoutMenu">
					
				</div>
				<img src="dropEverything/pic8.jpg" alt="" class="dropEverything-imageLeft" />
				
			</div>
		</div> <!-- end column -->
	</div> <!-- end row -->
</div>
</li>
<li class="top-li pageFour"><a class="top-a" href="#url">INT'L MARKETS</a>
<div class="dropEverything-page">
	<h2>Drop Everything</h2>
	<div class="dropEverything-row">
		
		<div class="dropEverything-col1">
			<div class="dropEverything-gallery">
				
			</div>
		</div> <!-- end column -->
		<br class="clear" />
	</div> <!-- end row -->
</div>
</li>
<li class="top-li pageFive"><a class="top-a" href="#url">Contact Form</a>
<div class="dropEverything-page">
	<h2>CONTACT FORM</h2>
	<div class="dropEverything-row">
		<h3>Contact Form</h3>
		<div class="dropEverything-col1">
			<form class="dropEverything-form" action="" action="post">
				<label for="name">Name : </label><input name="name" id="name" type="text" value="Name" onfocus="if (this.value == 'Name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Name';}" /><br />
				<label for="email">Email : </label><input name="email" id="email" type="text" value="Email" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}" /><br />
				<label for="website">Website : </label><input name="website" id="website" type="text" value="http://" /><br />
				<label for="subject">Subject : </label><input name="subject" id="subject" type="text" value="Subject" onfocus="if (this.value == 'Subject') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Subject';}" /><br />
				<label for="message">Message : </label><textarea name="message" id="message"></textarea><br />
				<button type="submit" class="submit">Submit</button>
				<br class="clear" />
			</form>
		</div> <!-- end column -->
	</div> <!-- end row -->
</div>
</li>
<li class="top-li pageSix"><a class="top-a" href="#url">Combo Page</a>
<div class="dropEverything-page">
	<h2>Drop Everything</h2>
	<div class="dropEverything-row">
		
		<div class="dropEverything-col2">
			<div class="dropEverything-inner">
				<div class="flyoutMenu">
					
				</div>
			</div>
		
			
		</div>
		<div class="dropEverything-col2">
			<div class="dropEverything-inner">
				<div class="dropdownMenu">
					
				</div>
				<br class="clear" />
			
				
				<br class="clear" />
			</div>
		</div> <!-- end column -->
		<br class="clear" />
	</div> <!-- end row -->
	<div class="dropEverything-row">
		
		<div class="dropEverything-col3">
			
		</div> <!-- end column -->
		<div class="dropEverything-col3">
			
		</div> <!-- end column -->
		<div class="dropEverything-col3">
			
		</div> <!-- end column -->
		<br class="clear" />
	</div> <!-- end row -->
	<div class="dropEverything-row">
		
		
		<br class="clear" />
	</div> <!-- end row -->
</div>
</li>
<li class="top-li top-only"><a class="top-a" href="#url">Top Level</a></li>
<li class="close"><a class="top-a" href="#url">Close <b>X</b></a></li>
</ul>
