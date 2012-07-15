<?php
?>
<div style="clear:both;"></div>
           <table style="width: 630px;padding:20px;">
                <tr>
                
                  <td><img src="/admin/images/<?php echo ((isset($category_pics['image_1']) ? $category_pics['image_1'] : '') != "")?"product/".(isset($category_pics['image_1']) ? $category_pics['image_1'] : ''):"logo.png";?>" alt="UPLOAD IMAGE" width="100"/> <br />
                  	<input type="hidden" value="<?php echo $category_pics['image_1']; ?>" name="image_1" id="image_1" />
                    <input type="file" name="image_1" id="image_1" style="float: left; width: 170px;"  /></td
                   
                  <td><img src="/admin/images/<?php echo ((isset($category_pics['image_2']) ? $category_pics['image_2'] : '') != "")?"product/".(isset($category_pics['image_2']) ? $category_pics['image_2'] : ''):"logo.png";?>" alt="UPLOAD IMAGE" width="100"/> <br />
                  	<input type="hidden" value="<?php echo $category_pics['image_2']; ?>" name="image_2" id="image_2" />
                    <input type="file" name="image_2" id="image_2" style="float: left; width: 170px;"  /></td>
               
                  <td><img src="/admin/images/<?php echo ((isset($category_pics['image_3']) ? $category_pics['image_3'] : '') != "")?"product/".(isset($category_pics['image_3']) ? $category_pics['image_3'] : ''):"logo.png";?>" alt="UPLOAD IMAGE" width="100"/> <br />
                    <input type="hidden" value="<?php echo $category_pics['image_3']; ?>" name="image_3" id="image_3" />
                    <input type="file" name="image_3" id="image_3" style="float: left; width: 170px;"  /></td>
                    
                </tr>
                
                <tr>
                    
                  <td><img src="/admin/images/<?php echo ((isset($category_pics['image_4']) ? $category_pics['image_4'] : '') != "")?"product/".(isset($category_pics['image_4']) ? $category_pics['image_4'] : ''):"logo.png";?>" alt="UPLOAD IMAGE" width="100"/> <br />
                  	<input type="hidden" value="<?php echo $category_pics['image_4']; ?>" name="image_4" id="image_4" />
                    <input type="file" name="image_4" id="image_4" style="float: left; width: 170px;"  /></td>
                    
                  <td><img src="/admin/images/<?php echo ((isset($category_pics['image_5']) ? $category_pics['image_5'] : '') != "")?"product/".(isset($category_pics['image_5']) ? $category_pics['image_5'] : ''):"logo.png";?>" alt="UPLOAD IMAGE" width="100"/> <br />
                  	<input type="hidden" value="<?php echo $category_pics['image_5']; ?>" name="image_5" id="image_5" />
                    <input type="file" name="image_5" id="image5" style="float: left; width: 170px;"  /></td>
                    
                    <td><img src="/admin/images/<?php echo ((isset($category_pics['image_6']) ? $category_pics['image_6'] : '') != "")?"product/".(isset($category_pics['image_6']) ? $category_pics['image_6'] : ''):"logo.png";?>" alt="UPLOAD IMAGE" width="100"/> <br />
                  	<input type="hidden" value="<?php echo $category_pics['image_6']; ?>" name="image_6" id="image_6" />
                    <input type="file" name="image_6" id="image6" style="float: left; width: 170px;"  /></td>
                </tr>
              </table>