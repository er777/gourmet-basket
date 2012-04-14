<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js">
		<head>
		<?php echo $html->charset('utf-8'); ?>
		<title>GB Magazine</title>
		<!--<link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media="screen, projection" />-->	
        <!--<link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print" />-->
		<!--[if lt IE 8]>
    <link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection">
  <![endif]-->

		<link href="http://gourmet-basket.com/test/app/webroot/css/magazine.css" rel="stylesheet" type="text/css" />
		<link href="http://gourmet-basket.com/test/app/webroot/supersized/css/supersized.css" rel="stylesheet" type="text/css" />
		<link href="http://gourmet-basket.com/test/app/webroot/supersized/theme/supersized.shutter.css" rel="stylesheet" type="text/css" />
        
        <link href='http://fonts.googleapis.com/css?family=Tangerine:700' rel='stylesheet' type='text/css'>
        
      
        
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/js/modernizr-2.0.6.js"></script>
		<script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/supersized/jquery.easing.min.js"></script>
		<script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/supersized/js/supersized.3.2.5.js"></script>
		<script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/supersized/theme/supersized.shutter.js"></script>
        <script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/js/jcarousellite_1.0.1.js"></script>
        <script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/js/slideshow.js"></script>
        <script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.cycle/2.88/jquery.cycle.all.js"></script>
        <script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/js/jquery.li-scroller.1.0.js"></script>
        <script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/js/jquery.marquee.js"></script>
        <script type="text/javascript" src="http://gourmet-basket.com/test/app/webroot/js/jquery.columnizer.min.js"></script>
        
        
        <?php echo $html->script('jquery.hoverIntent.minified.js'); ?>
		


<!--<script type="text/javascript">
  GB.assetsBaseURI = "http://www.gourmet-basket.com/resources/assets";
  GB.Config = {"trackingAccount":"ggtasteprod","subsiteKey":"taste","compressAssets":true,"storeId":120,"subsiteId":12,"subsiteName":"Gourmet Basket","subsiteSupportNum":"(855) 827-8347","productsPerPage":30,"adminBaseUri":"https://admin.gb.com/","subsiteHostname":"gourmet-basket.com","saleId":71962150,"companyName":"Gourmet Basket","subsiteSupportEmail":"info@gourmet-basket.com","assetsPath":"/resources/assets","GBUri":"http://www.gourmet-basket.com","saleKey":"taste","channelId":10,"assetsBaseUri":"http://www.gourmet-basket.com/resources/assets"};
  GB.Subsite = {};
  GB.Subsite.current_subsite_id = GB.Config.subsiteId;
</script>
-->

	<script>
		jQuery(function(){
			jQuery('.jquery-column').columnize({
				columns : 3,
				accuracy : 1,
				buildOnce : true
			})
		});
	</script>






		
</head>

