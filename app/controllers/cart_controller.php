<?php
class CartController extends AppController {

	var $name = "Cart";
    var $components = array('Fedex', 'Ups');

    function beforeFilter() {
        parent::beforeFilter();
    }

    public function remove()
    {
        if (!$this->data) {
            $this->redirect('/');

        }
    }

    public function update()
    {

        if (!$this->data) {
            $this->redirect('/');

        }



    }

    function index () {

        $this->top_menu();
        //$this->Session->delete('CartTotal');
        $this->layout = 'site';
        //$this->Session->write('Member.member_id', 1);
        if($this->Session->read('Member')==NULL){
            $this->redirect('/members/login');
        } else {
            if ($this->Session->read('Cart') == NULL) {

            } else {


                 $this->totals();

                 $this->set('title_for_layout', 'Shopping Cart');
                 $this->set('cart', $this->Session->read('Cart'));
                 $this->set('carttotal', $this->Session->read('CartTotal'));

            }
        }

    }

    function _total() {
        $total = 0;
        if(!isset($cart['Cart'])) return 0;
        foreach($cart['Cart'] as $item)
            $total += $item['price'] * $item['quantity'];
        return $total;
    }


    function totals() {

        //$this->Session->delete('CartTotal');
        $totals['subtotal'] = 0;
        $totals['shipping'] = 0;
        $totals['shipping_method'] = 0;
        //$totals['taxdescription']  = "CA TAX 9.75%";
        //$totals['tax_rate']  = 0.0975;
        $totals['tax']       = 0;
        $totals['total']       = 0;
        //$this->Session->write('CartTotal', $totals);

        if($this->Session->read('Cart')!=NULL){
            $thisdata = $this->Session->read('Member');
            //echo 'member_id------' . $thisdata['member_id'];
            $datashipping = $this->Cart->getMemberAddress($thisdata);
            //if($this->Session->read('Memberaddress.shipping')!=NULL){
            //    $adid = $this->Session->read('Memberaddress.shipping');
            //    $datashipping = $this->Cart->getAddressbyID($adid);
            //}

            $arraycart = $this->Session->read('Cart');
            foreach($this->Session->read('Cart') as $i => $v){
                 $weight_new = $arraycart[$i]['weight'] * 0.0625;
                 $ship = $this->Cart->getAddressbyVendor($arraycart[$i]['vendor_id']);
                 //echo '---'.$ship[0]['zone_id'].'<----->'.$datashipping['zone_id'].'<br>';
                    // ===================================================
                    // tax by vendor and member state
                    // ===================================================
                 if($ship[0]['zone_id'] == $datashipping['zone_id']){
                     $tax  = $this->Cart->getTax($ship[0]['zone_id']);
                 } else { /// else tax by vendor
                     $tax  = $this->Cart->getTax($datashipping['zone_id']);
                 }
                 //echo 'check taxes';
                 if (isset($tax['description'])) {
                      //echo 'testenter ';
                      $totals['taxdescription'] = $tax['description'];
                      $totals['tax_rate'] = $tax['rate'];
                 } else {
                     $totals['taxdescription'] = 'NA/No Apply';
                     $totals['tax_rate'] = 0;
                 }
                 //echo $tax['rate']; echo $tax['description']; exit;

                 $totals['tax'] +=  $totals['tax_rate'] * $v['tot'];
                    // here show code to show taxes/shipping in confirmation
                 if($this->Session->read('CartTotal.shipping_method')==NULL || $this->Session->read('CartTotal.shipping_method')==1){
                     //echo 'shipping111111------------';
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
                    }else if($this->Session->read('CartTotal.shipping_method') == 2 || 1==1){
                     $this->Session->write('CartTotal.shipping_method', 2);
                     //echo 'shipping22222------------';
                        $shipping = $this->Ups->getRate(array(
                                        	'ShipFromZip'	    => $ship[0]['postcode'],
                                        	'ShipFromCountry'   => $ship[0]['country'],
                                        	'ShipToZip'         => $datashipping['postcode'],
                                        	'ShipToCountry'     => $datashipping['country'],
                                            'Weight'			=> $weight_new                                                                                          
                                        ));
                       //$shipping = $shipping * $v['qty'];   echo'----ship---'.$shipping;
                    }
                                        
                    //$this->Session->write('Cart.' .'1'.".tax", ($totals['tax_rate'] * $v['price']) );
                    
                    //$this->Session->write('Cart.' .'1'
                    //    .".shipping", $shipping);
                    
                    $totals['shipping_method'] = $this->Session->read('CartTotal.shipping_method');
                    $totals['shipping'] = $shipping + $totals['shipping'];                    
                    $totals['subtotal'] = $v['tot'] + $totals['subtotal'];

               }

            }

            //$totals['tax'] = "2.95";

            $totals['total'] = $totals['subtotal']+$totals['tax']+$totals['shipping'];
            
            $this->Session->write('CartTotal', $totals);
            
            if($this->Session->read('Cart') != NULL && $this->Session->read('Cart') == "true"){
                $this->Session->write('changeship', "false");
                $this->redirect('/checkout');
                exit();
            }


	}













    function shipping($option = NULL) {
        $this->top_menu();
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