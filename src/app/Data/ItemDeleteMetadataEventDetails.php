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
 * @property string $name
 */
class ItemDeleteMetadataEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $key
     * @param string $name
     */
    public function __construct(string $key, string $name)
    {
        $this
                ->defineProperty('key', [
                    'type' => 'string'
                ])
                ->defineProperty('name', [
                    'type' => 'string'
                ])
        ;
        $this->key = $key;
        $this->name = $name;
    }

}
