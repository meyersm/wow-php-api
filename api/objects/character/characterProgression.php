<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of characterProgression
 *
 * @author michaelmeyers
 */
class characterProgression extends object_base
{
    public $raids;
    
    
    public function __construct(array $response_object)
    {
	parent::__construct($response_object);
	$this->raids = $response_object['raids'];
    }
}

?>
