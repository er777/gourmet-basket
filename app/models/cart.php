<?php
class Cart extends AppModel{
    public $name = 'Cart';
    var $hasMany = array('CartItems' =>
    array('className' => 'CartItem',
        'dependent' => true
    )
    );
    var $useTable = false;
    
    function getAddressbyVendor($data){   
        $q = "SELECT u.*, c.iso_code_2 AS country, z.code AS state  FROM users u
                                    INNER JOIN countries c ON (u.country_id = c.country_id) 
                                    INNER JOIN zone z ON (u.zone_id = z.zone_id) 
                                    WHERE u.user_id = '".$data."'";
        $info_vendor = $this->query($q); 
        if(empty($info_vendor) == false){
            for($i=0; $i<count($info_vendor); $i++){
                //$vendor[$i]['address_id'] = $info_vendor[$i]['u']['address_id'];
                $vendor[$i]['vendor_id'] = $info_vendor[$i]['u']['user_id'];
                $vendor[$i]['firstname'] = $info_vendor[$i]['u']['business_name'];
                //$vendor[$i]['lastname'] = $info_vendor[$i]['u']['lastname'];
                $vendor[$i]['address'] = $info_vendor[$i]['u']['street_address'];
                $vendor[$i]['postcode'] = $info_vendor[$i]['u']['zip'];
                $vendor[$i]['city'] = $info_vendor[$i]['u']['city'];
                $vendor[$i]['country'] = $info_vendor[$i]['c']['country'];
                $vendor[$i]['state'] = $info_vendor[$i]['z']['state'];
                $vendor[$i]['zone_id'] = $info_vendor[$i]['u']['zone_id'];
            }
            return $vendor;
        }else{
            return false;
        }
    }
    
    function getMemberAddress($data){   
        $info_member = $this->query("SELECT ma.*, c.iso_code_2 AS country, z.code AS state  FROM members m
                                    INNER JOIN members_address ma ON (m.address_id = ma.address_id) 
                                    INNER JOIN countries c ON (ma.country_id = c.country_id) 
                                    INNER JOIN zone z ON (ma.zone_id = z.zone_id) 
                                    WHERE m.member_id = '".$data['member_id']."'"); 
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
            $member['zone_id'] = $info_member[0]['ma']['zone_id'];
            return $member;
        }else{
            return false;
        }
    }
    
    function getTax($z_id){   
        $i = $this->query("SELECT t.description, t.rate FROM tax_rate AS t
                            WHERE t.zone_id = '". $z_id ."' limit 1 ");
        if(empty($i) == false){
            $tax['description']  = $i[0]['t']['description'];
            $tax['rate']         = $i[0]['t']['rate'];
            return $tax;
        }else{
            return false;
        }
    }
    
    function getAddressbyMember($data){   
        $info_member = $this->query("SELECT ma.*, c.iso_code_2 AS country, z.code AS state FROM members_address ma
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
    
    function getAddressbyID($data){   
        $info_member = $this->query("SELECT ma.*, c.iso_code_2 AS country, z.code AS state FROM members_address ma 
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
            $member['zone_id'] = $info_member[0]['ma']['zone_id'];
            return $member;
        }else{
            return false;
        }
    }

    function shipping_details($vendor_id){
        $i = $this->query("SELECT u.flat_shipping, u.flat_price FROM users as u
                            WHERE u.user_id = '". $vendor_id ."' limit 1 ");
        if(empty($i) == false){
            $shipping['flat_shipping']  = $i[0]['u']['flat_shipping'];
            $shipping['flat_price']         = $i[0]['u']['flat_price'];
            return $shipping;
        }else{
            return false;
        }
    }

}
?>