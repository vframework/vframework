<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Data;

/**
 * @property string $key
 * @property ?\VFramework\App\DataItem $item
 */
class ItemGetEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * @param string $key
     * @param ?\VFramework\App\DataItem $item
     */
    public function __construct(string $key, $item)
    {
        $this
                ->defineProperty('key', [
                    'type' => 'string'
                ])
                ->defineProperty('item', [
                    'type' => '?' . \VFramework\App\DataItem::class
                ])
        ;
        $this->key = $key;
        $this->item = $item;
    }

}
