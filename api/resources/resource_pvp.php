<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of resource_pvp
 *
 * @author michaelmeyers
 */
class resource_pvp extends resource_base
{
    private $pvp_base_uri = "/api/wow/arena";
    
    /**
     *
     * @param string $realm
     * @param string $name
     * @param string $size valid values: 2v2 3v3 5v5
     * @return arenaTeam 
     */
    public function getArenaTeam($realm,$name,$size="5v5")
    {
	$name = urlencode($name);
	$data = $this->send($this->pvp_base_uri . "/$realm/$size/$name");
	return new arenaTeam($data);
    }
    //TODO: this still needs testing, since members array is empty on initial tests.
}
