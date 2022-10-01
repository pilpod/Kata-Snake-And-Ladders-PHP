<?php

namespace Tests;

use App\Dice;
use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase {

    private Dice $dice1;
    private Dice $dice2;

    protected function setUp() : void
    {
        $this->dice1 = new Dice;
        $this->dice2 = new Dice;
    }

    /** @test */
    public function test_dice_value_1_to_6()
    {
        $this->dice1->roll();
        $result = $this->dice1->getScore();
        
        $this->assertIsInt($result);
        $this->assertGreaterThanOrEqual(1, $result);
        $this->assertLessThanOrEqual(6, $result);
    }
    
    
}