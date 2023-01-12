<?php

declare(strict_types=1);

namespace GildedRose\EndOfDay;

use GildedRose\EndOfDay\QualityStrategy\QualityStrategyInterface;
use GildedRose\EndOfDay\QualityStrategy\Standard as StandardQualityStrategy;
use GildedRose\EndOfDay\SellInStrategy\SellInStrategyInterface;
use GildedRose\EndOfDay\SellInStrategy\Standard as StandardSellInStrategy;
use GildedRose\Item;

class ItemStrategyFactory
{
    public static function getQualityStrategy(Item $item): QualityStrategyInterface
    {
        $exceptions = [
            'Aged Brie' => 'GildedRose\EndOfDay\QualityStrategy\Increases',
            'Backstage passes' => 'GildedRose\EndOfDay\QualityStrategy\BackstagePass',
            'Conjured' => 'GildedRose\EndOfDay\QualityStrategy\Double',
            'Sulfuras' => 'GildedRose\EndOfDay\QualityStrategy\NeverDecreases',
        ];
        foreach ($exceptions as $prefix => $strategy) {
            if (str_starts_with($item->name, $prefix)) {
                return new $strategy();
            }
        }
        return new StandardQualityStrategy();
    }

    public static function getSellInStrategy(Item $item): SellInStrategyInterface
    {
        $exceptions = [
            'Sulfuras' => 'GildedRose\EndOfDay\SellInStrategy\NeverDecreases',
        ];
        foreach ($exceptions as $prefix => $strategy) {
            if (str_starts_with($item->name, $prefix)) {
                return new $strategy();
            }
        }
        return new StandardSellInStrategy();
    }
}
