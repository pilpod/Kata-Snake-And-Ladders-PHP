<?php

namespace Tests;

use App\Dice;
use App\Player;
use App\SnakesLadders;
use PHPUnit\Framework\TestCase;

class SnakesLaddersTest extends TestCase {

    private SnakesLadders $snakeLadders;

    protected function setUp() : void 
    {
        $this->snakeLadders = new SnakesLadders;   
    }
    
    /** @test */
    public function test_when_game_play_roll_dices_and_retrieve_sum_of_dices() : void
    {
        $dice1 = new Dice;
        $dice2 = new Dice;

        $dice1->roll();
        $dice2->roll();
        $result = $this->snakeLadders->dicesSum($dice1,$dice2);

        $this->assertIsInt($result);
        $this->assertGreaterThanOrEqual(2, $result);
        $this->assertLessThanOrEqual(12, $result);
    }
    
}