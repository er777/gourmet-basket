<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Gourmet-Basket!</title>
<meta name="Description" content="">
<meta name="Keywords" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow, noarchive" />

<?php

echo $html->css('gb-main.css');
?>

<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Pompiere|Prosto+One|Quattrocento Sans|Bowlby+One+SC|Changa+One|Boogaloo|Tangerine' >

<?php
echo $html->script('jquery-1.6.1.min.js');
echo $html->script('hoverIntent.js');
echo $html->script('superfish.js');
echo $html->script('jquery.galleryview-3.0-dev.js');
echo $html->script('jquery.easing.1.3.js');
echo $html->script('jquery.touchcarousel-1.0.min.js');


?>



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
			<?php echo $this->element('menu_top');?>
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