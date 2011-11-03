<?php






/**
 * Description of loader
 *
 * @author michaelmeyers
 */
class loader
{
    static $ROOT_DIR;
    
    public function __construct($root_dir)
    {
	loader::$ROOT_DIR = $root_dir;
	require_once "auth.php";
	require_once "static.php";
	require_once "uriRequest.php";

	require_once $root_dir . DIRECTORY_SEPARATOR . "objects" . DIRECTORY_SEPARATOR . "object_base.php";
	require_once $root_dir . DIRECTORY_SEPARATOR . "objects" . DIRECTORY_SEPARATOR . "list_base.php";
	require_once $root_dir . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR . "resource_base.php";
	require_once $root_dir . DIRECTORY_SEPARATOR . "error" . DIRECTORY_SEPARATOR . "wowApiException.php";
	require_once $root_dir . DIRECTORY_SEPARATOR . "error" . DIRECTORY_SEPARATOR . "wowApiErrorLogger.php";
	
	spl_autoload_register(array('loader', 'auto_load'));
    }
    
    public function __destruct()
    {
	spl_autoload_unregister(array('loader', 'auto_load'));
    }
    
    
    
    static function auto_load($class_name)
    {
	if (strpos($class_name, "resource") !== false)
	{
	    if (is_file(loader::$ROOT_DIR . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR . $class_name . ".php"))
		include (loader::$ROOT_DIR . DIRECTORY_SEPARATOR . "resources" . DIRECTORY_SEPARATOR . $class_name . ".php");
	}
	else
	{
	    $folder = preg_replace("([A-Z.].+)", "", $class_name); //Match the first uppercase character or . to use as object directory
	    if (is_file(loader::$ROOT_DIR . DIRECTORY_SEPARATOR . "objects" . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $class_name . ".php"))
		include (loader::$ROOT_DIR . DIRECTORY_SEPARATOR . "objects" . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $class_name . ".php");
	}
	
    }
    
}
