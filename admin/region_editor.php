<?php
session_start();
$page = "culinary_region";
include_once("_header.php");
$msg = "";
$post_type = "add";
$cid = "";
$tradition_region = "";
$tradition_region_summary = "";
$tradition_region_article = "";
$tradition_region_pics = array();
$msg = '';

if(isset($_POST["post_type"])) {
    switch($_POST["post_type"]){
        case "add":
            if($_POST["tradition_region"] !=""){
                DB::connect();
                $qry = "INSERT INTO culinary_region
                    SET tradition_region = '" . $_POST["tradition_region"] . "' , tradition_region_summary = '" . $_POST["tradition_region_summary"] . "' , tradition_region_article = '" . $_POST["tradition_region_article"] . "' ";
                DB::execute($qry);
                DB::close();
                //header("location: culinary_region.php");
                echo '<br><br>Region added succesfully, please click <a href="culinary_region.php"> here </a> to continue'; exit;
            }
            else
                $msg = "<b style=\"color:red\">No culinary_region added.</b>";
            break;

        case "update":
            if($_POST["tradition_region"] !=""){
                DB::connect();
                $qry = "
                    UPDATE culinary_region
					SET tradition_region = '" . $_POST["tradition_region"] . "' , tradition_region_summary = '" . $_POST["tradition_region_summary"] . "' , tradition_region_article = '" . $_POST["tradition_region_article"] . "' 
                    WHERE region_id = " . $_POST["cid"];"' ";
                DB::execute($qry);
                DB::close();
                //header("location: culinary_region.php");
                echo '<br><br>Region updated succesfully, please click <a href="regions.php"> here </a> to continue'; exit;
            }
            else {
                $msg = "<b style=\"color:red\">No culinary_region updated.</b>";
            }
            break;
    }
}
if(isset($_GET["cmd"]) && $_GET["cmd"]=="edit") {
    $cid = $_GET["cid"];
    DB::connect();
    $qry = "SELECT * FROM culinary_region WHERE region_id = " . $cid;
    DB::query($qry);
    while($row = DB::fetch_row()){
        $tradition_region = $row["tradition_region"];
		$tradition_region_summary = $row["tradition_region_summary"];
        $tradition_region_article = $row['tradition_region_article'];
    }
    $post_type = "update";
    DB::close();
}
if(isset($_GET["cmd"]) && $_GET["cmd"]=="delete") {
    $cid = $_GET["cid"];
    DB::connect();
    $qry = "DELETE FROM culinary_region WHERE region_id = " . $cid;
    DB::execute($qry);
    DB::close();
    //header("location: culinary_region.php");
    echo '<br><br>Category deleted succesfully, please click <a href="culinary_region.php"> here </a> to continue'; exit;
}
?>



<div style="background:white;">

    <form method="post" action="region_editor.php" name="frmAdd">
        <input type="hidden" name="post_type" value="<?php echo $post_type; ?>" />
        <input type="hidden" name="cid" value="<?php echo $cid; ?>" />

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Intl Region Data</a></li>
        <li><a href="#tabs-2">US Region Data</a></li>
        
    </ul>
            
		<div id="tabs-1">
            <?php require_once('utils/regions/intl-regions-data.php'); ?>
            	<div class="clear"></div>
		</div>
          
		<!--<div id="tabs-2">
			<?php //require_once('utils/culinary_region/category-images.php'); ?>
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
            'folder'    : '../app/webroot/img/culinary_region',
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
            'folder'    : '../app/webroot/img/culinary_region',
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
            'folder'    : '../app/webroot/img/culinary_region',
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
            'folder'    : '../app/webroot/img/culinary_region',
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
            'folder'    : '../app/webroot/img/culinary_region',
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
            'folder'    : '../app/webroot/img/culinary_region',
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
            'folder'    : '../app/webroot/img/culinary_region',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image6').val(response);
                $('#bd-imgimage6').attr('src','/img/logos/'+response);
            }
        });
		

		
	});
	

</script>
