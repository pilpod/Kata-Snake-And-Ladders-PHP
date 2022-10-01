<?php

namespace App;

class Player {
     private int $position;

     public function __construct() {
        $this->position = 1;
     }

     /**
      * Get the value of position
      */ 
     public function getPosition() : int
     {
          return $this->position;
     }

     /**
      * Set the value of position
      *
      * @return  self
      */ 
     public function setPosition($position) : object
     {
          $this->position = $position;

          return $this;
     }

     public function moveToSquare(int $score) : void
     {
          $this->position += $score;
     }
}