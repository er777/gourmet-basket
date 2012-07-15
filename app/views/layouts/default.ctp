<?php require_once('views/includes/doc-header.php'); ?>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->

<!--<script src="../app/webroot/js/jquery.grumble.min.js" type="application/x-javascript"></script>
--><?php 
	
		//echo $html->css('grumble.min.css');
		
		//echo $html->script('Bubble.js');

?>







<!--Facebook -->
<!--<div id="fb-root"></div>
--><script>
//(function(d, s, id) {
//  var js, fjs = d.getElementsByTagName(s)[0];
//  if (d.getElementById(id)) return;
//  js = d.createElement(s); js.id = id;
//  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=214123048679188";
//  fjs.parentNode.insertBefore(js, fjs);
//}(document, 'script', 'facebook-jssdk'));</script>


<!--Grumble Popup Bubble -->
</head>
<body id="default">


<div id="outer-wrapper">DEFAULT TEMPLATE

    <!-- <div id="middle-wrapper-bg"></div>-->
          
      <div id="wrapper-shell">
     		<div id="sun-left">&nbsp;</div>
        	<div id="sun-right">&nbsp;</div>
     
        <div id="wrapper">
       
        	<div id="left-header">&nbsp;</div>
          
          	<div id="header">
          		<a href="http://test.gourmet-basket.com"><div id="header-link"></div></a>
          	</div>
          
            <div id="account">
                <ul class="gb-horiz-account">
					<li class="gb-account"><a href="/members/login">LOG IN</a></li>
					<!--<li class="gb-account"><a href="/members/register">SUBSCRIBE</a></li>-->
					<li class="gb-account"><a href="/cart">CART</a></li>
				</ul>
            </div>
                
                
               <div id="nav">
                   <?php echo $this->element('menu_top-new');?> 
          		</div>
                
            <!-- Jorge original --> 
            
                <div id="content">
                
                  <div id="content-products">
                  
                  
				  <?php echo $content_for_layout; ?>
                  
                  </div>
                  
                  <div class="clear-both"></div>
                
                  
                </div>
                
            <div id="footer"> <?php echo $this->element('menu_footer');?> </div>
            
         </div> <!--wrapper>-->
         
         </div> <!--middle-wrapper -->
         

     
</div>

<!--<script src="../app/webroot/js/jquery.grumble.min.js"></script>
-->
<script>

//jQuery('a #darkside').grumble(
//				{
//					text: 'The Caribbean',
//					angle: 0,
//					distance: 50,
//					showAfter: 200,
//					hideAfter: false,
//					hasHideButton: true, // just shows the button
//					buttonHideText: 'Pop!',
//					onHide: function(){
//						isSequenceComplete = true;
//					}
//				}
//			);
//
//		
//
//jQuery('area#darkside').click(function(e){
//			var $me = jQuery(this), interval;
//			
//			e.preventDefault();
//			
//			$me.grumble(
//				{
//					angle: 130,
//					text: 'Look at me!',
//					type: 'alt-', 
//					distance: 100,
//					hideOnClick: true,
//			
//				}
//			);
//		});
		
</script>

</body>
</html>