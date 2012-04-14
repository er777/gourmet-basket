<?php
$page = "sub-subcategories";
include_once("_header.php");
?>
<div align="center">
<table border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <form method="post" action="sub-subcategories.php" name="frmCategories">
    <input type="hidden" value="row_none" id="prevrowid"> 
    <tr>
        <td colspan="2">
            <a href="admin.php">Home</a> > 
            <a href="categories.php">Categories</a> > 
            <a href="subcategories.php">Sub-categories</a> >
            Sub-subcategories
            <br /><br />
        </td>
    </tr>                
    <tr>
        <td><img src="images/titles/title_subsubcategories.jpg" /><br></td>
    </tr>
    <tr>   
        <td>
        <br>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td width="454">List of current Sub Subcategories under:</td>
                <td align="right" width="204"><a href="utils/sub_subcategory_editor.php" style="text-decoration:none;color:Gray;" title="Gourmet Basket - Sub Category Editor" onClick="Modalbox.show(this.href, {title: this.title, width:450, height: 260, aspnet: false}); return false;"><img src="images/add.png" width="16"/> Add Sub Subcategory</a></a></td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td>
                    <table width="650" border="0" cellpadding="2" cellspacing="2" style="width:670px;">
                        <tr style="background:lightblue;">
                            <th width="40%">Sub Category</th>
                            <th width="60%">Sub Subcategory Name</th> 
                        </tr>
                    <?php                                
                        $query = "SELECT * FROM subcategories s INNER JOIN sub_subcategories ss ON s.subcategory_id = ss.subcategory_id ORDER BY subcategory";  
                        $pages = pagin_top(10,$query);
                        $query = $query . ' ' . $pages->limit;
                        DB::query($query);
                        $b = 0;
                        while ($row = DB::fetch_row()) {
                            $bgcolor    = ($b%2==0)?"#F0F0F0":"#E0E0E0"; 
                            $bgcolor_op = ($b%2==0)?"#E0E0E0":"#F0F0F0"; 
                    ?>
                        <tr
                        bgcolor="<?php echo $bgcolor; ?>"                        
                        id="row_<?php echo $row["sub_subcat_id"]; ?>" 
                        onmouseover="switchClass('row_<?php echo $row["sub_subcat_id"]; ?>', '<?php echo $bgcolor_op; ?>');" 
                        onclick="Modalbox.show('utils/sub_subcategory_editor.php?cmd=edit&sub_subcat_id=<?php echo $row["sub_subcat_id"]; ?>', {title: 'Gourmet Basket - Category Editor', width:450, height: 240, aspnet: false}); return false;"
                        >
                             <td style="width:100px;"><?php echo $row["subcategory"]; ?></td>
                             <td style="width:550px;"><?php echo $row["sub_subcategory"]; ?></td>
                        </tr>
                    <?php
                        $b++;
                    } ?>
                    </table>
                    <?php  pagin_bottom($pages) ?>  
                </td>
            </tr>
        </table>
        </td>
    </tr>
    </form>
</table>
<?php
DB::close(); 
include_once("_footer.php");
?>