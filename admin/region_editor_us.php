<?php
session_start();
$page = "us_categories";
include_once("_header.php");
$msg = "";
$post_type = "add";
$cid = "";
$us_category = "";
$us_category_summary = "";
$us_category_article = "";
$us_category_pics = array();
$msg = '';

if(isset($_POST["post_type"])) {
    switch($_POST["post_type"]){
        case "add":
            if($_POST["us_category"] !=""){
                DB::connect();
                $qry = "INSERT INTO us_categories
                    SET us_category = '" . $_POST["us_category"] . "' , us_category_summary = '" . $_POST["us_category_summary"] . "' , us_category_article = '" . $_POST["us_category_article"] . "' ";
                DB::execute($qry);
                DB::close();
                //header("location: us_categories.php");
                echo '<br><br>Region added succesfully, please click <a href="us_categories.php"> here </a> to continue'; exit;
            }
            else
                $msg = "<b style=\"color:red\">No us_categories added.</b>";
            break;

        case "update":
            if($_POST["us_category"] !=""){
                DB::connect();
                $qry = "
                    UPDATE us_categories
					SET us_category = '" . $_POST["us_category"] . "' , us_category_summary = '" . $_POST["us_category_summary"] . "' , us_category_article = '" . $_POST["us_category_article"] . "' 
                    WHERE us_category_id = " . $_POST["cid"];"' ";
                DB::execute($qry);
                DB::close();
                //header("location: us_categories.php");
                echo '<br><br>US Region updated succesfully, please click <a href="regions.php"> here </a> to continue'; exit;
            }
            else {
                $msg = "<b style=\"color:red\">No us_categories updated.</b>";
            }
            break;
    }
}
if(isset($_GET["cmd"]) && $_GET["cmd"]=="edit") {
    $cid = $_GET["cid"];
    DB::connect();
    $qry = "SELECT * FROM us_categories WHERE us_category_id = " . $cid;
    DB::query($qry);
    while($row = DB::fetch_row()){
        $us_category = $row["us_category"];
		$us_category_summary = $row["us_category_summary"];
        $us_category_article = $row['us_category_article'];
    }
    $post_type = "update";
    DB::close();
}
if(isset($_GET["cmd"]) && $_GET["cmd"]=="delete") {
    $cid = $_GET["cid"];
    DB::connect();
    $qry = "DELETE FROM us_categories WHERE us_category_id = " . $cid;
    DB::execute($qry);
    DB::close();
    //header("location: us_categories.php");
    echo '<br><br>Category deleted succesfully, please click <a href="region_editor_us.php"> here </a> to continue'; exit;
}
?>



<div style="background:white;">

    <form method="post" action="region_editor_us.php" name="frmAdd">
        <input type="hidden" name="post_type" value="<?php echo $post_type; ?>" />
        <input type="hidden" name="cid" value="<?php echo $cid; ?>" />

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Region Data</a></li>
        <li><a href="#tabs-2">Region Images</a></li>
        
    </ul>
            
		<div id="tabs-1">
            <?php require_once('utils/regions/us-regions-data.php'); ?>
            	<div class="clear"></div>
		</div>
          
		<!--<div id="tabs-2">
			<?php //require_once('utils/us_categories/category-images.php'); ?>
                 <div class="clear"></div>
  
		</div>-->

        
    </form>


</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/i18n/jquery-ui-i18n.min.js"></script>
<script type="text/javascript" src="js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" language="javascript">
    $(function() {
        $("#tabs").tabs();
		 $("#tabs-cat").tabs();
		 
        // Category Images
        $('#filelogo').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Logo',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/us_categories',
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#logo').val(response);
                $('#imglogo').attr('src','/img/logos/'+response);
            }
        });
        $('#fileimage1').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 1',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/us_categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image1').val(response);
                $('#bd-imgimage1').attr('src','/img/logos/'+response);
            }
        });
        $('#fileimage2').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 2',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/us_categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image2').val(response);
                $('#bd-imgimage2').attr('src','/img/logos/'+response);
            }
        });
		 $('#fileimage3').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 3',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/us_categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image3').val(response);
                $('#bd-imgimage3').attr('src','/img/logos/'+response);
            }
        });
		
		 $('#fileimage4').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 4',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/us_categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image4').val(response);
                $('#bd-imgimage4').attr('src','/img/logos/'+response);
            }
        });
		
		 $('#fileimage5').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 5',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/us_categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image5').val(response);
                $('#bd-imgimage5').attr('src','/img/logos/'+response);
            }
        });
		
		 $('#fileimage6').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 6',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/us_categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image6').val(response);
                $('#bd-imgimage6').attr('src','/img/logos/'+response);
            }
        });
		

		
	});
	

</script>