<body id="home">
<div id="upper">



 			<div class="ticker-wrap">
            
            
           <!-- <marquee loop="3" behavior="slide" direction="left" width="1400"><h2>START Lorem ipsum dolor sit amet END</h2></marquee> -->
            
            
                  <ul id="ticker01">
                  	<li><img src="img/international.png" width="1366" height="52" alt=""/></li>
                   	<li><img src="img/regional.png"  width="1543" height="52" alt=""/></li>
                    <li><img src="img/chefs-tips.png"  width="1021" height="52" alt=""/></li>
                    <li><img src="img/recipes.png"  width="909" height="52" alt=""/></li>
                   <li><img src="img/articles.png"  width="1021" height="52" alt=""/></li>
                    <li><img src="img/pairings.png"  width="975" height="52" alt=""/></li>
                    
                  </ul>
              
              </div>

         
			<div id="upper-wrapper">
            

            
             <div id="header-magazine"></div>
             	
            		 	<div id="left-header">&nbsp;</div>
						<!--<div id="right-header">&nbsp;</div>-->
             
             	<div id="account">
                	 <ul class="gb-horiz-account">
                         
                          <li class="gb-account"><a href="/members/register">BECOME A MEMBER</a></li>
                           <li class="gb-account"><a href="/members/login">LOG IN</a></li>
                      </ul>
                </div>
            
                     
          
                      <!--<div id="logo"></div>-->
          
          			
          
          
                    <div id="nav" style="margin-left:30px">
                    
                   <?php echo $this->element('menu_top-new');?> 
                   
          			 </div>
                     
                     	<div id="gb-title">
                   			<img src="img/gb-title.png" width="1000" height="160" alt="gourmet-basket" />
                   		</div>
                    
              <div id="upper-content">
              
             
              
              
              <div id="headlines">
             
                  <div class="headline-1">
                        <div>
                            
                            <a href="<?php echo $headline_home['headline_link1'];?>">
						          <?php echo $headline_home['headline_1'];?>
                            </a>
                            </h2>
                        </div>
                        <div></div>
                  </div>
                                               
                  <div class="headline-2">
                        <div>
                            <h2>
                            <a href="<?php echo $headline_home['headline_link2'];?>">
						          <?php echo $headline_home['headline_2'];?>
                            </a>
                            </h2>
                        </div>
                         <div></div>
                  </div>
                      
                  <div class="headline-3">
                        <div>
                            <h2>
                            <a href="<?php echo $headline_home['headline_link3'];?>">
						          <?php echo $headline_home['headline_3'];?>
                            </a>
                            </h2>
                        </div>
                        <div></div>
                  </div>
                      
                  
                    <div class="headline-4">
                        <div>
                            <h2>
                            <a href="<?php echo $headline_home['headline_link4'];?>">
						          <?php echo $headline_home['headline_4'];?>
                            </a>
                            </h2>
                        </div>
                        <div></div>
                    </div>
                    
                  
                  
                      
                  <div class="front-page-pic-link">
                      <img src="img/lil-star.png" width="36" height= "23" style="float:left" />
                      <div class="pic-link-title"><a href="<?php echo $headline_home['full_page_pic_link'];?>"><?php echo $headline_home['full_page_text'];?></a></div>
                      <img src="img/lil-star.png" width="36" height="23" style="float:left" />
                      <div class="shop-now submit_button" ><a href="<?php echo $headline_home['full_page_pic_link'];?>">SHOP NOW</a></div>
                
                  </div>
              
              </div>
              
              </div>
                
          	</div>
        

</div><!--end upper-->




<div id="lower">

<div id="star-band"></div>


	<div id="lower-wrapper">
    
    
    
    
<div id="feature">
    <div class="gb400">
      

<div class="slideshow">  <!-- Will have a maximum of 9 -->
  <div class="control prev hide"></div>
  <div class="control next hide"></div>
  <div class="slideshow-slides">
    <ul>      
      <?php
        foreach ($feature_slide as $slide) {       
        ?>
            <li class="gb-feature" style="background-image: url('http://gourmet-basket.com/test/app/webroot/img/featured/<?php echo $slide['pic'];?>');" >
                <div class="holder">
                  <h1 style="color: #ffffff; font-size: 20pt;">
    			     <?php echo $slide['title'];?>
                  </h1>
                  <p style="color: #fff;">
                    <?php echo $slide['description'];?>
                  </p>
                  <div>
                    <a class="button big" target="_blank" href="<?php echo $slide['link'];?>">Shop now</a>
                  </div>
                </div>                    
            </li>
        <?php
        }	
        ?>          
    </ul>
  </div>
