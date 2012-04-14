<?php 
session_start();
include_once '../_init.php';

//echo $_SESSION["user_id"];
if(isset($_GET["cmd"]) && $_GET["cmd"] == "delete") {
    $qry = "DELETE FROM products WHERE  product_id = " . $_GET["pid"];
    DB::execute($qry);
    header("location: products.php");
}

$p_id = isset($_GET['product_id'])?$_GET['product_id']:0;
$u_id = isset($_GET['user_id'])?$_GET['user_id']:0;

$q = "select * from products where product_id = '$p_id' limit 1";

DB::query($q);
$product = DB::fetch_assoc();

if(isset($_POST['product_id'])){
   if ($_FILES["image3"]["name"] != "") {
    $_POST['image'] = uploadFiles('image3');
   }
   
   $product = DB::insert_update($_POST,'products','product_id');
   //t_var($product);
   header("location: ../products.php");
}

extract($product);

$product_id = $product_id==0?"new":$product_id; 
$user_id = $product_id==0?$u_id:$user_id; 

?>
<style>
.uiproduct label{
    display: block;
}
</style>
<div style="background: white;">
<form method="post" action="utils/iuproduct.php" enctype="multipart/form-data" class="uiproduct" name="uiproduct" id="uiproduct">
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
<input type="hidden" value="<?php echo $user_id; ?>" name="user_id" id="user_id"/>          
<table border="0" cellpadding="4" cellspacing="2" >
    <tr>
        <td colspan="2"><img alt="Add Product" src="images/title_add_product.jpg" /></td>
    </tr>
    <tr>
        <td valign="top">
            <label>Your Item No.:</label> 
            <input type="text" name="item" id="item" size="16" maxlength="16" value="<?php echo $item;?>"/>
            <label>Product Name:</label> 
            <input type="text" name="product_name" id="product_name" size="32" maxlength="32" value="<?php echo $product_name;?>"/>
            <label>Tags (each separated by a comma):</label> 
            <input type="text" value="<?php echo $tags ?>" name="tags" id="tags" size="32" maxlength="32" />              
        </td> 
        <td valign="top">
            <label>Category:</label> 
            <select name="category_id" id="category_id" class="left" onchange=" exeAjax(this.value, 'subcategories', 'cat-subcat')" >
                <option value="">Select</option>
                <?php  echo DB::db_options("SELECT `category_id`, `category_name` FROM `categories` order by `category_id`", $category_id)      ?>
            </select> <br /><br />
            <label>Sub-Category:</label> 
            <span id="cat-subcat">
            <select name="subcategory_id" id="subcategory_id" class="right" onchange=" exeAjax(this.value, 'sub_subcategories', 'scat-ssubcat')" >
                <option value="">Select</option>
                <?php  echo DB::db_options("SELECT `subcategory_id`, `subcategory` FROM `subcategories` where `category_id` = '$category_id' order by `subcategory_id`", $subcategory_id)      ?>
            </select>            
            </span>
            <label>Sub-Subcategory:</label> 
            <span id="scat-ssubcat">
            <select name="sub_subcat_id" id="sub_subcat_id" class="left" >
                <option value="">Select</option>
                <?php  echo DB::db_options("SELECT `sub_subcat_id`, `sub_subcategory` FROM `sub_subcategories` where `subcategory_id` = '$subcategory_id' order by `sub_subcat_id`", $sub_subcat_id)      ?>
            </select>              
            </span>  
        </td>        
        <td valign="top">
            <label>Country of manufacture:</label> 
            <select name="country_id" id="country_id" class="left">
                <option value="">Select</option>
                <?php  echo DB::db_options("SELECT `country_id`, `name` FROM `countries` order by `country_id`", $country_id)      ?>
            </select>  
           <label>Ethnicity:</label> 
            <select name="ethnicity_id" id="ethnicity_id" class="left">
                <option value="">Select</option>
                <?php  echo DB::db_options("SELECT `ethnicity_id`, `name` FROM `ethnicities` order by `ethnicity_id`", $ethnicity_id)      ?>
            </select>   
            <label>Content in ounces /liquid measurement :</label> 
            <input type="text" value="<?php echo $measurement ?>" name="measurement" id="measurement" />               
        </td>         
    </tr>   
    <tr>
        <td valign="top">
            <label>Product Description:</label> 
            <textarea rows="2" cols="24"  wrap="OFF" class="description" name="description" id="description"><?php echo $description;?></textarea>
        </td>
        <td valign="top">
            <label>Long Description:</label>
            <textarea rows="6" cols="24"  wrap="ON" class="description" name="long_description" id="description"><?php echo $long_description;?></textarea>
        </td> 
        <td valign="top" id="traditions">
            <label>Culinary Tradition <br />
            <small>(Can include more than one tradition)</small>:</label> 
            <?php 
            $traditions = explode(", ", $tradition_ids);
            $i_trad = 0;
            $c = count($traditions)-1;
            //t_var($traditions);
            do {  
          ?><span id="tradition<?php echo  $i_trad; ?>" class="more">            
            <select name="tradition_id[]" id="tradition_id[]" class="left" >
                <option value="">Select</option>
                <?php  echo DB::db_options("SELECT `tradition_id`, `name` FROM `culinary_tradition` order by `sort_by`", $traditions[$i_trad])      ?>
            </select>   
            <a onclick="exeAjax('x', 'culinary_tradition', 'traditions')" id="mor1" class="mor" href="javascript:void">+</a>  
            </span>               
             <?php 
              $i_trad++;
            } while (isset($traditions[$i_trad]));
            ?>            
        </td>  
        <td valign="top">         
         <label>Product Weight <small>(exact weight in ounces)</small> :</label> 
         <input type="text" value="<?php echo $weight ?>" name="weight" id="weight" />        
       
        <label> Product size in inches <small>(H x W x D) </small> :</label> 
         <input type="text" value="<?php echo $size ?>" name="size" id="size" />  
         
        <label> List of Ingredients  <small>(each separated by a comma) </small> :</label> 
         <input type="text" value="<?php echo $ingredients ?>" name="ingredients" id="ingredients" />         
         
        </td>                 
    </tr> 
    <tr>      
         <td>      
            <label>Retail Price:</label> 
            <input type="text" value="<?php echo $retail_price ?>" name="retail_price" id="retail_price" />        
        
            <label>Price:</label> 
            <input type="text" value="<?php echo $price ?>" name="price" id="price" />        
        </td> 
        <td>
           <!-- <label>Image:</label>--> 
            <input type="hidden" value="<?php echo $image ?>" name="image" id="image" />
            <img src="/admin/images/product/<?php echo $image ?>" alt="NO IMAGE" id="image2" height="150" width="150"/>
            <br />
            <input type="file" name="image3" id="image3" style="width: 100px;"  />
        </td>         
        <td valign="top">        
        <label>Nutrition /Certification:
        Check all that apply for each product.:</label> 
        Allergen Free<input type="checkbox" value="1" name="allergen" id="allergen" />
        Gluten Free<input type="checkbox" value="1" name="gluten" id="gluten" />
        Vegan<input type="checkbox" value="1" name="vegan" id="vegan" />
        Sugar-Free<input type="checkbox" value="1" name="sugar" id="sugar" />
        Lactose Free<input type="checkbox" value="1" name="lactose" id="lactose" />
        Nut-Free<input type="checkbox" value="1" name="nut" id="nut" />
        <label>Certified Products (Must be Officially Certified)
                Check all that apply for each product:</label>
        American Heart Association<input type="checkbox" value="1" name="heart" id="heart" />
        Organic<input type="checkbox" value="1" name="organic" id="organic" />
        Kosher<input type="checkbox" value="1" name="kosher" id="kosher" />
        Halal<input type="checkbox" value="1" name="halal" id="halal" />
        Fair Traded<input type="checkbox" value="1" name="fair_traded " id="fair_traded " />

        
      </td>         
    </tr>    
    <tr>
        <td colspan="2">
<?php if($product_id !="new") { ?>
        <input type="image" src="images/btn_update.jpg" onclick="" />&nbsp;
        <a href="utils/iuproduct.php?cmd=delete&pid=<?php echo $product_id; ?>">
        <img src="images/btn_delete.jpg" border="0" />
        </a>
<?php }else{
        echo ' <input type="image" src="images/btn_add.jpg" onclick="" />&nbsp;';                
} ?>
        </td>
        <td valign="top">
        
      </td>           
    </tr>
</table>
</form>
</div>

