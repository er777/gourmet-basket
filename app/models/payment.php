<?php
/**
 * Payment
 * 
 * @package 
 * @author Carlos
 * @copyright 2011
 * @version $Id$
 * @access public
 */
class Payment extends AppModel {
	public $name = 'Payment';
    var $_schema = array(
		       'cc_owner' => array(
						 'type' => 'string',
						 'length' => 127),
		       'cc_type' => array(
							    'type' => 'string',
							    'length' => 10),
		       'cc_number' => array(
							      'type' => 'string',
							      'length' => 16),
		       'cc_expire_date_month' => array(
						      'type' => 'string',
						      'length' => 2),
		       'cc_expire_date_year' => array(
						     'type' => 'string',
						     'length' => 4),
		       'cc_cvv2' => array(
						 'type' => 'string',
						 'length' => 4)
		       );
    var $validate=array(
            'cc_owner' => array('rule'=>array('email',true),'message'=>'Please enter a valid email'),
		    'cc_type'=>array('rule'=>array('inList',array('Visa','MasterCard','Amex','Discover'))),
            'cc_number'=>array('rule'=>'/^[0-9]{3,4}/','message'=>'Please enter a valid CVV'),
		    'cc_expire_date_month'=>array('rule'=>array('date','mm'),'message'=>'Please enter a valid expiration month'),
		    'cc_expire_date_year'=>array('rule'=>array('date','yyyy'),'message'=>'Please enter a validate expiration year'),
            'cc_cvv2'=>array('rule'=>'/^[0-9]{3,4}/','message'=>'Please enter a valid CVV')
		     );
	var $useTable = false;
	
	function getCostumerData($mid){
		$var1 = "SELECT z.`name`,
                c.iso_code_2,
                c.iso_code_3,
                a.address,
                a.postcode,
                a.city,
                m.member_id,
                m.firstname,
                m.lastname,
                m.email,
                m.phone 
                FROM members AS m
                INNER JOIN members_address AS a ON m.address_id = a.address_id
                INNER JOIN zone AS z ON a.zone_id = z.zone_id
                INNER JOIN countries AS c ON c.country_id = z.country_id
                WHERE
                m.member_id = '$mid'";
        return array_shift($this->query($var1));		
	}
    
