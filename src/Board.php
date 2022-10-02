<?php

namespace App;

class Board
{
    private int $maxSquares = 100;

    public function __construct() {
        
    }

    /**
     * Get the value of maxSquares
     */ 
    public function getMaxSquares()
    {
        return $this->maxSquares;
    }

    public static function isLadder(Player $player) : void
    {
        $ladders = [
            2 => 38,
            7 => 14,
            15 => 26,
        ];

        foreach ($ladders as $initSquare => $endSquare) {
            if ($player->getPosition() == $initSquare) $player->setPosition($endSquare);
        }   
    }
}
