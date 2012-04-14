<?php
class Checkout extends AppModel{
    public $name = 'Checkout';
    var $useTable = false;
    
    function getMemberAddress($data){   
        $info_member = $this->query("SELECT ma.*, c.name AS country, z.name AS state  FROM members m
                                    INNER JOIN members_address ma ON (m.address_id = ma.address_id) 
                                    INNER JOIN countries c ON (ma.country_id = c.country_id) 
                                    INNER JOIN zone z ON (ma.zone_id = z.zone_id)
                                    WHERE m.member_id = '".$data['member_id']."'");
        //WHERE m.member_id = 1");
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
        $info_member = $this->query("SELECT ma.*, c.name AS country, z.name AS state  FROM members m
                                    INNER JOIN members_address ma ON (m.address_id = ma.address_id)
                                    INNER JOIN countries c ON (ma.country_id = c.country_id)
                                    INNER JOIN zone z ON (ma.zone_id = z.zone_id)
                                    WHERE m.member_id = '".$data['member_id']."'");
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
}
?>