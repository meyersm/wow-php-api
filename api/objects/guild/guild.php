<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of guild
 *
 * @author michaelmeyers
 */
class guild extends object_base
{
   
    public $name;
    public $level;
    public $side;
    public $achievementPoints;
    public $realm;
    
    
    /**
     * @var achievementList
     */
    private $achievements;
    /**
     * @var guildMembers
     */
    private $members;
    
    private $_creation_object;
    
    public function __construct(array $response_object)
    {
	    parent::__construct($response_object);
	
    }
    
    
    /**
     * @return achievements
     */
    public function getAchievements()
    {
	    return $this->fetchSubObject("achievements", "achievementList");
    }
    /**
     * @return guildMembers
     */
    public function getMembers()
    {
	    return $this->fetchSubObject("members", "guildMembers");
    }
    
    
    private function fetchSubObject($template,$class)
    {
        if ($this->$template !== null) //was this object already fetched?
            return $this->$template;
        else if (isset($this->_creation_object[$template])) //was this object returned with the original api call?
            return $this->$template = new $class($this->_creation_object[$template]);
        else //get this data then...
        {
            $temp = resource_guild::$instance->getGuildAsArray($this->name, $this->realm, array($template));
            return $this->$template = new $class($temp[$template]);
        }
    }
}


