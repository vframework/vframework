<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Cache;

/**
 * @property \VFramework\App\CacheItem $item
 */
class ItemSetEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param \VFramework\App\CacheItem $item
     */
    public function __construct(\VFramework\App\CacheItem $item)
    {
        $this
                ->defineProperty('item', [
                    'type' => \VFramework\App\CacheItem::class
                ])
        ;
        $this->item = $item;
    }

}
