<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\EndOfDay\ItemStrategyFactory;
use GildedRose\EndOfDay\ItemUpdater;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            (new ItemUpdater(
                item: $item,
                qualityStrategy: ItemStrategyFactory::getQualityStrategy($item),
                sellInStrategy: ItemStrategyFactory::getSellInStrategy($item)
            ))->update();
        }
    }
}
