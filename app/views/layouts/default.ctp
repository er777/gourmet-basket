<?php require_once('views/includes/doc-header.php'); ?>
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
					<!--<li class="gb-account"><a href="/members/register">SUBSCRIBE</a></li>-->
					<li class="gb-account"><a href="/cart">CART</a></li>
				</ul>
            </div>
                
                
               <div id="nav">
                   <?php echo $this->element('menu_top-new');?> 
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