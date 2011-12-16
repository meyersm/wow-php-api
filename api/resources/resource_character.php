<?php

/**
 * Description of resource_character
 *
 * @author michaelmeyers
 */
class resource_character extends resource_base
{
    /**
     *
     * @var resource_character
     */
    public static $instance = null; //The last instance of resource_character created. Used for objects that need to make additional calls	
    private $character_uri_base = "/api/wow/character/";
    private $all_fields = "guild,stats,talents,items,reputation,titles,professions,appearance,companions,mounts,pets,achievements,progression,pvp,quests";
  
    public function __construct($uri)
    {
        parent::__construct($uri);
        resource_character::$instance = $this;
    }
    
	/**
	 *
	 * @param string $character
	 * @param string $realm
	 * @return character 
	 */
	public function getCharacter($character,$realm,array $fields = null)
	{   
	    if ($fields != null)
		$fields = array('fields' =>(implode(',', $fields)));
	    $obj = $this->send($this->character_uri_base . $realm .'/' . $character,$fields);
	    return new character($obj);
	}    
	
	
	public function getCharacterWithAllFields($character,$realm)
	{
	    $obj = $this->send($this->character_uri_base . $realm .'/' . $character,array('fields' => $this->all_fields));
	    return new character($obj);	    
	}
	
	public function getCharacterAsArray($character,$realm,array $fields = null)
	{
	    if ($fields != null)
		$fields = array('fields' =>(implode(',', $fields)));
	    $obj = $this->send($this->character_uri_base . $realm .'/' . $character,$fields);
	    return $obj;
	}
}