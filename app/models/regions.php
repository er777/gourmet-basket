<?php

class Regions extends AppModel {

	public $name = 'Regions';
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
   	function getRegions(){     
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM   `culinary_region` AS c ORDER BY `tradition_region`" ;
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