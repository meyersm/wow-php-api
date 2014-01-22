<?php


/**
 * Description of characterPvP
 *
 * @author michaelmeyers
 */
class characterPvP extends object_base
{
    public $ratedBgRating;
    public $totalHonorableKills;
    
    public $battleground;
    
    public $battleground_ab;
    public $battleground_bfg;
    public $battleground_eots;
    public $battleground_sota;
    public $battleground_tp;
    public $battleground_wsg;
    
    public $arena_2v2;
    public $arena_3v3;
    public $arena_5v5;
    
    
    public function __construct(array $response_object)
    {
        parent::__construct($response_object);
        if (isset($response_object['ratedBattlegrounds']))
        {
            $this->ratedBgRating = $response_object['ratedBattlegrounds']['personalRating'];
            foreach ($response_object['ratedBattlegrounds']['battlegrounds'] as $key => $val)
            {
                $var = $this->fullBgNameToVar($val['name']);
                $temp = new characterPvPBattlegroundStat($val);
                if ($var !== null)
                    $this->$var = $temp;
                $this->battleground[] = $temp;
            }
        }
        else
            $this->ratedBgRating = null;

        if (empty($response_object['arenaTeams']))
            return $this;
        foreach ($response_object['arenaTeams'] as $key => $val)
        {
            $var = "arena_" . $val['size'];
            $this->$var = $val;
        }
    }
    
    
    private function fullBgNameToVar($name)
    {
	$name = strtolower($name);
	switch ($name)
	{
	    case "arathi basin":
		return "battleground_ab";
	    case "the battle for gilneas":
		return "battleground_bfg";
	    case "eye of the storm":
		return "battleground_eots";
	    case "strand of the ancients":
		return "battleground_sota";
	    case "twin peaks":
		return "battleground_tp";
	    case "warsong gulch":
		return "battleground_wsg";

	    default:
		return null;
		break;
	}
    }
    
}


/*
 * This class is required by characterPvP
 * This class is only used by characterPvP
 */
class characterPvPBattlegroundStat extends object_base
{
    public $name;
    public $played;
    public $won;
    
    public function winPercent()
    {
	if (($this->played < 1) || ($this->won < 1))
	    return 0;
	return round(($this->won / $this->played),5);
    }
}

/*
 * This class is required by characterPvP
 * This class is only used by characterPvP
 */
class characterPvPArenaTeam extends object_base
{
	public $name;
	public $personalRating;
	public $teamRating;
	public $size;
}