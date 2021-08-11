<?php

namespace Shop\Service;

use Shop\Item;

class ItemServiceFactory {
    public static function create(Item $item): ItemService {
        switch ($item->name) {
            case BlueCheeseItemService::ITEM_NAME:
                return new BlueCheeseItemService($item);
            case MjolnirItemService::ITEM_NAME:
                return new MjolnirItemService($item);
            case ConcertTicketsItemService::ITEM_NAME:
                return new ConcertTicketsItemService($item);
            case MagicItemService::ITEM_NAME:
                return new MagicItemService($item);
            default:
                return new ItemService($item);
        }
    }
}