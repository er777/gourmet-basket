<?php 
class OrderSecure extends AppModel {
	
  var $_schema = array(
		       'customer_first_name' => array(
						      'type' => 'string',
						      'length' => 25),
		       'customer_last_name' => array(
						     'type' => 'string',
						     'length' => 25),
		       'customer_email' => array(
						 'type' => 'string',
						 'length' => 127),
		       'customer_credit_card_type' => array(
							    'type' => 'string',
							    'length' => 10),
		       'customer_credit_card_number' => array(
							      'type' => 'string',
							      'length' => 16),
		       'cc_expiration_month' => array(
						      'type' => 'string',
						      'length' => 2),
		       'cc_expiration_year' => array(
						     'type' => 'string',
						     'length' => 4),
		       'cc_cvv2_number' => array(
						 'type' => 'string',
						 'length' => 4),
		       'customer_address1' => array(
						    'type' => 'string',
						    'lengh' => 100),
		       'customer_address2' => array(
						    'type' => 'string',
						    'length' => 100),
		       'customer_city' => array(
						'type' => 'string',
						'length' =>40),
		       'customer_state' => array(
						 'type' => 'string',
						 'length' => 40),
		       'customer_country' => array(
						   'type' => 'string',
						   'length' => 2),
		       'customer_zip' => array(
					       'type' => 'string',
					       'length' => 20),
		       'payment_amount' => array(
						 'type' => 'string',
						 'length' => 9),
		       'customer_phone' => array(
						 'type' => 'string',
						 'length' => 20)
		       );
var $validate=array(
            'customer_email' => array('rule'=>array('email',true),'message'=>'Please enter a valid email'),
		    'customer_credit_card_type'=>array('rule'=>array('inList',array('Visa','MasterCard','Amex','Discover'))),
		    'cc_expiration_month'=>array('rule'=>array('date','mm'),'message'=>'Please enter a valid expiration month'),
		    'cc_expiration_year'=>array('rule'=>array('date','yyyy'),'message'=>'Please enter a validate expiration year'),
		    'cc_cvv2_number'=>array('rule'=>'/^[0-9]{3,4}/','message'=>'Please enter a valid CVV'),
		    
            );
   var $useTable = false;		   
}
?>
