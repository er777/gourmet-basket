<?php
class Register extends AppModel {
	public $name = 'Register';
	var $useTable = false;
	
	function getVendors()
	{
		$var1 = "";
		$var1 .= "SELECT user_id, ";
		$var1 .= "       business_name ";
		$var1 .= "FROM   users t " ;
		$var1 .= "WHERE business_name != '' " ;
		$var1 .= "AND level = 'vendor' " ;
		foreach($this->query($var1) as $k)
		{
			$var = "/products/vendor/". str_replace(" ", '', strtolower($k['t']['business_name'])) ;
			$r[$var] = $k['t']['business_name'];
		}
		return $r;
	}
	
	function getProdCreation()
	{
		$var1 = "";
		$var1 .= "SELECT * ";
		$var1 .= "FROM `product_creation` AS pc " ;
		return $this->query($var1);
	}
	
	function getCulinaryTraditions()
	{
		$r = array();
		$var1 = "";
		$var1 .= "SELECT * ";
		$var1 .= "FROM `culinary_tradition` AS t  ORDER BY `tradition_id`" ;
		foreach($this->query($var1) as $k)
		{
			$r[$k['t']['tradition_id']] = $k['t']['name'];
		}
		return $r;
	}
	
	function getCountries()
	{
		$r = array();
		$var1 = "";
		$var1 .= "SELECT t.country_id, ";
		$var1 .= "       t.`name` ";
		$var1 .= "FROM   countries AS t ";
		$var1 .= "ORDER BY `country_id` " ;
		foreach($this->query($var1) as $k)
		{
			$r[$k['t']['country_id']] = $k['t']['name'];
		}
		return $r;
	}
	
	function getZones($country_id = 223 )
	{
		$r = array();
		$var1 = "";
		$var1 .= "SELECT t.zone_id, ";
		$var1 .= "       t.`name` ";
		$var1 .= "FROM   zone AS t ";
		$var1 .= "WHERE  t.country_id = '$country_id' ";
		$var1 .= "ORDER  BY t.zone_id ASC " ;
		foreach($this->query($var1) as $k)
		{
			$r[$k['t']['zone_id']] = $k['t']['name'];
		}
		return $r;
	}
	
	function getCategories()
	{
		$r = array();
		$var1 = "";
		$var1 .= "SELECT t.category_id, ";
		$var1 .= "       t.`category_name` ";
		$var1 .= "FROM   categories AS t ";
		//$var1 .= "WHERE  t.country_id = '$country_id' ";
		$var1 .= "ORDER  BY t.category_id ASC " ;
		foreach($this->query($var1) as $k)
		{
			$r[$k['t']['category_id']] = $k['t']['category_name'];
		}
		return $r;
	}
	
	function insertData($data)
	{
		$last_uid = 0;
		$insertUser = "INSERT users SET ";
		$comma = "";
		$sql = "<br>";
		//if(!empty($this->data))
		{     
		  
            if(!empty($data['temp']))
			{    $temp1 = "";
				foreach ($data['temp'] as $k => $v)
				{
					$temp1 .= $comma . $v;
                    $comma = ", ";
				}
                 $comma = "";
			}
            $data['users']['mycategories'] = $temp1;
            
			foreach ($data['users'] as $k => $v)
			{
				$insertUser .= $comma . " $k = '$v' ";
				$comma = ", ";
			}
			$r = $this->query($insertUser);
			$sql .= $insertUser ."<br>";
		}
		if($r==true)
		{
			$l_uid = $this->query('select user_id as id from users order by user_id desc limit 1');
			$last_uid = $l_uid[0]['users']['id'];
			
			$insertFinancial = "INSERT financial SET ";
			$insertFinancial .= "user_id = $last_uid ";
			foreach ($data['financial'] as $k => $v)
			{
				$insertFinancial .= ", $k = '$v' ";
			}
			//$this->query($insertFinancial);
			$sql .= $insertFinancial ."<br>";
			
			/*$insertProduct = "";
			if(!empty($data['products']))
			{
				foreach ($data['products'] as $k => $v)
				{
					$insertProduct = "INSERT products SET ";
					$insertProduct .= "user_id = $last_uid, checked = 1, category_id = '$v' ";
					$this->query($insertProduct); 
					$sql .= $insertProduct ."<br>";
				}
			}*/
			
			$insertShipping = "INSERT shipping SET ";
			$insertShipping .= "user_id = $last_uid ";
			foreach ($data['shipping'] as $k => $v)
			{
				$insertShipping .= ", $k = '$v' ";
			}
			//$this->query($insertShipping);  
			$sql .= $insertShipping ."<br>";
			//Jorge I added this - check please ER
			$insertTaxes = "INSERT taxes SET ";
			$insertTaxes .= "user_id = $last_uid ";
			foreach ($data['taxes'] as $k => $v)
			{
				$insertTaxes .= ", $k = '$v' ";
			}
			//$this->query($insertTaxes);  
			$sql .= $insertTaxes ."<br>";
			
			//Jorge I also added this - check please ER
			$insertUsersPromotion = "INSERT users_promotion SET ";
			$insertUsersPromotion .= "user_id = $last_uid ";
			foreach ($data['users_promotion'] as $k => $v)
			{
				$insertUsersPromotion .= ", $k = '$v' ";
			}
			//$this->query($insertUsersPromotion);  
			$sql .= $insertUsersPromotion ."<br>";
			
			
			
			
		}
		return $r;
	}
	
	function getCategories2()
	{
		$var1 = "";
		$var1 .= "SELECT * ";
		$var1 .= "FROM   `categories` AS c " ;
		return $this->query($var1);
	}
}
?>