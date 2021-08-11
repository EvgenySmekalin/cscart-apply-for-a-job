<?php

namespace Shop\Service;

class ConcertTicketsItemService extends ItemService {
    const ITEM_NAME = 'Concert tickets';

    const QUALITY_SHIFT_MIN = 1;
    const QUALITY_SHIFT_MEDIUM = 2;
    const QUALITY_SHIFT_MAX = 3;

    const QUALITY_SHIFT_MEDIUM_TO_MAX_POINT = 5;
    const QUALITY_SHIFT_MIN_TO_MEDIUM_POINT = 10;

    const QUALITY_DROP_TO_ZERO_POINT = 0;

    protected function getQualityShift(): int {
        if ($this->item->sell_in < self::QUALITY_DROP_TO_ZERO_POINT) {        
            return -1 * $this->item->quality;
        } 

        if ($this->item->sell_in < self::QUALITY_SHIFT_MEDIUM_TO_MAX_POINT) {  
            return self::QUALITY_SHIFT_MAX;
        } 

        if ($this->item->sell_in < self::QUALITY_SHIFT_MIN_TO_MEDIUM_POINT) {
            return self::QUALITY_SHIFT_MEDIUM;
        }                          
            
        return self::QUALITY_SHIFT_MIN;
    }
}