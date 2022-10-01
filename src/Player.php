<?php

namespace App;

class Player {
     private int $position;

     public function __construct() {
        $this->position = 0;
     }

     /**
      * Get the value of position
      */ 
     public function getPosition()
     {
          return $this->position;
     }

     /**
      * Set the value of position
      *
      * @return  self
      */ 
     public function setPosition($position)
     {
          $this->position = $position;

          return $this;
     }
}