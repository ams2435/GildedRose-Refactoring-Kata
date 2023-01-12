<?php

declare(strict_types=1);

namespace GildedRose\EndOfDay\QualityStrategy;

use GildedRose\Item;

class BackstagePass implements QualityStrategyInterface
{
    public function updateQuality(Item &$item): void
    {
        if ($item->sellIn < 0) {
            $item->quality = 0;
        } else {
            $item->quality++;
            if ($item->sellIn < 10) {
                $item->quality++;
            }
            if ($item->sellIn < 5) {
                $item->quality++;
            }
            //Ensure we haven't gone above max quality of 50
            if ($item->quality > 50) {
                $item->quality = 50;
            }
        }
    }
}
