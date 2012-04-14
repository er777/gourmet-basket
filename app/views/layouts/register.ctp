<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout; ?>:: GB</title>
<?php header('Content-type: text/html; charset=UTF-8') ;?>
<meta name="Description" content="food"/>
<meta name="Keywords" content="food"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow, noarchive" />
<?php 
echo $html->css('gb-main');
echo $html->css('colorbox');
echo $html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js');
echo $html->script('http://test.gourmet-basket.com/app/webroot/js/jquery.colorbox-min.js');
?>
</head>
<body>
<div id="outer-wrapper">

    <!-- <div id="middle-wrapper-bg"></div>-->
          
        <div id="wrapper">
          
          <div id="header">
				<div id="left-header">&nbsp;</div>
				<div id="right-header">&nbsp;</div>
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
            
            <?php //if(!isset($send)){?>
           <!-- <div id="header">
                  
                      <!-- <div id="logo">
                          <?php //echo $html->image('logos/GB_logo_final_AA.png', array('border' => '0', 'alt' => '', 'title' => '', 'width' => '150px')); ?>
                          <!--<img src="../prelaunch/images/GB_logo_final_AA.png" height="150" width="150">
                       </div>
             </div>-->
             
            <?php //} ?>
            
            
            <div id="content">
            
              <div id="content-products"> <?php echo $content_for_layout; ?> </div>
              
                <div class="clear-both"></div>
                  
                </div>
                
            <div id="footer">
            
            	<div id="left-footer">&nbsp;</div>
				<div id="right-footer">&nbsp;</div>
                
				<?php echo $this->element('menu_footer');?>
            </div>
            
         </div> <!--wrapper>-->
         
         </div> <!--middle-wrapper -->
         

     
</div>

</body>
</html>