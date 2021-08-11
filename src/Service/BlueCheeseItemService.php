<?php

namespace Shop\Service;

class BlueCheeseItemService extends ItemService {
    const ITEM_NAME = 'Blue cheese';
    const QUALITY_SHIFT_MIN = 1;
    const QUALITY_SHIFT_MAX = 2;

    protected function getQualityShift(): int {
        if ($this->item->sell_in < ItemService::QUALITY_SHIFT_MIN_TO_MAX_POINT) {
            return self::QUALITY_SHIFT_MAX;
        } 

        return self::QUALITY_SHIFT_MIN;
    }
}