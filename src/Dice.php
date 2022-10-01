<?php

namespace App;

class Dice {

    private int $score;

    public function roll() : void
    {
        $this->score = random_int(1,6);
    }


    /**
     * Get the value of score
     */ 
    public function getScore() : int
    {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @return  self
     */ 
    public function setScore($score) : object
    {
        $this->score = $score;

        return $this;
    }
}