<?php


/**
 * Description of resource_realm
 *
 * @author michaelmeyers
 */
class resource_realm extends resource_base
{
    private $realm_base_uri = "/api/wow/realm/status";
    
    /**
     * @return realm
     */
    public function getRealm($realm)
    {
        $data = $this->send($this->realm_base_uri,array("realms"=>$realm));
        return new realm($data['realms'][0]);
    }
    
    /**
     * @return realm[]
     */
    public function getRealms(array $list=null)
    {
        if ($list == null)
        {
            $data = $this->send($this->realm_base_uri);
            return new realmList($data['realms']);
        }
        else
        {
            $list = implode(",", $list);
            $data = $this->send($this->realm_base_uri,array("realms"=>$list));
            return new realmList($data['realms']);
        }
	    
    }
    
    
}
