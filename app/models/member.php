<?php
class Member extends AppModel{
public $name = 'Member';

    function validateLogin($data){
        if($data['username'] != "" && $data['password'] != ""){
            //echo '1111111------------'; echo $data['username']; echo $data['password'];
            //$member = $this->find(array('username' => $data['username'], 'password' => $data['password']), array('member_id'));
            $member = $this->query("SELECT * FROM members where username = '" . $data['username'] . "' and password = '" . $data['password'] . "' LIMIT 1");
            //$member = $this->query("SELECT member_id from members");
            //echo 'bestthisn-------'.$member[0]['members']['member_id'].'-----11112334567----<br>';
            if(empty($member) == false){
                /*
                foreach ($member as $key => $value) {
                    foreach ($value as $key2 => $value2) {
                        echo "Key2: $key2; Value2: " . $value2 ." <br />\n";
                        foreach ($value2 as $key3 => $value3) {
                            echo "Key3: $key3; Value3: " . $value3 ." <br />\n";
                        }
                    }
                }

                echo 'there si return'; */
                $member_id = $member[0]['members']['member_id'];
                return $member_id;
            }else{
                return false;
            }            
        }else{
            return false;
        }
    }
    
    function validateRegister($data){        
        $member = $this->find(array('email' => $data['email']), array('member_id'));
        if(empty($member) == false)
            return $member['Member'];
        return false;
    }
    
    function validateForgot($data){        
        $member = $this->find(array('email' => $data['email']), array('member_id', 'firstname', 'lastname', 'email', 'username', 'password'));
        if(empty($member) == false)
            return $member['Member'];
        return false;
    }
    
    function saveMember($data){                
        $this->query("INSERT INTO members (firstname, lastname, email, phone, fax, username, password, address_id, status, date_added) values ('".$data['firstname']."', '".$data['lastname']."', '".$data['email']."', '".$data['phone']."', '".$data['fax']."', '".$data['username']."', '".$data['password']."', '', '1', NOW())");
        
        $last_mid = $this->query("SELECT member_id FROM members ORDER BY member_id DESC LIMIT 1");
        
        $this->query("INSERT INTO members_address (member_id, firstname, lastname, address, postcode, city, country_id, zone_id) values ('".$last_mid[0]['members']['member_id']."', '".$data['firstname']."', '".$data['lastname']."', '".$data['adress']."', '".$data['postcode']."', '".$data['city']."', '".$data['country']."', '".$data['state']."')");
        
        $last_aid = $this->query("SELECT address_id FROM members_address ORDER BY address_id DESC LIMIT 1");
        
        $this->query("UPDATE members SET address_id = '".$last_aid[0]['members_address']['address_id']."' WHERE member_id = '".$last_mid[0]['members']['member_id']."'");
        
        return $last_mid[0]['members']['member_id'];
    }
    
    function saveAddress($data, $state){
        $this->query("INSERT INTO members_address (member_id, firstname, lastname, address, postcode, city, country_id, zone_id) values ('".$data['memberid']."', '".$data['firstname']."', '".$data['lastname']."', '".$data['adress']."', '".$data['postcode']."', '".$data['city']."', '".$data['country']."', '".$state."')");
        
        $last_aid = $this->query("SELECT address_id FROM members_address ORDER BY address_id DESC LIMIT 1");
        
        return $last_aid[0]['members_address']['address_id'];
    }
    
    function getHistory($cid){
        $var1 = "";
        $var1 .= "SELECT DISTINCT p.product_id, ";
        $var1 .= "                u.business_name, ";
        $var1 .= "                p.product_name, ";
        $var1 .= "                IF(p.image = '','default.png',p.image) as image, ";
        $var1 .= "                op.quantity, ";
        $var1 .= "                p.price, ";
        $var1 .= "                op.total, ";
        $var1 .= "                o.order_id, ";
        $var1 .= "                o.date_added ";
        $var1 .= "FROM   orders AS o ";
        $var1 .= "       INNER JOIN order_total AS ot ";
        $var1 .= "         ON ot.order_id = o.order_id ";
        $var1 .= "       INNER JOIN order_product AS op ";
        $var1 .= "         ON op.order_id = o.order_id ";
        $var1 .= "       INNER JOIN products AS p ";
        $var1 .= "         ON p.product_id = op.product_id ";
        $var1 .= "       INNER JOIN users AS u ";
        $var1 .= "         ON u.user_id = op.vendor_id ";
        $var1 .= "WHERE  o.customer_id = '$cid' ";
        $var1 .= "ORDER  BY o.order_id DESC " ;
        
        return  $this->query($var1);

    }
    
