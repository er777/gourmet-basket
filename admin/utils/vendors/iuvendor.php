<?php

// error_reporting(E_ALL);

$v = array();
$msg = '';
/* get vendor data  */


//insert or update users
if (isset($_POST['user_id'])) {
    if (isset($_POST["products"])) 
        $_POST["mycategories"]  =  join(", ", $_POST["products"]);
    DB::insert_update('users', 'user_id', $_POST, true);
    
    //tvar($vendor);
    /* products */
   /*if (isset($_POST["products"])) {
        for ($i = 0; $i < sizeof($_POST["products"]); $i++) {
            $insertpro =
                    "INSERT INTO products(user_id, category_id, checked) values ('" . $v['user_id'] . "', '" . $_POST['products'][$i] . "', 1)";
            //echo $insertpro;
            DB::execute($insertpro);
        }
    }*/

    /* profile */
	
	/*if(isset($_POST['data']['financial'])){
		$insertFinancial = "INSERT financial SET ";
		$insertFinancial .= "user_id = $user_id ";
		foreach ($_POST['data']['financial'] as $k => $v)
		{
			$insertFinancial .= ", $k = '$v' ";
		}
		
		DB::execute($insertFinancial);*/
		
		
	foreach(array("financial","taxes","shipping","users_recipes","customer_service",)as$table)
	{
		if(!DB::get_single($table,"user_id",$_POST["user_id"]))
			DB::execute("insert $table set user_id=$user_id");
		$_POST["data"][$table]["user_id"]=$_POST["user_id"];
		DB::insert_update($table,"user_id",$_POST["data"][$table],true);
	}
     // if (isset($_POST["product_line_info"])) {
		
	//		$insertprofile =
	//		 "INSERT INTO profile(user_id, product_line_info) values ('" . $v['user_id'] . "', '" . $_POST['product_line_info'] . "')";
	//		echo $insertprofile;
	//		DB::execute($insertprofile);
	//   }
	
    if ($_POST['user_id'] == 'new')
        $msg = '<h1 style="margin-top:30px">Thank you</h1>Your information has been entered into our database<br><br>';
    else
        $msg = '<br/><br/><b style="color:green; font-size: 15px;">Your information has been upated in the database</b>';
    //$user_id = $v['user_id'];
}
$v = DB::get_single('users', 'user_id', $user_id);
$s = DB::get_single('shipping', 'user_id', $user_id);
$t = DB::get_single('taxes', 'user_id', $user_id);
//$p = DB::get_single('users_promotion', 'user_id', $user_id);
$r = DB::get_single('users_recipes', 'user_id', $user_id);
$c = DB::get_single('customer_service', 'user_id', $user_id);
//$a = DB::get_single('vendor_product_attributes', 'user_id', $user_id);

//echo "<pre style='text-align:left'>";
//print_r($v);
//echo "</pre>";

?>
<form method="post" action="vendors.php?user_id=<?php echo $user_id; ?>" id="form_vendor">
    <input type="hidden" value="<?php echo $user_id; ?>" name="user_id" id="user_id"/> 
    <input type="hidden" value="vendor" name="level" id="level"/> 
    <div id="registerBlock">
    
			<?php
                if ($user_id != "new") {
                    ?>
                    <img id="sendinfo" onclick="send_form()" src="images/btn_update.jpg" border="0" />
                    &nbsp;
                    <a href="vendors.php?cmd=delete&uid=<?php echo $user_id; ?>"><img src="images/btn_delete.jpg" onclick="return confirm(\'are you sure you wish to delete this record?\')" border="0"/></a>
                    <?php
                } else {
                    ?> 
                    <img id="sendinfo" onclick="send_form()" src="images/btn_add.jpg" border="0" />
             <?php }
             ?>   
    
    
    
    
        <table style="margin-left: 50px;float: left;">
            <tr>
                <td><img src="images/iutitles/<?php echo $user_id == 'new' ? 'add' : 'update'; ?>_vendor.jpg" /><br></td>
            </tr>    
        </table>
         <br />
         <br />

        <div style="width:650px;margin:auto;">
            <?php
            if ($msg) {
                echo $msg;
            }
            ?>
        </div><br />
       
       
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Vendor Profile</a></li>
        <li><a href="#tabs-2">Images/Logo</a></li>
        <li><a href="#tabs-3">Financial Info</a></li>
        <li><a href="#tabs-4">Shipping Info</a></li>
        <li><a href="#tabs-5">Tax Info</a></li>
        <li><a href="#tabs-6">Cust Service</a></li>
        <!--<li><a href="#tabs-6">Promotional Info</a></li>-->
        <li><a href="#tabs-7">Summary</a></li>
        <li><a href="#tabs-8">GB Recipes</a></li>
        <!--<li><a href="#tabs-9">Breakdown</a></li>-->
    </ul>
            
		<div id="tabs-1">
            <?php require_once('sections/profile2.php'); ?>
            	<div class="clear"></div>
		</div>
          
		<div id="tabs-2">
			<?php require_once('sections/images.php'); ?> 
                 <div class="clear"></div>
  
		</div>
  
		<div id="tabs-3">
			<?php require_once('sections/financial.php'); ?>  
                 <div class="clear"></div>
		</div>
        
		<div id="tabs-4">
			<?php //require_once('sections/shipping.php'); ?> 
                 <div class="clear"></div>
		</div>
        
		<div id="tabs-5">
			<?php require_once('sections/taxes.php'); ?> 
                 <div class="clear"></div>
        </div>        
        
		<div id="tabs-6">
			<?php require_once('sections/customer-service.php'); ?> 
                 <div class="clear"></div>
		</div>
   
		<div id="tabs-7">
			<?php require_once('sections/summary.php'); ?>
                 <div class="clear"></div>
		</div>
            
		<div id="tabs-8">
			<?php require_once('sections/recipes.php'); ?>
                 <div class="clear"></div>
		</div>
        
      <!--  <div id="tabs-9">
			<?php //require_once('sections/breakdown.php'); ?>
                 <div class="clear"></div>
		</div>-->
         
