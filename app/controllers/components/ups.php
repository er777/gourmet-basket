<?php
/**
 * CakePHP UPS Component v0.1
 * For calculating shipping rates from UPS.
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
 * @link http://www.kyletyoung.com/code/cakephp_ups_component
 * 
 * USAGE:
 *  Add the component into your controller via 'var $components = array('Ups');'
 *  Call the 'getRate' function and pass it an array of data about your shipment.
 *  Take a look at the defaults to see your options.
 * 
 *  $rate = $this->Ups->getRate(array(
 * 		'Weight' => '34'
 *  ));
 * 
 */
class UpsComponent extends Object
{
    var $accessKey    = '2C8C98E873ABA238';
    var $userId       = 'jorgersw';
    var $password     = 'Silver888light';
    var $upsUrl       = 'https://www.ups.com/ups.app/xml/Rate';
    var $handlingFee  = 0;
    var $response;
    
    var $defaults     = array(
        'ShipperZip'	    => '94901',
    	'ShipperCountry'    => 'US',
    	'ShipFromZip'	    => '94901',
    	'ShipFromCountry'   => 'US',
    	'ShipToZip'         => '76086',
    	'ShipToCountry'     => 'US',
    
        'ShipperNumber'		=> '1234',
    	'PickupType'		=> '01',
        
        'PackagingType'		=> '02',
        'DimensionsUnit'	=> 'IN',
        'DimensionsLength'	=> '8',
    	'DimensionsHeight'	=> '8',
    	'DimensionsWidth'	=> '8',
    
        'WeightUnit'		=> 'LBS',
        'Weight'			=> '1',
    
        'Service'			=> '03'
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
        // MUST BE ABOVE 1LB
        if ($data['Weight'] < .1) $data['Weight'] = .1;
        
        $res = $this->request($data);
        if (!empty($res['RatingServiceSelectionResponse']['RatedShipment']['TotalCharges']['MonetaryValue']))
        {
            $rate = $res['RatingServiceSelectionResponse']['RatedShipment']['TotalCharges']['MonetaryValue'];
            $rate = number_format($rate, 2, '.', '');
            return $rate+$this->handlingFee;
        } // !empty
        return false;
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
        $ch = curl_init($this->upsUrl);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		$res = curl_exec($ch);
       // echo $res;
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
        
        // IF INTERNATIONAL BUT SAME COUNTRY
        switch ($this->defaults['Service'])
        {
            case "07": case "54": case "08": case "65": case "82": case "83": case "84": case "85": case "86":
                if ($this->defaults['ShipFromCountry'] == $this->defaults['ShipToCountry'])
                {
                    $this->defaults['ShipToCountry'] = 'GB';
                } //  ShipFrom == ShipTo
                break;
                
            default:
                break;
        } // switch
        
        return "<?xml version=\"1.0\"?>  
		<AccessRequest xml:lang=\"en-US\">  
		    <AccessLicenseNumber>$this->accessKey</AccessLicenseNumber>  
		    <UserId>$this->userId</UserId>  
		    <Password>$this->password</Password>  
		</AccessRequest>  
		<?xml version=\"1.0\"?>  
		<RatingServiceSelectionRequest xml:lang=\"en-US\">  
		    <Request>  
			<TransactionReference>  
			    <CustomerContext>Bare Bones Rate Request</CustomerContext>  
			    <XpciVersion>1.0001</XpciVersion>  
			</TransactionReference>  
			<RequestAction>Rate</RequestAction>  
			<RequestOption>Rate</RequestOption>  
		    </Request>  
		<PickupType>  
		    <Code>".$this->defaults['PickupType']."</Code>  
		</PickupType>  
		<Shipment>  
		    <Shipper>  
			<Address>  
			    <PostalCode>".$this->defaults['ShipperZip']."</PostalCode>  
			    <CountryCode>".$this->defaults['ShipperCountry']."</CountryCode>  
			</Address>  
		    <ShipperNumber>".$this->defaults['ShipperNumber']."</ShipperNumber>  
		    </Shipper>  
		    <ShipTo>  
			<Address>  
			    <PostalCode>".$this->defaults['ShipToZip']."</PostalCode>  
			    <CountryCode>".$this->defaults['ShipToCountry']."</CountryCode>  
			<ResidentialAddressIndicator/>  
			</Address>  
		    </ShipTo>  
		    <ShipFrom>  
			<Address>  
			    <PostalCode>".$this->defaults['ShipFromZip']."</PostalCode>  
			    <CountryCode>".$this->defaults['ShipFromCountry']."</CountryCode>  
			</Address>  
		    </ShipFrom>  
		    <Service>  
			<Code>".$this->defaults['Service']."</Code>  
		    </Service>  
		    <Package>  
			<PackagingType>  
			    <Code>".$this->defaults['PackagingType']."</Code>  
			</PackagingType>  
			<Dimensions>  
			    <UnitOfMeasurement>  
				<Code>".$this->defaults['DimensionsUnit']."</Code>  
			    </UnitOfMeasurement>  
			    <Length>".$this->defaults['DimensionsLength']."</Length>  
			    <Width>".$this->defaults['DimensionsWidth']."</Width>  
			    <Height>".$this->defaults['DimensionsHeight']."</Height>  
			</Dimensions>  
			<PackageWeight>  
			    <UnitOfMeasurement>  
				<Code>".$this->defaults['WeightUnit']."</Code>  
			    </UnitOfMeasurement>  
			    <Weight>".number_format($this->defaults['Weight'], 2, '.', '')."</Weight>  
			</PackageWeight>  
		    </Package>  
		</Shipment>  
		</RatingServiceSelectionRequest>";
    } // buildRequest
    
} // Ups