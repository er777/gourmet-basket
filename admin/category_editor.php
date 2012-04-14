<?php
session_start();
$page = "categories";
include_once("_header.php");
$msg = "";
$post_type = "add";
$cid = "";
$category_name = "";
$category_article = "";
if(isset($_POST["post_type"])) {
    switch($_POST["post_type"]){
        case "add":
            if($_POST["category_name"] !=""){
                DB::connect();
                $qry = "INSERT INTO categories
                    SET category_name = '" . $_POST["category_name"] . "' , category_article = '" . $_POST["category_article"] . "' ";
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
					SET category_name = '" . $_POST["category_name"] . "' , category_article = '" . $_POST["category_article"] . "'
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
        <table border="0" cellpadding="4" cellspacing="2">
            <tr>
                <td width="690"><img src="images/titles/title_<?php echo $post_type; ?>_category.jpg" /></td>
            </tr>
            <tr>
                <td>
                    Category Name:<br>
                    <input type="text" name="category_name" id="category_name" size="32" maxlength="32" value="<?php echo $category_name; ?>" /><br>
                    Category Article:<br>
                    <div>
                        <textarea name="category_article" id="categories_categoryArticle" style="width:600px;height:500px;" /> <?=$category_article; ?> </textarea>
                    </div>
                    <script src='ckeditor/ckeditor.js' type="text/javascript"></script>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'categories_categoryArticle' );
                    </script>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="image" src="images/btn_<?php echo $post_type; ?>.jpg" onclick="return SaveCategory()" />&nbsp;
                    <?php
                    if($post_type=="update") {
                        ?>
                        <a href="category_editor.php?cmd=delete&cid=<?php echo $cid; ?>"><img src="images/btn_delete.jpg" border="0" /></a>&nbsp;
                <a href="subcategories.php?cid=<?php echo $cid; ?>&category_name=<?php echo $category_name; ?>">
                <?php
                    }
                    ?>
                </td>
            </tr>
        </table>
    </form>


</div>

