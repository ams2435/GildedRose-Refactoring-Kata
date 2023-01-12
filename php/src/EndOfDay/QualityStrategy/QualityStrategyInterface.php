<?php

declare(strict_types=1);

namespace GildedRose\EndOfDay\QualityStrategy;

interface QualityStrategyInterface
{
    public function updateQuality(\GildedRose\Item &$item): void;
}
