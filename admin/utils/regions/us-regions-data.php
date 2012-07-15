<table border="0" cellpadding="4" cellspacing="2">
            <tr>
                <td width="690"><img src="images/titles/title_<?php echo $post_type; ?>_region.jpg" /></td>
            </tr>
            <tr>
                <td valign="top">
                    Region Name:<br>
                    <input type="text" name="us_category" id="us_category" size="32" maxlength="32" value="<?php echo $us_category; ?>" />
                    </td>
                    </tr>
                    <tr>
                  <td valign="top"> US Regions:<br>
               <textarea name="us_category_summary" id="us_category_Summary" style="width:600px;height:100px;" /><?php echo $us_category_summary; ?></textarea>
            </td> 
            </tr>
                    <tr> 
                    <td> 
                    
                    Category Article:<br>
                    <div>
                        <textarea name="us_category_article" id="us_category_Article" style="width:600px;height:500px;" /> <?=$us_category_article; ?> </textarea>
                    </div>
                    <script src='ckeditor/ckeditor.js' type="text/javascript"></script>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'us_category_Article' );
						//CKEDITOR.replace( 'us_category_Summary' );
                    </script>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="image" src="images/btn_<?php echo $post_type; ?>.jpg" onclick="return SaveRegion()" />&nbsp;
                    <?php
                    if($post_type=="update") {
                        ?>
                        <a href="region_editor.php?cmd=delete&cid=<?php echo $cid; ?>"><img src="images/btn_delete.jpg" border="0" /></a>&nbsp;
                <a href="subcategories.php?cid=<?php echo $cid; ?>&us_category=<?php echo $us_category; ?>">
                <?php
                    }
                    ?>
                </td>
            </tr>
        </table>