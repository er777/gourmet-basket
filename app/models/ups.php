<?php
/**
 * UPS Model
 * Example usage of the UPS datasource.
 * 
 * Must have /app/config/database.php setup with:
 * 	var $ups = array(
 * 		'datasource'	=> 'ups',
 * 		'accessKey'		=> '',
 * 		'userId'		=> '',
 * 		'password'		=> ''
 * 	);
 * 
 * @author Kyle Robinson Young <kyle at kyletyoung.com>
 * @copyright 2010 Kyle Robinson Young
 *
 */
class Ups extends AppModel {
    var $useDbConfig = 'ups';
    var $useTable = false;
    /**
     * GET RATE
     * Return a single shipping rate estimate.
     * @param $data
     * @return integer
     */
    function getRate($data=array()) {
        $results = $this->find('first', array(
            'conditions' 	=> $data
        ));
        return (!empty($results[$this->name]['rate'])) ? $results[$this->name]['rate'] : -1;
    } // getRate
    /**
     * GET RATES
     * Return multiple shipping rate estimates.
     * @return array | -1
     */
    function getRates() {
        $args = func_get_args();
        $results = $this->find('all', array(
            'conditions' => array(
                'AND'	=> $args
            ) 
        ));
        if (empty($results)) {
            return array_fill(0, sizeof($args), -1);
        } // empty results
        else {
            return Set::extract('/../'.$this->name.'/rate', $results);
        } // else
    } // getRates
    /**
     * GET RAW RESPONSE
     * Gives you the raw data sent back from UPS.
     * @return array
     */
    function getRawResponse() {
        $ds =& $this->getDataSource();
        return (empty($ds->rawResponse)) ? array() : $ds->rawResponse;
    } // getRawResponse
} // Ups
?>