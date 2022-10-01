<?php

namespace Tests;

use App\Board;
use PHPUnit\Framework\TestCase;

class BoardTest extends TestCase {

    private Board $board;

    protected function setUp(): void
    {
        $this->board = new Board;
    }

    /** @test */
    public function test_board_have_max_square_number()
    {
        $this->assertEquals(100,$this->board->getMaxSquares());
    }
    

}