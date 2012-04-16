<?php
class Product extends AppModel{
    public $name = 'Product';
       
			 
			 
    function addcart($data){        
        $cart = $this->query("SELECT p.product_id, p.user_id, p.product_name, p.image, p.price, p.stock, p.weight, p.taxable, u.business_name FROM products p INNER JOIN users u ON (p.user_id = u.user_id) WHERE p.product_id = '".$data['product_id']."'");
        if(empty($cart) == false){
            $cart_new['vendor_id'] = $cart[0]['p']['user_id'];
            $cart_new['business_name'] = $cart[0]['u']['business_name'];
            $cart_new['product_id'] = $cart[0]['p']['product_id'];
            $cart_new['product_name'] = $cart[0]['p']['product_name'];
            $cart_new['image'] = $cart[0]['p']['image'];
            //$cart_new['retail_price'] = $cart[0]['p']['retail_price'];
            $cart_new['price'] = $cart[0]['p']['price'];
            $cart_new['stock'] = $cart[0]['p']['stock'];
            $cart_new['weight'] = $cart[0]['p']['weight'];
            $cart_new['taxable'] = $cart[0]['p']['taxable'];
            $cart_new['qty'] = $data['qty'];
            $cart_new['tot'] = $data['qty']*$cart[0]['p']['price'];
            return $cart_new;
        }else{
            return false;
        }
        
    }
		
		function getProdCreation(){     
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM `product_creation` AS pc " ;
        return $this->query($var1);  
    }
		
	function getAllProductCategories () {
		//vars.
		$structuredArrayOfAllCategories = array();
		$AllGrandchildren = array();
		
		//Querys
		$selectParentsAndChildren =    "SELECT  categories.category_id as category_id,
							subcategories.subcategory_id as subcategory_id,
							categories.category_name,
							subcategories.subcategory,
							categories.category_image,
							REPLACE(LOWER(REPLACE(REPLACE(TRIM(categories.category_name), ' & ', '-'), '/', '-')), ' ', '-') as parent_slug,
							REPLACE(LOWER(REPLACE(REPLACE(TRIM(subcategories.subcategory), ' & ', '-'), '/', '-')), ' ', '-') as child_slug
						FROM categories  
						LEFT JOIN subcategories 
						ON subcategories.category_id = categories.category_id
						ORDER BY category_name, subcategories.subcategory;";
						
		$selectGrandchildren = "SELECT 	sub_subcategories.sub_subcat_id,
						subcategories.subcategory_id,
						subcategories.subcategory,
						sub_subcategories.sub_subcategory,
							REPLACE(LOWER(REPLACE(REPLACE(TRIM(sub_subcategories.sub_subcategory), ' & ', '-'), '/', '-')), ' ', '-') as grandchild_slug,
							REPLACE(LOWER(REPLACE(REPLACE(TRIM(subcategories.subcategory), ' & ', '-'), '/', '-')), ' ', '-') as child_slug
					FROM subcategories  
					INNER JOIN sub_subcategories 
					ON subcategories.subcategory_id = sub_subcategories.subcategory_id
					ORDER BY subcategories.subcategory, sub_subcategories.sub_subcategory;";
					
		//Execute Queries	
			$ParentsAndChildren = $this->query($selectParentsAndChildren);
			$grandchildrenResults = $this->query($selectGrandchildren);
			
			//loop grandchildren
			foreach ($grandchildrenResults as $row) {
				
				$subcat_id = $row['sub_subcategories']['sub_subcat_id'];
				$child_slug = $row[0]['child_slug'];
				$grandchild_slug = $row[0]['grandchild_slug'];
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
				$parent_slug = $row[0]['parent_slug'];
				$child_slug = $row[0]['child_slug'];
				$child_category_id = $row['subcategories']['subcategory_id'];
				$child_category_name = $row['subcategories']['subcategory'];
				
				$myGrandchildren = (isset($AllGrandchildren[$child_slug]) ? $AllGrandchildren[$child_slug] : FALSE);
				
				$structuredArrayOfAllCategories[$parent_slug]['id'] = $parent_category_id;
				$structuredArrayOfAllCategories[$parent_slug]['name'] = $parent_category_name;
				$structuredArrayOfAllCategories[$parent_slug]['slug'] = $parent_slug;
				$structuredArrayOfAllCategories[$parent_slug]['image'] = $parent_category_image;
				$structuredArrayOfAllCategories[$parent_slug]['children'][$child_slug]['id'] = $child_category_id;
				$structuredArrayOfAllCategories[$parent_slug]['children'][$child_slug]['name'] = $child_category_name;
				$structuredArrayOfAllCategories[$parent_slug]['children'][$child_slug]['slug'] = $child_slug;
				$structuredArrayOfAllCategories[$parent_slug]['children'][$child_slug]['grandchildren'] = $myGrandchildren;
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