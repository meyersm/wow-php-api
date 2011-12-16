<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of arrayObj_base
 *
 * @author michaelmeyers
 */
class list_base implements ArrayAccess,Countable,Iterator
{
    protected $_internal_array;
    protected $iter_pos;
    
    
    public function __construct($json_array) //This constructor will need to be overriden for objects with multi-dimensional arrays
    {
	$this->iter_pos = 0;
	$this->_internal_array = $json_array;
    }
    
    /**
     * Extend for proper type-hinting
     */
    public function walkList()
    {
        if (isset($this->_internal_array[$this->iter_pos]))
            return $this->_internal_array[$this->iter_pos++];
        $this->iter_pos = 0; //Reset
        return false;
    }
    
    //Implemented functions below
    
    public function count()
    {
	return count($this->_internal_array);
    }
    
   public function offsetExists($offset)
   {
       return isset($this->_internal_array[$offset]);
   }
   
   public function offsetGet($offset)
   {
       return isset($this->_internal_array[$offset]) ? $this->_internal_array[$offset] : null;
   }
   
   public function offsetSet($offset, $value)
   {
        if (is_null($offset)) 
            $this->_internal_array[] = $value;
        else 
            $this->_internal_array[$offset] = $value;
   }
   
   public function offsetUnset($offset)
   {
       unset($this->_internal_array[$offset]);
   }
   
   public function current()
   {
       return $this->_internal_array[$this->iter_pos];
   }
   
   public function key()
   {
       return $this->iter_pos;
   }
   
   public function next()
   {
       ++$this->iter_pos;
   }
   
   public function rewind()
   {
       $this->iter_pos = 0;
   }
   
   public function valid()
   {
       return isset($this->_internal_array[$this->iter_pos]);
   }
   
   public function getIterator()
   {
       return new ArrayIterator($this);
   }
  
   public function asArray()
   {
       return $this->_internal_array;
   }
   
   public function __get($name) 
   {
       if ($name == "_isEmpty")
           return empty($this->_internal_array);
   }
   
}