<?php
class CategoriesController extends AppController {
	
	var $name = 'Categories';

    function beforeFilter() {
        parent::beforeFilter();
    }
	
	function index() {
        $this->layout = 'categories';
        $this->pageTitle = 'Categories';
        $data = $this->paginate();
        //$this->set('data', $data);
	}   
	
	function view() {
		
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
				'u.image3',
				'u.image4',
				'u.image5',
				'u.image6',
				'u.shop_description',
				'u.shop_name',
				'u.image_feature',
                'REPLACE(LOWER(u.business_name),\' \',\'\') AS bname'
            ),
            'conditions' => array('REPLACE(LOWER(u.business_name),\' \',\'\') = ' => $vid),
            'limit' => 10,
            'order' => array('product_id' => 'desc')
        );
        $data = $this->paginate();
        $this->set('title_for_layout', 'Products By Vendor');
        $this->set('test', $vid);           
        $this->set('products', $data);
    }
	
	
}

?>