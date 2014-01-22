<?php
/**
 * Created by PhpStorm.
 * User: meyers
 * Date: 1/21/14
 * Time: 4:55 PM
 */

require_once "apiTests.php";
class auctionTests extends apiTests
{

    public function testGetAuctionFileLoc()
    {
        $file = $this->api->auction->getFileLocation('destromath');
        $this->assertTrue(isset($file['files'][0]));
    }

    public function testGetAuction()
    {
        $auctions = $this->api->auction->getAuctions('destromath');
        $this->assertFalse(($auctions === false));
    }

}
 