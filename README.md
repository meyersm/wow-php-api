wow-php-api
===========

PHP wrapper for Blizzard World of Warcraft Api

[Blizzard Api Docs](http://blizzard.github.io/api-wow-docs/)


How to use
----------

Include the `api.php` file and the libraries autoloader will handle loading other api files
```php
require "api/api.php";
$wowapi = new wowApi();
$data = $api->item->getItem(62354);
```

If you are using a IDE with autocomplete you will see all the different resources availible, and functions within those resources.

Examples
```php
$wow = new wowApi();

//Just gets the base character data
$char = $wow->character->getCharacter("character","realm"); 
//This will trigger another api call to fetch mount info
$mounts = $char->getMounts(); 
//This fetches the character with ALL the sub fields, this object will be much larger
$anotherChar = $wow->character->getCharacterWithAllFields("char","realm"); 
//This will NOT trigger another api call because this data was already fetched
$app = $anotherChar->getAppearance();

$item = $wow->item->getItem(8529); //Get item by id
print $item->name; //Noggenfogger Elixer

//Get current auctions for a realm (This will be a large object and may take a few seconds to retrieve)
$auctions = $wow->auction->getAuctions("MyRealm");

$guild = $wow->guild->getGuild("MyGuild","Somerealm"); //Get a guild
$guildName_Members = $guild->getMembers(); //Get the members
//For list objects they implement ArrayAccess,Countable,Iterator
print $guildName_Members->count(); 
for ($i=0;$i < $guildName_Members->count();$i++)
{
    $member = $guildName_Members[$i]; //Array access
    print $member->name . "\n";
}
print "\n---\n";
//You can also use Foreach
foreach ($guildName_Members as $k => $val)
    print $val->name . "\n"; //Iterator

//list a characters equipped items
foreach ($wow->character->getCharacter("character","realm")->getItems() as $key => $val)
{
    if (isset($val->name))
        print $val->name . "\n";
}
```

For more examples take a look at the [unit tests](test/)


Logging
-------

You can set error logging levels of Debug, Notice, Warn, Error. 

You can also set different methods of error logging: None, default php error log, custom file, custom static function
```php
wowApiErrorlogger::$error_level = wowApiErrorlogger::ALL;
wowApiErrorlogger::$error_log_method = wowApiErrorlogger::LOG_FUNC;
wowApiErrorlogger::$error_log_function = "Classname::StaticFunction"; //This will be called with error string passed
```
[Refer to wowApiErrorLogger class for logging details](api/error/wowApiErrorLogger.php)
