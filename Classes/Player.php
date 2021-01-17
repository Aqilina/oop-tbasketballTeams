<?php

class Player
{
    private $name;
    private $lastname;
    private $height;
    private $position;
    private $t_shirt_number;

    public function __construct($playerName, $playerLastname, $playerHeight, $playerPosition, $playerShirtNumber)
    {
        $this->name = $playerName;
        $this->lastname = $playerLastname;
        $this->height = $playerHeight;
        $this->position = $playerPosition;
        $this->t_shirt_number = $playerShirtNumber;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return mixed
     */
    public function getTShirtNumber()
    {
        return $this->t_shirt_number;
    }
}