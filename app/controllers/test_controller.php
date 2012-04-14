<?php
class TestController extends AppController {
	var $name = 'About'; 
	
	
	function index() {
        $this->layout = 'test';
        $this->pageTitle = 'test';
        $data = $this->paginate();        
        $this->set('data', $data);                        
	}   
}