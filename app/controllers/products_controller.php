<?php

class ProductsController extends AppController {

    var $name = 'Products';
    var $helpers = array('Html', 'Paginator', 'Form');

    function beforeFilter() {
        parent::beforeFilter();
    }
    function index($parent_slug = null, $child_slug = null, $grandchild_slug = null) {
					
						
				$this->loadModel('Vendor');
				$this->set('users', $this->Vendor->getVendors());
        $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
        $this->set('countries', $this->Vendor->getCountries());
        $this->set('creations', $this->Product->getProdCreation());
				
        $this->set('all_categories', $this->Product->getAllProductCategories());
				
        $this->layout = 'site';
        $this->paginate = array(
            'conditions' => 'product_name != "" ',
            'limit' => 8,
            'order' => array('product_id' => 'desc')
        );
        $this->set('title_for_layout', 'Products');
        $this->set('products', $this->paginate());
    }
		function category() {
				
				
				$this->loadModel('Vendor');
        $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
        $this->set('countries', $this->Vendor->getCountries());
        $this->set('creations', $this->Product->getProdCreation());
				$this->set('AllProductsandUsers', $this->Product->_getAllProductsandUsers());
				
				
				$args = array_unique(func_get_args());
        $starting_depth = count($args);
				$conditions = '';
				$all_categories = $this->Product->getAllProductCategories();
								
				switch($starting_depth) {
						case 0:
								$this_category = '';
								$parent_category = '';
						break;
						case 1:
								$this_category = $all_categories[$args[0]];
								$conditions = array('category_id =' => $this_category['id']);
								$parent_category = $all_categories[$args[0]];
						break;
						case 2:
								$this_category = $all_categories[$args[0]]['children'][$args[1]];
								$conditions = array('subcategory_id =' => $this_category['id']);
								$parent_category = $all_categories[$args[0]];
						break;
						case 3:
								$this_category = $all_categories[$args[0]]['children'][$args[1]]['children'][$args[2]];
								$conditions = array('sub_subcat_id =' => $this_category['id']);
								$parent_category = $all_categories[$args[0]];
						break;
				}
				
        $this->layout = 'site';
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 8,
            'order' => array('product_id' => 'desc')
        );
        $this->set('title_for_layout', 'Products');
        $this->set('this_category', $this_category);
        $this->set('parent_category', $parent_category);
        $this->set('category', $this_category);
        $this->set('products', $this->paginate());
		$this->set('all_categories',$all_categories);
		}
		function	categories(){
				//requires no preprocessing?
		}
		
    function detail($id = null) {

				
        $this->loadModel('Vendor');
        $this->set('users', $this->Vendor->getVendors());
        $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
        $this->set('countries', $this->Vendor->getCountries());
        $this->set('creations', $this->Product->getProdCreation());
        $this->set('this_parent_category', $this->Product->_getThisCategory($id));
        $this->layout = 'vendor';
        $this->set('all_categories', $this->Product->getAllProductCategories());
				
				// Author of below: Dean Shelton. 4/24/2012
				// I am new to Cake, and the logic behind custom queries and cake's inferred
				// relationships escapes me, ATM.
				$allProductMods = $this->Product->_getAllProductMods($id);
				$product_mods = ''; //set default
				if(!empty($allProductMods)){
						foreach ($allProductMods as $mod) {                     
								$mod['unserialized_mod_data'] = unserialize($mod['product_mods']['serialized_mod_data']);
								foreach ($mod['unserialized_mod_data'] as $label=>$values) {
										
										// Save jSON for use on the detail.ctp price deviation calculations.
										// NOTE: This feature is purely for aesthetics, and the backend must recalculate the price.
										$deviation_json[$values['sku']]['sku'] = $values['sku'];
										$deviation_json[$values['sku']]['direction'] = $values['direction'];
										$deviation_json[$values['sku']]['retail_deviation'] = $values['retail_deviation'];
										$deviation_json[$values['sku']]['wholesale_deviation'] = $values['wholesale_deviation'];
										
										// Save the options of a dropdown as HTML, ordered by label
										$options[$label][] = '<option value="' . $values['sku'] . '">' . $values['name'] . '</option>';
								}
						}
						$deviation_json = json_encode($deviation_json); // Encode this for use in JS on the front-end.
						$this->set('deviation_json', $deviation_json); // Send to detail.ctp.
						
						//Structure HTML for display on detail.ctp.
						foreach($options as $label => $values){
								$product_mods .= '<div class="mod_display"><strong>' . $label . '</strong><br/>';
								$product_mods .= '<select class="mod_selector" name="mod_'.$label.'">';
								$product_mods .= join($values);
								$product_mods .= '</select></div>';
						}
				}
				
        $this->set('product_mods', $product_mods);
				// End Dean's Code.
				
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
                    'Product.allergen',
                    'Product.gluten',
                    'Product.vegan',
                    'Product.fat_free',
                    'Product.sugar',
                    'Product.msg',
                    'Product.lactose',
                    'Product.low_carb',
                    'Product.nut',
                    'Product.heart',
                    'Product.no_preservatives',
                    'Product.organic',
                    'Product.kosher',
                    'Product.halal',
                    'Product.fair_traded',
                    'Product.heat_sensitivity',
                    'Product.all_natural',
                    'Product.related_products',
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
					'u.shop_quote',
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
        $this->set('creations', $this->Product->getProdCreation());
        $this->set('all_categories', $this->Product->getAllProductCategories());
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
				'u.shop_quote',
				'u.short_name',
				'u.shop_name',
                'REPLACE(LOWER(u.shop_name),\' \',\'\') AS bname'
            ),
            'conditions' => array('u.short_name=' => $vid),
            'limit' => 12,
            'order' => array('product_id' => 'desc')
        );
        $data = $this->paginate();
        $this->set('title_for_layout', 'Products By Vendor');
        $this->set('test', $vid);
        $this->set('products', $data);
    }
	
	
	function recipe($vid = null) {
	
	}

    /*function category($cid = null) {
        $cat = explode("-",$cid);
        $cat = $cat[0];

        $this->layout = 'site';
        if ($cid != null) {
            $this->paginate = array(
                'conditions' => array('category_id = ' => $cid),
                'limit' => 1000,
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
        $this->set('creations', $this->Product->getProdCreation());
        $this->set('all_categories', $this->Product->getAllProductCategories());
        $this->set('subcategories', $this->Vendor->getsubCategories($cat));
        $this->set('products', $data);
    }*/

    
		/*
		 function subcategory($scid = null) {
        $scat = explode("-",$scid);
        $scat_id = $scat[0];
	$scat_name = preg_replace ( "/^.*?\-/",'', $scid );
        $this->layout = 'site';
        if ($scid != null && 1==2) {
            $this->paginate = array(
                'conditions' => array('subcategory_id = ' => $scat[0]),
                'limit' => 1000,
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
        $this->set('creations', $this->Product->getProdCreation());
        //$this->set('all_categories', $this->Product->getAllProductCategories());
        $this->set('subcategory_id', $scat[0]);
        $this->set('subcategory_name', $scat[1]);

        $this->set('subsubcategories', $this->Vendor->getsubsubCategories($scat_id));
        $this->set('products', $this->Vendor->getSubcategoriesProducts($scat_id));
        //$this->set('products', $data);
    }

    function subsubcategory($scid = null) {
        $sscat = explode("_",$scid);
        $sscat_id = $sscat[0];
        $scat_name = $sscat[1];
        $this->layout = 'site';
        if ($scid != null && 1==2) {
            $this->paginate = array(
                'conditions' => array('category_id = ' => $sscat),
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
        $this->set('creations', $this->Product->getProdCreation());
        //$this->set('all_categories', $this->Product->getAllProductCategories());
        $this->set('subsubcategory_id', $sscat[0]);
        $this->set('subsubcategory_name', $sscat[1]);

        $this->set('sscproducts', $this->Vendor->getSubSubcategoriesProducts($sscat_id));
    }*/

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