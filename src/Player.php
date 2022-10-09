<?php

namespace App;

class Player
{

     private string $name;
     private int $position;
     private bool $turnToPlay;

     public function __construct(string $name)
     {
          $this->name = $name;
          $this->position = 0;
          $this->turnToPlay = false;
     }

     /**
      * Get the value of name
      */
     public function getName()
     {
          return $this->name;
     }

     /**
      * Get the value of position
      */
     public function getPosition(): int
     {
          return $this->position;
     }

     /**
      * Set the value of position
      *
      * @return  self
      */
     public function setPosition($position): object
     {
          $this->position = $position;

          return $this;
     }

     public function getTurnToPlay()
     {
          return $this->turnToPlay;
     }

     public function setTurnToPlay(bool $state) : object
     {
          $this->turnToPlay = $state;

          return $this;
     }

     public function moveToSquare(int $score): void
     {
          $this->position += $score;
          
          if ($this->position > 100 ) {
               $squareBounceBack = $this->position - 100;
               $this->position = 100 - $squareBounceBack;
          }
     }
}
