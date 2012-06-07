<?php
class Product extends AppModel{
    public $name = 'Product';
			 
    function addcart($data){        
        $cart = $this->query("SELECT p.product_id, p.user_id, p.product_name, p.image, p.price, p.stock, p.weight, p.taxable, p.item, u.business_name FROM products p INNER JOIN users u ON (p.user_id = u.user_id) WHERE p.product_id = '".$data['product_id']."'");
        if(empty($cart) == false){
            $cart_new['vendor_id'] = $cart[0]['p']['user_id'];
            $cart_new['business_name'] = $cart[0]['u']['business_name'];
            $cart_new['product_id'] = $cart[0]['p']['product_id'];
            $cart_new['product_name'] = $cart[0]['p']['product_name'];
            $cart_new['image'] = $cart[0]['p']['image'];
            //$cart_new['retail_price'] = $cart[0]['p']['retail_price'];
            //$cart_new['price'] = $cart[0]['p']['price'];
            $cart_new['price'] = $data['price'];
            $cart_new['stock'] = $cart[0]['p']['stock'];
            $cart_new['weight'] = $cart[0]['p']['weight'];
            $cart_new['taxable'] = $cart[0]['p']['taxable'];
            $cart_new['qty'] = $data['qty'];
            //$cart_new['tot'] = $data['qty']*$cart[0]['p']['price'];
            $cart_new['tot'] = $data['qty']*$data['price'];
            if ($data['newone'] == 1) {
                 $cart_new['features'] = $cart[0]['p']['item'];
                 if (array_key_exists('mod', $data)) {
                      if (is_array($data['mod'])) {
                           $cart_new['features'] = $cart_new['features'] . '-';
                           foreach ($data['mod'] as $key=>$value) {
                               $cart_new['features'] = $cart_new['features'] . $value;
                           }
                      }
                 }
            }else {
                $cart_new['features'] = $data['mod'];
            }
            return $cart_new;
        }else{
            return false;
        }
        
    }
		function getOwnedProductsByCategory($vid){
				$sql = "SELECT DISTINCT categories.`category_name`, categories.`category_id`,subcategories.`subcategory_id`,sub_subcategories.`sub_subcat_id`, subcategories.subcategory, `sub_subcategories`.`sub_subcategory`,
				categories.slug as parent_slug,
				subcategories.slug as child_slug,
				sub_subcategories.slug as grandchild_slug
				FROM products
				RIGHT JOIN users ON users.user_id = products.user_id
				LEFT JOIN categories ON products.category_id = categories.category_id
				LEFT JOIN subcategories ON products.subcategory_id = subcategories.subcategory_id
				LEFT JOIN sub_subcategories ON products.sub_subcat_id = sub_subcategories.sub_subcat_id
				WHERE users.short_name = '".$vid."'
				ORDER BY categories.`category_name`, subcategories.`subcategory`, `sub_subcategories`.`sub_subcategory`, products.product_name;";
				
				// $result = $this->query($sql); // <-- Results return structured by table! That is just way harder to reorgonize.... forget that!
				$result = mysql_query($sql); // way easyier.
						$restructureForList = array();
				while($arr = mysql_fetch_assoc($result)){
						$parent = '<a href="/products/vendor/' .$vid.'/' . $arr['parent_slug'] .'">'.$arr['category_name'].'</a>';
						$child = '<a href="/products/vendor/' .$vid.'/' .$arr['parent_slug'] .'/'.$arr['child_slug'].'">'.$arr['subcategory'].'</a>';
						$grandchild = '<a href="/products/vendor/' .$vid.'/' .$arr['parent_slug'] .'/'.$arr['child_slug'].'/'.$arr['grandchild_slug'].'">'.$arr['sub_subcategory'].'</a>';
						if(!isset($restructureForList[$parent])){
								$restructureForList[$parent] = array();
						}
						if(isset($child)){
								if(!isset($restructureForList[$parent][$child])){
									$restructureForList[$parent][$child] = array();
								}
						}
						if(isset($grandchild)){
								if(!isset($child)){
										//$child = "__orphen__";
										$restructureForList[$parent][$grandchild] = array();
								}else{
										$restructureForList[$parent][$child][$grandchild] = array();
										
								}
						}
				}
				$output ='<ul class="parents subMenu" style="display:none;">';
				foreach ($restructureForList as $parent=>$child) {
						$output .= '<li>'.$parent;
						if(count($child) > 0){
								$output .= '<ul class="children subMenu">';
								foreach ($child as $child_name=>$grandchildren){
										$output .= '<li>'.$child_name;
										if(count($grandchildren) > 0){
												$output.='<ul class="grandchildren subMenu">';
												foreach ($grandchildren as $grandchild_name=>$throwaway) {
														$output .= '<li>' . $grandchild_name.'</li>';
												}
												$output .= '</ul>'; // end grandkids.
										}
								}
								$output .= '</li></ul>'; // end children.
						}
				}
				$output .= '</li></ul>'; // end parents.
				return $output;
		}

    function getProdCreation(){
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM `product_creation` AS pc " ;
        return $this->query($var1);  
    }
		
		function _getAllProductMods($product_id){
				if(!is_numeric($product_id)){
						// This is a precaution.
						// This will ensure that only numeric values will be passed.
						// Although, ALL LINKS should be DEVOID of special chars when they render the SEO specific product ID+PRODUCTNAME path.
						preg_match("/(^\d*?)-/", $product_id, $matches);
						$product_id = $matches[1];
				}
				
				$sql = "SELECT mod_sku, serialized_mod_data 
								FROM product_mods WHERE product_id = '" . $product_id . "';";
				return $this->query($sql);
				
		}
		
