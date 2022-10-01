<?php

namespace Tests;

use App\Dice;
use App\Player;
use App\SnakesLadders;
use PHPUnit\Framework\TestCase;

class SnakesLaddersTest extends TestCase {

    private SnakesLadders $snakeLadders;
    private Player $player;

    protected function setUp() : void 
    {
        $this->player = new Player("Giaco");
        $this->snakeLadders = new SnakesLadders($this->player);
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

    public function test_player_is_on_square_0_can_change_his_position_with_dices_sum()
    {
        $dice1 = new Dice;
        $dice2 = new Dice;

        $this->snakeLadders->play($dice1,$dice2);

        $positionToMove = $this->snakeLadders->dicesSum($dice1,$dice2) + 1;

        $this->assertIsInt($this->player->getPosition());
        $this->assertEquals($positionToMove, $this->player->getPosition());

    }

    public function test_player_is_on_square_10_can_change_his_position_with_dices_sum()
    {
        $this->player->setPosition(10);

        $dice1 = new Dice;
        $dice2 = new Dice;
        
        $result = $this->snakeLadders->play($dice1,$dice2);

        $this->assertIsInt($this->player->getPosition());
        $this->assertEquals("Player {$this->player->getName()} is on square {$this->player->getPosition()}", $result);
    }
    
}