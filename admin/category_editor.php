<?php
session_start();
$page = "categories";
include_once("_header.php");
$msg = "";
$post_type = "add";
$cid = "";
$category_name = "";
$category_summary = "";
$category_article = "";
$category_pics = array();
$msg = '';

if(isset($_POST["post_type"])) {
    switch($_POST["post_type"]){
        case "add":
            if($_POST["category_name"] !=""){
                DB::connect();
                $qry = "INSERT INTO categories
                    SET category_name = '" . $_POST["category_name"] . "' , category_summary = '" . $_POST["category_summary"] . "' , category_article = '" . $_POST["category_article"] . "' ";
                DB::execute($qry);
                DB::close();
                //header("location: categories.php");
                echo '<br><br>Category added succesfully, please click <a href="categories.php"> here </a> to continue'; exit;
            }
            else
                $msg = "<b style=\"color:red\">No categories added.</b>";
            break;

        case "update":
            if($_POST["category_name"] !=""){
                DB::connect();
                $qry = "
                    UPDATE categories
					SET category_name = '" . $_POST["category_name"] . "' , category_summary = '" . $_POST["category_summary"] . "' , category_article = '" . $_POST["category_article"] . "' 
                    WHERE category_id = " . $_POST["cid"];"' ";
                DB::execute($qry);
                DB::close();
                //header("location: categories.php");
                echo '<br><br>Category updated succesfully, please click <a href="categories.php"> here </a> to continue'; exit;
            }
            else {
                $msg = "<b style=\"color:red\">No categories updated.</b>";
            }
            break;
    }
}
if(isset($_GET["cmd"]) && $_GET["cmd"]=="edit") {
    $cid = $_GET["cid"];
    DB::connect();
    $qry = "SELECT * FROM categories WHERE category_id = " . $cid;
    DB::query($qry);
    while($row = DB::fetch_row()){
        $category_name = $row["category_name"];
		$category_summary = $row["category_summary"];
        $category_article = $row['category_article'];
		
    }
    $post_type = "update";
    DB::close();
}
if(isset($_GET["cmd"]) && $_GET["cmd"]=="delete") {
    $cid = $_GET["cid"];
    DB::connect();
    $qry = "DELETE FROM categories WHERE category_id = " . $cid;
    DB::execute($qry);
    DB::close();
    //header("location: categories.php");
    echo '<br><br>Category deleted succesfully, please click <a href="categories.php"> here </a> to continue'; exit;
}
?>



<div style="background:white;">

    <form method="post" action="category_editor.php" name="frmAdd">
        <input type="hidden" name="post_type" value="<?php echo $post_type; ?>" />
        <input type="hidden" name="cid" value="<?php echo $cid; ?>" />

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Category Data</a></li>
        <li><a href="#tabs-2">Category Images</a></li>
        
    </ul>
            
		<div id="tabs-1">
            <?php require_once('utils/categories/category-data.php'); ?>
            	<div class="clear"></div>
		</div>
          
		<div id="tabs-2">
			<?php require_once('utils/categories/category-images.php'); ?>
                 <div class="clear"></div>
  
		</div>

        
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
      
        $('#fileimage1').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 1',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image1').val(response);
                $('#bd-imgimage1').attr('src','/img/categories/'+response);
            }
        });
        $('#fileimage2').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 2',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image2').val(response);
                $('#bd-imgimage2').attr('src','/img/categories/'+response);
            }
        });
		 $('#fileimage3').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 3',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image3').val(response);
                $('#bd-imgimage3').attr('src','/img/categories/'+response);
            }
        });
		
		 $('#fileimage4').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 4',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image4').val(response);
                $('#bd-imgimage4').attr('src','/img/categories/'+response);
            }
        });
		
		 $('#fileimage5').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 5',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image5').val(response);
                $('#bd-imgimage5').attr('src','/img/categories/'+response);
            }
        });
		
		 $('#fileimage6').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 6',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/categories',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image6').val(response);
                $('#bd-imgimage6').attr('src','/img/categories/'+response);
            }
        });
		

		
	});
	

</script>
