<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/958/The-Pages-Controller
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html', 'Session');

/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	//var $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
	function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;
        
        if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
        if ($page == "home") {
            $this->loadModel('Vendor');
            $this->set('users', $this->Vendor->getVendors());
            $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
            $this->set('countries', $this->Vendor->getCountries());
            $this->set('creations', $this->Vendor->getProdCreation());
            $this->set('categories', $this->Vendor->getCategories());
			$this->layout = 'home';
            
            $datahome = $this->Page->getHomeData();
            $dataslide = $this->Page->getSlideData();
            $datablock = $this->Page->getBlocksData();
            $datacategories = $this->Page->getCategories();
            
            //echo "<pre>";
            //print_r($datablock);
            //echo "</pre>";
            $this->set('headline_home', $datahome);
            $this->set('feature_slide', $dataslide);
            $this->set('feature_block', $datablock);
            $this->set('categories', $datacategories);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
    
}
