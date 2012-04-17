
<!--<div id="shop-by"></div>-->
    
<ul class="dropEverything">
<li class="top-li pageOne"><a class="top-a" href="/products/categories">CATEGORIES</a>
<div class="dropEverything-page">
	<h1>GOURMET BASKET - Search by Categories</h1>
	<div class="dropEverything-row">
		<h2>CATEGORIES</h2>
		<div class="dropEverything-col1 jquery-column">
			<div class="dropEverything-inner">
				
                
					<?php
						foreach ($categories as $cat) {
					?>
              			<a class="hand-drawn" href="/products/category/<?php echo $cat['c']['category_id'];?>_<?php echo $cat['c']['category_name'];?>"> <div class="cat-list"><?php echo $cat['c']['category_name'];?></div> </a>

					<?php
					}	
					?>
				
                
			</div>
		</div> <!-- end column -->
	</div> <!-- end row -->
	<div class="dropEverything-row">
		<h2>A four column box</h2>
		<div class="dropEverything-col4">
			<div class="dropEverything-inner">
				<h3>Column One</h3>
				<div class="flyoutMenu">
					<ul>
						<li><a href="#url">List item one</a></li>
						<li><a href="#url">List item two</a></li>
						<li><a href="#url">List item three</a></li>
						<li><a href="#url">List item four</a></li>
						<li><a href="#url">List item five</a></li>
					</ul>
				</div>
			</div>
		</div> <!-- end column -->
		<div class="dropEverything-col4">
			<div class="dropEverything-inner">
				<h3>Column Two</h3>
				<p>A column for something we might want, we may s well take acvantage of this space in a cool way... <a href="#url">A link?</a> and then more text , as much as can be useful....</p>
			</div>
		</div> <!-- end column -->
		<div class="dropEverything-col4">
			<div class="dropEverything-inner">
				<h3>Column Three</h3>
				<p>A column for something we might want, we may s well take acvantage of this space in a cool way... <a href="#url">A link?</a> and then more text , as much as can be useful....</p>
			</div>
		</div> <!-- end column -->
		<div class="dropEverything-col4">
			<div class="dropEverything-inner">
				<h3>Column Four</h3>
				<p>A column for something we might want, we may s well take acvantage of this space in a cool way... <a href="#url">A link?</a> and then more text , as much as can be useful....</p>
			</div>
		</div> <!-- end column -->
	<br class="clear" />
	</div> <!-- end row -->
