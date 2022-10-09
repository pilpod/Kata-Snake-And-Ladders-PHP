<?php

namespace App;

class Game
{
    private SnakesLadders $snakesLadders;
    private Player $playerOne;
    private Player $playerTwo;

    public function __construct($game) {
        $this->snakesLadders = $game;
    }

    public function start(Player $playerOne,Player $playerTwo) : string
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;

        $dice1 = new Dice;
        $dice2 = new Dice;

        if ($this->checkIfIsGameOver($this->playerOne,$this->playerTwo)) {
            return "Game Over";
        }

        if ($playerOne->getTurnToPlay()) {
            $dice1->roll();
            $dice2->roll();
            $this->snakesLadders->setPlayer($playerOne);
            $result = $this->snakesLadders->play($dice1,$dice2);
            $this->playerOne->setTurnToPlay(false);
            $this->playerTwo->setTurnToPlay(true);
            return $result;
        }

        if ($playerTwo->getTurnToPlay()) {
            $dice1->roll();
            $dice2->roll();
            $this->snakesLadders->setPlayer($playerTwo);
            $result = $this->snakesLadders->play($dice1,$dice2);
            $this->playerOne->setTurnToPlay(true);
            $this->playerTwo->setTurnToPlay(false);
            return $result;
        }

        return "Ups...";
    }

    public function checkIfIsGameOver($playerOne,$playerTwo) : bool
    {
        if (
            $playerOne->getPosition() === $this->snakesLadders->getBoard()->getMaxSquares() || $playerTwo->getPosition() === $this->snakesLadders->getBoard()->getMaxSquares()
        ) {
            return true;
        }

        return false;
    }
}
