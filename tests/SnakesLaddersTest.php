<?php

namespace Tests;

use App\Dice;
use App\Player;
use App\SnakesLadders;
use PHPUnit\Framework\TestCase;

class SnakesLaddersTest extends TestCase {

    private SnakesLadders $snakeLadders;
    private Player $player;
    private Dice $dice1;
    private Dice $dice2;

    protected function setUp() : void 
    {
        $this->player = new Player("Giaco");
        $this->snakeLadders = new SnakesLadders($this->player);

        $this->dice1 = new Dice;
        $this->dice2 = new Dice;
    }
    
    /** @test */
    public function test_when_game_play_roll_dices_and_retrieve_sum_of_dices() : void
    {

        $this->dice1->roll();
        $this->dice2->roll();
        $result = $this->snakeLadders->dicesSum($this->dice1->getScore(),$this->dice2->getScore());

        $this->assertIsInt($result);
        $this->assertGreaterThanOrEqual(2, $result);
        $this->assertLessThanOrEqual(12, $result);
    }

    public function test_player_is_on_square_0_can_change_his_position_with_dices_sum()
    {

        $this->dice1->roll();
        $this->dice2->roll();
        $this->snakeLadders->play($this->dice1,$this->dice2);

        $positionToMove = $this->snakeLadders->dicesSum($this->dice1->getScore(),$this->dice2->getScore());

        $this->assertIsInt($this->player->getPosition());
        $this->assertEquals($positionToMove, $this->player->getPosition());

    }

    public function test_player_is_on_square_10_can_change_his_position_with_dices_sum()
    {
        $this->player->setPosition(10);
        
        $this->dice1->roll();
        $this->dice2->roll();
        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertIsInt($this->player->getPosition());
        $this->assertEquals("Player {$this->player->getName()} is on square {$this->player->getPosition()}", $result);
    }

    /** @test */
    public function test_if_value_of_dices_is_the_same_player_can_roll_dice_again()
    {

        $this->dice1->setScore(1);
        $this->dice2->setScore(1);
        $result1 = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals("Player Giaco roll dices again", $result1);

        $this->dice1->setScore(2);
        $this->dice2->setScore(3);
        $result2 = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals("Player Giaco is on square 7", $result2);
    }
    
    /** @test */
    public function test_if_player_position_is_2_climpUp_to_square_38()
    {
        $this->dice1->setScore(1);
        $this->dice2->setScore(1);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(2,$this->player->getPosition());
    }
    
    
}