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
 * @property string $value
 */
class ItemSetValueEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $key
     * @param string $value
     */
    public function __construct(string $key, string $value)
    {
        $this
                ->defineProperty('key', [
                    'type' => 'string'
                ])
                ->defineProperty('value', [
                    'type' => 'string'
                ])
        ;
        $this->key = $key;
        $this->value = $value;
    }

}
