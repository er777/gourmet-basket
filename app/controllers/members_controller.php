<?php
class MembersController extends AppController {
	var $name = "Members";
    var $helpers = array('Html', 'Form', 'Javascript');
	var $components = array('RequestHandler', 'Email'); 
    
    function login() {
        $this->top_menu();
        $this->layout = 'site';
        if($this->Session->read('Member')==NULL){
            if(empty($this->data) == false)
            {
                if(($member = $this->Member->validateLogin($this->data['Member'])) == true){
                    //echo '------'.$member['member_id']; exit;
                    $this->Session->write('Member.member_id', $member);
                    $this->redirect('account');
                    exit();
                }else{
                    $this->set('error_login', 'Sorry, the information you\'ve entered is incorrect.');
                }
            }
        }else{
            $this->redirect('account');
            exit();
        } 
	}
    
    function track(){
        $this->top_menu();
        $this->layout = 'site';
        if($this->Session->read('Member')!=NULL){
           $trackPurchases = $this->Member->getHistory($this->Session->read('Member.member_id'));
           $this->set('trackPurchases', $trackPurchases); 
        }else{
            $this->redirect('/');
            exit();
        } 
    }
    
    function account(){
        $this->top_menu();
        $this->layout = 'site';
        if(!is_null($this->Session->read('Member'))){                                    
        }else{
            $this->redirect('/members/login');
            exit;
        }
    } 
    function edit(){
        $this->layout = 'site';
        $error_field = 0;
        $error_text = "Please complete the following fields:<br/>";
        if(!is_null($this->Session->read('Member'))){
            if(empty($this->data) == false){
                if($this->data['Member']['firstname'] === ""){
                    $error_field = 1;
                    $error_text .= "*&nbsp;First Name<br/>";
                }
                if($this->data['Member']['lastname'] === ""){
                    $error_field = 1;
                    $error_text .= "*&nbsp;Last Name<br/>";
                }
                if($this->data['Member']['email'] === ""){
                    $error_field = 1;
                    $error_text .= "*&nbsp;E-Mail<br/>";
                }
                if($this->data['Member']['phone'] === ""){
                    $error_field = 1;
                    $error_text .= "*&nbsp;Telephone<br/>";
                }
                if($error_field === 0){
                    $this->Member->updateMemberdata($this->data['Member'], $this->Session->read('Member.member_id'));
                    $this->set('done_edit', 'Your account has been successfully updated.');
                }else{                    
                    $this->set('error_edit', $error_text);
                }
            }
            $info = $this->Member->getMemberdata($this->Session->read('Member.member_id'));
            $this->set('info', $info);             
        }else{
            $this->redirect('/members/login');
            exit;
        }
    }
    function password(){
        $this->layout = 'site';
        $error_field = 0;      
        if(!is_null($this->Session->read('Member'))){
            if(empty($this->data) == false){
                if($this->data['Member']['password'] === ""){
                    $error_field = 1;
                    $error_text = "Please enter the password!";
                }
                if($this->data['Member']['password'] != $this->data['Member']['confirm_password']){
                    $error_field = 1;
                    $error_text = "Password confirmation does not match password!";
                }
                if($error_field === 0){
                    $this->Member->updateMemberpass($this->data['Member']['password'], $this->Session->read('Member.member_id'));
                    $this->set('done_password', 'Your password has been successfully updated.');
                }else{                    
                    $this->set('error_password', $error_text);
                }
            }            
        }else{
            $this->redirect('/members/login');
            exit;
        }
    }
    function address($aid = NULL){
        $this->layout = 'site';
        if(!is_null($this->Session->read('Member'))){
            if(!is_null($aid)){
                if($aid == "new"){
                    $this->set('option', $aid); 
                    $list_countries = $this->Member->country();
                    $this->set('list_countries', $list_countries);
                    $list_zones = $this->Member->state(223);
            		$this->set('list_zones', $list_zones);
                }else{
                    $info = $this->Member->getAddressbyID($aid);
                    $this->set('addressinfo', $info);
                    $this->set('option', $aid); 
                    $list_countries = $this->Member->country();
                    $this->set('list_countries', $list_countries);
                    $list_zones = $this->Member->state(223);
            		$this->set('list_zones', $list_zones);
                }
            }else{
                $addressinfo = $this->Member->getAddressbyMember($this->Session->read('Member.member_id'));
                $this->set('addressinfo', $addressinfo);
            }                        
        }else{
            $this->redirect('/members/login');
            exit;
        }
    }
    function newaddress(){
        $this->layout = 'site';
        if(empty($this->data) === false){
            $this->Member->saveAddress($this->data['Member']);
            $this->redirect('/members/address');
            exit;
        }else{
            $this->redirect('/members/address');
            exit;
        }                                
    }
    function editaddress(){
        $this->layout = 'site';
        if(!is_null($aid)){
            $this->Member->editAddress($aid);
            $this->redirect('/members/address');
            exit;
        }else{
            $this->redirect('/members/address');
            exit;
        }                                
    }
    function deladdress($aid = NULL){
        $this->layout = 'site';
        if(!is_null($aid)){
            $this->Member->deleteAddress($aid);
            $this->redirect('/members/address');
            exit;
        }else{
            $this->redirect('/members/address');
            exit;
        }                                
    }
    function orders(){
        $this->layout = 'site';
        if(!is_null($this->Session->read('Member'))){
            
           $member_id = $this->Session->read('Member.member_id');
           $orders = $this->Member->getOrdersby_member($member_id);
           
           $this->set('orders',$orders);
        }else{
            $this->redirect('/members/login');
            exit;
        }
    }

