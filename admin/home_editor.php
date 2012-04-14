<?php
$page = "settings";
include_once("_header.php");
DB::connect();
$picture = "";
$title = "";
$description = "";
$link = "";
$show = 0;

$feat_picture = "";
$feat_title = "";
$feat_subtitle = "";
$feat_description = "";    
$feat_price = "";
$feat_link = "";
$feat_show = 0;

$body_text_head1    = "";
$body_text_head2    = "";
$body_text_head3    = "";
$body_text_head4    = "";
$body_text_link1    = "";
$body_text_link2    = "";
$body_text_link3    = "";
$body_text_link4    = "";
$body_text_content  = "";
$body_text_link     = "";
$body_pagetext      = "";
$body_pagelink      = "";
$body_text_register = "";
$body_text_become   = "";
$body_text_thanks   = "";


if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'updtlist')
{
    $queryipdt = "UPDATE feature_slides SET show_front = '".$_REQUEST['show']."' WHERE id = '".$_REQUEST['id']."'";
    DB::execute($queryipdt);
} 
if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'updtshow')
{
    $queryipdt = "UPDATE feature_blocks SET feature_show = '".$_REQUEST['show']."' WHERE id = '".$_REQUEST['id']."'";
    DB::execute($queryipdt);
}
if(isset($_REQUEST['type']) && $_REQUEST['type']=='delete')
{
    $delete = "DELETE FROM feature_slides WHERE id = '".$_REQUEST['id']."'";
    DB::execute($delete);
}

if(isset($_REQUEST['type']) && $_REQUEST['type']=='deleteblock')
{
    $delete = "DELETE FROM feature_blocks WHERE id = '".$_REQUEST['id']."'";
    DB::execute($delete);
}
if(isset($_POST['body']))
{
    if($_POST['logobody']!="")
    {
        $imageupdt = $_POST['logobody'];
    }
    else
    {
        $imageupdt = $_POST['imgvalue'];
    }
    $body_text_head1    = $_POST['head1'];
    $body_text_head2    = $_POST['head2'];
    $body_text_head3    = $_POST['head3'];
    $body_text_head4    = $_POST['head4'];
    $body_text_link1    = $_POST['head_link1'];
    $body_text_link2    = $_POST['head_link2'];
    $body_text_link3    = $_POST['head_link3'];
    $body_text_link4    = $_POST['head_link4'];
    $body_pagetext      = $_POST['body_pagetext'];
    $body_pagelink      = $_POST['body_pagelink'];
    $body_text_content  = $_POST['body'];
    $body_text_link     = $_POST['body_link'];
    $body_text_register = $_POST['text_register'];
    $body_text_become   = $_POST['text_become'];
    $body_text_thanks   = $_POST['text_thanks'];
 
    $query3 = "UPDATE home_page SET
              headline_1        = '".$body_text_head1."',
              headline_2        = '".$body_text_head2."',
              headline_3        = '".$body_text_head3."',
              headline_4        = '".$body_text_head4."',
              headline_link1    = '".$body_text_link1."',
              headline_link2    = '".$body_text_link2."',
              headline_link3    = '".$body_text_link3."',
              headline_link4    = '".$body_text_link4."',
              full_page_pic     = '".$imageupdt."',
              full_page_text    = '".$body_pagetext."',
              full_page_pic_link= '".$body_pagelink."',
              body_text_content = '".$body_text_content."',
              body_text_link    = '".$body_text_link."',
              body_text_register= '".$body_text_register."',
              body_text_become  = '".$body_text_become."',
              body_text_thanks  = '".$body_text_thanks."'
              WHERE id = 1";
    DB::execute($query3);   
}      

if(isset($_POST['block']))
{
    
    $feat_picture = $_POST['logo_feat'];
    $feat_title = $_POST['feat_title'];
    $feat_subtitle = $_POST['feat_subtitle'];
    $feat_description = $_POST['feat_description'];    
    $feat_price = $_POST['feat_price'];
    $feat_link = $_POST['feat_link'];
    
    $query2 = "INSERT INTO feature_blocks SET
              feature_block_pic = '".$feat_picture."',
              feature_block_title = '".$feat_title."',
              feature_block_subtitle = '".$feat_subtitle."',
              feature_block_description = '".$feat_description."',
              feature_block_price = '".$feat_price."',
              feature_block_link = '".$feat_link."',
              feature_show = 0";
    DB::execute($query2);
    
}

