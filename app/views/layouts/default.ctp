<?php

function generate_id($uri) {
	/* regular expressions */
	$regex1 = '/[^a-zA-Z0-9]/'; //remove anything but letters and numbers
	$regex2 = '/[\-]+/'; //remove multiple "-"'s in a row
	$regex3 = '/^[-]+/'; //remove starting "-"
	$regex4 = '/[-]+$/'; //remove ending "-"
	/* return... */
	return preg_replace(
				array($regex1,$regex2,$regex3,$regex4),
				array('-','-','',''),
				$_SERVER['REQUEST_URI']
			  );
}

	$body_id = generate_id($_SERVER['REQUEST_URI']);
?>

<?php require_once('views/includes/doc-header.php'); ?>

<?php
echo $html->css('gb-main.css');
echo $html->script('jquery-1.6.1.min.js');
echo $html->script('hoverIntent.js');
echo $html->script('superfish.js');
?>

</head>
<body id="default">


<!--Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=214123048679188";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>






<!--  <div id="top_star">site</div>  -->

<div id="outer-wrapper">DEFAULT TEMPLATE

    <!-- <div id="middle-wrapper-bg"></div>-->
          
        <div id="wrapper">
          
          <div id="header">
          	 <a href="/"><div id="header-link"></div></a>
				<div id="left-header">&nbsp;</div>
				<div id="right-header">&nbsp;</div>
          </div>
          
          
            
                <div id="account">
                     <ul class="gb-horiz-account">
                          <li class="gb-account"><a href="/members/login">LOG IN</a></li>
                          <li class="gb-account"><a href="/members/register">SUBSCRIBE</a></li>
                      </ul>
                </div>
                
                
               <div id="nav">
                   <?php echo $this->element('menu_top');?> 
          		</div>
                
            <!-- Jorge original --> 
            
                <div id="content">
                
                  <div id="content-products"><?php echo $content_for_layout; ?></div>
                  
                  <div class="clear-both"></div>
                
                  
                </div>
                
            <div id="footer"> <?php echo $this->element('menu_footer');?> </div>
            
         </div> <!--wrapper>-->
         
         </div> <!--middle-wrapper -->
         

     
</div>

</body>
</html>