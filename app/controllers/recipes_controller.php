<?php

class RecipesController extends AppController {

    var $name = 'Products';

    var $helpers = array('Html', 'Paginator', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
    }

    function index($id = null) {
        $this->loadModel('Vendor');
        $this->set('users', $this->Vendor->getVendors());
        $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
        $this->set('countries', $this->Vendor->getCountries());
        $this->set('creations', $this->Vendor->getProdCreation());
        $this->set('categories', $this->Vendor->getCategories());
        $this->layout = 'site';
        $this->paginate = array(
            'conditions' => array('product_name !=' => ""),
            'limit' => 8,
            'order' => array('product_id' => 'desc')
        );
        $this->set('title_for_layout', 'Recipes');
        $this->set('products', $this->paginate());
    }

    function detail($id = null) {
        $this->loadModel('Vendor');
        $this->set('users', $this->Vendor->getVendors());
        $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
        $this->set('countries', $this->Vendor->getCountries());
        $this->set('creations', $this->Vendor->getProdCreation());
        $this->set('categories', $this->Vendor->getCategories());
        $this->layout = 'vendor';
        $this->set('categories', $this->Vendor->getCategories());
        $data = $this->Product->find(
            "first",
            array(
                'joins' => array(
                    array(
                        'table' => 'users',
                        'type' => 'INNER',
                        'alias' => 'u',
                        'conditions' => array('u.user_id = Product.user_id')
                    )
                ),
                'fields' => array(
                    'Product.product_id',
                    'Product.category_id',
                    'Product.product_name',
                    'Product.description',
                    'Product.long_description',
					'Product.ingredients',
                    'Product.price',
					'Product.selling_price',
                    'Product.image',
                    'Product.image_1',
                    'Product.image_2',
                    'Product.image_3',
                    'Product.image_4',
                    'Product.image_5',
                    'u.user_id',
					'u.shop_name',
                    'u.logo',
                    'u.image1',
                    'u.image2',
					'u.image3',
					'u.image4',
					'u.image5',
					'u.image6',
                    'u.shop_description',
                    'REPLACE(LOWER(u.business_name),\' \',\'\') AS bname'
                ),
                'conditions' => array('Product.product_id =' => $id)));
        $this->set('title_for_layout', $data['Product']['product_name']);
        $this->set('products', array($data));
    }

