<?php require_once('views/includes/doc-header.php'); ?>

</head>
<body>

<div id="outer-wrapper">
  <!--<div id="top_star"></div>-->
  
        <div id="wrapper">
          
          <div id="header">
          <a href="/"><div id="header-link"></div></a>
				<div id="left-header">&nbsp;</div>
				<div id="right-header">&nbsp;</div>
          </div>
          
          
            
                <div id="account">
                    <ul class="gb-horiz-account">
                      <li class="gb-account">LOG IN</li>
                      <li class="gb-account">SUBSCRIBE</li>
                    </ul>
                </div>
                
                
        <div id="nav">
			<?php echo $this->element('menu_top-new');?>
        </div>

    
      <!--<div class="logo"> 
        <?php //echo $html->image('logo.png', array('border' => '0', 'width' => '140', 'alt' => 'Gourmet', 'title' => 'Gourmet', "url"=>"/")); ?>
      </div>-->
      
      
    </div>
    
    
    
    
    <div id="content">
      <div id="menu_vendor"> <?php echo $html->image('title_site.png', array('border' => '0', 'alt' => 'Welcome', 'title' => 'Welcome' , 'id' => 'title_vendor'));?> </div>
      <div id="content_vendor"> <?php echo $content_for_layout; ?> </div>
      <div class="clear-both"></div>
    </div>
    <div id="footer"> <?php echo $this->element('menu_footer');?> </div>
  </div>
</div>
</body>
</html>