<?php
$page = "settings";
include_once("_header.php");
if (isset($_POST['new'])) {
    $tr = DB::insert_update('tax_rate', 'id', $_POST);
}
?>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<div align="center">
    <table class="overrow" border="0" cellpadding="0" cellspacing="0" style="width:600px; text-align:left">
        <tr>
            <td>
                <img src="images/titles/title_settings.jpg" /><br>
            </td>
        </tr>
        <tr>   
            <td>
                Taxes 
            </td>
        </tr>
        <tr>
            <td>
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
                <tr>
                    <td>List of Taxes :</td>  
                     <td align="right" width="250">
                    
                     </a>
                      <a class="button" onclick="newtax()" style="text-decoration:none;color:Gray;" title="Gourmet Basket - ADD TAX"> 
                      <img src="images/add.png" width="16"/> Add Tax Rate
                      </a>
                </td>              
                </tr>
            </table>
                <form action="" method="post" onsubmit="return checkTaxForm();">     
                    <?php
                    $ta = BuildTable("tax_rate");
                    echo $ta->GenerateTable();
                    ?>
                </form>
            </td>
        </tr>
        <tr>
            <td>

               
            </td>
        </tr>    
    </table>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    function newtax(){

        newtax = '<tr>'
        newtax += '	<td valign="top">'
        newtax += '    <input type="hidden" value="new" name="new" id="new" />'
        newtax += '    <input type="hidden" value="new" name="id" id="id" />'
        newtax += '    <select size="1" name="zone_id" id="zone_id">'
        <?php
        $var1 = "";
        $var1 .= "SELECT zone_id, ";
        $var1 .= "       `name` ";
        $var1 .= "FROM   zone ";
        $var1 .= "WHERE  country_id = '223' ";
        $var1 .= "ORDER  BY `name` ASC ";
        echo 'newtax += ' . db_options($var1)
        ?>'';
        newtax += '    </select>'
        newtax += ' </td>'
        newtax += '	<td valign="top"><input type="text" value="" name="description" id="description" /></td>'
        newtax += '	<td valign="top"><input type="text" value="" name="rate" id="rate" /></td>'
        newtax += '	<td valign="top"><input type="text" value="" name="priority" id="priority" /></td>'
        newtax += '	<td valign="top"><input type="submit" value="Save" /></td>'
        newtax += '</tr>'

        $('#body').prepend(newtax);

    }
    function checkTaxForm(){
        
        var strErr = '';
        //if(user.val() =='') strErr += ' - State\n';
        if($('#description').val() =='') strErr += ' - description\n';
        if($('#rate').val() =='') strErr += ' - rate\n';
        if($('#priority').val() =='') strErr += ' - priority\n';
        
        if(strErr != ''){
            alert('Please correct the following:\n' + strErr);
            return false;
        }
        else
            return true;
    }  
    function del(obj, id_x){        
        $.post("ajax.php", { action: "18", id: id_x },
        function(data) {
            if(data==1)$( obj ).remove();
        });  
    }
</script>
<?php
include_once("_footer.php");
?>
