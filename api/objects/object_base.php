<?php


/**
 * Description of object_base
 *
 * @author michaelmeyers
 */
class object_base
{
    
    private $_orphans = array();
    public $lastModified;
    public $_isEmpty = false;
    public $_creationObject;
    
    protected function assignSimpleValues(array $json_array)
    {
        if (empty($json_array))
        {
            $this->_isEmpty = true;
            return;
        }
        $this->_creationObject = $json_array;
        foreach ($json_array as $key => $value)
        {
            if (!is_array($value))
            $this->$key = $value;
        }

    }
    
    public function __set($name,$value)
    {
        wowApiErrorlogger::log("Value $name does not exist in ". __CLASS__ ." but was found in response", __FILE__, __LINE__, wowApiErrorlogger::NOTICE);
        $this->_orphans[$name] = $value;
    }
    
    public function __get($name)
    {
	if (isset($this->_orphans[$name]))
	{
	    return $this->_orphans[$name];
	}
	wowApiErrorlogger::log("Value $name not found in ". __CLASS__ ." ", __FILE__, __LINE__, wowApiErrorlogger::NOTICE);
    }
    
    public function __construct($response_object)
    {
        if (!is_array($response_object))
        {
            $this->_isEmpty = true;
            return;
        }
        $this->assignSimpleValues($response_object);
        return $this;
    }
    
}

