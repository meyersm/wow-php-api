<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of characterTalents
 *
 * @author michaelmeyers
 */
class characterTalents extends object_base
{
    public $name;
    public $icon;
    public $build;
    public $trees = array();
    public $glyphs_prime = array();
    public $glyphs_major = array();
    public $glyphs_minor = array();
    
    
    public function __construct(array $response_object)
    {
	parent::__construct($response_object);
	$this->trees = $response_object['trees'];
	$this->glyphs_prime = $response_object['glyphs']['prime'];
	$this->glyphs_major = $response_object['glyphs']['major'];
	$this->glyphs_minor = $response_object['glyphs']['minor'];
    }
}

?>