		function _getThisCategory($id){
				preg_match("/^\d*/",$id,$match);
				$id = (is_numeric($match[0]) ? $match[0] : 1);
				$sql = " SELECT * FROM products
				LEFT JOIN categories
				ON categories.category_id = products.category_id
				WHERE products.product_id = '".$id."';";
				$result =  $this->query($sql); // will return false on fail??
				return $result[0]['categories'];
		}
		
		function _getAllProductsandUsers(){
				
			$sql = "SELECT products.product_id, users.shop_name, users.short_name 
			FROM  users
      LEFT JOIN products
      ON products.user_id = users.user_id
			WHERE users.shop_name != ''; ";
	 		$result = $this->query($sql);
			foreach($result as $row){
				$replaced_url = preg_replace('/^(.*?)\.(.*?)\.(.*?)$/', $row['users']['short_name']. '.$2.$3', $_SERVER['HTTP_HOST']);
				$array[$row['products']['product_id']]['shop_name']= $row['users']['shop_name'];
				$array[$row['products']['product_id']]['url']= "//".$replaced_url;
			}
			return $array;
			
			
		}
	function getAllProductCategories () {
		// vars.
		$structuredArrayOfAllCategories = array();
		$AllGrandchildren = array();
		
		// Query to grab all parents and first-gen children correctly.
		$selectParentsAndChildren =    "SELECT  categories.category_id as category_id,
							subcategories.subcategory_id as subcategory_id,
							categories.category_name,
							subcategories.subcategory,
							categories.category_image,
							categories.category_article,
							categories.slug as parent_slug,
							subcategories.slug as child_slug
						FROM categories  
						LEFT JOIN subcategories 
						ON subcategories.category_id = categories.category_id
						ORDER BY categories.category_name;
						;";
						
		// Query to grab all grandchildren correctly.			
		$selectGrandchildren = "SELECT 	sub_subcategories.sub_subcat_id,
						subcategories.subcategory_id,
						subcategories.subcategory,
						sub_subcategories.sub_subcategory,
							sub_subcategories.slug as grandchild_slug,
							subcategories.slug as child_slug
					FROM subcategories  
					INNER JOIN sub_subcategories 
					ON subcategories.subcategory_id = sub_subcategories.subcategory_id
					ORDER BY subcategories.subcategory, sub_subcategories.sub_subcategory;";
					
		// Execute Queries.
			$ParentsAndChildren = $this->query($selectParentsAndChildren);
			$grandchildrenResults = $this->query($selectGrandchildren);
			
			// Loop grandchildren.
			foreach ($grandchildrenResults as $row) {
				
				$subcat_id = $row['sub_subcategories']['sub_subcat_id'];
				$child_slug = $row['subcategories']['child_slug'];
				$grandchild_slug = $row['sub_subcategories']['grandchild_slug'];
				$grandchild_name = $row['sub_subcategories']['sub_subcategory'];
				
				$AllGrandchildren[$child_slug][$grandchild_slug]['id'] = $subcat_id;
				$AllGrandchildren[$child_slug][$grandchild_slug]['name'] = $grandchild_name;
				$AllGrandchildren[$child_slug][$grandchild_slug]['slug'] = $grandchild_slug;
			}
			// Loop Parents and Children... Add Grandchildren as needed.
			foreach ($ParentsAndChildren as $row) {
				
				// Pull all vars from the Query to structure the parents and children.
				$parent_category_name = $row['categories']['category_name'];
				$parent_category_id = $row['categories']['category_id'];
				$parent_category_image = $row['categories']['category_image'];
				$parent_category_article = $row['categories']['category_article'];
				$parent_slug = $row['categories']['parent_slug'];
				$child_slug = $row['subcategories']['child_slug'];
				$child_category_id = $row['subcategories']['subcategory_id'];
				$child_category_name = $row['subcategories']['subcategory'];
				
				// Grandchildren.
				$myGrandchildren = (isset($AllGrandchildren[$child_slug]) ? $AllGrandchildren[$child_slug] : FALSE);
				
				// Children.
				$structuredArrayOfAllCategories[$parent_slug]['children'][$child_slug]['id'] = $child_category_id;
				$structuredArrayOfAllCategories[$parent_slug]['children'][$child_slug]['name'] = $child_category_name;
				$structuredArrayOfAllCategories[$parent_slug]['children'][$child_slug]['slug'] = $child_slug;
				$structuredArrayOfAllCategories[$parent_slug]['children'][$child_slug]['children'] = $myGrandchildren;
				
				// Parents.
				$structuredArrayOfAllCategories[$parent_slug]['id'] = $parent_category_id;
				$structuredArrayOfAllCategories[$parent_slug]['name'] = $parent_category_name;
				$structuredArrayOfAllCategories[$parent_slug]['slug'] = $parent_slug;
				$structuredArrayOfAllCategories[$parent_slug]['image'] = $parent_category_image;
				$structuredArrayOfAllCategories[$parent_slug]['article'] = $parent_category_article;
		}	
    return $structuredArrayOfAllCategories;
}
	
		function getCategories(){     
					$var1 = "";
					$var1 .= "SELECT * ";
					$var1 .= "FROM   `categories` AS c " ;
					return $this->query($var1);  
			}
	
	
}
?>