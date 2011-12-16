<?php


/**
 * Description of request_base
 *
 * @author michaelmeyers
 */
class resource_base
{
    /**
     * @var uriRequest
     */
    private $uriReq;
    
    public function __construct($uri)
    {
	    $this->uriReq = $uri;
    }
    
    public function send($uri,$parameters=null)
    {
	    return $this->uriReq->request($uri, $parameters);
    }
    
}

?>