</div>
</li>
<li class="top-li pageTwo"><a class="top-a" href="#url">VENDORS</a>
<div class="dropEverything-page">
	<h1>CSS play - Drop Everything</h1>
	<div class="dropEverything-row">
		<h2>CHOOSE VENDORS</h2>
		<div class="dropEverything-col1">
			<div class="dropdownMenu">
				<ul>
					<li></li>
					<li><a href="#url">Top Level 2</a></li>
					<li><a href="#url">Top Level 3 +</a>
						<ul>
							<li><a href="#url">Sub Level 1a</a></li>
							<li><a href="#url">Sub Level 1b</a></li>
							<li><a href="#url">Sub Level 1c +</a>
								<ul>
									<li><a href="#url">Sub Level 2a</a></li>
									<li><a href="#url">Sub Level 2b +</a>
										<ul>
											<li><a href="#url">Sub Level 3a</a></li>
											<li><a href="#url">Sub Level 3b +</a>
												<ul>
													<li><a href="#url">Sub Level 4a</a></li>
													<li><a href="#url">Sub Level 4b</a></li>
													<li><a href="#url">A long Sub Level 4c +</a>
														<ul>
															<li><a href="#url">Sub Level 5a</a></li>
															<li><a href="#url">Sub Level 5b</a></li>
															<li><a href="#url">Sub Level 5c</a></li>
															<li><a href="#url">Sub Level 5d</a></li>
															<li><a href="#url">Sub Level 5e</a></li>
															<li><a href="#url">Sub Level 5f</a></li>
														</ul>
													</li>
													<li><a href="#url">Sub Level 4d</a></li>
													<li><a href="#url">Sub Level 4e</a></li>
													<li><a href="#url">Sub Level 4f</a></li>
												</ul>
											</li>
											<li><a href="#url">Sub Level 3c</a></li>
											<li><a href="#url">Sub Level 3d</a></li>
										</ul>
									</li>
									<li><a href="#url">Sub Level 2c</a></li>
								</ul>
								</li>
							<li><a href="#url">Sub Level 1d</a></li>
							<li><a href="#url">Sub Level 1e</a></li>
						</ul>
					</li>
					<li><a href="#url">Top Level 4</a></li>
					<li><a href="#url">Top Level 5</a></li>
					<li><a href="#url">Top Level 6 +</a>
						<ul>
							<li><a href="#url">Sub Level 1a</a></li>
							<li class="rgt"><a href="#url">Sub Level 1b +</a>
								<ul>
									<li><a href="#url">Sub Level 2a</a></li>
									<li><a href="#url">Sub Level 2b</a></li>
									<li><a href="#url">Sub Level 2c</a></li>
									<li><a href="#url">Sub Level 2d</a></li>
									<li><a href="#url">Sub Level 2e</a></li>
									<li><a href="#url">Sub Level 2f</a></li>
								</ul>
							</li>
							<li><a href="#url">Sub Level 1c</a></li>
							<li><a href="#url">Sub Level 1d</a></li>
						</ul>
					</li>
				</ul>
			</div>
		<br class="clear" /><br />
		<img src="dropEverything/pic7.jpg" alt="" class="dropEverything-imageLeft" />
		<?php //echo $this->Form->create( 'Product', array('url' => array('controller' => 'products', 'action' => 'category'))); ?>

      	<?php //echo $this->Form->select('users', $users, null, array('onchange' => "if(this.value!='')window.location.href=this.value") ); ?>
         <? //var_dump($users);?>
        <ul>
				<?php foreach ($users as $path => $anchor_text) :?>
        	<li><a href="<?php print $path;?>"><?php print $anchor_text; ?></a></li>
            	<? endforeach; ?>
		</ul>
		
        
        
        
                <?php //echo $form->end(); ?>
		</div> <!-- end column -->
	</div> <!-- end row -->
</div>
</li>
<li class="top-li pageThree"><a class="top-a" href="/us-markets">US MARKETS</a>
<div class="dropEverything-page">
	<h1>CSS play - Drop Everything</h1>
	<div class="dropEverything-row">
		<h2>A flyout any width/depth menu</h2>
		<div class="dropEverything-col1">
			<div class="dropEverything-inner">
				<div class="flyoutMenu">
					<ul>
						<li><a href="#url">Top Level 1</a></li>
						<li><a href="#url">Top Level 2 +</a>
							<ul>
								<li><a href="#url">Sub Level 1a</a></li>
								<li><a href="#url">Sub Level 1b +</a>
									<ul>
										<li><a href="#url">Sub Level 2a</a></li>
										<li><a href="#url">Sub Level 2b</a></li>
										<li><a href="#url">Sub Level 2c</a></li>
										<li><a href="#url">Sub Level 2d</a></li>
									</ul>
								</li>
								<li><a href="#url">Sub Level 1c</a></li>
								<li><a href="#url">Sub Level 1d</a></li>
								<li><a href="#url">Sub Level 1e</a></li>
							</ul>
						</li>
						<li><a href="#url">Top Level 3 +</a>
							<ul>
								<li><a href="#url">Sub Level 1a</a></li>
								<li><a href="#url">Sub Level 1b</a></li>
								<li><a href="#url">Sub Level 1c +</a>
									<ul>
										<li><a href="#url">Sub Level 2a</a></li>
										<li><a href="#url">Sub Level 2b +</a>
											<ul>
												<li><a href="#url">Sub Level 3a</a></li>
												<li><a href="#url">Sub Level 3b</a></li>
												<li><a href="#url">Sub Level 3c</a></li>
												<li><a href="#url">Sub Level 3d</a></li>
											</ul>
										</li>
										<li><a href="#url">Sub Level 2c</a></li>
									</ul>
									</li>
								<li><a href="#url">Sub Level 1d</a></li>
								<li><a href="#url">Sub Level 1e</a></li>
							</ul>
						</li>
						<li><a href="#url">Top Level 4</a></li>
						<li><a href="#url">Top Level 5</a></li>
						<li><a href="#url">Top Level 6 +</a>
							<ul>
								<li><a href="#url">Sub Level 1a</a></li>
								<li><a href="#url">Sub Level 1b</a></li>
								<li><a href="#url">Sub Level 1c</a></li>
								<li><a href="#url">Sub Level 1d</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<img src="dropEverything/pic8.jpg" alt="" class="dropEverything-imageLeft" />
				<p>Today bigger world's spend, sold far outside secure. Sale <a href="#url">clinically senses</a> seasoned can't, far try cause really cheap market, unlimited made, thank-you why. Believe space hot price made quenches also removable silky chocolatey market now zesty confident traditional. Admire, yourself excites boast, sale, smooth delicious absolutely lost spring chance devour, durable, think. Zippy register can't chosen why by can't.</p>
				<p>Tired, open seasoned whopping appetizing if prevents <a href="#url">relaxing while makes</a>. Senses find plus go lost absolutely, excites, one. Care spicey sleek deserve juicy when it's discount sparkling this choice, peppy incredible. If exclusive, deserve survey, tummy out, out if really can't reputation. Full warm you, quenches flavored mega. Luscious, terrific low-cost, cause outlasts clinically this world's care. Bigger but classic jumbo refreshing moist, $19.95 spectacular stains.</p>
			</div>
		</div> <!-- end column -->
	</div> <!-- end row -->
