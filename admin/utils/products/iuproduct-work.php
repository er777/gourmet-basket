<?php //insert update product 
session_start();
include_once '../../_init.php';

if (isset($_GET["cmd"]) && $_GET["cmd"] == "delete") {
    $qry = "DELETE FROM products WHERE  product_id = " . $_GET["pid"];
    DB::execute($qry);
    header("location: ".$_GET["url"]);
}
$p = array();
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : NULL;
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : NULL;
$url  = isset($_GET['url']) ? $_GET['url'] : NULL;


/* insert update product */
if (isset($_POST['product_id'])) {
    //echo "<script>alert('clck in add');
    if ($_FILES["image"]["name"] != "") {
        $_POST['image'] = uploadFiles('image');
    }
    for($i=1;$i<=5;$i++)
    	$_FILES["image_$i"]["name"]and$_POST["image_$i"]=uploadFiles("image_$i");
		
	//multiple traditions
    if (isset($_POST["tradition_id"])) {
        $comm = "";
        $trad = "";
        $b = array();
        foreach($_POST["tradition_id"] as $k => $v){
            if($v!='' && !in_array($v,$b)){
                $b[] = $v;
                $trad .= $comm . $v;
                $comm = ", ";            
            }            
        }
        $_POST['tradition_id'] = $trad;
    }
	
	
	//multiple countries
    if (isset($_POST["country_id"])) {
        $comm2 = "";
        $coun = "";
        $bb = array();
        foreach($_POST["country_id"] as $kk => $vv){
            if($vv!='' && !in_array($vv,$bb)){
                $bb[] = $vv;
                $coun .= $comm2 . $vv;
                $comm2 = ", ";            
            }            
        }
        $_POST['country_ids'] = $coun;
    }
	
	
	
	
	
    if(!isset($_POST['taxable']))
     $_POST['taxable']=0;
     
    $p = DB::insert_update('products', 'product_id', $_POST);
    $_POST['product_id'] = $p['product_id'];
    $_POST['nutrition_id'] = $_POST['nutrition_id']==''?'new':$_POST['nutrition_id'];
    $p = DB::insert_update('nutrition', 'nutrition_id', $_POST);
    
    header("location: " . $_POST['redirect_url'] );
}else{
    //$product array
    $p = DB::get_single('products', 'product_id',$product_id);
	
    $sql = "SELECT nutrition_id FROM nutrition WHERE product_id = '$product_id'";
    $nutrition_id = DB::result($sql);
    $n = DB::get_single('nutrition', 'nutrition_id',$nutrition_id);
    $p = array_merge($p, $n);
 
}

//tvar($p);
?>

