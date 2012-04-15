<?php

class Vendor extends AppModel {

	public $name = 'Vendor';
    var $useTable = false;
	
	function getVendors(){     
        $var1 = "";
        $var1 .= "SELECT user_id, ";
		
        $var1 .= "       business_name ";
        $var1 .= "FROM   users t " ;
        $var1 .= "WHERE business_name != '' " ;
        $var1 .= "AND level = 'vendor' " ;
        $var1 .= "order by business_name" ;
        foreach($this->query($var1) as $k){
            //$var = "/products/vendor.".str_replace(" ",'',strtolower($k['t']['business_name']));
            $var = "/products/vendor/". str_replace(" ", '', strtolower($k['t']['business_name'])) ;
            $r[$var] = $k['t']['business_name'];
        }
        return $r;
    }
   	function getCategories(){
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM  `categories` AS c ORDER BY `category_name`" ;


        return $this->query($var1);
    }
	
	/**
	  *  	[Array] @ getAllCategoryChildren
	  * 	Description:
	  *		Pull as much of a category tree as possible.
	  *	Returns: Array
	  *		 Array of category titles organized by parent=>child relationships.
	  * 	Args:    NONE.
	  */
	function getAllCategoryChildren () {
		$structuredArrayOfAllCategories = array();
		$selectParentsAndChildren =    "SELECT  categories.category_id as category_id,
							subcategories.subcategory_id as subcategory_id,
							categories.category_name,
							categories.category_image,
							categories.category_article,
							subcategories.subcategory,
							REPLACE(LOWER(REPLACE(LOWER(categories.category_name), '/', '-')), ' ', '-') AS parent_slug,
							REPLACE(LOWER(REPLACE(LOWER(subcategories.subcategory), '/', '-')), ' ', '-') AS child_slug
						FROM categories  
						LEFT JOIN subcategories 
						ON subcategories.category_id = categories.category_id
						ORDER BY category_name, subcategories.subcategory;";
						
		$selectGrandchildren = "SELECT 	sub_subcategories.sub_subcat_id,
						subcategories.subcategory_id,
						subcategories.subcategory,
						sub_subcategories.sub_subcategory,
						REPLACE(LOWER(REPLACE(LOWER(subcategories.subcategory), '/', '-')), ' ', '-') AS child_slug,
						REPLACE(LOWER(REPLACE(LOWER(sub_subcategories.sub_subcategory), '/', '-')), ' ', '-') AS grandchild_slug
					FROM subcategories  
					INNER JOIN sub_subcategories 
					ON subcategories.subcategory_id = sub_subcategories.subcategory_id
					ORDER BY subcategories.subcategory, sub_subcategories.sub_subcategory;";
					
			$ParentsAndChildren = $this->query($selectParentsAndChildren);
			/*print '<pre style="background-color:#fff">';
			print_r($ParentsAndChildren);
			print' </pre>';*/
			$grandchildrenResults = $this->query($selectGrandchildren);
			$AllGrandchildren = array();
			foreach ($grandchildrenResults as $row) {
				$subcat_id = $row['subcategories']['subcategory_id'];
				$AllGrandchildren[$subcat_id][] = array('name' => $row['sub_subcategories']['sub_subcategory'],
									'id' => $row['sub_subcategories']['sub_subcat_id'],
									'grandchild_slug' => $row[0]['grandchild_slug'],
									);
			}
			foreach ($ParentsAndChildren as $row) {
				$parent_category_name = $row['categories']['category_name'];
				$parent_category_id = $row['categories']['category_id'];
				$parent_category_image = $row['categories']['category_image'];
				$parent_category_article = $row['categories']['category_article'];
				
				$child_category_id = $row['subcategories']['subcategory_id'];
				$child_category_name = $row['subcategories']['subcategory'];
				$child_category_name = $row['subcategories']['subcategory'];
				$child_slug = $row[0]['child_slug'];
				$parent_slug = $row[0]['parent_slug'];
				$myGrandchildren = (isset($AllGrandchildren[$child_category_id]) ? $AllGrandchildren[$child_category_id] : FALSE);
				
				$structuredArrayOfAllCategories[$parent_category_id]['category_id'] = $parent_category_id;
				$structuredArrayOfAllCategories[$parent_category_id]['category_name'] = $parent_category_name;
				$structuredArrayOfAllCategories[$parent_category_id]['category_image'] = $parent_category_image;
				$structuredArrayOfAllCategories[$parent_category_id]['category_article'] = $parent_category_article;
				// Properly structured array of nested children, complete with ID's needed to make URL's.
				$structuredArrayOfAllCategories[$parent_category_id]['children'][] = array('name' => $child_category_name,
													     'subcategory_id' => $child_category_id,
													     'grandchildren' => $myGrandchildren,
													     'parent_slug' => $parent_slug,
													     'child_slug' => $child_slug,
													     );
			
		}
        return $structuredArrayOfAllCategories;
    }
	
	
	
	
    function getsubCategories($category_id){
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM  `subcategories` AS sc where category_id = '" . $category_id ."' ORDER BY `subcategory`" ;
        //echo $var1; exit;
        return $this->query($var1);
    }
    function getsubsubCategories($subcategory_id){
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM  `sub_subcategories` AS ssc where subcategory_id = '" . $subcategory_id ."' ORDER BY `sub_subcategory`" ;
        //echo $var1; exit;
        return $this->query($var1);
    }
    function getsubCategoriesProducts($subcategory_id){
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM  `products` AS Product where subcategory_id = '" . $subcategory_id ."' ORDER BY `product_id`" ;
        //echo $var1; exit;
        return $this->query($var1);
    }

    function getSubSubCategoriesProducts($subsubcategory_id){
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM  `products` AS Product where sub_subcat_id = '" . $subsubcategory_id ."' ORDER BY `product_id`" ;
        //echo $var1; exit;
        return $this->query($var1);
    }

   	function getProdCreation(){     
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM `product_creation` AS pc " ;
        return $this->query($var1);  
    }
    
    function getCulinaryTraditions(){     
        $r = array();
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM `culinary_tradition` AS t  ORDER BY `tradition_id`" ;
        foreach($this->query($var1) as $k){
            $r[$k['t']['tradition_id']] = $k['t']['name'];
        }
        return $r;
    }
    
    function getCountries(){     
        $r = array();
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM `countries` AS t  ORDER BY `country_id` " ;
        foreach($this->query($var1) as $k){
            $r[$k['t']['country_id']] = $k['t']['name'];
        }
        return $r; 
    }

}

?>