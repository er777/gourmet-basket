<?php
/**
* @author 
* @website 
* @email 
* @copyright 
* @license 
**/

class RegisterController extends AppController {

	var $name = 'Register'; 
    var $send = false;

    function beforeFilter() {
        parent::beforeFilter();
    }
     
	function index() {
        $this->layout = 'register';
        $this->set('title_for_layout', 'Private Vendor Registration');
        $this->set('type_products', $this->Register->getCategories());
        $this->set('countries', $this->Register->getCountries());
        $this->set('zones', $this->Register->getZones());
	}

	function register() {
	   
	   $this->layout = 'register';
        //Save the association
        //if ($this->Register->insertData($this->data)) {
            $this->set('send', $this->Register->insertData($this->data));
        //}
       $this->set('title_for_layout', 'Private Vendor Registration');
		
	}

	function register_upload() {
	   
	   $this->layout = 'upload';
        //Save the association
        //if ($this->Register->insertData($this->data)) {
            $this->set('send', $this->Register->insertData($this->data));
        //}
       $this->set('title_for_layout', 'Private Vendor Registration Part II');
		
	}


}
?>