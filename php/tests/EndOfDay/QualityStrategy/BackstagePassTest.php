<?php

declare(strict_types=1);

namespace Tests\EndOfDay\QualityStrategy;

use GildedRose\EndOfDay\QualityStrategy\BackstagePass;
use GildedRose\EndOfDay\QualityStrategy\QualityStrategyInterface;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class BackstagePassTest extends TestCase
{
    private QualityStrategyInterface $strategy;

    protected function setUp(): void
    {
        $this->strategy = new BackstagePass();
    }

    public function testBackstagePassQualityStrategyIncreasesByOneWithTenDaysLeft(): void
    {
        $item = new Item('foo', 10, 10);
        $this->strategy->updateQuality($item);
        $this->assertEquals(11, $item->quality);
    }

    public function testBackstagePassQualityStrategyIncreasesByTwoWithNineToFiveDaysLeft(): void
    {
        foreach ([9, 8, 7, 6, 5] as $sellin) {
            $item = new Item('foo', $sellin, 10);
            $this->strategy->updateQuality($item);
            $this->assertEquals(12, $item->quality);
        }
    }

    public function testBackstagePassQualityStrategyIncreasesByThreeWithFourToNoDaysLeft(): void
    {
        foreach ([4, 3, 2, 1, 0] as $sellin) {
            $item = new Item('foo', $sellin, 10);
            $this->strategy->updateQuality($item);
            $this->assertEquals(13, $item->quality);
        }
    }

    public function testBackstagePassQualityStrategyBecomesZeroWhenSellInPassed(): void
    {
        $item = new Item('foo', -1, 10);
        $this->strategy->updateQuality($item);
        $this->assertEquals(0, $item->quality);
    }

    public function testBackstagePassQualityStrategyHasMaximumQualityFifty(): void
    {
        $item = new Item('foo', 2, 50);
        $this->strategy->updateQuality($item);
        $this->assertEquals(50, $item->quality);
    }
}
