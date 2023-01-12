<?php

declare(strict_types=1);

namespace GildedRose\EndOfDay\SellInStrategy;

interface SellInStrategyInterface
{
    public function updateSellIn(\GildedRose\Item &$item): void;
}
