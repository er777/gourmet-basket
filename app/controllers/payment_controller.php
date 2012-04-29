<?php

class PaymentController extends AppController {



	var $name = 'Payment'; 

    var $send = false;

    //var $components = array( "PaypalNvp" );

    var $components = array('RequestHandler', 'Email', 'PaypalNvp.PaypalNvp' => 

             array('api_username'=>'jufrvi_1309237690_biz_api1.hotmail.com',

                   'api_password'=>'1309237743',

                   'api_signature'=>'AsD.KwNZ0moLpKdl8MNghenlXv.QAAA7uOxKhQ5ONWYX34dA0k7P9Kce',

                   'api_environment'=>'sandbox')

                  );

	function index() {

        $this->top_menu();

        $this->layout = 'site';

        if($this->Session->read('Cart')==NULL){

            $this->redirect('/cart/');

            exit();

        }else{

        $this->set('title_for_layout', 'Payment');

        $this->set('m', $this->Payment->getCostumerData($this->Session->read('Member.member_id')));

            $this->set('method_ship', $this->Session->read('CartTotal.shipping_method')==1?"FEDEX":"UPS");

            $this->set('costship', $this->Session->read('CartTotal.shipping'));

            $this->set('subtotal', $this->Session->read('CartTotal.subtotal'));

            $this->set('total', $this->Session->read('CartTotal.total'));

            $this->set('tax', $this->Session->read('CartTotal.tax'));

            $this->set('taxdescription', $this->Session->read('CartTotal.taxdescription'));

        }

	}



	function confirm() {

        $this->top_menu();

        $this->layout = 'site';

        if($this->Session->read('Cart')==NULL){

            $this->redirect('/cart/');

            exit();

        }else{

        if (!$this->PaypalNvp->processCard($this->data) ) {

            //success

            $ip_customer = $this->RequestHandler->getClientIp();

            $order_id = $this->Payment->saveOrderData($this->Session->read('Member.member_id'), $this->Session->read('Memberaddress.shipping'), $this->Session->read('Memberaddress.billing'), $this->Session->read('Cart'), $this->Session->read('CartTotal'), $ip_customer, $this->data['cc_type']);

            $order_admin = $this->Payment->getOrderAdminData($order_id);
            //$view = new View($this, false);
            //$content = $view->element('email\html\order_admin', $order_admin);
            //echo $content; exit;

            $email_admin = $this->Payment->getEmailAdminData();

            $this->_sendOrderAdminMail($order_admin, $email_admin);

            foreach ($order_admin['products'] as $k => $val) {

                $order_vendor = $this->Payment->getOrderVendorData($order_id, $k);

                $email_vendor = $this->Payment->getEmailVendorData($k);

                //echo '----------k--------' . $k .'------ email vendor -------' . $email_vendor;

                $this->_sendOrderVendorMail($order_vendor, $email_vendor);
            }

            $this->_sendOrderMemberMail($order_admin, $order_admin['email']);

            $this->Session->delete('Cart');

            $this->Session->delete('CartTotal');

            $this->set('success', 'yes');       

        } else {

            //Gets error response information

            $this->set('success', $this->PaypalNvp->getResponse());

        }

        }		

	}

    

    function _sendOrderAdminMail($order, $email) {

        $this->Email->to = $email;
        $this->Email->toName = 'Administrator';

        $this->Email->cc = "info@elitewebdeveloper.com";
        $this->Email->ccName = 'Programmer';

        $this->Email->bcc = "info@elitewebdeveloper.com";
        $this->Email->bccName = 'Administrator';

        $this->Email->subject = 'Gourmet Basket - Order'.$order['order_id'].'<------ admin ------>' . $email;

        $this->Email->replyTo = 'info@gourmet-basket.com';

        $this->Email->from = 'order.admin@gourmet-basket.com';

        $this->Email->fromName = 'Gourmet-Basket';

        $this->Email->template = 'order_admin';

        $this->Email->sendAs = 'both';

        $this->set('order_info', $order);

        echo $this->Email->send();

    }

    

    function _sendOrderMemberMail($order, $email) {

        $this->Email->to = $email;
        $this->Email->toName = 'Client';

        $this->Email->cc = "info@elitewebdeveloper.com";
        $this->Email->ccName = 'Programmer';

        $this->Email->bcc = "info@elitewebdeveloper.com";
        $this->Email->bccName = 'Administrator';

        $this->Email->subject = 'Gourmet Basket - Order'.$order['order_id'].'<------ member ------>' . $email;

        $this->Email->replyTo = 'info@gourmet-basket.com';

        $this->Email->from = 'order.admin@gourmet-basket.com';

        $this->Email->fromName = 'Gourmet-Basket';

        $this->Email->template = 'order_customer';

        $this->Email->sendAs = 'both';

        $this->set('order_info', $order);

        $this->Email->send();

    }

    

    function _sendOrderVendorMail($order, $email) {

        $this->Email->to = $email;
        $this->Email->toName = 'Vendor';

        $this->Email->cc = "info@elitewebdeveloper.com";
        $this->Email->ccName = 'Programmer';

        $this->Email->bcc = "info@elitewebdeveloper.com";
        $this->Email->bccName = 'Administrator';

        $this->Email->subject = 'Gourmet Basket - Order'.$order['order_id'].'<------ vendor ------>' . $email;

        $this->Email->replyTo = 'info@gourmet-basket.com';

        $this->Email->from = 'order.admin@gourmet-basket.com';

        $this->Email->fromName = 'Gourmet-Basket';

        $this->Email->template = 'order_vendor';

        $this->Email->sendAs = 'both';

        $this->set('order_info', $order);

        $this->Email->send();

    }

}

?>