<!--	<div id="tabs-9">
			<?php //require_once('sections/promotional.php'); ?>   
		</div>
-->        
        
</div>    
    
    
</form>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/i18n/jquery-ui-i18n.min.js"></script>
<!-- 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
-->
<script type="text/javascript" src="js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" language="javascript">
    $(function() {
        $("#tabs").tabs();
		 $("#tabs-8").tabs();
		 
        // Shop Images
        $('#filelogo').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Logo',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/logos',
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
            'folder'    : '../app/webroot/img/logos',
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
            'folder'    : '../app/webroot/img/logos',
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
            'folder'    : '../app/webroot/img/logos',
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
            'folder'    : '../app/webroot/img/logos',
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
            'folder'    : '../app/webroot/img/logos',
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
            'folder'    : '../app/webroot/img/logos',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#image6').val(response);
                $('#bd-imgimage6').attr('src','/img/logos/'+response);
            }
        });
		
        // Breakdown Images
		 $('#bkdnimage1').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 1',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/breakdown',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#bd-image1').val(response);
                $('#bd-imgimage1').attr('src','/img/breakdown/'+response);
            }
        });
        $('#bkdnimage2').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 2',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/breakdown',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#bd-image2').val(response);
                $('#bd-imgimage2').attr('src','/img/breakdown/'+response);
            }
        });
		 $('#bkdnimage3').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 3',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/breakdown',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#bd-image3').val(response);
                $('#bd-imgimage3').attr('src','/img/breakdown/'+response);
            }
        });
		
		 $('#bkdnimage4').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 4',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/breakdown',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#bd-image4').val(response);
                $('#bd-imgimage4').attr('src','/img/breakdown/'+response);
            }
        });
		
		 $('#bkdnimage5').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 5',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/breakdown',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#bd-image5').val(response);
                $('#bd-imgimage5').attr('src','/img/breakdown/'+response);
            }
        });
		
		 $('#bkdnimage6').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Browse for Image 6',
			'width'     : 300,
            'auto'      : true,
            'folder'    : '../app/webroot/img/breakdown',
			'sizeLimit'   : 150000,
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#bd-image6').val(response);
                $('#bd-imgimage6').attr('src','/img/breakdown/'+response);
            }
        });
		
		
		
         
        $(".requiredInput").focus(function(){
            if($(this).val()=="this is required")
                $(this).css("background","white").val("")   
        });
        $(".requiredInput").blur(function(){
            if($(this).val()=="")
                $(this).css("background","red").val("this is required")   
        });
        $(":password").focus(function(){
            if($(this).val()=="this is required")
                $(this).css("background","#FFFFCE").val("")   
        });    
        $(":password").blur(function(){
            if($(this).val()=="")
                $(this).css("background","red")
        });
        $("#user_name").keyup(function(){
            if( $(this).val().length > 5 ){
                $.post( "ajax.php",{ action:1, q: $(this).val(), user_id: '<?php echo $user_id ?>' }  ,
                function( data ) {
                    if(data==1)
                        $( "#imgAPPROVAL" ).html('<div class="no"> already exists</div>')
                    if(data==0){
                        $( "#imgAPPROVAL" ).html('<div class="yes"> </div>')
                    }            
                });            
            }else{
                $( "#imgAPPROVAL" ).html('<div class="nop"> use at least 5 characters</div>')  
            }
        });   
    });

    function send_form(){
        var send = true
        $.each($(".requiredInput"), function() {
            if($(this).val()=="this is required" || $(this).val()==""){
                send = false;
                $(this).css("background","red").val("this is required");
            }
        });
        $.each($(":password"), function() {
            if($(this).val()=="")
                $(this).css("background","red")
            else{
                if($("#password1").val()==$("#password").val()){
                    $(".er_pass").text("")
                }else{
                    send = false;            
                    $(".er_pass").text("Passwords do not match")
                }
            }
        }); 
        if($("#country_id option:selected").val()==""){
            send = false;
            $("#country_id option:selected").text('this is required')
            $("#country_id").css("background","red")
        }
        if($("#zone_id option:selected").val()==""){
            send = false;
            $("#zone_id option:selected").text('this is required')
            $("#zone_id").css("background","red")
        }
        if(send==false)
            alert("Fields with * are required")
            
        if( $("#user_name").val().length > 5 ){
            $.post( "ajax.php",{ action: 1, q: $("#user_name").val(), user_id: '<?php echo $user_id ?>' }  ,
            function( data ) {
                if(data==1)
                    $( "#imgAPPROVAL" ).html('<div class="no"> already exists</div>')
                if(data==0){
                    $( "#imgAPPROVAL" ).html('<div class="yes"> </div>')
                    if(send){
                        $( "#form_vendor" ).submit();  
                    }
                                   
                }
                if(data==2){
                    if(send){
                        $( "#form_vendor" ).submit();  
                    }                
                }            
            });            
        }else{
            $( "#imgAPPROVAL" ).html('<div class="nop"> please use at least 5 characters  </div>')  
        }
    }

</script>
