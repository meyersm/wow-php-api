<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of resource_pvp
 *
 * @author michaelmeyers
 */
class resource_pvp extends resource_base
{

    /**
     * @param $type "2v2"  "3v3"  "5v5"  "rbg"
     * @return dataLeaderboard
     */
    public function getLeaderboard($type)
    {
        $lb =  $this->send("/api/wow/leaderboard/".$type);
        return new dataLeaderboard($lb);
    }
}
