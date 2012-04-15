<?php
session_start();

include_once '../_init.php';

$msg = "";
$post_type = "add";
$subcategory_id = "";
$subcategory_name = "";
if(isset($_POST["post_type"])) {    
    switch($_POST["post_type"]){
        case "add":
            if($_POST["subcategory_name"]!=""){
                DB::connect();
                $qry = "INSERT INTO subcategories
                    SET category_id = '" . $_POST["category"] . "',
                    subcategory = '". $_POST["subcategory_name"] ."'";
                DB::execute($qry);
                DB::close(); 
                header("location: ../subcategories.php");                
            }
            else {
                $msg = "<b style=\"color:red\">No categories added.</b>";
            }
            break;
        case "update":
            if($_POST["subcategory_name"]!=""){
                DB::connect();
                $qry = "UPDATE subcategories
                    SET category_id = '" . $_POST["category"] . "',
                    subcategory = '".$_POST["subcategory_name"]."'
                    WHERE subcategory_id = " . $_POST["subcategory_id"];
                DB::execute($qry);
                DB::close();
                header("location: ../subcategories.php"); 
            }
            else {
                $msg = "<b style=\"color:red\">No categories updated.</b>";
            }
            break;
    }
}
if(isset($_GET["cmd"]) && $_GET["cmd"]=="edit") {
    $subcategory_id = $_GET["subcategory_id"];
    DB::connect(); 
    $qry = "SELECT * FROM subcategories WHERE subcategory_id = " . $subcategory_id;
    DB::query($qry);
    while($row = DB::fetch_row()){
         $subcategory_name = $row["subcategory"];
         $categori = $row["category_id"]; 
    }
    $post_type = "update";
    DB::close();
}
if(isset($_GET["cmd"]) && $_GET["cmd"]=="delete") {
    $subcategory_id = $_GET["subcategory_id"];
    DB::connect(); 
    $qry = "DELETE FROM subcategories WHERE subcategory_id = " . $subcategory_id;
    DB::execute($qry);
    DB::close(); 
    header("location: ../subcategories.php");
}
?>
<div style="background:white;">
<form method="post" action="utils/subcategory_editor.php" name="frmAdd">
<input type="hidden" name="post_type" value="<?php echo $post_type; ?>" />
<input type="hidden" name="subcategory_id" value="<?php echo $subcategory_id; ?>" />
<table border="0" cellpadding="4" cellspacing="2">
    <tr>
        <td><img src="images/titles/title_<?php echo $post_type; ?>_subcategory.jpg" /></td>
    </tr>
    <tr>
        <td>
            Sub-Category Name:<br>
            <input type="text" name="subcategory_name" id="subcategory_name" size="40" maxlength="40" value="<?php echo $subcategory_name;?>"/><br>
            <!--value="<?php //echo $subcategory_name; ?>" TOOK OUT - ER-->
        </td> 
    </tr> 
    <tr>    
        <td>
            Category:<br>
            <select name="category" id="category" >
                <option value="">Select</option>
                <?php
                DB::connect();
                $qry = "SELECT * FROM categories";
                DB::query($qry);
                while($row=DB::fetch_row()){
                    $selected = "";
                    if($row["category_id"] == $categori) $selected = "selected";
                    ?>
                    <option value="<?php echo $row["category_id"]; ?>" <?php echo $selected;?>><?php echo $row["category_name"]; ?></option>
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
                <a href="utils/subcategory_editor.php?cmd=delete&subcategory_id=<?php echo $subcategory_id; ?>"><img src="images/btn_delete.jpg" border="0" /></a>&nbsp;
                <a href="subcategories.php?subcategory_id=<?php echo $subcategory_id; ?>&category_name=<?php echo $category_name; ?>">
                <?php
            }
            ?>
        </td>
    </tr>
</table>
</form>
</div>

