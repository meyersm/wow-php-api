<?php


/**
 * Description of uriRequest
 *
 * @author michaelmeyers
 */
class uriRequest
{
    
    private $host;
    private $locale;
    
    private $use_auth = false;
    private $public_key = null;
    private $private_key = null;
    
    private $use_ssl;
    private $last_error;
    
    
    public function __construct($host,$locale,$public_key=null,$private_key=null,$ssl=false)
    {
	$this->host = $host;
	$this->locale = $locale;
	if ($public_key != null && $private_key != null)
	{
	    $this->use_auth = true;
	    $this->public_key = $public_key;
	    $this->private_key = $private_key;
	}
	$this->use_ssl = $ssl;
    }
    
    public function request ($uri,$parameters=null,$method="GET")
    {
	$uri .= "?locale=" . $this->locale;
	if (($parameters != null) && (is_array($parameters)))
	{
	    foreach ($parameters as $key => $value)
	    $uri .= "&" . $key . "=" . $value;
	}
	$uri = str_replace(" ", "%20", $uri); 
	$fullUri = $this->getHttp() . $this->host . $uri;
	$header = $this->getHeaders($uri,$method);
	$json = $this->curlRequest($fullUri, $header);
	if ($json === false)
	{
	    if ($this->last_error === 0)
		return $this->handleCurlError();
	    else
		return $this->handleRestError();
	}
	return json_decode($json, true);
	
    }
    
    private function getHeaders($uri,$method)
    {
	
	$date = gmdate(DATE_RFC822); //GMT Date
	
	if ($this->use_auth) //Add Auth headers
	{
	    $header[] = $this->getAuthString($uri, $method, $date);
	}
	$header[] = "Date: $date";
	return $header;
    }
    
    private function getAuthString($uri,$method,$date)
    {

    $StringToSign = $method . "\n" . $date + "\n" . $uri . "\n";

    $Signature = base64_encode((sha1(utf8_encode($this->private_key, $StringToSign))));

    $Header = "Authorization: BNET" . " " . $this->public_key . ":" . $Signature;
    return $Header;
    }
    
    
    private function curlRequest ($uri,$header)
    {
	wowApiErrorlogger::log("Sending api request to uri: $uri", __FILE__, __LINE__, wowApiErrorlogger::DEBUG);
	wowApiErrorlogger::log("Api request headers: ". implode(";", $header), __FILE__, __LINE__, wowApiErrorlogger::DEBUG);
	
	$curl = curl_init($uri);	
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
	curl_setopt($curl,CURLOPT_USERAGENT,wow_php_static::$INTERNAL_LIBRARY_NAME ."/" . wow_php_static::$INTERNAL_LIBRARY_VERSION);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$ret = curl_exec($curl);
	if ($ret === false)
	{
	    wowApiErrorlogger::log("Curl error occured:".  curl_error($curl), __FILE__, __LINE__, wowApiErrorlogger::ERROR);
	    $this->last_error = 0;
	    return false;
	}
	else 
	{
	    $error = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	    if ($error >= 300)
	    {
	    wowApiErrorlogger::log("Server returned error code: $error", __FILE__, __LINE__, wowApiErrorlogger::WARN);
	    $this->last_error = $error;
	    return false;
	    }
	}
	return $ret;
	
    }
    
    private function getHttp()
    {
	if ($this->use_ssl)
		return "https://";
	return "http://";
    }
    
    private function handleRestError()
    {
	//TODO: Rest errors should have the option to throw and error or call a callback function provided through the api
    }
    
    private function handleCurlError()
    {
	//TODO: Curl errors should throw an error. Curl errors are un-recoverable and will probably ruin the session but there should be a non Exception way to handle them as well.
    }
}