</div>
</li>
<li class="top-li pageFour"><a class="top-a" href="#url">INT'L MARKETS</a>
<div class="dropEverything-page">
	<h1>CSS play - Drop Everything</h1>
	<div class="dropEverything-row">
		<h2>Gallery with hover action, default image and caption with linkapps</h2>
		<div class="dropEverything-col1">
			<div class="dropEverything-gallery">
				<ul>
					<li><img src="/app/webroot/img/menu-pics/pic1.jpeg" alt="" /><span class="default"><img src="app/webroot/img/menu-pics/pic1.jpeg" alt="" /><b>Caption one with <a href="#url">link</a></b></span></li>
					<li><img src="/app/webroot/img/menu-pics/pic2.jpeg" alt="" /><span><img src="/app/webroot/img/menu-pics/pic2.jpeg" alt="" /><b>Caption two with <a href="#url">link</a></b></span></li>
					<li><img src="app/webroot/img/menu-pics/pic3.jpeg" alt="" /><span><img src="/app/webroot/img/menu-pics/pic3.jpeg" alt="" /><b>Caption three with <a href="#url">link</a></b></span></li>
					<li><img src="/app/webroot/img/menu-pics/pic4.jpeg" alt="" /><span><img src="/app/webroot/img/menu-pics/pic4.jpeg" alt="" /><b>Caption four with <a href="#url">link</a></b></span></li>
					<li><img src="/app/webroot/img/menu-pics/pic5.jpeg" alt="" /><span><img src="/app/webroot/img/menu-pics/pic5.jpeg" alt="" /><b>Caption five with <a href="#url">link</a></b></span></li>
					<li><img src="/app/webroot/img/menu-pics/pic6.jpeg" alt="" /><span><img src="/app/webroot/img/menu-pics/pic6.jpeg" alt="" /><b>Caption six with <a href="#url">link</a></b></span></li>
				</ul>
			</div>
		</div> <!-- end column -->
		<br class="clear" />
	</div> <!-- end row -->
