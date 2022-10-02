<?php
namespace App;

class SnakesLadders {

    private Player $player;

    public function __construct(Player $player) {
        $this->player = $player;
    }

    public function play(Dice $dice1, Dice $dice2) : string
    {
        $score = $this->dicesSum($dice1->getScore(),$dice2->getScore());
        $this->player->moveToSquare($score);
        Board::isLadder($this->player);

        if ($dice1->getScore() == $dice2->getScore()) {
            return "Player {$this->player->getName()} roll dices again";
        }
        
        return "Player {$this->player->getName()} is on square {$this->player->getPosition()}";
    }

    public function dicesSum(int $dice1, int $dice2) : int
    {
        $sum = $dice1 + $dice2;

        return $sum;
    }
}