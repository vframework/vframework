<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Data;

/**
 * @property \VFramework\App\DataItem $item
 */
class ItemSetEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param \VFramework\App\DataItem $item
     */
    public function __construct(\VFramework\App\DataItem $item)
    {
        $this
                ->defineProperty('item', [
                    'type' => \VFramework\App\DataItem::class
                ])
        ;
        $this->item = $item;
    }

}
