<?php require_once('views/includes/doc-header.php'); ?>
<?php
	echo $html->
script('jquery.galleriffic.js'); echo $html->script('gallerifficOptions.js'); ?> 
<!-- RELATED ITEMS SLIDER -->
<script type="text/javascript">
		jQuery(function($) {
			jQuery("#carousel-image-and-text").touchCarousel({					
				pagingNav: false,
				snapToItems: false,
				itemsPerMove: 5,				
				scrollToLast: false,
				loopItems: false,
				scrollbar: true
		    });
		});
		// Conform images for vendor page readout
		jQuery(function() {
			jQuery( ".resizeme" ).aeImageResize({ height: 120, width: 100 });
    });
    </script>
</head>
<body id="vendor">
<!-- superfish for menu -->
<script type="text/javascript">
		// initialise plugins
		//jQuery(function(){
			//jQuery('ul.sf-menu').superfish();
		//});
		</script>
<!--Facebook -->
<div id="fb-root">
</div>
<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=214123048679188";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div id="outer-wrapper">
	<!--<div id="top_star">rtrt</div>-->
	<!-- <div id="right-header">&nbsp;</div>-->
	<div id="left-header">
		&nbsp;
	</div>
	<div id="wrapper-shell">
		<div id="sun-left">
			&nbsp;
		</div>
		<div id="sun-right">
			&nbsp;
		</div>
		<div id="wrapper">
			<div id="header">
				<a href="/">
				<div id="header-link">
				</div>
				</a>
			</div>
			<div id="account">
				<ul class="gb-horiz-account">
					<li class="gb-account"><a href="/members/login">LOG IN</a></li>
					<!--<li class="gb-account"><a href="/members/register">SUBSCRIBE</a></li>-->
					<li class="gb-account"><a href="/cart">CART</a></li>
				</ul>
			</div>
			<div id="nav">
<?php echo $this->
				element('menu_top-new');?>
			</div>
			<!-- <div class="logo"> <?php //echo $html->image('logo.png', array('border' => '0', 'width' => '140', 'alt' => 'Gourmet', 'title' => 'Gourmet', "url"=>"/")); ?> </div>-->
		</div>
		<!-- end wrapper -->
		<div id="content">
			<div id="menu_vendor">
<?php echo $this->
				element('menu_vendors');?>
			</div>
			<div id="content_vendor">
<?php echo $content_for_layout; ?>
			</div>
			<div class="clear-both">
			</div>
		</div>
	</div>
	<!-- end wrapper  -->
</div>
<!-- end wrapper-shell  -->
<div id="vendor-story-wrapper-shell">
	<div class="vendor-story-wrapper">
		<div class="pad">
			<div id="summary" class="vendor-title" >
<?php echo $html->
				image('logos/'.$products[0]['u']['logo'], array('border' => '0', 'alt' => 'Vendor', 'title' => 'Vendor' , 'class' => 'vendor-title img', 'width' =>'206')); ?>
			</div>
			<!--<h2>- <?php //echo $products[0]['u']['shop_name'] ?>-</h2>-->
			<br/>
            
			<div class="vendor-article-pic1-wrapper">
			</div>
			<div class="vendor-article-bottom-wrapper">
			</div>
            
			<div class="vendor-article-pic-box upper-left">
            
            	<?php if (!empty($images)) {

            
echo $html->image('logos/'.$products[0]['u']['image3'], array('width' => '250px', 'border' => '0', 'class' =>'vendor-story-pic', 'alt' => 'Vendor', 'title' => 'Vendor Pic 3' ));

				}else{
?>

<img src="/admin/images/default.png" alt="" />
 
<?php }	?>


			</div>
            
            
			<div class="vendor-info">
				<div class="vendor-special">
<?php echo $products[0]['u']['shop_quote'] ?>
				</div>
                
            </div>    
                
				<div id="vendor-group">
                
					<div id="vendor-article">
<?php echo $products[0]['u']['shop_description'] ?>
					</div>
                    
                    <div class ="vendor-group-pics">
                    
					<div class="vendor-article-pic-box">
                    
                    <?php if( $val['image4'] != ""){

                    echo $html->image('logos/'.$products[0]['u']['image4'], array('width' => '250px', 'border' => '0', 'class' =>'vendor-story-pic', 'alt' => 'Vendor', 'title' => 'Vendor Pic 4' ));
                    
                    }else{
?>

<img src="/admin/images/default.png" alt="" />
 
<?php }	?>

					</div>
                    
					<div class="vendor-article-pic-box">
                    
                    <?php if( $val['image5'] != ""){
                    
echo $html->image('logos/'.$products[0]['u']['image5'], array('width' => '250px', 'border' => '0', 'class' =>'vendor-story-pic', 'alt' => 'Vendor', 'title' => 'Vendor Pic 5' )); 

					}else{
?>

<img src="/admin/images/default.png" alt="" />
 
<?php }	?>

					</div>
                    
					<div class="vendor-article-pic-box" style="padding-right:0">
                    
<?php if( $val['image6'] != ""){
						
 echo $html->image('logos/'.$products[0]['u']['image6'], array('width' => '250px', 'border' => '0', 'class' =>'vendor-story-pic', 'alt' => 'Vendor', 'title' => 'Vendor Pic 6' )); 
 

    				}else{
?>

<img src="/admin/images/default.png" alt="" />
 
<?php }	?>
 
 
 
 
					</div>

                 
				</div>
                    
                    
                    
				</div>
                
				
                
			</div>
		</div>
	</div>
    
	<div style="clear:both">
    
	</div>
    
	<div id="footer">
<?php echo $this->
		element('menu_footer');?>
	</div>
	<script>
//$(window).load(function() {
//	mCustomScrollbars();
//});
//function mCustomScrollbars(){
	/* 
	malihu custom scrollbar function parameters: 
	1) scroll type (values: "vertical" or "horizontal")
	2) scroll easing amount (0 for no easing) 
	3) scroll easing type 
	4) extra bottom scrolling space for vertical scroll type only (minimum value: 1)
	5) scrollbar height/width adjustment (values: "auto" or "fixed")
	6) mouse-wheel support (values: "yes" or "no")
	7) scrolling via buttons support (values: "yes" or "no")
	8) buttons scrolling speed (values: 1-20, 1 being the slowest)
	*/
	//$("#mcs_container").mCustomScrollbar("vertical",400,"easeOutCirc",1.05,"auto","yes","yes",10); 
	//$("#mcs2_container").mCustomScrollbar("vertical",0,"easeOutCirc",1.05,"auto","yes","no",0); 
//	$("#mcs3_container").mCustomScrollbar("vertical",900,"easeOutCirc",1.05,"auto","no","no",0); 
	//$("#mcs4_container").mCustomScrollbar("vertical",200,"easeOutCirc",1.25,"fixed","yes","no",0); 
	//$("#mcs5_container").mCustomScrollbar("horizontal",500,"easeOutCirc",1,"fixed","yes","yes",20); 
}
/* function to fix the -10000 pixel limit of jquery.animate */
//$.fx.prototype.cur = function(){
//    if ( this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null) ) {
//      return this.elem[ this.prop ];
//    }
//    var r = parseFloat( jQuery.css( this.elem, this.prop ) );
//    return typeof r == 'undefined' ? 0 : r;
//}
/* function to load new content dynamically */
//function LoadNewContent(id,file){
//	$("#"+id+" .customScrollBox .content").load(file,function(){
//		mCustomScrollbars();
//	});
//}
//	</script>
	</body>
	</html>