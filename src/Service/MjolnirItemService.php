<?php

namespace Shop\Service;

class MjolnirItemService extends ItemService {
    const ITEM_NAME = 'Mjolnir';
    
    protected function updateItemQuality() {
        return;
    }

    protected function getSellInShift(): int {
        return 0;
    }
}