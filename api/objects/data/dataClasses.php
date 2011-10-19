<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dataClasses
 *
 * @author michaelmeyers
 */
class dataClasses extends object_base
{
    public $classes;
    
    public function __construct(array $response_object)
    {
	foreach ($response_object as $k => $v)
	{
	    $this->classes[$v['id']] = $v;
	}
    }
    
    public function getbyId($id)
    {
	return $this->classes[$id];
    }
    
    public function getNamebyId($id)
    {
	return $this->classes[$id]['name'];
    }
    
    public function getPowerTypebyId($id)
    {
	return $this->classes[$id]['powerType'];
    }
  
}
