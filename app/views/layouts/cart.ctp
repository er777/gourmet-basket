<?php require_once('views/includes/doc-header.php'); ?>
</head>
<body id="cart">
<div id="outer-wrapper"> CART TEMPLATE 
   

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
            <div id="footer"> <?php echo $this->element('menu_footer');?> </div>
         </div>
         <!--wrapper>--> 
         
      </div>
      <!--middle-wrapper --> 
      
   </div><!--wrapper-shell-->
    
</div><!--outer-wrapper --> 
</body>
</html>