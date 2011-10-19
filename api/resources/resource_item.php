<?php

/**
 * Description of resource_item
 *
 * @author michaelmeyers
 */
class resource_item extends resource_base
{
       private $item_uri_base = "/api/wow/item/";
       
       public function getItem($id)
       {
	    $obj = $this->send($this->item_uri_base .'/' . $id);
	    return new item($obj);
       }
       
       public function getItemList(array $id_array)
       {
	   $obj = array();
	   foreach ($id_array as $key => $val)
	   {
	       $obj[] = $this->send($this->item_uri_base .'/' . $val);
	   }
	   return new itemList($obj);
       }
}

?>
