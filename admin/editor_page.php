<?php
$page = "settings_editors";
include_once("_header.php");
?>
<div align="center">
<table class="overrow" border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td>
         <img src="images/titles/title_settings.jpg" /><br>
        </td>
    </tr>
    <tr>   
        <td colspan="2">
          Home Page Editors: 
        </td>
    </tr>
    <tr>
        <td>
<form method="get" enctype="text/plain" name="form_setting">
    <input type="hidden" value="x" name="user_id" id="user_id" />
<textarea cols="80" rows="10" name="home_page" id="home_page">
<?php
$template = implode('', file('../app/views/layouts/default.ctp'));
$template = stripcslashes($template);
$template = html_entity_decode($template, ENT_QUOTES, 'UTF-8');
echo $template;
?>
</textarea>
                            <script type="text/javascript">
                                //<![CDATA[
                
                                // This call can be placed at any point after the
                                // <textarea>, or inside a <head><script> in a
                                // window.onload event handler.
                
                                // Replace the <textarea id="editor"> with an CKEditor
                                // instance, using default configurations.
                                CKEDITOR.replace( 'home_page' );
                                //]]>
                            </script>
    <input type="image" onclick="return check_form()" src="images/btn_update.jpg">
                        
</form>        
        </td>
    </tr>
</table>
<script language="javascript">
<!--//
function check_form(){
    var strErr = '';
    /*var oUser = document.getElementById('username');
    var oPass = document.getElementById('password');
    var oConf = document.getElementById('confirm_password');
    var oEmail = document.getElementById('email');
    if(oUser.value=='') strErr += '- User Name\n';
    if(oPass.value=='') strErr += '- Password\n';
    if(oConf.value=='') strErr += '- Confirm Password\n';
    if(oEmail.value=='') strErr += '- E-mail\n';
    if(oPass.value!=oConf.value) strErr = '- Passwords don\'t match';
    if(strErr!=''){
        alert('Please correct the following:\n' + strErr);
        return false;
    }
    else return true;*/
}
//-->
</script>
</div>
<?php
include_once("_footer.php");
?>