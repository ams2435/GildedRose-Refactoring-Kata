<?php

declare(strict_types=1);

namespace GildedRose\EndOfDay\QualityStrategy;

use GildedRose\Item;

class Standard implements QualityStrategyInterface
{
    public function updateQuality(Item &$item): void
    {
        if ($item->quality > 0) {
            $item->quality--;
        }
    }
}
