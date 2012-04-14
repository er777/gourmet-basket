<?php
class AboutController extends AppController {
	var $name = 'About';

    function beforeFilter() {
        parent::beforeFilter();
    }
	
	function index() {
        $this->layout = 'about';
        $this->pageTitle = 'About';
        $data = $this->paginate();        
        $this->set('data', $data);                        
	}   
}