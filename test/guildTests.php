<?php

require_once "apiTests.php";

class guildTests extends apiTests
{

    public function testGetGuild()
    {
        $guild = $this->api->guild->getGuild("reagent vendor","destromath");
        $this->assertEquals("Destromath",$guild->realm);
        return $guild;
    }

    /**
     * @depends testGetGuild
     */
    public function testGetMembers($guild)
    {
        $members = $guild->getMembers();
        $this->assertEquals("Destromath",$members[0]->realm);
    }

    /**
     * @depends testGetGuild
     */
    public function testGetAchievements($guild)
    {
       $this->assertEquals(4943,$guild->getAchievements()->achievementsCompleted[0]);
    }
}
