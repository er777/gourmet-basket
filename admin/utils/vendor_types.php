<?php
session_start();

include_once '../_init.php';
 ?>

<div style="background:white;">
<form method="post" action="../register" name="frmAdd">
<input type="hidden" name="post_type" value="<?php echo $post_type; ?>" />
<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
<table border="0" cellpadding="4" cellspacing="2">
    <tr>
        <td><img src="images/titles/title_<?php echo $post_type; ?>_category.jpg" /></td>
    </tr>
    <tr>
        <td>
            Category Name:<br>
            <input type="text" name="category_name" id="category_name" size="32" maxlength="32" value="<?php echo $category_name; ?>" /><br>
        </td> 
    </tr>    
    <tr>
        <td>
             <input type="image" src="images/btn_<?php echo $post_type; ?>.jpg" onclick="return SaveCategory()" />&nbsp;
            <?php
            if($post_type=="update") {
                ?>
                <a href="utils/category_editor.php?cmd=delete&cid=<?php echo $cid; ?>"><img src="images/btn_delete.jpg" border="0" /></a>&nbsp;
                <a href="subcategories.php?cid=<?php echo $cid; ?>&category_name=<?php echo $category_name; ?>">
                <?php
            }
            ?>
        </td>
    </tr>
</table>
</form>
</div>

