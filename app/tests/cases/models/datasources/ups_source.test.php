<?php
class UpsTestModel extends Model {
	var $name = 'UpsTestModel';
	var $useDbConfig = 'ups';
	var $useTable = false;
	function schema() {
		return array(
			'rate'	=> array(
	            'type'	    => 'integer',
	            'null'	    => true,
	            'primary'	=> false,
	            'length'	=> 11
	        ),
	        'currency'	=> array(
	            'type'	    => 'string',
	            'null'	    => true,
	            'primary'	=> false,
	            'length'	=> 3
	        ),
	        'status'	=> array(
	            'type'	    => 'string',
	            'null'	    => true,
	            'primary'	=> false,
	            'length'	=> 255
	        ),
	        'error_code'	=> array(
	            'type'	    => 'integer',
	            'null'	    => true,
	            'primary'	=> false,
	            'length'	=> 11
	        ),
	        'error_description'	=> array(
	            'type'	    => 'string',
	            'null'	    => true,
	            'primary'	=> false,
	            'length'	=> 255
	        ),
		);
	}
} // UpsTestModel
class UpsTestCase extends CakeTestCase {
    var $useAutoFixtures = false;
	/**
     * startTest method
     *
     * @access public
     * @return void
     */
	function startTest() {
	    $this->Model = new UpsTestModel();
	} // startTest
    /**
     * testFind
     * @access public
     * @return void
     */
    function testFind() {
        $db = $this->Model->getDataSource();
        // SUCCESS
        $result = $this->Model->find(array('weight' => 1));
        $this->assertNotNull($result[$this->Model->name]['rate']);
        // FAILURE
        $result = $this->Model->find(array('weight' => 0.001));
        $this->assertNotEqual($result[$this->Model->name]['error_code'], '');
        // MULTIPLE
        $result = $this->Model->find('all', array(
            'conditions' => array(
                'AND' => array(
                	array('weight' => 1),
                	array('weight' => 10),
                )
            )
        ));
        $this->assertNotNull($result[0][$this->Model->name]['rate']);
        $this->assertNotNull($result[1][$this->Model->name]['rate']);
    } // tesFind
    /**
     * endTest method
     *
     * @access public
     * @return void
     */
    function endTest() {
        unset($this->Model);
	} // endTest
} // UpsTestCase
?>