<?php
DB::connect();
    $query_data = "SELECT * FROM home_page WHERE id = 1";
    DB::query($query_data);
    while($row = DB::fetch_row())
    {
        ?>
            <div id="homeform">
            <form action="home_editor.php" method="POST" onsubmit="">
            <input type="hidden" value="x" name="body" id="body" />
            <table style="margin-top: 43px;">
                <tr>
                    <td>Body Settings</td>
                </tr>
                <tr>
                    <td>Headline 1zxccv</td>
                    <td><input type="text" id="head1" name="head1" value="<?php echo $row['headline_1'] ?>"/></td>
                    <td>Link</td>
                    <td><input type="text" id="head_link1" name="head_link1" value="<?php echo $row['headline_link1'] ?>"/></td>
                </tr>
                <tr>
                    <td>Headline 2</td>
                    <td><input type="text" name="head2" value="<?php echo $row['headline_2'] ?>"/></td>
                    <td>Link</td>
                    <td><input type="text" name="head_link2" value="<?php echo $row['headline_link3'] ?>"/></td>
                </tr>
                <tr>
                    <td>Headline 3</td>
                    <td><input type="text" name="head3" value="<?php echo $row['headline_3'] ?>"/></td>
                    <td>Link</td>
                    <td><input type="text" name="head_link3" value="<?php echo $row['headline_link3'] ?>"/></td>
                </tr>
                <tr>
                    <td>Headline 4</td>
                    <td><input type="text" name="head4" value="<?php echo $row['headline_4'] ?>"/></td>
                    <td>Link</td>
                    <td><input type="text" name="head_link4" value="<?php echo $row['headline_link4'] ?>"/></td>
                </tr>
                <tr>
                    <td valign="top">Back Image</td>
                    <td colspan="3">                            
                        <input type="hidden" name="logobody" id="logobody" />
                        <input type="file" name="picturebody" id="picturebody" /><br />
                        <img src="../app/webroot/img/supersize/<?php echo $row['full_page_pic']?>" width="125" height="63" alt="logo shop" name="imglogobody" id="imglogobody" /> 
                    </td>
                </tr>
                <tr>
                    <td>Page text</td>
                    <td colspan="3"><input style="width: 341px;" type="text" name="body_pagetext" value="<?php echo $row['full_page_text']?>"/></td>
                </tr>
                <tr>
                    <td>Page Link</td>
                    <td colspan="3"><input style="width: 341px;" type="text" name="body_pagelink" value="<?php echo $row['full_page_pic_link']?>"/></td>
                </tr>
                <tr>
                    <td valign="top">Body text</td>
                    <td colspan="3">
                        <textarea name="body" style="width: 340px;height: 99px;"><?php echo $row['body_text_content']?></textarea>
                    </td>                        
                </tr>
                <tr>
                    <td valign="top">Body text link</td>
                    <td colspan="3"><input type="text" name="body_link" value="<?php echo $row['body_text_link']?>"/></td>                        
                </tr>
                <tr>
                    <td valign="top">Text Register</td>
                    <td colspan="3"><input type="text" name="text_register" value="<?php echo $row['body_text_register']?>"/></td>                        
                </tr>
                <tr>
                    <td valign="top">Text Become</td>
                    <td colspan="3"><input type="text" name="text_become" value="<?php echo $row['body_text_become']?>"/></td>                        
                </tr>
                <tr>
                    <td valign="top">Text Thanks</td>
                    <td colspan="3"><input type="text" name="text_thanks" value="<?php echo $row['body_text_thanks']?>"/></td>                        
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="image" onclick="" src="images/btn_update.jpg">
                    </td>
                </tr>
            </table>
            </form>
            </div>
        <?php
    }
DB::close();
?>     