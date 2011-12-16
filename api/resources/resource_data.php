<?php

/**
 * Description of resource_data
 *
 * @author michaelmeyers
 */
class resource_data extends resource_base
{
    
    
    private $data_base_uri = "/api/wow/data/";
    
    public function getRaces()
    {
	    $data = $this->send($this->data_base_uri . "character/races");
        return new dataRaces($data);
    }
    
    public function getClasses()
    {
	    $data =  $this->send($this->data_base_uri . "character/classes");
        return new dataClasses($data);
    }
    
    public function getGuildRewards()
    {
	    return $this->send($this->data_base_uri . "guild/rewards");
    }
    
    public function getGuildPerks()
    {
	    return $this->send($this->data_base_uri . "guild/perks");
    }
    
    public function getItemClasses()
    {
	    $data =  $this->send($this->data_base_uri . "item/classes");
        return new dataClasses($data);
    }
    
    
}