</div>
</li>
<li class="top-li pageFive"><a class="top-a" href="#url">Contact Form</a>
<div class="dropEverything-page">
	<h1>CONTACT FORM</h1>
	<div class="dropEverything-row">
		<h2>Contact Form</h2>
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
	<h1>CSS play - Drop Everything</h1>
	<div class="dropEverything-row">
		<h2>Flyout and Dropdown Menus in two adjacent columns</h2>
		<div class="dropEverything-col2">
			<div class="dropEverything-inner">
				<div class="flyoutMenu">
					<ul>
						<li><a href="#url">Top Level 1 +</a>
							<ul>
								<li><a href="#url">Sub Level 1a</a></li>
								<li><a href="#url">Sub Level 1b +</a>
									<ul>
										<li><a href="#url">Sub Level 2a</a></li>
										<li><a href="#url">Sub Level 2b</a></li>
										<li><a href="#url">Sub Level 2c</a></li>
										<li><a href="#url">Sub Level 2d</a></li>
									</ul>
								</li>
								<li><a href="#url">Sub Level 1c</a></li>
								<li><a href="#url">Sub Level 1d</a></li>
								<li><a href="#url">Sub Level 1e</a></li>
							</ul>
						</li>
						<li><a href="#url">Top Level 2 +</a>
							<ul>
								<li><a href="#url">Sub Level 1a</a></li>
								<li><a href="#url">Sub Level 1b</a></li>
								<li><a href="#url">Sub Level 1c +</a>
									<ul>
										<li><a href="#url">Sub Level 2a</a></li>
										<li><a href="#url">Sub Level 2b +</a>
											<ul>
												<li><a href="#url">Sub Level 3a</a></li>
												<li><a href="#url">Sub Level 3b</a></li>
												<li><a href="#url">Sub Level 3c</a></li>
												<li><a href="#url">Sub Level 3d</a></li>
											</ul>
										</li>
										<li><a href="#url">Sub Level 2c</a></li>
									</ul>
									</li>
								<li><a href="#url">Sub Level 1d</a></li>
								<li><a href="#url">Sub Level 1e</a></li>
							</ul>
						</li>
						<li><a href="#url">Top Level 3</a></li>
						<li><a href="#url">Top Level 4 +</a>
							<ul>
								<li><a href="#url">Sub Level 1a</a></li>
								<li><a href="#url">Sub Level 1b</a></li>
								<li><a href="#url">Sub Level 1c</a></li>
								<li><a href="#url">Sub Level 1d</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<img src="/app/webroot/img/menu-pics/pic10.jpeg" alt="" class="dropEverything-imageLeft" />
			<p>Lower tired than thought, keen reputation locked-in. Prevents tough, latest, tired mountain whiter shopping we herbal inside blast that escape. New with, offer product choosy compact zippy. Quick senses hello free listen why outstanding lasting as warm satisfying.</p>
		</div>
		<div class="dropEverything-col2">
			<div class="dropEverything-inner">
				<div class="dropdownMenu">
					<ul>
						<li><a href="#url">Top Level 1 +</a>
							<ul>
								<li><a href="#url">Sub Level 1a</a></li>
								<li><a href="#url">Sub Level 1b +</a>
									<ul>
										<li><a href="#url">Sub Level 2a</a></li>
										<li><a href="#url">Sub Level 2b</a></li>
										<li><a href="#url">Sub Level 2c +</a>
											<ul>
												<li><a href="#url">Sub Level 3a</a></li>
												<li><a href="#url">Sub Level 3b</a></li>
												<li><a href="#url">Sub Level 3c</a></li>
												<li><a href="#url">Sub Level 3d</a></li>
											</ul>
										</li>
										<li><a href="#url">Sub Level 2d</a></li>
									</ul>
								</li>
								<li><a href="#url">Sub Level 1c</a></li>
								<li><a href="#url">Sub Level 1d</a></li>
								<li><a href="#url">Sub Level 1e</a></li>
							</ul>
						</li>
						<li><a href="#url">Top Level 2 +</a>
							<ul>
								<li><a href="#url">Sub Level 1a</a></li>
								<li><a href="#url">Sub Level 1b</a></li>
								<li><a href="#url">Sub Level 1c +</a>
									<ul>
										<li><a href="#url">Sub Level 2a</a></li>
										<li><a href="#url">Sub Level 2b</a></li>
										<li><a href="#url">Sub Level 2c</a></li>
									</ul>
									</li>
								<li><a href="#url">Sub Level 1d</a></li>
								<li><a href="#url">Sub Level 1e</a></li>
							</ul>
						</li>
						<li><a href="#url">Top Level 3 +</a>
							<ul>
								<li><a href="#url">Sub Level 1a</a></li>
								<li class="rgt"><a href="#url">Sub Level 1b +</a>
									<ul>
										<li><a href="#url">Sub Level 2a</a></li>
										<li><a href="#url">Sub Level 2b</a></li>
										<li><a href="#url">Sub Level 2c</a></li>
										<li><a href="#url">Sub Level 2d</a></li>
									</ul>
								</li>
								<li><a href="#url">Sub Level 1c</a></li>
								<li><a href="#url">Sub Level 1d</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<br class="clear" />
				<img src="/app/webroot/img/menu-pics/pic9.jpeg" alt="" class="dropEverything-imageLeft" />
				<p>Sure, out, better brighter extra mild colossal with when. Unique rated, agree grand it's offer clinically, can super. <a href="#url">Terrific</a> out tummy real we ocean colossal out. Boast, clean simulated longer neat makes very grab smooth clean. Tasty, cheap delectable want splash original handling latest.</p>
				<br class="clear" />
			</div>
		</div> <!-- end column -->
		<br class="clear" />
	</div> <!-- end row -->
	<div class="dropEverything-row">
		<h2>Three columns</h2>
		<div class="dropEverything-col3">
			<img src="/app/webroot/img/menu-pics/pic1a.jpeg" alt="" class="dropEverything-imageLeft" />
			<p>Thirsty tangy tasting brighter confident quenches burst, sharpest any full only pennies.</p>
		</div> <!-- end column -->
		<div class="dropEverything-col3">
			<img src="/app/webroot/img/menu-pics/pic2a.jpeg" alt="" class="dropEverything-imageLeft" />
			<p>Multi-purpose, spacious aroma citrus dry pleasing your artificial, stains excellent.</p>
		</div> <!-- end column -->
		<div class="dropEverything-col3">
			<img src="/app/webroot/img/menu-pics/pic3a.jpeg" alt="" class="dropEverything-imageLeft" />
			<p>Revolutionary less anti kids creamy it's. Velvety classic flavored people ultimate.</p>
		</div> <!-- end column -->
		<br class="clear" />
	</div> <!-- end row -->
	<div class="dropEverything-row">
		<h2>Six columns</h2>
		<div class="dropEverything-col6">
			<a href="#url"><img src="/app/webroot/img/menu-pics/one.png" alt="" class="dropEverything-imageLeft" /></a>
		</div> <!-- end column -->
		<div class="dropEverything-col6">
			<a href="#url"><img src="/app/webroot/img/menu-pics/two.png" alt="" class="dropEverything-imageLeft" /></a>
		</div> <!-- end column -->
		<div class="dropEverything-col6">
			<a href="#url"><img src="/app/webroot/img/menu-pics/three.png" alt="" class="dropEverything-imageLeft" /></a>
		</div> <!-- end column -->
		<div class="dropEverything-col6">
			<a href="#url"><img src="/app/webroot/img/menu-pics/four.png" alt="" class="dropEverything-imageLeft" /></a>
		</div> <!-- end column -->
		<div class="dropEverything-col6">
			<a href="#url"><img src="/app/webroot/img/menu-pics/five.png" alt="" class="dropEverything-imageLeft" /></a>
		</div> <!-- end column -->
		<div class="dropEverything-col6">
			<a href="#url"><img src="/app/webroot/img/menu-pics/six.png" alt="" class="dropEverything-imageLeft" /></a>
		</div> <!-- end column -->
		<br class="clear" />
	</div> <!-- end row -->
</div>
</li>
<li class="top-li top-only"><a class="top-a" href="#url">Top Level</a></li>
<li class="close"><a class="top-a" href="#url">Close <b>X</b></a></li>
</ul>
