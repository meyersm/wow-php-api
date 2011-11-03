<?php

require "../api/api.php";

class me{
    
    static function bla ($data)
    {
	print "SDGSDDGSDGS $data";
    }
}


$api = new wowApi();
//$data = $api->item->getItem(62354);


//foreach ($api->item->getItemList($api->character->getCharacter("grimskull","destromath")->getCompanions()->asArray()) as $key => $val)
 //  print "$val->name <br/>";
 wowApiErrorlogger::$error_level = wowApiErrorlogger::ALL;
 wowApiErrorlogger::$error_log_method = wowApiErrorlogger::LOG_FUNC;
 //print wowApiErrorlogger::$error_log_method;
 
 wowApiErrorlogger::$error_log_function = "me::bla";
 
 
$guild = $api->guild->getGuild("Reagent Vendor", "destromath");
print_r($guild);
//print_r($guild->getAchievements());
//print_r($guild->getMembers());
/*
print_r($data->getAchievements());
print_r($data->getAppearance());
print_r($data->getCompanions());
print_r($data->getGuild());
print_r($data->getItems());
print_r($data->getMounts());
*/
//  print_r($data->getPets());
/*print_r($data->getProfessions());
print_r($data->getProgression());
print_r($data->getPvP());
print_r($data->getQuests());
print_r($data->getReputations());
print_r($data->getStats());
print_r($data->getActiveTalents());
print_r($data->getInactiveTalents());
print_r($data->getTitles());
*/
print_r($data);

?>