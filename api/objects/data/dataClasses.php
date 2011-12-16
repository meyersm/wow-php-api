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
        foreach ($response_object['classes'] as $k => $v)
        {
            $this->classes[$v['class']] = $v;
        }
    }

    public function getNamebyClass($class)
    {
	    return $this->classes[$id]['name'];
    }

  
}
