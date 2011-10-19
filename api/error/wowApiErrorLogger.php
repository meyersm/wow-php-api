<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logger
 *
 * @author michaelmeyers
 */
class wowApiErrorlogger
{
    const DEBUG   = 1;
    const NOTICE  = 2;
    const WARN    = 4;
    const ERROR   = 8;
    
    const ALL	  = 15;
    
    static $error_level = 8; //Default to only Errors
    /*
     * To set different error levels,
     *   wowApiErrorlogger::$error_level = wowApiErrorlogger::DEBUG | wowApiErrorlogger::ERROR;
     *   or
     *   wowApiErrorlogger::$error_level = wowApiErrorlogger::DEBUG | wowApiErrorlogger::NOTICE | wowApiErrorlogger::ERROR;
     *   ect..
     */
    const LOG_OFF	    = 0; //No logging
    const LOG_PHP	    = 1; //Default php error log
    const LOG_FILE	    = 2; //Log to file
    const LOG_FUNC	    = 3; //Call an outside function providing the error string. This can be used to integrate with an outside logging system
    
    static $error_log_method = 1; // ex: wowApiErrorlogger::$error_log_method = wowApiErrorlogger::LOG_OFF;
    static $error_log_file = "wowphpapi.log"; //Set this if using FILE method    
    protected static $error_log_file_handler = null;
    static $error_log_function = "error_log"; //Set this if using FUNC method. Can call static functions by doing "classname::my_error_handler";


    static function log($message,$file,$line,$level=1)
    {
	
	if (wowApiErrorlogger::$error_log_method == wowApiErrorlogger::LOG_OFF)
	    return;
	else if (wowApiErrorlogger::$error_log_method == wowApiErrorlogger::LOG_PHP)
	{
	    if ((wowApiErrorlogger::$error_level & $level) > 0)
		error_log("wowApiLogger:[$file][$line][$level]:$message");
	}
	else if (wowApiErrorlogger::$error_log_method == wowApiErrorlogger::LOG_FILE)
	{
	    if ((wowApiErrorlogger::$error_level & $level) > 0)
	    {
		if (wowApiErrorlogger::$error_log_file_handler == null)
		    wowApiErrorlogger::$error_log_file_handler = fopen(wowApiErrorlogger::$error_log_file, "a");
		fwrite(wowApiErrorlogger::$error_log_file_handler,"wowApiLogger:[$file][$line][$level]:$message");
	    }
	}
	else if (wowApiErrorlogger::$error_log_method == wowApiErrorlogger::LOG_FUNC)
	{
	    if ((wowApiErrorlogger::$error_level & $level) > 0)
	    {
		if (is_callable(wowApiErrorlogger::$error_log_function))
		    call_user_func (wowApiErrorlogger::$error_log_function,"wowApiLogger:[$file][$line][$level]:$message");
	    }
	}
    }
    
    
    
    
}