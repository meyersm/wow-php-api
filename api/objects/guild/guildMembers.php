<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of guildMembers
 *
 * @author michaelmeyers
 */
class guildMembers extends list_base
{
   public function __construct($json_array)
   {
       $this->iter_pos = 0;
       foreach ($json_array as $key => $value)
       {
	   $value['character']['rank'] = $value['rank'];
	   $this->_internal_array[] = new character($value['character']);
       }
   }
    
   /**
    * @return character
    */
   public function walkList()
   {
       return parent::walkList();
   }
}
