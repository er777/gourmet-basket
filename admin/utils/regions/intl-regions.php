 <form method="post" action="regions.php" name="frmRegions">
<table border="0" cellpadding="0" cellspacing="0" style="width:800px; text-align:left">
    <tr>
        <td colspan="2">
            <a href="admin.php">Home</a> > 
            Categories > 
           <!-- <a href="subcategories.php">Sub-categories</a> >
            <a href="sub-subcategories.php">Sub-subcategories</a>-->
            <br /><br />
        </td>
    </tr>           
    <tr>
        <td><img src="images/titles/title_categories.jpg" /><br></td>
    </tr>
    <tr>   
        <td>
        <br>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">     
            <tr>
                <td>List of current regions available for product selection:</td>
                <!-- <td align="right" width="250"><a href="utils/category_editor.php" style="text-decoration:none;color:Gray;" title="Gourmet Basket - Category Editor" onclick="Modalbox.show(this.href, {title: this.title, width:450, height: 220}); return false;"><img src="images/add.png" width="16"/> Add Category</a></td> -->
                <td align="right" width="250"><a href="region_editor.php"><img src="images/add.png"></a>&nbsp;Add Region </td>

            </tr>
        </table>
        <input type="hidden" value="row_none" id="prevrowid"/>   
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <tr>
                <td>
                    <table class="tabledata" style="width:800px;" border="0" cellpadding="2" cellspacing="2">
                        <tr style="background:lightblue;">
                            <th width="20">ID</th>
                            <th width="140">Name</th>
                            <th width="200">Region Countries</th>
                            <th width="546">Region Article</th> 
                        </tr>
                    <?php
                        $query = "SELECT * FROM culinary_region ORDER BY tradition_id";  
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
                        id="row_<?php echo $row["region_id"]; ?>" 
                        onmouseover="switchClass('row_<?php echo $row["region_id"]; ?>', '<?php echo $bgcolor_op; ?>');"
                        onclick="location.href='region_editor.php?cmd=edit&cid=<?php echo $row["region_id"]; ?>'">

                        <!--    onclick="Modalbox.show('utils/category_editor.php?cmd=edit&cid=<?php echo $row["region_id"]; ?>', {title: 'Gourmet Basket - Category Editor', width:800, height: 600, aspnet: false}); return false;"> -->
                             <td valign="top"><?php echo $row["region_id"]; ?></td>
                             <td valign="top"><?php echo $row["tradition_region"]; ?></td>
                             <td valign="top"><div style="height:100px;overflow-y:scroll"><?php echo $row["tradition_region_summary"]; ?></div></td>
                             <td valign="top"><div style="height:100px;overflow-y:scroll"><?php echo $row["tradition_region_article"]; ?></div></td>
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
</table>
 </form>