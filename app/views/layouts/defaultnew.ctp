<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Gourmet-Basket!</title>
<meta name="Description" content="">
<meta name="Keywords" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow, noarchive" />
<?php echo $html->css('main'); ?>
<?php echo $html->script('jquery-1.6.1.min.js'); ?>
</head>
<body>
<h2>New Default Page</h2>
<div id="body_wrapper">
<div id="top_star"></div>
<div id="wrapper">
<div id="header">
<div class="logo">
	   <?php echo $html->image('logo.png', array('border' => '0', 'width' => '140', 'alt' => 'Gourmet', 'title' => 'Gourmet', "url"=>"/")); ?>
</div>
<div class="menu_top">
	<?php echo $this->element('menu_top');?>
</div>
</div>
<div id="content">
<div id="menu_vendor">
	<?php echo $html->image('title_site.png', array('border' => '0', 'alt' => 'Welcome', 'title' => 'Welcome' , 'id' => 'title_vendor'));?>
</div>
<div id="content_vendor">
<?php echo $content_for_layout; ?>
</div>
<div class="clear-both"></div>
</div>
<div id="footer">
<div class="menu_footer">
    <?php echo $this->element('menu_footer');?>
</div>
<span class="text_footer">
	&copy; Copyright 2011 - Gourmet Basket
</span>
</div>
</div>
</div>   
</body>
</html>