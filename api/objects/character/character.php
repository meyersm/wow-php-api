<?php

/**
 * Description of character
 *
 * @author michaelmeyers
 */
class character extends object_base
{
    public $realm;
    public $name;
    public $level;
    public $lastModified;
    public $thumbnail;
    public $race;
    public $achievementPoints;
    public $gender;
    public $class;
    
    /**
     * @var guild
     */
    private $guild;
    /**
     * @var achievements
     */
    private $achievements;
    /**
     * @var characterAppearance
     */
    private $appearance;
    /**
     * @var characterCompanions
     */
    private $companions;
    /**
     * @var characterItems
     */
    private $items;
    /**
     * @var characterMounts
     */
    private $mounts;
    /**
     * @var characterPets
     */
    private $pets;
    /**
     * @var characterProfessionList
     */
    private $professions;
    /**
     * @var characterProgression
     */
    private $progression;
    /**
     * @var characterPvP
     */
    private $pvp;
    /**
     * @var characterQuests
     */
    private $quests;
    /**
     * @var characterReputations
     */
    private $reputations;
    /**
     * @var characterStats
     */
    private $stats;
    /**
     * @var characterTalents
     */
    private $talents;
     /**
     * @var characterTalents
     */
    private $inactiveTalents;
    /**
     * @var characterTitles
     */
    private $titles;

    
    private $_creation_object;
    // The creation object will contain the original assoc array used to create the character.
    // This can later be used for getXXXX calls, in case the original api call fetched the data already.
    // If not, the character resource will fetch this and update the creation object

    
    
    public function __construct(array $response_object)
    {
	parent::__construct($response_object);
	$this->_creation_object = $response_object;
    }
    
    /**
     * @return guild
     */
    public function getGuild()
    {
	return $this->fetchSubObject('guild','guild');
    }
    /**
     * @return achievements
     */
    public function getAchievements()
    {
	return $this->fetchSubObject('achievements','achievementList');
    }
    /**
     * @return characterAppearance
     */
    public function getAppearance()
    {
	return $this->fetchSubObject('appearance','characterAppearance');
    }
    /**
     * @return characterCompanions
     */
    public function getCompanions()
    {
	return $this->fetchSubObject('companions',  'characterCompanions');
    }
    /**
     * @return characterItems
     */
    public function getItems()
    {
	return $this->fetchSubObject('items',  'characterItems');
    }
    /**
     * @return characterMounts
     */
    public function getMounts()
    {
	return $this->fetchSubObject('mounts',  'characterMounts');
    }
    /**
     * @return characterPets
     */
    public function getPets()
    {
	if ($this->class == 3) //Only hunters have the pets array in thier results. 
	    return $this->fetchSubObject('pets',  'characterPets');
	else
	    return null;
    }
    /**
     * @return characterProfessions
     */
    public function getProfessions()
    {
	return $this->fetchSubObject('professions',  'characterProfessionList');
    }
    /**
     * @return characterProgression
     */
    public function getProgression()
    {
	return $this->fetchSubObject('progression',  'characterProgression');
    }
    /**
     * @return characterPvP
     */
    public function getPvP()
    {
	return $this->fetchSubObject('pvp',  'characterPvP');
    }
    /**
     * @return characterQuests
     */
    public function getQuests()
    {
	return $this->fetchSubObject('quests',  'characterQuests');
    }
    /**
     * @return characterReputations
     */
    public function getReputations()
    {
	return $this->fetchSubObject('reputation',  'characterReputations');
    }
    /**
     * @return characterStats
     */
    public function getStats()
    {
	return $this->fetchSubObject('stats',  'characterStats');
    }

    /**
     * @return characterTitles
     */
    public function getTitles()
    {
	return $this->fetchSubObject('titles',  'characterTitles');
    }
    
    
    /**
     * This needs to be handled differently because both active and inavtive talents are returned
     * @return characterTalents
     */
    public function getActiveTalents()
    {
	if ($this->talents !== null)
		return $this->talents;
	if (isset($this->_creation_object['talents']))
	{
	    if (isset($this->_creation_object['talents'][0]['selected']) && $this->_creation_object['talents'][0]['selected'] == 1)	
		return $this->talents = new characterTalents($this->_creation_object['talents'][0]);
	    else
		return $this->talents = new characterTalents($this->_creation_object['talents'][1]);
	}
	else
	{
	    $obj = resource_character::$instance->getCharacterAsArray($this->name, $this->realm, array('talents'));
	    if (empty($obj))
		return null;
	    else if (isset($obj['talents'][0]['selected']) && $obj['talents'][0]['selected'] == 1)
		return $this->talents = new characterTalents ($obj['talents'][0]);
	    else
		return $this->talents = new characterTalents ($obj['talents'][1]);
	}
    }
    
    /**
     * This needs to be handled differently because both active and inavtive talents are returned
     * @return characterTalents
     */
    public function getInactiveTalents()
    {
	if ($this->inactiveTalents !== null)
		return $this->inactiveTalents;
	if (isset($this->_creation_object['talents']))
	{
	    if (isset($this->_creation_object['talents'][0]['selected']) && $this->_creation_object['talents'][0]['selected'] == 1)	
		return $this->inactiveTalents = new characterTalents($this->_creation_object['talents'][1]);
	    else
		return $this->inactiveTalents = new characterTalents($this->_creation_object['talents'][0]);
	}
	else
	{
	    $obj = resource_character::$instance->getCharacterAsArray($this->name, $this->realm, array('talents'));
	    if (empty($obj))
		return null;
	    else if (isset($obj['talents'][0]['selected']) && $obj['talents'][0]['selected'] == 1)
		return $this->inactiveTalents = new characterTalents ($obj['talents'][1]);
	    else
		return $this->inactiveTalents = new characterTalents ($obj['talents'][0]);
	}
    }
    
    private function fetchSubObject($template,$class)
    {
	if ($this->$template !== null) //was this object already fetched?
	    return $this->$template;
	else if (isset($this->_creation_object[$template])) //was this object returned with the original api call?
		return $this->$template = new $class($this->_creation_object[$template]);
	else //get this data then...
	{
	    $temp = resource_character::$instance->getCharacterAsArray($this->name, $this->realm, array($template));
	    return $this->$template = new $class($temp[$template]);
	}
    }
}