<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of itemList
 *
 * @author michaelmeyers
 */
class itemList extends list_base
{
    public function __construct($json_array)
    {
       $this->iter_pos = 0;
       foreach ($json_array as $key => $value)
       {
	   $this->_internal_array[] = new item($value);
       }
    }
    
    /**
     * @return item
     */
    public function walkList()
    {
	    parent::walkList();
    }
}