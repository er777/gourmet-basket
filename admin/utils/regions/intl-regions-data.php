<table border="0" cellpadding="4" cellspacing="2">
            <tr>
                <td width="690"><img src="images/titles/title_<?php echo $post_type; ?>_region.jpg" /></td>
            </tr>
            <tr>
                <td valign="top">
                    Region Name:<br>
                    <input type="text" name="tradition_region" id="tradition_region" size="32" maxlength="32" value="<?php echo $tradition_region; ?>" />
                    </td>
                    </tr>
                    <tr>
                  <td valign="top"> Region Countries:<br>
               <textarea name="tradition_region_summary" id="tradition_region_Summary" style="width:600px;height:100px;" /><?php echo $tradition_region_summary; ?></textarea>
            </td> 
            </tr>
                    <tr> 
                    <td> 
                    
                    Category Article:<br>
                    <div>
                        <textarea name="tradition_region_article" id="tradition_region_Article" style="width:600px;height:500px;" /> <?=$tradition_region_article; ?> </textarea>
                    </div>
                    <script src='ckeditor/ckeditor.js' type="text/javascript"></script>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'tradition_region_Article' );
						//CKEDITOR.replace( 'tradition_region_Summary' );
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
                <a href="subcategories.php?cid=<?php echo $cid; ?>&tradition_region=<?php echo $tradition_region; ?>">
                <?php
                    }
                    ?>
                </td>
            </tr>
        </table>