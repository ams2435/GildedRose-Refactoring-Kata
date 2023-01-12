<?php

declare(strict_types=1);

namespace Tests\EndOfDay\QualityStrategy;

use GildedRose\EndOfDay\QualityStrategy\Double;
use GildedRose\EndOfDay\QualityStrategy\QualityStrategyInterface;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class DoubleTest extends TestCase
{
    private QualityStrategyInterface $strategy;

    protected function setUp(): void
    {
        $this->strategy = new Double();
    }

    public function testDoubleQualityStrategyDecreasesQualityByTwo(): void
    {
        $item = new Item('foo', 10, 10);
        $this->strategy->updateQuality($item);
        $this->assertEquals(8, $item->quality);
    }

    public function testDoubleQualityStrategyMinimumQualityIsZero(): void
    {
        $item = new Item('foo', 10, 0);
        $this->strategy->updateQuality($item);
        $this->assertEquals(0, $item->quality);

        $item = new Item('foo', 10, 1);
        $this->strategy->updateQuality($item);
        $this->assertEquals(0, $item->quality);
    }
}
