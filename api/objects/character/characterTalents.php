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
    public $selected;
    public $calcTalent;
    public $calcSpec;
    public $calcGlyph;

    public $glyphs_prime = array();
    public $glyphs_major = array();
    public $glyphs_minor = array();
    
    
    public function __construct(array $response_object)
    {
	parent::__construct($response_object);
    }
}

?>
