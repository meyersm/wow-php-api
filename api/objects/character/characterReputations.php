<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of characterReputations
 *
 * @author michaelmeyers
 */
class characterReputations extends object_base
{
    private $_reputationList = array();
    
    public function __construct(array $json_array)
    {
	foreach ($json_array as $key => $val)
	{
	    $this->_reputationList[$val['id']] = $val;
	}
    }
    
}

?>