</div>

    </div>
    <div class="additional">
      <noscript>
        Gourmet Basket requires JavaScript and cookies. Please adjust your browser accordingly.
      </noscript>
      <div id="greeting-withjs" class="hide">
        <div style="float: left; width: 380px; padding: 10px 10px 25px 10px;">
          
          <p><?php echo $headline_home['body_text_content'];?></p>
          <p style="width: 350px;">
            Follow us
            <a href="<?php echo $headline_home['body_text_link'];?>">Read more</a>
          </p>
        </div>
        <div style="float: left; width: 270px; margin: 10px 0 10px; padding-left: 20px; border-left: 1px dotted #ccc; min-height:100px;" class="newsletter">
          <div id="newsletterRegHomePage">
            <h3><?php echo $headline_home['body_text_register'];?></h3>
            <p class="instruct">
              <span class="post_message hide"></span>
              <!--<span class="error_message hide">Thank you for subscribing</span> -->
            </p>
            <form action="/" method="post" accept-charset="utf-8" onsubmit="return false" id="newsletter_signup_form">
              <p>
                <input type="hidden" name="user[email_preferences][taste]" value="1"/>
                <input type="hidden" name="pkey" value="taste" />
                <button type="submit" id="btn_join_newsletter" name="btn_subscribe" class="button">Subscribe</button>
              </p>
            </form>
          </div>

                <div class="user_registration">
                  <h3><?php echo $headline_home['body_text_become'];?></h3>
                  
                      <div id="user_registration_A">
                        <p class="instruct">
                          <span id="newsletter_copy"></span>
                          <span class="post_message hide"><?php echo $headline_home['body_text_thanks'];?></span></p>
              <!--  <form action="/" method="post" id="user_registration_form" accept-charset="utf-8" onsubmit="return false">
                    
                    <input type="hidden" name="user[email_preferences][taste]" value="1" />
                    <input type="hidden" name="pkey" value="taste" />-->
                    
                          <div id="register_step_1">
                            <input type="email" name="user[register_email_address]" id="user_register_email_address" class="user_register_email_address required email" placeholder="Your email address" maxlength="100" style="width: 190px;" class="required email" />
                            <!--<button type="button" id="btn_register_continue" class="button" style="height: 27px; padding: 0.3em 1em 0.7em 1em;">Apply</button>  -->
                          </div>
                    
                          <div id="register_step_2" style="display:none;">
                            <div class="nonHTML5_instruct instruct" style="float:left;"></div>
                            <div style="float:left;">
                              <!--<input type="password" name="user[register_password]" id="user_register_password" class="user_register_password" placeholder="Your password" maxlength="100" style="width: 190px;" />-->
                              <button type="submit" id="btn_register" name="btn_register" class="button" style="height: 27px; padding: 0.3em 1em 0.7em 1em;">Register</button>
                            </div>
                            <div style="clear:both;"></div>
                          </div>
                          
                          <div class="error_message small"></div>
                      
                      </form>
                      </div>
            
				</div>
                
                
        </div>
      </div>
    </div>   
    
  </div><!--- end feature -->
 
  
   <div id="featured-items-block">
    <!--  This module will have  a maximum of 9 blocks. I've used link1,link2, etc. here, but I know that the code needs to be different - ER -->
       <?php
       $i_left = 0;
       $i_right = 2;
       $position = "";
       foreach ($feature_block as $key => $block) {       

            if($key!=$i_left && $key!=$i_right){
                $position = "";
            }
            if($key==$i_left){
                $position = " left";
                $i_left = $i_left + 3;
            }
            if($key==$i_right){
                $position = " right";
                $i_right = $i_right + 3;
            }            
        ?>
            <div class="featured-item<?php echo $position;?>">
                <a href="<?php echo $block['link'];?>">
                    <img src="http://gourmet-basket.com/test/app/webroot/img/featured/<?php echo $block['pic'];?>" width="293" height="266" alt="" />
                </a>
             	<div class="featured-item-desc">
             		<div class="featured-item-title"><?php echo $block['title'];?></div>
                    <div class="featured-item-subtitle"><?php echo $block['subtitle'];?></div>
                    	<div class="featured-item-desc">
                        	<span class="price"><?php echo $block['price'];?></span><span class="description "><?php echo $block['description'];?></span>
                 		</div>
                </div>
           </div>
        <?php
        }	
        ?>  
      
   </div>

    	<div id="footer-home">

			<img src="img/lower-narrow.jpg" width="1000" height="153" alt=""/>
        
        </div>
  
  	</div>



    

    





        
</div><!--end lower-->


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
					
