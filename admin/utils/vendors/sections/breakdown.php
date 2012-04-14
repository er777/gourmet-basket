<?php
?>

<style>
th {
	text-align: left;	
}

</style>

<div class="admin-images-left">
<h3>Breakdown Categories & Images</h3>
<table>

  
    <tr>
        <td>
            <img src="<?php echo ($v['bd_image1'] != "")?"/img/breakdown/".$v['bd_image1']:"images/logo.png";?>?>" alt="bd-image 1 shop" class="bd-imgshop" name="bd-imgimage1" id="bd-imgimage1" width="100" height="100" />
        </td>  
        <th valign="top" style="text-align: left;"><br />
         	<div><input type="text"  class="breakdown" name="bd_category1" value="<?php echo $v['bd_category1'] ?>" size="30"/></div>    
            <label>Breakdown Image 1 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['bd_image1']; ?>" name="bd_image1" id="bd-image1" />
            <input type="file" name="bkdnimage1" id="bkdnimage1" />
        </th>                                          
    </tr>
    
    <tr>
        <td>
            <img src="<?php echo ($v['bd_image2'] != "")?"/img/breakdown/".$v['bd_image2']:"images/logo.png";?>" alt="bd-image 2 shop" class="bd-imgshop" name="bd-imgimage2" id="bd-imgimage2" width="100" height="100" />
        </td>  
        <th valign="top" style="text-align: left;"><br />
         	<div><input type="text"  class="breakdown" name="bd_category2" value="<?php echo $v['bd_category2'] ?>" size="30"/></div>    
            <label>Breakdown Image 2 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['bd_image2']; ?>" name="bd_image2" id="bd-image2" />
            <input type="file" name="bkdnimage2" id="bkdnimage2" />
        </th>                  
    </tr>
    
    <tr>
        <td>
            <img src="<?php echo ($v['bd_image3'] != "")?"/img/breakdown/".$v['bd_image3']:"images/logo.png";?>?>" alt="bd-image 3 shop" class="bd-imgshop" name="bd-imgimage3" id="bd-imgimage3" width="100" height="100" />
        </td>  
        <th valign="top" style="text-align: left;"><br />
         	<div><input type="text"  class="breakdown" name="bd_category3" value="<?php echo $v['bd_category3'] ?>" size="30"/></div>    
            <label>Breakdown Image 3 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['bd_image3']; ?>" name="bd_image3" id="bd-image3" />
            <input type="file" name="bkdnimage3" id="bkdnimage3" />
        </th>                                          
    </tr>
    
</table>
</div>

<div class="admin-images-right">
<table>

    
    
    
    
    <tr>
        <td>
            <img src="<?php echo ($v['bd_image4'] != "")?"/img/breakdown/".$v['bd_image4']:"images/logo.png";?>" alt="bd-image 4 shop" class="bd-imgshop" name="bd-imgimage4" id="bd-imgimage4" width="100" height="100" />
        </td>  
        <th valign="top" style="text-align: left;"><br />
         	<div><input type="text"  class="breakdown" name="bd_category4" value="<?php echo $v['bd_category4'] ?>" size="30"/></div>    
            <label>Breakdown Image 4 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['bd_image4']; ?>" name="bd_image4" id="bd-image4" />
            <input type="file" name="bkdnimage4" id="bkdnimage4" />
        </th>                  
    </tr>
    
    
     <tr>
        <td>
            <img src="<?php echo ($v['bd_image5'] != "")?"/img/breakdown/".$v['bd_image5']:"images/logo.png";?>" alt="bd-image 5 shop" class="bd-imgshop" name="bd-imgimage5" id="bd-imgimage5" width="100" height="100" />
        </td>  
        <th valign="top" style="text-align: left;"><br />
         	<div><input type="text"  class="breakdown" name="bd_category5" value="<?php echo $v['bd_category5'] ?>" size="30"/></div>    
            <label>Breakdown Image 5 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['bd_image5']; ?>" name="bd_image" id="bd-image5" />
            <input type="file" name="bkdnimage5" id="bkdnimage5" />
        </th>
  	</tr>      
         <td>
            <img src="<?php echo ($v['bd_image6'] != "")?"/img/breakdown/".$v['bd_image6']:"images/logo.png";?>" alt="bd-image 6 shop" class="bd-imgshop" name="bd-imgimage6" id="bd-imgimage6" width="100" height="100" />
        </td>  
        <th valign="top" style="text-align: left;"><br />
         	<div><input type="text"  class="breakdown" name="bd_category6" value="<?php echo $v['bd_category6'] ?>" size="30"/></div>    
            <label>Breakdown Image 6 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['bd_image6']; ?>" name="bd_image6" id="bd-image6" />
            <input type="file" name="bkdnimage6" id="bkdnimage6" />
        </th>                        
    </tr>
</table>
</div>