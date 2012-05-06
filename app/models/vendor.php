<?php

class Vendor extends AppModel {

	public $name = 'Vendor';
    var $useTable = false;
	var $actsAs = array(
	'Sluggable' => array(
		'title_field' => 'title',
		'slug_field' => 'slug',
		'slug_max_length' => 100
		)
	);
	
	function getVendors(){     
        $var1 = "";
        $var1 .= "SELECT user_id, ";
		
        $var1 .= "business_name, short_name, shop_name ";
        $var1 .= "FROM   users t " ;
        $var1 .= "WHERE business_name != '' " ;
        $var1 .= "AND level = 'vendor' " ;
        $var1 .= "order by business_name" ;
				$current_domain_with_no_subdomain = substr($_SERVER['HTTP_HOST'], strpos($_SERVER['HTTP_HOST'],"."), strlen($_SERVER['HTTP_HOST']));
				
        foreach($this->query($var1) as $k){
            $var = "//" . $k['t']['short_name'] . $current_domain_with_no_subdomain ; // vendorShortName.gourmet-basket.[local/com]
            $r[$var] = $k['t']['business_name'];
        }
        return $r;
    }
		
		/*
   	function getCategories(){
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM  `categories` AS c ORDER BY `category_name`" ;


        return $this->query($var1);
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
*/    
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
