<?php

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>GB Magazine</title>
<link href="http://gourmet-basket.com/test/app/webroot/css/magazine.css" rel="stylesheet" type="text/css" />
<link href="http://gourmet-basket.com/test/app/webroot/supersized/css/supersized.css" rel="stylesheet" type="text/css" />
<link href="http://gourmet-basket.com/test/app/webroot/supersized/theme/supersized.shutter.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/supersized/jquery.easing.min.js"></script>
<script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/supersized/js/supersized.3.2.5.js"></script>
<script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/supersized/theme/supersized.shutter.js"></script>

<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slide_interval          :   5000,		// Length between transitions
					transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	2500,		// Speed of transition
															   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					slides 					:  	[			// Slideshow Images
					
{image : 'http://gourmet-basket.com/test/app/webroot/img/supersize/3-KTLC-KIWI-smaller.jpg',
 title : 'Gourmet-Basket, The World\'s First Online Food Magazine and Shoppe',
 thumb : 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/thumbs/kazvan-1.jpg',
 url : ''},														 
														 
{image : 'http://gourmet-basket.com/test/app/webroot/img/supersize/2-SOCOLA-SIRACHA.jpg', 
 title : 'Gourmet-Basket', 
 thumb : 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/thumbs/kazvan-2.jpg', 
 url : ''},
   
{image : 'http://gourmet-basket.com/test/app/webroot/img/supersize/chilies.jpg', 
 title : 'Gourmet-Basket', 
 thumb : 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/thumbs/kazvan-3.jpg', 
 url : ''}, 
 
{image : 'http://gourmet-basket.com/test/app/webroot/img/supersize/1-TEA-PINK-small.jpg', 
 title : 'Gourmet-Basket', 
 thumb : 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/thumbs/wojno-1.jpg', 
 url : ''},
 
 
 {image : 'http://gourmet-basket.com/test/app/webroot/img/supersize/indian.jpg', 
 title : 'Gourmet-Basket', 
 thumb : 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/thumbs/wojno-1.jpg', 
 url : ''}, 
 
 
{image : 'http://gourmet-basket.com/test/app/webroot/img/supersize/nuts.jpg', 
title : 'Gourmet-Basket',
 thumb : 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/thumbs/wojno-2.jpg', 
 url : ''}, 
 
 
{image : 'http://gourmet-basket.com/test/app/webroot/img/supersize/korean.jpeg', 
title : 'Gourmet-Basket',
 thumb : 'http://buildinternet.s3.amazonaws.com/projects/supersized/3.2/thumbs/wojno-3.jpg', 
 url : ''}, 
 
 											]
					
				});
		    });
		    
		</script>


</head>

<body>
    <div id="infinite-header">
    </div>
    
    <div id="wrapper">
        
    	<div id="logo"></div>
        
			<div id="nav">
                <ul class="gb-horiz">
                    <li class="gb">SHOP BY:</li>
                    <li class="gb">CATEGORIES</li>
                    <li class="gb">US</li>
                    <li class="gb">INTERNATIONAL</li>
                    <li class="gb">CATEGORIES</li>
                    <li class="gb">SHOPPES</li>
                    <li class="gb">SPECIALIZED DIETS</li>
                    <li class="gb"></li>
                </ul>
            </div>
    
        <div id="header">
  <ul class="gb-horiz-account">
                 	<li class="gb-account">LOG IN</li>
                    <li class="gb-account">SUBSCRIBE</li>
                 </ul>
        </div>
        
  	<div class="shop-now"><a href="">SHOP NOW</a>
    </div>
    
        <div id="left-nav">
            <img src="http://gourmet-basket.com/test/app/webroot/img/left-nav-temp.png" width="300" height="488" />
        </div>
        

        <div id="footer">
        	<img src="http://gourmet-basket.com/test/app/webroot/img/footer.png" width="1000" height="238" />
        </div>


	</div>

<div id="footer-bkngd">

</div>


        <div id="supersize-navigation">
        
              <!--Thumbnail Navigation-->
                  <div id="prevthumb"></div>
                  <div id="nextthumb"></div>
                  
                  <!--Arrow Navigation-->
                  <a id="prevslide" class="load-item"></a>
                  <a id="nextslide" class="load-item"></a>
                  
                  <div id="thumb-tray" class="load-item">
                      <div id="thumb-back"></div>
                      <div id="thumb-forward"></div>
                  </div>
                  
                  <!--Time Bar-->
                  <div id="progress-back" class="load-item">
                      <div id="progress-bar"></div>
                  </div>
                  
                  <!--Control Bar-->
                  <div id="controls-wrapper" class="load-item">
                      <div id="controls">
                          
                          <a id="play-button"><img id="pauseplay" src="../../webroot/supersized/img/pause.png"/></a>
                      
                          <!--Slide counter-->
                          <div id="slidecounter">
                              <span class="slidenumber"></span> / <span class="totalslides"></span>
                          </div>
                          
                          <!--Slide captions displayed here-->
                          <div id="slidecaption"></div>
                          
                          <!--Thumb Tray button-->
                          <a id="tray-button"><img id="tray-arrow" src="../../webroot/supersized/img/button-tray-up.png"/></a>
                          
                          <!--Navigation-->
                          <ul id="slide-list"></ul>
                          
                      </div>
                  </div>
        
        
        </div>


<script type="text/javascript">

$(document).ready(function() {
		
		$("#wrapper").mouseenter(function(){
			$("#left-nav").fadeIn(500);

		$("#wrapper").mouseleave(function(){	
			$("#left-nav").fadeOut(400);
	
		});	
	});			  
});
  
  


</script>




</body>
</html>