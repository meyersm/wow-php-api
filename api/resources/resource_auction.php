<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of resource_auction
 *
 * @author michaelmeyers
 */
class resource_auction extends resource_base
{
   public $base_url = "/api/wow/auction/data/";

    public function getFileLocation($realm)
    {
        return $this->send($this->base_url . $realm);
    }

    public function getAuctionsIfNewer($realm,$timestamp)
    {
        $info = $this->getFileLocation($realm);
        if ($info['files'][0]['lastModified'] > $timestamp)
            return $this->getAuctions($realm,$info['files'][0]['url']);
    }

    public function getAuctions($realm,$file=null)
    {
        if ($file == null)
        {
            $info = $this->getFileLocation($realm);
            $file = $info['files'][0]['url'];
        }
        $curl = curl_init($file);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $ret = curl_exec($curl);
        if ($ret === false)
            return false;
        return json_decode($ret);

    }



}
