<?php

declare(strict_types=1);

namespace GildedRose\EndOfDay\QualityStrategy;

use GildedRose\Item;

class Double implements QualityStrategyInterface
{
    public function updateQuality(Item &$item): void
    {
        if ($item->quality > 2) {
            $item->quality -= 2;
        } else {
            $item->quality = 0;
        }
    }
}
