<?php
namespace App;

class SnakesLadders {

    private Player $player;

    public function __construct(Player $player) {
        $this->player = $player;
    }

    public function play(Dice $dice1, Dice $dice2) : string
    {
        $dice1->roll();
        $dice2->roll();
        $score = $this->dicesSum($dice1,$dice2);
        $this->player->moveToSquare($score);
        return "Player {$this->player->getName()} is on square {$this->player->getPosition()}";
    }

    public function dicesSum(Dice $dice1, Dice $dice2) : int
    {
        $sum = $dice1->getScore() + $dice2->getScore();

        return $sum;
    }
}