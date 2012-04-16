

<?php
class VendorsController extends AppController {

	var $name = 'Vendors';
	//format (into something human readable) the date and time fields from the database… amongst other things.
 	var $helpers = array('Time');
     
	function index() {
        $this->layout = 'site';
        $this->set('users', $this->Vendor->getVendors());
        $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
        $this->set('countries', $this->Vendor->getCountries());
        $this->set('creations', $this->Product->getProdCreation());             
        $this->set('all_categories', $this->Product->getAllProductCategories());
	}

	function view() {
		
	}

	function william() {
		
	}
	
	    function vendor($vid = null) {
        
        if($vid==null){
          $this->redirect('/vendors');
          exit();  
        }
        $this->layout = 'vendor';
        $this->paginate = array(
            'joins' => array(
                array(
                    'table' => 'users',
                    'type' => 'RIGHT',
                    'alias' => 'u',
                    'conditions' => array('u.user_id = Product.user_id')
                )
            ),
            'fields' => array(
                
                'u.user_id', 
                'u.logo', 
                'u.image1', 
                'u.image2',
				'u.shop_description',
				'u.image_feature',
                'REPLACE(LOWER(u.business_name),\' \',\'\') AS bname'
            ),
            'conditions' => array('REPLACE(LOWER(u.business_name),\' \',\'\') = ' => $vid),
            'limit' => 6,
            'order' => array('product_id' => 'desc')
        );
        $data = $this->paginate();
        $this->set('title_for_layout', 'Products By Vendor');
        $this->set('test', $vid);           
        $this->set('products', $data);
    }
	
	
}

?>