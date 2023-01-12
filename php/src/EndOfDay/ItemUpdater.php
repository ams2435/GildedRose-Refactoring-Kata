<?php

declare(strict_types=1);

namespace GildedRose\EndOfDay;

use GildedRose\EndOfDay\QualityStrategy\QualityStrategyInterface;
use GildedRose\EndOfDay\SellInStrategy\SellInStrategyInterface;
use GildedRose\Item;

final class ItemUpdater
{
    public function __construct(
        private Item &$item,
        private QualityStrategyInterface $qualityStrategy,
        private SellInStrategyInterface $sellInStrategy
    ) {
    }

    public function update(): void
    {
        $this->updateSellIn();
        $this->updateQuality();
        if ($this->item->sellIn < 0) {
            //if sell in period has passed, run quality changes again to double the effect
            $this->updateQuality();
        }
    }

    private function updateQuality(): void
    {
        $this->qualityStrategy->updateQuality($this->item);
    }

    private function updateSellIn(): void
    {
        $this->sellInStrategy->updateSellIn($this->item);
    }
}
