<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout; ?>:: GB (market)</title>
<?php echo $html->charset('utf-8'); ?>
<meta name="Description" content="food" />
<meta name="Keywords" content="food" />
<meta name="robots" content="noindex, nofollow, noarchive" />

<link href='http://fonts.googleapis.com/css?family=Devonshire' rel='stylesheet' type='text/css'>
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Pompiere|Prosto+One|Telex|Federo|Quattrocento Sans|Bowlby+One+SC|Changa+One|Boogaloo|Tangerine' >

<?php
echo $html->css('gb-main.css');
echo $html->script('jquery-1.6.1.min.js');
echo $html->script('hoverIntent.js');
echo $html->script('superfish.js');
echo $html->script('jquery.galleryview-3.0-dev.js');
echo $html->script('jquery.easing.1.3.js');
echo $html->script('jquery.touchcarousel-1.0.min.js');

?>

		<script type="text/javascript">

		// initialise plugins
		 jQuery(document).ready(function() { 
        jQuery('ul.sf-menu').superfish({ 
            delay:       1000,                            // one second delay on mouseout 
            animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
            speed:       'fast',                          // faster animation speed 
            autoArrows:  false,                           // disable generation of arrow mark-up 
            dropShadows: false                            // disable drop shadows 
        }); 
    }); 
		</script>
        
        
        <!-- gallery view  -->

	<script type="text/javascript">
	
		jQuery(function(){
		jQuery('#myGallery').galleryView();
	});
		
	</script>



</head>
<body>

<!--  <div id="top_star">site</div>
-->

<div id="outer-wrapper">

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
                   <?php echo $this->element('menu_top');?> 
          		</div>
                
            <!-- Jorge original --> 
            
            <!--    <div id="header">
            
              <div class="logo"> <?php //echo $html->image('logo.png', array('border' => '0', 'width' => '140', 'alt' => 'Gourmet', 'title' => 'Gourmet', "url"=>"/")); ?> </div>
              <div class="menu_top"> <?php //echo $this->element('menu_top');?> </div>
            </div>
        -->
            
                <div id="content">
                
                  <div id="content-products" ><?php echo $content_for_layout; ?></div>
                  
                  <div class="clear-both"></div>
                
                  
                </div>
                
            <div id="footer"> <?php echo $this->element('menu_footer');?> </div>
            
         </div> <!--wrapper>-->
         
         </div> <!--middle-wrapper -->
         

     
</div>

</body>
</html>