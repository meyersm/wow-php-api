<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of characterProfessions
 *
 * @author michaelmeyers
 */
class characterProfession extends object_base
{
    public $id;
    public $name;
    public $icon;
    public $rank;
    public $max;
    public $recipes = array();
    
    public function __construct($json_array)
    {
	parent::__construct($json_array);
	$this->recipes = $json_array['recipes'];		
    }
    
}

?>
