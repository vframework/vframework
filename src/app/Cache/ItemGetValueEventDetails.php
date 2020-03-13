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
 * @property mixed $value
 */
class ItemGetValueEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * @param string $key
     * @param mixed $value
     */
    public function __construct(string $key, $value)
    {
        $this
                ->defineProperty('key', [
                    'type' => 'string'
                ])
                ->defineProperty('value')
        ;
        $this->key = $key;
        $this->value = $value;
    }

}
