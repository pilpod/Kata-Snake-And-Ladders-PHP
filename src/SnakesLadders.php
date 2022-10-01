<?php
namespace App;

class SnakesLadders {

    

    public function __construct() {
        
    }

    public function play(Dice $dice1, Dice $dice2) : string
    {
        return "";
    }

    public function dicesSum(Dice $dice1, Dice $dice2) : int
    {
        $sum = $dice1->getScore() + $dice2->getScore();

        return $sum;
    }
}