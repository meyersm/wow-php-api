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
	return $this->send($this->data_base_uri . "character/races");
    }
    
    public function getClasses()
    {
	return $this->send($this->data_base_uri . "character/classes");
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
	return $this->send($this->data_base_uri . "item/classes");
    }
    
    
}
