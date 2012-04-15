<?php require_once('views/includes/doc-header.php'); ?>

	<script type="text/javascript">
		  $(window).load(function() {
			  mCustomScrollbars();
		  });
		  
		  function mCustomScrollbars(){
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
			  $("#mcs_container").mCustomScrollbar("vertical",400,"easeOutCirc",1.05,"auto","yes","yes",10); 
			  //$("#mcs2_container").mCustomScrollbar("vertical",0,"easeOutCirc",1.05,"auto","yes","no",0); 
			 // $("#mcs3_container").mCustomScrollbar("vertical",900,"easeOutCirc",1.05,"auto","no","no",0); 
			  //$("#mcs4_container").mCustomScrollbar("vertical",200,"easeOutCirc",1.25,"fixed","yes","no",0); 
			  //$("#mcs5_container").mCustomScrollbar("horizontal",500,"easeOutCirc",1,"fixed","yes","yes",20); 
		  }
	
	</script>

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
	</script>
        
        
        <!-- gallery view  -->

	<script type="text/javascript">
	  
		  jQuery(function(){
		  jQuery('#myGallery').galleryView();
	  });
		  
	</script>

</head>
<body id="site">

<!--  <div id="top_star">site</div>
-->

<div id="outer-wrapper">SITE TEMPLATE

    <!-- <div id="middle-wrapper-bg"></div>-->
     <div id="wrapper-shell">
     		<div id="sun-left">&nbsp;</div>
        	<div id="sun-right">&nbsp;</div>
     
        <div id="wrapper">
       
        	<div id="left-header">&nbsp;</div>
          
          	<div id="header">
          		<a href="/"><div id="header-link"></div></a>
          	</div>
          
            <div id="account">
                <ul class="gb-horiz-account">
                      <li class="gb-account"><a href="/members/login">LOG IN</a></li>
                      <li class="gb-account"><a href="/members/register">SUBSCRIBE - cat</a></li>
                  </ul>
            </div>
            
            <!--<div id="logo"></div>-->
                
            <div id="nav">
                 <?php echo $this->element('menu_top-new');?> 
            </div>
              
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
            
        <div id="footer"> <?php echo $this->element('menu_footer');?> </div>
        
     </div> <!--wrapper>-->
     
     </div> <!--middle-wrapper -->
         
</div>

</div>

</body>
</html>