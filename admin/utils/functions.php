<?php

function turn_on($tab) {
    $tabs = Array("home", "admins", "users", "categories", "subcategories", "sub-subcategories");
    $tabs_status = Array("off", "off", "off", "off", "off", "off");
    for ($i = 0; $i < sizeof($tabs); $i++) {
        if ($tab == $tabs[$i])
            $tabs_status[$i] = "on";
    }
    return $tabs_status;
}

function uploadFiles($file, $folder = null) {
    global $aImages;
    $filename = "";
    $dir = dirname(__file__) . "/../images/product/";
    if ($folder) {
        $dir = $folder;
    }
    if ($_FILES[$file]["name"] != "") {
        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
        $uploadsDirectory = $dir;
        $uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'utils/iuproduct.php';
        $uploadSuccess = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'utils/iuproduct.php';

        $fieldname = $file;

        $errors = array(
            1 => 'php.ini max file size exceeded',
            2 => 'html form max file size exceeded',
            3 => 'file upload was only partial',
            4 => 'no file was attached'
        );

        ($_FILES[$fieldname]['error'] == 0) or die($errors[$_FILES[$fieldname]['error']]);

        @is_uploaded_file($_FILES[$fieldname]['tmp_name']) or die('not an HTTP upload');

        @getimagesize($_FILES[$fieldname]['tmp_name']) or die('only image uploads are allowed');

        $now = time();
        while (file_exists($uploadFilename = $uploadsDirectory . $now . "_" . $_FILES[$fieldname]['name'])) {
            $now++;
        }
        $filename = $now . "_" . $_FILES[$fieldname]['name'];
        @move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename) or die($uploadFilename . 'receiving directory insufficient permission');
    }

    return $filename;
}

function uploadFilesHome($file, $folder = null) {
    global $aImages;

    $filename = "";
    $dir = dirname(__file__) . "/../images/home/";
    if ($folder) {
        $dir = $folder;
    }
    if ($_FILES[$file]["name"] != "") {
        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
        $uploadsDirectory = $dir;
        $uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'home_editor.php';
        $uploadSuccess = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'home_editor.php';

        $fieldname = $file;

        $errors = array(
            1 => 'php.ini max file size exceeded',
            2 => 'html form max file size exceeded',
            3 => 'file upload was only partial',
            4 => 'no file was attached'
        );

        ($_FILES[$fieldname]['error'] == 0) or die($errors[$_FILES[$fieldname]['error']]);

        @is_uploaded_file($_FILES[$fieldname]['tmp_name']) or die('not an HTTP upload');

        @getimagesize($_FILES[$fieldname]['tmp_name']) or die('only image uploads are allowed');

        $now = time();
        while (file_exists($uploadFilename = $uploadsDirectory . $now . "_" . $_FILES[$fieldname]['name'])) {
            $now++;
        }
        $filename = $now . "_" . $_FILES[$fieldname]['name'];
        @move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename) or die($uploadFilename . 'receiving directory insufficient permission');
    }

    return $filename;
}

function randomPassword($l = 8) {
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $cad = "";

    for ($i = 1; $i <= $l; $i++) {
        $cad .= substr($str, rand(0, 62), 1);
    }

    return $cad;
}

function getNumRequest($sql) {
    if (!$sql) {
        return 0;
    }
    $total_dares = 0;
    $cont = mysql_query($sql);
    $total_dares = mysql_num_rows($cont);

    return $total_dares;
}

function pagin_top($num, $query) {
    $pages = new Paginator;
    $pages->default_ipp = $num;  //items per page
    $pages->items_total = getNumRequest($query);
    $pages->mid_range = ($pages->items_total > 80 ? 7 : 0);
    $pages->paginate();
    return $pages;
}

function pagin_bottom($pages) {
    $First = $pages->getFirstItemsPerPage();
    $Last = $pages->getLastItemsPerPage();
    $display = $pages->display_pages();
    if ($pages->items_total > 0) {
        echo <<<JFV
<div>            
<!-- pagination -->                            
    <table style="color: gray;font-weight: bold;font-family: arial, sans-serif;" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td valign="middle" width="110">                         
            $First to $Last of $pages->items_total            
            </td>
            <td align="right">
            <div class="pagination"> 
                <ul style="color:gray;">
                $display
                </ul>
            </div>
            </td>
        </tr>
    </table> 
</div>
JFV;
    }
}

