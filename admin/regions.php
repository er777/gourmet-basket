<?php
$page = "regions";
include_once("_header.php");
?>


<div id="tabs">
    <ul>
        <li><a href="#tabs-1">International Regions</a></li>
        <li><a href="#tabs-2">US Regions</a></li>
        
    </ul>
            
		<div id="tabs-1">
            <?php require_once('utils/regions/intl-regions.php'); ?>
            	<div class="clear"></div>
		</div>

		<div id="tabs-2">
            <?php require_once('utils/regions/us-regions.php'); ?>
            	<div class="clear"></div>
		</div>
</div>


<div align="center">
   

   
<?php
include_once("_footer.php");
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/i18n/jquery-ui-i18n.min.js"></script>


<script type="text/javascript" language="javascript">
    	$(function() {
        	$("#tabs").tabs();
		 	$("#tabs-8").tabs();

 });		 
</script>


