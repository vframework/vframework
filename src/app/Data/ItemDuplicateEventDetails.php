<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Data;

/**
 * @property string $sourceKey
 * @property string $destinationKey
 */
class ItemDuplicateEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $sourceKey
     * @param string $destinationKey
     */
    public function __construct(string $sourceKey, string $destinationKey)
    {
        $this
                ->defineProperty('sourceKey', [
                    'type' => 'string'
                ])
                ->defineProperty('destinationKey', [
                    'type' => 'string'
                ])
        ;
        $this->sourceKey = $sourceKey;
        $this->destinationKey = $destinationKey;
    }

}
