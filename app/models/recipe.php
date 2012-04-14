<?php
class Recipe extends AppModel{
    public $name = 'Product';
       
	
	function getCategories(){     
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM   `categories` AS c " ;
        return $this->query($var1);  
    }
	
	
}
?>