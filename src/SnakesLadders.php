<?php
namespace App;

class SnakesLadders {

    private ?Player $player;
    private Board $board;

    public function __construct(?Player $player = null) {
        $this->player = $player;
        $this->board = new Board;
    }

    /**
     * Get the value of player
     */ 
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set the value of player
     *
     * @return  self
     */ 
    public function setPlayer($player)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get the value of board
     */ 
    public function getBoard()
    {
        return $this->board;
    }

    public function play(Dice $dice1, Dice $dice2) : string
    {
        $score = $this->dicesSum($dice1->getScore(),$dice2->getScore());
        $this->player->moveToSquare($score);
        Board::isLadder($this->player);
        Board::isSnake($this->player);

        if ($this->player->getPosition() === $this->board->getMaxSquares()) {
            return "Player {$this->player->getName()} Wins";
        }

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