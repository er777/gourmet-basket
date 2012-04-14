<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout; ?>:: GB</title>
<meta name="Description" content="food" />
<meta name="Keywords" content="food" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow, noarchive" />

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Pompiere|Prosto+One|Quattrocento Sans|Bowlby+One+SC|Changa+One|Boogaloo|Tangerine' >

<?php
echo $html->css('gb-main.css');
echo $html->script('jquery-1.6.1.min.js');
echo $html->script('hoverIntent.js');
echo $html->script('superfish.js');
?>

</head>
<body>

<!--  <div id="top_star">site</div>
-->

<div id="outer-wrapper">

    <!-- <div id="middle-wrapper-bg"></div>-->
          
        <div id="wrapper">
          <div id="sun">&nbsp;</div>
          
          <div id="header">
				<div id="left-header">&nbsp;</div>
				
          </div>
          
          
            
                <div id="account">
                    <ul class="gb-horiz-account">
                      <li class="gb-account">LOG IN</li>
                      <li class="gb-account">SUBSCRIBE</li>
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
                
                  <div id="content-products"> <?php echo $content_for_layout; ?></div>
                  
                  <div class="clear-both"></div>
                  
                </div>
                
            <div id="footer"> <?php echo $this->element('menu_footer');?> </div>
            
         </div> <!--wrapper>-->
         
         </div> <!--middle-wrapper -->
         

     
</div>

</body>
</html>