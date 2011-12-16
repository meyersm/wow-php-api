<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dataItemTypes
 *
 * @author michaelmeyers
 */
class dataItemTypes extends object_base
{
    public $itemTypes;
    
    public function __construct(array $response_object)
    {
        foreach ($response_object as $k => $v)
        {
            $this->itemTypes[$v['class']] = $v;
        }
    }
    
    public function getTypebyClass($class)
    {
	    return $this->itemTypes[$class];
    }
}
