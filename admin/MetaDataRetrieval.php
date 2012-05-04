<?php
/**
 * @file - TUTORIAL
 * This document will demonstrate the meta data (aka: product_settings) system for the products on gourmet-basket.
 * and give examples on how it may be itneracted with.
 */

 
// In the shopping cart you should receive $_POST['product_id'], and $_POST['mod_[LABEL_OF_MOD_HERE]']
// Loop through your $_POST and pull the mods in by searching for keys beginning with "mod_"
/*
foreach ($_POST as $k=>$v) {
	if(preg_match("/^mod_/",$k)){
		$list_of_mod_skus[] = "'" . $v . "'"; // <-- wrap in apostrophe for SQL later .
	}
}
if(!isset($list_of_mod_skus)){
	// assume there were no mods created for this product
}else{
	// pull the data for the mods.
	$sql_safe_list_of_mods = join(",",$list_of_mods);
	$sql = "SELECT * FROM product_mods WHERE product_id = '".$id."' AND mod_sku IN (" . $sql_safe_list_of_mods . ");"; 
	$result = mysql_query($sql);
	while ($productMetaData = mysql_fetch_assoc($result)){
			$unserialized_meta_data = unserialize($productMetaData['serialized_mod_data']);
			
			// This loop will contain all the mods for this product.
			foreach ($unserialized_meta_data as $label => $OneOfPossiblyMultipleMods){
					
					echo $OneOfPossiblyMultipleMods['label']; 							// Color
					echo $OneOfPossiblyMultipleMods['name'];  							// Green
					echo $OneOfPossiblyMultipleMods['direction'];  					// +
					echo $OneOfPossiblyMultipleMods['retail_deviation'];  	// 2.10
					echo $OneOfPossiblyMultipleMods['wholesale_deviation']; // 1.10
					echo "<br/>";
			}
	}
}
*/

/**
 * HOW TO STORE THIS DATA in the orders table.
 * I dunno, on this one. I will leave this up to you, Let mme know if you wanna talk it out.
 * Im here if you need me.
 */



