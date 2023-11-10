<?php

namespace App\Tests;

use App\Service\PrimeFactor;
use PHPUnit\Framework\TestCase;

class PrimeFactorTest extends TestCase
{
    public function testFactorOf(): void
    {
        $this->assertEquals([], PrimeFactor::primeOf(1));
        $this->assertEquals([2], PrimeFactor::primeOf(2));
        $this->assertEquals([3], PrimeFactor::primeOf(3));
        $this->assertEquals([2, 2], PrimeFactor::primeOf(4));
        $this->assertEquals([5], PrimeFactor::primeOf(5));
        $this->assertEquals([2, 3], PrimeFactor::primeOf(6));
        $this->assertEquals([7], PrimeFactor::primeOf(7));
        $this->assertEquals([2, 2, 2], PrimeFactor::primeOf(8));
        $this->assertEquals([3, 3], PrimeFactor::primeOf(9));
    }
}