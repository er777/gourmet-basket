<!--<div id="shop-by"></div>-->

<?php //pr($all_categories);?>
<ul class="dropEverything">
  <li class="top-li pageOne"><a class="top-a" href="/products/categories">CATEGORIES</a>
    <div class="dropEverything-page">
      <h2>Full Page OF EVERYTHING -----><a href="/pages/catalog" style="color:#fff" >*** HERE ***</a></h2>
      <div class="dropEverything-row">
        <h3>CATEGORIES</h3>
        <div class="dropEverything-col1 jquery-column">
          <div class="dropEverything-inner">
            <ul class="category-parents">
              <?php foreach ($all_categories as $parent) :?>
              <li> <a class="hand-drawn" href="/products/category/<?php print $parent['slug'];?>"><?php print $parent['name']; ?></a>
                <?php if(isset($parent['children'])): ?>
                <ul class="category-children" style="margin-left:10px;">
                  <?php foreach ($parent['children'] as $child) :?>
                  <li><a class="hand-drawn" href="/products/category/<?php print $parent['slug'].'/'.$child['slug']; ?>"><?php print $child['name'];?></a>
								<?php if ($child['children']): ?>
								<ul class="category-grandchildren" style="font-size:11px; margin-left:20px;font-style:italic;">
								<?php foreach ($child['children'] as $grandchild): ?>
								<li><a href ="/products/category/<?php print $parent['slug'].'/'.$child['slug'].'/'.$grandchild['slug']; ?>" style="color:#5864E8"><?php print $grandchild['name']; ?></a></li>
								<?php endforeach; ?>
								</ul> <!-- End Grandchild-->
								<?php endif; ?>
								</li>
                  <?php	endforeach; ?>
                </ul><!-- End Child-->
                <?php endif; ?>
              </li>
              <?php endforeach; ?>
            </ul><!-- End Parents -->
						
						
          </div>
        </div>
        <!-- end column --> 
      </div>
      <!-- end row -->
      <div class="dropEverything-row">
        <div class="dropEverything-col4">
          <div class="dropEverything-inner"> </div>
        </div>
        <!-- end column -->
        <div class="dropEverything-col4">
          <div class="dropEverything-inner"> </div>
        </div>
        <!-- end column -->
        <div class="dropEverything-col4">
          <div class="dropEverything-inner"> </div>
        </div>
        <!-- end column -->
        <div class="dropEverything-col4">
          <div class="dropEverything-inner"> </div>
        </div>
        <!-- end column --> 
        <br class="clear" />
      </div>
      <!-- end row --> 
    </div>
  </li>
  <li class="top-li pageTwo"><a class="top-a" href="http://test.gourmet-basket.com/vendors">VENDORS</a>
    <div class="dropEverything-page">
      <div class="dropEverything-row">
        <div class="dropEverything-col1 jquery-column">
          <div class="dropEverything-inner">
            <?php //echo $this->Form->create( 'Product', array('url' => array('controller' => 'products', 'action' => 'category'))); ?>
            <?php //echo $this->Form->select('users', $users, null, array('onchange' => "if(this.value!='')window.location.href=this.value") ); ?>
            <? //var_dump($users);?>
            <ul>
              <?php foreach ($users as $path => $anchor_text) :?>
              <li class="vendor"><a href="<?php print $path;?>"><?php print $anchor_text; ?></a></li>
              <? endforeach; ?>
            </ul>
          </div>
          <?php //echo $form->end(); ?>
        </div>
        <!-- end column --> 
      </div>
      <!-- end row --> 
    </div>
  </li>
  <li class="top-li pageThree"><a class="top-a" href="/us-markets">US MARKETS</a>
    <div class="dropEverything-page">
      <h2>CSS Drop Everything</h2>
      <div class="dropEverything-row">
        <div class="dropEverything-col1">
          <div class="dropEverything-inner">
            <div class="flyoutMenu"> </div>
          </div>
        </div>
        <!-- end column --> 
      </div>
      <!-- end row --> 
    </div>
  </li>
  <li class="top-li pageFour"><a class="top-a" href="#url">INT'L MARKETS</a>
    <div class="dropEverything-page">
      <h1>CSS play - Drop Everything</h1>
      <div class="dropEverything-row">
        <div class="dropEverything-col1">
          <div class="dropEverything-gallery"> </div>
        </div>
        <!-- end column --> 
        <br class="clear" />
      </div>
      <!-- end row --> 
    </div>
  </li>
  <li class="top-li pageFive"><a class="top-a" href="#url">Contact Form</a>
    <div class="dropEverything-page">
      <h1>CONTACT FORM</h1>
      <div class="dropEverything-row">
        <h2>Contact Form</h2>
        <div class="dropEverything-col1">
          <form class="dropEverything-form" action="" action="post">
          <label for="name">Name : </label>
          <input name="name" id="name" type="text" value="Name" onfocus="if (this.value == 'Name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Name';}" />
          <br />
          <label for="email">Email : </label>
          <input name="email" id="email" type="text" value="Email" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}" />
          <br />
          <label for="website">Website : </label>
          <input name="website" id="website" type="text" value="http://" />
          <br />
          <label for="subject">Subject : </label>
          <input name="subject" id="subject" type="text" value="Subject" onfocus="if (this.value == 'Subject') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Subject';}" />
          <br />
          <label for="message">Message : </label>
          <textarea name="message" id="message"></textarea>
          <br />
          <button type="submit" class="submit">Submit</button>
          <br class="clear" />
          </form>
        </div>
        <!-- end column --> 
      </div>
      <!-- end row --> 
    </div>
  </li>
  <li class="top-li pageSix"><a class="top-a" href="#url">Combo Page</a>
    <div class="dropEverything-page">
      <h1>CSS play - Drop Everything</h1>
      <div class="dropEverything-row">
        <div class="dropEverything-col2">
          <div class="dropEverything-inner">
            <div class="flyoutMenu"> </div>
          </div>
        </div>
        <div class="dropEverything-col2">
          <div class="dropEverything-inner">
            <div class="dropdownMenu"> </div>
            <br class="clear" />
            <br class="clear" />
          </div>
        </div>
        <!-- end column --> 
        <br class="clear" />
      </div>
      <!-- end row -->
      <div class="dropEverything-row">
        <div class="dropEverything-col3"> </div>
        <!-- end column -->
        <div class="dropEverything-col3"> </div>
        <!-- end column -->
        <div class="dropEverything-col3"> </div>
        <!-- end column --> 
        <br class="clear" />
      </div>
      <!-- end row -->
      <div class="dropEverything-row"> <br class="clear" />
      </div>
      <!-- end row --> 
    </div>
  </li>
  <li class="top-li top-only"><a class="top-a" href="#url">Top Level</a></li>
  <li class="close"><a class="top-a" href="#url">Close <b>X</b></a></li>
</ul>
