<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {

    protected function test($data) {
         return 1;
    }

    function beforeFilter() {
        $this->loadModel('Vendor');
        $this->set('users', $this->Vendor->getVendors());
        $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
        $this->set('countries', $this->Vendor->getCountries());
        $this->set('creations', $this->Vendor->getProdCreation());
        $this->set('categories', $this->Vendor->getCategories());
        $this->set('all_categories', $this->Vendor->getAllCategoryChildren());
    }

    protected function top_menu() {
        $this->loadModel('Vendor');
        $this->set('users', $this->Vendor->getVendors());
        $this->set('list_tradition', $this->Vendor->getCulinaryTraditions());
        $this->set('countries', $this->Vendor->getCountries());
        $this->set('creations', $this->Vendor->getProdCreation());
        $this->set('categories', $this->Vendor->getCategories());
    }

    function setUser() {
        if($this->Auth->user() != null) {
            $this->params['user'] = $this->Auth->user();
        } else {
            $this->params['user'] = false;
        }
        if(@$this->params['admin'] != 1) {
            $this->layout = 'shop';
            $this->Auth->logoutRedirect = '/';
        } else {
            $this->layout = 'admin';
            if($this->Auth->user('admin') != '1')
                $this->Auth->logout();
            $this->Auth->logoutRedirect = '/admin/users/login';
            $this->Auth->loginRedirect = '/admin/categories';
        }
    }

}