    function vendor($vid = null) {

        if($vid==null){
            $this->redirect('/vendors');
            exit();
        }
        $this->loadModel('Vendor');
        $this->set('users', $this->Vendor->getVendors());
        $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
        $this->set('countries', $this->Vendor->getCountries());
        $this->set('creations', $this->Vendor->getProdCreation());
        $this->set('categories', $this->Vendor->getCategories());
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
                'Product.product_id',
                'Product.product_name',
                'Product.description',
                'Product.price',
                'Product.image',
                'Product.image_1',
                'Product.image_2',
                'Product.image_3',
                'Product.image_4',
                'Product.image_5',
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
                'REPLACE(LOWER(u.business_name),\' \',\'\') AS bname'
            ),
            'conditions' => array('REPLACE(LOWER(u.business_name),\' \',\'\') = ' => $vid),
            'limit' => 12,
            'order' => array('product_id' => 'desc')
        );
        $data = $this->paginate();
        $this->set('title_for_layout', 'Products By Vendor');
        $this->set('test', $vid);
        $this->set('products', $data);
    }

    function category($cid = null) {
        $this->layout = 'site';
        if ($cid != null) {
            $this->paginate = array(
                'conditions' => array('category_id = ' => $cid),
                'limit' => 12,
                'order' => array('product_id' => 'asc')
            );
        }
        if (isset($this->passedArgs['pc'])) {
            $pc = $this->passedArgs['pc'];
            $this->paginate = array(
                'conditions' => array('creation_id = ' => $pc),
                'limit' => 12,
                'order' => array('product_id' => 'asc')
            );
        }
        if (!empty($this->data)) {
            $conditions = array();

            if ($this->data['Product']['search'] != '') {
                $search = strtolower($this->data['Product']['search']);
                array_push($conditions, array(
                        'OR' => array(
                            array('LCASE(product_name) like' => "%$search%"),
                            array('LCASE(description) like' => "%$search%"),
                            array('LCASE(long_description) like' => "%$search%"),
                            array('LCASE(tags) like' => "%$search%")
                        )
                    )
                );
            }
            if ($this->data['Product']['country_id'] != '')
                array_push($conditions, array('country_id =' => $this->data['Product']['country_id']));
            if ($this->data['Product']['tradition_id'] != '')
                array_push($conditions, array('tradition_ids  like' => "%" . $this->data['Product']['tradition_id'] . "%"));

            foreach ($this->data['Product'] as $n_k => $v) {
                if ($this->data['Product'][$n_k] != '') {
                    $pos = strpos($n_k, 'n_');
                    if ($pos !== false && $pos == 0) {
                        $k = substr_replace($n_k, '', 0, 2);
                        array_push($conditions, array("n.$k <=" => $v));
                    }
                }
            }
            $this->paginate = array(
                'joins' => array(
                    array(
                        'table' => 'nutrition',
                        'type' => 'LEFT',
                        'alias' => 'n',
                        'conditions' => array('n.product_id = Product.product_id')
                    )
                ),
                'conditions' => $conditions,
                'order' => array('product_id' => 'desc'),
                'limit' => 12
            );
        }
        //$this->set('test', $uid);    
        $data = $this->paginate();
        $this->set('title_for_layout', ' Products By Categories');
        $this->loadModel('Vendor');
        $this->set('users', $this->Vendor->getVendors());
        $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
        $this->set('countries', $this->Vendor->getCountries());
        $this->set('creations', $this->Vendor->getProdCreation());
        $this->set('categories', $this->Vendor->getCategories());
        $this->set('products', $data);
    }

    function addcart() {
        //$this->Session->delete('Cart');
        if($this->Session->read('Member')==NULL){
            $this->redirect('/members/login');
        }
        if (empty($this->data) == false && $this->data['Product']['price'] > 0) {
            $this->data['Product']['qty'] = $this->data['Product']['qty'] > 0 ? $this->data['Product']['qty'] : 1;
            if ($this->Session->read('Cart') != NULL) {
                $varcompare = 0;
                $arraycart = $this->Session->read('Cart');
                //$this->Session->delete('Cart.329'); exit;
                foreach($this->Session->read('Cart') as $i => $v){
                    //for ($i = 0; $i < count($this->Session->read('Cart')); $i++) {
                    if ($arraycart[$i]['product_id'] == $this->data['Product']['product_id']) {
                        $this->data['Product']['qty'] = $arraycart[$i]['qty'] + $this->data['Product']['qty'];
                        $cart = $this->Product->addcart($this->data['Product']);
                        $this->Session->write('Cart.' . $arraycart[$i]['product_id'] , $cart);
                        $varcompare = 1;
                    }
                }
                if ($varcompare == 0) {
                    $cart = $this->Product->addcart($this->data['Product']);
                    $this->Session->write('Cart.' . $this->data['Product']['product_id'], $cart);
                }
            } else {
                $cart = $this->Product->addcart($this->data['Product']);
                $this->Session->write('Cart.' . $this->data['Product']['product_id'], $cart);
            }

            $this->redirect('/cart');
            exit();
        }
        $this->Session->write('error_product_cart', 5);
        $this->redirect('/products/'.$this->data['Product']['product_id']);
    }

    function updateitemcart() {
        //$this->Session->delete('Cart');
        if (empty($this->data) == false) {
            $this->data['Product']['product_id'] = $this->data['product_id'];
            if ($this->Session->read('Cart') != NULL) {
                $arraycart = $this->Session->read('Cart');
                if ($this->data['qty'] < 1) {
                     $this->Session->delete('Cart.'.$this->data['product_id']);
                } else {
                     foreach($this->Session->read('Cart') as $i => $v){
                     //for ($i = 0; $i < count($this->Session->read('Cart')); $i++) {
                         if ($arraycart[$i]['product_id'] == $this->data['Product']['product_id']) {
                             $this->data['Product']['qty'] = $this->data['qty'];
                             $cart = $this->Product->addcart($this->data['Product']);
                             $this->Session->write('Cart.' . $arraycart[$i]['product_id'] , $cart);
                         }
                     }
                }
            }
        }
        $this->redirect('/cart');
        exit();
    }

    function removeitemcart() {
        if (empty($this->data) == false) {
            $this->data['Product']['product_id'] = $this->data['product_id'];
            if ($this->Session->read('Cart') != NULL) {
                $arraycart = $this->Session->read('Cart');
                //$this->Session->delete('Cart.329'); exit;
                foreach($this->Session->read('Cart') as $i => $v){
                    //for ($i = 0; $i < count($this->Session->read('Cart')); $i++) {
                    if ($arraycart[$i]['product_id'] == $this->data['Product']['product_id']) {
                        $this->Session->delete('Cart.' . $arraycart[$i]['product_id']);
                    }
                }
            }
            $this->redirect('/cart');
            exit();
        }
    }

    function cleancart() {
            if ($this->Session->read('Cart') != NULL) {
                $this->Session->delete('Cart');
                $this->Session->delete('CartTotal');
            }
            $this->redirect('/cart');
            exit();
    }
}

?>