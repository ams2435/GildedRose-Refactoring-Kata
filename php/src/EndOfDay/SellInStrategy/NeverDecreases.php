<?php

declare(strict_types=1);

namespace GildedRose\EndOfDay\SellInStrategy;

use GildedRose\Item;

class NeverDecreases implements SellInStrategyInterface
{
    public function updateSellIn(Item &$item): void
    {
    }
}
