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
}
