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
            21 => 42,
            28 => 84,
            36 => 44,
            51 => 67,
            71 => 91,
            78 => 98,
            87 => 94
        ];

        foreach ($ladders as $initSquare => $endSquare) {
            if ($player->getPosition() == $initSquare) $player->setPosition($endSquare);
        }   
    }

    public static function isSnake(Player $player) : void 
    {
        $snakes = [
            16 => 6,
            46 => 25,
            49 => 11,
            62 => 19,
            64 => 60,
            74 => 53,
            89 => 68,
            92 => 88,
            95 => 75,
            99 => 80
        ];

        foreach ($snakes as $snakeMouth => $snakeTail) {
            if ($player->getPosition() == $snakeMouth) $player->setPosition($snakeTail);
        }
    }
}
