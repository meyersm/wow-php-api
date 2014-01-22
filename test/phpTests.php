<?php
/**
 * Created by PhpStorm.
 * User: meyers
 * Date: 1/21/14
 * Time: 4:35 PM
 */

require_once "apiTests.php";
class phpTests extends apiTests
{

    public function testLeaderboards()
    {
        $lb = $this->api->pvp->getLeaderboard('2v2');
        $this->assertFalse($lb->_isEmpty);
    }

}
 