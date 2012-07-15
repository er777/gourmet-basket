<div class="recipe-box-left">
        
         	<input type="hidden" name="data[users_recipes][recipe_number]" id="users_Recipe_number" value="<?=$r['$five']?>" />
        
            <div class="recipe-info"><span class="recipe-label">Name</span>
            <input name="data[users_recipes][recipe_name]" value="<?=$r['recipe_name']?>" type="text" class="" id="usersRecipe_name" size="39"/>
            </div>
            
            <div class="recipe-info"><span class="recipe-label">Recipe Tags</span>
            <input name="data[users_recipes][recipe_tags]" value="<?=$r['recipe_tags']?>" type="text" class="" id="users_ingredient" size="39"/>
            </div>

            <div class="recipe-info"><span class="recipe-label">Ingredients</span>
            <textarea name="data[users_recipes][recipe_ingredients]" id="usersRecipe_ingredients" cols="40" rows="8"><?=$r['recipe_ingredients']?></textarea>
            </div>
            
            <div class="recipe-info"><span class="recipe-label">Instructions</span>
            <textarea name="data[users_recipes][recipe_preparation]" id="usersRecipe_Preparations" cols="40" rows="8"><?=$r['recipe_preparation']?></textarea>
            </div>
            
            <div class="recipe-info"><span class="recipe-label">Comment</span>
            <textarea name="data[users_recipes][recipe_comment]" id="usersRecipe_comment" cols="40" rows="4"><?=$r['recipe_comment']?></textarea> 
            </div>
          
        </div>
<table style="float:right">
 <th>RECIPE PHOTOS</th>
    <tr>
        <td>
            <img src="<?php echo ($r['recipe_photo_1'] != "")?"/img/recipes/".$r['recipe_photo_1']:"images/logo.png";?>?>" alt="rec-image 1 shop" class="rec-imgshop" name="rec-imgimage1" id="rec-imgimage1" width="100" height="100" />
        </td>  
        <th valign="top" style="text-align: left;"><br />
         	<div>
             <label>Caption</label><br /><input type="text"  class="recipe" name="rec_photo_caption_1" value="<?php echo $r['rec_photo_caption_1'] ?>" size="30"/></div>    
            <label>Recipe Image 1 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $r['recipe_photo_1']; ?>" name="rec_image1" id="rec-image1" />
            <input type="file" name="recimage1" id="recimage1" />
        </th>                                          
    </tr>
    
    <tr>
        <td>
            <img src="<?php echo ($r['recipe_photo_2'] != "")?"/img/recipes/".$r['recipe_photo_2']:"images/logo.png";?>" alt="rec-image 2 shop" class="rec-imgshop" name="rec-imgimage2" id="rec-imgimage2" width="100" height="100" />
        </td>  
        <th valign="top" style="text-align: left;"><br />
        	
         	<div>
            <label>Caption</label><br />
            <input type="text"  class="recipe" name="rec_photo_caption_2" value="<?php echo $r['rec_photo_caption_2'] ?>" size="30"/></div>    
            <label>Recipe Image 2 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $r['recipe_photo_2']; ?>" name="rec_image2" id="rec-image2" />
            <input type="file" name="recimage2" id="recimage2" />
        </th>                  
    </tr>
    
    <tr>
        <td>
            <img src="<?php echo ($r['recipe_photo_3'] != "")?"/img/recipes/".$r['recipe_photo_3']:"images/logo.png";?>?>" alt="rec-image 3 shop" class="rec-imgshop" name="rec-imgimage3" id="rec-imgimage3" width="100" height="100" />
        </td>  
        <th valign="top" style="text-align: left;"><br />
         	<div>
             <label>Caption</label><br /><input type="text"  class="recipe" name="rec_photo_caption_3" value="<?php echo $r['rec_photo_caption_3'] ?>" size="30"/></div>    
            <label>Recipe Image 3 (220 x 155)</label><br />
            <input type="hidden" value="<?php echo $r['recipe_photo_3']; ?>" name="rec_image3" id="rec-image3" />
            <input type="file" name="recimage3" id="recimage3" />
        </th>                                          
    </tr>
    
</table>   