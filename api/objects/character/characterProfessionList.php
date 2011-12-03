<?php


/**
 * Description of characterProfessionList
 *
 * @author michaelmeyers
 */
class characterProfessionList extends list_base
{
      
    public function __construct($json_array)
    {
	foreach ($json_array['primary'] as $key => $profession)
	{
	    $this->_internal_array[] = new characterProfession($profession);
	}
	foreach ($json_array['secondary'] as $key => $profession)
	{
	    $this->_internal_array[] = new characterProfession($profession);
	}
    }
}
