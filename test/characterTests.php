<?php
require "apiTests.php";
/**
 * Description of characterTests
 *
 * @author michaelmeyers
 */
class characterTests extends apiTests
{

    
    public function testGetCharacter()
    {
	$char = $this->api->character->getCharacter("grimskull", "destromath");
	$this->assertEquals($char->class,2);
	return $char;
    }
    
    /**
     * @depends testGetCharacter
     */
    public function testGetCharacterAppearance($char)
    {
	$this->assertFalse($char->getAppearance()->_isEmpty);
    }
    
}
