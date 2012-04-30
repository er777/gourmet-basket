<?php
class Cart4Controller extends AppController {

	var $name = "Cart";
    var $components = array('Fedex', 'Ups');

    function index() {
        $this->layout = 'site';        
        if($this->Session->read('Member')==NULL){
            $this->redirect('/members/login');
            exit();
        }else{          
          
            $totals['subtotal'] = 0;
            $totals['shipping'] = 0;
            $totals['shipping_method'] = 0;
            $carttemp = $this->Session->read('Cart');            
            if($this->data){
                foreach ($this->data['remove'] as $k => $v) {
                    
                    if($v) {
                      unset($carttemp[$k]);  
                    } else{
                       if($carttemp[$k]['qty'] != $this->data['qty'][$k]){
                            if($this->data['qty'][$k]==0 || $this->data['qty'][$k]=='')
                                $this->data['qty'][$k] = 1;
                        $carttemp[$k]['qty'] = $this->data['qty'][$k]; 
                        $carttemp[$k]['tot'] = $carttemp[$k]['qty']*$carttemp[$k]['price']; 
                        } 
                    }                                               
                }
            }
            $this->Session->write('Cart',$carttemp);
            if($this->Session->read('Cart')!=NULL){
                $datashipping = $this->Cart->getMemberAddress($this->Session->read('Member.member_id'));        
                if($this->Session->read('Memberaddress.shipping')!=NULL){
                    $adid = $this->Session->read('Memberaddress.shipping');
                    $datashipping = $this->Cart->getAddressbyID($adid);
                }                
                $arraycart = $this->Session->read('Cart');
                foreach($this->Session->read('Cart') as $i => $v){
                    $weight_new = $v['weight'] * 0.0625;                  
                    $ship = $this->Cart->getAddressbyVendor($v['vendor_id']);
                    if($this->Session->read('CartTotal.shipping_method')==NULL || $this->Session->read('CartTotal.shipping_method')==1){
                        $this->Session->write('CartTotal.shipping_method', 1);
                        $shipping = $this->Fedex->getRate(array(
                                                'ShipFromState'	    => $ship[0]['state'],
                                            	'ShipFromZip'	    => $ship[0]['postcode'],
                                            	'ShipFromCountry'   => $ship[0]['country'],
                                            	'ShipToState'	    => $datashipping['state'],
                                            	'ShipToZip'         => $datashipping['postcode'],
                                            	'ShipToCountry'     => $datashipping['country'],
                                                'Weight'			=> $weight_new,                                            
                                                'PackageCount'		=> $v['qty']
                                            ));
                    }else if($this->Session->read('CartTotal.shipping_method')==2){
                        $shipping = $this->Ups->getRate(array(
                                        	'ShipFromZip'	    => $ship[0]['postcode'],
                                        	'ShipFromCountry'   => $ship[0]['country'],
                                        	'ShipToZip'         => $datashipping['postcode'],
                                        	'ShipToCountry'     => $datashipping['country'],
                                            'Weight'			=> $weight_new                                                                                          
                                        ));
                        $shipping = $shipping * $v['qty'];                        
                    }
                                        
                    $this->Session->write('Cart.' .$i.".shipping", $shipping);
                    $totals['shipping_method'] = $this->Session->read('CartTotal.shipping_method');
                    $totals['shipping'] = $shipping + $totals['shipping'];                    
                    $totals['subtotal'] = $arraycart[$i]['tot']+$totals['subtotal'];
                }
            }
            $totals['tax'] = "2.95";
            $totals['total'] = $totals['subtotal']+$totals['tax']+$totals['shipping'];
            
            $this->Session->write('CartTotal', $totals);
            
            if($this->Session->read('Cart') != NULL && $this->Session->read('Cart') == "true"){
                $this->Session->write('changeship', "false");
                $this->redirect('/checkout');
                exit();
            }
            $this->set('title_for_layout', 'Shopping Cart'); 
            $this->set('cart', $this->Session->read('Cart'));
            $this->set('carttotal', $this->Session->read('CartTotal'));
        }
	}
    
    function shipping($option = NULL) {
        
        $this->layout = 'site';
        if($this->Session->read('Cart')==NULL){
            $this->redirect('/cart/');
            exit();
        }else{
            if(empty($this->data) == false){
                $this->Session->write('CartTotal.shipping_method', $this->data['Cart']['shipp']);
            }
            $shipping_cost_fedex = 0;
            $shipping_cost_ups = 0;
            $datashipping = $this->Cart->getMemberAddress($this->Session->read('Member.member_id'));        
            if($this->Session->read('Memberaddress.shipping')!=NULL){
                $adid = $this->Session->read('Memberaddress.shipping');
                $datashipping = $this->Cart->getAddressbyID($adid);
            }
            $arraycart = $this->Session->read('Cart');
            foreach($this->Session->read('Cart') as $i => $v){
                $weight_new = $v['weight'] * 0.0625;
                $ship = $this->Cart->getAddressbyVendor($v['vendor_id']);
                $shipping[$i]['business_name'] = $v['business_name'];
                $shipping[$i]['product_name'] = $v['product_name'];
                $shipping[$i]['qty'] = $v['qty'];
                $shipping[$i]['ratef'] = $this->Fedex->getRate(array(
                                            'ShipFromState'	    => $ship[0]['state'],
                                        	'ShipFromZip'	    => $ship[0]['postcode'],
                                        	'ShipFromCountry'   => $ship[0]['country'],
                                        	'ShipToState'	    => $datashipping['state'],
                                        	'ShipToZip'         => $datashipping['postcode'],
                                        	'ShipToCountry'     => $datashipping['country'],
                                            'Weight'			=> $weight_new,                                            
                                            'PackageCount'		=> $v['qty']
                                                
                                        ));
                 $rate_ups = $this->Ups->getRate(array(
                                        	'ShipFromZip'	    => $ship[0]['postcode'],
                                        	'ShipFromCountry'   => $ship[0]['country'],
                                        	'ShipToZip'         => $datashipping['postcode'],
                                        	'ShipToCountry'     => $datashipping['country'],
                                            'Weight'			=> $weight_new                                                                                          
                                        ));
                 $shipping[$i]['rateu'] = $rate_ups * $v['qty'];
                 
                 $shipping_cost_fedex = $shipping_cost_fedex + $shipping[$i]['ratef'];
                 $shipping_cost_ups = $shipping_cost_ups + $shipping[$i]['rateu'];
            }
            
            
        $this->set('total_fedex', $shipping_cost_fedex);    
        $this->set('total_ups', $shipping_cost_ups); 
        $this->set('shipping', $shipping);
        }
	}
    
    
}
?>