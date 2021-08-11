<?php

namespace Shop\Service;

use Shop\Item;

class ItemService {
    const QUALITY_MIN = 0;
    const QUALITY_MAX = 50;

    const QUALITY_SHIFT_MIN = -1;
    const QUALITY_SHIFT_MAX = -2;
    const QUALITY_SHIFT_MIN_TO_MAX_POINT = 0;

    const SELL_IN_SHIFT = -1;

    /**
     * @var Item
     */
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function updateItem() {
        $this->updateItemSellIn();
        $this->updateItemQuality();
    }

    protected function updateItemQuality() {
        $new_quality = $this->item->quality + $this->getQualityShift();

        if ($new_quality < self::QUALITY_MIN) {
            $new_quality = self::QUALITY_MIN;
        }

        if ($new_quality > self::QUALITY_MAX) {
            $new_quality = self::QUALITY_MAX;
        }

        $this->item->quality = $new_quality;
    }

    protected function updateItemSellIn() {
        $this->item->sell_in += $this->getSellInShift();
    }

    protected function getQualityShift(): int {
        if ($this->item->sell_in < ItemService::QUALITY_SHIFT_MIN_TO_MAX_POINT) {
            return self::QUALITY_SHIFT_MAX;
        }
 
        return self::QUALITY_SHIFT_MIN;
    }

    protected function getSellInShift(): int {
        return self::SELL_IN_SHIFT;
    }
}