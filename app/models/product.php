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
	
	function getCategories(){     
        $var1 = "";
        $var1 .= "SELECT * ";
        $var1 .= "FROM   `categories` AS c " ;
        return $this->query($var1);  
    }
	
	
}
?>