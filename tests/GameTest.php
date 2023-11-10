<?php

namespace App\Tests;

use App\Service\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    private Game $game;
    protected function setUp(): void
    {
        $this->game = new Game();
    }

    public function testGutterGame(): void
    {
        $this->rollMany(20, 0);
        $this->assertEquals(0, $this->game->getScore());
    }

    public function testAllOnesGame(): void
    {
        $this->rollMany(20, 1);
        $this->assertEquals(20, $this->game->getScore());
    }

    public function testOneSpareGame(): void
    {
        $this->rollMany(2, 5);
        $this->game->roll(4);
        $this->rollMany(17, 0);
        $this->assertEquals(18, $this->game->getScore());
    }

    public function testOneStrikeGame(): void
    {
        $this->game->roll(10);
        $this->game->roll(3);
        $this->game->roll(6);
        $this->rollMany(16, 0);
        $this->assertEquals(28, $this->game->getScore());
    }

    public function testPerfectGame(): void
    {
        $this->rollMany(12, 10);
        $this->assertEquals(300, $this->game->getScore());
    }

    private function rollMany(int $n, int $pins): void
    {
        for($i = 0; $i < $n; $i++) {
            $this->game->roll($pins);
        }
    }
}
