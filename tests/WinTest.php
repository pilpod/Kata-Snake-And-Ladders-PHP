<?php

namespace Tests;

use App\Dice;
use App\Game;
use App\Player;
use App\SnakesLadders;
use PHPUnit\Framework\TestCase;

class WinTest extends TestCase
{
    private Player $playerOne;
    private Player $playerTwo;
    private Dice $dice1;
    private Dice $dice2;

    protected function setUp(): void
    {
        $this->playerOne = new Player("Mickey");
        $this->playerTwo = new Player("Donald");
        $this->dice1 = new Dice;
        $this->dice2 = new Dice;
    }
    

    /** @test */
    public function test_player_wins_when_his_position_is_100_return_player_Mickey_wins()
    {
        $this->playerOne->setPosition(95);
        $this->dice1->setScore(3);
        $this->dice2->setScore(2);
        $snakesLadders = new SnakesLadders($this->playerOne);

        $result = $snakesLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(100, $this->playerOne->getPosition());
        $this->assertEquals("Player Mickey Wins", $result);
    }

    /** @test */
    public function test_player_rolled_double_and_finish_on_square_100_return_player_Mickey_wins()
    {
        $this->playerOne->setPosition(96);
        $this->dice1->setScore(2);
        $this->dice2->setScore(2);
        $snakesLadders = new SnakesLadders($this->playerOne);

        $result = $snakesLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(100, $this->playerOne->getPosition());
        $this->assertEquals("Player Mickey Wins", $result);
    }

    /** @test */
    public function test_bounce_back_only_win_by_rolling_exact_number_to_land_last_square()
    {
        $this->playerOne->setPosition(98);
        $this->dice1->setScore(3);
        $this->dice2->setScore(2);
        $snakesLadders = new SnakesLadders($this->playerOne);

        $result = $snakesLadders->play($this->dice1,$this->dice2);

        $this->assertEquals(97, $this->playerOne->getPosition());
        $this->assertEquals("Player Mickey is on square 97", $result);
    }
    
    /** @test */
    public function test_return_game_over_if_playerOne_has_won_and_another_tries_to_play()
    {
        $this->playerOne->setPosition(100);
        $this->playerTwo->setPosition(95);

        $this->playerOne->setTurnToPlay(false);
        $this->playerTwo->setTurnToPlay(true);

        $snakesLadders = new SnakesLadders();
        $game = new Game($snakesLadders);

        $result = $game->start($this->playerOne,$this->playerTwo);

        $this->assertEquals("Game Over", $result);

    }

    /** @test */
    public function test_return_game_over_if_playerTwo_has_won_and_another_tries_to_play()
    {
        $this->playerOne->setPosition(95);
        $this->playerTwo->setPosition(100);

        $this->playerOne->setTurnToPlay(true);
        $this->playerTwo->setTurnToPlay(false);

        $snakesLadders = new SnakesLadders();
        $game = new Game($snakesLadders);

        $result = $game->start($this->playerOne,$this->playerTwo);

        $this->assertEquals("Game Over", $result);

    }
    
    
    
}
