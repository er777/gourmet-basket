<?php
?>

<style>
th {
	text-align: left;	
}

</style>

<div class="admin-images-left">

<table>
<th align="left">Main Images</th>
    <tr>
        <td>
            <img src="<?php echo ($v['logo'] != "")?"/img/logos/".$v['logo']:"images/logo.png";?>" width="206" height="63" alt="logo shop" class="imgshop" name="imglogo" id="imglogo" />
        </td> 
        <th valign="top" style="text-align: left;">
            <label>206 x 63</label><br />
            <input type="hidden" value="<?php echo $v['logo']; ?>" name="logo" id="logo" />
            <input type="file" name="filelogo" id="filelogo" />                            
        </th>                                           
    </tr>
    
    <tr>
        <td>
            <img src="<?php echo ($v['image1'] != "")?"/img/logos/".$v['image1']:"images/logo.png";?>?>" alt="image 1 shop" class="imgshop" name="imgimage1" id="imgimage1" width="206" height="145" />
        </td>  
        <th valign="top" style="text-align: left;">
            <label>Shop Image 1 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['image1']; ?>" name="image1" id="image1" />
            <input type="file" name="fileimage1" id="fileimage1" />
        </th>                                          
    </tr>
    
    <tr>
        <td>
            <img src="<?php echo ($v['image2'] != "")?"/img/logos/".$v['image2']:"images/logo.png";?>" alt="image 2 shop" class="imgshop" name="imgimage2" id="imgimage2"  width="206" height="145" />
        </td>  
        <th valign="top" style="text-align: left;">
            <label>Shop Image 2 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['image2']; ?>" name="image2" id="image2" />
            <input type="file" name="filelogo2" id="fileimage2" />
        </th>                  
    </tr>
    
</table>
</div>

<div class="admin-images-right">
<table>
<th align="left">Secondary Images</th>
    
    
    <tr>
        <td>
            <img src="<?php echo ($v['image3'] != "")?"/img/logos/".$v['image3']:"images/logo.png";?>?>" alt="image 3 shop" class="imgshop" name="imgimage3" id="imgimage3" width="206" height="145" />
        </td>  
        <th valign="top" style="text-align: left;">
            <label>Shop Image 3 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['image3']; ?>" name="image3" id="image3" />
            <input type="file" name="fileimage3" id="fileimage3" />
        </th>                                          
    </tr>
    
    <tr>
        <td>
            <img src="<?php echo ($v['image4'] != "")?"/img/logos/".$v['image4']:"images/logo.png";?>" alt="image 4 shop" class="imgshop" name="imgimage4" id="imgimage4"  width="206" height="145" />
        </td>  
        <th valign="top" style="text-align: left;">
            <label>Shop Image 4 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['image4']; ?>" name="image4" id="image4" />
            <input type="file" name="fileimage4" id="fileimage4" />
        </th>                  
    </tr>
    
    
     <tr>
        <td>
            <img src="<?php echo ($v['image5'] != "")?"/img/logos/".$v['image5']:"images/logo.png";?>" alt="image 5 shop" class="imgshop" name="imgimage5" id="imgimage5"  width="206" height="145" />
        </td>  
        <th valign="top" style="text-align: left;">
            <label>Shop Image 5 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['image5']; ?>" name="image5" id="image5" />
            <input type="file" name="fileimage5" id="fileimage5" />
        </th>
  	</tr>      
         <td>
            <img src="<?php echo ($v['image6'] != "")?"/img/logos/".$v['image6']:"images/logo.png";?>" alt="image 6 shop" class="imgshop" name="imgimage6" id="imgimage6"  width="206" height="145" />
        </td>  
        <th valign="top" style="text-align: left;">
            <label>Shop Image 6 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $v['image6']; ?>" name="image6" id="image6" />
            <input type="file" name="fileimage6" id="fileimage6" />
        </th>                        
    </tr>
</table>
</div>





