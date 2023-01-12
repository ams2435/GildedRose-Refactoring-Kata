<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }

    public function testBackstagePassesQualityChangesCorrectly(): void
    {
        $this->performTests(
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 21),
            [
                [
                    'sellIn' => 14,
                    'quality' => 22,
                ],
                [
                    'sellIn' => 13,
                    'quality' => 23,
                ],
                [
                    'sellIn' => 12,
                    'quality' => 24,
                ],
                [
                    'sellIn' => 11,
                    'quality' => 25,
                ],
                [
                    'sellIn' => 10,
                    'quality' => 26,
                ],
                [
                    'sellIn' => 9,
                    'quality' => 28,
                ],
                [
                    'sellIn' => 8,
                    'quality' => 30,
                ],
                [
                    'sellIn' => 7,
                    'quality' => 32,
                ],
                [
                    'sellIn' => 6,
                    'quality' => 34,
                ],
                [
                    'sellIn' => 5,
                    'quality' => 36,
                ],
                [
                    'sellIn' => 4,
                    'quality' => 39,
                ],
                [
                    'sellIn' => 3,
                    'quality' => 42,
                ],
                [
                    'sellIn' => 2,
                    'quality' => 45,
                ],
                [
                    'sellIn' => 1,
                    'quality' => 48,
                ],
                [
                    'sellIn' => 0,
                    'quality' => 50,
                ],
                [
                    'sellIn' => -1,
                    'quality' => 0,
                ],
            ]
        );
    }

    public function testAgedBrieQualityChangesCorrectly(): void
    {
        $this->performTests(new Item('Aged Brie', 3, 42), [
            [
                'sellIn' => 2,
                'quality' => 43,
            ],
            [
                'sellIn' => 1,
                'quality' => 44,
            ],
            [
                'sellIn' => 0,
                'quality' => 45,
            ],
            [
                'sellIn' => -1,
                'quality' => 47,
            ],
            [
                'sellIn' => -2,
                'quality' => 49,
            ],
            [
                'sellIn' => -3,
                'quality' => 50,
            ],
        ]);
    }

    public function testSulfurasValuesNeverChange(): void
    {
        $this->performTests(new Item('Sulfuras, Hand of Ragnaros', 3, 80), [
            [
                'sellIn' => 3,
                'quality' => 80,
            ],
            [
                'sellIn' => 3,
                'quality' => 80,
            ],
            [
                'sellIn' => 3,
                'quality' => 80,
            ],
        ]);
    }

    public function testStandardItemQualityChangesCorrectly(): void
    {
        $this->performTests(new Item('Standard Item', 2, 5), [
            [
                'sellIn' => 1,
                'quality' => 4,
            ],
            [
                'sellIn' => 0,
                'quality' => 3,
            ],
            [
                'sellIn' => -1,
                'quality' => 1,
            ],
            [
                'sellIn' => -2,
                'quality' => 0,
            ],
            [
                'sellIn' => -3,
                'quality' => 0,
            ],
        ]);
    }

    public function testConjuredItemQualityChangesCorrectly(): void
    {
        $this->performTests(new Item('Conjured Item', 2, 5), [
            [
                'sellIn' => 1,
                'quality' => 3,
            ],
            [
                'sellIn' => 0,
                'quality' => 1,
            ],
            [
                'sellIn' => -1,
                'quality' => 0,
            ],
            [
                'sellIn' => -2,
                'quality' => 0,
            ],
        ]);
    }

    private function performTests(Item $item, array $expectedResults): void
    {
        $gildedRose = new GildedRose([$item]);
        foreach ($expectedResults as $expected) {
            $gildedRose->updateQuality();
            $this->assertEquals($expected['sellIn'], $item->sellIn);
            $this->assertEquals($expected['quality'], $item->quality);
        }
    }
}
