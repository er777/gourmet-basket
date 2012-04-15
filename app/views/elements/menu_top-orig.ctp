
<!--<div id="shop-by"></div>-->

<div id="mastHead" class="clearfix">
  <div class="header-shell">
    <div class="header-top"> </div>
    <ul id="header-nav" class="sf-menu">
      <li class="navItem_1"><a href="/categories" title="Categories">CATEGORIES</a>
        <div class="navRollover">
          <dl class="innerWrap">
            <dd class="col">
              	<div class="cat-list-wrapper">
<?php
			foreach ($categories as $cat) {
?>
              <a class="hand-drawn" href="/products/category/<?php echo $cat['c']['category_id'];?>"> <div class="cat-list"><?php echo $cat['c']['category_name'];?></div> </a>

<?php
}	
?>
				</div>

            <dd class="col highlight">
              <h5>USE THESE FOR THE MOMENT</h5>
              <a href="/pages/faq">FAQ</a> 
 <a href="/register">REGISTER</a> 
 <a href="/pages/vendor-upload">VENDOR REGISTER 2</a> 
 <a href="/pages/faq">FAQ</a> 
 <a href="/products/vendor/juicyfoods">JUICY FOODS</a> 
 <a href="/products/182">HOLY MOLY YAK MILK</a>
          </dl>
        </div>
      </li>
      <li class="navItem_1"><a href="/categories" title="Categories">VENDORS</a>
        <div class="navRollover">
          
        </div>
      </li>
      
      <li class="navItem_2"><a href="/products" title="Computers">US MARKETPLACE</a>
        <div class="navRollover">
          <dl class="innerWrap">
            <dd class="col">
              <h5><a href="/sectors/category/computers.asp" title="Computers">Vendors</a></h5>
              
              <?php echo $this->Form->create( 'Product', array('url' => array('controller' => 'products', 'action' => 'category'))); ?>

  <label>Vendors</label>
      <?php echo $this->Form->select('users', $users, null, array('onchange' => "if(this.value!='')window.location.href=this.value") ); ?>
                <?php echo $form->end(); ?>
                
 <a href="/pages/faq">FAQ</a> 
 <a href="/register">REGISTER</a> 
 <a href="/pages/vendor-upload">VENDOR REGISTER 2</a> 
 <a href="/pages/faq">FAQ</a> 
 <a href="/products/vendor/juicyfoods">JUICY FOODS</a> 
 <a href="/products/182">HOLY MOLY YAK MILK</a>
            <dd class="col highlight">
              <h5>Popular Links</h5>
              <a href="" title="What's New">What's New</a> 
 <a href="" title="Top Rated">Top Rated</a> 
 <a href="" title="Clearance Deals">Coming</a> 
 <a href="" title="Factory Recertified">Coming</a> 
 <a href="" title="Open Box">Coming</a> </dd>
          </dl>
        </div>
      </li>
      <li class="navItem_3"><a href="" title="Computers">INT'L MARKETPLACE</a>
        <div class="navRollover">
          <dl class="innerWrap">
            <dd class="col">
              <h5><a href="/sectors/category/computers.asp" title="Computers">THE MARKET</a></h5>
              <a href="/applications/Category/guidedSearch.asp?CatId=17" title="Laptops / Notebooks">Coming</a> 
 <a href="" title="Chromebooks">Chromebooks</a> 
 <a href="" title="Tablets / E-readers">Coming</a> 
 <a href="" title="Furniture">Coming</a> 
 <a href="" title="Scanners">Coming</a> 
 <a href="" title="Accessories">Coming</a> 
 <a href="" title="See All Computers">Coming</a> </dd>
            <dd class="col highlight">
              <h5>Coming</h5>
              <a href="" title="What's New">Coming</a> 
 <a href="" title="Top Rated">Coming</a> 
 <a href="" title="Clearance Deals">Coming</a> 
 <a href="" title="Factory Recertified">Coming</a> 
 <a href="" title="Open Box">Coming</a> </dd>
          </dl>
        </div>
      </li>
      
      
      <li class="navItem_5"><a href="" title="Computers">SHIPPING DEALS</a>
        <div class="navRollover">
          <dl class="innerWrap">
            <dd class="col">
              <h5><a href="/sectors/category/computers.asp" title="Computers">Coming</a></h5>
              <a href="/applications/Category/guidedSearch.asp?CatId=17" title="Laptops / Notebooks">Coming</a> 
 <a href="/applications/Category/category_tlc.asp?CatId=25&name=Scanners" title="Scanners">Coming</a> 
 <a href="/applications/Category/category_tlc.asp?CatId=1&name=Accessories" title="Accessories">Coming</a> 
 <a href="/sectors/category/computers.asp" title="See All Computers">Coming</a> </dd>
            <dd class="col highlight">
              <h5>Popular Links</h5>
              <a href="/sectors/whatsnew/newproducts.asp" title="What's New">What's New</a> 
 <a href="/applications/category/topratedskus.asp" title="Top Rated">Coming</a>
          </dl>
        </div>
      </li>
      <li class="navItem_5" ><a href="/sectors/category/computers.asp" title="Computers" style="color:#000">SALES</a>
        <div class="navRollover">
          <dl class="innerWrap">
            <dd class="col">
              <h5><a href="/sectors/category/computers.asp" title="Computers">Coming</a></h5>
              <a href="/applications/Category/guidedSearch.asp?CatId=17" title="Laptops / Notebooks">Coming</a> 
 <a href="/applications/Category/category_tlc.asp?CatId=25&name=Scanners" title="Scanners">Coming</a> 
 <a href="/applications/Category/category_tlc.asp?CatId=1&name=Accessories" title="Accessories">Coming</a> 
 <a href="/sectors/category/computers.asp" title="See All Computers">Coming</a> </dd>
            <dd class="col highlight">
              <h5>Popular Links</h5>
              <a href="/sectors/whatsnew/newproducts.asp" title="What's New">What's New</a> 
 <a href="/applications/category/topratedskus.asp" title="Top Rated">Coming</a>
          </dl>
        </div>
      </li>
    </ul>
  </div>
</div>
