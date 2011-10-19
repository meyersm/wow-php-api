<?php
/**************
 * 
 * 
 * LEGAL
 * BLOCK
 * 
 * 
 * 
 **************/

/*
 * API INFO
 * 
 */

require 'core/loader.php';





class wowApi
{
    
    public $region;
    public $locale;
    

    /** @var uriRequest */
    private $uriReq;
    private $loader;
    
    
    //Resources
    /**
     * @var resource_auction
     */
    public $auction;
    /**
     * @var resource_character
     */
    public $character;
    /**
     * @var resource_data
     */
    public $data;
    /**
     * @var resource_guild
     */
    public $guild;
    /**
     * @var resource_item
     */
    public $item;
    /**
     * @var resource_pvp
     */
    public $pvp;
    /**
     * @var resource_realm
     */
    public $realm;
    
    
    public function __construct($region="us",$locale="en_US",$publicKey=null,$privateKey=null,$ssl=false)
    {
	$this->loader = new loader(dirname(__FILE__));
	$this->region = $region;
	$this->locale = $locale;
	
	$host = $this->getHostByRegion($region);
	$this->uriReq = new uriRequest($host, $locale, $publicKey, $privateKey, $ssl);
	$this->loadResources();
	
    }
    
    
    public function getHostByRegion($region)
    {
	
	switch ($region)
	{
	    case "us":
	    case "US":
		return wow_php_static::$REGION_US;
	    case "eu":
	    case "EU":
		return wow_php_static::$REGION_EU;
	    case "kr":
	    case "KR":
		return wow_php_static::$REGION_KR;
	    case "tw":
	    case "TW":
		return wow_php_static::$REGION_TW;
	    case "cn":
	    case "CN":
		return wow_php_static::$REGION_CN;
	    default :
		throw new wowApiException("Invalid region", __FILE__, __LINE__);
	}
    }
    
    private function loadResources()
    {
	$this->auction	    = new resource_auction($this->uriReq);
	$this->character    = new resource_character($this->uriReq);
	$this->data	    = new resource_data($this->uriReq);
	$this->guild	    = new resource_guild($this->uriReq);
	$this->item	    = new resource_item($this->uriReq);
	$this->pvp	    = new resource_pvp($this->uriReq);
	$this->realm	    = new resource_realm($this->uriReq);
    }
    
}