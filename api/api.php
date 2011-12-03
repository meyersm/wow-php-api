<?php
/**************
Copyright (c) 2011  Michael Meyers

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 **************/

/*
 * Wow Php Api SDK
 * Source repository and usage information located at:
 * http://github.com/meyersm/wow-php-api
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