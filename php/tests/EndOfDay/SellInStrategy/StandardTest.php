<?php

declare(strict_types=1);

namespace Tests\EndOfDay\SellInStrategy;

use GildedRose\EndOfDay\SellInStrategy\SellInStrategyInterface;
use GildedRose\EndOfDay\SellInStrategy\Standard;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class StandardTest extends TestCase
{
    private SellInStrategyInterface $strategy;

    protected function setUp(): void
    {
        $this->strategy = new Standard();
    }

    public function testStandardSellInStrategyDecreasesSellIn(): void
    {
        $item = new Item('foo', 10, 10);
        $this->strategy->updateSellIn($item);
        $this->assertEquals(9, $item->sellIn);
    }
}
