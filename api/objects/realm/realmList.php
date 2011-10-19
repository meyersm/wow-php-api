<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of realmList
 *
 * @author michaelmeyers
 */
class realmList extends list_base
{
   public function __construct($json_array)
   {
       $this->iter_pos = 0;
       foreach ($json_array as $key => $value)
       {
	   $this->_internal_array[] = new realm($value);
       }
   }
    
   /**
    * @return realm
    */
   public function walkList()
   {
       return parent::walkList();
   }
    
}
