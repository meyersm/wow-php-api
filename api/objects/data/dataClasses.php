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
    public $classesId;
    
    public function __construct(array $response_object)
    {
        foreach ($response_object['classes'] as $k => $v)
        {
            $this->classes[$v['name']] = $v;
            $this->classesId[$k] = $v;
        }
    }

    public function getByClass($class)
    {
	    return $this->classes[$class];
    }

    public function getNameById($id)
    {
        return $this->classesId[$id]['name'];
    }

  
}