    function getMemberdata($mid){   
        $info_member = $this->query("SELECT firstname, lastname, email, phone, fax FROM members WHERE member_id = '".$mid."'"); 
        if(empty($info_member) == false){
            $member['firstname'] = $info_member[0]['members']['firstname'];
            $member['lastname'] = $info_member[0]['members']['lastname'];
            $member['email'] = $info_member[0]['members']['email'];
            $member['phone'] = $info_member[0]['members']['phone'];
            $member['fax'] = $info_member[0]['members']['fax'];
            return $member;
        }else{
            return false;
        }
    }
    
    function getAddressbyID($data){   
        $info_member = $this->query("SELECT ma.*, c.name AS country, z.name AS state  FROM members_address ma 
                                    INNER JOIN countries c ON (ma.country_id = c.country_id) 
                                    INNER JOIN zone z ON (ma.zone_id = z.zone_id) 
                                    WHERE ma.address_id = '".$data."'"); 
        if(empty($info_member) == false){
            $member['address_id'] = $info_member[0]['ma']['address_id'];
            $member['member_id'] = $info_member[0]['ma']['member_id'];
            $member['firstname'] = $info_member[0]['ma']['firstname'];
            $member['lastname'] = $info_member[0]['ma']['lastname'];
            $member['address'] = $info_member[0]['ma']['address'];
            $member['postcode'] = $info_member[0]['ma']['postcode'];
            $member['city'] = $info_member[0]['ma']['city'];
            $member['country'] = $info_member[0]['c']['country'];
            $member['state'] = $info_member[0]['z']['state'];
            return $member;
        }else{
            return false;
        }
    }
    
    function getAddressbyMember($data){   
        $info_member = $this->query("SELECT ma.*, c.name AS country, z.name AS state  FROM members_address ma
                                    INNER JOIN countries c ON (ma.country_id = c.country_id) 
                                    INNER JOIN zone z ON (ma.zone_id = z.zone_id) 
                                    WHERE ma.member_id = '".$data['member_id']."'"); 
        if(empty($info_member) == false){
            for($i=0; $i<count($info_member); $i++){
                $member[$i]['address_id'] = $info_member[$i]['ma']['address_id'];
                $member[$i]['member_id'] = $info_member[$i]['ma']['member_id'];
                $member[$i]['firstname'] = $info_member[$i]['ma']['firstname'];
                $member[$i]['lastname'] = $info_member[$i]['ma']['lastname'];
                $member[$i]['address'] = $info_member[$i]['ma']['address'];
                $member[$i]['postcode'] = $info_member[$i]['ma']['postcode'];
                $member[$i]['city'] = $info_member[$i]['ma']['city'];
                $member[$i]['country'] = $info_member[$i]['c']['country'];
                $member[$i]['state'] = $info_member[$i]['z']['state'];
            }
            return $member;
        }else{
            return false;
        }
    }
    
    function deleteAddress($aid){   
        $this->query("DELETE FROM members_address WHERE address_id = '".$aid."'"); 
    }
    
    function updateMemberdata($data, $mid){   
        $this->query("UPDATE members SET firstname = '".$data['firstname']."', lastname = '".$data['lastname']."', email = '".$data['email']."', phone = '".$data['phone']."', fax = '".$data['fax']."'  WHERE member_id = '".$mid."'"); 
    }
    
    function updateMemberpass($pass, $mid){   
        $this->query("UPDATE members SET password = '".$pass."'  WHERE member_id = '".$mid."'"); 
    }
    
    function country(){   
        $list_country = $this->query("SELECT country_id, name  FROM countries"); 
        if(empty($list_country) == false){
            for($i=0; $i<count($list_country); $i++){
                $countries[$list_country[$i]['countries']['country_id']] = $list_country[$i]['countries']['name'];
            }
            return $countries;
        }else{
            return false;
        } 
    }
    
    function state($data){   
        $list_zone = $this->query("SELECT zone_id, name  FROM zone WHERE country_id = '".$data."'"); 
        if(empty($list_zone) == false){
            for($i=0; $i<=count($list_zone); $i++){
                if($i == 0){
                    $zones['FALSE'] = ' --- Please Select --- ';
                }else{
                    $zones[$list_zone[$i-1]['zone']['zone_id']] = $list_zone[$i-1]['zone']['name'];
                }
            }
            return $zones;
        }else{
            return false;
        } 
    }
    
    function getOrdersby_member($member_id){
        $query = "SELECT DISTINCT
                	o.order_id,
                	o.order_status_id,
                	o.total,
                	o.date_added,
                	o.date_modified
                FROM
                	orders AS o
                WHERE
                	o.customer_id = '${member_id}'
                ORDER BY
                	o.order_id DESC";
        
       $orders = $this->query($query);

       if(!empty($orders)){
            $data = array();
            foreach($orders As $key => $value){
                $data[] = array(
                            'id' => $value['o']['order_id'],
                            'status' => $this->getStatusOrder($value['o']['order_id']),
                            'total' => $value['o']['total'],
                            'date_added' => $value['o']['date_added']
                        );
                
            }
        
            return $data;
       }
        
    }
    function getStatusOrder($status_id){
        $query = "SELECT name FROM order_status WHERE order_status_id = '{$status_id}'";
        $status_name = $this->query($query);
        
        if(!empty($status_name)){
            foreach($status_name AS $key => $value){
                return $value['order_status']['name'];
            }
        }
        
    }
    
    function getProductByOrder($order_id){
        $query = "SELECT
                    	busin.business_name,
                    	ord_st.`name`,
                    	ordr.product_id,
                    	prod.product_name,
                    	prod.price,
                    	ordr.quantity
                    FROM
                    	order_product AS ordr
                    INNER JOIN users AS busin ON ordr.vendor_id = busin.user_id
                    INNER JOIN products AS prod ON ordr.product_id = prod.product_id
                    INNER JOIN order_status AS ord_st ON ordr.order_status_id = ord_st.order_status_id
                    WHERE
                    	ordr.order_id = '${order_id}'
                    ORDER BY
                    	busin.business_name ASC";
        
        $products = $this->query($query);
        
        if(!empty($products)){
            $_order_member = array(); $i = 0;
            
            foreach($products AS $key => $value){
                $_order_member[] = array(
                                'o_product_id' => $value['ordr']['product_id'],
                                'o_status' => $value['ord_st']['name'], 
                                'o_shop_name' => $value['busin']['business_name'],  
                                'o_name' => $value['prod']['product_name'],
                                'o_unit_price' => $value['prod']['price'],
                                'o_quantity' => $value['ordr']['quantity']
                        );
                        
            }
            
            return $_order_member;
        }else{
            return -1;
        }
        
  } 
  
  function getHistoryOrder($order_id){
    $query = "SELECT
                	ord_his.product_id,
                	ord_his.order_id,
                	ord_his.`comment`,
                	ord_his.date_added,
                	ord_st.`name`
                FROM
                	order_history AS ord_his
                INNER JOIN order_status AS ord_st ON ord_his.order_status_id = ord_st.order_status_id
                WHERE
                	order_id = '31'";
    
    $history = $this->query($query);
    if(!empty($history)){
        $data = array();
        $num_Pending = 0; $num_Processing = 0; $num_Shipped = 0; $num_Canceled = 0; 
        $num_Complete = 0; $num_Denied = 0; $num_CanceledRev = 0; $num_Failed = 0;
        $num_Refunded = 0; $num_Reversed = 0; $num_Chargeback = 0;
        
        foreach($history AS $key => $item){
            switch($item['ord_st']['name']){
                case "Pending":     $data['status']['num_pending'] =  array((++$num_Pending));          break;
                case "Processing":  $data['status']['num_processing'] =  array((++$num_Processing));    break;
                case "Shipped":     $data['status']['num_shipped'] =  array((++$num_Shipped));          break;
                case "Canceled":    $data['status']['num_canceled'] =  array((++$num_Canceled));        break;
                case "Complete":    $data['status']['num_complete'] =  array((++$num_Complete));        break;
                case "Denied":      $data['status']['num_denied'] =  array((++$num_Denied));            break;
                case "Canceled Reversal":$data['status']['num_canceledRev'] =  array((++$num_CanceledRev));break;
                case "Failed":      $data['status']['num_failed'] =  array((++$num_Failed));            break;
                case "Refunded":    $data['status']['num_refunded'] =  array((++$num_Refunded));        break;
                case "Reversed":    $data['status']['num_reversed'] =  array((++$num_Reversed));        break;
                case "Chargeback":  $data['status']['num_chargeback'] =  array((++$num_Chargeback));    break;
                
            }
        }
        
        return $data;
    }
    
        return -1;
  }
}
?>
