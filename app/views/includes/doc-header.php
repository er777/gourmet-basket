<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout; ?>:: GB</title>
<?php echo $html->charset('utf-8'); ?>
<meta name="Description" content="food" />
<meta name="Keywords" content="food" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow, noarchive" />

<?php echo $html->css('gb-main'); ?>
<?php echo $html->css('dropkick'); ?>
<link href='http://fonts.googleapis.com/css?family=Devonshire' rel='stylesheet' type='text/css'>
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Pompiere|Prosto+One|Telex|Federo|Quattrocento Sans|Bowlby+One+SC|Changa+One|Boogaloo|Tangerine' >

<?php
//echo $html->css('gb-main.css');
echo $html->script('jquery-1.6.1.min.js');
echo $html->script('jquery-ui.min.js');
//echo $html->script('jquery.mCustomScrollbar.js');
//echo $html->script('hoverIntent.js');
echo $html->script('superfish.js');
echo $html->script('custom.js');
echo $html->script('jquery.galleryview-3.0-dev.js');
echo $html->script('jquery.easing.1.3.js');
echo $html->script('jquery.touchcarousel-1.0.min.js');
//echo $html->script('jquery.mousewheel.min.js');
//echo $html->script('jquery.marquee.js');
echo $html->script('jquery.columnizer.min.js');
//echo $html->script('hoverIntent.js');
echo $html->script('jquery.dropkick-1.0.0.js');
echo $html->script('jquery.opacityrollover.js');
echo $html->script('jquery.ae.image.resize.min.js');
?>

	<script>
		jQuery(document).ready(function() { 
		
		// Columnizer
			jQuery('.jquery-column').columnize({
				columns : 3,
				accuracy : 1,
				buildOnce : true
			})
		
		// Suckerfish
		 jQuery('ul.dropEverything').superfish({ delay:800,});	
			
			
			
		});
	</script>