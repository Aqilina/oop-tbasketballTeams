<?php

class Team
{
    private $coach;
    private $teamName;
    private $teamLogo;
    private $players;

    public function __construct($teamCoach, $teamName, $teamLogo, $teamPlayers) {
        $this->coach = $teamCoach;
        $this->teamName = $teamName;
        $this->teamLogo = $teamLogo;
        $this->players = $teamPlayers;
    }

    /**
     * @return mixed
     */
    public function getCoach()
    {
        return $this->coach;
    }

    /**
     * @return mixed
     */
    public function getTeamName()
    {
        return $this->teamName;
    }

    /**
     * @return mixed
     */
    public function getTeamLogo()
    {
        return $this->teamLogo;
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        return $this->players;
    }
}