<div style="background: none repeat scroll 0% 0% white; overflow: hidden;"> 
    <form method="post" onsubmit="return checkProductForm()" id="form" action="utils/products/iuproduct.php" enctype="multipart/form-data" class="uiproduct" name="uiproduct" id="uiproduct">
        <input type="hidden" value="<?php echo $product_id; ?>" name="product_id"  />
        <input type="hidden" value="<?php echo $p['nutrition_id']; ?>" name="nutrition_id"  />
        <?php if($user_id!='admin'){?>
        <input type="hidden" value="<?php echo $user_id; ?>" name="user_id" id="user_id"/>
        <?php } ?>
        <input type="hidden" value="<?php echo $url; ?>" name="redirect_url" id="redirect_url"/>          
        <table border="0" cellpadding="4" cellspacing="2" style=" float: left;">
            <tr>
                <td colspan="2">
                <img alt="Add Product" src="images/iutitles/<?php echo $product_id=='new'?'add':'update'; ?>_product.jpg" /></td>
            </tr>
            <tr>
                <td>
                    <div id="tabs">
                        <div class="items-tab">
                            <ul>
                                <li id="tab1" style=" background: #BFBFBF;"><a style="text-decoration: none; color: gray;" href="javascript:changeStatusTab('tab_1')"><span style=" font-weight: bold;">Product Description</span></a></li>
                                <li id="tab2" ><a style="text-decoration: none; color: gray;" href="javascript:changeStatusTab('tab_2')"><span style=" font-weight: bold;">Choice of Categories</span></a></li>
                                <li id="tab3" ><a style="text-decoration: none; color: gray;" href="javascript:changeStatusTab('tab_3')"><span style=" font-weight: bold;">Product Features</span></a></li>
                                <li id="tab4" ><a style="text-decoration: none; color: gray;" href="javascript:changeStatusTab('tab_4')"><span style=" font-weight: bold;">Nutrition</span></a></li>
                                <li id="tab5" ><a style="text-decoration: none; color: gray;" href="javascript:changeStatusTab('tab_5')"><span style=" font-weight: bold;">Product Images</span></a></li>
                            </ul>
                        </div>    
                        <div style=" clear: both;"></div>          
                        <div class="tab_container">
                        
                        
                            <div id="tab_1" style="display: block;">
                            
                            
                                <table style="width: 630px;">
                                    <tr>
                                        <?php if($_SESSION["l_level"]=='admin'){?>
                                        <td>
                                            <label>Select Vendor: (*)</label> 
                                            <select name="user_id" id="user_id" class="left" onchange="exeAjax('id='+this.value+'&action=14', 'cat-user', false)">
                                                <option value="" >Select</option>
                                                <?php echo DB::db_options("SELECT `user_id`, `user_name` FROM `users` Where level='vendor' order by `user_id`", $user_id) ?>
                                            </select> 
                                        </td> 
                                        <?php } ?>
                                        <td valign="top">
                                            <label>Your Item No.: (*)</label> 
                                            <input type="text" name="item" id="item" size="16" maxlength="16" value="<?php echo $p['item'] ; ?>"/>
                                        </td>

                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <label>Product Name: (*)</label> 
                                            <input type="text" name="product_name" id="product_name" size="32" maxlength="50" value="<?php echo $p['product_name']; ?>"/>
                                        </td>                                     
                                        <td>
                                            <label>Tags (each separated by a comma):</label> 
                                            <textarea id="tags" class="tags" wrap="ON" style="width: 200px; height: 45px;" name="tags"><?php echo $p['tags'] ?></textarea>
                                                        
                                        </td>                            
                                    </tr>
                                    
                                    <tr>
                                        <td valign="top">
                                            <label>Product Description: (*)</label> 
                                            <textarea id="description" class="description" wrap="ON" style="width: 388px; height: 30px;" name="description"><?php echo $p['description']; ?></textarea>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td valign="top" colspan="3">
                                            <label>Long Description:</label> 
                                            <textarea id="long_description" class="description" wrap="ON" style="width: 400px; height: 70px;" name="long_description"><?php echo $p['long_description']; ?></textarea>
                                        </td>
                                    </tr>
                                     <script type="text/javascript">
                                    //<![CDATA[
                    
                                    // This call can be placed at any point after the
                                    // <textarea>, or inside a <head><script> in a
                                    // window.onload event handler.
                    
                                    // Replace the <textarea id="editor"> with an CKEditor
                                    // instance, using default configurations.
                                    CKEDITOR.replace( 'long_description' );
                                    
                    
                                    //]]>
             </script>
                                    
                                    
                                    
                                    
                                    <tr>
                                        <td colspan="3"> 
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label>Selling Price: (*)</label> 
                                                        <input type="text" value="<?php echo $p['selling_price'] ?>" name="selling_price" id="selling_price" size="15" />
                                                    </td>
                                                    <td>
                                                        <label>Wholesale Cost: (*)</label> 
                                                        <input type="text" value="<?php echo $p['cost'] ?>" name="price" id="price" size="15" />
                                                    </td>
                                                    <td>
                                                        <label for="taxable" style="margin-right: 10px;">Is Taxable:</label> 
                                                        <input type="hidden" value="<?php echo $p['taxable'] ?>" name="taxable1" id="taxable1"/>
                                                        <input type="checkbox" value="1" <?php echo checked($p['taxable'], 1) ?> name="taxable" id="taxable" size="15" />
                                                    </td>
                                                    <td>
                                                        <label>Stock Quantity: (*)</label> 
                                                        <input type="text" value="<?php echo $p['stock'] ?>" name="stock" id="stock" size="15" />
                                                    </td>
                                                    <td>
                                                        <label>Ratings:</label> 
                                                        <input type="text" value="<?php echo $p['ratings'] ?>" name="ratings" id="ratings" size="15" />
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                            
                            <div id="tab_2" style=" display: none;">
                            
                            
                                <table style="width: 630px;">
                                    <tr>
                                        <td valign="top">
                                            <label>Category: (*)</label>
                                            <span id="cat-user" style="padding: 0px;">
                                            <select name="category_id" id="category_id" class="left" onchange="exeAjax('id='+this.value+'&action=2', 'cat-subcat', false)" >
                                                <option value="">Select</option>
                                                <?php 
                                                $mycat = DB::result("SELECT mycategories from users where user_id = '$user_id'");
                                                if($mycat==""){
                                                    echo DB::db_options("SELECT `category_id`, `category_name` FROM `categories` order by `category_id`", $p['category_id']);
                                                }else{
                                                    echo DB::db_options("SELECT `category_id`, `category_name` FROM `categories` where category_id IN ($mycat) order by `category_id`", $p['category_id']);
                                                }
                                                ?>
                                            </select> 
                                            </span>
                                        </td>
                                        <td>
                                            <label>Sub-Category: (*)</label> 
                                            <span id="cat-subcat" style="padding: 0px;">
                                                <select name="subcategory_id" id="subcategory_id" class="left" onchange="exeAjax('id='+this.value+'&action=3', 'scat-ssubcat', false)" >
                                                    <option value="">Select</option>
                                                    <?php echo DB::db_options("SELECT `subcategory_id`, `subcategory` FROM `subcategories` where `category_id` = '". $p['category_id'] ."' order by `subcategory_id`", $p['subcategory_id']) ?>
                                                </select>            
                                            </span>
                                        </td>
                                        <td>
                                            <label>Sub-Subcategory:</label> 
                                            <span id="scat-ssubcat" style="padding: 0px;">
                                                <select name="sub_subcat_id" id="sub_subcat_id" class="left" >
                                                    <option value="">Select</option>
                                                    <?php echo DB::db_options("SELECT `sub_subcat_id`, `sub_subcategory` FROM `sub_subcategories` where `subcategory_id` = '".$p['subcategory_id']."' order by `sub_subcat_id`", $p['sub_subcat_id']) ?>
                                                </select>              
                                            </span>  
                                        </td>  
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>Country of manufacture:</label> 
                                            <select name="country_id" id="country_id" class="left">
                                                <option value="">Select</option>
                                                <?php echo DB::db_options("SELECT `country_id`, `name` FROM `countries` order by `country_id`", $p['country_id']) ?>
                                            </select>  
                                        </td>
                                        



                                        
                                        <td>
                                            <label>International Areas where used</label> 
                                            <select name="ethnicity_id" id="ethnicity_id" class="left">
                                                <option value="">Select</option>
                                                <?php echo DB::db_options("SELECT `culinary_country_id`, `culinary_country` FROM `culinary_countries` order by `culinary_country`", $c['culinary_country_id']) ?>
                                            </select>  
                                        </td> 
                                       
                                        
                                        
 <td>

