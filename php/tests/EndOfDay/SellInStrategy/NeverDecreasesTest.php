<?php

declare(strict_types=1);

namespace Tests\EndOfDay\SellInStrategy;

use GildedRose\EndOfDay\SellInStrategy\NeverDecreases;
use GildedRose\EndOfDay\SellInStrategy\SellInStrategyInterface;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class NeverDecreasesTest extends TestCase
{
    private SellInStrategyInterface $strategy;

    protected function setUp(): void
    {
        $this->strategy = new NeverDecreases();
    }

    public function testNeverDecreasesSellInStrategyDoesNotDecreasesSellIn(): void
    {
        $item = new Item('foo', 10, 10);
        $this->strategy->updateSellIn($item);
        $this->assertEquals(10, $item->sellIn);
    }
}
