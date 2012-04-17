
<!--<div id="shop-by"></div>-->
    

  <div class="header-shell">
    
    <ul id="header-nav" class="sf-menu">
    
      <li class="navItem_1"><a href="/products/categories" title="Categories">CATEGORIES</a>
        <div class="navRollover jquery-column">
            <dl class="innerWrap">
                <dd class="col">
                      <div class="utility">
                            <div class="cat-list-wrapper">
                            
        <?php
                    foreach ($categories as $cat) {
        ?>
                      <a class="hand-drawn" href="/products/category/<?php echo $cat['c']['category_id'];?>_<?php echo $cat['c']['category_name'];?>"> <div class="cat-list"><?php echo $cat['c']['category_name'];?></div> </a>
        
        <?php
        }	
        ?>
                            
                            </div>
                      </div>
               </dd>
            </dl>
        </div>
           
      </li>
      
      <li class="navItem_1"><a href="/categories" title="Categories">VENDORS</a>
         <div class="navRollover">
            <dl class="innerWrap">
                <dd class="col">
                      <div class="utility">
                          <div class="vendor-list-wrapper">
                  
                  <? //var_dump($users);?>
                 
                                
                                    <?php foreach ($users as $path => $anchor_text) :?>
                                       <a href="<?php print $path;?>"><?php print $anchor_text;?></a>
                                    <?php endforeach;?>
                                
                          </div>
                    </div>
                  
               </dd>
           </dl>
          
        </div>
      </li>
      
      <li class="navItem_2"><a href="/pages/us-markets" >US MARKETS</a>
        <div class="navRollover">
          <dl class="innerWrap">
            <dd class="col">
              <h5><a href="" title="Computers">Vendors</a></h5>
              
              <?php echo $this->Form->create( 'Product', array('url' => array('controller' => 'products', 'action' => 'category'))); ?>

  <label>Vendors</label>
      <?php echo $this->Form->select('users', $users, null, array('onchange' => "if(this.value!='')window.location.href=this.value") ); ?>
                <?php echo $form->end(); ?>
                
 <a href="/pages/faq">FAQ</a> 
 <a href="/register">REGISTER</a> 
 <a href="/pages/vendor-upload">VENDOR REGISTER 2</a> 
 <a href="/pages/faq">FAQ</a> 
            <dd class="col highlight">
              <h5>Popular Links</h5>
              <a href="" title="What's New">What's New</a> 
 <a href="" title="">Top Rated</a> 
 <a href="" title="">Coming</a> 
 <a href="" title="">Coming</a> 
 <a href="" title="">Coming</a> </dd>
          </dl>
        </div>
      </li>
      <li class="navItem_3"><a href="" title="Computers">INT'L MARKETS</a>
        <div class="navRollover">
          <dl class="innerWrap">
            <dd class="col">
              <h5><a href="/sectors/category/computers.asp" title="Computers">THE MARKET</a></h5>
              <a href="/applications/Category/guidedSearch.asp?CatId=17" title="Laptops / Notebooks">Coming</a> 
 	`		</dd>
    
            <dd class="col highlight">
              <h5>Coming</h5>
              <a href="" title="What's New">Coming</a> 

 <a href="" title=" ">Coming</a> </dd>
          </dl>
        </div>
      </li>
      
      
      <li class="navItem_5"><a href="" title="Computers">SHIPPING DEALS</a>
      </li>
    </ul>
  </div>

