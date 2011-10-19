<?php


/**
 * Description of wowApiException
 *
 * @author michaelmeyers
 */
class wowApiException
{
    public $error;
    public $file;
    public $line;
    public $server_error;
    public $raw_response;
    public $request_uri;
    
    public function __construct($error,$file,$line,$server_error_type=null,$raw_response=null,$request_uri=null)
    {
	$this->error = $error;
	$this->file = $file;
	$this->line = $line;
	$this->server_error = $server_error_type;
	$this->raw_response = $raw_response;
	$this->request_uri = $request_uri;
    }
    
}

?>
