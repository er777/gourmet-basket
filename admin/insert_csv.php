<?php
$page = "insertcsv";
include_once("_header.php");

$csv = new Quick_CSV_import();
$msg = "";
if (isset($_POST["Go"]) && "" != $_POST["Go"]) { //form was submitted

    
    
    $array_data = array();
    
    //$arr_encodings = $csv->get_encodings(); //take possible encodings list
    //$arr_encodings["default"] = "[default database encoding]"; //set a default (when the default database encoding should be used)
    
    //if (!isset($_POST["encoding"]))
    //$_POST["encoding"] = "default"; //set default encoding for the first page show (no POST vars)

    
    move_uploaded_file($_FILES['file_source']['tmp_name'], 'temp/' . $_FILES['file_source']['name']);
    
    $csv->file_name = 'temp/' . $_FILES['file_source']['name'];


    //optional parameters
    $csv->table_name = $_POST["table_name"];
    $csv->field_separate_char = $_POST["field_separate_char"];
    $csv->field_enclose_char = $_POST["field_enclose_char"];
    //$csv->field_escape_char = $_POST["field_escape_char"];
    //$csv->encoding = $_POST["encoding"];

    $rows_entered = 0;

    $rows_entered = $csv->csv_to_array($csv->file_name);
    
    //unlink($csv->file_name);
        
    $msg = $rows_entered . ' entered rows into our database<br><br>';
}

?>
<div style="width:650px;margin:15px auto;color: green;">
    <?php if ($msg) {
        echo $msg;
    } ?>
</div>  
<h2 align="center">Quick CSV import</h2>
<form method="post" enctype="multipart/form-data">
    <table border="0" align="center">
        <tr>
            <td>Source CSV file to import:</td>
            <td rowspan="30" width="10px">&nbsp;</td>
            <td><input type="file" name="file_source" id="file_source" class="edt" value="<?= $csv->file_name ?>"></td>
        </tr>
        <tr>
            <td>Table:</td>
            <td>
                <select name="table_name" id="table_name">
                    <option value="products">Products</option>
                    <option value="nutrition">Nutrition</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Separate char:</td>
            <td><input type="text" name="field_separate_char" id="field_separate_char" class="edt_30"  maxlength="3" value="<?= htmlspecialchars($csv->field_separate_char) ?>"/></td>
        </tr>
        <tr>
            <td>Enclose char:</td>
            <td><input type="text" name="field_enclose_char" id="field_enclose_char" class="edt_30"  maxlength="1" value="<?= htmlspecialchars($csv->field_enclose_char) ?>"/></td>
        </tr><!--
        <tr>
            <td>Use CSV header:</td>
            <td><input type="checkbox" name="use_csv_header" id="use_csv_header" <?= ($csv->use_csv_header ? "checked" : "") ?>/></td>
        </tr>
        <tr>
            <td>Escape char:</td>
            <td><input type="text" name="field_escape_char" id="field_escape_char" class="edt_30"  maxlength="1" value="<?= htmlspecialchars($csv->field_escape_char) ?>"/></td>
        </tr>
        <tr>
            <td>Encoding:</td>
            <td>
                <select name="encoding" id="encoding" class="edt">
                    <? /*
                    if (!empty($arr_encodings))
                        foreach ($arr_encodings as $charset => $description):
                            ?>
                            <option value="<?= $charset ?>"<?= ($charset == $csv->encoding ? "selected=\"selected\"" : "") ?>><?= $description ?></option>
                    <? endforeach; */ ?>
                </select>
            </td>
        </tr>-->
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type="Submit" name="Go" value="Import it" onclick=" var s = document.getElementById('file_source'); if(null != s && '' == s.value) {alert('Define file name'); s.focus(); return false;}"></td>
        </tr>
    </table>
</form>
<?= (!empty($csv->error) ? "<hr/>Errors: " . $csv->error : "") ?>

<style>
    .edt
    {
        background:#ffffff; 
        border:3px double #aaaaaa; 
        -moz-border-left-colors:  #aaaaaa #ffffff #aaaaaa; 
        -moz-border-right-colors: #aaaaaa #ffffff #aaaaaa; 
        -moz-border-top-colors:   #aaaaaa #ffffff #aaaaaa; 
        -moz-border-bottom-colors:#aaaaaa #ffffff #aaaaaa; 
        width: 350px;
    }
    .edt_30
    {
        background:#ffffff; 
        border:3px double #aaaaaa; 
        font-family: Courier;
        -moz-border-left-colors:  #aaaaaa #ffffff #aaaaaa; 
        -moz-border-right-colors: #aaaaaa #ffffff #aaaaaa; 
        -moz-border-top-colors:   #aaaaaa #ffffff #aaaaaa; 
        -moz-border-bottom-colors:#aaaaaa #ffffff #aaaaaa; 
        width: 30px;
    }
</style>
<?php
include_once("_footer.php");
?>

