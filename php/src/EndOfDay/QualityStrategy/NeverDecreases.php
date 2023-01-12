<?php

declare(strict_types=1);

namespace GildedRose\EndOfDay\QualityStrategy;

use GildedRose\Item;

class NeverDecreases implements QualityStrategyInterface
{
    public function updateQuality(Item &$item): void
    {
    }
}
