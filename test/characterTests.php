<?php
require_once "apiTests.php";
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
    public function testGetAppearance($char)
    {
	$this->assertFalse($char->getAppearance()->_isEmpty);
    }
    
    /**
     * @depends testGetCharacter
     */
    public function testGetCompanions($char)
    {
	    $this->assertFalse($char->getCompanions()->_isEmpty);
    }
    
    /**
     * @depends testGetCharacter
     */
    public function testGetGuild($char)
    {
	$this->assertFalse($char->getGuild()->_isEmpty);
    }
    
    /**
     * @depends testGetCharacter
     */
    public function testGetItems($char)
    {
	$this->assertFalse($char->getItems()->_isEmpty);
    }
        
    /**
     * @depends testGetCharacter
     */
    public function testGetMounts($char)
    {
	$this->assertFalse($char->getMounts()->_isEmpty);
    }
        
    /**
     * @depends testGetCharacter
     */
    public function testGetPetsOnNonHunter($char)
    {
	$this->assertTrue($char->getPets() == null);
    }
    
    public function testGetPetsOnHunter()
    {
        $char = $this->api->character->getCharacter("nameya", "destromath");
        $this->assertFalse($char->getPets()->_isEmpty);
    }
        
    /**
     * @depends testGetCharacter
     */
    public function testGetProfessions($char)
    {
	$this->assertFalse($char->getProfessions()->_isEmpty);
    }
        
    /**
     * @depends testGetCharacter
     */
    public function testGetProgression($char)
    {
	$this->assertFalse($char->getProgression()->_isEmpty);
    }
        
    /**
     * @depends testGetCharacter
     */
    public function testGetPvP($char)
    {
	$this->assertFalse($char->getPvP()->_isEmpty);
    }
        
    /**
     * @depends testGetCharacter
     */
    public function testGetQuests($char)
    {
	$this->assertFalse($char->getQuests()->_isEmpty);
    }
        
    /**
     * @depends testGetCharacter
     */
    public function testGetReputations($char)
    {
	$this->assertFalse($char->getReputations()->_isEmpty);
    }
        
    /**
     * @depends testGetCharacter
     */
    public function testGetStats($char)
    {
	$this->assertFalse($char->getStats()->_isEmpty);
    }
        
    /**
     * @depends testGetCharacter
     */
    public function testGetActiveTalents($char)
    {
	$this->assertFalse($char->getActiveTalents()->_isEmpty);
    }    
    
    /**
     * @depends testGetCharacter
     */
    public function testGetInactiveTalents($char)
    {
	$this->assertFalse($char->getInactiveTalents()->_isEmpty);
    }
            
    /**
     * @depends testGetCharacter
     */
    public function testGetTitles($char)
    {
	$this->assertFalse($char->getTitles()->_isEmpty);
    }

}
