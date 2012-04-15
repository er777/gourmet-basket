<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout; ?>:: GB</title>
<?php echo $html->charset('utf-8'); ?>
<meta name="Description" content="" />
<meta name="Keywords" content="" />

<meta name="robots" content="noindex, nofollow, noarchive" />

<?php echo $html->css('gb-main'); ?>
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Pompiere|Prosto+One|Quattrocento Sans|Bowlby+One+SC|Changa+One|Boogaloo|Tangerine' >

<?php 
echo $html->script('jquery-1.6.1.min.js'); 
//echo $html->script('hoverIntent.js');
//echo $html->script('superfish.js'); 
echo $html->script('jquery.galleriffic.js');
echo $html->script('jquery.opacityrollover.js');
echo $html->script('gallerifficOptions.js');
echo $html->script('jquery.easing.1.3.js');
echo $html->script('jquery.touchcarousel-1.0.min.js');
echo $html->script('jquery.ae.image.resize.min.js');

?>



<!-- RELATED ITEMS SLIDER -->
<script type="text/javascript">
		jQuery(function($) {
			
			jQuery("#carousel-image-and-text").touchCarousel({					
				pagingNav: false,
				snapToItems: false,
				itemsPerMove: 4,				
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

<body>

<!-- superfish for menu -->
		<script type="text/javascript">

		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});

		</script>


<!--Facebook -->
<div id="fb-root"></div>

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
    <div id="left-header">&nbsp;</div>
   
   <div id="wrapper-shell">
   
          	<div id="sun-left">&nbsp;</div>
        	<div id="sun-right">&nbsp;</div>

       	    
    <div id="wrapper">
       		
        <div id="header">
        
        		<a href="/"><div id="header-link"></div></a>
          
          
        </div>
        
        <div id="account">
          <ul class="gb-horiz-account">
            <li class="gb-account">LOG IN!</li>
            <li class="gb-account">SUBSCRIBE</li>
          </ul>
        </div>
        
        <div id="nav"> <?php echo $this->element('menu_top');?>
        </div>
              
              <!-- <div class="logo"> <?php //echo $html->image('logo.png', array('border' => '0', 'width' => '140', 'alt' => 'Gourmet', 'title' => 'Gourmet', "url"=>"/")); ?> </div>--> 
              
    </div><!-- end wrapper -->
            
        <div id="content">
          <div id="menu_vendor"> <?php echo $this->element('menu_vendors');?> </div>
          <div id="content_vendor"> <?php echo $content_for_layout; ?> </div>
          
          <div class="clear-both"></div>
          
        </div>

    </div><!-- end wrapper  -->
	</div><!-- end wrapper-shell  -->
   
  
    <div id="vendor-story-wrapper-shell">
        <div class="vendor-story-wrapper">
            <div class="pad">
            <h2><?php echo $products[0]['u']['shop_name'] ?></h2><br />


				<div class="vendor-article-pic1-wrapper"></div>
                
               <div class="vendor-article-pic1">
                      
                     <!-- <img src="/app/webroot/img/temp-pics/<?php echo $products[0]['u']['image3'] ?>" width="280" height="160" />-->
                        <?php echo $html->image('logos/'.$products[0]['u']['image3'], array('width' => '220px', 'border' => '0', 'class' =>'vendor-story-pic', 'alt' => 'Vendor', 'title' => 'Vendor' )); ?>
               </div>
                
                
                <div class="vendor-info"> <?php echo $products[0]['u']['shop_description'] ?>
                </div>
                
                
                <div style="margin:auto;width:810px;margin-top:20px;margin-bottom:20px">
                    
                    <div class="vendor-article-pic-box" >
                    <?php echo $html->image('logos/'.$products[0]['u']['image4'], array('width' => '250px', 'border' => '0', 'class' =>'vendor-story-pic', 'alt' => 'Vendor', 'title' => 'Vendor Pic 4' )); ?>
                    
                    </div>
                    
                    <div class="vendor-article-pic-box">
                    <?php echo $html->image('logos/'.$products[0]['u']['image5'], array('width' => '250px', 'border' => '0', 'class' =>'vendor-story-pic', 'alt' => 'Vendor', 'title' => 'Vendor Pic 5' )); ?>
                    
                    </div>
                    
                    <div class="vendor-article-pic-box" style="padding-right:0">
                    <?php echo $html->image('logos/'.$products[0]['u']['image6'], array('width' => '250px', 'border' => '0', 'class' =>'vendor-story-pic', 'alt' => 'Vendor', 'title' => 'Vendor Pic 6' )); ?>
                    
                 	</div>
                    
                    <div class="clear"></div>
                 
                </div>
                
            </div>
        </div>
  	</div>

<div style="clear:both"></div>

<div id="footer"> <?php echo $this->element('menu_footer');?></div>

</body>
</html>