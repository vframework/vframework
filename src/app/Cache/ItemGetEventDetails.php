<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Cache;

/**
 * @property string $key
 * @property ?\VFramework\App\CacheItem $item
 */
class ItemGetEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * @param string $key
     * @param ?\VFramework\App\CacheItem $item
     */
    public function __construct(string $key, $item)
    {
        $this
                ->defineProperty('key', [
                    'type' => 'string'
                ])
                ->defineProperty('item', [
                    'type' => '?' . \VFramework\App\CacheItem::class
                ])
        ;
        $this->key = $key;
        $this->item = $item;
    }

}
