<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout; ?>:: GB</title>
<meta name="Description" content="food"/>
<meta name="Keywords" content="food"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow, noarchive" />
<?php 
echo $html->css('register');
echo $html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'); ?>
</head>
<body>
<div id="outer-wrapper">

  <div id="middle-wrapper">
  
        <div id="middle-wrapper-bg">
    
        <div id="wrapper">
        
        
            <div id="nav">
                   <?php echo $this->element('menu_top');?> 
            </div>
            
            <?php if(!isset($send)){?>
            <div id="header">
                  
                       <div id="logo">
                          <?php //echo $html->image('logos/GB_logo_final_AA.png', array('border' => '0', 'alt' => '', 'title' => '', 'width' => '150px')); ?>
                          <!--<img src="../prelaunch/images/GB_logo_final_AA.png" height="150" width="150">--> 
                       </div>
             </div>
             
            <?php } ?>
            
            
            <div id="content">
            
              <div id="registerBlock"> <?php echo $content_for_layout; ?> </div>
              
               <div class="clear-both"></div>
              
            </div>
            
           
      
		</div><!--wrapper -->
        
      </div><!--middle-wrapper-bg -->
    
  </div><!--middle-wrapper -->

</div><!--outer-wrapper -->

 <div id="footer"> <?php //echo $this->element('menu_footer');?> </div>

</body>
</html>