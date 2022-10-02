<?php

namespace App;

class Player
{

     private string $name;
     private int $position;

     public function __construct(string $name)
     {
          $this->name = $name;
          $this->position = 0;
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

     public function moveToSquare(int $score): void
     {
          $this->position += $score;
     }
}