function getFieldAndData($table, $pk, $pkvalue) {
    $fielddata = array();
    $q = "select * from $table where $pk = '$pkvalue' limit 1";

    if ($pkvalue == 'new') {
        $fielddata = DB::get_fields($table, $pk, false);
    } else {
        DB::query($q);
        $fielddata = DB::fetch_assoc();
    }
    return $fielddata;
}

function db_options($sql, $selected = NULL, $r = 0) {
    global $g;
    global $l;
    global $DB_conn;
    global $DB_res;
    global $DB_debug;
    global $DB_timer;
    global $DB_sqls;
    $ret = "";
    DB::query($sql, $r);
    while ($row = DB::fetch_row($r)) {
        $ret .= "'<option value=\"" . $row[0] . "\"" . ($row[0] == $selected ? " selected=\"selected\"" : "" ) . ">" . $row[1] . "</option>' + \n";
    }
    DB::free_result($r);

    return $ret;
}

function deleteData($table, $pk, $pkvalue, $redirect = '') {

    $qry = "DELETE FROM $table WHERE $pk = '$pkvalue'";
    DB::execute($qry);
    if ($redirect != '') {
        header("location: $redirect");
    }
}

function test($k, $title = "") {
    echo "<br><pre style='text-align:left;display:block'>$title>>>:::: \n\n";
    var_dump($k);
    echo "</pre><br>";
}

function checked($value, $compare) {
    $checked = "";
    if ($value == $compare)
        $checked = "checked";
    return $checked;
}

function send_email($email_to, $subject, $content, $data = false) {

    if (is_array($data)) {
        extract($data);
    }


    if (!preg_match('/\n/', $content) && is_file($content)) {
        ob_start();
        include($content);
        $email_content = ob_get_clean();
    } else {
        $email_content = $content;
    }

    $headers = "From: info@gourmet-basket.com\n";
    //if($BCC)$headers .= "BCC: $BCC\n";

    if (preg_match('/<(br|p|h1|h2|table)/', $email_content)) {
        $headers .= 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
    }

    $headers .= "\n";

    if (mail($email_to, $subject, $email_content, $headers)) {
        return true;
    } else {
        set_message("ERROR: Failed to send email with mail() command??? Weird..");
    }
    return false;
}

function getStates($sel = "") {

    $var1 = "";
    $var1 .= "SELECT zone_id, ";
    $var1 .= "       `name` ";
    $var1 .= "FROM   zone ";
    $var1 .= "WHERE  country_id = '223' ";
    $var1 .= "ORDER  BY `name` ASC ";

    return DB::db_options($var1, $sel);
}

//==============================================================================
// FUNCTIONS
//==============================================================================
function BuildTable($tbl, $pos=1, $sortcol='', $sortdesc=0) {
    $pospage = 10;

    //the display properties for the odd and even rows
    $odd = array('style' => 'background-color: #F0F0F0;');
    $even = array('style' => 'background-color: #E0E0E0;');

    //the display properties for the overall table
    $table = array('cellpadding' => '3', 'cellspacing' => '2', 'class' => 'tabledata', 'style' => 'width:100%');

    //table column header formatting properties
    $headerattrib = array('style' => 'background-color: lightblue; cursor:pointer;');

    //get data and rowcount
    $possql = $pos - 1;
    $orderby = '';
    if ($sortcol)
        $orderby = " ORDER BY $sortcol " . ($sortdesc ? 'DESC' : '');

    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM $tbl $orderby LIMIT $possql,$pospage";

    $result = DB::array_assoc($sql);
    $poscnt = DB::result("SELECT FOUND_ROWS()");

    //STATES\\//
    DB::query("SELECT zone_id, name FROM zone WHERE country_id = '223' order by name");
    while ($row = DB::fetch_assoc())
        $states[$row['zone_id']] = $row['name'];




    $at = new DataGrid($result, "ajax.php", "js/");
    $at->JsClass = $tbl;
    $at->pos = $pos;
    $at->pospage = $pospage;
    $at->poscnt = $poscnt;
    $at->SetEvenRowAttribs($even);
    $at->SetOddRowAttribs($odd);
    $at->SetTableAttribs($table);
    $at->SetHeaderAttribs($headerattrib);

    $at->AddColumnHidden("id", "id");
    $at->AddColumnSelectkey("zone_id", "Geo Zone", false, $states);
    $at->AddColumnText("description", "Description", false);
    $at->AddColumnText("rate", "Tax Rate", false);
    $at->AddColumnText("priority", "Priority", false);
    $at->AddColumnDelete('','',false);
    return $at;
}

?>
