<?php
require_once "apiTests.php";

class realmTest extends apiTests
{


    public function testGetRealm()
    {
        $realm = $this->api->realm->getRealm('destromath');
        $this->assertEquals('destromath',$realm->slug);
    }

}
 