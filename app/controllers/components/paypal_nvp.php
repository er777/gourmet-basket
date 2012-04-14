<?php 
class PaypalNvpComponent extends Object 
{
  private $api_username;
  private $api_password;
  private $api_signature;
  private $environment;
  private $response;
  private $notify_url;

	
  public function initialize(&$controller,$settings) {
    if(isset($settings['api_username']))
      $this->api_username=$settings['api_username'];
    else 
      $this->api_username=Configure::read('paypal_api_username');
    if(isset($settings['api_password']))
      $this->api_password=$settings['api_password'];
    else
      $this->api_password=Configure::read('paypal_api_password');
    if(isset($settings['api_signature']))
      $this->api_signature=$settings['api_signature'];
    else 
      $this->api_signature=Configure::read('paypal_api_signature');
    if(isset($settings['api_environment']))
      $this->environment=$settings['api_environment'];
    else
      $this->environment=Configure::read('paypal_api_environment');
    if(isset($settings['notify_url']))
      $this->notify_url=$settings['notify_url'];
    elseif(Configure::read('payapl_notify_url'))
      $this->notify_url=Configure::read('paypal_notify_url');
  }
  public function getResponse() {
    return($this->response);
  }
  /**
   * Send HTTP POST Request
   *
   * @param	string	The API method name
   * @param	string	The POST Message fields in &name=value pair format
   * @return	array	Parsed HTTP Response body
   */
  private function PPHttpPost($methodName_, $nvpStr_) {

    // Set up your API credentials, PayPal end point, and API version.
    $API_UserName = urlencode($this->api_username);
    $API_Password = urlencode($this->api_password);
    $API_Signature = urlencode($this->api_signature);
    $API_Endpoint = "https://api-3t.paypal.com/nvp";
    if("sandbox" === $this->environment || "beta-sandbox" === $this->environment) {
      $API_Endpoint = "https://api-3t.".$this->environment.".paypal.com/nvp";
    }
    $version = urlencode('51.0');

    // Set the curl parameters.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);

    // Turn off the server and peer verification (TrustManager Concept).
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    // Set the API operation, version, and API signature in the request.
    $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature" . $nvpStr_;
    // Set the request as a POST FIELD for curl.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

    // Get response from the server.
    $httpResponse = curl_exec($ch);
    if(!$httpResponse) {
      exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
    }
    // Extract the response details.
    $httpResponseAr = explode("&", $httpResponse);

    $httpParsedResponseAr = array();
    foreach ($httpResponseAr as $i => $value) {
      $tmpAr = explode("=", $value);
      if(sizeof($tmpAr) > 1) {
	$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
      }
    }

    if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
      exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
    }

    return $httpParsedResponseAr;
  }
  function _processNames($vs,$newName)
  {
    $s="";
    $n=0;
    foreach($vs as $v) {
      $s = $s . "&" . $newName . $n . "=" . urlencode($v);
    }
    return($s);
  }
  public function processCard($data)
  {
    // Set request-specific fields.
    $paymentType = urlencode('Sale');				// or 'Sale'
    $firstName = urlencode($data['first_name']);
    $lastName = urlencode($data['last_name']);
    $email = urlencode($data['email']);
    $creditCardType = urlencode($data['cc_type']);
    $creditCardNumber = urlencode($data['cc_number']);
    $expDateMonth = $data['cc_expire_date_month'];
    // Month must be padded with leading zero
    $padDateMonth = urlencode(str_pad($expDateMonth, 2, '0', STR_PAD_LEFT));

    $expDateYear = urlencode($data['cc_expire_date_year']);
    $cvv2Number = urlencode($data['cc_cvv2']);
    $address1 = urlencode($data['address1']);
    $address2 = urlencode($data['address2']);
    $city = urlencode($data['city']);
    $state = urlencode($data['state']);
    $zip = urlencode($data['zip']);
    $country = urlencode($data['country']);			// US or other valid country code
    $amount = urlencode($data['payment_amount']);
    $currencyID = urlencode('USD');						// or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD') 
    $ipAddress = urlencode($data['ip_address']);
    // Add request-specific fields to the request string.
    $nvpStr =	"&PAYMENTACTION=$paymentType".      
                "&AMT=$amount".
                "&CREDITCARDTYPE=$creditCardType".
                "&ACCT=$creditCardNumber".
                "&EXPDATE=$padDateMonth$expDateYear".
                "&CVV2=$cvv2Number".
                "&FIRSTNAME=$firstName".
                "&LASTNAME=$lastName".
                "&STREET=$address1".
                "&CITY=$city".
                "&STATE=$state".
                "&ZIP=$zip".
                "&COUNTRYCODE=$country".
                "&CURRENCYCODE=$currencyID".
                "&EMAIL=$email";
    if(isset($data['invoice_number'])) {
      $nvpStr .= "&INVNUM=" . urlencode($data['invoice_number']);
    }
    if(isset($data['product_name'])) {
      $nvpStr .= $this->_processNames($data['product_name'],'L_NAME');
    }
    if(isset($data['product_desc'])) {
      $nvpStr .= $this->_processNames($data['product_desc'],'L_DESC');
    }
    if(isset($data['product_amt'])) {
      $nvpStr .= $this->_processNames($data['product_amt'],'L_AMT');
    }
    if(isset($data['product_number'])) {
      $nvpStr .= $this->_processNames($data['product_number'],'L_NUMBER');
    }
    if(isset($data['product_qty'])) {
      $nvpStr .= $this->_processNames($data['product_qty'],'L_QTY');
    }
    if(isset($data['product_taxamt'])) {
      $nvpStr .= $this->_processNames($data['product_taxamt'],'L_TAXAMT');
    }
    if(isset($this->notify_url)) {
      $nvpStr .= "&NOTIFYURL=" . urlencode($this->notify_url);
    }
    // Execute the API operation; see the PPHttpPost function above.
    $httpParsedResponseAr = $this->PPHttpPost('DoDirectPayment', $nvpStr);
    $this->response=$httpParsedResponseAr;
    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
      return(true);
    } else  {
      return(false);	
    }
  }
}
?>
