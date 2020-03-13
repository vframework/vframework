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
 */
class ItemRequestEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this
                ->defineProperty('key', [
                    'type' => 'string'
                ])
        ;
        $this->key = $key;
    }

}