<label>Contries <br />
                  <small>(Can include more than one country)</small>:</label> 
	<?php
	$countries = explode(", ", $p['country_ids']);
	$i_coun = 0;
	do {
		?>
		<div id="country<?php echo $i_coun; ?>" class="more">            
			<select name="country_id[]" id="country_id[]" class="left" >
				<option value="">Select</option>
				<?php echo DB::db_options("SELECT `country_id`, `name` FROM `countries` order by `name`", $countries[$i_coun]) ?>
			</select>   
			<a onclick="less('countries<?php echo $i_coun; ?>')"          id="mor22" class="more" href="javascript:void(0)">-</a>
			<a onclick="exeAjax('i_coun=<?php echo $i_coun; ?>&action=4', 'countries<?php echo $i_coun; ?>', true)" id="mor11" class="more" href="javascript:void(0)">+</a>
		</div>
		<div id="traditions<?php echo $i_coun; ?>"></div>              
		<?php
		$i_coun++;
	} while (isset($countries[$i_coun]));
?>
</td>
</tr>




                                        
                                         <td> 
                                        
                                        <label>Creation Type:</label> 
                                            <select name="creation_id" id="creation_id" class="left">
                                                <option value="">Select</option>
                                                <?php echo DB::db_options("SELECT `creation_id`, `type` FROM `product_creation` order by `creation_id`", $p['creation_id']) ?>
                                            </select>  
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td valign="top" id="traditions">
                                        
                                            <label>Culinary Tradition <br />
                                                <small>(Can include more than one tradition)</small>:</label> 
                                            <?php
                                            $traditions = explode(", ", $p['tradition_ids']);
                                            $i_trad = 0;
                                            do {
                                                ?>
                                                <div id="tradition<?php echo $i_trad; ?>" class="more">            
                                                    <select name="tradition_id[]" id="tradition_id[]" class="left" >
                                                        <option value="">Select</option>
                                                        <?php echo DB::db_options("SELECT `tradition_id`, `name` FROM `culinary_tradition` order by `sort_by`", $traditions[$i_trad]) ?>
                                                    </select>   
                                                    <a onclick="less('tradition<?php echo $i_trad; ?>')"          id="mor2" class="mor" href="javascript:void(0)">-</a>
                                                    <a onclick="exeAjax('i_trad=<?php echo $i_trad; ?>&action=4', 'traditions<?php echo $i_trad; ?>', true)" id="mor1" class="mor" href="javascript:void(0)">+</a>
                                                </div>
                                                <div id="traditions<?php echo $i_trad; ?>"></div>              
                                                <?php
                                                $i_trad++;
                                            } while (isset($traditions[$i_trad]));
                                            ?>            
                                        </td> 
                                        <td>
                                            <!-- <label>Image:</label>> 
                                            <input type="hidden" value="<?php echo $p['image'] ?>" name="image" id="image" />
                                            <img src="/admin/images/<?php echo ($p['image'] != "")?"product/".$p['image']:"logo.png";?>" alt="UPLOAD IMAGE" id="image2" height="150" width="150"/>
                                            <br />
                                            <input type="file" name="image3" id="image3" style="float: left; width: 100px;"  /-->
                                        </td> 
                                        <td valign="top">
                                            <br /><br />
                                            <label><b>Featured product</b>:
                                            <input type="checkbox" value="1"  <?php echo checked($p['featured_product'], 1) ?> name="featured_product" id="featured_product" />
                                            </label>               
                                        </td> 
                                    </tr>
                                </table>
                            </div>
                            
                            
                            <div id="tab_3" style=" display: none;">
                            
                            
                                <table style="width: 630px;">
                                    <tr>  
                                        <td valign="top">         
                                            <label>Product Weight <small>(exact weight in ounces)</small> : (*)</label> 
                                            <input type="text" value="<?php echo $p['weight'] ?>" name="weight" id="weight" />
                                        </td>
                                        <td>
                                             <!--<label>Content in ounces /liquid measurement :</label> 
                                             <input type="text" value="<?php // echo $p['measurement'] ?>" name="measurement" id="measurement" />-->                                                   
                                        </td>
                                    </tr>
                                    <tr>
                                         <td colspan="2">
                                         <!--
                                         <td>
                                            <label> Product size in inches <small>(H x W x D) </small> : (*)</label> 
                                            <input type="text" value="<?php // echo $p['size'] ?>" name="size" id="size" />  
                                        </td>
                                         -->
                                            <label> List of Ingredients  <small>(each separated by a comma) </small> :</label> 
                                            <textarea name="ingredients" id="ingredients" cols="45" rows="3"><?php echo $p['ingredients'] ?></textarea>
                                        </td> 
                                    </tr>
                                    <td valign="top" colspan="2">      
                                        <table>
                                            <tr>
                                                <td>
                                                    <table class="checkbox1">
                                                        <tr>
                                                            <td colspan="6">
                                                                <label>Certification:<br/>
                                                                    Check all that apply for each product.:</label> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Allergen Free </td><td><input type="checkbox" value="1" <?php echo checked($p['allergen'], 1) ?> name="allergen" id="allergen" /></td>
                                                            <td> Gluten Free </td><td><input type="checkbox" value="1" <?php echo checked($p['gluten'], 1) ?> name="gluten" id="gluten" /></td>
                                                            <td> Vegan </td><td><input type="checkbox" value="1" <?php echo checked($p['vegan'], 1) ?> name="vegan" id="vegan" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Sugar-Free </td><td><input type="checkbox" value="1" <?php echo checked($p['sugar'], 1) ?> name="sugar" id="sugar" /></td>
                                                            <td> Lactose Free </td><td><input type="checkbox" value="1" <?php echo checked($p['lactose'], 1) ?> name="lactose" id="lactose" /></td>
                                                            <td> Nut-Free </td><td><input type="checkbox" value="1" <?php echo checked($p['nut'], 1) ?> name="nut" id="nut" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table class="checkbox1">
                                                        <tr>
                                                            <td colspan="6">
                                                                <label> Certified Products (Must be Officially Certified)   <br/>
                                                                    Check all that apply for each product:</label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> American Heart Association </td><td><input type="checkbox" value="1" <?php echo checked($p['heart'], 1) ?> name="heart" id="heart" /> </td>
                                                            <td> Organic </td><td><input type="checkbox" value="1" <?php echo checked($p['organic'], 1) ?> name="organic" id="organic" /></td>
                                                            <td> Kosher </td><td><input type="checkbox" value="1" <?php echo checked($p['kosher'], 1) ?> name="kosher" id="kosher" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Halal </td><td><input type="checkbox" value="1" <?php echo checked($p['halal'], 1) ?> name="halal" id="halal" /></td>
                                                            <td> Fair Traded </td><td><input type="checkbox" value="1" <?php echo checked($p['fair_traded'], 1) ?> name="fair_traded" id="fair_traded" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>  
                                    </td>         
                                    </tr>
                                </table>
                            </div>
                            
                            
                            <div id="tab_4" style=" display: none;">
                            
                            
                                 <table style="width: 630px;">
                                 	 <tr>
                                        <th colspan="6"> <label> Nutrition Label Information:</label>
                                        </th>
                                      </tr>
                                      <tr>
                                        <td> Serving Size </td>
                                        <td><input type="text" size="5" value="<?php echo $p['serv_size'] ?>" name="serv_size" id="serv_size" /></td>
                                        <td> Calories </td>
                                        <td><input type="text" size="5" value="<?php echo $p['cal'] ?>" name="cal" id="cal" /></td>
                                        <td> Calories from Fat</td>
                                        <td><input type="text" size="5" value="<?php echo $p['cal_fat'] ?>" name="cal_fat" id="cal_fat" /></td>
                                      </tr>
                                      <tr>
                                        <td> Servings per Container </td>
                                        <td><input type="text" size="5" value="<?php echo $p['serv_per_cont'] ?>" name="serv_per_cont" id="serv_per_cont" /></td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td>Total Fat</td>
                                        <td><input type="text" size="5" value="<?php echo $p['total_fat'] ?>" name="total_fat" id="total_fat" /></td>
                                        <td>Saturated Fat</td>
                                        <td><input type="text" size="5" value="<?php echo $p['sat_fat'] ?>" name="sat_fat" id="sat_fat" /></td>
                                        <td>Trans Fat</td>
                                        <td><input type="text" size="5" value="<?php echo $p['trans_fat'] ?>" name="trans_fat" id="trans_fat" /></td>
                                      </tr>
                                      <tr>
                                        <td>Cholesterol</td>
                                        <td><input type="text" size="5" value="<?php echo $p['chol']  ?>" name="chol" id="chol" /></td>
                                        <td>Sodium</td>
                                        <td><input type="text" size="5" value="<?php echo $p['sodium'] ?>" name="sodium" id="sodium" /></td>
                                      </tr>
                                      <tr>
                                        <td>Total Carbohydrate</td>
                                        <td><input type="text" size="5" value="<?php echo $p['carbo'] ?>" name="carbo" id="carbo" /></td>
                                        <td>Dietary Fiber</td>
                                        <td><input type="text" size="5" value="<?php echo $p['fiber'] ?>" name="fiber" id="fiber" /></td>
                                        <td>Sugars</td>
                                        <td><input type="text" size="5" value="<?php echo $p['sugar'] ?>" name="sugar" id="sugar" /></td>
                                      </tr>
                                      <tr>
                                        <td>Protein</td>
                                        <td><input type="text" size="5" value="<?php echo $p['protein'] ?>" name="protein" id="protein" /></td>
                                        <td>Vitamin A</td>
                                        <td><input type="text" size="5" value="<?php echo $p['vit_A'] ?>" name="vit_A" id="vit_A" /></td>
                                        <td>Vitamin C</td>
                                        <td><input type="text" size="5" value="<?php echo $p['vit_C'] ?>" name="vit_C" id="vit_C" /></td>
                                      </tr>
                                      <tr>
                                        <td>Calcium</td>
                                        <td><input type="text" size="5" value="<?php echo $p['calcium'] ?>" name="calcium" id="calcium" /></td>
                                        <td>Iron</td>
                                        <td><input type="text" size="5" value="<?php echo $p['iron']; ?>" name="iron" id="iron" /></td>
                                      </tr>
                            	</table>
                            </div>
                            
                            
                            <div id="tab_5" style=" display: none;">
                            
                            
                                <table style="width: 630px;padding:20px;">
                                    <tr>
                                        <td>
                                            <img src="/admin/images/<?php echo ($p['image'] != "")?"product/".$p['image']:"logo.png";?>" alt="UPLOAD IMAGE" height="100" width="100"/>
                                            <br />
                                            <input type="file" name="image" style="float: left; width: 100px;"  />
                                        </td> 
                                        <td>
                                            <img src="/admin/images/<?php echo ($p['image_1'] != "")?"product/".$p['image_1']:"logo.png";?>" alt="UPLOAD IMAGE" height="100" width="100"/>
                                            <br />
                                            <input type="file" name="image_1" style="float: left; width: 100px;"  />
                                        </td> 
                                        <td>
                                            <img src="/admin/images/<?php echo ($p['image_2'] != "")?"product/".$p['image_2']:"logo.png";?>" alt="UPLOAD IMAGE" height="100" width="100"/>
                                            <br />
                                            <input type="file" name="image_2" style="float: left; width: 100px;"  />
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/admin/images/<?php echo ($p['image_3'] != "")?"product/".$p['image_3']:"logo.png";?>" alt="UPLOAD IMAGE" height="100" width="100"/>
                                            <br />
                                            <input type="file" name="image_3" style="float: left; width: 100px;"  />
                                        </td> 
                                        <td>
                                            <img src="/admin/images/<?php echo ($p['image_4'] != "")?"product/".$p['image_4']:"logo.png";?>" alt="UPLOAD IMAGE" height="100" width="100"/>
                                            <br />
                                            <input type="file" name="image_4" style="float: left; width: 100px;"  />
                                        </td> 
                                        <td>
                                            <img src="/admin/images/<?php echo ($p['image_5'] != "")?"product/".$p['image_5']:"logo.png";?>" alt="UPLOAD IMAGE" height="100" width="100"/>
                                            <br />
                                            <input type="file" name="image_5" style="float: left; width: 100px;"  />
                                        </td> 
                                    </tr>
                                </table>
                            </div>
                            <!-- End tabs -->
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php if ($product_id != "new") { ?>
                        <input type="image" src="images/btn_update.jpg" onclick="" />&nbsp;&nbsp;&nbsp;
                    
                        <a href="utils/products/iuproduct.php?cmd=delete&pid=<?php echo $product_id; ?>&url=<?php echo urlencode( $url ) ?>">
                            <img src="images/btn_delete.jpg" border="0" />
                        </a>
                        <?php
                    } else {
                        echo ' <input type="image" src="images/btn_add.jpg" onclick="" />&nbsp;';
                    }
                    ?>
                </td>
                <td valign="top"> 
                </td>           
            </tr>
        </table>
    </form>
</div>



