<?php

declare(strict_types=1);

namespace GildedRose\EndOfDay\QualityStrategy;

use GildedRose\Item;

class Increases implements QualityStrategyInterface
{
    public function updateQuality(Item &$item): void
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
    }
}
