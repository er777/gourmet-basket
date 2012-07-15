<table border="0" cellpadding="4" cellspacing="2">
            <tr>
                <td width="690"><img src="images/titles/title_<?php echo $post_type; ?>_category.jpg" /></td>
            </tr>
            <tr>
                <td valign="top">
                    Category Name:<br>
                    <input type="text" name="category_name" id="category_name" size="32" maxlength="32" value="<?php echo $category_name; ?>" />
                    </td>
                    </tr>
                    <tr>
                  <td valign="top"> Category Summary:<br>
               <textarea name="category_summary" id="categories_category_Summary" style="width:600px;height:100px;" /><?php echo $category_summary; ?></textarea>
            </td> 
            </tr>
                    <tr> 
                    <td> 
                    
                    Category Article:<br>
                    <div>
                        <textarea name="category_article" id="categories_categoryArticle" style="width:600px;height:500px;" /> <?=$category_article; ?> </textarea>
                    </div>
                    <script src='ckeditor/ckeditor.js' type="text/javascript"></script>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'categories_categoryArticle' );
						CKEDITOR.replace( 'categories_category_Summary' );
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