<?php


/**
 * Description of characterAchievements
 *
 * @author michaelmeyers
 */
class achievementList extends object_base
{
    public $achievementsCompleted = array();
    public $achievementsCompletedTimestamp = array();
    public $criteria = array();
    public $criteriaQuantity = array();
    public $criteriaTimestamp = array();
    public $criteriaCreated = array();
    
    
    public function __construct(array $response_object)
    {
	parent::__construct($response_object);
	foreach ($response_object as $key => $val)
	{
	    $this->$key = $val;
	}
    }
}