if(isset($_POST['block_updt']))
{
    if($_POST['logo_featedit']!="")
    {
        $imageupdt = $_POST['logo_featedit'];
    }
    else
    {
        $imageupdt = $_POST['imgvalue'];
    }
    $feat_id = $_POST['id_block'];
    $feat_title = $_POST['feat_title'];
    $feat_subtitle = $_POST['feat_subtitle'];
    $feat_description = $_POST['feat_description'];    
    $feat_price = $_POST['feat_price'];
    $feat_link = $_POST['feat_link'];
    
    $query2 = "UPDATE feature_blocks SET
              feature_block_pic = '".$imageupdt."',
              feature_block_title = '".$feat_title."',
              feature_block_subtitle = '".$feat_subtitle."',
              feature_block_description = '".$feat_description."',
              feature_block_price = '".$feat_price."',
              feature_block_link = '".$feat_link."',
              feature_show = '".$feat_show."'
              WHERE id = '".$feat_id."'";
    DB::execute($query2);
    
}

if(isset($_POST['slide']))
{
    $picture = $_POST['logo'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $show = $_POST['show'];    
       
     $query = "INSERT INTO feature_slides SET
              feature_slide_pic = '".$picture."',
              feature_slide_title = '".$title."',
              feature_slide_description = '".$description."',
              feature_slide_link = '".$link."',
              show_front = 1";
    DB::execute($query);
}

if(isset($_POST['slide_updt']))
{
    if($_POST['logo_upd']!="")
    {
        $imageupdt = $_POST['logo_upd'];
    }
    else
    {
        $imageupdt = $_POST['imgvalue'];
    }
    $slide_id = $_POST['id_slide'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    
    $query2 = "UPDATE feature_slides SET
              feature_slide_pic = '".$imageupdt."',
              feature_slide_title = '".$title."',
              feature_slide_description = '".$description."',
              feature_slide_link = '".$link."'
              WHERE id = '".$slide_id."'";
    DB::execute($query2);
    
}

DB::close();
?>
<div id="registerBlock">
<img src="images/titles/title_settings.jpg" /><br>
    <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Body form</a></li>
                <li><a href="#tabs-2">Slide elements</a></li>
                <li><a href="#tabs-3">Block elements</a></li>
                <!--<li><a href="#tabs-4">Items menu</a></li>-->
            </ul>
            <div id="tabs-1">
                <?php 
                DB::connect();
                    $query_data = "SELECT * FROM home_page WHERE id = 1";
                    DB::query($query_data);
                    while($row = DB::fetch_row())
                    {
                        ?>
                            <div id="homeform">
                            <form action="home_editor.php" method="POST" onsubmit="">
                            <input type="hidden" value="x" name="body" id="body" />
                            <table style="margin-top: 43px;">
                                <tr>
                                    <td width="105">Body Settings</td>
                                </tr>
                                <tr>
                                    <td>Headline 1</td>
                                    <td width="170"><input type="text" id="head1" name="head1" value="<?php echo $row['headline_1'] ?>"/></td>
                                    <td width="27">Link</td>
                                    <td width="273"><input type="text" id="head_link1" name="head_link1" size="45" value="<?php echo $row['headline_link1'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Headline 2</td>
                                    <td><input type="text" name="head2" value="<?php echo $row['headline_2'] ?>"/></td>
                                    <td>Link</td>
                                    <td><input type="text" name="head_link2" size="45" value="<?php echo $row['headline_link2'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Headline 3</td>
                                    <td><input type="text" name="head3" value="<?php echo $row['headline_3'] ?>"/></td>
                                    <td>Link</td>
                                    <td><input type="text" name="head_link3" size="45" value="<?php echo $row['headline_link3'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Headline 4</td>
                                    <td><input type="text" name="head4" value="<?php echo $row['headline_4'] ?>"/></td>
                                    <td>Link</td>
                                    <td><input type="text" name="head_link4" size="45" value="<?php echo $row['headline_link4'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td valign="top">Back Image<br /><b>Size (495 x 281)</b></td>
                                    <td colspan="3">  
                                        <input type="hidden" value="<?php echo $row['full_page_pic'];?>" name="imgvalue"/>                           
                                        <input type="hidden" name="logobody" id="logobody" />
                                        <input type="file" name="picturebody" id="picturebody" /><br />
                                        <img src="../app/webroot/img/supersize/<?php echo $row['full_page_pic']?>" width="125" height="63" alt="logo shop" name="imglogobody" id="imglogobody" /> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Page text</td>
                                    <td colspan="3"><input style="width: 341px;" type="text" name="body_pagetext" value="<?php echo $row['full_page_text']?>"/></td>
                                </tr>
                                <tr>
                                    <td>Page Link</td>
                                    <td colspan="3"><input style="width: 341px;" type="text" name="body_pagelink" value="<?php echo $row['full_page_pic_link']?>"/></td>
                                </tr>
                                <tr>
                                    <td valign="top">Body text</td>
                                    <td colspan="3">
                                        <textarea name="body" style="width: 340px;height: 99px;"><?php echo $row['body_text_content']?></textarea>
                                    </td>                        
                                </tr>
                                <tr>
                                    <td valign="top">Body text link</td>
                                    <td colspan="3"><input type="text" name="body_link" value="<?php echo $row['body_text_link']?>"/></td>                        
                                </tr>
                                <tr>
                                    <td valign="top">Text Register</td>
                                    <td colspan="3"><input type="text" name="text_register" value="<?php echo $row['body_text_register']?>"/></td>                        
                                </tr>
                                <tr>
                                    <td valign="top">Text Become</td>
                                    <td colspan="3"><input type="text" name="text_become" value="<?php echo $row['body_text_become']?>"/></td>                        
                                </tr>
                                <tr>
                                    <td valign="top">Text Thanks</td>
                                    <td colspan="3"><input type="text" name="text_thanks" value="<?php echo $row['body_text_thanks']?>"/></td>                        
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="image" onclick="updateHome()" src="images/btn_update.jpg">
                                    </td>
                                </tr>
                            </table>
                            </form>
                            </div>
                        <?php
                    }
                DB::close();
                ?>                
            </div>
            
            <div id="tabs-2">
                <div id="formformcontent" style="float: left;">
                        <form action="home_editor.php" method="POST" onsubmit="return check_form()">
                        <input type="hidden" value="x" name="slide" id="slide" />
                        <table style="margin-top: 43px;">
                        <tr>
                            <td colspan="2">Slide Elements</td>
                        </tr>
                        <tr>
                            <td valign="top">Picture<br /><b>size (980 x 400)</b></td>
                            <td>                                
                                <input type="hidden" name="logo" id="logo" />
                                <input type="file" name="picture" id="picture" /><br />
                                <img src="images/logo.png" width="125" height="63" alt="logo shop" name="imglogo" id="imglogo" />  
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">Title</td>
                            <td><textarea name="title" style="width: 267px;height: 54px;"></textarea></td>
                        </tr>
                        <tr>
                            <td valign="top">Description</td>
                            <td><textarea name="description" style="width: 267px;height: 54px;"></textarea></td>
                        </tr>
                        <tr>
                            <td>Link</td>
                            <td><input type="text" name="link"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="image" onclick="" src="images/btn_add.jpg"></td>
                        </tr>                   
                     </table>
                     </form>
                </div>
                
                <div id="slideslist" style="float: right;float: right;overflow: overlay;height: 402px;margin-top: 43px;">
                    <form action="home_editor.php" name="form3" method="POST">
                    <input type="hidden" value="updtshow_slide" name="type"/>
                    <table style="width: 446px;" cellpadding="0" cellspacing="0">
                        <tr style="background-color: silver;height: 30px;">
                            <th width="25">id</th>
                            <th width="80">image</th>
                            <th width="80">title</th>
                            <th width="40">Show Front</th>
                            <th width="40">Options</th>
                        </tr>
                        <?php 
                            DB::connect();
                            $query_slide = "SELECT * FROM feature_slides ORDER BY id ASC";
                            DB::query($query_slide);
                            while($row = DB::fetch_row())
                            {
                                if($row['show_front'] == 1)
                                {
                                    $check1 = "checked";
                                }
                                else
                                {
                                    $check1 = "";
                                }
                                
                                echo "<input type='hidden' value='".$row['id']."' name='id_slide_updt'/>
                                        <tr ><td align='center' style='cursor:pointer;border-right: solid 1px silver;border-left: solid 1px silver;border-bottom: solid 1px silver;'><a onclick='load(".$row['id'].")'>".$row['id']."</a></td>
                                          <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><img src='../app/webroot/img/featured/".$row['feature_slide_pic']."' width='100'></td>
                                          <td style='border-right: solid 1px silver;border-bottom: solid 1px silver;'>".$row['feature_slide_title']."</td>
                                          <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><input type='checkbox' id='checkbox".$row['id']."' name='checkbox".$row['id']."' ".$check1."  onclick='conprovar2(this, ".$row['id'].")'/></td>
                                          <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><a href='javascript:void()' onclick='opciondelete(".$row['id'].")'>Delete</a></td></tr>";
                            }
                            DB::close();
                        ?>
                    </table>
                    </form>
                </div>
            </div>
            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script type="text/javascript">
             function load(id) {
             	 $("#formformcontent").load("utils/home_editor/edit.php?type=edit&id="+id);
            };
            
            function conprovar2(valor, id)
            {
                if(valor.checked)
                {
                    updateSelect(id, 1);
                }
                else
                {
                    updateSelect(id, 0);
                }
            }            
            </script>
            <script>
            function updateSelect(id, valorcheck)
            {
                $.ajax({
                url: "home_editor.php?type=updtlist",
                type: "post",
                data: "id="+id
                       +"&show="+valorcheck,         
                success: function()
                {
                    //location.reload();
                    $("#slideslist").load("utils/home_editor/list_slides.php");
                }
                });
            }
            </script>
            
            <script>
                function opciondelete(id)
            {
                $.ajax({
                url: "home_editor.php?type=delete",
                type: "post",
                data: "id="+id,         
                success: function()
                {
                    //location.reload();
                    $("#slideslist").load("utils/home_editor/list_slides.php");
                }
                });
            }
            </script>                        
            <div id="tabs-3">
                <div id="formblock" style="float: left;">
                <form id="form" action="home_editor.php" method="POST" onsubmit="return check_form()">
                <input type="hidden" value="x" name="block" id="block" />
                <table style="margin-top: 43px;">
                    <tr>
                        <td colspan="2">Block Elements</td>
                    </tr>
                    <tr>
                        <td valign="top">Picture<br /><b>Size (265 x 240)</b></td>
                        <td>                            
                            <input type="hidden" name="logo_feat" id="logo_feat" />
                            <input type="file" name="feat_picture" id="feat_picture" /><br />
                            <img src="images/logo.png" width="125" height="63" alt="logo shop" name="imglogofeat" id="imglogofeat" />
                        </td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="feat_title"/></td>
                    </tr>
                    <tr>
                        <td>Sub title</td>
                        <td><input type="text" name="feat_subtitle"/></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type="text" name="feat_description"/></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="feat_price"/></td>
                    </tr>
                    <tr>
                        <td>Link</td>
                        <td><input type="text" name="feat_link"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="image" onclick="" src="images/btn_add.jpg"></td>
                    </tr>
                </table>
                </form>
                </div>                
                <div id="blocklist" style="float: right;float: right;overflow: auto;height: 402px;margin-top: 43px;">
                    <form action="home_editor.php" method="post" enctype="multipart/form-data" name="formitemblock" id="formitemblock">
                    <table style="margin-right: 33px;width: 440px;" cellpadding="0" cellspacing="0">
                        <tr style="background-color: silver;height: 30px;">
                            <th width="25">id</th>
                            <th width="80">image</th>
                            <th width="80">title</th>
                            <th width="40">Show Front</th>
                            <th width="40">Options</th>
                        </tr>
                        <?php 
                            DB::connect();
                            $query_slide = "SELECT * FROM feature_blocks";
                            DB::query($query_slide);
                            while($row = DB::fetch_row())
                            {
                                if($row['feature_show']==1)
                                {
                                    $check = 'checked';
                                }
                                else
                                {
                                    $check = '';
                                }
                                echo "<tr ><td align='center' style='cursor:pointer;border-right: solid 1px silver;border-left: solid 1px silver;border-bottom: solid 1px silver;'><a onclick='loadblock(".$row['id'].")'>".$row['id']."</a></td>
                                          <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><img src='../app/webroot/img/featured/".$row['feature_block_pic']."' width='100'></td>
                                          <td style='border-right: solid 1px silver;border-bottom: solid 1px silver;'>".$row['feature_block_title']."</td>
                                          <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><input type='checkbox' id='chkblock".$row['id']."' name='checkboxblock' ".$check."  onclick='comprovar(this, ".$row['id'].")'/></td>
                                          <td align='center' style='border-right: solid 1px silver;border-bottom: solid 1px silver;'><a href='javascript:void()' onclick='opciondelete2(".$row['id'].")'>Delete</a></td></tr>";  
                            }

                            DB::close();
                        ?>
                    </table>
                    </form>                    
                </div>
            </div>
            <script type="text/javascript">
             function loadblock(id) {
             	 $("#formblock").load("utils/home_editor/edit.php?type=editblock&id="+id);
            }
            
            function comprovar(check, id)
            {
                var checkboxes = document.getElementById('formitemblock').checkboxblock;
                
                var cont = 0;
     
                for (var x=0; x < checkboxes.length; x++) {
                    if (checkboxes[x].checked) {
                        cont = cont + 1;
                    }
                }
                
                if(check.checked)
                {
                        if(cont > 9)
                        {
                            alert('Only 9 items  can be selected, deselect  1 for selected other');
                            document.getElementById("chkblock"+id).checked=false;                
                        }
                        else
                        {   
                            updateShow(id, 1);
                        }
                }
                else
                {   
                    updateShow(id, 0);
                }
            }           
            </script>
            
            <script>
            function updateShow(idshow, show)
            {                
                $.ajax({
                url: "home_editor.php?type=updtshow",
                type: "post",
                data: "id="+idshow
                       +"&show="+show,         
                success: function()
                {
                    //location.reload();
                    $("#blocklist").load("utils/home_editor/list_block.php");
                }
                });
            } 
            
            </script>
            <script>
            function opciondelete2(id)
            {
                $.ajax({
                url: "home_editor.php?type=deleteblock",
                type: "post",
                data: "id="+id,         
                success: function()
                {
                    //location.reload();
                    $("#blocklist").load("utils/home_editor/list_block.php");
                }
                });
            }
            </script>            
            <!--<div id="tabs-4">
                <table style="margin-top: 43px;">
                    <tr>
                        <td colspan="2">Menu home Elements</td>
                    </tr>
                    <tr>
                        <td valign="top">
                            Items menu
                        </td>
                        <td>
                            <div style="padding: 6px;height: 122px;overflow: overlay;border: solid 1px silver;width: 257px;">
                                <div>
                                     <?php 
                                    DB::connect();
                                    $query_menu = "SELECT * FROM feature_menu WHERE show_menu = 1";
                                    DB::query($query_menu);
                                    while($row = DB::fetch_row())
                                    {
                                        echo $row['name']."<br/>";
                                    }
                                    DB::close();
                                    ?>
                                </div>                                   
                            </div>
                        </td>
                    </tr>
                </table>
            </div>-->
    </div>
<link media="all" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" rel="stylesheet">
<link media="all" type="text/css" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/i18n/jquery-ui-i18n.min.js"></script>

<script type="text/javascript" src="js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script language="javascript">
<!--//
function check_form(){
    /*var strErr = '';
    var picture = document.getElementById('picture');
    if(picture.value=='') strErr += '- Select a picture\n';
    if(strErr!=''){
        alert('Please correct the following:\n' + strErr);
        return false;
    }
    else return true;*/
    /*var oPass = document.getElementById('password');
    var oConf = document.getElementById('confirm_password');
    var oEmail = document.getElementById('email');
    if(oUser.value=='') strErr += '- User Name\n';
    if(oPass.value=='') strErr += '- Password\n';
    if(oConf.value=='') strErr += '- Confirm Password\n';
    if(oEmail.value=='') strErr += '- E-mail\n';
    if(oPass.value!=oConf.value) strErr = '- Passwords don\'t match';
    */
}
//-->
</script>

<script type="text/javascript" language="javascript">
    $(function() {
        $( "#tabs" ).tabs();        
        
    
    });
    
    $('#picture').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Select logo',
            'auto'      : true,
            'folder'    : '../app/webroot/img/featured/',
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#logo').val(response);
                $('#imglogo').attr('src','../app/webroot/img/featured/'+response);
            }
        });  
        
        $('#feat_picture').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Select logo',
            'auto'      : true,
            'folder'    : '../app/webroot/img/featured/',
            'onComplete': function(event, queueID, fileObj, response, data) {
                $('#logo_feat').val(response);
                $('#imglogofeat').attr('src','../app/webroot/img/featured/'+response);
            }
        }); 
        
        $('#picturebody').uploadify({
            'uploader'  : 'js/uploadify/uploadify.swf',
            'script'    : 'js/uploadify/uploadify.php',
            'cancelImg' : 'js/uploadify/cancel.png',
            'buttonText': 'Select logo',
            'auto'      : true,
            'folder'    : '../app/webroot/img/supersize/',
            'onComplete': function(event, queueID, fileObj, response, data) {

                $('#logobody').val(response);
                $('#imglogobody').attr('src','../app/webroot/img/supersize/'+response);
            }
        });  
        
             

</script>
<script>
/*function updateHome()
    {
        $.ajax({
        url: "utils/home_editor/home_form.php",
        cache: false,
        type: "post",
        data: "head1="+$('#head1').val();
            +"&headlink1="+$('#head_link1').val();,         
        success: function()
        {
            $('#homeform').load('utils/home_editor/home_form.php')
        }
        });
    }*/
</script>
</div>
<?php
include_once("_footer.php");
?>


