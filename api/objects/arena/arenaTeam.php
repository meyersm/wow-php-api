<?php


/**
 * Description of arenaTeam
 *
 * @author michaelmeyers
 */
class arenaTeam extends object_base
{
    public $realm;
    public $ranking;
    public $rating;
    public $teamsize;
    public $created;
    public $name;
    public $gamesPlayed;
    public $gamesWon;
    public $gamesLost;
    public $sessionGamesPlayed;
    public $sessionGamesWon;
    public $sessionGamesLost;
    public $lastSessionRanking;
    public $side;
    public $currentWeekRanking;
    
    /**
     *
     * @var arenaTeamMember
     */
    public $members = array();
    
    public function __construct($response_object)
    {
	parent::__construct($response_object);
    if (!$this->_isEmpty)
        foreach ($response_object['members'] as $k => $v)
        {
            if ($v === null) //Member array can be blank in some cases
            return;
            $this->members[] = new arenaTeamMember($v);
        }
    }


}