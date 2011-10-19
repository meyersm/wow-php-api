<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of arenaTeamMember
 *
 * @author michaelmeyers
 */
class arenaTeamMember extends object_base
{
    /**
     * @var character
     */
    public $character;
    
    public $rank;
    public $gamesPlayed;
    public $gamesWon;
    public $gamesLost;
    public $sessionGamesPlayed;
    public $sessionGamesWon;
    public $sessionGamesLost;
    public $personalRating;
    
    public function __construct(array $response_object)
    {
	parent::__construct($response_object);
	$this->character = new character($response_object['character']);
    }
}

?>
