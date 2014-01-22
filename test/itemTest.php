<?php


require_once "apiTests.php";
class itemTest extends apiTests{


    public function testGetItem()
    {
        $item = $this->api->item->getItem(16955);
        $this->assertEquals('Judgement Crown',$item->name);
    }

}
 