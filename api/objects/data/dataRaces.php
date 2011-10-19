<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dataRaces
 *
 * @author michaelmeyers
 */
class dataRaces extends object_base
{
    
    public $races;
    
    public function __construct(array $response_object)
    {
	foreach ($response_object as $k => $v)
	{
	    $this->races[$v['id']] = $v;
	}
    }
    
    public function getbyId($id)
    {
	return $this->races[$id];
    }
    
    public function getNamebyId($id)
    {
	return $this->races[$id]['name'];
    }
    
    public function getSidebyId($id)
    {
	return $this->races[$id]['side'];
    }
    
    
}