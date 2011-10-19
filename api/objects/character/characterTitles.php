<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of characterTitles
 *
 * @author michaelmeyers
 */
class characterTitles extends object_base
{
    public $currentTitle;
    private $_titleList = array();
    
    public function __construct(array $json_array)
    {
	foreach ($json_array as $key => $val)
	{
	    $this->_titleList[$val['id']] = $val;
	    if (isset ($val['selected']))
		$this->currentTitle = $val['name'];
	}
    }
}

?>