    function getStates($id) {
        $this->layout = 'ajax';
        $list_zones = $this->Member->state($id);
		$this->set('options', $list_zones);
		$this->render('/elements/ajax_state');
	}
    
    function register() {
        $this->layout = 'site';
        if (!empty($this->data)){  
            if($this->Member->validateRegister($this->data['Member']) == true){
                $member = $this->Member->savemember($this->data['Member']);
                $this->Session->write('Member', $member);
                $this->redirect('/products');
                exit();
            }else{
                $this->set('error_register', 'Sorry, the email you\'ve entered already registered.');
            }
        }
       // echo 'holaaa';
        //exit;
        $list_countries = $this->Member->country();
        $this->set('list_countries', $list_countries);
        $list_zones = $this->Member->state(223);
		$this->set('list_zones', $list_zones);
	}
    
    function addaddress() {
        $this->layout = 'site';
        if (!empty($this->data)){
            $memberaddress = $this->Member->saveAddress($this->data['Member'], $this->data['state']);
            $this->Session->write('Memberaddress.'.$this->data['Member']['typeaddress'], $memberaddress);
            $this->redirect('/checkout');
            exit();
        }        
	}
    
    function products_history($order_id = null){
        
        if(!is_null($order_id)){
            //Products belonging to this order
            $products = $this->Member->getProductByOrder($order_id);
            $this->set('products',$products);
            $this->set('order_id',$order_id);
            
            //States belonging to this order
            $this->Member->getHistoryOrder($order_id);
        }     

    }

    function forgot() {
        $this->layout = 'site';
        if (!empty($this->data)){  
            if(($member = $this->Member->validateForgot($this->data['Member'])) == true){
                $this->_sendForgotMemberMail($member);
                $this->redirect('/members/login');
                exit();
            }else{
                $this->set('error_forgot', 'Sorry, the email you\'ve entered is not registered.');
            }
        }
        
	}

    function _sendForgotMemberMail($member) {
        //$User = $this->User->read(null,$id);
        $this->Email->to = $member['email'];
        //$this->Email->bcc = array('secreto@ejemplo.com');
        $this->Email->subject = 'Gourmet Basket - Your Password';
        $this->Email->replyTo = 'info@gourmet-basket.com';
        $this->Email->from = 'Gourmet-Basket <info@gourmet-basket.com>';
        $this->Email->template = 'forgot_pass'; // NOTAR QUE NO HAY '.ctp'
        //Enviar como 'html', 'text' or 'both' (ambos) - (por defecto es 'text')
        $this->Email->sendAs = 'both'; // queremos enviar un lindo email
        //Variables de la vista
        $this->set('Member', $member);
        //NO PASAMOS ARGUMENTOS A SEND()
        $this->Email->send();
    }
  
    function logout(){
        if(!is_null($this->Session)){
            $this->Session->delete('Member');
            $this->Session->delete('Cart');
            $this->Session->delete('CartTotal');   
            
            $this->redirect('/');
            exit();
        }
    }
    
}
?>