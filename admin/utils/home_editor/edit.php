<?php 
    include_once '../../_init.php';    
    DB::connect();
    
    /*update*/
    $action = $_REQUEST['type'];
    switch ($action)
    {
        case 'edit':
            if(isset($_REQUEST['id']))
            {
            $query_data = "SELECT * FROM feature_slides WHERE id = '".$_GET['id']."'";
            DB::query($query_data);
                while($row = DB::fetch_row())
                {
                    $idslide = $row['id'];
                    $image = $row['feature_slide_pic'];
                    $title_data = $row['feature_slide_title'];
                    $descrip_data = $row['feature_slide_description'];
                    $link = $row['feature_slide_link'];
        
    ?>
            <form action="home_editor.php" method="POST">
            <input type="hidden" value="updt" name="slide_updt" id="slide_updt" />
            <input type="hidden" value="<?php echo $idslide?>" name="id_slide" id="id_slide" />
            <table style="margin-top: 43px;">
            <tr>
                <td colspan="2">Slide Elements</td>
            </tr>
            <tr>
                <td valign="top">Picture<br /><b>size (980 x 400)</b></td>
                <td>           
                    <input type="hidden" value="<?php echo $image;?>" name="imgvalue"/>                 
                    <input type="hidden" name="logo_upd" id="logo_upd" />
                    <input type="file" name="picture_upd" id="picture_upd" /><br />
                    <img src="../app/webroot/img/featured/<?php echo $image; ?>" width="125" height="63" alt="logo shop" name="imglogo_upd" id="imglogo_upd" />  
                </td>
            </tr>
            <tr>
                <td valign="top">Title</td>
                <td><textarea name="title" style="width: 267px;height: 54px;"><?php echo $title_data;?></textarea></td>
            </tr>
            <tr>
                <td valign="top">Description</td>
                <td><textarea name="description" style="width: 267px;height: 54px;"><?php echo $descrip_data;?></textarea></td>
            </tr>
            <tr>
                <td>Link</td>
                <td><input type="text" name="link" value="<?php echo $link ?>"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="image" onclick="" src="images/btn_update.jpg"></td>
            </tr>                   
         </table>
         </form>
 <?php 
            
 DB::close();
                }
            }
        break;
        case 'editblock':
        DB::connect();
            if(isset($_REQUEST['id']))
            {
            $query_data = "SELECT * FROM feature_blocks WHERE id = '".$_GET['id']."'";
            DB::query($query_data);
                while($row = DB::fetch_row())
                {
                    $id_block = $row['id'];
                    $image_block = $row['feature_block_pic'];
                    $title_data_block = $row['feature_block_title'];
                    $subtitle_data_block = $row['feature_block_subtitle'];
                    $descrip_data_block = $row['feature_block_description'];
                    $price_data_block = $row['feature_block_price'];
                    $link_block = $row['feature_block_link'];
            ?>
                    <form action="home_editor.php" method="POST">
                    <input type="hidden" value="x" name="block_updt" id="block_updt" />
                    <input type="hidden" value="<?php echo $id_block?>" name="id_block" id="id_block" />
                    <table style="margin-top: 43px;">
                        <tr>
                            <td colspan="2">Block Elements</td>
                        </tr>
                        <tr>
                            <td valign="top">Picture<br /><b>Size (265 x 240)</b></td>
                            <td>
                                <input type="hidden" value="<?php echo $image_block;?>" name="imgvalue"/>                            
                                <input type="hidden" name="logo_featedit" id="logo_featedit" />
                                <input type="file" name="feat_pictureedit" id="feat_pictureedit" /><br />
                                <img src="../app/webroot/img/featured/<?php echo $image_block; ?>" width="125" height="63" alt="logo shop" name="imglogofeatedit" id="imglogofeatedit" />
                            </td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td><input type="text" name="feat_title" value="<?php echo $title_data_block ?>"/></td>
                        </tr>
                        <tr>
                            <td>Sub title</td>
                            <td><input type="text" name="feat_subtitle" value="<?php echo $subtitle_data_block ?>"/></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><input type="text" name="feat_description" value="<?php echo $descrip_data_block ?>"/></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td><input type="text" name="feat_price" value="<?php echo $price_data_block ?>"/></td>
                        </tr>
                        <tr>
                            <td>Link</td>
                            <td><input type="text" name="feat_link" value="<?php echo $link_block ?>"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="image" onclick="" src="images/btn_update.jpg"></td>
                        </tr>
                    </table>
                    </form>
            <?php 
            }
            }
            DB::close();
        break;
    }
    
    
    /*end update*/
    ?>
    
    

<script type="text/javascript" language="javascript">
    $(function() {
        $( "#tabs" ).tabs();   
        
                      
    });
    $('#picture_upd').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Select logo',
            'auto'      : true,
            'folder'    : '../app/webroot/img/featured/',
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#logo_upd').val(response);
                $('#imglogo_upd').attr('src','../app/webroot/img/featured/'+response);
            }
        });  
    
    $('#feat_pictureedit').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Select logo',
            'auto'      : true,
            'folder'    : '../app/webroot/img/featured/',
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#logo_featedit').val(response);
                $('#imglogofeatedit').attr('src','../app/webroot/img/featured/'+response);
            }
        });     

</script>