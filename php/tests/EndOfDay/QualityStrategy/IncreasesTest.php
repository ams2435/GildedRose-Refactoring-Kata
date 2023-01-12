<?php

declare(strict_types=1);

namespace Tests\EndOfDay\QualityStrategy;

use GildedRose\EndOfDay\QualityStrategy\Increases;
use GildedRose\EndOfDay\QualityStrategy\QualityStrategyInterface;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class IncreasesTest extends TestCase
{
    private QualityStrategyInterface $strategy;

    protected function setUp(): void
    {
        $this->strategy = new Increases();
    }

    public function testIncreasesQualityStrategyIncreasesQuality(): void
    {
        $item = new Item('foo', 10, 10);
        $this->strategy->updateQuality($item);
        $this->assertEquals(11, $item->quality);
    }

    public function testIncreasesQualityStrategyHasMaximumQualityFifty(): void
    {
        $item = new Item('foo', 10, 50);
        $this->strategy->updateQuality($item);
        $this->assertEquals(50, $item->quality);
    }
}
