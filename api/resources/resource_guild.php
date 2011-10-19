<?php

/**
 * Description of resource_guild
 *
 * @author michaelmeyers
 */
class resource_guild extends resource_base
{
    /**
     *
     * @var resource_guild
     */
    public static $instance = null; //The last instance of resource_guild created. Used for objects that need to make additional calls	
    private $guild_uri_base = "/api/wow/guild/";
    private $all_fields = "achievements,members";
    
    public function __construct($uri)
    {
	parent::__construct($uri);
	resource_guild::$instance = $this;
    }
    
    
    
    public function getGuild($guild,$realm,array $fields = null)
    {
	if ($fields != null)
	    $fields = array('fields' =>(implode(',', $fields)));
	$obj = $this->send($this->guild_uri_base . $realm .'/' . $guild,$fields);
	return new guild($obj);
    }
    
    
    public function getGuildWithAllFields($guild,$realm)
    {
	$obj = $this->send($this->guild_uri_base . $realm .'/' . $guild,$this->all_fields);
	return new guild($obj);
    }
    
    public function getGuildAsArray($guild,$realm,array $fields=null)
    {
	if ($fields != null)
	    $fields = array('fields' =>(implode(',', $fields)));
	$obj = $this->send($this->guild_uri_base . $realm .'/' . $guild,$fields);
	return $obj;
    }
}
