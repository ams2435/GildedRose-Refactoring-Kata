<?php

declare(strict_types=1);

namespace Tests\EndOfDay;

use GildedRose\EndOfDay\ItemStrategyFactory;
use GildedRose\EndOfDay\QualityStrategy\BackstagePass;
use GildedRose\EndOfDay\QualityStrategy\Double;
use GildedRose\EndOfDay\QualityStrategy\Increases;
use GildedRose\EndOfDay\QualityStrategy\NeverDecreases;
use GildedRose\EndOfDay\QualityStrategy\Standard;
use GildedRose\EndOfDay\SellInStrategy\NeverDecreases as SellInStrategyNeverDecreases;
use GildedRose\EndOfDay\SellInStrategy\Standard as SellInStrategyStandard;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class ItemStrategyFactoryTest extends TestCase
{
    public function testStandardItemReturnsStandardQualityStrategy(): void
    {
        $this->assertInstanceOf(
            Standard::class,
            ItemStrategyFactory::getQualityStrategy(new Item('Standard Item', 10, 10))
        );
    }

    public function testBackstagePassItemsReturnsBackstagePassQualityStrategy(): void
    {
        $this->assertInstanceOf(
            BackstagePass::class,
            ItemStrategyFactory::getQualityStrategy(new Item('Backstage passes for x', 10, 10))
        );
    }

    public function testAgedBrieItemReturnsIncreasesQualityStrategy(): void
    {
        $this->assertInstanceOf(
            Increases::class,
            ItemStrategyFactory::getQualityStrategy(new Item('Aged Brie', 10, 10))
        );
    }

    public function testConjuredItemReturnsDoubleQualityStrategy(): void
    {
        $this->assertInstanceOf(
            Double::class,
            ItemStrategyFactory::getQualityStrategy(new Item('Conjured x', 10, 10))
        );
    }

    public function testSulfurasItemReturnsNeverDecreasesQualityStrategy(): void
    {
        $this->assertInstanceOf(
            NeverDecreases::class,
            ItemStrategyFactory::getQualityStrategy(new Item('Sulfuras x', 10, 80))
        );
    }

    public function testStandardItemReturnsStandardSellInStrategy(): void
    {
        $this->assertInstanceOf(
            SellInStrategyStandard::class,
            ItemStrategyFactory::getSellInStrategy(new Item('Standard Item', 10, 10))
        );
    }

    public function testSulfurasItemReturnsNeverDecreasesSellInStrategy(): void
    {
        $this->assertInstanceOf(
            SellInStrategyNeverDecreases::class,
            ItemStrategyFactory::getSellInStrategy(new Item('Sulfuras x', 10, 80))
        );
    }
}
