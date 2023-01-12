<?php

declare(strict_types=1);

namespace Tests\EndOfDay\QualityStrategy;

use GildedRose\EndOfDay\QualityStrategy\NeverDecreases;
use GildedRose\EndOfDay\QualityStrategy\QualityStrategyInterface;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class NeverDecreasesTest extends TestCase
{
    private QualityStrategyInterface $strategy;

    protected function setUp(): void
    {
        $this->strategy = new NeverDecreases();
    }

    public function testNeverDecreasesQualityStrategyDoesNotDecreasesQuality(): void
    {
        $item = new Item('foo', 10, 10);
        $this->strategy->updateQuality($item);
        $this->assertEquals(10, $item->quality);
    }
}
