<?php

namespace Shop\Service;

class MagicItemService extends ItemService {
    const ITEM_NAME = 'Magic cake';

    const QUALITY_SHIFT_MIN = -2;
    const QUALITY_SHIFT_MAX = -4;

    protected function getQualityShift(): int {
        if ($this->item->sell_in < ItemService::QUALITY_SHIFT_MIN_TO_MAX_POINT) {
            return self::QUALITY_SHIFT_MAX;
        } 

        return self::QUALITY_SHIFT_MIN;
    }
}