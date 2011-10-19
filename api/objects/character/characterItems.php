<?php


/**
 * Description of characterItems
 *
 * @author michaelmeyers
 */
class characterItems extends object_base
{
    public $averageItemLevel;
    public $averageItemLevelEquipped;
    
    
    public $head;
    public $neck;
    public $shoulder;
    public $back;
    public $chest;
    public $shirt;
    public $tabard;
    public $wrist;
    public $hands;
    public $waist;
    public $legs;
    public $feet;
    public $finger1;
    public $finger2;
    public $trinket1;
    public $trinket2;
    public $mainHand;
    public $offHand;
    public $ranged;
    
    public function __construct(array $response_object)
    {
	parent::__construct($response_object);
	foreach ($response_object as $key => $val)
	{
	    if (is_array($val) && !empty($val))
		$this->$key = new characterItem($val);
	}
    }
    
    
}

?>
