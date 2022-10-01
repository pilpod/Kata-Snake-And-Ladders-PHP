<?php

namespace Tests;

use App\Dice;
use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase {

    private Dice $dice;

    protected function setUp() : void
    {
        $this->dice = new Dice;
    }

    /** @test */
    public function test_dice_value_1_to_6()
    {
        $this->dice->roll();
        $result = $this->dice->getScore();
        
        $this->assertIsInt($result);
        $this->assertGreaterThanOrEqual(1, $result);
        $this->assertLessThanOrEqual(6, $result);
    }
    
    
}