    function saveOrderData($member, $memberadd1, $memberadd2, $cart, $carttot, $ip_customer,$cc_type){              
        $var1 = $this->query("SELECT 
                firstname,
                lastname,
                email,
                phone 
                FROM members
                WHERE member_id = '".$member."'");
        
        $var2 = $this->query("SELECT 
                firstname,
                lastname,
                address,
                postcode,
                city, 
                country_id,
                zone_id 
                FROM members_address
                WHERE address_id = '".$memberadd1."'");
        
        $var3 = $this->query("SELECT 
                firstname,
                lastname,
                address,
                postcode,
                city, 
                country_id,
                zone_id 
                FROM members_address
                WHERE address_id = '".$memberadd2."'");
        
        $ship_met = $carttot['shipping_method']==1?"FEDEX":"UPS";
		$this->query("INSERT INTO orders ( 
                customer_id, 
                firstname, 
                lastname, 
                telephone, 
                email, 
                shipping_firstname, 
                shipping_lastname, 
                shipping_address,
                shipping_city,
                shipping_postcode,
                shipping_zone_id,
                shipping_country_id,
                shipping_method,
                payment_firstname,
                payment_lastname,
                payment_address,
                payment_city,
                payment_postcode,
                payment_zone_id,
                payment_country_id,
                payment_method,
                comment,
                total,
                order_status_id,
                date_modified,
                date_added,
                ip
                ) 
                VALUES
                (
                '".$member."',
                '".$var1[0]['members']['firstname']."',
                '".$var1[0]['members']['lastname']."',
                '".$var1[0]['members']['phone']."',
                '".$var1[0]['members']['email']."',
                '".$var2[0]['members_address']['firstname']."',
                '".$var2[0]['members_address']['lastname']."',
                '".$var2[0]['members_address']['address']."',
                '".$var2[0]['members_address']['city']."',
                '".$var2[0]['members_address']['postcode']."',
                '".$var2[0]['members_address']['zone_id']."',
                '".$var2[0]['members_address']['country_id']."',
                '$ship_met',
                '".$var3[0]['members_address']['firstname']."',
                '".$var3[0]['members_address']['lastname']."',
                '".$var3[0]['members_address']['address']."',
                '".$var3[0]['members_address']['city']."',
                '".$var3[0]['members_address']['postcode']."',
                '".$var3[0]['members_address']['zone_id']."',
                '".$var3[0]['members_address']['country_id']."',
                '$cc_type',
                'none',
                '".$carttot['total']."',
                '1',
                NOW(),
                NOW(),
                '".$ip_customer."'
                )");
        
        $last_oid = $this->query("SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1");
        $this->query("INSERT INTO order_total ( 
                order_id, 
                subtotal, 
                tax,  
                shipping, 
                total
                ) 
                VALUES
                (
                '".$last_oid[0]['orders']['order_id']."',
                '".$carttot['subtotal']."',
                '".$carttot['tax']."',
                '".$carttot['shipping']."',
                '".$carttot['total']."'
                )");
        
                
        foreach($cart as $k => $v){
            $this->query("INSERT INTO order_product ( 
                order_id, 
                product_id, 
                vendor_id,
                order_status_id, 
                name,  
                price, 
                total, 
                shipping, 
                tax,
                quantity
                ) 
                VALUES
                (
                '".$last_oid[0]['orders']['order_id']."',
                '".$k."',
                '".$v['vendor_id']."',
                '1',
                '".$v['product_name']."',                
                '".$v['price']."',
                '".$v['tot']."',
                '".$carttot['shipping']."',
                '".$carttot['tax']."',
                '".$v['qty']."'
                )");
            $this->query("
            UPDATE `products` SET `stock`=`stock`-1 WHERE (`product_id`='$k')
                         ");
            
            $this->query("INSERT INTO order_history ( 
                product_id, 
                order_id, 
                order_status_id,  
                notify, 
                comment,
                date_added
                ) 
                VALUES
                (
                '".$k."',
                '".$last_oid[0]['orders']['order_id']."',
                '1',
                '1',
                '',
                NOW()
                )");
        
        }
                
        
        return $last_oid[0]['orders']['order_id'];		
	}
    
    function getOrderAdminData($order){
    $row1 = $this->query("SELECT o.*, os.name AS status, 
                            sz.`name` AS ship_zone, sz.`code` AS ship_zone_code,
                            sc.`name` AS ship_country,
                            pz.`name` AS pay_zone, pz.`code` AS pay_zone_code,
                            pc.`name` AS pay_country FROM orders o
                            LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
                            LEFT JOIN zone sz ON (o.shipping_zone_id = sz.zone_id)
                            LEFT JOIN countries sc ON (o.shipping_country_id = sc.country_id)
                            LEFT JOIN zone pz ON (o.payment_zone_id = pz.zone_id)
                            LEFT JOIN countries pc ON (o.payment_country_id = pc.country_id)
                            WHERE o.order_id = " . $order);
                if(empty($row1) == false){
                    $order_info['order_id'] = $row1[0]['o']["order_id"];
                    $order_info['customer_id'] = $row1[0]['o']["customer_id"];
                    $order_info['customer'] = $row1[0]['o']["firstname"]." ".$row1[0]['o']["lastname"];
                    $order_info['phone'] = $row1[0]['o']["telephone"];
                    $order_info['fax'] = $row1[0]['o']["fax"];
                    $order_info['email'] = $row1[0]['o']["email"];
                    $order_info['ship_firstname'] = $row1[0]['o']["shipping_firstname"];
                    $order_info['ship_lastname'] = $row1[0]['o']["shipping_lastname"];
                    $order_info['ship_address'] = $row1[0]['o']["shipping_address"];
                    $order_info['ship_city'] = $row1[0]['o']["shipping_city"];
                    $order_info['ship_postcode'] = $row1[0]['o']["shipping_postcode"];
                    $order_info['ship_zone'] = $row1[0]['sz']["ship_zone"];
                    $order_info['ship_zone_code'] = $row1[0]['sz']["ship_zone_code"];
                    $order_info['ship_country'] = $row1[0]['sc']["ship_country"];
                    $order_info['ship_method'] = $row1[0]['o']["shipping_method"];
                    $order_info['pay_firstname'] = $row1[0]['o']["payment_firstname"];
                    $order_info['pay_lastname'] = $row1[0]['o']["payment_lastname"];
                    $order_info['pay_address'] = $row1[0]['o']["payment_address"];
                    $order_info['pay_city'] = $row1[0]['o']["payment_city"];
                    $order_info['pay_postcode'] = $row1[0]['o']["payment_postcode"];
                    $order_info['pay_zone'] = $row1[0]['pz']["pay_zone"];
                    $order_info['pay_zone_code'] = $row1[0]['pz']["pay_zone_code"];
                    $order_info['pay_country'] = $row1[0]['pc']["pay_country"];
                    $order_info['pay_method'] = $row1[0]['o']["payment_method"];
                    $order_info['comment'] = $row1[0]['o']["comment"]!="none"?$row1[0]['o']["comment"]:"";
                    $order_info['total'] = $row1[0]['o']["total"];
                    $order_info['status'] = $row1[0]['os']["status"];
                    $order_info['date_modified'] = $row1[0]['o']["date_modified"];
                    $order_info['date_added'] = $row1[0]['o']["date_added"];
                    $order_info['ip'] = $row1[0]['o']["ip"];
                } 
                
                $row2 = $this->query("SELECT op.*, v.user_name AS vendor, v.business_name AS shop_vendor FROM order_product op
                            LEFT JOIN users v ON (op.vendor_id = v.user_id)
                            WHERE op.order_id = " . $order . " ORDER BY op.vendor_id ASC");
                $cont = 0;
                $ven_id = "";
                if(empty($row2) == false){
                    for($i=0; $i<count($row2); $i++){
                        if($ven_id == $row2[$i]['op']["vendor_id"]){
                            $cont = $cont + 1;
                        }else{
                            $cont = 0;
                        }
                        
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['vendor'] = $row2[$i]['v']["vendor"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['shop_vendor'] = $row2[$i]['v']["shop_vendor"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['order_prod_id'] = $row2[$i]['op']["order_product_id"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['prod_id'] = $row2[$i]['op']["product_id"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['prod_name'] = $row2[$i]['op']["name"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['price'] = $row2[$i]['op']["price"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['total'] = $row2[$i]['op']["total"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['quantity'] = $row2[$i]['op']["quantity"];
                                            
                        $ven_id = $row2[$i]['op']["vendor_id"];
                    }
                } 
                
                $row3 = $this->query("SELECT * FROM order_total WHERE order_id = " . $order);
                if(empty($row3) == false){

                    $order_info['subtotal_o'] = $row3[0]['order_total']["subtotal"];
                    $order_info['tax_o'] = $row3[0]['order_total']["tax"];
                    $order_info['shipping_o'] = $row3[0]['order_total']["shipping"];
                    $order_info['total_o'] = $row3[0]['order_total']["total"];                                        
                    
                }
                
                return $order_info;
    }
    
    
    function getOrderVendorData($order, $vend_id){
    $row1 = $this->query("SELECT o.*, os.name AS status, 
                            sz.`name` AS ship_zone, sz.`code` AS ship_zone_code,
                            sc.`name` AS ship_country,
                            pz.`name` AS pay_zone, pz.`code` AS pay_zone_code,
                            pc.`name` AS pay_country, 
                            op.product_id, SUM(op.total) AS total_vendor FROM orders o
                            LEFT JOIN order_status os ON (o.order_status_id = os.order_status_id)
                            LEFT JOIN zone sz ON (o.shipping_zone_id = sz.zone_id)
                            LEFT JOIN countries sc ON (o.shipping_country_id = sc.country_id)
                            LEFT JOIN zone pz ON (o.payment_zone_id = pz.zone_id)
                            LEFT JOIN countries pc ON (o.payment_country_id = pc.country_id)
                            LEFT JOIN order_product op ON (o.order_id = op.order_id)
                            LEFT JOIN users v ON (op.vendor_id = v.user_id)
                            WHERE o.order_id = '" . $order . "' AND op.vendor_id ='".$vend_id."'");
                if(empty($row1) == false){
                    $order_info['order_id'] = $row1[0]['o']["order_id"];
                    $order_info['customer_id'] = $row1[0]['o']["customer_id"];
                    $order_info['customer'] = $row1[0]['o']["firstname"]." ".$row1[0]['o']["lastname"];
                    $order_info['phone'] = $row1[0]['o']["telephone"];
                    $order_info['fax'] = $row1[0]['o']["fax"];
                    $order_info['email'] = $row1[0]['o']["email"];
                    $order_info['ship_firstname'] = $row1[0]['o']["shipping_firstname"];
                    $order_info['ship_lastname'] = $row1[0]['o']["shipping_lastname"];
                    $order_info['ship_address'] = $row1[0]['o']["shipping_address"];
                    $order_info['ship_city'] = $row1[0]['o']["shipping_city"];
                    $order_info['ship_postcode'] = $row1[0]['o']["shipping_postcode"];
                    $order_info['ship_zone'] = $row1[0]['sz']["ship_zone"];
                    $order_info['ship_zone_code'] = $row1[0]['sz']["ship_zone_code"];
                    $order_info['ship_country'] = $row1[0]['sc']["ship_country"];
                    $order_info['ship_method'] = $row1[0]['o']["shipping_method"];
                    $order_info['pay_firstname'] = $row1[0]['o']["payment_firstname"];
                    $order_info['pay_lastname'] = $row1[0]['o']["payment_lastname"];
                    $order_info['pay_address'] = $row1[0]['o']["payment_address"];
                    $order_info['pay_city'] = $row1[0]['o']["payment_city"];
                    $order_info['pay_postcode'] = $row1[0]['o']["payment_postcode"];
                    $order_info['pay_zone'] = $row1[0]['pz']["pay_zone"];
                    $order_info['pay_zone_code'] = $row1[0]['pz']["pay_zone_code"];
                    $order_info['pay_country'] = $row1[0]['pc']["pay_country"];
                    $order_info['pay_method'] = $row1[0]['o']["payment_method"];
                    $order_info['comment'] = $row1[0]['o']["comment"]!="none"?$row1[0]['o']["comment"]:"";
                    $order_info['total'] = $row1[0]['o']["total"];
                    $order_info['status'] = $row1[0]['os']["status"];
                    $order_info['date_modified'] = $row1[0]['o']["date_modified"];
                    $order_info['date_added'] = $row1[0]['o']["date_added"];
                    $order_info['ip'] = $row1[0]['o']["ip"];
                } 
                
                $row2 = $this->query("SELECT op.*, v.user_name AS vendor, v.business_name AS shop_vendor FROM order_product op
                            LEFT JOIN users v ON (op.vendor_id = v.user_id)
                            WHERE op.order_id = " . $order . "  AND op.vendor_id ='".$vend_id."' ORDER BY op.vendor_id ASC");
                $cont = 0;
                $ven_id = "";
                if(empty($row2) == false){
                    for($i=0; $i<count($row2); $i++){
                        if($ven_id == $row2[$i]['op']["vendor_id"]){
                            $cont = $cont + 1;
                        }else{
                            $cont = 0;
                        }
                        
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['vendor'] = $row2[$i]['v']["vendor"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['shop_vendor'] = $row2[$i]['v']["shop_vendor"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['order_prod_id'] = $row2[$i]['op']["order_product_id"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['prod_id'] = $row2[$i]['op']["product_id"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['prod_name'] = $row2[$i]['op']["name"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['price'] = $row2[$i]['op']["price"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['total'] = $row2[$i]['op']["total"];
                        $order_info['products'][$row2[$i]['op']["vendor_id"]]['reg'][$cont]['quantity'] = $row2[$i]['op']["quantity"];
                                            
                        $ven_id = $row2[$i]['op']["vendor_id"];
                    }
                } 
                
                $row3 = $this->query("SELECT * FROM order_total WHERE order_id = " . $order);
                if(empty($row3) == false){

                    $order_info['subtotal_o'] = $row3[0]['order_total']["subtotal"];
                    $order_info['tax_o'] = $row3[0]['order_total']["tax"];
                    $order_info['shipping_o'] = $row3[0]['order_total']["shipping"];
                    $order_info['total_o'] = $row3[0]['order_total']["total"];                                        
                    
                }
                
                return $order_info;
    }
    
     function getEmailAdminData(){

                $row = $this->query("SELECT email FROM users WHERE user_id = '1'");
                if(empty($row) == false){
                    $email = $row[0]['users']["email"];                
                }
                
                return $email;
    }
    
    function getEmailVendorData($vid){

                $row = $this->query("SELECT email FROM users WHERE user_id = " . $vid);
                if(empty($row) == false){
                    $email = $row[0]['users']["email"];                
                }
                
                return $email;
    }
    	
}
?>