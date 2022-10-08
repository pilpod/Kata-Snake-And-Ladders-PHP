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

        $this->dice1->setScore(2);
        $this->dice2->setScore(3);
        $this->snakeLadders->play($this->dice1,$this->dice2);

        $positionToMove = $this->snakeLadders->dicesSum($this->dice1->getScore(),$this->dice2->getScore());

        $this->assertIsInt($this->player->getPosition());
        $this->assertEquals($positionToMove, $this->player->getPosition());

    }

    public function test_player_is_on_square_10_can_change_his_position_with_dices_sum()
    {
        $this->player->setPosition(10);
        
        $this->dice1->setScore(5);
        $this->dice2->setScore(2);
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

        $this->assertEquals("Player Giaco is on square 43", $result2);
    }
    
    /** @test */
    public function test_if_player_position_is_2_climpUp_to_square_38()
    {
        $this->dice1->setScore(1);
        $this->dice2->setScore(1);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(38,$this->player->getPosition());
        $this->assertEquals("Player Giaco roll dices again",$result);
    }
    
    /** @test */
    public function test_if_player_position_is_7_climpUp_to_square_14()
    {
        $this->dice1->setScore(3);
        $this->dice2->setScore(4);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(14,$this->player->getPosition());
        $this->assertEquals("Player Giaco is on square 14", $result);
    }

    public function test_if_player_position_is_15_climpUp_to_square_26()
    {
        $this->player->setPosition(10);
        $this->dice1->setScore(3);
        $this->dice2->setScore(2);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(26,$this->player->getPosition());
        $this->assertEquals("Player Giaco is on square 26", $result);

    }

    /** @test */
    public function test_if_player_position_is_21_climpUp_to_square_42()
    {
        $this->player->setPosition(18);
        $this->dice1->setScore(2);
        $this->dice2->setScore(1);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(42,$this->player->getPosition());
        $this->assertEquals("Player Giaco is on square 42", $result);
    }

    /** @test */
    public function test_if_player_position_is_28_climpUp_to_square_84()
    {
        $this->player->setPosition(21);
        $this->dice1->setScore(4);
        $this->dice2->setScore(3);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(84,$this->player->getPosition());
        $this->assertEquals("Player Giaco is on square 84", $result);
    }

    /** @test */
    public function test_if_player_position_is_36_climpUp_to_square_44()
    {
        $this->player->setPosition(33);
        $this->dice1->setScore(1);
        $this->dice2->setScore(2);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(44,$this->player->getPosition());
        $this->assertEquals("Player Giaco is on square 44", $result);
    }

    /** @test */
    public function test_if_player_position_is_51_climpUp_to_square_67()
    {
        $this->player->setPosition(48);
        $this->dice1->setScore(1);
        $this->dice2->setScore(2);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(67,$this->player->getPosition());
        $this->assertEquals("Player Giaco is on square 67", $result);
    }

    /** @test */
    public function test_if_player_position_is_71_climpUp_to_square_91()
    {
        $this->player->setPosition(68);
        $this->dice1->setScore(1);
        $this->dice2->setScore(2);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(91,$this->player->getPosition());
        $this->assertEquals("Player Giaco is on square 91", $result);
    }

    /** @test */
    public function test_if_player_position_is_78_climpUp_to_square_98()
    {
        $this->player->setPosition(75);
        $this->dice1->setScore(1);
        $this->dice2->setScore(2);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(98,$this->player->getPosition());
        $this->assertEquals("Player Giaco is on square 98", $result);
    }
    
    /** @test */
    public function test_if_player_position_is_87_climpUp_to_square_94()
    {
        $this->player->setPosition(84);
        $this->dice1->setScore(1);
        $this->dice2->setScore(2);

        $result = $this->snakeLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(94,$this->player->getPosition());
        $this->assertEquals("Player Giaco is on square 94", $result);
    }
    
    
    
    
    
}