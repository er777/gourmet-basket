<?php require_once('views/includes/doc-header.php'); ?>
<script type="text/javascript">
		 // $(window).load(function() {
			 // mCustomScrollbars();
		//  });
		  
		 // function mCustomScrollbars(){
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
			 // $("#mcs_container").mCustomScrollbar("vertical",400,"easeOutCirc",1.05,"auto","yes","yes",10); 
			  //$("#mcs2_container").mCustomScrollbar("vertical",0,"easeOutCirc",1.05,"auto","yes","no",0); 
			 // $("#mcs3_container").mCustomScrollbar("vertical",900,"easeOutCirc",1.05,"auto","no","no",0); 
			  //$("#mcs4_container").mCustomScrollbar("vertical",200,"easeOutCirc",1.25,"fixed","yes","no",0); 
			  //$("#mcs5_container").mCustomScrollbar("horizontal",500,"easeOutCirc",1,"fixed","yes","yes",20); 
		 // }
	
</script>

<!--Superfish -->
<script type="text/javascript">

			  // initialise plugins
			  // jQuery(document).ready(function() { 
	  //        jQuery('ul.sf-menu').superfish({ 
	  //            delay:       1000,                            // one second delay on mouseout 
	  //            animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
	  //            speed:       'fast',                          // faster animation speed 
	  //            autoArrows:  false,                           // disable generation of arrow mark-up 
	  //            dropShadows: false                            // disable drop shadows 
	  //        }); 
	  //    }); 
	

<!-- gallery view  -->
	  
	jQuery(function(){
	jQuery('#myGallery').galleryView();
});
		  

 <!-- Scroll to Article--> 
 
	//jQuery(".read-more").click(function() {
    //	jQuery('html, body').animate({
    //     scrollTop: jQuery("#category-article").offset().top
    // }, 2000);
//});
 

 
 
 
 </script> 
  
    
    
    
</head>
<body id="site">

<!--  <div id="top_star">site</div>
-->

<div id="outer-wrapper">
SITE TEMPLATE 

<!-- <div id="middle-wrapper-bg"></div>-->
<div id="wrapper-shell">
   <div id="sun-left">&nbsp;</div>
   <div id="sun-right">&nbsp;</div>
   <div id="wrapper">
      <div id="left-header">&nbsp;</div>
      <div id="header"> <a href="/">
         <div id="header-link"></div>
         </a> </div>
      <div id="account">
         <ul class="gb-horiz-account">
            <li class="gb-account"><a href="/members/login">LOG IN</a></li>
            <!--<li class="gb-account"><a href="/members/register">SUBSCRIBE</a></li>-->
            <li class="gb-account"><a href="/cart">CART</a></li>
         </ul>
      </div>
      
      <!--<div id="logo"></div>-->
      
      <div id="nav"> <?php echo $this->element('menu_top-new');?> </div>
      
      <!-- Jorge original --> 
      <!--    <div id="header">
              <div class="logo"> <?php //echo $html->image('logo.png', array('border' => '0', 'width' => '140', 'alt' => 'Gourmet', 'title' => 'Gourmet', "url"=>"/")); ?> </div>
              <div class="menu_top"> <?php //echo $this->element('menu_top');?> </div>
            </div>
        -->
      
      <div id="content">
         <div class="pad">
            <div id="content-products" ><?php echo $content_for_layout; ?></div>
            <div class="clear-both"></div>
         </div>
         
         <!--------------- CATEGORY ARTICLE --------------------->
         
         <div id="vendor-story-wrapper-shell">
            <div class="vendor-story-wrapper">
               <div class="pad"> 
                  
                  <!--<h2>- <?php //echo $products[0]['u']['shop_name'] ?>-</h2>--> 
                  <br/>
                  <div class="vendor-article-pic1-wrapper"> </div>
                  <div class="vendor-article-bottom-wrapper"> </div>
                  
                  <!--<div class="vendor-info">
				<div class="vendor-special">
<?php //echo $products[0]['u']['shop_quote'] ?>
				</div>
                
            </div> -->
                  
                  <div class="clear"></div>
                  <div id="vendor-group">
                     <div id="category-article">
                        <div id="category-article-name"><?php print $category['name'];?></div>
                        <?php if (isset($parent_category['article'])):?>
                        <div class="category-article-wrapper">
                           <div style="float:left"> <img src="/app/webroot/img/pantry/<?php print $parent_category['image'];?>" width="140" height="120" /> </div>
                           <?php echo $parent_category["article"]; ?> </div>
                        <?php endif;?>
                     </div>
                     
                     
                     <div class ="vendor-group-pics">
                           <div class="vendor-article-pic-box">
                              <?php 
										if( $products[0]['u']['image4'] != ""){
                    echo $html->image('logos/'.$products[0]['u']['image4'], array('width' => '250px', 'border' => '0', 'class' =>'vendor-story-pic', 'alt' => 'Vendor', 'title' => 'Vendor Pic 4' ));
                    }else{
?>
                              <img src="/admin/images/default.png" alt="" />
                              <?php }	?>
                           </div>
                           <div class="vendor-article-pic-box">
                              <?php 
										if( $products[0]['u']['image5'] != ""){
                    echo $html->image('logos/'.$products[0]['u']['image5'], array('width' => '250px', 'border' => '0', 'class' =>'vendor-story-pic', 'alt' => 'Vendor', 'title' => 'Vendor Pic 5' ));
                    }else{
?>
                              <img src="/admin/images/default.png" alt="" />
                              <?php }	?>
                           </div>
                           <div class="vendor-article-pic-box" style="padding-right:0">
                              <?php 
										if( $products[0]['u']['image6'] != ""){
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
            
            <!----- END CAT ARTICLE ----->
            
            <div id="footer"> <?php echo $this->element('menu_footer');?> </div>
         </div>
         <!--wrapper>--> 
         
      </div>
      <!--middle-wrapper --> 
      
   </div>
</div>
</body>
</html>