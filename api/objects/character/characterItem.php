<?php

/**
 * Description of characterItem
 *
 * @author michaelmeyers
 */
class characterItem extends object_base
{
    public $id;
    public $name;
    public $icon;
    public $quality;
    public $gems;
    public $enchant;
    public $item_set;
    
    public function __construct(array $response_object)
    {
	parent::__construct($response_object);
	if (!isset($response_object['tooltipParams']) || (empty ($response_object['tooltipParams'])))
	    return;
	foreach ($response_object['tooltipParams'] as $key => $val)
	{
	    if ($key == 'enchant')
		$this->enchant = $val;
	    else if ($key == 'set')
		$this->item_set = $val;
	    else if (strpos($key, 'gem') !== false)
		  $this->gems[] = $val;
	}
    }
}

?>
