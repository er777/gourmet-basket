<?php
class CheckoutController extends AppController {	
    var $name = "Checkout";
    var $components = array('Fedex');
    
    function index() {
        $this->top_menu();
        $this->layout = 'site';
        if($this->Session->read('Member') != NULL){
            if($this->Session->read('Cart')==NULL){
                $this->redirect('/cart/');
                exit();
            }else{
            $thisdata = $this->Session->read('Member');
            $databilling = $this->Checkout->getMemberAddress($thisdata);
            $datashipping = $databilling;
            if($this->Session->read('Memberaddress.billing')!=NULL){
                $adid = $this->Session->read('Memberaddress.billing');
                $databilling = $this->Checkout->getAddressbyID($adid);
            }else{
                $this->Session->write('Memberaddress.billing', $databilling['address_id']);
            }
            
            if($this->Session->read('Memberaddress.shipping')!=NULL){
                $adid = $this->Session->read('Memberaddress.shipping');
                $datashipping = $this->Checkout->getAddressbyID($adid);
            }else{
                $this->Session->write('Memberaddress.shipping', $datashipping['address_id']);
            }
            
            $method_ship = $this->Session->read('CartTotal.shipping_method')==1?"FEDEX":"UPS";

            $this->set('binfo', $databilling);
            $this->set('sinfo', $datashipping);
            $this->set('methodship', $method_ship);
            $this->set('costship', $this->Session->read('CartTotal.shipping'));
            $this->set('subtotal', $this->Session->read('CartTotal.subtotal'));
            $this->set('total', $this->Session->read('CartTotal.total'));
            $this->set('tax', $this->Session->read('CartTotal.tax'));
            $this->set('taxdescription', $this->Session->read('CartTotal.taxdescription'));
            }

        }
        else
        {
            $this->redirect('/members/login');
            exit();
        } 
	}
    
    function address($option = NULL) {
        $this->layout = 'site';
        if($this->Session->read('Cart')==NULL){
            $this->redirect('/cart/');
            exit();
        }else{
        $addressinfo = $this->Checkout->getAddressbyMember($this->Session->read('Member.member_id'));
        $this->set('addressinfo', $addressinfo);
              
        $list_countries = $this->Checkout->country();
        $this->set('list_countries', $list_countries);
        
        $list_zones = $this->Checkout->state(223);
		$this->set('list_zones', $list_zones);
        
        $this->set('option', $option);
        }
	}
    
    function selectbillingaddress($id = NULL) {
        $this->layout = 'site';
        
        $this->Session->write('Memberaddress.billing', $id);
        $this->redirect('/checkout');
        exit();
	}
    
    function selectshippingaddress($id = NULL) {
        $this->layout = 'site';
        
        $this->Session->write('changeship', "true");
        $this->Session->write('Memberaddress.shipping', $id);
        $this->redirect('/cart');
        exit();
	}
    
    
    function congratulations() {
        $this->layout = 'vendor';
	}
}
?>