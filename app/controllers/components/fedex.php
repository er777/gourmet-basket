<?php
/**
 * CakePHP Fedex Component v0.1
 * For calculating shipping rates from Fedex.
 * 
 * Copyright (C) 2010 Kyle Robinson Young
 * 
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 * 
 * @author Kyle Robinson Young <kyle at kyletyoung.com>
 * @copyright 2010 Kyle Robinson Young
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @version 0.1
 * @link http://www.kyletyoung.com/code/cakephp_fedex_component
 * 
 * USAGE:
 *  Add the component into your controller via 'var $components = array('Fedex');'
 *  Call the 'getRate' function and pass it an array of data about your shipment.
 *  Take a look at the defaults to see your options.
 * 
 *  $rate = $this->Fedex->getRate(array(
 * 		'Weight' => '34'
 *  ));
 *  
 *  FEDEX DOCUMENTATION:
 *  http://www.fedex.com/us/solutions/wis/pdf/xml_transguide.pdf
 * 
 */
class FedexComponent extends Object
{
    var $accountNumber    = '510087666';
    var $meterNumber      = '118547100';
    var $fedexUrl         = 'https://gatewaybeta.fedex.com/GatewayDC';
    var $response;
    
    var $defaults     = array(
        'ShipFromState'	    => 'CA',
    	'ShipFromZip'	    => '95451',
    	'ShipFromCountry'   => 'US',
    	'ShipToState'	    => 'CA',
    	'ShipToZip'         => '95451',
    	'ShipToCountry'     => 'US',
        
    	'CarrierCode'		=> 'FDXG',
        'DropoffType'		=> 'REGULARPICKUP',
    	'Service'			=> 'GROUNDHOMEDELIVERY',
        'Packaging'		    => 'YOURPACKAGING',
    
        'WeightUnit'		=> 'LBS',
        'Weight'			=> '1',
    
        'PackageCount'		=> '1'
    );
    
    /**
     * STARTUP
     * @param $controller
	 *
	 * TODO: Allow all options to be set from controller,
	 *  so user doesn't have to modify component.
     */
    function startup(&$controller, $options=array()) 
    {
        //$this->defaults = array_merge((array)$this->defaults, (array)$options);
    } // startup
    
    /**
     * GET RATE
     * @param $data
     * @return int | false
     */
    function getRate($data=null)
    {
        $res = $this->request($data);
        if (!empty($res['FDXRateReply']['EstimatedCharges']['DiscountedCharges']['NetCharge']))
        {
            $rate = $res['FDXRateReply']['EstimatedCharges']['DiscountedCharges']['NetCharge'];
            $rate = number_format($rate, 2, '.', '');
            return $rate;
        } // !empty
        return 9.12;
    } // calculate
    
    /**
     * REQUEST
     * @param $data
     * @return array
	 * 
	 * TODO: Use Cake HttpSocket
     */
    function request($data=null)
    {
        App::import('Core', 'Xml');
        $xml = $this->buildRequest($data);
        //echo $xml;
        $header[] = "Host: ".$_SERVER['SERVER_NAME'];
        $header[] = "MIME-Version: 1.0";
        $header[] = "Content-type: multipart/mixed; boundary=----doc";
        $header[] = "Accept: text/xml";
        $header[] = "Content-length: ".strlen($xml);
        $header[] = "Cache-Control: no-cache";
        $header[] = "Connection: close \r\n";
        $header[] = $xml;
        
        $ch = curl_init();
        // uncomment the next line if you get curl error 60: error setting certificate verify locations
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // uncommenting the next line is most likely not necessary in case of error 60
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //-------------------------
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        //curl_setopt($ch, CURLOPT_CAINFO, "c:/ca-bundle.crt");
        //-------------------------
        curl_setopt($ch, CURLOPT_URL,$this->fedexUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$res = curl_exec($ch);
		//echo '---------'.$res.'---------------0000000---'; exit;
		$res = strstr($res, '<?'); // REMOVES HEADERS
		$xml = new Xml($res);
		$this->response = $xml->toArray();
		return $this->response;
    } // request
    
    /**
     * BUILD REQUEST
     * @param $data
     * @return str
	 *
	 * TODO: Error check data
     */
    function buildRequest($data=array())
    {
        //$this->defaults = array_merge((array)$this->defaults, (array)$data);
        return '<?xml version="1.0" encoding="UTF-8" ?>
        	<FDXRateRequest xmlns:api="http://www.fedex.com/fsmapi" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="FDXRateRequest.xsd">
            	<RequestHeader>
        			<CustomerTransactionIdentifier>Express Rate</CustomerTransactionIdentifier>
                    <AccountNumber>'.$this->accountNumber.'</AccountNumber>
                    <MeterNumber>'.$this->meterNumber.'</MeterNumber>
                    <CarrierCode>'.$this->defaults['CarrierCode'].'</CarrierCode>
                </RequestHeader>
                <DropoffType>'.$this->defaults['DropoffType'].'</DropoffType>
                <Service>'.$this->defaults['Service'].'</Service>
                <Packaging>'.$this->defaults['Packaging'].'</Packaging>
                <WeightUnits>'.$this->defaults['WeightUnit'].'</WeightUnits>
                <Weight>'.number_format($this->defaults['Weight'], 1, '.', '').'</Weight>
                <OriginAddress>
                    <StateOrProvinceCode>'.$this->defaults['ShipFromState'].'</StateOrProvinceCode>
                    <PostalCode>'.$this->defaults['ShipFromZip'].'</PostalCode>
                    <CountryCode>'.$this->defaults['ShipFromCountry'].'</CountryCode>
                </OriginAddress>
                <DestinationAddress>
                    <StateOrProvinceCode>'.$this->defaults['ShipToState'].'</StateOrProvinceCode>
                    <PostalCode>'.$this->defaults['ShipToZip'].'</PostalCode>
                    <CountryCode>'.$this->defaults['ShipToCountry'].'</CountryCode>
                </DestinationAddress>
                <Payment>
                    <PayorType>SENDER</PayorType>
                </Payment>
                <PackageCount>'.number_format($this->defaults['PackageCount'], 0, '.', '').'</PackageCount>
            </FDXRateRequest>';
    } // buildRequest
    
} // FedexComponent
?>