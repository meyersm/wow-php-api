<?php

include "../api/api.php";
/**
 * Description of characterTests
 *
 * @author michaelmeyers
 */
class apiTests extends PHPUnit_Framework_TestCase
{
    
    /**
     *
     * @var wowApi
     */
    public $api;
    
    public function setUp()
    {
	$this->api = new wowApi();
	
    }
    
    public function tearDown()
    {
	
    }
    
    public function testSanity()
    {
	$this->assertEquals(true,true);
	
    }

}
