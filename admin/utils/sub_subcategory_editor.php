<?php
session_start();

include_once '../_init.php';

$msg = "";
$post_type = "add";
$sub_subcat_id = "";
$sub_subcategory_name = "";
if(isset($_POST["post_type"])) {    
    switch($_POST["post_type"]){
        case "add":
            if($_POST["subsubcategory_name"]!=""){
                DB::connect();
                $qry = "INSERT INTO sub_subcategories
                    SET subcategory_id = '" . $_POST["subcategory"] . "',
                    sub_subcategory = '". $_POST["subsubcategory_name"] ."'";
                DB::execute($qry);
                DB::close(); 
                header("location: ../sub-subcategories.php");                
            }
            else {
                $msg = "<b style=\"color:red\">No categories added.</b>";
            }
            break;
        case "update":
            if($_POST["subsubcategory_name"]!=""){
                DB::connect();
                $qry = "UPDATE sub_subcategories
                    SET subcategory_id = '" . $_POST["subcategory"] . "',
                    sub_subcategory = '".$_POST["subsubcategory_name"]."'
                    WHERE sub_subcat_id = " . $_POST["sub_subcat_id"];
                DB::execute($qry);
                DB::close();
                header("location: ../sub-subcategories.php"); 
            }
            else {
                $msg = "<b style=\"color:red\">No categories updated.</b>";
            }
            break;
    }
}
if(isset($_GET["cmd"]) && $_GET["cmd"]=="edit") {
    $sub_subcat_id = $_GET["sub_subcat_id"];
    DB::connect(); 
    $qry = "SELECT * FROM sub_subcategories WHERE sub_subcat_id = " . $sub_subcat_id;
    DB::query($qry);
    while($row = DB::fetch_row()){
         $sub_subcategory_name = $row["sub_subcategory"];
         $subcategori = $row["subcategory_id"]; 
    }
    $post_type = "update";
    DB::close();
}
if(isset($_GET["cmd"]) && $_GET["cmd"]=="delete") {
    $sub_subcat_id = $_GET["sub_subcat_id"];
    DB::connect(); 
    $qry = "DELETE FROM sub_subcategories WHERE sub_subcat_id = " . $sub_subcat_id;
    DB::execute($qry);
    DB::close(); 
    header("location: ../sub-subcategories.php");
}
?>
<div style="background:white;">
<form method="post" action="utils/sub_subcategory_editor.php" name="frmAdd">
<input type="hidden" name="post_type" value="<?php echo $post_type; ?>" />
<input type="hidden" name="sub_subcat_id" value="<?php echo $sub_subcat_id; ?>" />
<table border="0" cellpadding="4" cellspacing="2">
    <tr>
        <td><img src="images/titles/title_<?php echo $post_type; ?>_subcategory.jpg" /></td>
    </tr>
    <tr>
        <td>
            Sub Sub-Category Name:<br>
            <input type="text" name="subsubcategory_name" id="subsubcategory_name" size="40" maxlength="40" value="<?php echo $sub_subcategory_name;?>"/><br>
            <!--value="<?php //echo $subcategory_name; ?>" TOOK OUT - ER-->
        </td> 
    </tr> 
    <tr>    
        <td>
            Sub-Category:<br>
            <select name="subcategory" id="subcategory" >
                <option value="">Select</option>
                <?php
                DB::connect();
                $qry = "SELECT * FROM subcategories ORDER BY subcategory";
                DB::query($qry);
                while($row=DB::fetch_row()){
                    $selected = "";
                    if($row["subcategory_id"] == $subcategori) $selected = "selected";
                    ?>
                    <option value="<?php echo $row["subcategory_id"]; ?>" <?php echo $selected;?>><?php echo $row["subcategory"]; ?></option>
                    <?php
                }
                DB::close();
                ?>
            </select>
        </td>
    </tr>       
    <tr>
        <td>
             <input type="image" src="images/btn_<?php echo $post_type; ?>.jpg" onclick="return SaveCategory()" />&nbsp;
            <?php
            if($post_type=="update") {
                ?>
                <a href="utils/sub_subcategory_editor.php?cmd=delete&sub_subcat_id=<?php echo $sub_subcat_id; ?>"><img src="images/btn_delete.jpg" border="0" /></a>&nbsp;
                <a href="sub-subcategories.php?sub_subcat_id=<?php echo $sub_subcat_id; ?>&category_name=<?php echo $category_name; ?>">
                <?php
            }
            ?>
        </td>
    </tr>
</table>
</form>
</div>