//{image : 'img/supersize/3-KTLC-KIWI-smaller.jpg',
// title : 'Gourmet-Basket, Online Food Magazine and Shoppe',
// thumb : 'img/supersize/thumbs/kiwi-t.jpg',
// url : ''},
// 
// {image : 'img/supersize/produce.jpg',
// title : 'Gourmet-Basket, Online Food Magazine and Shoppe',
// thumb : 'img/supersize/thumbs/produce-t.jpg',
// url : ''},														 
													 
														 
{image : 'img/supersize/<?php echo $headline_home['full_page_pic'];?>', 
 title : 'Gourmet-Basket', 
 thumb : 'img/supersize/thumbs/chocolates-t.jpg',
 url : ''}
   
//{image : 'img/supersize/chilies.jpg', 
// title : 'Gourmet-Basket', 
// thumb : 'img/supersize/thumbs/chilies-t.jpg',
// url : ''}, 
// 
//{image : 'img/supersize/1-TEA-PINK-small.jpg', 
// title : 'Gourmet-Basket', 
// thumb : 'img/supersize/thumbs/tea-t.jpg',
// url : ''},
// 
// 
// {image : 'img/supersize/indian.jpg', 
// title : 'Gourmet-Basket', 
// thumb : 'img/supersize/thumbs/indian-t.jpg',
// url : ''}, 
// 
// 
//{image : 'img/supersize/nuts.jpg', 
//title : 'Gourmet-Basket',
// thumb : 'img/supersize/thumbs/nuts-t.jpg',
// url : ''}, 
// 
// 
//{image : 'img/supersize/korean.jpeg', 
//title : 'Gourmet-Basket',
// thumb : 'img/supersize/thumbs/korean-t.jpg',
// url : ''}, 
 
 											]
					
});
				
				
	 	// Ticker
         
         
         $("ul#ticker01").liScroll({travelocity: 0.15});			
				
});
	


  // Marquee ticker
  
  $(function () {
        // basic version is: $('div.demo marquee').marquee() - but we're doing some sexy extras
        
        $('div.demo marquee').marquee('pointer').mouseover(function () {
            $(this).trigger('stop');
        }).mouseout(function () {
            $(this).trigger('start');
        }).mousemove(function (event) {
            if ($(this).data('drag') == true) {
                this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
            }
        }).mousedown(function (event) {
            $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
        }).mouseup(function () {
            $(this).data('drag', false);
        });
    });

	
	
	
			
			
		//Headline Fade IN
		$(document).ready(function(){
				
			$('.headline-1').cycle({ 
				fx:      'fade',
				timeout:       6000,
				speedIn:  5000
    			//speedIn:  5000, 
    			//speedOut: 2000
    			
				
			});
			
			$('.headline-2').cycle({ 
			
				fx:      'fade',
				timeout:  5000, 
    			speedIn:  2000
    			
    			
			});
			$('.headline-3').cycle({ 
			
				fx:      'fade', 
				timeout:  8000,
    			speedIn:  5000 
    			
    			
			});
			$('.headline-4').cycle({ 
			
				fx:      'fade', 
				timeout:  4000,
    			speedIn:  2000 
    			
    			
			});
});
	
   
   // Carousel
   
  $(document).ready(function() {
    $('.slideshow').slideshow();
	
   // GB.Taste.Newsletter($('#newsletterRegHomePage')).setup();
//    GB.Taste.Register.initTwoStepRegister();
//    GB.Taste.formsHelper.nonHtml5InputPlaceholder($('input.user_register_email_address'));
//    if(!Modernizr.input.placeholder){ $('.input_instructions_nonHTML5').html("Create a password:"); }
//    $('.grid').gridfy();
//    TasteTracking.stories.setupOriginFromHomepage();
  });
  //TasteTracking.setup('homepage', 'homepage', 'no category');		    
</script>

        
<script type="text/javascript">

$(document).ready(function() {
		
		$("#wrapper").mouseenter(function(){
			$("#left-nav").fadeIn(500);
			
			

		$("#wrapper").mouseleave(function(){	
			$("#left-nav").fadeOut(400);

		
		$("#about").mouseenter(function(){
			$("#footer").fadeIn(500);
			$(this).fadeOut(400);
			
			});					
		});	
	});			  
});
  
  


</script>
</body>
</html>