<?php

declare(strict_types=1);

namespace Tests\EndOfDay\QualityStrategy;

use GildedRose\EndOfDay\QualityStrategy\QualityStrategyInterface;
use GildedRose\EndOfDay\QualityStrategy\Standard;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class StandardTest extends TestCase
{
    private QualityStrategyInterface $strategy;

    protected function setUp(): void
    {
        $this->strategy = new Standard();
    }

    public function testStandardQualityStrategyDecreasesQuality(): void
    {
        $item = new Item('foo', 10, 10);
        $this->strategy->updateQuality($item);
        $this->assertEquals(9, $item->quality);
    }

    public function testStandardQualityStrategyMinimumQualityIsZero(): void
    {
        $item = new Item('foo', 10, 0);
        $this->strategy->updateQuality($item);
        $this->assertEquals(0, $item->quality);
    }
}
